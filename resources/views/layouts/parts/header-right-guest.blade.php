<div class="flex space-x-5">

    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
        {{ __('Вход') }}
    </x-nav-link>

    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
        {{ __('Регистрация') }}
    </x-nav-link>

</div>
