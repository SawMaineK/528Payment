<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ReceivedTransactionRepository;
use App\Models\ReceivedTransaction;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ReceivedTransactionAPIController extends AppBaseController
{
	/** @var  ReceivedTransactionRepository */
	private $receivedTransactionRepository;

	function __construct(ReceivedTransactionRepository $receivedTransactionRepo)
	{
		$this->receivedTransactionRepository = $receivedTransactionRepo;
	}

	/**
	 * Display a listing of the ReceivedTransaction.
	 * GET|HEAD /receivedTransactions
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$receivedTransactions = ReceivedTransaction::with(['paymentUser', 'paymentReceiver'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($receivedTransactions);
	}

	/**
	 * Show the form for creating a new ReceivedTransaction.
	 * GET|HEAD /receivedTransactions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ReceivedTransaction in storage.
	 * POST /receivedTransactions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ReceivedTransaction::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, ReceivedTransaction::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$receivedTransactions = $this->receivedTransactionRepository->create($input);

		return $this->sendResponse($receivedTransactions->toArray(), "ReceivedTransaction saved successfully");
	}

	/**
	 * Display the specified ReceivedTransaction.
	 * GET|HEAD /receivedTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$receivedTransaction = $this->receivedTransactionRepository->apiFindOrFail($id);

		return $this->sendResponse($receivedTransaction->toArray(), "ReceivedTransaction retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ReceivedTransaction.
	 * GET|HEAD /receivedTransactions/{id}/edit
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
	 * Update the specified ReceivedTransaction in storage.
	 * PUT/PATCH /receivedTransactions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(ReceivedTransaction::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, ReceivedTransaction::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var ReceivedTransaction $receivedTransaction */
		$receivedTransaction = $this->receivedTransactionRepository->apiFindOrFail($id);

		$result = $this->receivedTransactionRepository->updateRich($input, $id);

		$receivedTransaction = $receivedTransaction->fresh();

		return $this->sendResponse($receivedTransaction->toArray(), "ReceivedTransaction updated successfully");
	}

	/**
	 * Remove the specified ReceivedTransaction from storage.
	 * DELETE /receivedTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->receivedTransactionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ReceivedTransaction deleted successfully");
	}
}
