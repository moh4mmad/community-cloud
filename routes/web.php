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

Route::get('/404', function () {
    return view('404');
})->name('404');


Route::get('/', 'FrontendController@index')->name('index');
Route::get('/home', 'FrontendController@index')->name('home');
Route::get('/news', 'FrontendController@News')->name('news');
Route::get('/news/{id}', 'FrontendController@NewsDetails')->name('news.details');
Route::get('/events', 'FrontendController@Events')->name('events');
Route::get('/events/{id}', 'FrontendController@EventsDetails')->name('event.details');

Route::get('/events/registration/{id}', 'FrontendController@EventsReg')->name('event.reg');
Route::post('/events/registration/{id}', 'FrontendController@EventsRegSubmit')->name('event.reg.submit');


Route::get('/FacultyMembers', 'FrontendController@FacultyMembers')->name('facultymembers');
Route::get('/FacultyMembers/{id}', 'FrontendController@FacultyMembersDetails')->name('facultymembers.details');
Route::post('/FacultyMembers/{id}/contact', 'FrontendController@FacultyMembersContact')->name('facultymembers.contact');
Route::get('/ExecutiveBody', 'FrontendController@ExecutiveBody')->name('executivebody');
Route::get('/ExecutiveBody/{id}', 'FrontendController@ExecutiveBodyDetails')->name('executivebody.details');
Route::post('/ExecutiveBody/{id}/contact', 'FrontendController@ExecutiveBodyContact')->name('executivebody.contact');

Route::get('/LabAssistance', 'FrontendController@LabAssistance')->name('labassistance');
Route::get('/OfficeStuff', 'FrontendController@OfficeStuff')->name('officestuff');
Route::get('/achievements', 'FrontendController@Achievements')->name('achievements');
Route::get('/achievements/{id}', 'FrontendController@AchievementsDetails')->name('achievements.details');
Route::get('/committee', 'FrontendController@Committee')->name('committee');
Route::get('/committee/{id}', 'FrontendController@CommitteeMembers')->name('committee.members');
Route::get('/committee/member/{id}', 'FrontendController@CommitteeMembersDetails')->name('committee.members.details');
Route::get('/PhotoGallery', 'FrontendController@PhotoGallary')->name('photogallary');
Route::get('/PhotoGallery/{id}', 'FrontendController@PhotoGallaryView')->name('photogallary.view');
Route::get('/contact', 'FrontendController@Contact')->name('contact');
Route::post('/contact', 'FrontendController@ContactSubmit')->name('contact.submit');

Route::get('/password-reset', 'Auth\ResetPasswordController@PwReset')->name('reset');
Route::post('/password-reset', 'Auth\ResetPasswordController@PwResetReq')->name('passreset');
Route::get('/password-reset/{token}', 'Auth\ResetPasswordController@resetLink')->name('resetLink');
Route::post('/password-reset/{token}', 'Auth\ResetPasswordController@passwordReset')->name('passwordReset');
Route::get('/verification/{id}/{code}', 'Auth\RegisterController@EmailVerification');

Route::group(['middleware' => ['guest']], function () {
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('/signup', 'Auth\RegisterController@register')->name('register');
Route::get('/signin', 'Auth\LoginController@showLoginForm')->name('signin');
Route::post('/signin', 'Auth\LoginController@login')->name('userlogin');
});

