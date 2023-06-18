<?php

namespace App\Services;

use App\Models\Brand;

class BrandService
{
    public function store($data)
    {
        Brand::create($data);
    }
    public function update($data, Brand $brand)
    {
        $brand->update($data);
    }
    public function sumPrice($supplies)
    {
        $income = 0;
        foreach ($supplies as $supply){
            $income+=$supply->price;
        }
        return $income;
    }
    public function sumCount($supplies)
    {
        $count = 0;
        foreach ($supplies as $supply){
            $count+=$supply->count;
        }
        return $count;
    }

    public function makeSailsReportByLocation($supplies)
    {
        $data = [];
        $data['Минск'] = 0;
        $data['Минская область'] = 0;
        $data['Могилевская область'] = 0;
        $data['Брестская область']  = 0;
        $data['Гомельская область']  = 0;
        $data['Витебская область']  = 0;
        $data['Гродненская область']  = 0;
       foreach ($supplies as $supply) {
           switch ($supply->location){
               case 'Минск':
               {
                    $data['Минск'] +=$supply->count;
               } break;
               case 'Минская область':
               {
                   $data['Минская область'] +=$supply->count;
               } break;
               case 'Могилевская область':
               {
                   $data['Могилевская область'] +=$supply->count;
               } break;
               case 'Брестская область':
               {
                   $data['Брестская область'] +=$supply->count;
               } break;
               case 'Гомельская область':
               {
                   $data['Гомельская область'] +=$supply->count;
               } break;
               case 'Витебская область':
               {
                   $data['Витебская область'] +=$supply->count;
               } break;
               case 'Гродненская область':
               {
                   $data['Гродненская область'] +=$supply->count;
               } break;
           }
       }
       //dd($data);
        // labels: ["Янв", "Фев", "Мар", "Апр", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт", "Ноя", "Дек"],
        //data: [450, 1000, 100, 220, 500, 100, 400, 230, 500,800,1200,1140,],
//        ['Work',     11], ['Eat',      2], ['Commute',  2],
        $pieChartStr ="";
        $locationStr ="";
        $countStr = "";
       foreach ($data as $key=>$item){
           $locationStr .= '"'. $key.'", ';
           $countStr .= $item.', ';
           $pieChartStr .= "['".$key."',   ".$item."],";
       }
       $dataArray['locations'] = $locationStr;
       $dataArray['counts'] = $countStr;
       $dataArray['pieChart'] = $pieChartStr;
       //dd($locationStr, $countStr);
        return $dataArray;
    }

    public function makeSailsReport($supplies)
    {
        $data = [];
        for($i =1; $i<13; $i++)
        {
            $income = 0;
            foreach ($supplies as $supply){
                if($supply->month == $i){
                    $income+=$supply->price;
                }
            }
            $data[$i-1]['month'] = $i;
            $data[$i-1]['income'] = $income;
        }
        // [450, 1000, 100, 220, 500, 100, 400, 230, 500,800,1200,1140],
        $dataStr= "";
        foreach ($data as $item)
        {
            $dataStr .= $item['income'] . ",";
        }
        return $dataStr;
    }
}
