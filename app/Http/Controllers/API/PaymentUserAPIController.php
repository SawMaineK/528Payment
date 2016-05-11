<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PaymentUserRepository;
use App\Models\PaymentUser;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PaymentUserAPIController extends AppBaseController
{
	/** @var  PaymentUserRepository */
	private $paymentUserRepository;

	function __construct(PaymentUserRepository $paymentUserRepo)
	{
		$this->paymentUserRepository = $paymentUserRepo;
	}

	/**
	 * Display a listing of the PaymentUser.
	 * GET|HEAD /paymentUsers
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$paymentUsers = PaymentUser::with(['user'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($paymentUsers);
	}

	/**
	 * Show the form for creating a new PaymentUser.
	 * GET|HEAD /paymentUsers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created PaymentUser in storage.
	 * POST /paymentUsers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(PaymentUser::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, PaymentUser::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$paymentUsers = $this->paymentUserRepository->create($input);

		return $this->sendResponse($paymentUsers->toArray(), "PaymentUser saved successfully");
	}

	/**
	 * Display the specified PaymentUser.
	 * GET|HEAD /paymentUsers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$paymentUser = $this->paymentUserRepository->apiFindOrFail($id);

		return $this->sendResponse($paymentUser->toArray(), "PaymentUser retrieved successfully");
	}

	/**
	 * Show the form for editing the specified PaymentUser.
	 * GET|HEAD /paymentUsers/{id}/edit
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
	 * Update the specified PaymentUser in storage.
	 * PUT/PATCH /paymentUsers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(PaymentUser::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, PaymentUser::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var PaymentUser $paymentUser */
		$paymentUser = $this->paymentUserRepository->apiFindOrFail($id);

		$result = $this->paymentUserRepository->updateRich($input, $id);

		$paymentUser = $paymentUser->fresh();

		return $this->sendResponse($paymentUser->toArray(), "PaymentUser updated successfully");
	}

	/**
	 * Remove the specified PaymentUser from storage.
	 * DELETE /paymentUsers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->paymentUserRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "PaymentUser deleted successfully");
	}
}
