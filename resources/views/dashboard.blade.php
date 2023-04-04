<x-app-layout>
    <div class="public-shopping-list">
        <div class="bg-gray-200 flex flex-col gap-4 h-screen items-center justify-center">
            <h1 class="text-3xl font-bold">{{ Auth::user()->name }} Shopping List</h1>

            <!-- Card 1 -->
            <a class="rounded-sm lg:w-1/2 md:w-1/2 w-3/4 grid grid-cols-12 bg-white shadow p-3 gap-2 items-center hover:shadow-lg transition delay-150 duration-300 ease-in-out hover:scale-105 transform"
                href="{{ route('shopping-list') }}">

                <!-- Icon -->
                <div class="col-span-12 md:col-span-1">
                    <x-svgs.shop />
                </div>

                <!-- Title -->
                <div class="col-span-11 xl:-ml-5">
                    <p class="text-blue-600 font-semibold"> Shopping List</p>
                </div>

                <!-- Description -->
                <div class="md:col-start-2 col-span-11 xl:-ml-5">
                    <p class="text-sm text-gray-800 font-light">
                        Spend Limit: £{{ number_format(Auth::user()->shoppingList->spend_limit, 2) }} </p>
                </div>

            </a>


        </div>
    </div>
</x-app-layout>
