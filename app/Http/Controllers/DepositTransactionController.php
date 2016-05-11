<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDepositTransactionRequest;
use App\Http\Requests\UpdateDepositTransactionRequest;
use App\Libraries\Repositories\DepositTransactionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\DepositTransaction;
use App\Models\PaymentUser;

class DepositTransactionController extends AppBaseController
{

	/** @var  DepositTransactionRepository */
	private $depositTransactionRepository;

	function __construct(DepositTransactionRepository $depositTransactionRepo)
	{
		$this->depositTransactionRepository = $depositTransactionRepo;
	}

	/**
	 * Display a listing of the DepositTransaction.
	 *
	 * @return Response
	 */
	public function index()
	{
		$depositTransactions = DepositTransaction::with(['paymentUser'])->paginate(10);

		return view('depositTransactions.index')
			->with('depositTransactions', $depositTransactions);
	}

	/**
	 * Show the form for creating a new DepositTransaction.
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
		return view('depositTransactions.create')->with(['paymentUsers'=>$paymentUsers]);
	}

	/**
	 * Store a newly created DepositTransaction in storage.
	 *
	 * @param CreateDepositTransactionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDepositTransactionRequest $request)
	{
		$input = $request->all();

		

		$depositTransaction = $this->depositTransactionRepository->create($input);

		Flash::success('DepositTransaction saved successfully.');

		return redirect(route('administration.depositTransactions.index'));
	}

	/**
	 * Display the specified DepositTransaction.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$depositTransaction = DepositTransaction::with(['paymentUser'])->where('id', $id)->first();

		if(empty($depositTransaction))
		{
			Flash::error('DepositTransaction not found');

			return redirect(route('administration.depositTransactions.index'));
		}

		return view('depositTransactions.show')->with('depositTransaction', $depositTransaction);
	}

	/**
	 * Show the form for editing the specified DepositTransaction.
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

		$depositTransaction = $this->depositTransactionRepository->find($id);

		if(empty($depositTransaction))
		{
			Flash::error('DepositTransaction not found');

			return redirect(route('administration.depositTransactions.index'));
		}

		return view('depositTransactions.edit')->with(['paymentUsers'=>$paymentUsers, 'depositTransaction'=>$depositTransaction]);
	}

	/**
	 * Update the specified DepositTransaction in storage.
	 *
	 * @param  int              $id
	 * @param UpdateDepositTransactionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateDepositTransactionRequest $request)
	{
		$depositTransaction = $this->depositTransactionRepository->find($id);

		if(empty($depositTransaction))
		{
			Flash::error('DepositTransaction not found');

			return redirect(route('administration.depositTransactions.index'));
		}

		$input = $request->all();

		

		$this->depositTransactionRepository->updateRich($input, $id);

		Flash::success('DepositTransaction updated successfully.');

		return redirect(route('administration.depositTransactions.index'));
	}

	/**
	 * Remove the specified DepositTransaction from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$depositTransaction = $this->depositTransactionRepository->find($id);

		if(empty($depositTransaction))
		{
			Flash::error('DepositTransaction not found');

			return redirect(route('administration.depositTransactions.index'));
		}

		

		$this->depositTransactionRepository->delete($id);

		Flash::success('DepositTransaction deleted successfully.');

		return redirect(route('administration.depositTransactions.index'));
	}
}
