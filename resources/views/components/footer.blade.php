<footer class="px-4 py-8 bg-gray-800 text-gray-400">
    <div class="container flex flex-wrap items-center justify-center mx-auto space-y-4 sm:justify-between sm:space-y-0">
        <div class="flex flex-row pr-3 space-x-4 sm:space-x-8">
            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-full bg-sky-400">
                <x-svgs.shop />
            </div>
            <ul class="flex flex-wrap items-center space-x-4 sm:space-x-8">
                <li>
                    <p>{{ now()->format('Y') }}</p>
                </li>

            </ul>
        </div>
        <ul class="flex lg:flex-row md:flex-row sm:flex-row flex-col pl-3 sm:space-x-8">
            <li>
                <a rel="noopener noreferrer" href="{{ route('dashboard') }}">HOME</a>
            </li>
            <li>
                <a rel="noopener noreferrer" href="{{ route('shopping-list.share') }}">SHARE SHOPPING LIST</a>
            </li>
            <li>
                <a rel="noopener noreferrer" href="{{ route('shopping-list') }}">SHOPPING LIST</a>
            </li>
        </ul>
    </div>
</footer>
