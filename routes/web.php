<?php

// *****************************Frontend **************************

use App\Models\Scholarship;

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    //Give feed back and contact User side
    Route::get('contact', 'IndexController@contact')->name('contact');
    Route::post('feedback', 'IndexController@submitFeedback')->name('submit.feedback');
    // Route::get('feedback', 'IndexController@feedback')->name('feedback');
    // Route::get('privacy-policy', 'IndexController@privacyPolicy')->name('privacy.policy');
    // Route::get('terms-and-conditions', 'IndexController@termsAndConditions')->name('terms.and.conditions');
    // Blog
    Route::get('blogs', 'BlogController@blogs')->name('blogs');
    Route::get('blog/{id}-{slug}', 'BlogController@blogSingle')->name('blog.single');
    Route::get('about', 'IndexController@about')->name('about');
    Route::get('galleries', 'IndexController@galleries')->name('galleries');

    Route::get('students/{category}', 'AllController@students')->name('students');
    Route::get('student-profile', 'AllController@studentProfile')->name('student.profile');


    Route::get('seminars', 'AllController@seminars')->name('seminars');
    Route::get('seminar/{id}', 'AllController@seminar')->name('seminar');

    Route::get('jobs', 'AllController@jobs')->name('jobs');
    Route::get('job/{id}', 'AllController@job')->name('job');
});

// Ckeditor Image Upload
Route::post('ckeditor/image-upload', 'Common\CKEditorController@imageUpload')->name('ckeditor.image.upload');

// ********************************USER********************************

Auth::routes();
// Auth::routes(['verify' => true]);

Route::prefix('user')->group(function () {
    Route::name('user.')->group(function () {
        Route::namespace('User')->group(function () {
            Route::group(['middleware' => ['auth', 'preventBackHistory']], function () {
                //dashboard
                Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
                //User Profile
                Route::get('change-password', 'ProfileController@changePasswordView')->name('change.password');
                Route::post('change-password', 'ProfileController@changePassword')->name('change.password');
                Route::get('profile', 'ProfileController@profileView')->name('profile.view');
                Route::post('profile', 'ProfileController@profileChange')->name('profile.change');
            });
        });
    });
});



// **************************************************ADMIN************************************************
//admin Login, logout, forget password routes
Route::prefix('rt-admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('login', 'Auth\Admin\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\Admin\LoginController@login');
        Route::post('logout', 'Auth\Admin\LoginController@logout')->name('logout');
        //show the link request form to reset password
        Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        //Send the link - it will use the notification from admin model
        Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //receive the request from the send email
        Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('password.reset');
        //update password
        Route::post('password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('password.update');
    });
});


Route::prefix('rt-admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::group(['middleware' => ['auth:admin', 'preventBackHistory']], function () {
                // Dashboard
                Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
                //change password
                Route::get('change-password', 'DashboardController@changePasswordView')->name('change.password');
                Route::post('change-password', 'DashboardController@changePassword')->name('change.password');
                // contact and feedback
                Route::get('contacts', 'DashboardController@contacts')->name('contacts');
                // Route::get('feedbacks', 'DashboardController@feedbacks')->name('feedbacks');
                Route::delete('contact-feedback-delete/{contactFeedback}', 'DashboardController@contactFeedbackDelete')->name('contact-feedback.delete');
                // Icon
                Route::get('rt-icons1', function () {
                    return view('admin.icons1');
                });
                Route::get('rt-icons2', function () {
                    return view('admin.icons2');
                });
                //program start
                Route::get('data-table-values/{category?}', 'ProgramController@dataTableValues')->name('data-table.values');
                // program end


                Route::resource('users', 'UserController');
                Route::resources(
                    [
                        'admins' => 'AdminController',
                        'blogs' => 'BlogController',
                        'galleries' => 'GalleryController',
                        // 'programs' => 'ProgramController',
                        'checkLasts' => 'CheckLastController',
                        'jobDetails' => 'JobDetailsController',
                        'seminars' => 'SeminarController',
                        'scholarships' => 'ScholarshipController',
                    ]
                );
                Route::get('users-requests', 'UserController@requests')->name('users.requests');
                Route::get('users-accept/{user}', 'UserController@accept')->name('users.accept');
                Route::get('users-activity/{id}', 'UserController@activity')->name('users.activity');
                Route::delete('users-activity-destroy/{id}', 'UserController@activityDestroy')->name('userActivity.destroy');
                Route::get('users-training/{id}', 'UserController@training')->name('users.training');
                Route::delete('users-training-destroy/{id}', 'UserController@trainingDestroy')->name('userTraining.destroy');
                Route::get('users-club/{id}', 'UserController@club')->name('users.club');
                Route::delete('users-club-destroy/{id}', 'UserController@clubDestroy')->name('userClub.destroy');
                Route::get('users-training/{id}', 'UserController@training')->name('users.training');
                Route::get('users-club/{id}', 'UserController@club')->name('users.club');
                Route::get('user-account', 'UserController@accountCreate')->name('userAccount.create');
                Route::post('user-account', 'UserController@accountStore')->name('userAccount.store');

                // job details
                Route::get('jobDetails-requests', 'JobDetailsController@requests')->name('jobDetails.requests');
                Route::get('jobDetails-accept/{jobDetails}', 'JobDetailsController@accept')->name('jobDetails.accept');
                Route::get('jobDetails-applicants/{id}', 'JobDetailsController@applicants')->name('jobDetails.applicants');
                // Scholarship
                Route::get('scholarship-status/{id}', 'ScholarshipController@status')->name('scholarships.status');
            });
        });
    });
});
