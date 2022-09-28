<x-layout>
   
   <div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 card mx-auto">
            <h4 class="text-center"> Admin Panel</h4>
            <form action="/admin" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                  @error('email')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" name="password" value="{{ old('password') }}">
                  @error('password')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <button type="submit" class="btn btn-primary d-flex justify-content-start mb-2">Login</button>
            </form>
        </div>
    </div>
   </div>
</x-layout>