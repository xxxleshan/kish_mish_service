<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'bike_model' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);

        Booking::create($validated);

        return redirect()->back()->with('success', 'Заявка отправлена!');
    }

    public function index()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('admin.bookings', compact('bookings'));
    }
}