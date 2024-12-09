<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicineResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->transform(function($medicine) {
            return [
                'id' => $medicine->id,
                'code' => $medicine->code,
                'medicine_category' => $medicine->hasMedicineCategory->name,
                'name' => $medicine->name,
                'description' => $medicine->description,
                'type' => $medicine->type,
                'expired_date' => $medicine->expired_date,
                'stock' => $medicine->stock,
                'selling_price' => $medicine->selling_price,
                'created_by' => $medicine->hasUserCreate->name,
                'updated_by' => $medicine->hasUserUpdate->name
            ];
        });
    }
}
