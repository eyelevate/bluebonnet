<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $layout;
    private $view;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // theme 1
        // $this->layout = 'layouts.themes.theme1.layout';
        // $this->view = 'home.index';

        // theme 2
        $this->layout = 'layouts.themes.theme2.layout';
        $this->view = 'home.index2';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layout = $this->layout;
        return view($this->view,compact('layout'));
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
}
