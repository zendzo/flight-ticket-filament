<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function checkBooking(Request $request)
    {
      return view('pages.booking.check');
    }
}
