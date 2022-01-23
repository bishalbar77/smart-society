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
|*/ 
Route::get('/', 'MyAppsController@myapps')->name('myapps');
Route::get('/getstarted', 'MyAppsController@getstarted')->name('getstarted');
Auth::routes();
//When comment on line 15 is done then we shall make this as dashboard
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['store']]);

    Route::get('/users/{user}/changestatus', 'UsersController@changestatus')->name('users.changestatus');
    Route::get('/society/users', 'UsersController@societyusers')->name('users.society');
    Route::get('/society/staff', 'UsersController@societystaff')->name('staff.society');
    
});
Route::get('/owner/users/{user}/changestatus', 'OwnerController@changestatus')->name('owner.users.changestatus');
Route::post('/society/register', 'Admin\UsersController@registersociety')->name('society.register');
Route::post('/staff/register', 'Admin\UsersController@registerstaff')->name('staff.register');
Route::get('/admin/society', 'Admin\UsersController@society')->name('users.society');
Route::get('/ajax', 'Admin\UsersController@ajax')->name('users.ajax');
Route::get('/managercreate', 'Admin\UsersController@managercreate')->name('users.managercreate');
Route::get('/staffcreate', 'Admin\UsersController@staffcreate')->name('staff.managercreate');

Route::get('/pay', 'PaymentsController@accept')->name('accept');
Route::get('/accept', 'PaymentsController@rent')->name('rent');
Route::get('/receipts', 'PaymentsController@index')->name('receipts');
Route::get('/debit/receipts', 'PaymentsController@debit')->name('debit');
Route::get('/audit', 'PaymentsController@audit')->name('audit');
Route::any('/rentstore', 'PaymentsController@store')->name('rent.store');
Route::get('/generate-pdf/{rent}','PaymentsController@pdf')->name('center.pdf');
Route::get('/registeruser', 'PagesController@registeruser');
Route::resource('/residents', 'OwnerController');
Route::get('/addowner' ,'OwnerController@addowner');
Route::any('/storeowner' ,'OwnerController@store');
Route::get('/addtenant' ,'OwnerController@addtenant');
Route::any('/storetenant' ,'OwnerController@storetenant');
Route::get('/edit', 'PagesController@edit')->name('profiles.edit');
Route::any('/profiles/{user}', 'PagesController@update')->name('profiles.update');
Route::get('/profile', 'PagesController@profile')->name('profile');

Route::resource('roles', 'RolesController');
Route::get('setup', 'AccountSetupController@index');
Route::post('/setup/store', 'AccountSetupController@store');

//Visitor
Route::resource('/visitor', 'VisitorController');
Route::any('/storevisitor', 'VisitorController@storevisitor');

//Complain
Route::get('/addticket', 'ComplainController@addticket')->name('addticket');
Route::get('/ticket', 'ComplainController@index')->name('ticket');
Route::get('/assign', 'ComplainController@assign')->name('assign');
Route::get('/ticket/{rent}/changestatus', 'ComplainController@changestatus')->name('ticket.changestatus');
Route::get('/ticket/{rent}/change', 'ComplainController@change')->name('ticket.change');
Route::any('/storeticket', 'ComplainController@store')->name('storeticket');
//Vehicle MAnagement
Route::resource('/admin/vehicle','VehicleController');
Route::post('/admin/vehicle/del','VehicleController@del')->name('admin.vehicle.del');
Route::get('/admin/deletevehicle','VehicleController@delete');
Route::get('/vehicles/{id}','VehicleController@show2')->name('vehicles.show');
Route::get('/admin/vehicle/{vehicle}/restore','VehicleController@restore')->name('admin.vehicle.restore');
//Permission
Route::resource('permissions', 'PermissionsController');

//Hospitality
Route::get('/memberpack', 'RoomAlloctionController@show');
Route::get('/hospitality', 'RoomAlloctionController@create');
Route::post('/memberinsert', 'RoomAlloctionController@offer_data');

// Society
Route::resource('/posts', 'PostsController');
Route::get('/payments', 'PostsController@payments');
Route::get('/posts/{post}/changestatus', 'PostsController@changestatus')->name('posts.changestatus');
Route::get('/center/{post}', 'PostsController@center')->name('center');
Route::get('/yourcenter/{post}', 'PostsController@yourcenter')->name('yourcenter');
Route::get('/yourcenter/{post}/edit', 'PostsController@editYourCenter')->name('yourcenter.edit');
Route::get('/posts/showdata', 'PostsController@showdata')->name('posts.showdata');
Route::get('/homepage', 'PostsController@manage')->name('posts.manage');
Route::post('/servicecentres', 'PostsController@store');
Route::get('/servicecentres/show', 'PostsController@showdata');
Route::get('/societycreate', 'PostsController@create');

// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');
Route::get('/test', 'PagesController@test'); 

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');


