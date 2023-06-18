<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public $service;

    public function __construct(BrandService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.dashboard');
    }

    public function destroy(Brand $brand)
    {
        $brand->supplies()->forceDelete();
        $brand->delete();
        return redirect()->route('admin.dashboard');
    }

     public function edit(Brand $brand)
     {
         return view('admin.brand.edit',compact('brand'));
     }

     public function update(UpdateRequest $request, Brand $brand)
     {
         $data = $request->validated();
         $this->service->update($data, $brand);
         return redirect()->route('admin.dashboard');
     }


    public function show(Brand $brand)
    {
        $supplies = $brand->supplies;
        $sailsReportByLocation = $this->service->makeSailsReportByLocation($supplies);
        $dataStr = $this->service->makeSailsReport($supplies);
        $countSupplies = count($supplies);
        $sumPrice = $this->service->sumPrice($supplies);
        $sumCount = $this->service->sumCount($supplies);
        return view('admin.brand.show', compact('brand', 'supplies', 'dataStr', 'countSupplies', 'sumPrice', 'sumCount', 'sailsReportByLocation'));
    }
}
