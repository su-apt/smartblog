<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/5.1/examples/features/unsplash-photo-2.jpg" width="38" height="30"
                class="d-inline-block align-top" alt="S" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2"
            aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="تبديل التنقل">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web') }}">{{ __('Web') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('design') }}">{{ __('Design') }}</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('timeline') }}">{{ __('Time line') }}</a>
                    </li>






                    <li class="nav-item ">
                        <div class="d-flex">
                            <div class="dropdown me-1">
                                <span type="button" class="far fa-bell position-relative mt-2" id="dropdownMenuOffset"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.5rem;">
                                    @if (Auth::user()->unreadNotifications->count() != 0)
                                        <span
                                            class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger"
                                            style="font-size: 0.5rem;">
                                            {{ Auth::user()->unreadNotifications->count() }}

                                        @else
                                            <span class="visually-hidden">unread messages</span>
                                    @endif
                                </span>
                                </span>

                                <ul class="dropdown-menu mt-3 FixedHeightContainer rounded-6" style="width: 22rem;"
                                    aria-labelledby="dropdownMenuOffset">
                                    <li class="ps-container ms-1 me-1 mt-2">
                             @forelse (Auth::user()->unreadNotifications()->select('data', 'type')->get(); as $notification )
                                        @if ($notification->type == 'App\Notifications\followuser')
                                        <a href="{{ url('/') }}/{{ $notification->data['username'] }}" target="_self" class="">
                                            <div class="position-relative">
                                                <div class="d-flex py-3 my-3 bg-light text-dark rounded shadow-sm"style="height: 3.5em;">
                                                    <div class="position-absolute top-0 start-25">
                                                        <button type="button"
                                                            class="btn-close btn-close-dark mark-as-read mt-2"
                                                            data-id="{{ $notification->id }}" aria-label="Close"></button>
                                                    </div>
                                                    <div class="d-flex position-absolute top-0 end-0">
                                                        <div class="lh-1 mt-2">
                                                            <h1 class="h6 mb-0 lh-1">{{ $notification->data['name'] }}</h1>
                                                            <small>Followed you</small>
                                                        </div>
                                                        <span class="fa-stack fa-1x mt-2">
                                                            <i class="fas fa-circle fa-stack-2x"
                                                                style="color: #c0f9ff;"></i>
                                                            <i class="fas fa-user-plus fa-stack-1x fa-inverse"
                                                                style="color: #63a9f1;"></i>
                                                        </span>
                                                    </div>
                                                    <small class="opacity-50 text-nowrap mt-2">now</small>
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                        @if ($notification->type == 'App\Notifications\likes')
                                        <a href="{{ url('/articles') }}/{{ $notification->data['slug'] }}" target="_self" class="">
                                            <div class="position-relative">
                                                <div class="d-flex py-3 my-3 bg-light text-dark rounded shadow-sm"style="height: 3.5em;">
                                                    <div class="position-absolute top-0 start-25">
                                                        <button type="button"
                                                            class="btn-close btn-close-dark mark-as-read mt-2"
                                                            data-id="{{ $notification->id }}" aria-label="Close"></button>
                                                    </div>
                                                    <div class="d-flex position-absolute top-0 end-0">
                                                        <div class="lh-1 mt-2">
                                                            <h1 class="h6 mb-0 lh-1"> {{ '@' }}{{ $notification->data['username'] }}</h1>
                                                            <small>{{ $notification->data['title'] }}</small>
                                                        </div>
                                                        <span class="fa-stack fa-1x mt-2">
                                                            <i class="fas fa-circle fa-stack-2x"
                                                                style="color: #ffcccc;"></i>
                                                            <i class="fas fas fa-heart fa-stack-1x fa-inverse"
                                                                style="color: rgb(255, 34, 82);"></i>
                                                        </span>
                                                    </div>
                                                    <small class="opacity-50 text-nowrap mt-2">now</small>
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                        @if ($notification->type == 'App\Notifications\comment')
                                        <a href="{{ url('/articles') }}/{{ $notification->data['slug'] }}" target="_self" class="">
                                            <div class="position-relative">
                                                <div class="d-flex py-3 my-3 bg-light text-dark rounded shadow-sm"style="height: 3.5em;">
                                                    <div class="position-absolute top-0 start-25">
                                                        <button type="button"
                                                            class="btn-close btn-close-dark mark-as-read mt-2"
                                                            data-id="{{ $notification->id }}" aria-label="Close"></button>
                                                    </div>
                                                    <div class="d-flex position-absolute top-0 end-0">
                                                        <div class="lh-1 mt-2">
                                                            <h1 class="h6 mb-0 lh-1">{{ '@' }}{{ $notification->data['username'] }}</h1>
                                                            <small>{{ $notification->data['comment'] }}</small>
                                                        </div>
                                                        <span class="fa-stack fa-1x mt-2">
                                                            <i class="fas fa-circle fa-stack-2x"
                                                                style="color: #90ffa6a4;"></i>
                                                            <i class="fas fas fa-comment fa-stack-1x fa-inverse"
                                                                style="color: rgb(0, 157, 52);"></i>
                                                        </span>
                                                    </div>
                                                    <small class="opacity-50 text-nowrap mt-2">now</small>
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                    </li>
                                        @if ($loop->last)
                                        <li class="ps-container ms-1 me-1 mt-2">
                    <div class="d-flex py-3 my-3 bg-light text-dark rounded shadow-sm">
                                                <a href="#" id="mark-all" type="" class="btn btn-primary">
                                                    Mark all as read
                                                </a>
                                            </div>
                                        </li>
                                        @endif
                                    @empty
                                        <div class="d-flex aligns-items-center justify-content-center">
                                            <span
                                                class="fa-stack fa-1x  position-absolute top-50 start-50 translate-middle"
                                                style="font-size: 3.5rem;">
                                                <i class="fas fa-circle fa-stack-2x" style="color: #c0f9ff82;"></i>
                                                <i class=" fas fa-magic fa-stack-1x fa-inverse"
                                                    style="color: #8ac1f9d6;"></i>
                                            </span>
                                        </div>
                                    @endforelse

                                </ul>
                            </div>

                        </div>
                    </li>
                @endif
            </ul>

            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-macos mx-0 shadow"
                                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 32px);">
                                <li><a class="dropdown-item"
                                        href="{{ url('/', Auth::user()->username) }}">{{ __('Profile') }}</a></li>
                                <li><a class="dropdown-item"
                                        href=" {{ route('articles.create') }}">{{ __('Create article') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
