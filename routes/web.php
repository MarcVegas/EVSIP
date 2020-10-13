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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Pages controllers
Route::get('/', 'PagesController@index');
Route::get('/success', 'PagesController@regSuccess');
Route::get('/page/{id}', 'PagesController@page');
Route::get('/course/register/{id}', 'PagesController@registerPage');
Route::post('/course/registration', 'PagesController@registerCourse')->name('pages.store');
Route::get('/course/success', 'PagesController@registered')->name('pages.prompt');
Route::get('/all', 'PagesController@allcourses')->name('pages.all');
Route::get('/catalogue', 'PagesController@allschools')->name('pages.allschools');

//Home controller
Route::get('/home/preview/{id}', 'HomeController@show')->name('course.preview');

//Dashboard controller
Route::get('/dashboard/siteadmin', 'DashboardsController@siteAdmin');
Route::get('/dashboard/admin', 'DashboardsController@admin');
Route::get('/dashboard/department', 'DashboardsController@department');
Route::get('/dashboard/student', 'DashboardsController@student');

//Profile controller
Route::get('/dashboard/siteadmin/profile/{id}', 'SiteadminProfileController@show');
Route::put('/dashboard/siteadmin/profile/update/{id}', 'SiteadminProfileController@update');
Route::get('/dashboard/admin/profile/{id}', 'AdminProfileController@show');
Route::post('/dashboard/admin/profile/update/{id}', 'AdminProfileController@update');
Route::post('/dashboard/admin/profile/location', 'AdminProfileController@location')->name('location.store');
Route::get('/dashboard/student/profile/{id}', 'StudentProfileController@show');
Route::post('/dashboard/student/profile/update/{id}', 'StudentProfileController@update');
Route::get('/dashboard/department/profile/{id}', 'SubadminProfileController@show');
Route::put('/dashboard/department/profile/update/{id}', 'SubadminProfileController@update');

//Favorites controller
Route::resource('/dashboard/student/favorites', 'FavoritesController');

//Courses controller
Route::resource('/dashboard/admin/courses', 'CoursesController');

//Departments controller
Route::resource('/dashboard/admin/departments', 'DepartmentsController');

//Student registration controller
Route::resource('/dashboard/admin/registrations', 'StudentRegistrationController');
Route::get('/dashboard/subadmin/registrations/{id}', 'StudentRegistrationController@getDepRegistrations');

//Forum controller
Route::resource('/forum', 'ForumController');
Route::post('/forum/comment/{id}', 'ForumController@comment')->name('forum.comment');
Route::get('/posts', 'ForumController@posts')->name('forum.posts');

//Bookmark controller
Route::get('/bookmarks', 'BookmarkController@index')->name('bookmark.index');
Route::get('/bookmarks/{id}', 'BookmarkController@store')->name('bookmark.store');
Route::delete('/bookmarks/{id}', 'BookmarkController@destroy')->name('bookmark.destroy');

//Messages controller
Route::get('/message', 'MessagesController@index')->name('messages.index');
Route::get('/messages/{id}', 'MessagesController@show')->name('messages.show');
Route::post('messages', 'MessagesController@store')->name('messages.store');
Route::put('/messages/assign/{id}', 'MessagesController@update');


//Scholarships controller
Route::resource('/scholarships', 'ScholarshipsController');

//Admission controller
Route::resource('/admissions', 'AdmissionController');

//Matcher controller
Route::get('/matcher', 'MatcherController@index');
Route::get('/matcher/getmatch/{id}', 'MatcherController@match');

//Registration controller
Route::get('/dashboard/siteadmin/registrations', 'SchoolRegistrationController@index');
Route::get('/dashboard/siteadmin/review/{id}', 'SchoolRegistrationController@show');
Route::get('/dashboard/siteadmin/approve/{id}', 'SchoolRegistrationController@approve');
Route::get('/dashboard/siteadmin/deny/{id}', 'SchoolRegistrationController@deny');

//Siteadmin all users
Route::get('/dashboard/siteadmin/usermgmt', 'UserMgmtController@allUsers');
Route::get('/dashboard/siteadmin/show/school/{id}', 'UserMgmtController@showSchool');
Route::get('/dashboard/siteadmin/show/student/{id}', 'UserMgmtController@showStudent');

//Login and registration controllers
Route::get('/register/admin', 'AdminAuthController@register')->name('admin.register');
Route::post('/register/admin', 'RegisterAdminController@register')->name('registeradmin');

//Page management controller
Route::get('/pagemanagement', 'AdminPageController@index')->name('adminpage.index');
Route::get('/pagemanagement/announcement/create', 'AdminPageController@create')->name('announcement.create');
Route::post('/pagemanagement/announcement', 'AdminPageController@store')->name('announcement.store');
Route::post('/pagemanagement/announcement/update/{id}', 'AdminPageController@update')->name('announcement.update');

//Advertisement controller
Route::resource('/advertisements', 'AdvertisementController');
Route::post('/advertisements/draft', 'AdvertisementController@draft')->name('advertisements.draft');
Route::get('/advertisements/list/all', 'AdvertisementController@allAds')->name('advertisements.all');

//School Page controller
Route::post('/page/mandv', 'SchoolPagesController@store')->name('schoolpage.store');
Route::put('/page/enrollmentperiod/{id}', 'SchoolPagesController@eperiod')->name('schoolpage.eperiod');

//Gallery Controller
Route::resource('/galleries', 'GalleryController');

//Paypal Controller
Route::get('/dashboard/siteadmin/subscription/list/products', 'PayPalController@listProduct')->name('list.product');
Route::get('/dashboard/siteadmin/subscription/list/plans', 'PayPalController@listPlan')->name('list.plan');
Route::get('/dashboard/siteadmin/subscription/show/plans/{id}', 'PayPalController@showPlan');
Route::get('/dashboard/siteadmin/subscription/lists/subscriptions', 'PayPalController@listSubscription')->name('list.subscription');
Route::get('/dashboard/siteadmin/subscription/cancel/{id}', 'PayPalController@cancelSubscription');
Route::get('/dashboard/siteadmin/subscription/activate', 'PayPalController@activateSubscription');
Route::get('/dashboard/admin/subscription/setting', 'PayPalController@manageSub');

//FAQ
Route::get('/faq', function () { return view('faq');});

//Error page controller
Route::get('/account/inactive', function () {return view('loginerror');});

//Feedback Controller
Route::get('/dashboard/siteadmin/feedback', 'FeedbackController@index')->name('feedback.index');
Route::post('/dashboard/siteadmin/feedback', 'FeedbackController@store')->name('feedback.store');

//Pricing controller
Route::get('/pricing', 'PricingController@index');
Route::get('/subscribe/plan/monthly', 'PricingController@monthly')->name('pricing.monthly');
Route::get('/subscribe/plan/yearly', 'PricingController@yearly')->name('pricing.yearly');
Route::get('/subscribe/success', 'PricingController@success');
Route::get('/subscribe/cancel', 'PricingController@cancel');
Route::get('/subscribe/receipt', 'PricingController@receipt');
Route::get('/subscribe/membership/{id}', 'PricingController@updateMembership');

//Filter Course Controller
Route::get('/filter/course', 'CoursesController@filterSearch');

//Filter School Controller
Route::get('/filter/school', 'PagesController@filterSearch');

//Email Controller
Route::get('/email/registered', function ($id) {
    
});

Route::get('/cache/destroy', function () {
    cache()->forget('category');

    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/termsandconditions', 'PagesController@tac');
