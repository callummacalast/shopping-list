<ul>

    @foreach ($shoppingList->items as $item)
        <li>{{ $item->name }}</li>
    @endforeach
</ul>
