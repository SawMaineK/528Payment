<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateReceiverDepositTransactionRequest;
use App\Http\Requests\UpdateReceiverDepositTransactionRequest;
use App\Libraries\Repositories\ReceiverDepositTransactionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\ReceiverDepositTransaction;
use App\Models\PaymentReceiver;

class ReceiverDepositTransactionController extends AppBaseController
{

	/** @var  ReceiverDepositTransactionRepository */
	private $receiverDepositTransactionRepository;

	function __construct(ReceiverDepositTransactionRepository $receiverDepositTransactionRepo)
	{
		$this->receiverDepositTransactionRepository = $receiverDepositTransactionRepo;
	}

	/**
	 * Display a listing of the ReceiverDepositTransaction.
	 *
	 * @return Response
	 */
	public function index()
	{
		$receiverDepositTransactions = ReceiverDepositTransaction::with(['paymentReceiver'])->paginate(10);

		return view('receiverDepositTransactions.index')
			->with('receiverDepositTransactions', $receiverDepositTransactions);
	}

	/**
	 * Show the form for creating a new ReceiverDepositTransaction.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$paymentReceiver=PaymentReceiver::all();
		$paymentReceivers = [];
		foreach ($paymentReceiver as $key => $value) {
			$paymentReceivers[$value->id] = $value->id;
		}
		return view('receiverDepositTransactions.create')->with(['paymentReceivers'=>$paymentReceivers]);
	}

	/**
	 * Store a newly created ReceiverDepositTransaction in storage.
	 *
	 * @param CreateReceiverDepositTransactionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateReceiverDepositTransactionRequest $request)
	{
		$input = $request->all();

		

		$receiverDepositTransaction = $this->receiverDepositTransactionRepository->create($input);

		Flash::success('ReceiverDepositTransaction saved successfully.');

		return redirect(route('administration.receiverDepositTransactions.index'));
	}

	/**
	 * Display the specified ReceiverDepositTransaction.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$receiverDepositTransaction = ReceiverDepositTransaction::with(['paymentReceiver'])->where('id', $id)->first();

		if(empty($receiverDepositTransaction))
		{
			Flash::error('ReceiverDepositTransaction not found');

			return redirect(route('administration.receiverDepositTransactions.index'));
		}

		return view('receiverDepositTransactions.show')->with('receiverDepositTransaction', $receiverDepositTransaction);
	}

	/**
	 * Show the form for editing the specified ReceiverDepositTransaction.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		
		$paymentReceiver=PaymentReceiver::all();
		$paymentReceivers = [];
		foreach ($paymentReceiver as $key => $value) {
			$paymentReceivers[$value->id] = $value->id;
		}

		$receiverDepositTransaction = $this->receiverDepositTransactionRepository->find($id);

		if(empty($receiverDepositTransaction))
		{
			Flash::error('ReceiverDepositTransaction not found');

			return redirect(route('administration.receiverDepositTransactions.index'));
		}

		return view('receiverDepositTransactions.edit')->with(['paymentReceivers'=>$paymentReceivers, 'receiverDepositTransaction'=>$receiverDepositTransaction]);
	}

	/**
	 * Update the specified ReceiverDepositTransaction in storage.
	 *
	 * @param  int              $id
	 * @param UpdateReceiverDepositTransactionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateReceiverDepositTransactionRequest $request)
	{
		$receiverDepositTransaction = $this->receiverDepositTransactionRepository->find($id);

		if(empty($receiverDepositTransaction))
		{
			Flash::error('ReceiverDepositTransaction not found');

			return redirect(route('administration.receiverDepositTransactions.index'));
		}

		$input = $request->all();

		

		$this->receiverDepositTransactionRepository->updateRich($input, $id);

		Flash::success('ReceiverDepositTransaction updated successfully.');

		return redirect(route('administration.receiverDepositTransactions.index'));
	}

	/**
	 * Remove the specified ReceiverDepositTransaction from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$receiverDepositTransaction = $this->receiverDepositTransactionRepository->find($id);

		if(empty($receiverDepositTransaction))
		{
			Flash::error('ReceiverDepositTransaction not found');

			return redirect(route('administration.receiverDepositTransactions.index'));
		}

		

		$this->receiverDepositTransactionRepository->delete($id);

		Flash::success('ReceiverDepositTransaction deleted successfully.');

		return redirect(route('administration.receiverDepositTransactions.index'));
	}
}
