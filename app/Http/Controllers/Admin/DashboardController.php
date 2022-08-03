<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Item;
use App\Models\Slider;
use App\Models\Reservation;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $reservations = Reservation::where('status',false)->get();
        $sliderCount = Slider::count();
        $contacts= Contact::where('status',false)->get();

        return view('admin.dashboard', compact('categoryCount','itemCount','reservations','sliderCount','contacts'));

    }

}
