<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateReceivedTransactionRequest;
use App\Http\Requests\UpdateReceivedTransactionRequest;
use App\Libraries\Repositories\ReceivedTransactionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\ReceivedTransaction;
use App\Models\PaymentUser;
use App\Models\PaymentReceiver;

class ReceivedTransactionController extends AppBaseController
{

	/** @var  ReceivedTransactionRepository */
	private $receivedTransactionRepository;

	function __construct(ReceivedTransactionRepository $receivedTransactionRepo)
	{
		$this->receivedTransactionRepository = $receivedTransactionRepo;
	}

	/**
	 * Display a listing of the ReceivedTransaction.
	 *
	 * @return Response
	 */
	public function index()
	{
		$receivedTransactions = ReceivedTransaction::with(['paymentUser', 'paymentReceiver'])->paginate(10);

		return view('receivedTransactions.index')
			->with('receivedTransactions', $receivedTransactions);
	}

	/**
	 * Show the form for creating a new ReceivedTransaction.
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
		return view('receivedTransactions.create')->with(['paymentUsers'=>$paymentUsers, 'paymentReceivers'=>$paymentReceivers]);
	}

	/**
	 * Store a newly created ReceivedTransaction in storage.
	 *
	 * @param CreateReceivedTransactionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateReceivedTransactionRequest $request)
	{
		$input = $request->all();

		

		$receivedTransaction = $this->receivedTransactionRepository->create($input);

		Flash::success('ReceivedTransaction saved successfully.');

		return redirect(route('administration.receivedTransactions.index'));
	}

	/**
	 * Display the specified ReceivedTransaction.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$receivedTransaction = ReceivedTransaction::with(['paymentUser', 'paymentReceiver'])->where('id', $id)->first();

		if(empty($receivedTransaction))
		{
			Flash::error('ReceivedTransaction not found');

			return redirect(route('administration.receivedTransactions.index'));
		}

		return view('receivedTransactions.show')->with('receivedTransaction', $receivedTransaction);
	}

	/**
	 * Show the form for editing the specified ReceivedTransaction.
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

		$receivedTransaction = $this->receivedTransactionRepository->find($id);

		if(empty($receivedTransaction))
		{
			Flash::error('ReceivedTransaction not found');

			return redirect(route('administration.receivedTransactions.index'));
		}

		return view('receivedTransactions.edit')->with(['paymentUsers'=>$paymentUsers, 'paymentReceivers'=>$paymentReceivers, 'receivedTransaction'=>$receivedTransaction]);
	}

	/**
	 * Update the specified ReceivedTransaction in storage.
	 *
	 * @param  int              $id
	 * @param UpdateReceivedTransactionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateReceivedTransactionRequest $request)
	{
		$receivedTransaction = $this->receivedTransactionRepository->find($id);

		if(empty($receivedTransaction))
		{
			Flash::error('ReceivedTransaction not found');

			return redirect(route('administration.receivedTransactions.index'));
		}

		$input = $request->all();

		

		$this->receivedTransactionRepository->updateRich($input, $id);

		Flash::success('ReceivedTransaction updated successfully.');

		return redirect(route('administration.receivedTransactions.index'));
	}

	/**
	 * Remove the specified ReceivedTransaction from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$receivedTransaction = $this->receivedTransactionRepository->find($id);

		if(empty($receivedTransaction))
		{
			Flash::error('ReceivedTransaction not found');

			return redirect(route('administration.receivedTransactions.index'));
		}

		

		$this->receivedTransactionRepository->delete($id);

		Flash::success('ReceivedTransaction deleted successfully.');

		return redirect(route('administration.receivedTransactions.index'));
	}
}
