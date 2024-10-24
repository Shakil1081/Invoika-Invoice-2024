<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Company List
    Route::delete('company-lists/destroy', 'CompanyListController@massDestroy')->name('company-lists.massDestroy');
    Route::post('company-lists/media', 'CompanyListController@storeMedia')->name('company-lists.storeMedia');
    Route::post('company-lists/ckmedia', 'CompanyListController@storeCKEditorImages')->name('company-lists.storeCKEditorImages');
    Route::resource('company-lists', 'CompanyListController');

    // Add Invoice Master
    Route::delete('add-invoice-masters/destroy', 'AddInvoiceMasterController@massDestroy')->name('add-invoice-masters.massDestroy');
//    Route::get('add-invoice-masters/create-with-details', 'AddInvoiceMasterController@createWithDetails')->name('add-invoice-masters.create.with.details');
    Route::get('add-invoice-masters/get-addresses/{clientId}', 'AddInvoiceMasterController@getAddresses')->name('add-invoice-masters.get.addresses');
    Route::get('add-invoice-masters/generate-pdf/{addInvoiceMaster}', 'AddInvoiceMasterController@generateInvoicePDF')->name('add-invoice-masters.generate-pdf');
    Route::get('add-invoice-masters/generate-invoice-number', 'AddInvoiceMasterController@generateInvoiceNumber')->name('add-invoice-masters.generate.invoice.number');

    Route::resource('add-invoice-masters', 'AddInvoiceMasterController');

    // Payment Status
    Route::delete('payment-statuses/destroy', 'PaymentStatusController@massDestroy')->name('payment-statuses.massDestroy');
    Route::resource('payment-statuses', 'PaymentStatusController');

    // Billing Address
    Route::delete('billing-addresses/destroy', 'BillingAddressController@massDestroy')->name('billing-addresses.massDestroy');
    Route::post('billing-addresses/parse-csv-import', 'BillingAddressController@parseCsvImport')->name('billing-addresses.parseCsvImport');
    Route::post('billing-addresses/process-csv-import', 'BillingAddressController@processCsvImport')->name('billing-addresses.processCsvImport');
    Route::resource('billing-addresses', 'BillingAddressController');

    // Shipping Address
    Route::delete('shipping-addresses/destroy', 'ShippingAddressController@massDestroy')->name('shipping-addresses.massDestroy');
    Route::post('shipping-addresses/parse-csv-import', 'ShippingAddressController@parseCsvImport')->name('shipping-addresses.parseCsvImport');
    Route::post('shipping-addresses/process-csv-import', 'ShippingAddressController@processCsvImport')->name('shipping-addresses.processCsvImport');
    Route::resource('shipping-addresses', 'ShippingAddressController');

    // Category List
    Route::delete('category-lists/destroy', 'CategoryListController@massDestroy')->name('category-lists.massDestroy');
    Route::resource('category-lists', 'CategoryListController');

    // Brand List
    Route::delete('brand-lists/destroy', 'BrandListController@massDestroy')->name('brand-lists.massDestroy');
    Route::resource('brand-lists', 'BrandListController');

    // Color
    Route::delete('colors/destroy', 'ColorController@massDestroy')->name('colors.massDestroy');
    Route::resource('colors', 'ColorController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::get('/product-info/{product}', 'ProductController@getProductInfo')->name('product.info');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Client List
    Route::delete('client-lists/destroy', 'ClientListController@massDestroy')->name('client-lists.massDestroy');
    Route::post('client-lists/parse-csv-import', 'ClientListController@parseCsvImport')->name('client-lists.parseCsvImport');
    Route::post('client-lists/process-csv-import', 'ClientListController@processCsvImport')->name('client-lists.processCsvImport');
    Route::resource('client-lists', 'ClientListController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Invoice Derail
    Route::delete('invoice-derails/destroy', 'InvoiceDerailController@massDestroy')->name('invoice-derails.massDestroy');
    Route::post('invoice-derails/parse-csv-import', 'InvoiceDerailController@parseCsvImport')->name('invoice-derails.parseCsvImport');
    Route::post('invoice-derails/process-csv-import', 'InvoiceDerailController@processCsvImport')->name('invoice-derails.processCsvImport');
    Route::resource('invoice-derails', 'InvoiceDerailController');

    // Payment Type
    Route::delete('payment-types/destroy', 'PaymentTypeController@massDestroy')->name('payment-types.massDestroy');
    Route::resource('payment-types', 'PaymentTypeController');

    // Tax List
    Route::delete('tax-lists/destroy', 'TaxListController@massDestroy')->name('tax-lists.massDestroy');
    Route::post('tax-lists/parse-csv-import', 'TaxListController@parseCsvImport')->name('tax-lists.parseCsvImport');
    Route::post('tax-lists/process-csv-import', 'TaxListController@processCsvImport')->name('tax-lists.processCsvImport');
    Route::resource('tax-lists', 'TaxListController');

    // Discount
    Route::delete('discounts/destroy', 'DiscountController@massDestroy')->name('discounts.massDestroy');
    Route::resource('discounts', 'DiscountController');

    // Shipping Charge
    Route::delete('shipping-charges/destroy', 'ShippingChargeController@massDestroy')->name('shipping-charges.massDestroy');
    Route::post('shipping-charges/parse-csv-import', 'ShippingChargeController@parseCsvImport')->name('shipping-charges.parseCsvImport');
    Route::post('shipping-charges/process-csv-import', 'ShippingChargeController@processCsvImport')->name('shipping-charges.processCsvImport');
    Route::resource('shipping-charges', 'ShippingChargeController');

    Route::get('/invoices', 'PaymentController@showInvoiceList')->name('invoice.list');
    Route::get('/invoices/{invoice}/payment', 'PaymentController@showPaymentPage')->name('invoice.payment');
    Route::post('/invoices/{invoice}/payment', 'PaymentController@processPayment')->name('invoice.processPayment');
    Route::get('invoices/payment-make/{invoice}', 'PaymentController@paymentMakePage')->name('payment.confirmation');
    Route::post('/invoices/{amount}/{invoice}/finalize', 'PaymentController@finalizePayment')->name('invoice.finalizePayment');
    Route::get('invoices/payment-vouchers/{invoice}', 'PaymentController@paymentVouchers')->name('invoice.paymentVouchers');
    Route::get('invoices/payment-voucher/download/{id}', 'PaymentController@paymentVoucherDownload')->name('invoice.paymentVouchers.download');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
