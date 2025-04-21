<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weighing extends Model
{
    use HasFactory;

    protected $table = 'weighings';

    protected $guarded = ['id'];

    public function familyChildren()
    {
        return $this->belongsTo(FamilyChildren::class, 'children_id');
    }

    public function officers()
    {
        return $this->belongsTo(Officer::class, 'officer_id');
    }
}
