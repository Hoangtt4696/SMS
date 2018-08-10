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
Route::group(['middleware' => ['checkLogin']], function () {
  Route::get('/', function () {
    return view('Pages.Home');
  });

  Route::get('home', function () {
    return view('Pages.Home');
  })->name('home')->middleware('checkLogin');

  Route::group(['prefix'=>'product-type'], function () {
    Route::get('/', 'ProductTypeController@index')->name('listProductType');

    Route::get('new', function () {
      return view('Pages.ProductType.New');
    })->name('newProductType');
    Route::post('new', 'ProductTypeController@create')->name('newProductType_post');

    Route::post('edit/{id}', 'ProductTypeController@restore')->name('editProductType');
  });

  Route::group(['prefix'=>'product'], function () {
    Route::get('/', 'ProductController@index')->name('listProduct');

    Route::get('new', 'ProductController@newProduct')->name('newProduct');
    Route::post('new', 'ProductController@create')->name('postProduct');

    Route::get('edit/{id}', 'ProductController@editProduct')->name('editProduct');
    Route::post('edit/{id}', 'ProductController@restore')->name('postEditProduct');
  });

  Route::group(['prefix'=>'order'], function () {
    Route::get('/', 'InvoiceController@index')->name('listOrder');

    Route::get('new', function () {
      return view('Pages.Invoice.New');
    });

    Route::get('customer', 'InvoiceController@newCustomer')->name('newCustomer');
    Route::post('customer', 'InvoiceController@postCustomer')->name('postCustomer');

    Route::post('paid', 'InvoiceController@paid')->name('paidInvoice');
  });

  Route::group(['prefix'=>'employee'], function () {
    Route::get('/', 'EmployeeController@index')->name('listEmployee');

    Route::get('new', function () {
      return view('Pages.Employee.New');
    })->name('newEmployee');
    Route::post('new', 'EmployeeController@create')->name('postEmployee');

    Route::get('edit/{id}', 'EmployeeController@editEmployee')->name('editEmployee');
    Route::post('edit/{id}', 'EmployeeController@restore')->name('postEditEmployee');
  });

  Route::group(['prefix'=>'statistics'], function () {
    Route::get('/', 'StatisticController@productByType')->name('statisticProduct');
    Route::get('/revenue', 'StatisticController@revenue')->name('statisticRevenue');
  });
});

Route::get('login', function () {
  return view('Pages.Login');
})->name('login');
Route::post('login', 'EmployeeController@postLogin')->name('postLogin');

Route::get('register', 'EmployeeController@getRegister')->name('register');
Route::post('register', 'EmployeeController@postRegister')->name('postRegister');

Route::get('logout/{id}', 'EmployeeController@logout')->name('logout');

Route::get('forget-password', function () {
  return view('Pages.Forget');
})->name('forget');