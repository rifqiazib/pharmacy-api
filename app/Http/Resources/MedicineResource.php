<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'medicine_category_id' => $this->medicine_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'expired_date' => $this->expired_date,
            'stock' => $this->stock,
            'selling_price' => $this->selling_price,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ];
    }
}
