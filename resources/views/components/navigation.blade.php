  <header class="p-4 bg-gray-800 text-gray-100">
      <div class="container flex justify-between h-16 mx-auto">
          <div class="flex">
              <a rel="noopener noreferrer" href="#" aria-label="Back to homepage" class="flex items-center p-2">
                <x-svgs.shop />
              </a>
              <ul class="items-stretch hidden space-x-3 lg:flex">
                  <li class="flex">
                      <a rel="noopener noreferrer" href="{{ route('dashboard') }}"
                          class="flex items-center px-4 -mb-1 border-b-2 border-transparent hover:text-sky-400">Home</a>
                  </li>
                  <li class="flex">
                      <a rel="noopener noreferrer" href="{{ route('shopping-list') }}"
                          class="flex items-center px-4 -mb-1 border-b-2 border-transparent hover:text-sky-400">Shopping List</a>
                  </li>
                  <li class="flex">
                      <a rel="noopener noreferrer" href="{{ route('shopping-list.share') }}"
                          class="flex items-center px-4 -mb-1 border-b-2 border-transparent hover:text-sky-400">Share Shopping List</a>
                  </li>

              </ul>
          </div>
          <div class="mobile hidden bg-white rounded shadow absolute top-16 mx-auto p-3" style="width: 320px" id="mobile-menu">
            <ul class="text-sky-400">
                <a href="{{ route('dashboard') }}">
                    <li>Home</li>
                </a>
                <a href="{{ route('shopping-list') }}">
                    <li>Shopping List</li>
                </a>
                <a href="{{ route('shopping-list.share') }}">
                    <li>Share Shopping List</li>
                </a>
             
                @if(Auth::user())
                <a href="{{ route('profile.edit') }}">
                    <li>Profile</li>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="bg-gray-200">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                  this.closest('form').submit();" class="text-red-400">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                @else
                <a href="{{ route('login') }}">
                    <li>Login</li>
                </a>
                <a href="{{ route('register') }}">
                    <li>Register</li>
                </a>
                @endif
               
            </ul>
          </div>
          <div class="items-center flex-shrink-0 hidden lg:flex gap-5">
              @if (Auth::user())
                  <!-- Settings Dropdown -->
                  <div class="hidden sm:flex sm:items-center sm:ml-6">
                      <x-dropdown align="right" width="48">
                          <x-slot name="trigger">
                              <button
                                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                  <div>{{ Auth::user()->name }}</div>

                                  <div class="ml-1">
                                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                          viewBox="0 0 20 20">
                                          <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd" />
                                      </svg>
                                  </div>
                              </button>
                          </x-slot>

                          <x-slot name="content">
                              <x-dropdown-link :href="route('profile.edit')">
                                  {{ __('Profile') }}
                              </x-dropdown-link>

                              <!-- Authentication -->
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf

                                  <x-dropdown-link :href="route('logout')"
                                      onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                      {{ __('Log Out') }}
                                  </x-dropdown-link>
                              </form>
                          </x-slot>
                      </x-dropdown>
                  </div>
              @else
                  <a href="{{ route('login') }}" class="px-8 py-3 font-semibold rounded bg-sky-400 text-gray-900">Log
                      in</a>
                  <a href="{{ route('register') }}"
                      class="px-8 py-3 font-semibold rounded bg-sky-400 text-gray-900">Register</a>
              @endif
          </div>

          <button class="p-4 lg:hidden" id="mobile-button">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                  class="w-6 h-6 text-gray-100">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                  </path>
              </svg>
          </button>
      </div>
  </header>
<script>
    let mob = document.querySelector('#mobile-menu')
    let mobBtn = document.querySelector('#mobile-button')
        mobBtn.addEventListener('click', () => {
            if(mob.classList.contains('hidden')){
                mob.classList.remove('hidden')
            } else {

                mob.classList.add('hidden')
            }
        })
</script>