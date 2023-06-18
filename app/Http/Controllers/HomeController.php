<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Supply;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
