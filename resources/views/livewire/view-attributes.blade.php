<div class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex">
    <p class="font-bold text-lg">Product Name: {{ $title }}</p>
    <p>Weight: {{ $weight }} kg</p>
    <p>Height: {{ $height}} cm</p>
    <p>Length: {{ $length }} cm</p>
    <p>Width: {{ $width }} cm</p>
    <button wire:click="$emit('closeModal')" 
        class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-red-300">CLOSE</button>
</div>