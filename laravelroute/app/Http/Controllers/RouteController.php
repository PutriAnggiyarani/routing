<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    //public function index
    public function index() {
        return "This is From Controller";
    }

    public function profile($profileId) {
        return "This is Profile from Controller, profile id: ".$profileId;
    }
    
}
