<div class="flex justify-end overflow-hidden">
    <div class="text-right">
        @if (Route::has('login'))
        <div class="py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-xl">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-white text-xl">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-white text-xl">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
</div>