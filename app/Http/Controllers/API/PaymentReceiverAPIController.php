<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PaymentReceiverRepository;
use App\Models\PaymentReceiver;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PaymentReceiverAPIController extends AppBaseController
{
	/** @var  PaymentReceiverRepository */
	private $paymentReceiverRepository;

	function __construct(PaymentReceiverRepository $paymentReceiverRepo)
	{
		$this->paymentReceiverRepository = $paymentReceiverRepo;
	}

	/**
	 * Display a listing of the PaymentReceiver.
	 * GET|HEAD /paymentReceivers
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$paymentReceivers = PaymentReceiver::with(['user'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($paymentReceivers);
	}

	/**
	 * Show the form for creating a new PaymentReceiver.
	 * GET|HEAD /paymentReceivers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created PaymentReceiver in storage.
	 * POST /paymentReceivers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(PaymentReceiver::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, PaymentReceiver::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$paymentReceivers = $this->paymentReceiverRepository->create($input);

		return $this->sendResponse($paymentReceivers->toArray(), "PaymentReceiver saved successfully");
	}

	/**
	 * Display the specified PaymentReceiver.
	 * GET|HEAD /paymentReceivers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$paymentReceiver = $this->paymentReceiverRepository->apiFindOrFail($id);

		return $this->sendResponse($paymentReceiver->toArray(), "PaymentReceiver retrieved successfully");
	}

	/**
	 * Show the form for editing the specified PaymentReceiver.
	 * GET|HEAD /paymentReceivers/{id}/edit
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
	 * Update the specified PaymentReceiver in storage.
	 * PUT/PATCH /paymentReceivers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(PaymentReceiver::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, PaymentReceiver::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var PaymentReceiver $paymentReceiver */
		$paymentReceiver = $this->paymentReceiverRepository->apiFindOrFail($id);

		$result = $this->paymentReceiverRepository->updateRich($input, $id);

		$paymentReceiver = $paymentReceiver->fresh();

		return $this->sendResponse($paymentReceiver->toArray(), "PaymentReceiver updated successfully");
	}

	/**
	 * Remove the specified PaymentReceiver from storage.
	 * DELETE /paymentReceivers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->paymentReceiverRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "PaymentReceiver deleted successfully");
	}
}
