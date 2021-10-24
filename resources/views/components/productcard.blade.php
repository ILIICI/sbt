<div class="flex flex-wrap  pl-5 pr-5 overflow-hidden">
    @foreach ($groupedProducts as  $products)
    <div class="my-1 px-1 w-1/3 overflow-hidden">
        <div class="w-full p-1">
          <div class="bg-white shadow-lg hover:shadow-xl rounded-lg ">
            <div>
                <div class="bg-gray-400 h-64 rounded-t-lg p-4 bg-no-repeat bg-center bg-cover" 
                style="background-image: url({{ $products->product_imgURL }})">
                </div>
                @if (!is_null($products->attributes))
                <div class="px-0 mt-1 text-center bg-yellow-400 w-32 rounded-r-lg">PHYSICAL</div>
                @else
                <div class="px-0 mt-1 text-center bg-blue-400 w-32 rounded-r-lg">VIRTUAL</div>
                @endif
            </div>
            <div class="flex justify-between items-start px-2 pt-2">
              <div class="p-1 flex-grow">
                <h2 class="font-medium text-xl font-poppins">{{ $products->product_title }}</h2>
                @foreach ($products->tags as $tag )
                <div class="text-xs m-1 inline-flex items-center font-bold leading-sm 
                            uppercase px-1 py-1 bg-blue-200 text-blue-700 rounded-full">
                    {{ $tag->tag_title }}
                </div>
                @endforeach
                <p class="text-gray-500 font-nunito overflow-hidden " style="display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;">{{ $products->product_description }}</p>
              </div>
              <div class="p-1 text-right">
                <div class="text-teal-500 font-semibold text-lg font-poppins">{{ $products->product_price/100 . "£"}} </div>
              </div>
            </div>
            <div class="flex justify-center items-center px-2 pb-2">
              <div class="w-1/2 p-2">
                {{-- <button class="block w-full bg-teal-500 hover:bg-teal-600 text-white border-2 border-teal-500 hover:border-teal-600 px-3 py-2 rounded uppercase font-poppins font-medium">
     Details
                </button> --}}
              </div>
              <div class="w-1/2 p-2">
                @if (!is_null($products->attributes))
                <button onclick='Livewire.emit("openModal", "view-attributes", 
                         {{ json_encode([
                                        "title" => $products->product_title ,
                                        "weight" => $products->attributes->attribute_weight,
                                        "height" => $products->attributes->attribute_height,
                                        "length" => $products->attributes->attribute_length,
                                        "width" => $products->attributes->attribute_width]) }})'
                         class="block w-full bg-yellow-200 hover:bg-yellow-600 text-teal-500 border-2 
                         border-teal-500 px-3 py-2 rounded uppercase font-poppins font-medium">
                 VIEW ATTRIBUTES
                </button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>