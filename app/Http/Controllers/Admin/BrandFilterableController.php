<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\JobFilter;
use App\Http\Filters\SupplyFilter;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Supply\FilterRequest;
use App\Models\Brand;
use App\Models\Job;
use App\Models\Supply;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandFilterableController extends Controller
{
    public $service;
    public function __construct(BrandService $service)
    {
        $this->service = $service;
    }
    public function show(Brand $brand,FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(SupplyFilter::class, ['queryParams'=>array_filter($data)]);
        $supplies = Supply::where('brand_id', $brand->id)->filter($filter)->paginate(10);
        $dataStr = $this->service->makeSailsReport($supplies);
        $countSupplies = count($supplies);
        $sumPrice = $this->service->sumPrice($supplies);
        $sumCount = $this->service->sumCount($supplies);
        $sailsReportByLocation = $this->service->makeSailsReportByLocation($supplies);
        return view('admin.brand.show', compact('brand', 'supplies', 'dataStr', 'countSupplies', 'sumPrice', 'sumCount','sailsReportByLocation'));
    }
}
