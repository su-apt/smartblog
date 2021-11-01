<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
              <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="https://getbootstrap.com/docs/5.1/examples/features/unsplash-photo-2.jpg"
               width="38" height="30" class="d-inline-block align-top" alt="S" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="تبديل التنقل">
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
                @endif
                    <li class="nav-item ">
                          <div class="d-flex">
                            <div class="dropdown me-1">
                              <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                                Offset
                              </button>
                              <ul class="dropdown-menu mt-3 FixedHeightContainer" style="width: 22rem;" aria-labelledby="dropdownMenuOffset">
                                <li class="ps-container">
                                    <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                        <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                        <div>
                                            <h6 class="mb-0">List group item heading</h6>
                                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                                        </div>
                                        <small class="opacity-50 text-nowrap">now</small>
                                        </div>
                                    </a>
                                    </div>
                                  </li>
                                </ul>
                            </div>

                          </div>
                             </li>
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                         <ul class="dropdown-menu dropdown-menu-macos mx-0 shadow"
                                         style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 32px);">
                                            <li><a class="dropdown-item" href="{{ url('/' , Auth::user()->username) }}">{{ __('Profile') }}</a></li>
                                            <li><a class="dropdown-item" href=" {{ route('articles.create') }}">{{ __('Create article') }}</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                         <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">  {{ __('Logout') }} </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
