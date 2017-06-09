<?php

if (config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

# route to view services (the only non-Authenticated route)
Route::get('/', 'UsherSchedulerController@showServices');

# Authentication Routes
Auth::routes();

Route::get('/home', 'UsherSchedulerController@showServices');

Route::group(['middleware' => 'auth'], function () {

    # route to display all ushers
    Route::get('/teams', 'UsherSchedulerController@showTeams');

    # route to edit a single usher record
    Route::get('/ushers/edit/{id}', 'UsherSchedulerController@usherEdit');

    # route to save edits to the database
    Route::post('/usher/edit', 'UsherSchedulerController@edit_or_delete_Usher');

    # route to prompt for information to enter new usher in the database
    Route::get('/usher/new', 'UsherSchedulerController@newUsher');

    # route to save new usher in the database
    Route::post('/usher/new', 'UsherSchedulerController@saveUsher');

    # route to prompt for information to create new service
    Route::get('/service/new', 'UsherSchedulerController@newService');

    # route to save new service in the database
    Route::post('/service/new', 'UsherSchedulerController@saveService');

    # route to edit a single service record
    Route::get('/service/edit/{id}', 'UsherSchedulerController@serviceEdit');

    # route to save edits to the database
    Route::post('/service/edit', 'UsherSchedulerController@edit_or_delete_Service');

    # 'catch all' route if none of the above apply
    Route::any('{catchall}', function() {
        Session::Flash('warning_msg',
        'Sorry, but that page was not found. You have been redirected to the site\'s landing page.');
        return redirect('/');
    })->where('catchall', '.*');
});
