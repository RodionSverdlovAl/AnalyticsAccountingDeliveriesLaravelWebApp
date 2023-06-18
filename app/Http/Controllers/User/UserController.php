<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Filters\SupplyFilter;
use App\Http\Requests\Supply\FilterRequest;
use App\Models\Brand;
use App\Models\Supply;
use App\Services\BrandService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $service;

    public function __construct(BrandService $service)
    {
        $this->service = $service;
    }

    public function dashboardIndex()
    {
        $brands = Brand::all();
        $countBrands = count($brands);
        $supplies = Supply::all();
        $totalIncome = $this->totalIncome($supplies);
        $countSupplies = count($supplies);
        return view('user.dashboard', compact('brands','countBrands', 'totalIncome', 'countSupplies'));
    }
    public function showBrand(Brand $brand)
    {
        $supplies = $brand->supplies;
        $sailsReportByLocation = $this->service->makeSailsReportByLocation($supplies);
        $dataStr = $this->service->makeSailsReport($supplies);
        $countSupplies = count($supplies);
        $sumPrice = $this->service->sumPrice($supplies);
        $sumCount = $this->service->sumCount($supplies);
        return view('user.brand.show', compact('brand', 'supplies', 'dataStr', 'countSupplies', 'sumPrice', 'sumCount', 'sailsReportByLocation'));
    }
    public function showBrandFilterable(Brand $brand, FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(SupplyFilter::class, ['queryParams'=>array_filter($data)]);
        $supplies = Supply::where('brand_id', $brand->id)->filter($filter)->paginate(10);
        $dataStr = $this->service->makeSailsReport($supplies);
        $countSupplies = count($supplies);
        $sumPrice = $this->service->sumPrice($supplies);
        $sumCount = $this->service->sumCount($supplies);
        $sailsReportByLocation = $this->service->makeSailsReportByLocation($supplies);
        return view('user.brand.show', compact('brand', 'supplies', 'dataStr', 'countSupplies', 'sumPrice', 'sumCount','sailsReportByLocation'));
    }
    public function totalIncome($supplies)
    {
        $income = 0;
        foreach ($supplies as $supply){
            $income+=$supply->price;
        }
        return $income;
    }
}
