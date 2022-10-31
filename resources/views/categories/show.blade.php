<x-template>
    <div class="position-relative bg-img d-flex justify-content-center align-items-center mb-2 overflow-hidden text-white shadow" style="background-image: url('{{ asset( $category['img']) }}');">
        <div class="bg-filter-layer"></div>
        <h1 class="text-capitalize" style="z-index: 1;">{{ $category['name'] }}</h1>
    </div>
    <main class="container">
        @include('partials._breadcrumb', [
            'pages' => [
                [
                    'name' => 'Menu',
                    'link' => '/menu',
                    'style' => '',
                ],
                [
                    'name' => $category['name'],
                    'link' => '#',
                    'style' => 'text-reset',
                ],
            ],
        ])
        @isset($items)
            <div class="row g-2 justify-content-center p-2">
                @if (count($items) == 0)
                    <p>No items found</p>
                @else
                    @foreach ($items as $item)
                        <x-item-card :item="$item" />
                    @endforeach
                @endif
            </div>
        @endisset
    </main>
</x-template>
