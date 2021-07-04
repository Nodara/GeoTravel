<?php

use Illuminate\Support\Facades\Route;


//თითოეული მნიშვნელოვანი Route დაცულია არაავტორიზებული წვდომისგან Middleware-ს დახმარებით

//საწყისი გვერდი
Route::get('/', 'Controller@getSomeInfo');
//ყველა პოსტის ნახვა
Route::get('posts', 'PostsController@getAllPost');
//ყველა ტურის ნახვა
Route::get('tours', 'ToursController@getAllTour');
//კონკრეტული პოსტის დეტალური ნახვა
Route::get('post/{id}' , 'PostsController@getPost')->name('post');
//კონკრეტული ტურის დეტალური ნახვა
Route::get('tour/{id}' , 'ToursController@getTour')->name('tour');
//Logout
Route::get('/logout' ,'Auth\LoginController@logout')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');

//Administrator
//ადმინის გვერდზე გადასვლა
Route::get('/admin' ,       'Controller@adminInfo')->middleware('admin');
Route::get('/admin/posts' , 'PostsController@getAllPostAdmin')->middleware('admin');
Route::get('/admin/tours' , 'ToursController@getAllTourAdmin')->middleware('admin');



//Post ის დასაედიტებელ მდგომარეობამდე მიყვანა
Route::get('/editable_post/{id}','PostsController@getPostById')->name('editable_post')->middleware('admin');
//Post-ის დაედიტება
Route::put('/edit_post_force/{id}','PostsController@editPost')->middleware('admin');

//Tour-ის დასაედიტებელ მდგომარეობამდე მიყვანა
Route::get('/editable_tour/{id}','ToursController@getTourById')->name('editable_tour')->middleware('admin');
//Tour-ის დაედიტება
Route::put('/edit_tour_force/{id}','ToursController@editTour')->middleware('admin');


//Post-ის წაშლა
Route::get('/delete_post/{id}','PostsController@deletePost')->name('delete_post')->middleware('admin');

//Tour-ის წაშლა
Route::get('/delete_tour/{id}','ToursController@deleteTour')->name('delete_tour')->middleware('admin');


Route::get('/add_post',function (){
    return view('add_post');
})->middleware('admin');

Route::get('/add_tour',function (){
    return view('add_tour');
})->middleware('admin');

//Post-ის დამატება
Route::post('add_post' , 'PostsController@addPost')->middleware('admin');

//Tour-ის დამატება
Route::post('add_tour' , 'ToursController@addTour')->middleware('admin');




/////////////////////////////////////////////////////////////////////////////////////////////////////////
//List-ში ჩამატება
Route::get('add_to_list/{user_id}/{tour_id}','Controller@addToList')->name('AddTourToList');

//List-დან ამოღება
Route::post('remove_from_list/{id}','Controller@addToList');

//List-ში ჩვენება
Route::get('/list/{id}','Controller@ShowList')->name('getList');



Auth::routes();

