



                                    <div class="" id="likebutton{{ $article->id }}">
                                        <div class="" id="content{{ $article->id }}">



                                        <i type="button"
                       @if (in_array($article->id , App\User::find(Auth::user()->id)->like()->pluck('article_id')->toArray()))
                                        id="unlike"
                                        class="unlike fas fa-heart ms-2 float-end"
                                        style="font-size: 1.5rem; color: rgb(255, 34, 82);"
                                        @else
                                        class="like far fa-heart ms-2 float-end"
                                         style="font-size: 1.5rem; color: aliceblue;"
                                         @endif
                                        data-id="{{ $article->id }}"
                                         >
                                    </i>

                                        </div>
                                    </div>
