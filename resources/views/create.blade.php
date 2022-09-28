<x-admin>
  @if (session('success'))
  <p class="alert alert-success text-center">{{ session('success') }}</p>
@endif
    <h4>
    Create Form
    </h4>
        <form action="/createpost" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" value="{{ old('name') }}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Price" name="price" value="{{ old('price') }}">
              @error('price')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description" name="description" >{{ old('description') }}</textarea>
              @error('description')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="thumbnail">
            </div>
            <select name="category_id" id="category" class="form-control mb-5">
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' :'' }}>{{ $category->name }}</option>
              @endforeach
          </select>
          @error('category_id')
              <p class="text-danger">{{ $message }}</p>
          @enderror
            <button type="submit" class="btn btn-primary d-flex justify-content-start">Submit</button>
          </form>
</x-admin>