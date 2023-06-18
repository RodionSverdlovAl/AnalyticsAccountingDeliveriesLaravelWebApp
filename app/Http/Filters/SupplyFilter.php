<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class SupplyFilter extends AbstractFilter
{
    public const YEAR= 'year';

    protected function getCallbacks(): array
    {
        // TODO: Implement getCallbacks() method.
        return [
            self::YEAR=> [$this, 'year'],
//            self::BRAND=> [$this, 'brandId']
        ];
    }

    public function year(Builder $builder, $value)
    {
        $builder->where('year', $value);
    }
}
