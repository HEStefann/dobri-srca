<?php

namespace App\Http\Controllers;

use App\Models\CardId;
use Illuminate\Http\Request;

class CardIdController extends Controller
{
    //
    public function index()
    {
        $cardids = CardId::with('user')->paginate(10);
        // dd($cardids);
        return view('card_ids.index', ['cardids' => $cardids]);
    }

    public function edit(CardId $cardid)
    {
        return view('card_ids.edit', ['cardid' => $cardid]);
    }

    public function update(Request $request, CardId $cardid)
    {
        $cardid->update($request->all());
        return redirect()->route('card_ids.index')->with('success', 'cardid updated successfully!');
    }
    public function destroy(CardId $cardid)
    {
        $cardid->delete();
        return redirect()->route('card_ids.index')->with('success', 'cardid deleted successfully!');
    }
}
