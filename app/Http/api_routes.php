<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource("users", "UserAPIController");

Route::resource("paymentUsers", "PaymentUserAPIController");

Route::resource("depositTransactions", "DepositTransactionAPIController");

Route::resource("paymentReceivers", "PaymentReceiverAPIController");

Route::resource("receiverDepositTransactions", "ReceiverDepositTransactionAPIController");

Route::resource("merchantTypes", "MerchantTypeAPIController");

Route::resource("paymentMerchants", "PaymentMerchantAPIController");

Route::resource("paymentTranscations", "Payment TranscationAPIController");

Route::resource("paymentTranscations", "PaymentTranscationAPIController");

Route::resource("receivedTransactions", "ReceivedTransactionAPIController");

Route::resource("mPUPaymentTransactions", "MPUPaymentTransactionAPIController");

Route::resource("staff", "StaffAPIController");

Route::resource("staffReceiveTranscations", "StaffReceiveTranscationAPIController");