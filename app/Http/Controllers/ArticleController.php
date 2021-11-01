<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{


    public function __construct(){

        $this->middleware('auth')->except('show');

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //$categories = Category::select('title' , 'id')->get();
        $categories = Category::all()->pluck('title' , 'id');
        //dd($categories);
        return view('articles.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        if(!Auth::check())
        {
            return "did you loking for somthing baby? (:";
        }

        $request->validate([

            'title' => 'min:10|max:50|required' ,
            'content' => 'min:10|required' ,
            'categories' => 'required' ,
            'image' => 'mimes:png,jpg,jpeg|max:1024|required'

        ]);

      $user = Auth::user();
      $newimagename = uniqid() . '-' . $request->title . '.' . $request->image->extension();
      $request->image->move(public_path('images') , $newimagename);
      $categories = array_values($request->categories);
    $article =  Article::create([
                                 'title' => $request->title ,
                                 'slug' =>  SlugService::createSlug(Article::class, 'slug', $request->title) ,
                                 'user_id' => Auth::user()->id ,
                                 'image_path' => $newimagename ,
                                 'content' => $request->content
                                ]);
      $article->categories()->attach($categories);


      // $data that will insert article title and content and except categories array

     // $article = Article::find($data->id); // this varbil will get ast carticle id

     /* foreach($request->categories as $category){

        $article->categories()->attach($category);


      } */
       return redirect()->to('/blog')->with('message' , __('Your article has been add succes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show( $slug)
    {

        $articleSlug = Article::where('slug', $slug)->pluck('slug')->first();
        if($slug != $articleSlug){
            return abort('404');
        }
        return view('articles.show')->with('article' , Article::where('slug' , $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {


        $article = Article::where('slug', $slug)->first();
        $articleSlug = Article::where('slug', $slug)->pluck('slug')->first();
        if ($slug != $articleSlug) {
            return abort('404');
        }elseif (Auth::id() != $article->user_id) {

            return abort('401');
        }
        $categories = Category::all()->pluck('title', 'id');

        $articleCategory = $article->categories()->pluck('category_id')->toArray();

        return view('articles.edit' , compact('articleCategory', 'categories'))
        ->with('article' , Article::where('slug', $slug)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        $article = Article::where('slug', $slug)->first();
        $articleSlug = Article::where('slug', $slug)->pluck('slug')->first();
        if ($slug != $articleSlug) {
            return abort('404');
        } elseif (Auth::id() != $article->user_id) {

            return abort('401');
        }
        $request->validate([

            'title' => 'min:10|max:50|required',
            'content' => 'min:10|required',
            'categories' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:1024|required'

        ]);
        //$article->update($request->all());
        $newimagename = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newimagename);
        $article->update([

                                 'title' => $request->title ,
                                 'slug' =>  SlugService::createSlug(Article::class, 'slug', $request->title) ,
                                 'user_id' => Auth::user()->id ,
                                 'image_path' => $newimagename ,
                                 'content' => $request->content
        ]);
        $article->categories()->sync($request->categories);
        return redirect()->to('/blog')->with('message' , __('Your artcile has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $articleSlug = Article::where('slug', $slug)->pluck('slug')->first();
        $article = Article::where('slug', $slug)->first();
        if ($slug != $articleSlug) {
            return abort('404');
        } elseif (Auth::id() != $article->user_id){

            return abort('401');
        }

        $article->delete();

        return redirect()->back();
    }
}
