<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMerchantTypeRequest;
use App\Http\Requests\UpdateMerchantTypeRequest;
use App\Libraries\Repositories\MerchantTypeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\MerchantType;

class MerchantTypeController extends AppBaseController
{

	/** @var  MerchantTypeRepository */
	private $merchantTypeRepository;

	function __construct(MerchantTypeRepository $merchantTypeRepo)
	{
		$this->merchantTypeRepository = $merchantTypeRepo;
	}

	/**
	 * Display a listing of the MerchantType.
	 *
	 * @return Response
	 */
	public function index()
	{
		$merchantTypes = $this->merchantTypeRepository->paginate(10);

		return view('merchantTypes.index')
			->with('merchantTypes', $merchantTypes);
	}

	/**
	 * Show the form for creating a new MerchantType.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('merchantTypes.create');
	}

	/**
	 * Store a newly created MerchantType in storage.
	 *
	 * @param CreateMerchantTypeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMerchantTypeRequest $request)
	{
		$input = $request->all();

		

		$merchantType = $this->merchantTypeRepository->create($input);

		Flash::success('MerchantType saved successfully.');

		return redirect(route('administration.merchantTypes.index'));
	}

	/**
	 * Display the specified MerchantType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$merchantType = $this->merchantTypeRepository->find($id);

		if(empty($merchantType))
		{
			Flash::error('MerchantType not found');

			return redirect(route('administration.merchantTypes.index'));
		}

		return view('merchantTypes.show')->with('merchantType', $merchantType);
	}

	/**
	 * Show the form for editing the specified MerchantType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$merchantType = $this->merchantTypeRepository->find($id);

		if(empty($merchantType))
		{
			Flash::error('MerchantType not found');

			return redirect(route('administration.merchantTypes.index'));
		}

		return view('merchantTypes.edit')->with('merchantType', $merchantType);
	}

	/**
	 * Update the specified MerchantType in storage.
	 *
	 * @param  int              $id
	 * @param UpdateMerchantTypeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateMerchantTypeRequest $request)
	{
		$merchantType = $this->merchantTypeRepository->find($id);

		if(empty($merchantType))
		{
			Flash::error('MerchantType not found');

			return redirect(route('administration.merchantTypes.index'));
		}

		$input = $request->all();

		
		
		$this->merchantTypeRepository->updateRich($input, $id);

		Flash::success('MerchantType updated successfully.');

		return redirect(route('administration.merchantTypes.index'));
	}

	/**
	 * Remove the specified MerchantType from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$merchantType = $this->merchantTypeRepository->find($id);

		if(empty($merchantType))
		{
			Flash::error('MerchantType not found');

			return redirect(route('administration.merchantTypes.index'));
		}

		

		$this->merchantTypeRepository->delete($id);

		Flash::success('MerchantType deleted successfully.');

		return redirect(route('administration.merchantTypes.index'));
	}
}
