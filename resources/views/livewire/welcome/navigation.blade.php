<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">

    <a href="{{ route('login') }}"
        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        wire:navigate>Log in</a>

    <a href="{{ route('register') }}"
        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        wire:navigate>Register</a>
</div>
