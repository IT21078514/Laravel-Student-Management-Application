<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //function to return the view of home page
    public function index(){
        return view('pages.home.index');
    }

}
