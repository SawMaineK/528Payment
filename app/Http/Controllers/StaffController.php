<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Libraries\Repositories\StaffRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Staff;
use App\Models\User;

class StaffController extends AppBaseController
{

	/** @var  StaffRepository */
	private $staffRepository;

	function __construct(StaffRepository $staffRepo)
	{
		$this->staffRepository = $staffRepo;
	}

	/**
	 * Display a listing of the Staff.
	 *
	 * @return Response
	 */
	public function index()
	{
		$staff = Staff::with(['user'])->paginate(10);

		return view('staff.index')
			->with('staff', $staff);
	}

	/**
	 * Show the form for creating a new Staff.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$user=User::all();
		$users = [];
		foreach ($user as $key => $value) {
			$users[$value->id] = $value->name;
		}
		return view('staff.create')->with(['users'=>$users]);
	}

	/**
	 * Store a newly created Staff in storage.
	 *
	 * @param CreateStaffRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateStaffRequest $request)
	{
		$input = $request->all();

		

		$staff = $this->staffRepository->create($input);

		Flash::success('Staff saved successfully.');

		return redirect(route('administration.staff.index'));
	}

	/**
	 * Display the specified Staff.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$staff = Staff::with(['user'])->where('id', $id)->first();

		if(empty($staff))
		{
			Flash::error('Staff not found');

			return redirect(route('administration.staff.index'));
		}

		return view('staff.show')->with('staff', $staff);
	}

	/**
	 * Show the form for editing the specified Staff.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		
		$user=User::all();
		$users = [];
		foreach ($user as $key => $value) {
			$users[$value->id] = $value->name;
		}

		$staff = $this->staffRepository->find($id);

		if(empty($staff))
		{
			Flash::error('Staff not found');

			return redirect(route('administration.staff.index'));
		}

		return view('staff.edit')->with(['users'=>$users, 'staff'=>$staff]);
	}

	/**
	 * Update the specified Staff in storage.
	 *
	 * @param  int              $id
	 * @param UpdateStaffRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateStaffRequest $request)
	{
		$staff = $this->staffRepository->find($id);

		if(empty($staff))
		{
			Flash::error('Staff not found');

			return redirect(route('administration.staff.index'));
		}

		$input = $request->all();

		

		$this->staffRepository->updateRich($input, $id);

		Flash::success('Staff updated successfully.');

		return redirect(route('administration.staff.index'));
	}

	/**
	 * Remove the specified Staff from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$staff = $this->staffRepository->find($id);

		if(empty($staff))
		{
			Flash::error('Staff not found');

			return redirect(route('administration.staff.index'));
		}

		

		$this->staffRepository->delete($id);

		Flash::success('Staff deleted successfully.');

		return redirect(route('administration.staff.index'));
	}
}
