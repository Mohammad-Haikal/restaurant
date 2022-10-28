<x-template>
    <main class="container mt-3">
        <h2 data-aos="fade-up">Our Menu</h2>
        <div class="row g-2 justify-content-center py-2">
            @include('partials._search-bar')
        </div>
        <div class="row g-2 justify-content-center">
            @if (count($categories) == 0)
                <p>No items found</p>
            @else
                @foreach ($categories as $category)
                    {{-- Category Card --}}
                    <x-cat-card :category="$category" />
                @endforeach
            @endif
        </div>
    </main>
</x-template>
