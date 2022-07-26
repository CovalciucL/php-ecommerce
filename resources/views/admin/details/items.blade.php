@if(isset($detail['product']))
    <tr>
        <td>
            <img src="/public/{{ $detail['product']['image_path'] }}"
                 alt="{{ $detail['product']['name'] }}" height="40" width="40" >
        </td>
        <td>{{ $detail['product']['name'] }}</td>
        <td>{{ $detail['quantity'] }}</td>
        <td>{{ $detail['unit_price'] }}</td>
        <td>{{ $detail['total'] }}</td>
        <td>{{ $detail['status'] }}</td>
    </tr>
@endif