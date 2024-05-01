<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Invoice Derail
    Route::apiResource('invoice-derails', 'InvoiceDerailApiController');

    // Shipping Charge
    Route::apiResource('shipping-charges', 'ShippingChargeApiController');
});
