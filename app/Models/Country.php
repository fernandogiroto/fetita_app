<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'order',
        'iso',
        'iso2',
        'code'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'country');
    }
}
