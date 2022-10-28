<x-template>
    <main class="container mt-3">
        <h2>My Basket</h2>
        @if (count($cart) == 0)
            <p class="text-muted">Your basket is empty</p>
            <a class="btn btn-danger" href="/menu">&#8249; Back to menu</a>
        @else
            <div class="overflow-auto">
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
                        @foreach ($cart as $item)
                            <tr class="align-items-center">
                                <td><a href="item/{{ $item['id'] }}"><img class="h-auto" src="{{ asset('storage/' . $item['img']) }}" alt="image" style="width: 50px"></a></td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $item['title'] }}</p>
                                    <form action="/deleteFromCart/{{ $item['id'] }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-sm link-danger quantityUpdateSubmit m-0 p-0" type="submit" value="Remove">
                                    </form>
                                </td>
                                <td class="align-middle">
                                    <form class="" method="POST" action="{{ url('updateCart/' . $item['id']) }}">
                                        @csrf
                                        @method('PUT')
                                        <input class="form-control form-control-sm quantityUpdateInput mb-2 border-0 bg-transparent text-center" name="quantity" type="number" value="{{ $item['quantity'] }}" style="width: 75px" required min="1">
                                        <input class="btn btn-sm link-primary quantityUpdateSubmit m-0 p-0" type="submit" value="Update" style="display: none">
                                    </form>
                                </td>
                                <td class="align-middle">{{ $item['price'] * $item['quantity'] }} JD</td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $item['notes'] }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="h4" colspan="3">Total Price</th>
                            <td class="text-danger fw-bold" colspan="2">{{ session()->get('totalPrice', 0) }} JD</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="my-3">
                <a class="btn btn-secondary my-3" href="/menu">&#8249; Back</a>
                <a class="btn btn-danger" href="/checkout">Checkout</a>
            </div>
        @endif

    </main>
</x-template>