Route::group(['middleware' => ['auth']], function() {
Route::get('/resources', 'StudentsController@Resources')->name('resources');
Route::post('/resources', 'StudentsController@ResourceSearch')->name('resources.search');
Route::get('/resources/download/{secret}', 'StudentsController@ResourceDownload')->name('resources.download');
Route::get('/profile', 'StudentsController@Profile')->name('profile');
Route::post('/profile', 'StudentsController@ProfileUP')->name('profileup');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'teacher'], function () {

Route::get('/password-reset', 'TeacherAuth\ForgotPasswordController@PwReset')->name('teacher.reset');
Route::post('/password-reset', 'TeacherAuth\ForgotPasswordController@PwResetReq')->name('teacher.passreset');
Route::get('/password-reset/{token}', 'TeacherAuth\ForgotPasswordController@resetLink')->name('teacher.resetLink');
Route::post('/password-reset/{token}', 'TeacherAuth\ForgotPasswordController@passwordReset')->name('teacher.passwordReset');

Route::group(['middleware' => ['teacher.guest']], function () {
Route::get('/', 'TeacherAuth\LoginController@showLoginForm');
Route::get('/signin', 'TeacherAuth\LoginController@showLoginForm')->name('teacher.signin');
Route::post('/signin', 'TeacherAuth\LoginController@login')->name('teacher.userlogin');
});

Route::group(['middleware' => ['teacher']], function() {
Route::get('/resources', 'TeacherController@Resources')->name('teacher.resources');
Route::post('/resources', 'TeacherController@ResourceSearch')->name('teacher.resources.search');
Route::get('/resources/upload', 'TeacherController@ResourceUp')->name('teacher.resources.upload');
Route::post('/resources/upload', 'TeacherController@ResourceUpload')->name('teacher.resources.up');

Route::get('/resources/download/{secret}', 'TeacherController@ResourceDownload')->name('teacher.resources.download');
Route::get('/profile', 'TeacherController@Profile')->name('teacher.profile');
Route::post('/profile', 'TeacherController@ProfileUP')->name('teacher.profileup');
Route::get('/logout', 'TeacherAuth\LoginController@logout')->name('teacher.logout');
});

});



