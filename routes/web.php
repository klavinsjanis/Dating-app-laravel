<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::get('/match', 'MatchController@match');
Route::get('/gallery/{user}', 'GalleryController')->name('gallery');
Route::post('/match/{user}/like', 'MatchController@likeUser')->name('match.like');
Route::post('/match/{user}/dislike', 'MatchController@dislikeUser')->name('match.dislike');
Route::get('/profile', 'ViewUserProfileController')->name('profile.view');
Route::get('/profile/edit', 'EditUserProfileController')->name('profile.edit');
Route::put('/profile/edit', 'UpdateUserProfileController')->name('profile.update');
Route::get('/matches', 'UserMatchesController@userMatch')->name('matches');
Route::get('profile/gallery', 'EditUserGalleryController')->name('profile.gallery');
Route::put('profile/gallery/edit', 'EditUserGalleryController@store')->name('profile.gallery.edit');

