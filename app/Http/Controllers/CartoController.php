<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartoController extends Controller
{
    public function index() {
        return view('carto');
    }
}
