<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Gate;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
}
