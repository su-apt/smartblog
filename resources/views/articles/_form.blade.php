                     @csrf
                    <div class="form-group">
                        <label for="title">{{ __('Title')}}</label>
                        <input type="text" name="title" class="form-control" @isset($article)
                         value="{{ $article->title }}"
                        @endisset>
                    </div>
                  <div class="form-group">
                        <label for="image">{{ __('Title')}}</label>
                        <input type="file" name="image" class="form-control" @isset($article)
                         value="{{ $article->image_path }}"
                        @endisset>
                    </div>
                    <div class="form-group">
                        @foreach ( $categories as $key => $title)

                        <label class="form-check-label" for="category_{{ $key }}">{{ $title }}</label>
                        <input class="form-check-input" id="category_{{ $key }}" type="checkbox"
                         name="categories[]" class="form-control"
                         value="{{$key }}"
                          @if(isset($article) && in_array($key , $articleCategory))
                        checked
                         @endif>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('Content')}}</label>
                        <textarea name="content" class="form-control" id="content" cols="10" rows="10">
                         @isset($article)
                             {{ $article->content }}
                         @endisset
                        </textarea>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <button type="submit" class="btn btn-primary mr-3">
                            {{ $submitText }}
                   </button>
                   </div>
