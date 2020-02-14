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

Route::get('', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();
//    return view('auth.login');
    Route::get('/home','HomeController@index');
});
Route::get('/changePassword',       'HomeController@showChangePasswordForm');
Route::post('/changePassword',      'HomeController@changePassword')    ->name('changePassword');
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/backend/')->middleware(['web','auth'])->namespace('backend')->group(function () {
    //listing page
    Route::get('class', 'ClassController@index')->name('class.index');
    //insert form
    Route::get('class/create', 'ClassController@create')->name('class.create');
    //data store
    Route::post('class', 'ClassController@store')->name('class.store');
    //view details of class
    Route::get('class/{id}', 'ClassController@show')->name('class.show');
    //edit for class
    Route::get('class/{id}/edit', 'ClassController@edit')->name('class.edit');
    //update for class
    Route::put('class/{id}', 'ClassController@update')->name('class.update');
    //delete for class
    Route::delete('class/{id}', 'ClassController@destroy')->name('class.destroy');
//    Route::get('class/{batch_class_id}/batch/{id}',  'ClassController@batchDetails')->name('instructor.batch_details');

    /*batch*/
    //listing page
    Route::get('batch', 'BatchController@index')->name('batch.index');
    //insert form
    Route::get('batch/create', 'BatchController@create')->name('batch.create');
    //data store
    Route::post('batch', 'BatchController@store')->name('batch.store');
    //view details of batch
    Route::get('batch/{id}', 'BatchController@show')->name('batch.show');
    //edit for batch
    Route::get('batch/{id}/edit', 'BatchController@edit')->name('batch.edit');
    //update for batch
    Route::put('batch/{id}', 'BatchController@update')->name('batch.update');
    //delete for batch
    Route::delete('batch/{id}', 'BatchController@destroy')->name('batch.destroy');
    //batchclass
    Route::post('batch/getClassName', 'BatchController@getClassName')->name('batch.getClassName');
    Route::get('batchclass', 'BatchController@batchList')->name('batchclass.index');
    Route::post('batchclass/add_batch_class', 'BatchController@addBatchClass')->name('batch.addBatchClass');
    Route::put('batchclass/{id}/edit_batch_class',  'BatchController@updateBatchClass')->name('batch.updateBatchClass');
    Route::delete('batchclass/{id}/deleteBatchClass', 'BatchController@deleteBatchClass')->name('batch.deleteBatchClass');
//batchClassStudent
//    Route::post('batch/addBatchClassStudent', 'BatchController@addBatchClassStudent')->name('batch.addBatchClassStudent');
//    Route::post('batch/editBatchClassStudent', 'BatchController@editBatchClassStudent')->name('batch.editBatchClassStudent');
//    Route::post('batch/listBatchClassStudent', 'BatchController@listBatchClassStudent')->name('batch.listBatchClassStudent');
//    Route::post('batch/getSection', 'BatchController@getSection')->name('batch.getSection');
   /*ExamType*/
    //listing page
    Route::get('examtype', 'ExamTypeController@index')->name('examtype.index');
    //insert form
    Route::get('examtype/create', 'ExamTypeController@create')->name('examtype.create');
    //data store
    Route::post('examtype', 'ExamTypeController@store')->name('examtype.store');
    //view details of examtype
    Route::get('examtype/{id}', 'ExamTypeController@show')->name('examtype.show');
    //edit for examtype
    Route::get('examtype/{id}/edit', 'ExamTypeController@edit')->name('examtype.edit');
    //update for examtype
    Route::put('examtype/{id}', 'ExamTypeController@update')->name('examtype.update');
    //delete for examtype
    Route::delete('examtype/{id}', 'ExamTypeController@destroy')->name('examtype.destroy');

    /*Parent*/
    //listing page
    Route::get('parent', 'ParentController@index')->name('parent.index');
    //insert form
    Route::get('parent/create', 'ParentController@create')->name('parent.create');
    //data store
    Route::post('parent', 'ParentController@store')->name('parent.store');
    //view details of parent
    Route::get('parent/{id}', 'ParentController@show')->name('parent.show');
    //edit for parent
    Route::get('parent/{id}/edit', 'ParentController@edit')->name('parent.edit');
    //update for parent
    Route::put('parent/{id}', 'ParentController@update')->name('parent.update');
    //delete for parent
    Route::delete('parent/{id}', 'ParentController@destroy')->name('parent.destroy');

    /*Exam*/
    //listing page
    Route::get('exam', 'ExamController@index')->name('exam.index');
    //insert form
    Route::get('exam/create', 'ExamController@create')->name('exam.create');
    //data store
    Route::post('exam', 'ExamController@store')->name('exam.store');
    //view details of exam
    Route::get('exam/{id}', 'ExamController@show')->name('exam.show');
    //edit for exam
    Route::get('exam/{id}/edit', 'ExamController@edit')->name('exam.edit');
    //update for exam
    Route::put('exam/{id}', 'ExamController@update')->name('exam.update');
    //delete for exam
    Route::delete('exam/{id}', 'ExamController@destroy')->name('exam.destroy');

    /*Inquiry*/
    //listing page
    Route::get('inquiry', 'InquiryController@index')->name('inquiry.index');
    //insert form
    Route::get('inquiry/create', 'InquiryController@create')->name('inquiry.create');
    //data store
    Route::post('inquiry', 'InquiryController@store')->name('inquiry.store');
    //view details of inquiry
    Route::get('inquiry/{id}', 'InquiryController@show')->name('inquiry.show');
    //edit for inquiry
    Route::get('inquiry/{id}/edit', 'InquiryController@edit')->name('inquiry.edit');
    //update for inquiry
    Route::put('inquiry/{id}', 'InquiryController@update')->name('inquiry.update');
    //delete for inquiry
    Route::delete('inquiry/{id}', 'InquiryController@destroy')->name('inquiry.destroy');
