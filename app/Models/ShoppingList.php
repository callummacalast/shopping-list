<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShoppingList extends Model
{
    use HasFactory;

    protected $fillable = ['spend_limit'];

    public function items()
    {
        return $this->hasMany(ShoppingListItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotal()
    {
        $shoppingItems = ShoppingList::where('user_id',Auth::user()->shoppingList->user_id);
        dd($shoppingItems);
    }
}
