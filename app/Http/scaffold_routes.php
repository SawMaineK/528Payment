<?php

/*
|--------------------------------------------------------------------------
| Scaffold Routes
|--------------------------------------------------------------------------
|
| Here is where all scaffold routes are defined.
|
*/

Route::resource('generators', 'GeneratorController');

Route::get('generators/{id}/delete', [
    'as' => 'generators.delete',
    'uses' => 'GeneratorController@destroy',
]);


Route::resource('users', 'UserController');

Route::get('users/{id}/delete', [
    'as' => 'administration.users.delete',
    'uses' => 'UserController@destroy',
]);


Route::resource('paymentUsers', 'PaymentUserController');

Route::get('paymentUsers/{id}/delete', [
    'as' => 'administration.paymentUsers.delete',
    'uses' => 'PaymentUserController@destroy',
]);


Route::resource('paymentUsers', 'PaymentUserController');

Route::get('paymentUsers/{id}/delete', [
    'as' => 'administration.paymentUsers.delete',
    'uses' => 'PaymentUserController@destroy',
]);


Route::resource('paymentUsers', 'PaymentUserController');

Route::get('paymentUsers/{id}/delete', [
    'as' => 'administration.paymentUsers.delete',
    'uses' => 'PaymentUserController@destroy',
]);


Route::resource('depositTransactions', 'DepositTransactionController');

Route::get('depositTransactions/{id}/delete', [
    'as' => 'administration.depositTransactions.delete',
    'uses' => 'DepositTransactionController@destroy',
]);


Route::resource('paymentReceivers', 'PaymentReceiverController');

Route::get('paymentReceivers/{id}/delete', [
    'as' => 'administration.paymentReceivers.delete',
    'uses' => 'PaymentReceiverController@destroy',
]);


Route::resource('receiverDepositTransactions', 'ReceiverDepositTransactionController');

Route::get('receiverDepositTransactions/{id}/delete', [
    'as' => 'administration.receiverDepositTransactions.delete',
    'uses' => 'ReceiverDepositTransactionController@destroy',
]);


Route::resource('merchantTypes', 'MerchantTypeController');

Route::get('merchantTypes/{id}/delete', [
    'as' => 'administration.merchantTypes.delete',
    'uses' => 'MerchantTypeController@destroy',
]);


Route::resource('paymentMerchants', 'PaymentMerchantController');

Route::get('paymentMerchants/{id}/delete', [
    'as' => 'administration.paymentMerchants.delete',
    'uses' => 'PaymentMerchantController@destroy',
]);


Route::resource('paymentTranscations', 'Payment TranscationController');

Route::get('paymentTranscations/{id}/delete', [
    'as' => 'administration.paymentTranscations.delete',
    'uses' => 'Payment TranscationController@destroy',
]);


Route::resource('paymentTranscations', 'Payment TranscationController');

Route::get('paymentTranscations/{id}/delete', [
    'as' => 'administration.paymentTranscations.delete',
    'uses' => 'Payment TranscationController@destroy',
]);


Route::resource('paymentTranscations', 'PaymentTranscationController');

Route::get('paymentTranscations/{id}/delete', [
    'as' => 'administration.paymentTranscations.delete',
    'uses' => 'PaymentTranscationController@destroy',
]);


Route::resource('receivedTransactions', 'ReceivedTransactionController');

Route::get('receivedTransactions/{id}/delete', [
    'as' => 'administration.receivedTransactions.delete',
    'uses' => 'ReceivedTransactionController@destroy',
]);


Route::resource('mPUPaymentTransactions', 'MPUPaymentTransactionController');

Route::get('mPUPaymentTransactions/{id}/delete', [
    'as' => 'administration.mPUPaymentTransactions.delete',
    'uses' => 'MPUPaymentTransactionController@destroy',
]);

Route::resource('staff', 'StaffController');

Route::get('staff/{id}/delete', [
    'as' => 'administration.staff.delete',
    'uses' => 'StaffController@destroy',
]);


Route::resource('staffReceiveTranscations', 'StaffReceiveTranscationController');

Route::get('staffReceiveTranscations/{id}/delete', [
    'as' => 'administration.staffReceiveTranscations.delete',
    'uses' => 'StaffReceiveTranscationController@destroy',
]);
