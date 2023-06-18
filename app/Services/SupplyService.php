<?php

namespace App\Services;

use App\Models\Supply;

class SupplyService
{
    public function store($data)
    {
        Supply::create($data);
    }


}
