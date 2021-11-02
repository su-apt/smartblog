<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Http\Controllers\Auth\RegisterController;
use App\Notifications\followuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $username , Article $article)
    {

        $user = User::where('username', '=',  $username)->pluck('username')->first();



        if ($user === null){

            return abort('404');

             }elseif(Auth::check()){

            $articles = Auth::user()->articles;

            $finduserid  = User::where('username', $username)->first()->id;

            $userdetales  = User::where('username', $username)->first();

            $getFollowers = $userdetales->followers()->pluck('id')->toArray();
            $getFollowing = $userdetales->following()->pluck('id')->toArray();
            $followingAuthuser = user::find(Auth::user()->id);
            $getAuthuserFollowing = $followingAuthuser->following()->pluck('id')->toArray();
            $articlesWithouLogged =  User::find($finduserid);

            $articlesNologin = $articlesWithouLogged->articles;
            return view('users.userProfile', ['user' => $user] ,
                     compact(
                         'articles' ,
                         'user' ,
                         'username' ,
                         'articlesNologin' ,
                         'userdetales' ,
                         'getFollowers' ,
                         'getFollowing' ,
                         'getAuthuserFollowing'
                        ));
             }else{

            $userdetales = User::where('username', $username)->first();
            $finduserid  = User::where('username', $username)->first()->id;
            $articlesWithouLogged =  User::find($finduserid);

            $articlesNologin = $articlesWithouLogged->articles;
            return view('users.userProfile',['user' => $user],
                   compact('user', 'username', 'articlesNologin' , 'userdetales'));

             }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function followunfollow(Request $request , $username)
    {

        $usertofollow = User::where('username', '=' , $username)->first();

       $user = Auth::user()->id;

       $userid = User::find($user);
       $user = User::find($user)->first();


        switch ($request->get('follow')) {
            case "follow":
                $userid->following()->attach($usertofollow->id);
                Notification::send($user , new followuser($usertofollow));
                //response {"status":true}
                break;
            case "unfollow":
                $userid->following()->detach($usertofollow->id);
                //response {"status":true}
                break;
            default:
                //response {"status":false, "error" : ['wrong act']}
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //return view('userProfile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user , $username )
    {
        if (!Auth::check()) {

            return redirect()->to('login');

        } elseif ($username != Auth::user()->username) {

            return redirect()->to('/blog');
        }
        $useredit = Auth::user();

        return view('users.editprofile', compact('useredit'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        if ($username != Auth::user()->username) {
            return abort('401');
        }



        $checkuserindb = User::findOrFail(Auth::user()->id);
        $attributes = $request->validate([
            'name'     => 'min:10|max:50|sometimes',
            'username' => 'sometimes|max:30|min:3|string|unique:users,username,' . $checkuserindb->id,
            'email'    => 'sometimes|email|unique:users,email,'.$checkuserindb->id,
        ]);
        $checkuserindb->update($attributes);

        return redirect()->route('userProfile', $request->username)->with('message', 'your account has been updated!');
    }

    public function updateProfileImage(Request $request , $username)
    {
        if ($username != Auth::user()->username) {
            return abort('401');
        }

        $request->validate([
            'image' => 'mimes:png,jpg,jpeg|max:1024|required'

        ]);
        $avatar_image = uniqid() . '-' . 'user' . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $avatar_image);
        $usere = User::findOrFail(Auth::user()->id);

        $usere->update([
            'avatar_path' => $avatar_image
        ]);
        return redirect()->route('userProfile', $request->username)->with('message', 'your avatar has been updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
