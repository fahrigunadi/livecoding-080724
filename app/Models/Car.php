<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = ['name', 'license_plate', 'model', 'color', 'description', 'company_id'];

    // protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
