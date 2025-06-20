<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Repositories\interfaces\EmployeeInterface;

class EmployeeController extends Controller
{
    public function __construct(protected EmployeeInterface $EmployeeRepository) {}

    public function employeeIndex(){
        return view('employee.index');
    }

    public function employeeCreate(){
        try {
            $company = Company::all();
            if (!$company) {
                throw new \Exception("company not found");
            }
            return view('employee.create', compact('company'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function employeeStore(EmployeeStoreRequest $request){
        $result = $this->EmployeeRepository->employeeStore($request);
        return $result;
    }

    public function employeeRead(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = $this->EmployeeRepository->employeeRead($request);
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $employeeEditRoute = route('employeeEdit', $row->id);
                        $employeeDeleteRoute = route('employeeDelete', $row->id);
                        $employeeViewRoute = route('employeeView', $row->id);
                        $actionBtn = '<a href="' . $employeeEditRoute . '" class="edit btn btn-success btn-sm">Edit</a>
                        <a href="'.$employeeDeleteRoute.'" class="delete btn btn-danger btn-sm" id="deleteButton" data-id="'.$row->id.'">Delete</a>
                        <a href="'.$employeeViewRoute .'" class="view btn btn-info btn-sm">View</a>';

                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('employee.index');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong while fetching data.',
                    'error' => $e->getMessage()
                ], 500);
            }
            return redirect()->back()->with('error', 'Something went wrong while loading the page.');
        }
    }

    public function employeeEdit(Request $request){
        $editData = $this->EmployeeRepository->employeeEdit($request);
        return $editData;
    }

    public function employeeUpdate(EmployeeUpdateRequest $request){
        $updateData = $this->EmployeeRepository->employeeUpdate($request);
        return $updateData;
    }

    public function employeeDelete($id){
        $result = $this->EmployeeRepository->employeeDelete($id);
        return response()->json([
            'status' => true,
            'data' => $result
        ]);
    }

    public function employeeView(Request $request){
        $viewData = $this->EmployeeRepository->employeeView($request);
        return $viewData;
    }
}
