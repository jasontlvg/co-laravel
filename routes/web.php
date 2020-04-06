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

Route::get('/', function () {
//    return 'Hola';
    return view('auth.login');

});

Route::get('lolo', function () {
    return "Estamos en lolo";
})->name('lolo');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Encuesta
Route::group(['prefix' => 'encuesta'], function(){
    Route::get('{encuesta}', 'EncuestaController@show')->name('encuesta.show'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
    Route::post('{encuesta}', 'EncuestaController@store')->name('encuesta.store');
});


Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


    // Password resets routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    // CRUD
    Route::resource('empresa', 'EmpresaController')->middleware('auth:admin');
    Route::get('empresa/destruir/{id}', 'EmpresaController@destruir')->name('empresa.destruir')->middleware('auth:admin');

    Route::resource('departamentos', 'DepartamentosController')->middleware('auth:admin');
    Route::get('departamentos/destruir/{id}', 'DepartamentosController@destroy')->name('admin.departamento.destruir')->middleware('auth:admin');


    Route::resource('empleados', 'EmpleadosController')->middleware('auth:admin');
    Route::get('empleados/destruir/{id}', 'EmpleadosController@destruir')->middleware('auth:admin');


//    Route::get('resultados', 'ResultadosController@select')->middleware('auth:admin');
//    Route::get('resultados/{departamento}', 'ResultadosController@show')->middleware('auth:admin')->name('resultados');
    Route::get('resultados', 'ResultadosController@index')->name('resultados.index')->middleware('auth:admin');

    Route::get('resultados/reporte', 'ResultadosController@reporte')->name('resultados.reporte')->middleware('auth:admin');


});


Route::get('/primus', 'PruebaController@index')->name('prueba');
