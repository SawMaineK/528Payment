<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePaymentTranscationRequest;
use App\Http\Requests\UpdatePaymentTranscationRequest;
use App\Libraries\Repositories\PaymentTranscationRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\PaymentTranscation;
use App\Models\PaymentUser;
use App\Models\PaymentMerchant;

class PaymentTranscationController extends AppBaseController
{

	/** @var  PaymentTranscationRepository */
	private $paymentTranscationRepository;

	function __construct(PaymentTranscationRepository $paymentTranscationRepo)
	{
		$this->paymentTranscationRepository = $paymentTranscationRepo;
	}

	/**
	 * Display a listing of the PaymentTranscation.
	 *
	 * @return Response
	 */
	public function index()
	{
		$paymentTranscations = PaymentTranscation::with(['paymentUser', 'paymentMerchant'])->paginate(10);

		return view('paymentTranscations.index')
			->with('paymentTranscations', $paymentTranscations);
	}

	/**
	 * Show the form for creating a new PaymentTranscation.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$paymentUser=PaymentUser::all();
		$paymentUsers = [];
		foreach ($paymentUser as $key => $value) {
			$paymentUsers[$value->id] = $value->id;
		}

		$paymentMerchant=PaymentMerchant::all();
		$paymentMerchants = [];
		foreach ($paymentMerchant as $key => $value) {
			$paymentMerchants[$value->id] = $value->id;
		}
		return view('paymentTranscations.create')->with(['paymentUsers'=>$paymentUsers, 'paymentMerchants'=>$paymentMerchants]);
	}

	/**
	 * Store a newly created PaymentTranscation in storage.
	 *
	 * @param CreatePaymentTranscationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePaymentTranscationRequest $request)
	{
		$input = $request->all();

		

		$paymentTranscation = $this->paymentTranscationRepository->create($input);

		Flash::success('PaymentTranscation saved successfully.');

		return redirect(route('administration.paymentTranscations.index'));
	}

	/**
	 * Display the specified PaymentTranscation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$paymentTranscation = PaymentTranscation::with(['paymentUser', 'paymentMerchant'])->where('id', $id)->first();

		if(empty($paymentTranscation))
		{
			Flash::error('PaymentTranscation not found');

			return redirect(route('administration.paymentTranscations.index'));
		}

		return view('paymentTranscations.show')->with('paymentTranscation', $paymentTranscation);
	}

	/**
	 * Show the form for editing the specified PaymentTranscation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		
		$paymentUser=PaymentUser::all();
		$paymentUsers = [];
		foreach ($paymentUser as $key => $value) {
			$paymentUsers[$value->id] = $value->id;
		}

		$paymentMerchant=PaymentMerchant::all();
		$paymentMerchants = [];
		foreach ($paymentMerchant as $key => $value) {
			$paymentMerchants[$value->id] = $value->id;
		}

		$paymentTranscation = $this->paymentTranscationRepository->find($id);

		if(empty($paymentTranscation))
		{
			Flash::error('PaymentTranscation not found');

			return redirect(route('administration.paymentTranscations.index'));
		}

		return view('paymentTranscations.edit')->with(['paymentUsers'=>$paymentUsers, 'paymentMerchants'=>$paymentMerchants, 'paymentTranscation'=>$paymentTranscation]);
	}

	/**
	 * Update the specified PaymentTranscation in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePaymentTranscationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePaymentTranscationRequest $request)
	{
		$paymentTranscation = $this->paymentTranscationRepository->find($id);

		if(empty($paymentTranscation))
		{
			Flash::error('PaymentTranscation not found');

			return redirect(route('administration.paymentTranscations.index'));
		}

		$input = $request->all();

		

		$this->paymentTranscationRepository->updateRich($input, $id);

		Flash::success('PaymentTranscation updated successfully.');

		return redirect(route('administration.paymentTranscations.index'));
	}

	/**
	 * Remove the specified PaymentTranscation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$paymentTranscation = $this->paymentTranscationRepository->find($id);

		if(empty($paymentTranscation))
		{
			Flash::error('PaymentTranscation not found');

			return redirect(route('administration.paymentTranscations.index'));
		}

		

		$this->paymentTranscationRepository->delete($id);

		Flash::success('PaymentTranscation deleted successfully.');

		return redirect(route('administration.paymentTranscations.index'));
	}
}
