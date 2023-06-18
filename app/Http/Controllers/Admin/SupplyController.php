<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supply\StoreRequest;
use App\Models\Brand;
use App\Models\Supply;
use App\Services\SupplyService;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    public $service;

    public function __construct(SupplyService $service)
    {
        $this->service = $service;
    }

    public function create(Brand $brand)
    {
        return view('admin.supply.create', compact('brand'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.dashboard');
    }
    public function index()
    {
        $supplies = Supply::paginate(10);
//        //dd($supplies[0]->brand);
        return view('admin.supply.index', compact('supplies'));
    }
}
