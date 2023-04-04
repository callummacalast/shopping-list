<x-app-layout>
    <div class="public-shopping-list bg-gray-200 ">
        <div class="container mx-auto relative">
            @if (Auth::user()->shoppingList->spend_limit)
                @if ($totalCostFormat > Auth::user()->shoppingList->spend_limit && $totalCostFormat != 0)
                    <div class="flex flex-col max-w-xs gap-2 p-6 rounded-md shadow-md bg-gray-900 text-gray-100 absolute left-1 top-1 z-50"
                        id="modal">
                        <h2 class="flex items-center gap-2 text-xl font-semibold leading-tight tracking-wide">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-6 h-6 fill-current shrink-0 text-sky-400">
                                <path
                                    d="M451.671,348.569,408,267.945V184c0-83.813-68.187-152-152-152S104,100.187,104,184v83.945L60.329,348.568A24,24,0,0,0,81.432,384h86.944c-.241,2.636-.376,5.3-.376,8a88,88,0,0,0,176,0c0-2.7-.135-5.364-.376-8h86.944a24,24,0,0,0,21.1-35.431ZM312,392a56,56,0,1,1-111.418-8H311.418A55.85,55.85,0,0,1,312,392ZM94.863,352,136,276.055V184a120,120,0,0,1,240,0v92.055L417.137,352Z">
                                </path>
                                <rect width="32" height="136" x="240" y="112"></rect>
                                <rect width="32" height="32" x="240" y="280"></rect>
                            </svg>Spend Limit Exceeded!
                        </h2>
                        <p class="flex-1 text-gray-400">Oops... You have spent too much. Try removing something from
                            your list. Or update your spend limit <a href="{{ route('profile.edit') }}"
                                class="text-white underline ">here.</a> </p>
                        <div class="flex flex-col justify-end gap-3 mt-6 sm:flex-row">
                            <button class="px-6 py-2 rounded-sm shadow-sm bg-sky-400 text-gray-900"
                                id="close-modal">Close</button>
                        </div>
                    </div>
                @endif
            @endif
        </div>


        <div class="bg-gray-200 flex flex-col gap-4 items-center justify-center container mx-auto">
            <h1 class="text-3xl font-bold">Shopping List</h1>
            <div class="flex flex-col justify-center items-center shadow bg-white p-3 rounded">
                <h2>Shopping List Total</h2>
                <span class="font-bold">
                    £{{ $totalCostFormat }} / £{{ number_format(Auth::user()->shoppingList->spend_limit, 2) }}
                </span>
            </div>

            <form action="{{ route('item.store') }}" class="w-3/4" method="post">
                <input type="hidden" name="shopping_list_id" value="{{ Auth::user()->shoppingList->id }}">
                <input type="hidden" name="quantity" value="1">
                @csrf
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only text-white">Add</label>
                <div class="grid grid-cols-2 gap-5">
                    <div class="relative">
                        <input type="text" id="item"
                            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Apples" name="name" required>

                    </div>
                    <div class="relative">
                        <input type="number" id="search" name="price"
                            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="13.00" name="price">

                    </div>
                </div>
                <div class="w-50 my-5">
                    <button type="submit"
                        class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-4 py-2 ">Add
                        Item</button>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-400">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            @foreach ($shoppingList->items as $item)
                <button
                    class="rounded-sm w-3/4 grid grid-cols-12 bg-white shadow p-3 gap-2 items-center hover:shadow-lg transition delay-150 duration-300 ease-in-out hover:scale-105 transform">

                    <!-- Icon -->
                    <div class="col-span-12 md:col-span-1">
                        <x-svgs.shop />
                    </div>
                    <!-- Title -->
                    <div class="col-span-11 xl:-ml-5 flex justify-between {{ $item->purchased ? 'purchased' : '' }}"
                        id="{{ $item->id }}">
                        <p class="text-sky-600 font-semibold flex flex-col justify-end items-start">
                            {{ $item->name }}
                            <span class="text-xs">{{ $item->price ? '£' . number_format($item->price, 2) : '' }}</span>
                        </p>
                        <p>
                            <a href="" class="purchase-item">
                                <x-svgs.money />
                            </a>
                            <a href="{{ route('item.destroy', $item) }}">
                                <x-svgs.bin />
                            </a>
                        </p>
                    </div>
                    <!-- Description -->
                    {{-- <div class="md:col-start-2 col-span-11 xl:-ml-5">
                    </div> --}}

                </button>
            @endforeach


        </div>
    </div>



    <script>
        let purchased = document.querySelectorAll('.purchase-item')

        purchased.forEach(function(node, index) {
            node.addEventListener('click', (e) => {
                let itemId = node.closest('div').attributes.id.value

                e.preventDefault();
                fetch(`{!! route('item.purchase') !!}?item=${itemId}`, {

                    headers: {
                        "Content-type": "application/json; charset=UTF-8",

                    }
                });
                node.closest('div').classList.add('purchased');


            });
        })
        console.log(purchased);


        let modalBtn = document.querySelector('#close-modal');

        console.log(modalBtn.addEventListener('click', () => {
            let modal = modalBtn.closest('#modal')
            let hideModal = modal.classList.add('hide-modal')

        }));
    </script>

</x-app-layout>
