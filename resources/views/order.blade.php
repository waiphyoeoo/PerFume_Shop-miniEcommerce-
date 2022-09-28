<x-admin>
<div class="card">
<h1>Orders</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>TotalPrice</th>
        <th>Opotion</th>
    </tr>
        @foreach ($orders as $o)
        <tr>
            <td>{{ $o->name}}</td>
            <td>{{ $o->price }}</td>
            <td><img src="/storage/{{ $o->thumbnail }}" alt="" class="img-responsive" width="50" height="50"></td>
            <td>{{ $o->totalPrice }}</td>
            <td><form action="/order/{{ $o->id }}" method="POST" onsubmit="return confirm('sure');">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form></td>
        </tr>
        @endforeach
    
</table>
{{ $orders->links() }}
</div>    
</x-admin>