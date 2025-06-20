<?php

namespace App\Repositories;

use Exception;
use App\Models\Company;
use App\Repositories\interfaces\CompanyInterface;

class CompanyRepository implements CompanyInterface
{

    public function companyStore($request)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'website' => $request->website
            ];

            $result = Company::create($data);
            if ($result) {
                return redirect()->route('companyIndex');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function companyRead($request)
    {
        try {
            $readData = Company::all();
            if (!$readData) {
                throw new Exception('No Data Found');
            }
            return  $readData;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function companyEdit($request)
    {
        try {
            $edit = Company::where('id', $request->id)->first();
            return view('company.edit', compact('edit'));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function companyUpdate($request)
    {
        try {
            $update = Company::where('id', $request->id)->first();
            $data = [
                'name' => $request->editName,
                'email' => $request->editEmail,
                'password' => $request->editPassword,
                'website' => $request->editWebsite
            ];
            $result = $update->update($data);
            if ($result) {
                return redirect()->route('companyIndex');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function companyDelete($id)
    {
        try {
            $datadelete = Company::where('id', $id)->first();
            $check = $datadelete->delete();
            if ($check) {
                return response()->json([
                    'status' => true,
                    'massage' => "Id delete successfuly"
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => "record not delete"
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function companyView($request)
    {
        try {
            $companyData = Company::where('id', $request->id)->first();
            return view('company.view', compact('companyData'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }
}
