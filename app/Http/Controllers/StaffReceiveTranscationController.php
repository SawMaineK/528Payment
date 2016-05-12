<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStaffReceiveTranscationRequest;
use App\Http\Requests\UpdateStaffReceiveTranscationRequest;
use App\Libraries\Repositories\StaffReceiveTranscationRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\StaffReceiveTranscation;
use App\Models\Staff;
use App\Models\ReceiverDepositTransaction;

class StaffReceiveTranscationController extends AppBaseController
{

	/** @var  StaffReceiveTranscationRepository */
	private $staffReceiveTranscationRepository;

	function __construct(StaffReceiveTranscationRepository $staffReceiveTranscationRepo)
	{
		$this->staffReceiveTranscationRepository = $staffReceiveTranscationRepo;
	}

	/**
	 * Display a listing of the StaffReceiveTranscation.
	 *
	 * @return Response
	 */
	public function index()
	{
		$staffReceiveTranscations = StaffReceiveTranscation::with(['staff', 'receiverDepositTransaction'])->paginate(10);

		return view('staffReceiveTranscations.index')
			->with('staffReceiveTranscations', $staffReceiveTranscations);
	}

	/**
	 * Show the form for creating a new StaffReceiveTranscation.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$staff=Staff::all();
		$staffs = [];
		foreach ($staff as $key => $value) {
			$staffs[$value->id] = $value->id;
		}

		$receiverDepositTransaction=ReceiverDepositTransaction::all();
		$receiverDepositTransactions = [];
		foreach ($receiverDepositTransaction as $key => $value) {
			$receiverDepositTransactions[$value->id] = $value->id;
		}
		return view('staffReceiveTranscations.create')->with(['staff'=>$staffs, 'receiverDepositTransactions'=>$receiverDepositTransactions]);
	}

	/**
	 * Store a newly created StaffReceiveTranscation in storage.
	 *
	 * @param CreateStaffReceiveTranscationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateStaffReceiveTranscationRequest $request)
	{
		$input = $request->all();

		

		$staffReceiveTranscation = $this->staffReceiveTranscationRepository->create($input);

		Flash::success('StaffReceiveTranscation saved successfully.');

		return redirect(route('administration.staffReceiveTranscations.index'));
	}

	/**
	 * Display the specified StaffReceiveTranscation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$staffReceiveTranscation = StaffReceiveTranscation::with(['staff', 'receiverDepositTransaction'])->where('id', $id)->first();

		if(empty($staffReceiveTranscation))
		{
			Flash::error('StaffReceiveTranscation not found');

			return redirect(route('administration.staffReceiveTranscations.index'));
		}

		return view('staffReceiveTranscations.show')->with('staffReceiveTranscation', $staffReceiveTranscation);
	}

	/**
	 * Show the form for editing the specified StaffReceiveTranscation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		
		$staff=Staff::all();
		$staff = [];
		foreach ($staff as $key => $value) {
			$staff[$value->id] = $value->id;
		}

		$receiverDepositTransaction=ReceiverDepositTransaction::all();
		$receiverDepositTransactions = [];
		foreach ($receiverDepositTransaction as $key => $value) {
			$receiverDepositTransactions[$value->id] = $value->id;
		}

		$staffReceiveTranscation = $this->staffReceiveTranscationRepository->find($id);

		if(empty($staffReceiveTranscation))
		{
			Flash::error('StaffReceiveTranscation not found');

			return redirect(route('administration.staffReceiveTranscations.index'));
		}

		return view('staffReceiveTranscations.edit')->with(['staff'=>$staff, 'receiverDepositTransactions'=>$receiverDepositTransactions, 'staffReceiveTranscation'=>$staffReceiveTranscation]);
	}

	/**
	 * Update the specified StaffReceiveTranscation in storage.
	 *
	 * @param  int              $id
	 * @param UpdateStaffReceiveTranscationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateStaffReceiveTranscationRequest $request)
	{
		$staffReceiveTranscation = $this->staffReceiveTranscationRepository->find($id);

		if(empty($staffReceiveTranscation))
		{
			Flash::error('StaffReceiveTranscation not found');

			return redirect(route('administration.staffReceiveTranscations.index'));
		}

		$input = $request->all();

		

		$this->staffReceiveTranscationRepository->updateRich($input, $id);

		Flash::success('StaffReceiveTranscation updated successfully.');

		return redirect(route('administration.staffReceiveTranscations.index'));
	}

	/**
	 * Remove the specified StaffReceiveTranscation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$staffReceiveTranscation = $this->staffReceiveTranscationRepository->find($id);

		if(empty($staffReceiveTranscation))
		{
			Flash::error('StaffReceiveTranscation not found');

			return redirect(route('administration.staffReceiveTranscations.index'));
		}

		

		$this->staffReceiveTranscationRepository->delete($id);

		Flash::success('StaffReceiveTranscation deleted successfully.');

		return redirect(route('administration.staffReceiveTranscations.index'));
	}
}
