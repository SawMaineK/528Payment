<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\StaffReceiveTranscationRepository;
use App\Models\StaffReceiveTranscation;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class StaffReceiveTranscationAPIController extends AppBaseController
{
	/** @var  StaffReceiveTranscationRepository */
	private $staffReceiveTranscationRepository;

	function __construct(StaffReceiveTranscationRepository $staffReceiveTranscationRepo)
	{
		$this->staffReceiveTranscationRepository = $staffReceiveTranscationRepo;
	}

	/**
	 * Display a listing of the StaffReceiveTranscation.
	 * GET|HEAD /staffReceiveTranscations
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$staffReceiveTranscations = StaffReceiveTranscation::with(['staff', 'receiverDepositTransaction'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($staffReceiveTranscations);
	}

	/**
	 * Show the form for creating a new StaffReceiveTranscation.
	 * GET|HEAD /staffReceiveTranscations/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created StaffReceiveTranscation in storage.
	 * POST /staffReceiveTranscations
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(StaffReceiveTranscation::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, StaffReceiveTranscation::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$staffReceiveTranscations = $this->staffReceiveTranscationRepository->create($input);

		return $this->sendResponse($staffReceiveTranscations->toArray(), "StaffReceiveTranscation saved successfully");
	}

	/**
	 * Display the specified StaffReceiveTranscation.
	 * GET|HEAD /staffReceiveTranscations/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$staffReceiveTranscation = $this->staffReceiveTranscationRepository->apiFindOrFail($id);

		return $this->sendResponse($staffReceiveTranscation->toArray(), "StaffReceiveTranscation retrieved successfully");
	}

	/**
	 * Show the form for editing the specified StaffReceiveTranscation.
	 * GET|HEAD /staffReceiveTranscations/{id}/edit
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
	 * Update the specified StaffReceiveTranscation in storage.
	 * PUT/PATCH /staffReceiveTranscations/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(StaffReceiveTranscation::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, StaffReceiveTranscation::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var StaffReceiveTranscation $staffReceiveTranscation */
		$staffReceiveTranscation = $this->staffReceiveTranscationRepository->apiFindOrFail($id);

		$result = $this->staffReceiveTranscationRepository->updateRich($input, $id);

		$staffReceiveTranscation = $staffReceiveTranscation->fresh();

		return $this->sendResponse($staffReceiveTranscation->toArray(), "StaffReceiveTranscation updated successfully");
	}

	/**
	 * Remove the specified StaffReceiveTranscation from storage.
	 * DELETE /staffReceiveTranscations/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->staffReceiveTranscationRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "StaffReceiveTranscation deleted successfully");
	}
}
