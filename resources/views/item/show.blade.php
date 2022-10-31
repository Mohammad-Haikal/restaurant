<x-template>
    <main class="container mt-3">
        @include('partials._breadcrumb', [
            'pages' => [
                [
                    'name' => 'Menu',
                    'link' => '/menu',
                    'style' => '',
                ],
                [
                    'name' => $item->category['name'],
                    'link' => '/category/'. $item['category_id'],
                    'style' => '',
                ],
                [
                    'name' => $item['title'],
                    'link' => '#',
                    'style' => 'text-reset',
                ],
            ],
        ])
        <h2 class="mb-3">{{ $item['title'] }}</h2>
        <div class="row">
            <div class="col-8 col-md-4 mb-3">
                <img class="img-fluid" src="{{ asset( $item['img']) }}" alt="img">
            </div>
            <div class="col-md-8">
                <h4>Description:</h4>
                <p style="text-align: justify">{{ $item['description'] }}</p>
                <h4>Price:</h4>
                <p class="mb-5 text-danger">{{ $item['price'] }} JD</p>

                <form class="mb-3" method="POST" action="{{ url('addToCart/' . $item['id']) }}">
                    @csrf
                    <label class="form-label h4" for="quantity">Quantity</label>
                    <input class="form-control form-control-sm mb-3" id="quantity" name="quantity" type="number" value="1" style="width: 75px" required min="1">
                    <label class="form-label h4" for="notes">Additional Notes <span class="text-muted fs-5">(optional)</span></label>
                    <textarea class="form-control form-control-sm mb-3" id="notes" name="notes" rows="3"></textarea>
                    <a class="btn btn-outline-secondary my-3" href="{{url()->previous()}}">&#8249; Back</a>
                    <button class="btn btn-danger" type="submit">Add to Basket</button>
                </form>
            </div>
        </div>
    </main>
</x-template>
