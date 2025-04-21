<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $table = 'vaccines';

    protected $guarded = ['id'];

    public function immunizations()
    {
        return $this->hasMany(Immunization::class, 'vaccine_id');
    }
}
