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

//    ---- Admin
    public function getAllPostAdmin(){
        $posts = Posts::get();

        return view('admin_posts',[
            'posts' => $posts
        ]);}

    //აბრუნებს ერთ პოსტს
    public function getPost($id){
        $post = Posts::where('id',$id)->get();

        return view('post',[
            'post' => $post]);
    }


    //აბრუნებს ყველა ტურს
    public function getAllTour(){
        $tours  = Tours::get();

        return view('tours',[
            'tours' => $tours
        ]);
    }

    public function getAllTourAdmin(){
        $tours  = Tours::get();

        return view('admin_tours',[
            'tours' => $tours
        ]);
    }

    //აბრუნებს ერთ ტურს
    public function getTour($id){
        $tour = Tours::where('id',$id)->get();

        return view('tour',[
            'tour' => $tour]);
    }


    public function adminInfo(){
        return view('/admin',[
            'postsQuantity' => Posts::all()->count(),
            'toursQuantity' => Tours::all()->count(),
            'usersQuantity' => Users::all()->count() - 1
        ]);

    }

    public function getPostById($id){
        $post = Posts::where('id',$id)->get();

        return view('edit_post',[
            'post' => $post]);
    }


    public function editPost(Request $request,$id){
        $posts = Posts::find($id);
        $posts->title = $request->post('title');
        $posts->text  = $request->post('text');
        $posts->image_url = $request->post('image_url');
        $posts->save();

        return redirect('/admin/posts');

    }

    public function getTourById($id){
        $tour = Tours::where('id',$id)->get();

        return view('edit_tour',[
            'tour' => $tour]);
    }


    public function editTour(Request $request,$id){
        $tours = Tours::find($id);
        $tours->title = $request->post('title');
        $tours->text  = $request->post('text');
        $tours->image_url = $request->post('image_url');
        $tours->cost      = $request->post('cost');
        $tours->duration  = $request->post('duration');
        $tours->save();

        return redirect('/admin/tours');

    }
    public function deletePost($id){
        $post = Posts::find($id);
        $post->delete();
        return redirect('/admin/posts');
    }

    public function deleteTour($id){
        $tour = Tours::find($id);
        $tour->delete();
        return redirect('/admin/tours');
    }

    public function addPost(Request $request){
        $post = new Posts;
        $post->title = $request->post('title');
        $post->text  = $request->post('text');
        $post->image_url = $request->post('image_url');
        $post->save();
        return redirect('/admin/posts');
    }

    public function  addTour(Request $request){
        $tour = new Tours;
        $tour->title = $request->post('title');
        $tour->text  = $request->post('text');
        $tour->image_url = $request->post('image_url');
        $tour->cost = $request->post('cost');
        $tour->duration = $request->post('duration');
        $tour->save();
        return redirect('/admin/tours');
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
