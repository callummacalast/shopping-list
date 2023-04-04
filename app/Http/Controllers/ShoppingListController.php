<?php

namespace App\Http\Controllers;

use App\Mail\ShareShoppingList;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShoppingListController extends Controller
{
    public function index()
    {
        $shoppingItems = ShoppingList::where('user_id', Auth::user()->shoppingList->user_id)->first();
        $itemPrices = [];
        foreach ($shoppingItems->items as $item) {
            $itemPrices[] = $item->price;
        }
        $totalCost = array_sum($itemPrices);
        $totalCostFormat = number_format($totalCost, 2);

        $shoppingList = ShoppingList::with('items')->where('user_id', Auth::user()->id)->first();

        return view('shopping-list.index', compact('shoppingList', 'totalCostFormat'));
    }



    public function purchased(Request $request, ShoppingListItem $shoppingListItem)
    {
        $shoppingListItem->purchased = 1;
        $shoppingListItem->updateOrFail();

        return back()->with('success', 'Item purchased');
    }

    public function update(Request $request)
    {
        $shoppingList = ShoppingList::where('user_id', Auth::user()->id)->first();
        $validated = $request->validate([
            'spend_limit' => 'numeric'
        ]);

        $shoppingList->fill($validated);

        $shoppingList->save();

        return back()->withErrors('success', 'Spend limit entered');
    }


    public function share()
    {
        return view('shopping-list.share');
    }

    public function sendList(Request $request)
    {
        $recipient = $request->input('email');

        $shoppingList = ShoppingList::where('user_id', Auth::user()->id)->first();

        Mail::to($recipient)->send(new ShareShoppingList($shoppingList));

        return back()->withErrors('Shopping List Shared');
    }


    public function destroy(ShoppingListItem $shoppingListItem)
    {
        $shoppingListItem->delete();

        return back()->with('success', 'Item removed');
    }
}
