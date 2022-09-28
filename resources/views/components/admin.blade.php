<x-layout>
    
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-5">
                <ul class="list-group">
                    <li class="list-group-item"><a href="/">Home</a> </li>
                    <li class="list-group-item"> <a href="/create"> Create Product
                    </a></li>
                    <li class="list-group-item"><a href="/show">Show Product</a> </li>
                    <li class="list-group-item"><a href="/order">Order</a> </li>
                    <li class="list-group-item"><form action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-lg btn-outline-primary">Logout</button></form></li>

                </ul>
            </div>
            <div class="col-md-10 mt-4 text-center">
                <h1>Admin DashBoard</h1>
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>