Route::group(['prefix' => 'admin'], function () {
	
	Route::get('/dashboard', 'AdmController@dashboard')->name('admin.dashboard');
	
	Route::get('/news', 'AdmController@News')->name('admin.news');
	Route::post('/news/remove', 'AdmController@NewsRemove')->name('admin.news.remove');
	Route::post('/news/publish', 'AdmController@NewsPublish')->name('admin.news.publish');
	Route::post('/news/unpublish', 'AdmController@NewsUnpublish')->name('admin.news.unpublish');
	Route::post('/news/add', 'AdmController@NewsAdd')->name('admin.news.add');
	Route::post('/news/edit', 'AdmController@NewsEdit')->name('admin.news.edit');
	

	Route::get('/events', 'AdmController@Events')->name('admin.events');
    Route::post('/events/remove', 'AdmController@EventsRemove')->name('admin.events.remove');
	Route::post('/events/add', 'AdmController@EventsAdd')->name('admin.events.add');
	Route::post('/events/edit', 'AdmController@EventsEdit')->name('admin.events.edit');
	
	Route::get('/events/reg-pending/{id}', 'AdmController@EventsRegPending')->name('admin.events.pending');
	Route::get('/events/registered/{id}', 'AdmController@EventsRegistered')->name('admin.events.registered');
	Route::post('/events/reg-approve', 'AdmController@EventsRegConfirm')->name('admin.events.reg.approve');
	Route::post('/events/reg-remove', 'AdmController@EventsRegRemove')->name('admin.events.reg.remove');
	
	Route::get('/events/exportpdf/{id}', 'AdmController@EventsExportPDF')->name('admin.events.exportpdf');
	Route::get('/events/exportxlsx/{id}', 'AdmController@EventsExportXLSX')->name('admin.events.exportxlsx');
	
	Route::get('/members/FacultyMembers', 'AdmController@FacultyMembers')->name('admin.facultymembers');
	Route::post('/members/Members/add', 'AdmController@MembersAdd')->name('admin.facultymembers.add');
	Route::post('/members/Members/remove', 'AdmController@MembersRemove')->name('admin.facultymembers.remove');
	Route::post('/members/Members/update', 'AdmController@MembersUpdate')->name('admin.facultymembers.update');
	Route::get('/members/ExecutiveBody', 'AdmController@ExecutiveBody')->name('admin.executivebody');
	Route::post('/members/ExecutiveBody/add', 'AdmController@ExecutiveBodyAdd')->name('admin.executivebody.add');
	Route::post('/members/ExecutiveBody/update', 'AdmController@ExecutiveBodyUpdate')->name('admin.executivebody.update');
	Route::post('/members/ExecutiveBody/remove', 'AdmController@ExecutiveBodyRemove')->name('admin.executivebody.remove');
	Route::get('/members/LabAssistance', 'AdmController@LabAssistance')->name('admin.labassistance');
	Route::get('/members/OfficeStuff', 'AdmController@OfficeStuff')->name('admin.officestuff');
	
	Route::get('/achievements', 'AdmController@Achievements')->name('admin.achievements');
	Route::post('/achievements/add', 'AdmController@AchievementsAdd')->name('admin.achievements.add');
	Route::post('/achievements/update', 'AdmController@AchievementsUpdate')->name('admin.achievements.edit');
	Route::post('/achievements/remove', 'AdmController@AchievementsRemove')->name('admin.achievements.remove');
	
	Route::get('/committee', 'AdmController@Committee')->name('admin.committee');
	Route::get('/committee/members/{id}', 'AdmController@CommitteeMembers')->name('admin.committee.members');
	Route::get('/committee/status/{id}/{value}', 'AdmController@CommitteeStatus')->name('admin.committee.status');
	Route::post('/committee/add', 'AdmController@CommitteeAdd')->name('admin.committee.add');
	Route::post('/committee/update', 'AdmController@CommitteeUpdate')->name('admin.committee.edit');
	Route::post('/committee/remove', 'AdmController@CommitteeRemove')->name('admin.committee.remove');
	
	Route::get('/gallery', 'AdmController@Gallery')->name('admin.gallery');
	Route::post('/gallery/add', 'AdmController@GalleryAdd')->name('admin.gallery.add');
	Route::post('/gallery/update', 'AdmController@GalleryUpdate')->name('admin.gallery.edit');
	Route::post('/gallery/remove', 'AdmController@GalleryRemove')->name('admin.gallery.remove');
	
	Route::get('/photo/{id}', 'AdmController@Photo')->name('admin.photo');
	Route::post('/photo/add', 'AdmController@PhotoAdd')->name('admin.photo.add');
	Route::post('/photo/remove', 'AdmController@PhotoRemove')->name('admin.photo.remove');
	
	
	Route::get('/students', 'AdmController@Students')->name('admin.students');
	Route::get('/students/pending', 'AdmController@StudentPending')->name('admin.students.pending');
	Route::post('/students/edit', 'AdmController@StudentUpdate')->name('admin.students.update');
	Route::post('/students/status', 'AdmController@StudentStatus')->name('admin.students.status');
	Route::post('/students/approve', 'AdmController@StudentApprove')->name('admin.students.approve');
	Route::post('/students/remove', 'AdmController@StudentRemove')->name('admin.students.remove');
	
	
	
	Route::get('/profile', 'AdmController@Profile')->name('admin.profile');
	Route::post('/profile', 'AdmController@ProfileUP')->name('admin.profileupdate');
	Route::get('/newadmin', 'AdmController@NewAdmin')->name('admin.newadmin');
	
	Route::post('/newadmin', 'AdminAuth\RegisterController@register')->name('addadmin');
	
	Route::group(['prefix' => 'settings'], function () {
		Route::get('/frontend', 'AdmController@FrontEND')->name('admin.frontend');
		Route::post('/frontend', 'AdmController@FrontendUP')->name('admin.frontend.up');
		Route::get('/sliders', 'AdmController@Sliders')->name('admin.sliders');
		Route::post('/sliders/add', 'AdmController@SlidersAdd')->name('admin.sliders.add');
		Route::post('/sliders/edit', 'AdmController@SlidersEdit')->name('admin.sliders.edit');
		Route::post('/sliders/remove', 'AdmController@SlidersRemove')->name('admin.sliders.remove');
		Route::post('/sliders/status', 'AdmController@SlidersStatus')->name('admin.sliders.status');
		Route::get('/resource', 'AdmController@Resources')->name('admin.resource');
		Route::get('/mail', 'AdmController@Mailer')->name('admin.mail');
		Route::post('/mail', 'AdmController@MailerUP')->name('admin.mailup');
	});
	
	Route::get('/mailer', 'AdmController@Mailsender')->name('admin.mailer');
	
  Route::get('/', 'AdminAuth\LoginController@showLoginForm');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
  Route::get('/forgot-password', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.forget.pass');
  Route::post('/forgot-password', 'AdminAuth\ForgotPasswordController@passreset')->name('admin.forget.pass.post');
  Route::get('/password-reset/{token}', 'AdminAuth\ForgotPasswordController@resetLink')->name('admin.forget.reset');
  Route::post('/password-reset/{token}', 'AdminAuth\ForgotPasswordController@passwordReset')->name('admin.forget.reset.post');
	
	
	
	
	
});
