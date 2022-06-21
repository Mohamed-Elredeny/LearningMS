<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>'teacher', 'middleware' => 'auth:teacher'],function(){

Route::get('/','Users\Teacher\TeacherController@home')->name('teacher.dashboard');

Route::resource('teacherTeachers','Teacher\TeachersController');
Route::resource('teacherUsers','Teacher\UsersController');

Route::any('groups/post/sharePost','Teacher\TeacherGroupsController@ShareToGroup')->name('teacher.groups.shareToGroup');

Route::resource('groupss','Teacher\TeacherGroupsController');
Route::get('groups/details/{id}','Teacher\TeacherGroupsController@details')->name('teacher.groups.details');
Route::get('groups/details/exam/{id}','Teacher\TeacherGroupsController@exams')->name('teacher.view.exam');

Route::any('groups/images/add/{uid}/{groupId}','Teacher\TeacherGroupsController@addImage')->name('teacher.groups.image.store');
Route::any('groups/images/remove','Teacher\TeacherGroupsController@removeImage')->name('teacher.groups.image.remove');
Route::any('groups/images/test','Teacher\TeacherGroupsController@test')->name('teacher.groups.test');

Route::any('groups/videos/add/{uid}/{groupId}','Teacher\TeacherGroupsController@addVideo')->name('teacher.groups.video.store');
Route::any('groups/videos/remove','Teacher\TeacherGroupsController@removeVideo')->name('teacher.groups.video.remove');
Route::any('groups/videos/test','Teacher\TeacherGroupsController@testvid')->name('teacher.groups.testvid');

Route::any('groups/files/add/{uid}/{groupId}','Teacher\TeacherGroupsController@addFile')->name('teacher.groups.file.store');
Route::any('groups/files/remove','Teacher\TeacherGroupsController@removeFile')->name('teacher.groups.file.remove');
Route::any('groups/files/test','Teacher\TeacherGroupsController@testfile')->name('teacher.groups.testfile');

Route::any('groups/audios/add/{uid}/{groupId}','Teacher\TeacherGroupsController@addAudio')->name('teacher.groups.audio.store');
Route::any('groups/audios/remove','Teacher\TeacherGroupsController@removeAudio')->name('teacher.groups.adio.remove');
Route::any('groups/audios/test','Teacher\TeacherGroupsController@testAudio')->name('teacher.groups.testaudio');

Route::any('groups/post/share/{id}','Teacher\TeacherGroupsController@postShare')->name('teacher.groups.postSare');
Route::any('groupss/post/delete/{id}','Teacher\TeacherGroupsController@postDelete')->name('teachergroups.postDelete');



Route::resource('teacherGroupExams','Teacher\ExamsController');
Route::resource('teacherGroupQuestions','Teacher\QuestionsController');
Route::get('groupExams/create/{id}/{type}','Teacher\ExamsController@create')->name('teacher.groupExams.create');
Route::post('groupExams/store/with/{type}','Teacher\ExamsController@storeWithType')->name('teacher.groupExams.store.type');
Route::get('groupExams/publishOrHide/{type}/{id}','Teacher\ExamsController@publishOrHide')->name('teacher.groupExams.publishOrHide');
Route::get('groupExams/students/answers/{group_id}/{exam_id}','Teacher\ExamsController@studentsAnswers')->name('teacher.groupExams.studentsAnswers');
Route::get('groupExams/students/rank/{group_id}/{exam_id}','Teacher\ExamsController@studentsRank')->name('teacher.groupExams.studentsRank');
Route::get('groups/details/{id}','Teacher\GroupsController@details')->name('teacher.group.details');
Route::post('edit/exam/details/{exam_id}','Teacher\ExamsController@editExamDetails')->name('teacher.edit.exam.details');

});
