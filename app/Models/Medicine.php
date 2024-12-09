<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'code',
        'description',
        'type',
        'expired_date',
        'stock',
        'selling_price',
        'medicine_category',
        'created_by',
        'updated_by',
        'name',
        'medicine_category_id'
    ];

    public function hasUserCreate()
    {
        return $this->belongsTo(User::class,'created_by', 'id');
    }

    public function hasUserUpdate()
    {
        return $this->belongsTo(User::class,'updated_by', 'id');
    }

    public function hasMedicineCategory()
    {
        return $this->belongsTo(MedicineCategory::class,'medicine_category_id', 'id');
    }
}
