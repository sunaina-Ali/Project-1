<?php

namespace App\Repositories;

use Exception;
use App\Models\Company;
use App\Models\Employee;
use App\Repositories\interfaces\EmployeeInterface;

class EmployeeRepository implements EmployeeInterface
{
    public function employeeStore($request)
    {
        try {
            $data = [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'companyName' => $request->companyName,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone
            ];

            $result = Employee::create($data);
            if ($result) {
                return redirect()->route('employeeIndex');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function employeeRead($request)
    {
        try {
            $data = Employee::with('company')->get();
            $finialData = $data->map(function ($item) {
                $item->companyName = $item->company?->name ?? null;
                return $item;
            });

            if (!$finialData) {
                throw new Exception('No Data Found');
            }
            return  $finialData;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function employeeEdit($request)
    {
        try {
            $employeeData = Employee::where('id', $request->id)->first();
            $allCompany = Company::all();
            return view('employee.edit', compact('employeeData', 'allCompany'));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function employeeUpdate($request)
    {
        try {
            $update = Employee::where('id', $request->id)->first();
            $data = [
                'firstName' => $request->editFirstName,
                'lastName' => $request->editLastName,
                'companyName' => $request->editCompanyName,
                'email' => $request->editEmail,
                'password' => $request->editPassword,
                'phone' => $request->editPhone
            ];
            $result = $update->update($data);
            if ($result) {
                return redirect()->route('employeeIndex');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function employeeDelete($id)
    {
        try {
            $datadelete = Employee::where('id', $id)->first();
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

    public function employeeView($request)
    {
        try {
            $employee = Employee::where('id', $request->id)->first();
            return view('employee.view', compact('employee'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }
    }
}
