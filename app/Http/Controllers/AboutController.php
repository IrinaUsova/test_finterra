<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Man;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('about');
    }

}
