<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyEditRequest;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use App\Models\Company\CompanyContract;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    protected CompanyContract $companyManager;

    public function __construct(CompanyContract $companyManager)
    {
        $this->companyManager = $companyManager;
    }
    public function index()
    {
        $companies = Company::all();

        return view('company.list')->with([
            'companies' => $companies
        ]);
    }

    public function create()
    {
        $company = new Company();
        $company->show_status = Company::STATUS_ACTIVE;

        return view('company.store')->with([
            'company' => $company,
        ]);
    }

    public function store(CompanyEditRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $validated['logo'] = $request->file('logo')->store('images/company', 'public');
        }

        $result = $this->companyManager->store($validated);
        if ($result) {
            return back()->with('success', 'Company created successfully.');
        }
    }
}
