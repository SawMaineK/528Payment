<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\DepositTransactionRepository;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class DepositTransactionAPIController extends AppBaseController
{
	/** @var  DepositTransactionRepository */
	private $depositTransactionRepository;

	function __construct(DepositTransactionRepository $depositTransactionRepo)
	{
		$this->depositTransactionRepository = $depositTransactionRepo;
	}

	/**
	 * Display a listing of the DepositTransaction.
	 * GET|HEAD /depositTransactions
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$depositTransactions = DepositTransaction::with(['paymentUser'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($depositTransactions);
	}

	/**
	 * Show the form for creating a new DepositTransaction.
	 * GET|HEAD /depositTransactions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created DepositTransaction in storage.
	 * POST /depositTransactions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(DepositTransaction::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, DepositTransaction::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$depositTransactions = $this->depositTransactionRepository->create($input);

		return $this->sendResponse($depositTransactions->toArray(), "DepositTransaction saved successfully");
	}

	/**
	 * Display the specified DepositTransaction.
	 * GET|HEAD /depositTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$depositTransaction = $this->depositTransactionRepository->apiFindOrFail($id);

		return $this->sendResponse($depositTransaction->toArray(), "DepositTransaction retrieved successfully");
	}

	/**
	 * Show the form for editing the specified DepositTransaction.
	 * GET|HEAD /depositTransactions/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified DepositTransaction in storage.
	 * PUT/PATCH /depositTransactions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(DepositTransaction::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, DepositTransaction::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var DepositTransaction $depositTransaction */
		$depositTransaction = $this->depositTransactionRepository->apiFindOrFail($id);

		$result = $this->depositTransactionRepository->updateRich($input, $id);

		$depositTransaction = $depositTransaction->fresh();

		return $this->sendResponse($depositTransaction->toArray(), "DepositTransaction updated successfully");
	}

	/**
	 * Remove the specified DepositTransaction from storage.
	 * DELETE /depositTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->depositTransactionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "DepositTransaction deleted successfully");
	}
}
