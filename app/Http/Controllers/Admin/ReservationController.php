<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
    }
    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status =true;
        $reservation->save();
        return redirect()->route('reservation.index');

    }
        public function view($id){
        $reservation = Reservation::find($id);
        return view('admin.reservation.view', compact('reservation'));
    }


    public function destroy($id)
    {
        Reservation::find($id)->delete();
        Toastr::success('Your reservation successfully ', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('reservation.index');
    }
}
