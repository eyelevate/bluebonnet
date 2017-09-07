<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Instagram;
use App\InventoryItem;
use App\Invoice;
use App\InvoiceItem;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Mail Test
use Mail;
use App\Mail\InvoiceUserOrder;

class HomeController extends Controller
{

    private $layout;
    private $view;
    private $instagram;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Job $job)
    {
        $theme = 2;
        $this->layout = $job->switchLayout($theme);
        $this->view = $job->switchHomeView($theme);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Instagram $instagram, Collection $collection, InventoryItem $inventoryItem)
    {
        $layout = $this->layout;

        // Instagram Images
        $ig = $instagram->getUserFeed(12, 0, 2);
        $feed = [];
        if ($ig['status']) {
            $feed = $ig['data'];

        } else {
            flash($ig['data'])->warning();
        }  

        // featured collection (Randomly Selected)
        $featured_collection = $collection->where('featured',true)->where('active',true)->inRandomOrder()->first();
        // featured items (Randomly Selected)
        $items = $inventoryItem->where('featured',true)->where('active',true)->inRandomOrder()->take(2)->get();
        $featured_items = $inventoryItem->prepareForFrontend($items);
        return view($this->view,compact(['layout','feed','featured_collection','featured_items']));
    }

    public function cart(InventoryItem $inventoryItem)
    {
        // session()->forget('cart');

        $cart = $inventoryItem->prepareCart(session()->get('cart'));
        $totals = $inventoryItem->prepareTotals(session()->get('cart'));

        $layout = $this->layout;
        return view('home.cart', compact(['layout','cart','totals']));
    }

    public function faq()
    {
        $layout = $this->layout;
        return view('home.faq', compact(['layout']));
    }


    public function logout()
    {
        if (auth()->check()) {
            auth()->logout();
            flash()->message('Successfully logged out!')->success();
        } else {
            flash()->message('Warning: no instances of a logged in session remaining. Please try logging in again.')->warning();
        }

        return redirect()->route('home');
    }

    public function privacy()
    {
        $layout = $this->layout;
        return view('home.privacy', compact(['layout']));
    }

    public function shipping()
    {
        $layout = $this->layout;
        return view('home.shipping', compact(['layout']));
    }

    public function shop(Collection $collection)
    {
        
        $nonfeatured = $collection->where('active', true)->where('featured',false)->orderBy('id','desc');
        $collections = $collection->where('featured',true)->where('active',true)->union($nonfeatured)->get();
        $layout = $this->layout;
        return view('home.shop', compact(['layout','collections']));
    }

    public function tos()
    {
        $layout = $this->layout;
        return view('home.tos', compact(['layout']));
    }


    public function checkout(InventoryItem $inventoryItem, Job $job)
    {
        $states = $job->prepareStates();
        $countries = $job->prepareCountries();
        $cart = $inventoryItem->prepareCart(session()->get('cart'));
        $totals = $inventoryItem->prepareTotals(session()->get('cart'));
        $layout = $this->layout;
        return view('home.checkout', compact(['layout','totals','states','countries','cart']));
    }

    // Mail Test
    public function email()
    {
        Mail::to(Auth::user()->email)->send(new InvoiceUserOrder());
        $layout = $this->layout;
        return view('home.checkout', compact(['layout']));
    }

    // Update Shipping Rates
    public function updateShipping(Request $request, InventoryItem $inventoryItem)
    {
        $cart = session()->get('cart');
        if(count($cart) > 0) {
            foreach ($cart as $key => $value) {
                $cart[$key]['shipping'] = $request->shipping;
            }
        }
        
        session()->put('cart',$cart);

        $totals = $inventoryItem->prepareTotals($cart);

        return response()->json([
            'status'=>true,
            'totals'=>$totals
        ]);
    }

    // Address Validator
    public function addressValidate(Request $request)
    {
        $street = $request->street;
        $suite = $request->suite;
        $city = $request->city;
        $state = $request->state;
        $zipcode = $request->zipcode;
        $country = $request->country;

        $rate = new \Ups\Rate(
            env('UPS_ACCESS_KEY'),
            env('UPS_USER_ID'),
            env('UPS_PASSWORD')
        );
        $status = true;
        try {
            $shipment = new \Ups\Entity\Shipment();

            $shipperAddress = $shipment->getShipper()->getAddress();
            $shipperAddress->setPostalCode('75240'); // where are we shipping from?

            $address = new \Ups\Entity\Address();
            $address->setPostalCode('75240');
            $shipFrom = new \Ups\Entity\ShipFrom();
            $shipFrom->setAddress($address);

            $shipment->setShipFrom($shipFrom);

            $shipTo = $shipment->getShipTo();
            $shipTo->setCompanyName('Test Ship To');
            $shipToAddress = $shipTo->getAddress();
            $shipToAddress->setPostalCode($zipcode);

            $package = new \Ups\Entity\Package();
            $package->getPackagingType()->setCode(\Ups\Entity\PackagingType::PT_PACKAGE);
            $package->getPackageWeight()->setWeight(1);
            
            // if you need this (depends of the shipper country)
            $weightUnit = new \Ups\Entity\UnitOfMeasurement;
            $weightUnit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_LBS);
            $package->getPackageWeight()->setUnitOfMeasurement($weightUnit);

            $dimensions = new \Ups\Entity\Dimensions();
            $dimensions->setHeight(5);
            $dimensions->setWidth(5);
            $dimensions->setLength(5);

            $unit = new \Ups\Entity\UnitOfMeasurement;
            $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_IN);

            $dimensions->setUnitOfMeasurement($unit);
            $package->setDimensions($dimensions);

            $shipment->addPackage($package);
            $rates = $rate->getRate($shipment);
            $total_rate = ['rate'=>0,'rate_formatted'=>'$0.00'];
            if(count($rates) > 0) {
                foreach ($rates as $key => $value) {
                    $ratedShipment = $value;
                    if (count($ratedShipment) > 0) {
                        foreach ($ratedShipment as $rs) {
                            $totalCharges = $rs->TotalCharges->MonetaryValue;
                            $total_rate['rate'] = $totalCharges;
                            $total_rate['rate_formatted'] = '$'.number_format($totalCharges,2,'.',',');
                        }
                    }
                }
            }
            return response()->json([

                'status'=>true,
                'rate'=>$total_rate


            ]);
        } catch (Exception $e) {
            return response()->json(['status'=>false,'reason'=>$e]);
        }

        

    }

    public function finish(Request $request)
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            "street"=>'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'billing_street' => 'required',
            'billing_city' => 'required',
            'billing_state' => 'required',
            'billing_zipcode' => 'required',
            'card_number' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvv' => 'required'
        ]);
        dd($request->all());
    }
}