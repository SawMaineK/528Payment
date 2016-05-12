

<li>
	<a href="{{ asset('administration/users') }}">
		<div class="notifications label label-warning">{!! App\Models\User::count() !!}</div>
		<p>@lang('users/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/paymentUsers') }}">
		<div class="notifications label label-warning">{!! App\Models\PaymentUser::count() !!}</div>
		<p>@lang('paymentUsers/index.model_name')</p>
	</a>
</li>



<li>
	<a href="{{ asset('administration/depositTransactions') }}">
		<div class="notifications label label-warning">{!! App\Models\DepositTransaction::count() !!}</div>
		<p>@lang('depositTransactions/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/paymentReceivers') }}">
		<div class="notifications label label-warning">{!! App\Models\PaymentReceiver::count() !!}</div>
		<p>@lang('paymentReceivers/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/receiverDepositTransactions') }}">
		<div class="notifications label label-warning">{!! App\Models\ReceiverDepositTransaction::count() !!}</div>
		<p>@lang('receiverDepositTransactions/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/merchantTypes') }}">
		<div class="notifications label label-warning">{!! App\Models\MerchantType::count() !!}</div>
		<p>@lang('merchantTypes/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/paymentMerchants') }}">
		<div class="notifications label label-warning">{!! App\Models\PaymentMerchant::count() !!}</div>
		<p>@lang('paymentMerchants/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/paymentTranscations') }}">
		<div class="notifications label label-warning">{!! App\Models\PaymentTranscation::count() !!}</div>
		<p>@lang('paymentTranscations/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/receivedTransactions') }}">
		<div class="notifications label label-warning">{!! App\Models\ReceivedTransaction::count() !!}</div>
		<p>@lang('receivedTransactions/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/mPUPaymentTransactions') }}">
		<div class="notifications label label-warning">{!! App\Models\MPUPaymentTransaction::count() !!}</div>
		<p>@lang('mPUPaymentTransactions/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/staff') }}">
		<div class="notifications label label-warning">{!! App\Models\Staff::count() !!}</div>
		<p>@lang('staff/index.model_name')</p>
	</a>
</li>

<li>
	<a href="{{ asset('administration/staffReceiveTranscations') }}">
		<div class="notifications label label-warning">{!! App\Models\StaffReceiveTranscation::count() !!}</div>
		<p>@lang('staffReceiveTranscations/index.model_name')</p>
	</a>
</li>

