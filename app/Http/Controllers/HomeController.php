<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Instagram;
use App\InventoryItem;
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

    public function cart()
    {
        $layout = $this->layout;
        return view('home.cart', compact(['layout']));
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


    public function checkout()
    {
        $layout = $this->layout;
        return view('home.checkout', compact(['layout']));
    }

    // Mail Test
    public function email()
    {
        Mail::to(Auth::user()->email)->send(new InvoiceUserOrder());
        $layout = $this->layout;
        return view('home.checkout', compact(['layout']));
    }
}