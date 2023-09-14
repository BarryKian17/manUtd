<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TeamListController;
use App\Http\Controllers\StoreOrderController;
use App\Http\Controllers\TicketOrderController;



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


Route::middleware(['admin_auth'])->group(function(){
    Route::redirect('/','loginPage');
    Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
    Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');
});

Route::middleware(['auth'])->group(function () {

//dashboard
Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');


// Admin
Route::prefix('admin')->middleware(['admin_auth'])->group(function(){
    Route::get('/',[CategoryController::class,'home'])->name('admin#home');
    Route::get('account',[AdminController::class,'account'])->name('admin#account');
    Route::post('edit',[AdminController::class,'edit'])->name('admin#accountEdit');
    Route::get('changePassword',[AdminController::class,'changePasswordPage'])->name('admin#changePasswordPage');
    Route::post('changePassword',[AdminController::class,'changePassword'])->name('admin#changePassword');
    Route::get('contact',[ContactController::class,'contactList'])->name('admin#contact');


    Route::prefix('user')->group(function(){
        Route::get('list',[AdminController::class,'userList'])->name('admin#userList');
        Route::get('delete/{id}',[AdminController::class,'delete'])->name('admin#userDelete');
        Route::get('changeRole/{id}',[AdminController::class,'changeRole'])->name('admin#changeRolePage');

    });




    Route::prefix('category')->group(function(){
        Route::get('create',[CategoryController::class,'create'])->name('admin#categoryCreate');
        Route::post('createData',[CategoryController::class,'createData'])->name('admin#createCategoryData');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('admin#categoryDelete');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('admin#categoryEditPage');
        Route::post('edit',[CategoryController::class,'editCategory'])->name('admin#categoryEdit');


    });

    Route::prefix('post')->group(function(){
        Route::get('/',[PostController::class,'list'])->name('admin#postList');
        Route::get('createPage',[PostController::class,'createPage'])->name('admin#postcreatePage');
        Route::post('create',[PostController::class,'create'])->name('admin#postcreate');
        Route::get('delete/{id}',[PostController::class,'delete'])->name('admin#postDelete');
        Route::get('edit/{id}',[PostController::class,'edit'])->name('admin#postEditPage');
        Route::post('update',[PostController::class,'update'])->name('admin#postupdate');
    });

    Route::prefix('team/list')->group(function(){
        Route::get('/',[TeamListController::class,'list'])->name('admin#teamList');
        Route::post('create',[TeamListController::class,'create'])->name('admin#teamCreate');
        Route::get('delete/{id}',[TeamListController::class,'delete'])->name('admin#teamDelete');
        Route::get('editPage/{id}',[TeamListController::class,'editPage'])->name('admin#teamEditPage');
        Route::post('update',[TeamListController::class,'update'])->name('admin#teamUpdate');
    });

    Route::prefix('fixture')->group(function(){
        Route::get('/',[FixtureController::class,'list'])->name('admin#fixture');
        Route::post('create',[FixtureController::class,'create'])->name('admin#fixtureCreate');
        Route::get('editPage/{id}',[FixtureController::class,'editPage'])->name('admin#fixtureEditPage');
        Route::post('edit',[FixtureController::class,'edit'])->name('admin#fixtureEdit');
        Route::get('delete/{id}',[FixtureController::class,'delete'])->name('admin#fixtureDelete');
    });

    Route::prefix('result')->group(function(){
        Route::get('/',[ResultController::class,'list'])->name('admin#result');
        Route::get('createPage/{id}',[ResultController::class,'createPage'])->name('admin#resultCreatePage');
        Route::post('create',[ResultController::class,'create'])->name('admin#resultCreate');
        Route::get('delete/{id}',[ResultController::class,'delete'])->name('admin#resultDelete');
        Route::get('editPage/{id}',[ResultController::class,'editPage'])->name('admin#resultEditPage');
        Route::post('update',[ResultController::class,'update'])->name('admin#resultUpdate');


    });

    Route::prefix('ticket')->group(function(){
        Route::get('/',[TicketController::class,'list'])->name('admin#ticket');
        Route::get('createPage',[TicketController::class,'createPage'])->name('admin#ticketCreatePage');
        Route::post('create',[TicketController::class,'create'])->name('admin#ticketCreate');
        Route::get('delete/{id}',[TicketController::class,'delete'])->name('admin#ticketDelete');
        Route::get('editPage/{id}',[TicketController::class,'editPage'])->name('admin#ticketEditPage');
        Route::post('update',[TicketController::class,'update'])->name('admin#ticketUpdate');
        Route::get('orderPage',[TicketOrderController::class,'orderPage'])->name('admin#ticketOrderPage');
        Route::get('reject/{id}',[TicketOrderController::class,'reject'])->name('admin#ticketReject');
        Route::get('accept/{id}',[TicketOrderController::class,'accept'])->name('admin#ticketAccept');
        Route::get('acceptOrderPage',[TicketOrderController::class,'acceptOrderPage'])->name('admin#ticketAcceptPage');
        Route::get('rejectOrderPage',[TicketOrderController::class,'rejectOrderPage'])->name('admin#ticketRejectPage');



    });

    Route::prefix('player')->group(function(){
        Route::get('/',[PlayerController::class,'list'])->name('admin#player');
        Route::get('createPage',[PlayerController::class,'createPage'])->name('admin#playerCreatePage');
        Route::post('create',[PlayerController::class,'create'])->name('admin#playerCreate');
        Route::get('delete/{id}',[PlayerController::class,'delete'])->name('admin#playerDelete');
        Route::get('editPage/{id}',[PlayerController::class,'editPage'])->name('admin#playerEditPage');
        Route::post('update',[PlayerController::class,'update'])->name('admin#playerUpdate');
    });

    Route::prefix('store')->group(function(){
        Route::get('/',[StoreController::class,'list'])->name('admin#store');
        Route::post('create',[StoreController::class,'create'])->name('admin#storeCreate');
        Route::get('delete/{id}',[StoreController::class,'delete'])->name('admin#storeDelete');
        Route::get('editPage/{id}',[StoreController::class,'editPage'])->name('admin#storeEditPage');
        Route::post('update',[StoreController::class,'update'])->name('admin#storeUpdate');
        Route::get('orderPage',[StoreController::class,'orderPage'])->name('admin#storeOrderPage');
        Route::get('reject/{id}',[StoreOrderController::class,'reject'])->name('admin#storeReject');
        Route::get('accept/{id}',[StoreOrderController::class,'accept'])->name('admin#storeAccept');
        Route::get('rejectOrderPage',[StoreController::class,'rejectOrderPage'])->name('admin#storeRejectOrderPage');
        Route::get('acceptOrderPage',[StoreController::class,'acceptOrderPage'])->name('admin#storeAcceptOrderPage');



    });

});


//user
Route::group(['prefix'=>'user','middleware'=>'user_auth'],function(){
   Route::get('home',[UserController::class,'home'])->name('user#home');
   Route::get('fixture',[FixtureController::class,'fixture'])->name('user#fixture');
   Route::get('result',[ResultController::class,'result'])->name('user#result');
   Route::get('player',[PlayerController::class,'player'])->name('user#player');

   Route::prefix('account')->group(function(){
        Route::get('/',[UserController::class,'userAccount'])->name('user#account');
        Route::post('update',[UserController::class,'update'])->name('user#accountUpdate');
        Route::get('changePassword',[UserController::class,'changePasswordPage'])->name('user#changePasswordPage');
        Route::post('changePassword',[UserController::class,'changePassword'])->name('user#changePassword');

    });

    Route::prefix('store')->group(function(){
        Route::get('/',[StoreController::class,'store'])->name('user#store');
        Route::get('detail/{id}',[StoreController::class,'detail'])->name('user#storeDetail');
        Route::post('order',[StoreOrderController::class,'order'])->name('user#storeOrder');
        Route::get('cart',[StoreOrderController::class,'cart'])->name('user#storeCart');

    });

    Route::prefix('ticket')->group(function(){
        Route::get('/',[TicketOrderController::class,'ticket'])->name('user#ticket');
        Route::get('match/{id}',[TicketOrderController::class,'match'])->name('user#ticketMatch');
        Route::post('order',[TicketOrderController::class,'order'])->name('user#ticketOrder');
        Route::get('cart',[TicketOrderController::class,'cart'])->name('user#ticketCart');
    });

    Route::prefix('contact')->group(function(){
        Route::get('/',[ContactController::class,'contact'])->name('user#contact');
        Route::post('create',[ContactController::class,'create'])->name('user#contactCreate');
    });


});

});



