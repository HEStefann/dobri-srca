<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    //
    public function index()
    {
        $subscriptions = Subscription::with('cardid')->paginate(10);
        return view('subscriptions.index', ['subscriptions' => $subscriptions]);
    }

    public function edit(Subscription $subscription)
    {
        return view('subscriptions.edit', ['subscription' => $subscription]);
    }

    public function update(Request $request, Subscription $subscription)
    {
        $subscription->update($request->all());
        return redirect()->route('subscriptions.index')->with('success', 'subscription updated successfully!');
    }
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'User deleted successfully!');
    }

}
