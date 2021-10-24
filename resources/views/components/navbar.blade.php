<nav class="flex flex-wrap bg-gray-800 pt-3 pb-2">
    <x-logo/>

            <div class="w-1/4 justify-center overflow-hidden">
                <div class="text-left">
                    
                </div>
            </div>
            <div class="w-1/5 justify-center overflow-hidden">
                <div class="text-left">
                
                </div>
            </div>
            <div class="w-1/5 justify-end">
                @if (!Auth::check())
                    <x-login_register/>
                 @else
                <x-logged-in/>
            </div>
        @endif
</nav>
<script src="{{ asset('js/toggleMenu.js') }}"></script>

