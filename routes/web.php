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
// Auth::routes();
// Route::get('/', 'Subscriber\SubscriberController@phoneSignin');
Route::get('/', 'Subscriber\SubscriberController@activate')->name('activate');
Route::get('/phonesignin', 'Subscriber\SubscriberController@phoneSignin')->name('phonesignin');
Route::get('/signout', 'Subscriber\SubscriberController@signout')->name('subscriberLogout');

Route::get('/activate', 'Subscriber\SubscriberController@activate')->name('activate');
Route::post('/activate/new', 'Subscriber\SubscriberController@activation')->name('activate');
// Route::post('/signout', 'Subscriber\SubscriberController@signout')->name('subscriberLogout');
Route::post('/phonesignin', 'Subscriber\SubscriberController@processPhoneSignin')->name('phonesignin');
// Route::get('/', 'Subscriber\SubscriberController@phoneSignin');

//-------------------get signup page------------//
Route::group( [ 'middleware' => 'checkSubAuth', 'checksession'], function () {
    // Route::get('/', 'Subscriber\SubscriberController@getSignin');

    // Route::get('/phonesignin', 'Subscriber\SubscriberController@phoneSignin')->name('phonesignin');
    Route::get('/signup', 'Subscriber\SubscriberController@getSignup')->name('signup');
    //--------------------------get sign in page---------//
    // Route::get('/signin', 'Subscriber\SubscriberController@getSignin');
    //----------------------process user signup------------------//
    Route::post('/signup', 'Subscriber\SubscriberController@processSignup')->name('signup');
    //-----------------------------process signin=-------------------//
    // Route::post('/signin', 'Subscriber\SubscriberController@processSignin');

    //--------------------forgot subscriber profile---------------------//
    // Route::get('/forgotPassword', 'Subscriber\SubscriberController@processForgotPassword');
        
    // Route::get('/verifyEmailPage', 'Subscriber\SubscriberController@verifyEmailPage');
    
    // Route::post('/verifyEmail', 'Subscriber\SubscriberController@verifyEmail');
    // Route::get('/reset_password/{token}', 'Subscriber\SubscriberController@loadResetPassword');
    // Route::post('/reset_password/{token}', 'Subscriber\SubscriberController@resetPassword');
    

    Route::get('/activate/{token}', 'Subscriber\CareTeamController@activateUser')->name('user-activate');

     //TODO: User Middleware
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/careTeam/request/approve', 'MedicalPersonal\RequestController@viewApprovedRequests');
    Route::get('/careTeam/request/pending', 'MedicalPersonal\RequestController@viewPendingRequests');
    Route::get('/careTeam/request/disapprove', 'MedicalPersonal\RequestController@viewDisapprovedRequests');

    /* Contact Team: To Replace Care Team Implementation */
    Route::get('/contact-team', 'Subscriber\ContactTeamController@index');
    Route::post('/contact-team/new', 'Subscriber\ContactTeamController@store');
    Route::get('/deleteContact/{id}', 'Subscriber\ContactTeamController@delete');
        
    /* Care Team */
    Route::get('/care-team', 'Subscriber\SubscriberController@getCareTeam');
    Route::post('/care-team', 'Subscriber\CareTeamController@register');

    Route::post('/care-team/member/new', 'Subscriber\CareTeamController@addUserToCareTeam');
                    


    /* Subscriber Routes */

    /* Create a middleware that only gives access to login subscribers */
    // Route::group( [ 'middleware' => ['web'] ], function () {

        Route::resource('/admin/care','Care\CareController');


        
        /* Logout */
        // Route::post('/signout', 'Subscriber\SubscriberController@signout')->name('signout');

        /* Diagonis */
        Route::get('/diagnosis', 'Subscriber\DiagnosisController@index');
        Route::post('/diagnosis/new', 'Subscriber\DiagnosisController@addDiagnosis');
        Route::get('/diagnosis/{id}', 'Subscriber\DiagnosisController@show');
        Route::get('/diagnosis/{id}/edit', 'Subscriber\DiagnosisController@edit');
        Route::put('/diagnosis/{id}/update', 'Subscriber\DiagnosisController@update');
        Route::delete('diagnosis/{id}/delete', 'Subscriber\DiagnosisController@delete');

        /* Medication */
        Route::get('/medications', 'Subscriber\MedicationController@index');
        Route::get('/add_medications', 'Subscriber\MedicationController@addMedication');
        // Route::get('/medications/new', 'Subscriber\MedicationController@addMedication');
        Route::post('/medications/new', 'Subscriber\MedicationController@create');
        Route::post('/medications/edit', 'Subscriber\MedicationController@edit');
        Route::get('/medications/delete/{id}', 'Subscriber\MedicationController@delete');
        Route::get('/diagnosis/{id}/medication/', 'Subscriber\MedicationController@new');
      
        Route::get('/diagnosis/{diagnosis}/medication/{id}/delete', 'Subscriber\MedicationController@delete');
        
        /* Users */
        // Route::get('/medical_personel', 'Subscriber\SubscriberController@getMedicalPersonals');

        /* Personal Profile */
        Route::post('/profile/avatar', 'Subscriber\SubscriberController@uploadAvatar');

        
      

        /* Blood Glucose */
        Route::get('/blood_glucoses', 'BloodGlucoseController@index');

        /* Blood Pressure */
        Route::get('/blood_pressures', 'BloodPressureController@index');


        /* Goal Tab */
        Route::post('/setBmiGoal', 'BmiController@setGoal');
        Route::post('/setBmiGoal/activateOrDeactivate', 'BmiController@activateOrDeactivate');
        Route::post('/setBPGoal', 'Subscriber\GoalController@setBPGoal');
        Route::post('/setBGGoal', 'Subscriber\GoalController@setBGGoal');

        /* Choresterol Record */
        Route::get('/cholesterol', 'Subscriber\CholesterolController@index');
        Route::post('/cholesterol', 'Subscriber\CholesterolController@store');



       
        //----------------------update doctor-------------------------//
        
         //----------------------add diagnosis-------------------------//
         Route::post('/addDiagnosis', 'DiagnosisController@addDiagnosis');
         //--------------------get update diagnosis page--------------------//
         Route::get('/editDiagnosis/{id}', 'DiagnosisController@editDiagnosis');
         //--------------------------update a diagnosiis by id----//
         Route::post('/updateDiagnosis', 'DiagnosisController@updateDiagnosis');
         //-----------------delete diagnosis----------------------------------//
         Route::get('/deleteDiagnosis/{id}', 'DiagnosisController@deleteDiagnosis');
         

        //-----------------------------get dashboard-------------------------//
        Route::get('/dashboard', 'Subscriber\SubscriberController@getDashboard');
        //----------------------------get notification page----------------------//
        Route::get('/notifications', 'Subscriber\SubscriberController@getNotification');
        //--------------------------------get personal profile page-------------------//
        Route::get('/personal_profile', 'Subscriber\SubscriberController@getpersonalProfile');
        //--------------------------------get medical profile page-------------------//
        // Route::get('/medical_profile', 'Subscriber\SubscriberController@getmedicalProfile');
        //------------------------------get records page-------------------------//
        Route::get('/records', 'Subscriber\SubscriberController@getRecords');

        Route::get('/med_records', 'Subscriber\SubscriberController@medRecords');
        //------------------------------get subscription page-------------------------//
        Route::get('/subscriptions', 'Subscriber\SubscriberController@getSubscriptions');
        //------------------------------get emergency contact page----------------------//
        
        //------------------update emergency contact----------------------------//
        Route::post('/updateEmergencyContact', 'EmergencyContactController@update');
        //-------------------------get settings page-----------------------//
        Route::get('/settings', 'Subscriber\SubscriberController@getSettings');
        
        //--------------------update subscriber profile---------------------//
        Route::post('/updateProfile', 'Subscriber\SubscriberController@updateProfile');
        //--------------------update subscriber profile---------------------//
        Route::post('/changePassword', 'Subscriber\SubscriberController@changePassword');
    
       
        //--------------------delete blood presssre readinfd===================/
        Route::get('/deleteBP/{id}', 'BloodPressureController@delete');
        //--------------------get update bp page--------------------//
        Route::get('/editBP/{id}', 'BloodPressureController@edit');
        //--------------------------update a bp by id----//
        Route::post('/updateBP', 'BloodPressureController@update');
        //--------------------------add bp ----//
        Route::post('/addBP', 'BloodPressureController@addBP');
        
        //--------------------delete blood glucose readinfd===================/
        Route::get('/deleteBG/{id}', 'BloodGlucoseController@delete');
        //--------------------get update bG page--------------------//
        Route::get('/editBG/{id}', 'BloodGlucoseController@edit');
        //--------------------------update a bg by id----//
        Route::post('/updateBG', 'BloodGlucoseController@update');
        //--------------------------add bg ----//
        Route::post('/addBG', 'BloodGlucoseController@add');
        
        //--------------------create notification-------------------------------//
        Route::post('/addNotification', 'NotificationController@create');
        //--------------------update notification-------------------------------//
        Route::post('/updateNotification', 'NotificationController@update');
        //--------------------delete notification-------------------------------//
        Route::get('/deleteNotification/{id}', 'NotificationController@delete');
        //--------------------edit notification-------------------------------//
        Route::get('/editNotification/{id}', 'NotificationController@edit');
        
        //-------------------------get BMI page-------------------//
        Route::get('/bmi', 'Subscriber\SubscriberController@getBmi');
        //-------------------Add BMI--------------------//
        Route::post('/addBmi', 'BmiController@create');
        //---------------update BMI------------------------//
        Route::get('/updateBmi', 'BmiController@edit');
        Route::post('/updateBmi', 'BmiController@update');

        Route::get('/deleteBMI/{id}', 'BmiController@delete');
        
        Route::post('/enableNotification','SettingsController@enableNotification');
        Route::post('/disableNotification', 'SettingsController@disableNotification');

        Route::post('/addMedication', 'Subscriber\MedicationController@create');


        /***** Goal Tab *****/
        Route::get('/goals', 'Subscriber\GoalController@index');
        
    // });



// });

// Doctor Admin (Healthcare Personel)
// Route::get('/doctor', 'DoctorController@index');

Auth::routes();
Route::match(['get', 'post'], 'register', function(){
    return redirect('/login');
});

Route::get('/subscription', 'Subscriber\SubscriberController@subscription')->name('subscription');
Route::get('/mybp', 'Subscriber\SubscriberController@mybp')->name('mybp');
Route::get('/mybg', 'Subscriber\SubscriberController@mybg')->name('mybg');
Route::get('/mybump', 'Subscriber\SubscriberController@mybump')->name('mybump');



Route::get('/home', 'UserController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user');

Route::get('/p', 'PagesController@index')->name('home');

// Error
Route::get('pagenotfound', ['as'=>'notfound', 'uses' => 'PagesController@pagenotfound']);
Route::get('errors/noRole', 'PagesController@noRole');



//Admin Routes
// Route::group( [ 'middleware' => ['auth','role:administrator'] ], function () {
//     Route::get('/administrator', 'Admin\AdminController@admin');
// });

// Route::group( [ 'middleware' => ['auth','role:administrator|doctor']], function () {
//     Route::get('/doctor', 'Admin\AdminController@doctor');    
// });

// Route::group( [ 'middleware' => ['auth','role:administrator|physical-trainer']], function () {
//     Route::get('/physical-trainer', 'Admin\AdminController@physicalTrainer');    
// });

// Route::group( [ 'middleware' => ['auth','role:administrator|nutritionist']], function () {
//     Route::get('/nutritionist', 'Admin\AdminController@nutritionist');    
// });

// Route::group( [ 'middleware' => ['auth','role:administrator|nutritionist']], function () {
//     Route::get('/medical_personel', 'Admin\AdminController@medicalPersonel');    
// });

// Route::group( [ 'middleware' => ['auth','role:administrator|health-coach']], function () {
//     Route::get('/health-coach', 'Admin\AdminController@healthCoach');    
// });
    
Route::get('/blog', 'Blog\BlogsController@index');    
Route::get('/blog/create', 'Blog\BlogsController@create');    
Route::post('/blog/add', 'Blog\BlogsController@store');    
Route::get('/blog/{id}', 'Blog\BlogsController@show');    
Route::get('/blog/{id}/edit', 'Blog\BlogsController@edit');    

});