<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\SupplyRegionFilter;
use App\Http\Requests\Supply\FilterRegionRequest;
use App\Models\Brand;
use App\Models\Supply;
use App\Services\BrandService;
use App\Services\StatisticService;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
       $data=  StatisticService::statisticBrandsByCount();
       $brandService = new BrandService();
       $dataLocationStatistic = $brandService->makeSailsReportByLocation(Supply::all());
       $pieChartLocationStatistic = $dataLocationStatistic['pieChart'];
        return view('admin.statistics.index', compact('data', 'pieChartLocationStatistic'));
    }
    public function indexFilterable(FilterRegionRequest $request)
    {
        $data = $request->validated();
        $location = $data['location'];
        $filter = app()->make(SupplyRegionFilter::class, ['queryParams'=>array_filter($data)]);
        $supplies = Supply::filter($filter)->get();
        $regionChart = StatisticService::statisticRegion($supplies);
        $data=  StatisticService::statisticBrandsByCount();
        $brandService = new BrandService();
        $dataLocationStatistic = $brandService->makeSailsReportByLocation(Supply::all());
        $pieChartLocationStatistic = $dataLocationStatistic['pieChart'];
        return view('admin.statistics.index', compact('data','regionChart','location', 'pieChartLocationStatistic'));
    }

    // 7 графиков по регионам
     // график по минску в разрезе брендов

}
