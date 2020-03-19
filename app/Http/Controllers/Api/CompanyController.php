<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Stock;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::select([
            'id',
            'name',
            'logo',
        ])->orderBy('name')->paginate()->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return string
     */
    public function show(Company $company)
    {
        return $company->toJson();
    }

    public function getStocks(Company $company)
    {
        return $company->stocks()->select(Stock::FIELD_SELECT)->paginate()->toJson();
    }
}
