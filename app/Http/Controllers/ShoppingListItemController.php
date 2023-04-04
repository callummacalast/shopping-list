<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingItemRequest;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingListItemController extends Controller
{
    public function index()
    {
        $shoppingListItems = ShoppingListItem::all()->sortBy('created_at', 'asc');

        return view('shopping-list.index', compact('shoppingListItems'));
    }

    public function store(ShoppingItemRequest $request)
    {
        $validated = $request->validated();

        $shoppingListItem = new ShoppingListItem();

        $shoppingListItem->fill($validated);

        $shoppingListItem->save();

        return back()->withErrors('Item added');
    }

    public function destroy(ShoppingListItem $shoppingListItem)
    {
        $shoppingListItem->delete();

        return back()->withErrors('Item Successfully Removed');
    }

    public function purchased(Request $request, ShoppingListItem $shoppingListItem)
    {

        $item = $request->input('item');

        $shoppingListItem = ShoppingListItem::find($item);

        $shoppingListItem->purchased = 1;

        $shoppingListItem->update();

        return response()->json([
            'message' => 'woo'
        ]);
    }
}
