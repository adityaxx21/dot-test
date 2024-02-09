<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['province'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function getResponseAPIAttribute()
    {
        $responses = array(
            "province_id" => $this->id,
            "province" => $this->province,
        );

        return $responses;
    }
}
