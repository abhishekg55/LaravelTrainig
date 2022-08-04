<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MstCountry extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function states()
    {
        return $this->hasMany(State::class, 'country_id', 'id');
    }

    public function getAllCapsAttribute()
    {
        return Str::upper("{$this->name}");
    }

    public function setShortNameAttribute($value)
    {
        $this->attributes['short_name'] = Str::substr($value, 0, 2);
    
    }

}
