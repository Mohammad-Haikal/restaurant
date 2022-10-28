<x-template>
    <main class="container mt-3">
        <h2 data-aos="fade-up">Our Menu</h2>
        <div class="row g-2 justify-content-center py-2">
            @include('partials._search-bar')
        </div>
        <div class="d-flex flex-wrap justify-content-center py-2">
            @if (count($items) == 0)
                <p>No items found</p>
            @else
                @foreach ($items as $item)
                    {{-- Item Card --}}
                    <x-item-card :item="$item" />
                @endforeach
                @endif
            </div>
            {{ $items->links() }}
    </main>
</x-template>
