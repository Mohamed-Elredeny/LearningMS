<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('site.index');
})->name('/')->middleware('auth');*/
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'MokaController@index')->name('/');
Route::any('/home', 'MokaController@index')->name('home');

Route::any('/sendMailCotactUs', 'MokaController@sendMailCotactUs')->name('sendMailCotactUs');

Route::any('/site/users/edit', 'MokaController@edit')->name('site.users.edit');
Route::any('/site/users/update/{id}', 'MokaController@update')->name('site.users.update');

Route::any('/site/group/details/{id}', 'MokaController@groupDetails')->name('site.group.details');



Route::group(['middleware'=>'Admin'],function(){
    Route::get('admin/home', 'HomeController@authenticationValidateAdmin')->name('admin.route');
});
Route::get('sad',function () {
    $rand = rand(0,1);
    $rand1 = rand(0,1);
    $name = ['martina','osama'];
   return $name[$rand] . ' task ' . ($rand1+1);
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::any('/checkAuthLogin', 'HomeController@checkAuthLogin')->name('check.auth.login');
Route::any('/adminLogin/{password}/{email}', 'Auth\AdminLoginController@login')->name('admin.login');
Route::any('/teacherLogin/{password}/{email}', 'Auth\TeacherLoginController@login')->name('teacher.login');
Route::any('/userLogin/{password}/{email}', 'Auth\UserLoginController@login')->name('user.login');
Route::get('group/exam/view/{exam_id}','Admin\ExamsController@viewExam')->name('student.view.exam');
Route::post('group/exam/solve','Admin\ExamsController@solveExam')->name('student.solve.exam');
Route::get('group/exam/solved/answers/{answer_id}/{type}','Admin\ExamsController@getSolvedAnswers')->name('student.get.solved.answers');
Route::get('group/exam/result/{answer_id}','Admin\ExamsController@viewResult')->name('student.exam.result');
