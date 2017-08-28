<?php

namespace App\Http\Controllers;

use App\Instagram;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index(Instagram $instagram)
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
        return view($this->view,compact(['layout','feed']));
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

    public function shop()
    {
        $layout = $this->layout;
        return view('home.shop', compact(['layout']));
    }

    public function tos()
    {
        $layout = $this->layout;
        return view('home.tos', compact(['layout']));
    }
}
