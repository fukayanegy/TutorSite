<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// homeに関する画面
Route::get   ('/tutors/client_home',           'App\Http\Controllers\Controller@client_home')   ->name('client_home');
Route::get   ('/tutors/tutor_home',            'App\Http\Controllers\Controller@tutor_home')    ->name('tutor_home');
Route::get   ('/tutors/mypage',                'App\Http\Controllers\Controller@mypage')        ->name('mypage');

// プロフィールに関する画面
Route::get   ('/tutors/mypage/profile/index',  'App\Http\Controllers\ProfilesController@index') ->name('profile.index');
Route::get   ('/tutors/mypage/profile/create', 'App\Http\Controllers\ProfilesController@create')->name('profile.create');
Route::post  ('/tutors/mypage/profile/store',  'App\Http\Controllers\ProfilesController@store') ->name('profile.store');
Route::get   ('/tutors/mypage/profile/edit',   'App\Http\Controllers\ProfilesController@edit')  ->name('profile.edit');
Route::post  ('/tutors/mypage/profile/edit',   'App\Http\Controllers\ProfilesController@update')->name('profile.update');

// work(依頼)を管理する画面
Route::get   ('/tutors/work/index',          'App\Http\Controllers\WorkController@index')     ->name('work.index');
Route::get   ('/tutors/work/create',         'App\Http\Controllers\WorkController@create')    ->name('work.create') ->middleware('auth');
Route::post  ('/tutors/work/store/',         'App\Http\Controllers\WorkController@store')     ->name('work.store')  ->middleware('auth');
Route::get   ('/tutors/work/edit/{work}',    'App\Http\Controllers\WorkController@edit')      ->name('work.edit')   ->middleware('auth');
Route::put   ('/tutors/work/edit/{work}',    'App\Http\Controllers\WorkController@update')    ->name('work.update') ->middleware('auth');
Route::get   ('/tutors/work/show/{work}',    'App\Http\Controllers\WorkController@show')      ->name('work.show');
Route::delete('/tutors/work/{work}',         'App\Http\Controllers\WorkController@destroy')   ->name('work.destroy')->middleware('auth');

// スキルを管理する画面
Route::get   ('/tutors/mypage/skill/index',        'App\Http\Controllers\SkillController@index')   ->name('skill.index');
Route::get   ('/tutors/mypage/skill/my_index',        'App\Http\Controllers\SkillController@my_index')->name('my_skill.index') ->middleware('auth');
Route::get   ('/tutors/mypage/skill/create',       'App\Http\Controllers\SkillController@create')  ->name('skill.create')->middleware('auth');
Route::post  ('/tutors/mypage/skill/store',        'App\Http\Controllers\SkillController@store')   ->name('skill.store') ->middleware('auth');
Route::get   ('/tutors/mypage/skill/edit/{skill}', 'App\Http\Controllers\SkillController@edit')    ->name('skill.edit')  ->middleware('auth');
Route::put   ('/tutors/mypage/skill/edit/{skill}', 'App\Http\Controllers\SkillController@update')  ->name('skill.update')->middleware('auth');
Route::get   ('/tutors/mypage/skill/show/{skill}', 'App\Http\Controllers\SkillController@show')    ->name('skill.show');
Route::delete('/tutors/mypage/skill/{skill}',      'App\Http\Controllers\SkillController@destroy') ->name('skill.destroy')->middleware('auth');

// 資格を管理する画面
Route::get   ('/tutors/mypage/certification/index',                'App\Http\Controllers\CertificationController@index')   ->name('certification.index');
Route::get   ('/tutors/mypage/certification/my_index',                'App\Http\Controllers\CertificationController@my_index')->name('my_certification.index')  ->middleware('auth');
Route::get   ('/tutors/mypage/certification/create',               'App\Http\Controllers\CertificationController@create')  ->name('certification.create') ->middleware('auth');
Route::post  ('/tutors/mypage/certification/store',                'App\Http\Controllers\CertificationController@store')   ->name('certification.store')  ->middleware('auth');
Route::get   ('/tutors/mypage/certification/edit/{certification}', 'App\Http\Controllers\CertificationController@edit')    ->name('certification.edit')   ->middleware('auth');
Route::put   ('/tutors/mypage/certification/edit/{certification}', 'App\Http\Controllers\CertificationController@update')  ->name('certification.update') ->middleware('auth');
Route::get   ('/tutors/mypage/certification/show/{certification}', 'App\Http\Controllers\CertificationController@show')    ->name('certification.show');
Route::delete('/tutors/mypage/certification/{certification}',      'App\Http\Controllers\CertificationController@destroy') ->name('certification.destroy')->middleware('auth');

// user確認画面
Route::get   ('/tutors/otherUser/{other_user}/',            'App\Http\Controllers\Controller@other_userpage')      ->name('other_user.show');
Route::post  ('/tutors/otherUser/follow/{other_user}',      'App\Http\Controllers\Controller@user_follow')         ->name('other_user.follow');

// follower一覧表示画面
Route::get   ('/tutors/mypage/followers/{my_user}',         'App\Http\Controllers\Controller@follower_index')      ->name('follower.index');
Route::get   ('/tutors/mypage/follows/{my_user}',           'App\Http\Controllers\Controller@follow_index')        ->name('follow.index');

// コメントに関する画面
Route::get   ('/tutors/mypage/comment/create/{work}',  'App\Http\Controllers\CommentController@create') ->name('comment.create') ->middleware('auth');
Route::post  ('/tutors/mypage/comment/store/{work}',   'App\Http\Controllers\CommentController@store')  ->name('comment.store')  ->middleware('auth');
Route::get   ('/tutors/comment/edit/{comment}', 'App\Http\Controllers\CommentController@edit')   ->name('comment.edit')   ->middleware('auth');
Route::put   ('/tutors/comment/edit/{comment}', 'App\Http\Controllers\CommentController@update') ->name('comment.update') ->middleware('auth');
Route::get   ('/tutors/comment/show/{comment}', 'App\Http\Controllers\CommentController@show')   ->name('comment.show');
Route::delete('/tutors/comment/{comment}',      'App\Http\Controllers\CommentController@destroy')->name('comment.destroy')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

