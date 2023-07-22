<?php

use App\Postcard;
use App\Facades\Invoice;
use App\Facades\InvoiceFacade;
use App\Http\Controllers\BooksController;
use App\PostcardSendingService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Log::channel('abuse')->info('Api endpint abuse',[
        'user_id'=> 1
    ]);
    return view('welcome');
});

Route::get('/postcards', function () {
    $postcardService = new PostcardSendingService(country:'us',width:4,height:6);
    $postcardService->hello(message:'Hello from Dhammadeep from India',email:'test@test.com');
});

Route::get('/facades', function () {
    Postcard::hello('Hello from facade','abc@123.com');
});

Route::get('/pay',[PayOrderController::class,'store']);

Route::get('/invoice',function(){
    InvoiceFacade::getCompanyName();
})->middleware('test');

Route::get('/login',function(){
    return view('form');
});

Route::post('/login',[UserController::class,'store']);

Route::get('/users',[UserController::class,'index']);

Route::resource('/books', BooksController::class);
