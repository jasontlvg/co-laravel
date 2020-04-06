<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('admin/results/index/{departamento}','API\ResultsController@indexDepartamentos');
//Route::apiResource('admin/results', 'API\ResultsController');

Route::group(['prefix' => 'admin'], function(){
    Route::get('api/results', 'API\ResultsController@index')->name('results.index'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller ANTES ERA POST
    Route::get('api/getdata/{departamento}', 'API\ResultsController@getData')->name('results.getData'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
    Route::get('api/results/encuestas/{departamento}', 'API\ResultsController@encuestasDisponibles')->name('results.encdisp'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
    Route::get('api/results/encuesta/preguntas/{encuesta}', 'API\ResultsController@preguntasEncuesta')->name('results.preguntasEncuesta'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
    Route::get('api/results/encuesta/respuestas', 'API\ResultsController@respuestas')->name('results.asdqew'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
//    Route::post('api/results', 'API\ResultsController@store')->name('results.store');
    Route::post('api/results/encuesta', 'API\ResultsController@show')->name('results.show'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
    Route::put('api/results/{result}', 'API\ResultsController@update')->name('results.update'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
    Route::delete('api/results/{result}', 'API\ResultsController@destroy')->name('results.destroy'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
    Route::get('api/reactivar/{departamento}/{encuesta}', 'API\ResultsController@reactivarEncuesta')->name('results.reactivar'); // El mw que comprueba si el usuario ya contesta la encuesto esta declarado en el Controller
    Route::get('api/indicadores/{encuesta}', 'API\ResultsController@getIndicador')->name('results.indicadores'); //
});
