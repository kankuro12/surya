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
    return view('front.index');
});


Route::get('/billing/api/{id}', 'ApiController@billingApi');
Route::get('/bills/api/{id}', 'ApiController@billsApi');


// customer panel
Route::get('/customer/login', 'CustomerpanelController@index');
Route::post('/customer/login', 'CustomerpanelController@store');
Route::get('/customer/dashboard', 'CustomerpanelController@CusDashboard');
Route::get('/customer/order/{id}', 'CustomerpanelController@OrderDetail');
Route::post('/customer/order/{id}', 'CustomerpanelController@fileUpload');


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
// customer
Route::get('/customer/add', 'CustomerController@index');
Route::post('/customer/add', 'CustomerController@store');
Route::get('/customer/list', 'CustomerController@list');
Route::get('/customer/edit/{id}', 'CustomerController@edit');
Route::post('/customer/edit/{id}', 'CustomerController@update');
Route::get('/customer/delete/{id}', 'CustomerController@destroy');
Route::get('customer/job_orders/{id}', 'CustomerController@jobDetail');
Route::get('customer/order_items/{id}', 'CustomerController@jobOrderitem');
Route::post('customer/order_items/{id}', 'CustomerController@jobPicture');
Route::post('/design/order_items/{id}', 'CustomerController@jobDesign')->name('/design/order_items/{id}');
Route::get('/image/download/{id}', 'CustomerController@imageDownload')->name('imagedownload');
Route::get('/design/{id}', 'CustomerController@designDownload')->name('designdownload');

Route::get('/image/delete/{id}', 'CustomerController@imageDelete')->name('imagedelete');


// customer payment

Route::get('/customer/due', 'CustomerPayController@index');
Route::post('/customer/due', 'CustomerPayController@store');
Route::get('/customer/duebills/{id}', 'CustomerPayController@duebills');
// Route::get('/pay/{id}' ,'CustomerPayController@billPay');


// Staff
Route::get('/staff/add', 'StaffController@index');
Route::post('/staff/add', 'StaffController@store');
Route::get('/staff/list', 'StaffController@list');
Route::get('/staff/edit/{id}', 'StaffController@edit');
Route::post('/staff/edit/{id}', 'StaffController@update');
Route::get('/staff/delete/{id}', 'StaffController@destroy');



//Job Order
Route::get('/joborder/add', 'JoborderController@create');
Route::post('/joborder/add', 'JoborderController@store');
Route::get('/joborder/list', 'JoborderController@index');
Route::get('/joborder/worker', 'JoborderController@worker');

// expense
Route::get('/exp/add', 'ExpenseController@index');
Route::post('/exp/add', 'ExpenseController@store');
Route::get('/expcat/list', 'ExpenseController@list');
Route::get('/exp/manage/{id}', 'ExpenseController@manage');
Route::post('/exp/manage/{id}', 'ExpenseController@manageStore');
Route::get('/expenses/{expcategory_id}', 'ExpenseController@expenses');
Route::get('/expcat/delete/{id}', 'ExpenseController@destroy');
Route::get('/exp/delete/{id}', 'ExpenseController@destroyExp');
Route::get('/exp/edit/{id}', 'ExpenseController@editExp');
Route::post('/exp/edit/{id}', 'ExpenseController@editExpStore');

// staff advance
Route::get('/advance/add', 'AdvanceController@index');
Route::post('/advance/add', 'AdvanceController@store');
Route::get('/advance/list', 'AdvanceController@create');
Route::get('/advance/edit/{id}', 'AdvanceController@edit');
Route::post('/advance/edit/{id}', 'AdvanceController@update');
Route::get('/advance/delete/{id}', 'AdvanceController@destroy');

// suppliers
Route::get('/supplier/add', 'SupplierController@index');
Route::post('/supplier/add', 'SupplierController@store');
Route::get('/supplier/list', 'SupplierController@list');
Route::get('/supplier/edit/{id}', 'SupplierController@edit');
Route::post('/supplier/edit/{id}', 'SupplierController@update');

// supplier advances
Route::get('/supplier-adv/add', 'Supplier_advanceController@index');
Route::post('/supplier-adv/add', 'Supplier_advanceController@store');
Route::get('/supplier-adv/list', 'Supplier_advanceController@list');
Route::get('/supplier-adv/edit/{id}', 'Supplier_advanceController@edit');
Route::get('/supplier-adv/delete/{id}', 'Supplier_advanceController@destroy');

// supplier billing
Route::get('/supplier/billing', 'SupplierbillController@index');
Route::post('/supplier/billing', 'SupplierbillController@store');
Route::get('/supplier/bills', 'SupplierbillController@list');
Route::get('/supplier/bill/items/{id}', 'SupplierbillController@billItems');
Route::get('/bill/cancel/{id}', 'SupplierbillController@billCancel');
Route::get('/bill/undo/{id}', 'SupplierbillController@billUndo');
Route::get('/cancel/bills/', 'SupplierbillController@billCancelList');
Route::get('/bill/edit/{id}', 'SupplierbillController@billEdit');
Route::get('/bill/edit/{id}', 'SupplierbillController@billEdit');
Route::post('/bill/edit/{id}', 'SupplierbillController@billUpdate');
Route::get('/bill/item/del/{id}', 'SupplierbillController@billItemDel');








// salary
Route::get('salary/add', 'SalaryController@index');
Route::post('salary/add', 'SalaryController@store');
Route::get('/salary/list', 'SalaryController@list');


//supplier payments
Route::get('/supplier/payment', 'SupplierPayController@index');
Route::post('/supplier/payment', 'SupplierPayController@store');
Route::get('/supplier/due/{id}', 'SupplierPayController@supplierDue');
Route::get('/supplier/payment_list', 'SupplierPayController@paymentList');

//front end detail
Route::get('/slide', 'FrontendController@sliders');
Route::post('/slide/add', 'FrontendController@slider_add');
Route::get('/slide/del/{slider}', 'FrontendController@slider_del');

//front end detail
Route::get('/gallery', 'FrontendController@gallerys');
Route::post('/gallery/add', 'FrontendController@gallery_add');
Route::get('/gallery/del/{gallery}', 'FrontendController@gallery_del');

Route::get('/service', 'FrontendController@services');
Route::post('/service/add', 'FrontendController@service_add');
Route::get('/service/del/{service}', 'FrontendController@service_del');

Route::get('/testimonial', 'FrontendController@testimonials');
Route::post('/testimonial/add', 'FrontendController@testimonial_add');
Route::get('/testimonial/del/{testimonial}', 'FrontendController@testimonial_del');
