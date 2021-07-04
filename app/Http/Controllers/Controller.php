<?php

namespace App\Http\Controllers;
use App\Models\lists;
use App\Models\Posts;
use App\Models\Tours;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getSomeInfo(){
        $posts  = Posts::get()->take(4);
        $tours  = Tours::get()->take(4);
        return view('index',[
            'posts' => $posts,
            'tours' => $tours,
        ]);
    }

   //აბრუნებს ყველა პოსტს
    public function getAllPost(){
        $posts = Posts::get();

        return view('posts',[
            'posts' => $posts
        ]);}
    public function adminInfo(){
        return view('/admin',[
            'postsQuantity' => Posts::all()->count(),
            'toursQuantity' => Tours::all()->count(),
            'usersQuantity' => Users::all()->count() - 1
        ]);
    }

    public function addToList($user_id , $tour_id){
        $lists = new Lists;
        $lists->user_id = $user_id;
        $lists->tour_id = $tour_id;
        $lists->save();
        return redirect('/tours');
    }

    public function ShowList($id){
        $data = lists::where('user_id',$id)->get();

        return view('list' , ['data' => $data]);

    }

}
