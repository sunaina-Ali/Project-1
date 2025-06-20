<?php
namespace App\Repositories\interfaces;

Interface EmployeeInterface{
    public function employeeStore($request);
    public function employeeRead($request);
    public function employeeEdit($request);
    public function employeeUpdate($request);
    public function employeeDelete($id);
    public function employeeView($request);
}
