<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Repositories\interfaces\CompanyInterface;

class CompanyController extends Controller
{
    public function __construct(protected CompanyInterface $CompanyRepository) {}

    public function companyIndex()
    {
        return view('company.index');
    }

    public function companyCreate()
    {
        return view('company.create');
    }

    public function companyStore(CompanyStoreRequest $request)
    {
        $finialResult = $this->CompanyRepository->companyStore($request);
        return $finialResult;
    }

    public function companyRead(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = $this->CompanyRepository->companyRead($request);
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $companyEditRoute = route('companyEdit', $row->id);
                        $companyDeleteRoute = route('companyDelete', $row->id);
                        $companyViewRoute = route('companyView', $row->id);
                        $actionBtn = '<a href="' . $companyEditRoute . '" class="edit btn btn-success btn-sm">Edit</a>
                        <a href="' . $companyDeleteRoute . '" class="delete btn btn-danger btn-sm" id="deleteButton" data-id="' . $row->id . '">Delete</a>
                        <a href="' . $companyViewRoute . '" class="view btn btn-info btn-sm">View</a>';

                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('company.index');
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


    public function companyEdit(Request $request)
    {
       $editData = $this->CompanyRepository->companyEdit($request);
       return $editData;
    }

    public function companyUpdate(CompanyUpdateRequest $request)
    {
       $updateData = $this->CompanyRepository->companyUpdate($request);
       return $updateData;
    }

    public function companyDelete($id)
    {
        $result = $this->CompanyRepository->companyDelete($id);
        return response()->json([
            'status' => true,
            'data' => $result
        ]);
    }

    public function companyView(Request $request)
    {
        $viewData = $this->CompanyRepository->companyView($request);
        return $viewData;
    }
}
