<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMPUPaymentTransactionRequest;
use App\Http\Requests\UpdateMPUPaymentTransactionRequest;
use App\Libraries\Repositories\MPUPaymentTransactionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\MPUPaymentTransaction;
use App\Models\PaymentUser;
use App\Models\PaymentReceiver;

class MPUPaymentTransactionController extends AppBaseController
{

	/** @var  MPUPaymentTransactionRepository */
	private $mPUPaymentTransactionRepository;

	function __construct(MPUPaymentTransactionRepository $mPUPaymentTransactionRepo)
	{
		$this->mPUPaymentTransactionRepository = $mPUPaymentTransactionRepo;
	}

	/**
	 * Display a listing of the MPUPaymentTransaction.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mPUPaymentTransactions = MPUPaymentTransaction::with(['paymentUser', 'paymentReceiver'])->paginate(10);

		return view('mPUPaymentTransactions.index')
			->with('mPUPaymentTransactions', $mPUPaymentTransactions);
	}

	/**
	 * Show the form for creating a new MPUPaymentTransaction.
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

		$paymentReceiver=PaymentReceiver::all();
		$paymentReceivers = [];
		foreach ($paymentReceiver as $key => $value) {
			$paymentReceivers[$value->id] = $value->id;
		}
		return view('mPUPaymentTransactions.create')->with(['paymentUsers'=>$paymentUsers, 'paymentReceivers'=>$paymentReceivers]);
	}

	/**
	 * Store a newly created MPUPaymentTransaction in storage.
	 *
	 * @param CreateMPUPaymentTransactionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMPUPaymentTransactionRequest $request)
	{
		$input = $request->all();

		

		$mPUPaymentTransaction = $this->mPUPaymentTransactionRepository->create($input);

		Flash::success('MPUPaymentTransaction saved successfully.');

		return redirect(route('administration.mPUPaymentTransactions.index'));
	}

	/**
	 * Display the specified MPUPaymentTransaction.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mPUPaymentTransaction = MPUPaymentTransaction::with(['paymentUser', 'paymentReceiver'])->where('id', $id)->first();

		if(empty($mPUPaymentTransaction))
		{
			Flash::error('MPUPaymentTransaction not found');

			return redirect(route('administration.mPUPaymentTransactions.index'));
		}

		return view('mPUPaymentTransactions.show')->with('mPUPaymentTransaction', $mPUPaymentTransaction);
	}

	/**
	 * Show the form for editing the specified MPUPaymentTransaction.
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

		$paymentReceiver=PaymentReceiver::all();
		$paymentReceivers = [];
		foreach ($paymentReceiver as $key => $value) {
			$paymentReceivers[$value->id] = $value->id;
		}

		$mPUPaymentTransaction = $this->mPUPaymentTransactionRepository->find($id);

		if(empty($mPUPaymentTransaction))
		{
			Flash::error('MPUPaymentTransaction not found');

			return redirect(route('administration.mPUPaymentTransactions.index'));
		}

		return view('mPUPaymentTransactions.edit')->with(['paymentUsers'=>$paymentUsers, 'paymentReceivers'=>$paymentReceivers, 'mPUPaymentTransaction'=>$mPUPaymentTransaction]);
	}

	/**
	 * Update the specified MPUPaymentTransaction in storage.
	 *
	 * @param  int              $id
	 * @param UpdateMPUPaymentTransactionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateMPUPaymentTransactionRequest $request)
	{
		$mPUPaymentTransaction = $this->mPUPaymentTransactionRepository->find($id);

		if(empty($mPUPaymentTransaction))
		{
			Flash::error('MPUPaymentTransaction not found');

			return redirect(route('administration.mPUPaymentTransactions.index'));
		}

		$input = $request->all();

		

		$this->mPUPaymentTransactionRepository->updateRich($input, $id);

		Flash::success('MPUPaymentTransaction updated successfully.');

		return redirect(route('administration.mPUPaymentTransactions.index'));
	}

	/**
	 * Remove the specified MPUPaymentTransaction from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mPUPaymentTransaction = $this->mPUPaymentTransactionRepository->find($id);

		if(empty($mPUPaymentTransaction))
		{
			Flash::error('MPUPaymentTransaction not found');

			return redirect(route('administration.mPUPaymentTransactions.index'));
		}

		

		$this->mPUPaymentTransactionRepository->delete($id);

		Flash::success('MPUPaymentTransaction deleted successfully.');

		return redirect(route('administration.mPUPaymentTransactions.index'));
	}
}
