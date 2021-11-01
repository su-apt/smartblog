
  <div class="container px-4 py-5" id="">
    <h2 class="pb-2 border-bottom">{{ __('Articles') }}</h2>

    <div class="row row-cols-1 row-cols-lg-1 align-items-stretch g-4 py-5">
       @if(Auth::check() && Auth::user()->username == $username)
              @forelse ($articles as  $article)
      <div class="col d-flex justify-content-center">
        <div class="card card-cover h-20 overflow-hidden text-white bg-dark rounded-5 shadow-lg mw-50"
        style="background-image: url('{{ url('images' ,$article->image_path) }}');">
        <div class="card-header">
             <div class="dropdown float-end">
            <button class="btn btn-secondary btn-circle rounded-circle bg-opacity-10" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-h fa-lg"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item"  href="{{ route('articles.edit', $article->slug)}}" >{{ __('Update') }}</a></li>
                <li><a class="dropdown-item" href="{{ route('articles.show', $article->slug)}}">{{ __('View') }}</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                <form method="POST" action="{{ route('articles.destroy' , $article->slug) }}">
                    @method('DELETE')
                    @csrf
                    <button  class="dropdown-item btn-sm btn-danger"
                     onclick="return confirm('Delete this article? {{ $article->title }} ')">
                     {{ __('Delete') }}
                    </button>
                </form></li>
            </ul>
            </div>
            <div class="col-4 float-end">

          </div>
          <img src="{{ url('images/' ,$userdetales->avatar_path) }}" alt="Avatar"
           width="32" height="32" class="rounded-circle border border-white">
          <div class="card-body">
          <div class=" flex-column h-20 p-5 pb-3 text-white text-shadow-1">
            <h2 class=" min-vw-50 pt-1 mt-1 mb-1 display-8 lh-1 fw-bold">{{ $article->title }}</h2>
          </div>
          </div>
          <div class="card-footer" >
              <small class="float-end">{{$userdetales->username }}@</small>
<div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{ substr($article->updated_at , 0 , 10) }}</small>
              </div>


          </div>
          </div>
        </div>
      </div>
     @empty
       <p>you don't have any articles yet</p>
      @endforelse

            @else
               @forelse ($articlesNologin as  $article)
      <div class="col d-flex justify-content-center">
        <div class="card card-cover h-20 overflow-hidden text-white bg-dark rounded-5 shadow-lg mw-50"
        style="background-image: url('{{ url('images' ,$article->image_path) }}');">
        <div class="card-header">
             <div class="dropdown float-end">
            <button class="btn btn-secondary btn-circle rounded-circle bg-opacity-10"
             type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-h fa-lg"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="{{ route('articles.show', $article->slug)}}">{{ __('View') }}</a></li>
                <li><hr class="dropdown-divider"></li>
            </ul>
            </div>
            <div class="col-4 float-end">

          </div>
          <img src="{{ url('images/' ,$userdetales->avatar_path) }}" alt="Avatar"
           width="32" height="32" class="rounded-circle border border-white">
          <div class="card-body">
          <div class=" flex-column h-20 p-5 pb-3 text-white text-shadow-1">
            <h2 class=" min-vw-50 pt-1 mt-1 mb-1 display-8 lh-1 fw-bold">{{ $article->title }}</h2>
          </div>
          </div>
          <div class="card-footer" >
              <small class="float-end">{{ '@' }}{{$userdetales->username }}</small>
<div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{ substr($article->updated_at , 0 , 10) }}</small>
              </div>


          </div>
          </div>
        </div>
      </div>
     @empty
       <p>you don't have any articles yet</p>
      @endforelse

      @endif
    </div>
  </div>
