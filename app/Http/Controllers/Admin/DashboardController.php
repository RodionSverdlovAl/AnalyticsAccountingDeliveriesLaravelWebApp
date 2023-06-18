<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Supply;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $countBrands = count($brands);
        $supplies = Supply::all();
        $totalIncome = $this->totalIncome($supplies);
        $countSupplies = count($supplies);
        return view('admin.dashboard', compact('brands','countBrands', 'totalIncome', 'countSupplies'));
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
