<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = false;
    use HasFactory;
    use Filterable;

    public function supplies()
    {
        return $this->hasMany(Supply::class, 'brand_id', 'id');
    }

}
