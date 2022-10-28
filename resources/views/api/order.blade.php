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
            <a class="btn w-75 btn-primary" href="/order/{{ $order['id'] }}">Show</a>
        </td>
    </tr>
@endforeach

