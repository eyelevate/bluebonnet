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

// Home Page
Route::get('/', 'HomeController@index')->name('home');
Route::get('/cart', 'HomeController@cart')->name('home.cart');
Route::get('/frequently-asked-questions', 'HomeController@faq')->name('home.faq');
Route::get('/logout', 'HomeController@logout')->name('home.logout');
Route::get('/privacy-policy', 'HomeController@privacy')->name('home.privacy');
Route::get('/shipping', 'HomeController@shipping')->name('home.shipping');
Route::get('/shop', 'HomeController@shop')->name('home.shop');
Route::post('/address-validate', 'HomeController@addressValidate')->name('home.address_validate');
Route::post('/update-shipping', 'HomeController@updateShipping')->name('home.update_shipping');
Route::post('/update-shipping-finish', 'HomeController@updateShippingFinish')->name('home.update_shipping_finish');
Route::get('/terms-of-service', 'HomeController@tos')->name('home.tos');
Route::get('/checkout', 'HomeController@checkout')->name('home.checkout');
Route::post('/finish', 'HomeController@finish')->name('home.finish');
Route::post('/attempt-login', 'HomeController@attemptLogin')->name('home.attempt_login');
Route::get('/thank-you', 'HomeController@thankYou')->name('home.thank_you');
Route::get('/custom', 'HomeController@custom')->name('home.custom');
Route::get('/contact', 'HomeController@contact')->name('home.contact');

// collections
Route::get('/collections/{collection}/show', 'CollectionController@show')->name('collection.show');

// Invoice 
Route::patch('/done/{invoice}', 'InvoiceController@done')->name('invoice.done');
Route::get('/invoices/{token}/finish', 'InvoiceController@finish')->name('invoice.finish');

// inventory items
Route::post('/inventory-items/{inventoryItem}/add-to-cart', 'InventoryItemController@addToCart')->name('inventory_item.add_to_cart');
Route::get('/item/{inventory_item}/shop', 'InventoryItemController@shop')->name('inventory_item.shop');
Route::post('/inventory-items/{inventory_item}/get-subtotal', 'InventoryItemController@subtotal')->name('inventory_item.subtotal');
Route::post('/inventory-items/delete-cart-item', 'InventoryItemController@deleteCartItem')->name('inventory_item.delete_cart_item');

Auth::routes();

// Admin Access
Route::get('/admins/login', 'AdminController@login')->name('admin.login');
Route::post('/admins/authenticate', 'AdminController@authenticate')->name('admin.auth');

/** Customer Pages **/
Route::group(['middleware' => ['frontend']], function () {
    // dashboard
    Route::get('/dashboard', 'HomeController@dashboard')->name('home.dashboard');
});

