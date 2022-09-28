<x-admin>
  @if (session('success'))
  <p class="alert alert-success text-center">{{ session('success') }}</p>
@endif
        <h4>
    Edit Form
        </h4>
            <form action="/edit/{{ $products->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH");
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" value="{{ old("name",$products->name) }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Price" name="price" value="{{ old("price",$products->price) }}">
                  @error('price')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description" name="description">{{ old('description',$products->description) }}</textarea>
                  @error('description')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="thumbnail">
                    <img src="/storage/{{ $products->thumbnail }}" alt="" height="50" width="50" class="img-responsive d-flex justify-content-start mt-2">
                </div>
                <select name="category_id" id="category" class="form-control mb-5">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == old('category_id',$products->category->id) ? 'selected' :'' }}>{{ $category->name }}</option>
                  @endforeach
              </select>
                <button type="submit" class="btn btn-primary d-flex justify-content-start">Submit</button>
              </form>
    </x-admin>
