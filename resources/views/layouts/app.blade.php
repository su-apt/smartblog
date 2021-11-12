@include('layouts.header')
@include('layouts.nav2')

    <div id="app">
@if (session()->has('message'))
<div class="toast align-items-center text-white bg-primary border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
       {{ session()->get('message') }}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif
        <main class="py-4 container-md">
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                    @foreach ($errors->all() as $error )
                        <li> {{ $error }}</li>
                    @endforeach
                    </ul>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            @endif


            @yield('content')
        </main>
    </div>

    @include('layouts.footer')
