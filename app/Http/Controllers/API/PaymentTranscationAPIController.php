<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PaymentTranscationRepository;
use App\Models\PaymentTranscation;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PaymentTranscationAPIController extends AppBaseController
{
	/** @var  PaymentTranscationRepository */
	private $paymentTranscationRepository;

	function __construct(PaymentTranscationRepository $paymentTranscationRepo)
	{
		$this->paymentTranscationRepository = $paymentTranscationRepo;
	}

	/**
	 * Display a listing of the PaymentTranscation.
	 * GET|HEAD /paymentTranscations
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$paymentTranscations = PaymentTranscation::with(['paymentUser', 'paymentMerchant'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($paymentTranscations);
	}

	/**
	 * Show the form for creating a new PaymentTranscation.
	 * GET|HEAD /paymentTranscations/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created PaymentTranscation in storage.
	 * POST /paymentTranscations
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(PaymentTranscation::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, PaymentTranscation::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$paymentTranscations = $this->paymentTranscationRepository->create($input);

		return $this->sendResponse($paymentTranscations->toArray(), "PaymentTranscation saved successfully");
	}

	/**
	 * Display the specified PaymentTranscation.
	 * GET|HEAD /paymentTranscations/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$paymentTranscation = $this->paymentTranscationRepository->apiFindOrFail($id);

		return $this->sendResponse($paymentTranscation->toArray(), "PaymentTranscation retrieved successfully");
	}

	/**
	 * Show the form for editing the specified PaymentTranscation.
	 * GET|HEAD /paymentTranscations/{id}/edit
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
	 * Update the specified PaymentTranscation in storage.
	 * PUT/PATCH /paymentTranscations/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(PaymentTranscation::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, PaymentTranscation::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var PaymentTranscation $paymentTranscation */
		$paymentTranscation = $this->paymentTranscationRepository->apiFindOrFail($id);

		$result = $this->paymentTranscationRepository->updateRich($input, $id);

		$paymentTranscation = $paymentTranscation->fresh();

		return $this->sendResponse($paymentTranscation->toArray(), "PaymentTranscation updated successfully");
	}

	/**
	 * Remove the specified PaymentTranscation from storage.
	 * DELETE /paymentTranscations/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->paymentTranscationRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "PaymentTranscation deleted successfully");
	}
}
