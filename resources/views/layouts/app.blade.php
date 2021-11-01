@include('layouts.header')
@include('layouts.nav2')

    <div id="app">

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

@if (session()->has('message'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session()->get('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
            @yield('content')
        </main>
    </div>

    @include('layouts.footer')
