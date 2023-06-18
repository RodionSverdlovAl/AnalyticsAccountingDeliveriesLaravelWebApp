<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class SupplyRegionFilter extends AbstractFilter
{
    public const LOCATION= 'location';

    protected function getCallbacks(): array
    {
        // TODO: Implement getCallbacks() method.
        return [
            self::LOCATION=> [$this, 'location'],
        ];
    }

    public function location(Builder $builder, $value)
    {
        $builder->where('location', $value);
    }
}
