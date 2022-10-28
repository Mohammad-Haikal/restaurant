<x-template>
    <main class="row g-0">
        @include('partials._admin-sidebar')
        <div class="col p-3">
            <h1>Pending Orders</h1>
            <div class="overflow-auto">
                @if (count($orders) == 0)
                    <p class="text-muted">No orders found</p>
                @else
                    <table class="table-striped mb-5 table">
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
                        <tbody id="tbody">
                            {{-- AJAX --}}
                        </tbody>

                        {{-- AJAX Order API --}}
                        <script>
                            function getOrders() {
                                $.ajax({
                                    type: "GET",
                                    url: "/api/orders?page={!!request()->page!!}",
                                    dataType: "html",

                                    success: function(response) {
                                        $('#tbody').html(response);
                                    }
                                });
                            }

                            getOrders();
                            setInterval(getOrders, 2000);
                        </script>

                    </table>

                    {{ $orders->links() }}
                @endif

                {{-- <h2>Confirmed Orders</h2> --}}
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
                            <div class="accordion-body overflow-auto p-2" style="max-height: 400px;">
                                @if (count($confirmedOrders) == 0)
                                    <p class="text-muted">No orders found</p>
                                @else
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
                                                <th scope="col">
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
                                                        <p class="text-capitalize mb-0">{{ $confirmedOrder['name'] }}</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-danger mb-0">{{ $confirmedOrder['total_price'] }} JD</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a class="btn btn-sm w-75 btn-primary" href="/order/{{ $confirmedOrder['id'] }}">Show</a>
                                                    </td>
                                                    <td class="px-0 align-middle">
                                                        <form action="/deleteOrder/{{ $confirmedOrder['id'] }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete this order, it will be deleted in all user accounts?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</x-template>
