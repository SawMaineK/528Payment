<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\StaffRepository;
use App\Models\Staff;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class StaffAPIController extends AppBaseController
{
	/** @var  StaffRepository */
	private $staffRepository;

	function __construct(StaffRepository $staffRepo)
	{
		$this->staffRepository = $staffRepo;
	}

	/**
	 * Display a listing of the Staff.
	 * GET|HEAD /staff
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$staff = Staff::with(['user'])->orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($staff);
	}

	/**
	 * Show the form for creating a new Staff.
	 * GET|HEAD /staff/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Staff in storage.
	 * POST /staff
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Staff::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, Staff::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$staff = $this->staffRepository->create($input);

		return $this->sendResponse($staff->toArray(), "Staff saved successfully");
	}

	/**
	 * Display the specified Staff.
	 * GET|HEAD /staff/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$staff = $this->staffRepository->apiFindOrFail($id);

		return $this->sendResponse($staff->toArray(), "Staff retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Staff.
	 * GET|HEAD /staff/{id}/edit
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
	 * Update the specified Staff in storage.
	 * PUT/PATCH /staff/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(Staff::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, Staff::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var Staff $staff */
		$staff = $this->staffRepository->apiFindOrFail($id);

		$result = $this->staffRepository->updateRich($input, $id);

		$staff = $staff->fresh();

		return $this->sendResponse($staff->toArray(), "Staff updated successfully");
	}

	/**
	 * Remove the specified Staff from storage.
	 * DELETE /staff/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->staffRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Staff deleted successfully");
	}
}
