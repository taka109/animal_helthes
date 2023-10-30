<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','ViewController@index')->name('welcome');
Route::get('index','ViewController@index')->name('index');
Route::get('password/index','ViewController@index')->name('index');
Route::post('/index','ViewController@like')->name('review.index');
Route::get('complete','SubscribersController@complete')->name('complete');
Route::get('preset','SubscribersController@preset')->name('preset');
Route::get('submit','SubscribersController@submit')->name('submit');
Route::post('subcomplete','LoginController@subcomplete')->name('subcomplete');
Route::get('adlogin','SubscribersController@adlogin')->name('adlogin');
Route::get('userlist','ViewController@userlist')->name('userlist');
Route::get('userdelete','SubscribersController@userdelete')->name('userdelete');
Route::post('userdelete','SubscribersController@userdelete')->name('userdelete');
Route::get('mypage','ViewController@mypage')->name('mypage');
Route::get('petsub','ViewController@petsub')->name('petsub');
Route::post('petsub','SubscribersController@petsub')->name('petsub');
Route::get('petsubcomp','SubscribersController@petcomp')->name('petsubcomp');
Route::post('petsubcomp','SubscribersController@petcomp')->name('petsubcomp');
Route::get('petedit','ViewController@petedit')->name('petedit');
Route::post('petedit','SubscribersController@postedit')->name('postedit');
Route::post('petinfo', 'ViewController@petinfo')->name('petinfo');
Route::get('petinfo','ViewController@petinfo')->name('petinfo');
Route::post('calendarinf','ViewController@dateinfo')->name('calendarinf');
Route::get('calendarsub','ViewController@calendarsub')->name('calendarsub');
Route::post('calendarsub','SubscribersController@calendarsub')->name('calendarsub');
Route::post('calendarcomp','SubscribersController@calendarcomp')->name('calendarcomp');
Route::get('customerform','SubscribersController@customerform')->name('customerform');
Route::get('customercomp','SubscribersController@customercomp')->name('customercomp');
Route::get('customerreplyinfo','SubscribersController@customerreplyinfo')->name('customerreplyinfo');
Route::get('customerreply','SubscribersController@customerreply')->name('customerreply');
Route::get('customeraction','SubscribersController@customeraction')->name('customeraction');
Route::get('customersubmit','SubscribersController@customersubmit')->name('customersubmit');
Route::post('customersubmit','SubscribersController@customersubmit')->name('customersubmit');
Route::get('customeraction','SubscribersController@customeraction')->name('customeraction');
Route::post('editcomp','SubscribersController@edit')->name('editcomp');
Route::get('userdelete','SubscribersController@userdelete')->name('userdelete');
Route::get('newpost','ViewController@newpost')->name('newpost');
Route::post('postcomplete','SubscribersController@postcomplete')->name('postcomplete');
Route::get('mypost','ViewController@mypost')->name('mypost');
Route::get('datelist','ViewController@datelist')->name('datelist');
Route::get('crud.customerlist','ViewController@egosa')->name('crud.customerlist');
Route::get('customerlist','ViewController@customerlist')->name('customerlist');
Route::get('mycustomer','ViewController@mycustomer')->name('mycustomer');
Route::get('customerform','ViewController@customerform')->name('customerform');
Route::post('customercomp','SubscribersController@customercomp')->name('customercomp');
Route::post('post','ViewController@post')->name('post');
Route::post('customerinfo','ViewController@customerinfo')->name('customerinfo');
Route::post('customerreply','ViewController@customerreply')->name('customerreply');
Route::post('replycomp','SubscribersController@replycomp')->name('replycomp');
Route::post('replyinfo','ViewController@replyinfo')->name('replyinfo');
Route::post('postdelete','SubscribersController@postdelete')->name('postdelete');
Route::post('userdelete','SubscribersController@us_delete')->name('userdelete');
Route::post('customerdelete','SubscribersController@customerdelete')->name('customerdelete');
Route::post('datedelete','SubscribersController@datedelete')->name('datedelete');

Route::post('/good', 'ViewController@like')->name('index.good');

// パスワードリセット関連
Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {
        // パスワードリセットメール送信フォームページ
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        // メール送信処理
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        // メール送信完了ページ
        Route::get('/send_complete', [PasswordController::class, 'sendComplete'])->name('send_complete');
    });
    // パスワード再設定ページ
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    // パスワード更新処理
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    // パスワード更新終了ページ
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
});
Route::get('send_complete','ViewController@send')->name('send_complete');
Route::post('send_complete','ViewController@send')->name('send_complete');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
