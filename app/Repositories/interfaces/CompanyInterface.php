<?php
namespace App\Repositories\interfaces;

Interface CompanyInterface{
    public function companyStore($request);
    public function companyRead($request);
    public function companyEdit($request);
    public function companyUpdate($request);
    public function companyDelete($id);
    public function companyView($request);
}
