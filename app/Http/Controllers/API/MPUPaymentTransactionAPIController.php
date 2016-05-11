<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\MPUPaymentTransactionRepository;
use App\Models\MPUPaymentTransaction;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class MPUPaymentTransactionAPIController extends AppBaseController
{
	/** @var  MPUPaymentTransactionRepository */
	private $mPUPaymentTransactionRepository;

	function __construct(MPUPaymentTransactionRepository $mPUPaymentTransactionRepo)
	{
		$this->mPUPaymentTransactionRepository = $mPUPaymentTransactionRepo;
	}

	/**
	 * Display a listing of the MPUPaymentTransaction.
	 * GET|HEAD /mPUPaymentTransactions
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$mPUPaymentTransactions = MPUPaymentTransaction::with(['paymentUser', 'paymentReceiver'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($mPUPaymentTransactions);
	}

	/**
	 * Show the form for creating a new MPUPaymentTransaction.
	 * GET|HEAD /mPUPaymentTransactions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created MPUPaymentTransaction in storage.
	 * POST /mPUPaymentTransactions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(MPUPaymentTransaction::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, MPUPaymentTransaction::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$mPUPaymentTransactions = $this->mPUPaymentTransactionRepository->create($input);

		return $this->sendResponse($mPUPaymentTransactions->toArray(), "MPUPaymentTransaction saved successfully");
	}

	/**
	 * Display the specified MPUPaymentTransaction.
	 * GET|HEAD /mPUPaymentTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mPUPaymentTransaction = $this->mPUPaymentTransactionRepository->apiFindOrFail($id);

		return $this->sendResponse($mPUPaymentTransaction->toArray(), "MPUPaymentTransaction retrieved successfully");
	}

	/**
	 * Show the form for editing the specified MPUPaymentTransaction.
	 * GET|HEAD /mPUPaymentTransactions/{id}/edit
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
	 * Update the specified MPUPaymentTransaction in storage.
	 * PUT/PATCH /mPUPaymentTransactions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(MPUPaymentTransaction::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, MPUPaymentTransaction::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var MPUPaymentTransaction $mPUPaymentTransaction */
		$mPUPaymentTransaction = $this->mPUPaymentTransactionRepository->apiFindOrFail($id);

		$result = $this->mPUPaymentTransactionRepository->updateRich($input, $id);

		$mPUPaymentTransaction = $mPUPaymentTransaction->fresh();

		return $this->sendResponse($mPUPaymentTransaction->toArray(), "MPUPaymentTransaction updated successfully");
	}

	/**
	 * Remove the specified MPUPaymentTransaction from storage.
	 * DELETE /mPUPaymentTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->mPUPaymentTransactionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "MPUPaymentTransaction deleted successfully");
	}
}
