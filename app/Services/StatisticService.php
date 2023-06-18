<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Supply;

class StatisticService
{
//    [
//        [[Brand],[count]],
//        [[Brand], [count]],
//    ]

    static public function statisticBrandsByCount()
    {
        $pieChartStr = "";
        $pieChartStr2 = "";
        $stolbDiagram = "";
        $brands =  Brand::all();
        foreach ($brands as $brand)
        {
            $supplies = $brand->supplies;
            $sumCount = 0;
            $sumBYN = 0;
            foreach ($supplies as $supply)
            {
                $sumCount +=$supply->count;
                $sumBYN +=$supply->price;
            }
            $pieChartStr .= "['".$brand->name."',   ".$sumCount."],";
            $pieChartStr2 .= "['".$brand->name."',   ".$sumBYN."],";
            $stolbDiagram .= "['".$brand->name."',   ".$sumBYN. ',"silver"'  ."],";
        }
        $data['count'] = $pieChartStr;
        $data['price'] = $pieChartStr2;
        $data['diagram'] = $stolbDiagram;
        return $data;
    }

    public static function statisticRegion($supplies)
    {
        $data =[];
        $brands = Brand::all();
        foreach ($brands as $brand){
            $data[$brand->name] = 0;
        }
        foreach ($supplies as $supply)
        {
            $data[$supply->brand->name] += $supply->count;
        }
        $pieChartStr = " ";
        foreach ($data as $key => $item){
            $pieChartStr .= "['".$key."',   ".$item."],";
        }
        return $pieChartStr;
    }

//["Copper", 8.94, "#b87333"],
//["Silver", 10.49, "silver"],
//["Copper", 8.94, "#b87333"],
//["Silver", 10.49, "silver"],
//["Copper", 8.94, "#b87333"],
//["Silver", 10.49, "silver"],
}
