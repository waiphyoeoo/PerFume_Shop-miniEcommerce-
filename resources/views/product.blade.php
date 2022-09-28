<x-admin>
  @if (session('success'))
  <p class="alert alert-success text-center">{{ session('success') }}</p>
@endif
    <h4>Show Product</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col" colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <td><img src="/storage/{{ $product->thumbnail }}" alt="" class="img-responsive" width="50" height="50"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->category->name }}</td>
            <td><form action="/edit/{{ $product->id }} " method="GET">
              <button class="btn btn-primary">Update</button>
            </form></td>
            <td><form action="/delete/{{ $product->id }}" method="POST" onsubmit="return confirm('sure')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $products->links() }}

</x-admin>