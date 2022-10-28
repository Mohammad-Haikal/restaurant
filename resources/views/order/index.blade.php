<x-template>
    <main class="container mt-3">
        <h2 class="mb-3">Pending Orders</h2>
        @if (count($orders) == 0)
            <p class="text-muted">No orders found</p>
        @else
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
                                <h4>Total Price</h4>
                            </th>
                            <th scope="col">
                                <h4>Details</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="align-items-center">
                                <td class="align-middle">
                                    <p class="mb-0">{{ $order['created_at']->format('h:i A') }}<br>{{ $order['created_at']->format('Y-m-d') }}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $order['name'] }}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="text-danger mb-0">{{ $order['total_price'] }} JD</p>
                                </td>
                                <td class="align-middle">
                                    <a href="/order/{{ $order['id'] }}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="accordion" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#collapseOne" type="button" aria-expanded="false" aria-controls="collapseOne">
                        {{--  --}}
                        Confirmed Orders
                    </button>
                </h2>
                <div class="accordion-collapse collapse" id="collapseOne" data-bs-parent="#accordion" aria-labelledby="headingOne">
                    {{--  --}}
                    <div class="accordion-body p-1">
                        @if (count($confirmedOrders) == 0)
                            <p class="text-muted">No orders found</p>
                        @else
                            <div class="overflow-auto">
                                <table class="table-striped table">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <h4>Date</h4>
                                            </th>
                                            <th scope="col">
                                                <h4>By</h4>
                                            </th>
                                            <th scope="col">
                                                <h4>Total Price</h4>
                                            </th>
                                            <th scope="col">
                                                <h4>Details</h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confirmedOrders as $confirmedOrder)
                                            <tr class="align-items-center">
                                                <td class="align-middle">
                                                    <p class="mb-0">{{ $confirmedOrder['created_at']->format('h:i A') }}<br>{{ $confirmedOrder['created_at']->format('Y-m-d') }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-0">{{ $confirmedOrder['name'] }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-danger mb-0">{{ $confirmedOrder['total_price'] }} JD</p>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/order/{{ $confirmedOrder['id'] }}">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-secondary my-3" href="/">&#8249; Back</a>

    </main>
</x-template>
