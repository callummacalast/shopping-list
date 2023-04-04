<?php

namespace Database\Seeders;

use App\Models\ShoppingListItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingListItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShoppingListItem::create([
            'shopping_list_id' => 1,
            'name' => 'Apples',
            'quantity' => 1,
            'price' => 9.50,
            'purchased' => true
        ]);
    }
}
