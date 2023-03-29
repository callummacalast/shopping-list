<?php

namespace App\Http\Controllers;

use App\Models\ShoppingListItem;
use Illuminate\Http\Request;

class ShoppingListItemController extends Controller
{
    public function index()
    {
        $shoppingListItems = ShoppingListItem::all();

        return view('shopping-list.index', compact('shoppingListItems'));
    }
}
