<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\MerchantTypeRepository;
use App\Models\MerchantType;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class MerchantTypeAPIController extends AppBaseController
{
	/** @var  MerchantTypeRepository */
	private $merchantTypeRepository;

	function __construct(MerchantTypeRepository $merchantTypeRepo)
	{
		$this->merchantTypeRepository = $merchantTypeRepo;
	}

	/**
	 * Display a listing of the MerchantType.
	 * GET|HEAD /merchantTypes
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$merchantTypes = MerchantType::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($merchantTypes);
	}

	/**
	 * Show the form for creating a new MerchantType.
	 * GET|HEAD /merchantTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created MerchantType in storage.
	 * POST /merchantTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(MerchantType::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, MerchantType::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$merchantTypes = $this->merchantTypeRepository->create($input);

		return $this->sendResponse($merchantTypes->toArray(), "MerchantType saved successfully");
	}

	/**
	 * Display the specified MerchantType.
	 * GET|HEAD /merchantTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$merchantType = $this->merchantTypeRepository->apiFindOrFail($id);

		return $this->sendResponse($merchantType->toArray(), "MerchantType retrieved successfully");
	}

	/**
	 * Show the form for editing the specified MerchantType.
	 * GET|HEAD /merchantTypes/{id}/edit
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
	 * Update the specified MerchantType in storage.
	 * PUT/PATCH /merchantTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(MerchantType::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, MerchantType::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var MerchantType $merchantType */
		$merchantType = $this->merchantTypeRepository->apiFindOrFail($id);

		$result = $this->merchantTypeRepository->updateRich($input, $id);

		$merchantType = $merchantType->fresh();

		return $this->sendResponse($merchantType->toArray(), "MerchantType updated successfully");
	}

	/**
	 * Remove the specified MerchantType from storage.
	 * DELETE /merchantTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->merchantTypeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "MerchantType deleted successfully");
	}
}
