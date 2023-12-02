<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
     public function index()
    {
        $donations = Donation::with('user', 'sociallyEndangered')->paginate(10);
        return view('donations.index', ['donations' => $donations]);
    }

    public function edit(Donation $donation)
    {
        return view('donations.edit', ['donation$donation' => $donation]);
    }

    public function update(Request $request, Donation $donation)
    {
        $donation->update($request->all());
        return redirect()->route('donation.index')->with('success', 'Donation updated successfully!');
    }
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donation.index')->with('success', 'Donation deleted successfully!');
    }
}