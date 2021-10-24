<x-master>
    @section('main')

        <x-navbar/>

        <x-productcard :groupedProducts="$groupedProducts"/>

        <div class="mx-auto pb-4 w-1/4">
            {{ $groupedProducts->links() }}
        </div>

    @endsection
</x-master>
