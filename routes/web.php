<?php

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
// Route Frontend
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');


// ================================

Route::get('/login', 'AuthController@login')->name('login');
Route::post('postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

// Route::get('/dashboard', 'AdminController@index')->middleware('auth');
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/siswa', 'SiswaController@index');
    Route::get('/siswa/tambah', 'SiswaController@create');
    Route::post('/siswa', 'SiswaController@store');
    Route::get('/siswa/edit/{siswa}', 'SiswaController@edit');
    Route::patch('/siswa/{siswa}', 'SiswaController@update');
    Route::get('/siswa/{siswa}/delete', 'SiswaController@destroy');
    Route::get('/siswa/{siswa}/profile', 'SiswaController@profile');
    Route::post('/siswa/{siswa}/tambahnilai', 'SiswaController@tambahnilai');
    Route::get('/siswa/{siswa}/{mapel}/deletenilai', 'SiswaController@deletenilai');
    Route::get('/siswa/exportexcel', 'SiswaController@exportExcel');
    Route::get('/siswa/exportpdf', 'SiswaController@exportPdf');

    //Route Posts
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::get('/addpost', [
        'uses' => 'PostController@add',
        'as' => 'addpost',
    ]);
    Route::post('/post/create', [
        'uses' => 'PostController@create',
        'as' => 'post.create',
    ]);

    // Route Guru
    Route::get('/guru', 'GuruController@index')->name('guru.index');
    Route::get('/guru/tambahguru', 'GuruController@create')->name('guru.create');
    Route::post('/guru', 'GuruController@store')->name('guru.store');
    Route::get('/guru/{idguru}/profile', 'GuruController@profile');
    Route::get('/guru/{guru}/delete', 'GuruController@destroy')->name('guru.destroy');


    //Route Mapel
    Route::get('/mapel', 'MapelController@index');

    //Route Users
    Route::get('/users', 'UserController@index');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
    Route::get('/dashboard', 'AdminController@index');
});


Route::get('/{slug}', [
    //uses dan as ini adalah penamaan dari laravel
    'uses' => 'SiteController@singlepost', //uses disini maksudnya kita menggunakan Controller yang mana
    'as' => 'site.single.post' //as disini inisial namanya apa untuk ditambahkan langsung ke Href
]);
