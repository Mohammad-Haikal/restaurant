<x-template>
    <main class="container mt-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="mb-0">Order Details</h2>
            @if (Auth::user()->role == 1 && !$order['confirmed'])
                <form action="/confirmOrder/{{ $order['id'] }}" method="post">
                    @csrf
                    <button class="btn btn-lg btn-success" type="submit"><i class="bi me-2 bi-check-circle"></i>Confirm Order</button>
                </form>
            @endif
            @if (Auth::user()->role == 1 && $order['confirmed'])
                <form action="/denyOrder/{{ $order['id'] }}" method="post">
                    @csrf
                    <button class="btn btn-lg btn-danger" type="submit"><i class="bi me-2 bi-slash-circle"></i>Deny Order</button>
                </form>
            @endif
        </div>
        <div class="overflow-auto">
            <table class="table-striped mb-4 table">
                <thead>
                    <tr>
                        <th scope="col">
                            <h4>Date</h4>
                        </th>
                        <th scope="col">
                            <h4>By</h4>
                        </th>
                        <th scope="col">
                            <h4>Phone Number</h4>
                        </th>
                        <th scope="col">
                            <h4>Address</h4>
                        </th>
                        <th scope="col">
                            <h4>Total Price</h4>
                        </th>
                        <th scope="col">
                            <h4>Notes</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-items-center">
                        <td class="align-middle">
                            <p class="mb-0">{{ $order['created_at']->format('h:i A') }}<br>{{ $order['created_at']->format('Y-m-d') }}</p>
                        </td>
                        <td class="align-middle">
                            <p class="mb-0">{{ $order['name'] }}</p>
                        </td>
                        <td class="align-middle">
                            <p class="mb-0">{{ $order['phone'] }}</p>
                        </td>
                        <td class="align-middle">
                            <p class="mb-0">{{ $order['address'] }}</p>
                            <p class="mb-0">{{ $order['street'] . ' st.' }}</p>
                            <p class="mb-0">{{ 'Bldg ' . $order['building'] }}</p>
                            <p class="mb-0">{{ 'Floor ' . $order['floor'] }}</p>
                        </td>
                        <td class="align-middle">
                            <p class="text-danger mb-0">{{ $order['total_price'] }} JD</p>
                        </td>
                        <td class="align-middle">
                            <p class="mb-0">{{ $order['notes'] }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h4>Order Items</h4>
            @if (count($orderItems) == 0)
                <p class="text-muted">No items found</p>
            @else
                <table class="table-striped mb-3 table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <h4>Item</h4>
                            </th>
                            <th scope="col">
                                <h4>Title</h4>
                            </th>
                            <th scope="col">
                                <h4>Quantity</h4>
                            </th>
                            <th scope="col">
                                <h4>Price</h4>
                            </th>
                            <th scope="col">
                                <h4>Notes</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $item)
                            <tr class="align-items-center">
                                <td><a href="/item/{{ $item['item_id'] }}"><img class="h-auto" src="{{ asset('storage/' . $item->item['img']) }}" alt="image" style="width: 50px"></a></td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $item->item['title'] }}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $item['quantity'] }}</p>
                                </td>
                                <td class="align-middle">{{ $item->item['price'] * $item['quantity'] }} JD</td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $item['notes'] }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <a class="btn btn-secondary my-3" href="{{ url()->previous() }}">&#8249; Back</a>

    </main>
</x-template>