// Redirects if role_id > 3 (employee) or guests, check middleware/Authentice class if need to change
Route::group(['middleware' => ['check:1']], function () {
});
Route::group(['middleware' => ['check:2']], function () {
    // Employees
    Route::get('/employees', 'EmployeeController@index')->name('employee.index');
    Route::get('/employees/create', 'EmployeeController@create')->name('employee.create');
    Route::delete('/employees/{employee}', 'EmployeeController@destroy')->name('employee.destroy');
    Route::post('/employees/store', 'EmployeeController@store')->name('employee.store');
    Route::get('/employees/{employee}/show', 'EmployeeController@show')->name('employee.show');
    Route::get('/employees/{vendor}/edit', 'EmployeeController@edit')->name('employee.edit');
    Route::patch('/employees/{vendor}', 'EmployeeController@update')->name('employee.update');
});
Route::group(['middleware' => ['check:3']], function () {
    // Admins
    Route::get('/admins', 'AdminController@index')->name('admin.index');
    Route::get('/admins/logout', 'AdminController@logout')->name('admin.logout');

    // Customers
    Route::get('/customers', 'CustomerController@index')->name('customer.index');
    Route::get('/customers/create', 'CustomerController@create')->name('customer.create');
    Route::delete('/customers/{customer}', 'CustomerController@destroy')->name('customer.destroy');
    Route::post('/customers/store', 'CustomerController@store')->name('customer.store');
    Route::get('/customers/{customer}/show', 'CustomerController@show')->name('customer.show');
    Route::get('/customers/{customer}/edit', 'CustomerController@edit')->name('customer.edit');
    Route::patch('/customers/{customer}', 'CustomerController@update')->name('customer.update');

    // Companies
    Route::get('/companies', 'CompanyController@index')->name('company.index');
    Route::get('/companies/create', 'CompanyController@create')->name('company.create');
    Route::delete('/companies/{company}', 'CompanyController@destroy')->name('company.destroy');
    Route::post('/companies/store', 'CompanyController@store')->name('company.store');
    Route::get('/companies/{company}/show', 'CompanyController@show')->name('company.show');
    Route::get('/companies/{company}/edit', 'CompanyController@edit')->name('company.edit');
    Route::patch('/companies/{company}', 'CompanyController@update')->name('company.update');

    // Collections
    Route::get('/collections', 'CollectionController@index')->name('collection.index');
    Route::get('/collections/create', 'CollectionController@create')->name('collection.create');
    Route::delete('/collections/{collection}', 'CollectionController@destroy')->name('collection.destroy');
    Route::post('/collections/store', 'CollectionController@store')->name('collection.store');
    Route::get('/collections/{collection}/edit', 'CollectionController@edit')->name('collection.edit');
    Route::patch('/collections/{collection}', 'CollectionController@update')->name('collection.update');
    Route::get('/collections/{collection}/set', 'CollectionController@set')->name('collection.set');
    Route::post('/collections/{collection}/add', 'CollectionController@add')->name('collection.add');
    Route::post('/collections/{collection}/remove', 'CollectionController@remove')->name('collection.remove');

    // Designs
    Route::get('/designs', 'DesignController@index')->name('design.index');
    Route::get('/designs/create', 'DesignController@create')->name('design.create');
    Route::delete('/designs/{design}', 'DesignController@destroy')->name('design.destroy');
    Route::post('/designs/store', 'DesignController@store')->name('design.store');
    Route::get('/designs/{design}/show', 'DesignController@show')->name('design.show');
    Route::get('/designs/{design}/edit', 'DesignController@edit')->name('design.edit');
    Route::patch('/designs/{design}', 'DesignController@update')->name('design.update');

    // Employees
    Route::get('/employees', 'EmployeeController@index')->name('employee.index');
    Route::get('/employees/create', 'EmployeeController@create')->name('employee.create');
    Route::delete('/employees/{employee}', 'EmployeeController@destroy')->name('employee.destroy');
    Route::post('/employees/store', 'EmployeeController@store')->name('employee.store');
    Route::get('/employees/{employee}/show', 'EmployeeController@show')->name('employee.show');
    Route::get('/employees/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
    Route::patch('/employees/{employee}', 'EmployeeController@update')->name('employee.update');

    // Fees
    Route::get('/fees', 'FeeController@index')->name('fee.index');
    Route::get('/fees/create', 'FeeController@create')->name('fee.create');
    Route::delete('/fees/{fee}', 'FeeController@destroy')->name('fee.destroy');
    Route::post('/fees/store', 'FeeController@store')->name('fee.store');
    Route::get('/fees/{fee}/show', 'FeeController@show')->name('fee.show');
    Route::get('/fees/{fee}/edit', 'FeeController@edit')->name('fee.edit');
    Route::patch('/fees/{fee}', 'FeeController@update')->name('fee.update');
    Route::post('/fees/retrieve', 'FeeController@retrieve')->name('fee.retrieve');
    Route::post('/fees/totals', 'FeeController@totals')->name('fee.totals');

    // Finger
    Route::get('/fingers', 'FingerController@index')->name('finger.index');
    Route::get('/fingers/create', 'FingerController@create')->name('finger.create');
    Route::delete('/fingers/{finger}', 'FingerController@destroy')->name('finger.destroy');
    Route::post('/fingers/store', 'FingerController@store')->name('finger.store');
    Route::get('/fingers/{finger}/show', 'FingerController@show')->name('finger.show');
    Route::get('/fingers/{finger}/edit', 'FingerController@edit')->name('finger.edit');
    Route::patch('/fingers/{finger}', 'FingerController@update')->name('finger.update');



    // Inventory
    Route::get('/inventories', 'InventoryController@index')->name('inventory.index');
    Route::get('/inventories/create', 'InventoryController@create')->name('inventory.create');
    Route::delete('/inventories/{inventory}', 'InventoryController@destroy')->name('inventory.destroy');
    Route::post('/inventories/store', 'InventoryController@store')->name('inventory.store');
    Route::get('/inventories/{inventory}/show', 'InventoryController@show')->name('inventory.show');
    Route::get('/inventories/{inventory}/edit', 'InventoryController@edit')->name('inventory.edit');
    Route::patch('/inventories/{inventory}', 'InventoryController@update')->name('inventory.update');

    
    // Inventory Item
    Route::get('/inventory-items', 'InventoryItemController@index')->name('inventory_item.index');
    Route::get('/inventory-items/{inventory}/create', 'InventoryItemController@create')->name('inventory_item.create');
    Route::delete('/inventory-items/{inventory_item}', 'InventoryItemController@destroy')->name('inventory_item.destroy');
    Route::post('/inventory-items/{inventory}/store', 'InventoryItemController@store')->name('inventory_item.store');
    Route::post('/inventory-items/find-items', 'InventoryItemController@findItems')->name('inventory_item.find_items');
    
    Route::get('/inventory-items/{inventory_item}/edit', 'InventoryItemController@edit')->name('inventory_item.edit');
    Route::patch('/inventory-items/{inventory_item}', 'InventoryItemController@update')->name('inventory_item.update');
    Route::post('/inventory-items/{inventory_item}/get-subtotal-admins', 'InventoryItemController@subtotalAdmin')->name('inventory_item.subtotal_admin');
    Route::post('/inventory-items/get-options', 'InventoryItemController@getOptions')->name('inventory_item.get_options');
    Route::post('/inventory-items/get-totals', 'InventoryItemController@getTotals')->name('inventory_item.get_totals');

    // Invoices
    Route::get('/invoices', 'InvoiceController@index')->name('invoice.index');
    Route::get('/invoices/create', 'InvoiceController@create')->name('invoice.create');
    Route::delete('/invoices/{invoice}', 'InvoiceController@destroy')->name('invoice.destroy');
    Route::post('/invoices/store', 'InvoiceController@store')->name('invoice.store');
    Route::get('/invoices/{invoice}/show', 'InvoiceController@show')->name('invoice.show');
    Route::get('/invoices/{invoice}/edit', 'InvoiceController@edit')->name('invoice.edit');
    Route::patch('/invoices/{invoice}', 'InvoiceController@update')->name('invoice.update');
    Route::patch('/invoices/{invoice}', 'InvoiceController@complete')->name('invoice.complete');
    Route::post('/invoices/{invoice}/refund', 'InvoiceController@refund')->name('invoice.refund');
    Route::post('/invoices/{invoice}/send-email', 'InvoiceController@sendEmail')->name('invoice.email');
    Route::post('/invoices/reset', 'InvoiceController@reset')->name('invoice.reset');
    Route::patch('/invoices/{invoice}/revert', 'InvoiceController@revert')->name('invoice.revert');
    Route::post('/invoices/make-session', 'InvoiceController@makeSession')->name('invoice.make_session');
    Route::post('/invoices/forget-session', 'InvoiceController@forgetSession')->name('invoice.forget_session');
    Route::post('/invoices/authorize-payment', 'InvoiceController@authorizePayment')->name('invoice.authorize_payment');
    Route::post('/invoices/push-email', 'InvoiceController@pushEmail')->name('invoice.push_email');
    // Invoice Item
    Route::get('/invoice-items', 'InvoiceItemController@index')->name('invoice_item.index');
    Route::get('/invoice-items/create', 'InvoiceItemController@create')->name('invoice_item.create');
    Route::delete('/invoice-items/{invoiceItem}', 'InvoiceItemController@destroy')->name('invoice_item.destroy');
    Route::post('/invoice-items/store', 'InvoiceItemController@store')->name('invoice_item.store');
    Route::get('/invoice-items/{invoiceItem}/show', 'InvoiceItemController@show')->name('invoice_item.show');
    Route::get('/invoice-items/{invoiceItem}/edit', 'InvoiceItemController@edit')->name('invoice_item.edit');
    Route::patch('/invoice-items/{invoiceItem}', 'InvoiceItemController@update')->name('invoice_item.update');
    Route::post('/invoice-items/{invoiceItem}/update-price', 'InvoiceItemController@updatePrice')->name('invoice_item.update_price');
    // Line
    Route::get('/lines', 'LineController@index')->name('line.index');
    Route::get('/lines/create', 'LineController@create')->name('line.create');
    Route::delete('/lines/{line}', 'LineController@destroy')->name('line.destroy');
    Route::post('/lines/store', 'LineController@store')->name('line.store');
    Route::get('/lines/{line}/show', 'LineController@show')->name('line.show');
    Route::get('/lines/{line}/edit', 'LineController@edit')->name('line.edit');
    Route::patch('/lines/{line}', 'LineController@update')->name('line.update');

    // Metal
    Route::get('/metals', 'MetalController@index')->name('metal.index');
    Route::get('/metals/create', 'MetalController@create')->name('metal.create');
    Route::delete('/metals/{metal}', 'MetalController@destroy')->name('metal.destroy');
    Route::post('/metals/store', 'MetalController@store')->name('metal.store');
    Route::get('/metals/{metal}/show', 'MetalController@show')->name('metal.show');
    Route::get('/metals/{metal}/edit', 'MetalController@edit')->name('metal.edit');
    Route::patch('/metals/{metal}', 'MetalController@update')->name('metal.update');

    // Manages
    Route::get('/manges', 'MangeController@index')->name('mange.index');
    Route::get('/manges/create', 'MangeController@create')->name('mange.create');
    Route::delete('/manges/{mange}', 'MangeController@destroy')->name('mange.destroy');
    Route::post('/manges/store', 'MangeController@store')->name('mange.store');
    Route::get('/manges/{mange}/show', 'MangeController@show')->name('mange.show');
    Route::get('/manges/{mange}/edit', 'MangeController@edit')->name('mange.edit');
    Route::patch('/manges/{mange}', 'MangeController@update')->name('mange.update');

    // Size
    Route::get('/sizes', 'SizeController@index')->name('size.index');
    Route::get('/sizes/create', 'SizeController@create')->name('size.create');
    Route::delete('/sizes/{size}', 'SizeController@destroy')->name('size.destroy');
    Route::post('/sizes/store', 'SizeController@store')->name('size.store');
    Route::get('/sizes/{size}/show', 'SizeController@show')->name('size.show');
    Route::get('/sizes/{size}/edit', 'SizeController@edit')->name('size.edit');
    Route::patch('/sizes/{size}', 'SizeController@update')->name('size.update');

    // Stone
    Route::get('/stones', 'StoneController@index')->name('stone.index');
    Route::get('/stones/create', 'StoneController@create')->name('stone.create');
    Route::delete('/stones/{stone}', 'StoneController@destroy')->name('stone.destroy');
    Route::post('/stones/store', 'StoneController@store')->name('stone.store');
    Route::get('/stones/{stone}/show', 'StoneController@show')->name('stone.show');
    Route::get('/stones/{stone}/edit', 'StoneController@edit')->name('stone.edit');
    Route::patch('/stones/{stone}', 'StoneController@update')->name('stone.update');

    // Taxes
    Route::get('/taxes', 'TaxController@index')->name('tax.index');
    Route::get('/taxes/create', 'TaxController@create')->name('tax.create');
    Route::post('/taxes/store', 'TaxController@store')->name('tax.store');



    // Vendors
    Route::get('/vendors', 'VendorController@index')->name('vendor.index');
    Route::get('/vendors/create', 'VendorController@create')->name('vendor.create');
    Route::delete('/vendors/{vendor}', 'VendorController@destroy')->name('vendor.destroy');
    Route::post('/vendors/store', 'VendorController@store')->name('vendor.store');
    Route::get('/vendors/{vendor}/show', 'VendorController@show')->name('vendor.show');
    Route::get('/vendors/{vendor}/edit', 'VendorController@edit')->name('vendor.edit');
    Route::patch('/vendors/{vendor}', 'VendorController@update')->name('vendor.update');

    // Mail Test
    Route::get('/email', 'HomeController@email')->name('sendEmail');


});

