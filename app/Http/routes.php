<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */

  Route::get('/', ['as'=>'index','uses'=>'operaciones@index']);
  Route::get('/agregar', ['as'=>'ticket.otro','uses'=>'operaciones@agregarView']);

  Route::get('/edit/{id}', ['as'=>'ticket.edit','uses'=>'operaciones@edit']);

  Route::post('/store-ticket', ['as'=>'ticket.store','uses'=>'operaciones@store']);
  Route::delete('/delete-ticket/{id}', ['as'=>'ticket.delete','uses'=>'operaciones@destroy']);
  Route::post('/update-ticket/{id}', ['as'=>'ticket.update','uses'=>'operaciones@update']);
  Route::post('/search-ticket', ['as'=>'ticket.searchTicket','uses'=>'operaciones@searchTicket']);
    /**
     * Add New Task
     */
    // Route::post('/task', function (Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:255',
    //     ]);
    //
    //     if ($validator->fails()) {
    //         return redirect('/')
    //             ->withInput()
    //             ->withErrors($validator);
    //     }
    //
    //     $task = new Task;
    //     $task->name = $request->name;
    //     $task->save();
    //
    //     return redirect('/');
    // });
    //
    // /**
    //  * Delete Task
    //  */
    // Route::delete('/task/{id}', function ($id) {
    //     Task::findOrFail($id)->delete();
    //
    //     return redirect('/');
    // });
});
