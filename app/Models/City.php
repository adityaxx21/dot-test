<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['city_name', 'province_id', 'postal_code', 'type'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function getResponseAPIAttribute()
    {
        $responses = array(
            "city_id" => $this->id,
            "province_id" => $this->province->id,
            "province" => $this->province->province,
            "type" => $this->type,
            "city_name" =>  $this->city_name,
            "postal_code" => $this->postal_code,
        );

        return $responses;
    }
}
