<?php

use Illuminate\Support\Facades\Route;


//თითოეული Route დაცულია არაავტორიზებული წვდომისგან Middleware-ს დახმარებით

//საწყისი გვერდი
Route::get('/', 'Controller@getSomeInfo')->middleware('auth');
//ყველა პოსტის ნახვა
Route::get('posts', 'Controller@getAllPost')->middleware('auth');
//ყველა ტურის ნახვა
Route::get('tours', 'Controller@getAllTour')->middleware('auth');
//კონკრეტული პოსტის დეტალური ნახვა
Route::get('post/{id}' , 'Controller@getPost')->name('post')->middleware('auth');
//კონკრეტული ტურის დეტალური ნახვა
Route::get('tour/{id}' , 'Controller@getTour')->name('tour')->middleware('auth');
//Logout
Route::get('/logout' ,'Auth\LoginController@logout');



Route::get('/home', 'HomeController@index')->name('home');

//Administrator
//ადმინის გვერდზე გადასვლა
Route::get('/admin' ,       'Controller@adminInfo')->middleware('admin');
Route::get('/admin/posts' , 'Controller@getAllPostAdmin')->middleware('admin');
Route::get('/admin/tours' , 'Controller@getAllTourAdmin')->middleware('admin');



//Post ის დასაედიტებელ მდგომარეობამდე მიყვანა
Route::get('/editable_post/{id}','Controller@getPostById')->name('editable_post')->middleware('admin');
//Post-ის დაედიტება
Route::put('/edit_post_force/{id}','Controller@editPost')->middleware('admin');

//Tour-ის დასაედიტებელ მდგომარეობამდე მიყვანა
Route::get('/editable_tour/{id}','Controller@getTourById')->name('editable_tour')->middleware('admin');
//Tour-ის დაედიტება
Route::put('/edit_tour_force/{id}','Controller@editTour')->middleware('admin');


//Post-ის წაშლა
Route::get('/delete_post/{id}','Controller@deletePost')->name('delete_post')->middleware('admin');

//Tour-ის წაშლა
Route::get('/delete_tour/{id}','Controller@deleteTour')->name('delete_tour')->middleware('admin');


Route::get('/add_post',function (){
    return view('add_post');
})->middleware('admin');

Route::get('/add_tour',function (){
    return view('add_tour');
})->middleware('admin');

//Post-ის დამატება
Route::post('add_post' , 'Controller@addPost')->middleware('admin');

//Tour-ის დამატება
Route::post('add_tour' , 'Controller@addTour')->middleware('admin');




/////////////////////////////////////////////////////////////////////////////////////////////////////////
//List-ში ჩამატება
Route::get('add_to_list/{user_id}/{tour_id}','Controller@addToList')->name('AddTourToList');

//List-დან ამოღება
Route::post('remove_from_list/{id}','Controller@addToList');

//List-ში ჩვენება
Route::get('/list/{id}','Controller@ShowList')->name('getList');



Auth::routes();

