<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Man;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $men = Man::all();
        return view('index', compact('men'));
    }

}
