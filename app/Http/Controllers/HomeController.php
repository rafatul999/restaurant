<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Item;
use App\Models\Category;
use App\Models\Aboutus;
use Brian2694\Toastr\Facades\Toastr;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $items= Item::all();
        $categories= Category::all();
        $aboutus=Aboutus::all();
        return view('welcome', compact('sliders','items','categories','aboutus'));
    }

}
