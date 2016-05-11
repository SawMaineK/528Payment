<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PaymentMerchantRepository;
use App\Models\PaymentMerchant;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PaymentMerchantAPIController extends AppBaseController
{
	/** @var  PaymentMerchantRepository */
	private $paymentMerchantRepository;

	function __construct(PaymentMerchantRepository $paymentMerchantRepo)
	{
		$this->paymentMerchantRepository = $paymentMerchantRepo;
	}

	/**
	 * Display a listing of the PaymentMerchant.
	 * GET|HEAD /paymentMerchants
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$paymentMerchants = PaymentMerchant::with(['user', 'merchantType'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($paymentMerchants);
	}

	/**
	 * Show the form for creating a new PaymentMerchant.
	 * GET|HEAD /paymentMerchants/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created PaymentMerchant in storage.
	 * POST /paymentMerchants
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(PaymentMerchant::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, PaymentMerchant::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$paymentMerchants = $this->paymentMerchantRepository->create($input);

		return $this->sendResponse($paymentMerchants->toArray(), "PaymentMerchant saved successfully");
	}

	/**
	 * Display the specified PaymentMerchant.
	 * GET|HEAD /paymentMerchants/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$paymentMerchant = $this->paymentMerchantRepository->apiFindOrFail($id);

		return $this->sendResponse($paymentMerchant->toArray(), "PaymentMerchant retrieved successfully");
	}

	/**
	 * Show the form for editing the specified PaymentMerchant.
	 * GET|HEAD /paymentMerchants/{id}/edit
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
	 * Update the specified PaymentMerchant in storage.
	 * PUT/PATCH /paymentMerchants/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(PaymentMerchant::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, PaymentMerchant::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var PaymentMerchant $paymentMerchant */
		$paymentMerchant = $this->paymentMerchantRepository->apiFindOrFail($id);

		$result = $this->paymentMerchantRepository->updateRich($input, $id);

		$paymentMerchant = $paymentMerchant->fresh();

		return $this->sendResponse($paymentMerchant->toArray(), "PaymentMerchant updated successfully");
	}

	/**
	 * Remove the specified PaymentMerchant from storage.
	 * DELETE /paymentMerchants/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->paymentMerchantRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "PaymentMerchant deleted successfully");
	}
}
