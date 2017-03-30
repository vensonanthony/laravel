<?php
use App\User;
use Illuminate\Support\Facades\Input;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostsController@index');

// Route::get('/profile', function()
// {
// 	return view('partials/profile');
// });

// Log In & Registration
Auth::routes();

Route::get('/home', 'HomeController@index');


//Posts 
Route::get('/posts/create', ['uses'=>'PostsController@create']
);

Route::post('/posts', 'PostsController@store');

Route::get('/posts/show/{post}', 'PostsController@show');

Route::get('/posts/edit/{post}', 'PostsController@edit');

Route::post('/posts/update/{post}', 'PostsController@update');

Route::get('/posts/delete/{post}', 'PostsController@destroy');

Route::get('/editMe/{id}', ['as'=>'post.edit', 'uses'=>'PostsController@editMe']);


//Comments
// Route::resource('/comments/{post}', 'CommentsController');
Route::post('/comments/{post}', 'CommentsController@store');


//Replies
Route::post('/replies/{comment}', 'RepliesController@store');

//Images
//Route::resource('/images', 'ImagesController');
Route::get('/images/create', 'ImagesController@create');

Route::post('/images/store', 'ImagesController@store')->name('imageStore');

Route::get('/images/show/{id}', 'ImagesController@show')->name('imageShow');

Route::get('/images/index', 'ImagesController@index');
// https://laraveltips.wordpress.com/2015/07/29/basic-image-management-part-2/

//Avatar
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');

//Search
// Route::get ( '/searchbtn', function () {
//     return view ( 'search' );
// } );

//Search
// Route::any ( '/search', function () {
//     $q = Input::get ( 'q' );
//     if(!$q)
//     {
//     	return redirect()->back();
//     }
// 	$user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->get ();
//     return view ( 'list' )->withDetails ( $user )->withQuery ( $q );
// });

//Search 2
Route::get('/search', ['uses'=>'SearchController@getResults', 'as'=>'search.results']
);

//User Profile
Route::get('/user/{username}', ['uses'=>'ProfileController@getProfile', 'as'=>'profile.index']
);


//Like
Route::get('post/like/{id}', ['as'=>'post.like', 'uses'=> 'LikeController@likePost']
);


//Friend Request
Route::get('/test', function()
{
	return Auth::user()->test();
});

Route::group(['middleware'=>'auth'], function()
{
	Route::get('/findFriends', 'ProfileController@findFriends');

	Route::get('/addFriend/{id}', 'ProfileController@sendRequest');

	Route::get('/requests', 'ProfileController@requests');	

	Route::get('/accept/{id}/{name}', ['as'=>'profile.requests', 'uses'=> 'ProfileController@accept']);

	Route::get('/friends', ['as'=>'profile.friends', 'uses'=> 'ProfileController@friends']);

	Route::get('/requestRemove/{id}', ['as'=>'profile.remove', 'uses'=> 'ProfileController@requestRemove']);

	Route::get('/requestRemoveMe/{id}', ['as'=>'profile.removeMe', 'uses'=>'ProfileController@requestRemoveMe']);
	
	Route::get('/requestReject/{id}', ['as'=>'profile.reject', 'uses'=> 'ProfileController@requestReject']);

	Route::get('/notifications/{id}', ['as'=>'profile.notifications', 'uses'=> 'ProfileController@notifications']);

	Route::get('/profiles/{id}', ['as'=>'partials.profiles', 'uses'=>'ProfileController@index']);
	

});

Route::get('/notif', function()
{
	$noti = DB::table('notifications')
		->where('user_logged', Auth::user()->id)
		->get();
	// dd($noti);
});

Route::get('/count', function()
{
	$count =App\Notification::where('accepted', 1)
		->where('user_logged', Auth::user()->id)
		->get();
	dd($count);
});


Route::get('/template', function() 
{
	return view('layouts/temp_main');
});

Route::get('/sample', function()
{
	return view('sample');
});

