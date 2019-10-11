<?php
use Intervention\Image\ImageManagerStatic as Image;
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
Route::get('/inter', function()
{
    //$img = Image::make('images/slider/3.jpg')->resize(300, 200);
    $img = Image::make('images/slider/3.jpg')->resize(400, 350)->insert('images/approved.png')->save('bar2.jpg');
    // Image::make('images/slider/3.jpg')->resize(300, 200)->save('bar.jpg');
    return $img->response('jpg');
});



Route::get('/','PagesController@home')->name("page.home");
//Route::get('/register','UserController@userRegisterView')->name("register.view");
Route::get('/verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name("verifyEmailFirst");
// Route::get('/pro-dashboard','ProfessionalController@dashboard')->name("dasboard.view");
Route::get('/verify/{email}&{confirmationToken}','Auth\RegisterController@sendEmailDone')->name("email.verify");




// Admin Route
Route::get('/admin','AdminController@login')->name("admin.login-form");
Route::get('/admin/dashboard','AdminRouteController@dashboard')->name("admin.dashboard");
//Route::get('/dashboard/application/details/{slug}','ApprovalRequestsController@appDetails')->name("app.details");
//Route::get('/dashboard/admin/application/details/{slug}','AdminRouteController@appDetails')->name("admin.app.details");
Route::get('/unauthorized',function() {
  return view("errors/unauthorized");
});


Route::post('/loginnew','Auth\LoginController@customLogin')->name("user.login");
Route::post('/admin/login','Auth\LoginController@loginProcess')->name("admin.login.process");
Route::post('/admin/dashboard/blog','BlogController@create')->name('admin-storeBlog');
Route::post('/admin/action','ApprovalController@approvalAction')->name('approval.action');

Route::post('/requestApproval','ApprovalRequestsController@applyApproval')->name('request.approval');
Route::any('/updateApproval/{id}','ApprovalRequestsController@editApproval')->name('edit.approval');




Route::group(['middleware'=>'auth'],function () {
  Route::get('/dashboard',[
    'uses'=>'AdminController@dashboard',
    'as'=>'user.dashboard',
    'middleware'=>'roles',
    'roles'=>['Public']
  ]);

    Route::get('/dashboard/apply',[
      'uses'=>'AdminController@apply',
      'as'=>'user.apply',
      'middleware'=>'roles',
      'roles'=>['Public']
    ]);

    Route::get('/dashboard/profile/{user}',[
      'uses'=>'AdminController@profile',
      'as'=>'user.profile',
      'middleware'=>'roles',
      'roles'=>['Public','AreaOfficer']
    ]);
    Route::any('/dashboard/profile/update',[
      'uses'=>'AdminController@update',
      'as'=>'profile.update',
      'middleware'=>'roles',
      'roles'=>['Public','AreaOfficer']
    ]);


  Route::get('/dashboard/application/{id}',[
    'uses'=>'AdminController@appDetails',
    'as'=>'user.application.details',
    'middleware'=>'roles',
    'roles'=>['Public','AreaOfficer']
  ]);

  Route::get('/dashboard/application/edit/{id}',[
    'uses'=>'AdminController@appEdit',
    'as'=>'user.application.edit',
    'middleware'=>'roles',
    'roles'=>['Public']
  ]);

  // Route::get('/admin/dashboard',[
  //   'uses'=>'AdminController@director',
  //   'as'=>'director.dashboard',
  //   'middleware'=>'roles',
  //   'roles'=>['Director']
  // ]);

  Route::get('/admin/dashboard',[
      'uses'=>'AdminController@areaOfficer',
      'as'=>'areaOfficer.dashboard',
      'middleware'=>'roles',
      'roles'=>["AreaOfficer"]
    ]);

    Route::get('/admin/dashboard/application/filter',[
        'uses'=>'ApplicationController@statusFilter',
        'as'=>'status_filter',
        'middleware'=>'roles',
        'roles'=>["AreaOfficer"]
      ]);
    Route::post('/admin/dashboard/receive',[
        'uses'=>'ApplicationController@received',
        'as'=>'admin.receive',
        'middleware'=>'roles',
        'roles'=>['Inspector','AreaOfficer']
      ]);
    Route::post('/admin/dashboard/reject',[
        'uses'=>'ApplicationController@reject',
        'as'=>'admin.reject',
        'middleware'=>'roles',
        'roles'=>['Inspector','AreaOfficer']
      ]);
    Route::post('/admin/dashboard/paygo',[
        'uses'=>'ApplicationController@paygo',
        'as'=>'admin.paygo',
        'middleware'=>'roles',
        'roles'=>['Inspector','AreaOfficer']
      ]);

      Route::post('/admin/meetup',[
          'uses'=>'ApplicationController@meetup',
          'as'=>'admin.meetup',
          'middleware'=>'roles',
          'roles'=>['Public','AreaOfficer']
        ]);
      Route::get('/feedback/chat',[
          'uses'=>'ApplicationController@getChat',
          'as'=>'get.feedback.chat',

        ]);

      Route::post('/feedback/chat',[
          'uses'=>'ApplicationController@feedbackChat',
          'as'=>'feedback.chat',

        ]);


      Route::get('/redirect/to/admin/dashboard',[
          'uses'=>'UserController@redirectFromNav',
          'as'=>'dashboard.redirect',

        ]);

        Route::post('/payment/transaction',[
            'uses'=>'PaymentController@payment',
            'as'=>'make.payment',
            'middleware'=>'roles',
            'roles'=>['Public','AreaOfficer']
          ]);

          Route::post('/admin/approve',[
            'uses'=>'ApprovalController@approve',
            'as'=>'approve',
            'middleware'=>'roles',
            'roles'=>['AreaOfficer']
          ]);

    });





Route::get('/applications','ApprovalRequestsController@getAll')->name('get.all.applications');

Route::get('/about','PagesController@about');
Route::get('/contact','PagesController@contact');
Route::resource('posts','PostController');
Route::post('/AjaxDelete','PostController@deleteAjax');
Route::post('/AjaxDelete','PostController@deleteAjax');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
