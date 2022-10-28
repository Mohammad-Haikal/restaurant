<x-template>
    <main class="row g-0">
        @include('partials._admin-sidebar')
        <div class="col p-3">
            <h1>Admin Dashboard</h1>
            <div class="row">
                <div class="col m-1 bg-white p-3 shadow-sm">
                    <h3>Top 5 Selling Items</h3>

                    <div class="overflow-auto">
                        <table class="table-striped mb-3 table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <h4>Image</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Title</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Category</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Price</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Sold</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topItems as $topItem)
                                    @php
                                        $item = App\Models\Item::find($topItem['item_id']);
                                    @endphp

                                    <tr class="align-items-center">
                                        <td>
                                            <a href="/item/{{ $item['id'] }}"><img class="h-auto" src="{{ asset('storage/' . $item['img']) }}" alt="image" style="width: 50px"></a>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $item['title'] }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $item->category['name'] }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $item['price'] }} JD</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-danger mb-0">{{ $topItem['count'] }} times</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Chart JS Canvas 1 --}}
                <div class="col-md-4 p-4">
                    <canvas id="chart1">Your browser does not support the canvas element.</canvas>
                </div>

                <div class="col m-1 bg-white p-3 shadow-sm">
                    <h3>Top 5 Customer Orders</h3>
                    <div class="overflow-auto">
                        <table class="table-striped mb-3 table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <h4>Customer Name</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Email</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Order Number</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Ordered Items</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topCustomerOrders as $topCustomerOrder)
                                    @php
                                        $user = App\Models\User::find($topCustomerOrder['user_id']);
                                    @endphp

                                    <tr class="align-items-center">
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $user['name'] }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $user['email'] }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-danger mb-0">{{ $topCustomerOrder['count'] }} times</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-danger mb-0">{{ $topCustomerOrder['quantity'] }} items</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Chart JS Canvas 2 --}}
                <div class="col-md-4 p-4">
                    <canvas id="chart2">Your browser does not support the canvas element.</canvas>
                </div>

                <div class="m-1 bg-white p-3 shadow-sm">
                    <h3>New Customers</h3>
                    <div class="overflow-auto">
                        <table class="table-striped mb-3 table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <h4>ID</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Name</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Email</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Joined At</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="align-items-center">
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $user['id'] }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $user['name'] }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $user['email'] }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">{{ $user['created_at']->format('Y-m-d') }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Chart JS --}}
    <script src="{{ asset('js/dashboard-charts.min.js') }}"></script>
    <script type="text/javascript">
        function drawChart(labels, dataValues, type, elementId) {
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Dataset',
                    backgroundColor: [
                        '#DC3545',
                        '#0D6EFD',
                        '#36e267',
                        '#fdd835',
                        '#295484',
                    ],
                    borderColor: 'rgb(248, 250, 252)',
                    data: dataValues,
                }]
            };

            const config = {
                type: type,
                data: data,
                options: {}
            };

            new Chart(
                document.getElementById(elementId),
                config
            );
        }


        drawChart(
            [
                @foreach ($topItems as $topItem)
                    @php
                        $item = App\Models\Item::find($topItem['item_id']);
                    @endphp
                        '{{ $item['title'] }}',
                @endforeach
            ],
            [
                @foreach ($topItems as $topItem)
                    '{{ $topItem['count'] }}',
                @endforeach
            ],
            'doughnut',
            'chart1'
        )

        drawChart(
            [
                @foreach ($topCustomerOrders as $topCustomerOrder)
                    @php
                        $user = App\Models\User::find($topCustomerOrder['user_id']);
                    @endphp
                        '{{ $user['name'] }}',
                @endforeach
            ],
            [
                @foreach ($topCustomerOrders as $topCustomerOrder)
                    '{{ $topCustomerOrder['count'] }}',
                @endforeach
            ],
            'doughnut',
            'chart2'
        )
    </script>
</x-template>
