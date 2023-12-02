<?php

namespace App\Http\Controllers;

use App\Models\SociallyEndangered;
use Illuminate\Http\Request;

class SociallyEndangeredController extends Controller
{
      public function index()
    {
        $sociallyEndangered = SociallyEndangered::paginate(10);
        return view('sociallyEndangered.index', ['sociallyEndangered' => $sociallyEndangered]);
    }

    public function edit(SociallyEndangered $sociallyEndangered)
    {
        return view('sociallyEndangered.edit', ['sociallyEndangered' => $sociallyEndangered]);
    }

    public function update(Request $request, SociallyEndangered $sociallyEndangered)
    {
        $sociallyEndangered->update($request->all());
        return redirect()->route('sociallyEndangered.index')->with('success', 'sociallyEndangered updated successfully!');
    }
    public function destroy(SociallyEndangered $sociallyEndangered)
    {
        $sociallyEndangered->delete();
        return redirect()->route('sociallyEndangered.index')->with('success', 'sociallyEndangered deleted successfully!');
    }
}