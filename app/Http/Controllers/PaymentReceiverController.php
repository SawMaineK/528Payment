<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePaymentReceiverRequest;
use App\Http\Requests\UpdatePaymentReceiverRequest;
use App\Libraries\Repositories\PaymentReceiverRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\PaymentReceiver;
use App\Models\User;

class PaymentReceiverController extends AppBaseController
{

	/** @var  PaymentReceiverRepository */
	private $paymentReceiverRepository;

	function __construct(PaymentReceiverRepository $paymentReceiverRepo)
	{
		$this->paymentReceiverRepository = $paymentReceiverRepo;
	}

	/**
	 * Display a listing of the PaymentReceiver.
	 *
	 * @return Response
	 */
	public function index()
	{
		$paymentReceivers = PaymentReceiver::with(['user'])->paginate(10);

		return view('paymentReceivers.index')
			->with('paymentReceivers', $paymentReceivers);
	}

	/**
	 * Show the form for creating a new PaymentReceiver.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$user=User::all();
		$users = [];
		foreach ($user as $key => $value) {
			$users[$value->id] = $value->name;
		}
		return view('paymentReceivers.create')->with(['users'=>$users]);
	}

	/**
	 * Store a newly created PaymentReceiver in storage.
	 *
	 * @param CreatePaymentReceiverRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePaymentReceiverRequest $request)
	{
		$input = $request->all();

		

		$paymentReceiver = $this->paymentReceiverRepository->create($input);

		Flash::success('PaymentReceiver saved successfully.');

		return redirect(route('administration.paymentReceivers.index'));
	}

	/**
	 * Display the specified PaymentReceiver.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$paymentReceiver = PaymentReceiver::with(['user'])->where('id', $id)->first();

		if(empty($paymentReceiver))
		{
			Flash::error('PaymentReceiver not found');

			return redirect(route('administration.paymentReceivers.index'));
		}

		return view('paymentReceivers.show')->with('paymentReceiver', $paymentReceiver);
	}

	/**
	 * Show the form for editing the specified PaymentReceiver.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		
		$user=User::all();
		$users = [];
		foreach ($user as $key => $value) {
			$users[$value->id] = $value->name;
		}

		$paymentReceiver = $this->paymentReceiverRepository->find($id);

		if(empty($paymentReceiver))
		{
			Flash::error('PaymentReceiver not found');

			return redirect(route('administration.paymentReceivers.index'));
		}

		return view('paymentReceivers.edit')->with(['users'=>$users, 'paymentReceiver'=>$paymentReceiver]);
	}

	/**
	 * Update the specified PaymentReceiver in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePaymentReceiverRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePaymentReceiverRequest $request)
	{
		$paymentReceiver = $this->paymentReceiverRepository->find($id);

		if(empty($paymentReceiver))
		{
			Flash::error('PaymentReceiver not found');

			return redirect(route('administration.paymentReceivers.index'));
		}

		$input = $request->all();

		

		$this->paymentReceiverRepository->updateRich($input, $id);

		Flash::success('PaymentReceiver updated successfully.');

		return redirect(route('administration.paymentReceivers.index'));
	}

	/**
	 * Remove the specified PaymentReceiver from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$paymentReceiver = $this->paymentReceiverRepository->find($id);

		if(empty($paymentReceiver))
		{
			Flash::error('PaymentReceiver not found');

			return redirect(route('administration.paymentReceivers.index'));
		}

		

		$this->paymentReceiverRepository->delete($id);

		Flash::success('PaymentReceiver deleted successfully.');

		return redirect(route('administration.paymentReceivers.index'));
	}
}
