<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Use_;

class PageController extends Controller
{


    public function timeline()
    {

        if(!Auth::check())
        {
            return redirect()->to('/blog');
        }

        $user_id = User::find(Auth::user()->id);
        $get_following_ids = $user_id->following->pluck('id');
        $following_articles = Article::orderBy('created_at', 'DESC')->whereIn('user_id' , $get_following_ids)->get();

        return view('timeline.timeline' ,compact('following_articles' , 'user_id' , 'get_following_ids'));


  }
  public function index()
  {
        $articles = Article::all();

        return view('blog.index' , compact('articles'));


  }

  public function web()
  {
      $categoriesArticles = Category::find('2')->articles;
      return view('Categories.web' , compact('categoriesArticles'));
  }

    public function design()
    {
        $categoriesArticles = Category::find('1')->articles;
        return view('Categories.design', compact('categoriesArticles'));
    }

    public function contact()
    {

      $message = __('Please fill the form ');

      $information = __('please remember we dont work on <h5>Tuesday</h5>');
      $user = Auth::user();

      $options = [
                  'general'=> 'General message' ,
                  'devWeb'=> 'web development' ,
                  'askme'=> 'ask me for qustion'
      ];


      return view('contact', compact('message', 'information', 'user', 'options'));
    }

   public function Contactstore(Request $request){

     $validateData = $request->validate([

          'sender_name'=> 'required|max:10|min:1' ,
          'message'=> 'required|max:20|min:2'


     ]);

    $request->session()->put('username', $request->sender_name);
    return trans('interface.okk');

   }
    public function about(Request $request)
    {
      $username = $request->session()->get('username', 'usernamek');
      return view('about', ['username' => $username]);
    }

    public function clearname(Request $request){

      $request->session()->flush();
      return redirect()->back();
    }

    public function test()
    {
      return view('test');
    }
}
