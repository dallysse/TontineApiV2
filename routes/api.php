<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MembresController;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\Api\DepensesController;
use App\Http\Controllers\Api\MembreSessionsController;
use App\Http\Controllers\Api\PretsController;
use App\Http\Controllers\Api\TypeAidesController;
use App\Http\Controllers\Api\AidesController;
use App\Http\Controllers\Api\RencontresController;

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
//recuperer la liste de membres
Route::get('/membres', [MembresController::class, 'listMembres']);

Route::get('membre/{id}', [MembresController::class, 'getMembre']);
Route::put('membre/edit{membre}', [MembresController::class, 'update']);
Route::post('membre', [MembresController::class, 'store']);
Route::delete('membre/{membre}', [MembresController::class, 'delete']);

//recuperer la liste de sessions
Route::get('/sessions', [SessionsController::class, 'listSessions']);
Route::get('session/{id}', [SessionsController::class, 'getSession']);

Route::get('rencontre/{id}', [RencontresController::class, 'getRencontre']);
Route::get('rencontres', [RencontresController::class, 'listRencontres']);
Route::get('/RencontreParticipants', [RencontresController::class, 'getRencontreParticipants']);

//recuperer la liste de depenses
Route::get('/depenses', [DepensesController::class, 'listDepenses']);

//recuperer la liste membres de session
//Route::get('/sessionMembres', [MembreSessionsController::class, 'listMembreSessions']);

//Route::get('/session/{id}/membres', [MembreSessionsController::class, 'getSessionMembers']);

Route::get('/sessionMembres', [MembreSessionsController::class, 'getSessionMembers']);
Route::get('/sessionRencontres', [RencontresController::class, 'getSessionRencontres']);
Route::get('/sessionAides', [MembreSessionsController::class, 'getSessionAides']);
Route::get('/sessionPrets', [PretsController::class, 'getSessionPrets']);
Route::get('/sessionDepenses', [MembreSessionsController::class, 'getSessionRencontreDep']);

//recuperer la liste de Aides
Route::get('/aides', [AidesController::class, 'listAides']);

//recuperer la liste de Prets
Route::get('/prets', [PretsController::class, 'listPrets']);

//recuperer la liste de typeAides
Route::get('/typeAides', [TypeAidesController::class, 'listTypeAides']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
