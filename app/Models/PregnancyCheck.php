<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PregnancyCheck extends Model
{
    use HasFactory;

    protected $table = 'pregnancy_checks';

    protected $guarded = ['id'];

    public function familyParents()
    {
        return $this->belongsTo(FamilyParent::class, 'parent_id');
    }

    public function officers()
    {
        return $this->belongsTo(Officer::class, 'officer_id');
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_usages')->withPivot('quantity', 'dosage_instructions', 'meal_time', 'notes')->withTimestamps();
    }
}
