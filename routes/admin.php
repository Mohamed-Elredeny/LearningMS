<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin'],function(){
    Route::get('/','Users\Admin\AdminController@home')->name('admin.dashboard');
    Route::any('groups/post/sharePost','Admin\GroupsController@ShareToGroup')->name('groups.shareToGroup');

    Route::resource('admins','Admin\AdminsController');
    Route::resource('teachers','Admin\TeachersController');
    Route::resource('users','Admin\StudentsController');

    Route::resource('groups','Admin\GroupsController');
    Route::get('groups/details/{id}','Admin\GroupsController@details')->name('group.details');
    Route::get('groups/details/exam/{id}','Admin\GroupsController@exams')->name('admin.view.exam');

    Route::resource('groupQuestions','Admin\QuestionsController');
    Route::get('removeQuestion/{id}','Admin\QuestionsController@removeQuestion')->name('remove.question.exam');
    Route::post('exam/editAllQuestions/{exam_id}/{type}','Admin\QuestionsController@editAllQuestions')->name('edit.question.exam');
    Route::post('edit/exam/details/{exam_id}','Admin\ExamsController@editExamDetails')->name('edit.exam.details');

    Route::resource('groupStudents', 'Admin\StudentsController');
    Route::get('test_ajax', function () {
        return view('admin.groups.exams.questions.test_ajax');
    });

    Route::resource('groupExams','Admin\ExamsController');
    Route::resource('groupQuestions','Admin\QuestionsController');
    Route::get('groupExams/create/{id}/{type}','Admin\ExamsController@create')->name('groupExams.create');
    Route::post('groupExams/store/with/{type}','Admin\ExamsController@storeWithType')->name('groupExams.store.type');




    Route::get('groupExams/publishOrHide/{type}/{id}','Admin\ExamsController@publishOrHide')->name('groupExams.publishOrHide');
    Route::get('groupExams/students/answers/{group_id}/{exam_id}','Admin\ExamsController@studentsAnswers')->name('groupExams.studentsAnswers');
    Route::get('groupExams/students/rank/{group_id}/{exam_id}','Admin\ExamsController@studentsRank')->name('groupExams.studentsRank');


    Route::any('groups/images/add/{uid}/{groupId}','Admin\GroupsController@addImage')->name('groups.image.store');
    Route::any('groups/images/remove','Admin\GroupsController@removeImage')->name('groups.image.remove');
    Route::any('groups/images/test','Admin\GroupsController@test')->name('groups.test');

    Route::any('groups/videos/add/{uid}/{groupId}','Admin\GroupsController@addVideo')->name('groups.video.store');
    Route::any('groups/videos/remove','Admin\GroupsController@removeVideo')->name('groups.video.remove');
    Route::any('groups/videos/test','Admin\GroupsController@testvid')->name('groups.testvid');

    Route::any('groups/files/add/{uid}/{groupId}','Admin\GroupsController@addFile')->name('groups.file.store');
    Route::any('groups/files/remove','Admin\GroupsController@removeFile')->name('groups.file.remove');
    Route::any('groups/files/test','Admin\GroupsController@testfile')->name('groups.testfile');

    Route::any('groups/audios/add/{uid}/{groupId}','Admin\GroupsController@addAudio')->name('groups.audio.store');
    Route::any('groups/audios/remove','Admin\GroupsController@removeAudio')->name('groups.adio.remove');
    Route::any('groups/audios/test','Admin\GroupsController@testAudio')->name('groups.testaudio');

    Route::any('groups/post/share/{id}','Admin\GroupsController@postShare')->name('groups.postSare');
    Route::any('groups/post/delete/{id}','Admin\GroupsController@postDelete')->name('groups.postDelete');


    // Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    // Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('admin.register');
    // Route::post('/register', 'Auth\RegisterController@register')->name('admin.register.submit');

});
