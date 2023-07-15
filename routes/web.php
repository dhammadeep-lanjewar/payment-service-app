<?php

use App\Postcard;
use App\Facades\Invoice;
use App\Facades\InvoiceFacade;
use App\PostcardSendingService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayOrderController;

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
});
