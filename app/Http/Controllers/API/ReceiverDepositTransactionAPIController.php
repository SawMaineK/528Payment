<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ReceiverDepositTransactionRepository;
use App\Models\ReceiverDepositTransaction;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ReceiverDepositTransactionAPIController extends AppBaseController
{
	/** @var  ReceiverDepositTransactionRepository */
	private $receiverDepositTransactionRepository;

	function __construct(ReceiverDepositTransactionRepository $receiverDepositTransactionRepo)
	{
		$this->receiverDepositTransactionRepository = $receiverDepositTransactionRepo;
	}

	/**
	 * Display a listing of the ReceiverDepositTransaction.
	 * GET|HEAD /receiverDepositTransactions
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$receiverDepositTransactions = ReceiverDepositTransaction::with(['paymentReceiver'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($receiverDepositTransactions);
	}

	/**
	 * Show the form for creating a new ReceiverDepositTransaction.
	 * GET|HEAD /receiverDepositTransactions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ReceiverDepositTransaction in storage.
	 * POST /receiverDepositTransactions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ReceiverDepositTransaction::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, ReceiverDepositTransaction::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$receiverDepositTransactions = $this->receiverDepositTransactionRepository->create($input);

		return $this->sendResponse($receiverDepositTransactions->toArray(), "ReceiverDepositTransaction saved successfully");
	}

	/**
	 * Display the specified ReceiverDepositTransaction.
	 * GET|HEAD /receiverDepositTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$receiverDepositTransaction = $this->receiverDepositTransactionRepository->apiFindOrFail($id);

		return $this->sendResponse($receiverDepositTransaction->toArray(), "ReceiverDepositTransaction retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ReceiverDepositTransaction.
	 * GET|HEAD /receiverDepositTransactions/{id}/edit
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
	 * Update the specified ReceiverDepositTransaction in storage.
	 * PUT/PATCH /receiverDepositTransactions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(ReceiverDepositTransaction::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, ReceiverDepositTransaction::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var ReceiverDepositTransaction $receiverDepositTransaction */
		$receiverDepositTransaction = $this->receiverDepositTransactionRepository->apiFindOrFail($id);

		$result = $this->receiverDepositTransactionRepository->updateRich($input, $id);

		$receiverDepositTransaction = $receiverDepositTransaction->fresh();

		return $this->sendResponse($receiverDepositTransaction->toArray(), "ReceiverDepositTransaction updated successfully");
	}

	/**
	 * Remove the specified ReceiverDepositTransaction from storage.
	 * DELETE /receiverDepositTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->receiverDepositTransactionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ReceiverDepositTransaction deleted successfully");
	}
}