//    /*Parent*/
//    Route::post('inquiry/getParent', 'InquiryController@getParent')->name('inquiry.getParent');


    /*Result*/
    //listing page
    Route::get('result', 'ResultController@index')->name('result.index');
    //insert form
    Route::get('result/create', 'ResultController@create')->name('result.create');
    //data store
    Route::post('result', 'ResultController@store')->name('result.store');
    //view details
    Route::get('result/{id}', 'ResultController@show')->name('result.show');
    //edit
    Route::get('result/{id}/edit', 'ResultController@edit')->name('result.edit');
    //update
    Route::put('result/{id}', 'ResultController@update')->name('result.update');
    //delete
    Route::delete('result/{id}', 'ResultController@destroy')->name('result.destroy');

    /*FollowUp*/
    //listing page
    Route::get('followup', 'FollowUpController@index')->name('followup.index');
    //insert form
    Route::get('followup/create', 'FollowUpController@create')->name('followup.create');
    //data store
    Route::post('followup', 'FollowUpController@store')->name('followup.store');
    //view details
    Route::get('followup/{id}', 'FollowUpController@show')->name('followup.show');
    //edit
    Route::get('followup/{id}/edit', 'FollowUpController@edit')->name('followup.edit');
    //update
    Route::put('followup/{id}', 'FollowUpController@update')->name('followup.update');
    //delete
    Route::delete('followup/{id}', 'FollowUpController@destroy')->name('followup.destroy');

    /*Student*/
    //listing page
    Route::get('student', 'StudentController@index')->name('student.index');
    //insert form
    Route::get('student/create', 'StudentController@create')->name('student.create');
    //data store
    Route::post('student', 'StudentController@store')->name('student.store');
    //view details
    Route::get('student/{id}', 'StudentController@show')->name('student.show');
    //edit
    Route::get('student/{id}/edit', 'StudentController@edit')->name('student.edit');
    //update
    Route::put('student/{id}', 'StudentController@update')->name('student.update');
    //delete
    Route::delete('student/{id}', 'StudentController@destroy')->name('student.destroy');
    Route::post('student/getInquiredStudent', 'StudentController@getInquiredStudent')->name('student.getInquiredStudent');

    //route for batch_class_student
//    Route::post('batchclass/add_batch_class_student', 'StudentController@addBatchClassStudent')->name('batch.addBatchClassStudent');
//    Route::put('batchclass/{id}/edit_batch_class_student',  'StudentController@updateBatchClassStudent')->name('batch.updateBatchClassStudent');
//    Route::delete('batchclass/{id}/deleteBatchClassStudent', 'StudentController@deleteBatchClassStudent')->name('batch.deleteBatchClassStudent');


    /*Payment*/
    //listing page
    Route::get('payment', 'PaymentController@index')->name('payment.index');
    //insert form
    Route::get('payment/create', 'PaymentController@create')->name('payment.create');
    //data store
    Route::post('payment', 'PaymentController@store')->name('payment.store');
    //view details
    Route::get('payment/{id}', 'PaymentController@show')->name('payment.show');
    //edit
    Route::get('payment/{id}/edit', 'PaymentController@edit')->name('payment.edit');
    //update
    Route::put('payment/{id}', 'PaymentController@update')->name('payment.update');
    //delete
    Route::delete('payment/{id}', 'PaymentController@destroy')->name('payment.destroy');

    //section route
    //listing page
    Route::get('section', 'SectionController@index')->name('section.index');
    //insert form
    Route::get('section/create', 'SectionController@create')->name('section.create');
    //data store
    Route::post('section', 'SectionController@store')->name('section.store');
    //view details of section
    Route::get('section/{id}', 'SectionController@show')->name('section.show');
    //edit for section
    Route::get('section/{id}/edit', 'SectionController@edit')->name('section.edit');
    //update for section
    Route::put('section/{id}', 'SectionController@update')->name('section.update');
    //delete for section
    Route::delete('section/{id}', 'SectionController@destroy')->name('section.destroy');

    //user route
    Route::get('user', 'UserController@index')->name('user.index');
    //insert form
    Route::get('user/create', 'UserController@create')->name('user.create');
    //data store
    Route::post('user', 'UserController@store')->name('user.store');
    //view details of user
    Route::get('user/{id}', 'UserController@show')->name('user.show');
    //edit for user
    Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
    //update for user
    Route::put('user/{id}', 'UserController@update')->name('user.update');
    //delete for user
    Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
});


