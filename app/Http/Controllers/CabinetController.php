<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    /**
     *
     * @return view
     */
    public function index()
    {
        return view('front::pages.cabinet.index');
    }
}
