<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{

    public function index()
    {
        return view('dashboard.welcome');

    }//end of index

}//end of controller
