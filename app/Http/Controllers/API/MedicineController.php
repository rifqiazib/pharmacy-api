<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicineResource;
use App\Http\Resources\MedicineResourceCollection;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Medicine::with(['hasMedicineCategory']);
            $perPage = $request->get('per_page', 10);

            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('name', 'like', '%' . $search . '%');
            }

            if ($request->filled('medicine_category')) {
                $medicineCategory = $request->input('medicine_category');
                $query->whereHas('hasMedicineCategory', function ($q) use ($medicineCategory) {
                    $q->where('medicine_category_id', $medicineCategory);
                });
            }

            if ($request->filled('medicine_type')) {
                $medicineType = $request->input('medicine_type');
                $query->where('type', $medicineType);
            }

            $medicines = $query->paginate($perPage);

            if ($medicines->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'medicine data not found'
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'succesfully get medicine data',
                'data' => new MedicineResourceCollection($medicines),
                'meta' => [
                    'total' => $medicines->total(),
                    'per_page' => $medicines->perPage(),
                    'current_page' => $medicines->currentPage(),
                    'last_page' => $medicines->lastPage(),
                    'from' => $medicines->firstItem(),
                    'to' => $medicines->lastItem(),
                ]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'an error occured'
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:medicines,code',
                'medicine_category' => 'required',
                'name' => 'required|max:255|string',
                'description' => 'max:255',
                'type' => 'required|in:Tablet, Kapsul, Sirup, Salep',
                'expired_date' => 'required|date',
                'stock' => 'required|numeric',
                'selling_price' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(),400);
            }

            $userId = Auth::id();

            $data = [
                'code' => $request->code,
                'medicine_category_id' => $request->medicine_category,
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'expired_date' => $request->expired_date,
                'stock' => $request->stock,
                'selling_price' => $request->selling_price,
                'created_by' => $userId,
                'updated_by' => $userId
            ];

            Medicine::create($data);
            return response()->json([
                'status' => 'success',
                'message' => 'medicine created successfully',
                'data' => $data
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'an error occured'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $medicine = Medicine::find($id);

            if (!$medicine) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'medicine not found'
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'data' => new MedicineResource($medicine)
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'an error occured'
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $medicine = Medicine::find($id);

            if (!$medicine) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'medicine not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:medicines,code,' . $id,
                'medicine_category' => 'required',
                'name' => 'required|max:255|string',
                'description' => 'max:255',
                'type' => 'required|in:Tablet, Kapsul, Sirup, Salep',
                'expired_date' => 'required|date',
                'stock' => 'required|numeric',
                'selling_price' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(),400);
            }

            $userId = Auth::id();

            $data = [
                'code' => $request->code,
                'medicine_category_id' => $request->medicine_category,
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'expired_date' => $request->expired_date,
                'stock' => $request->stock,
                'selling_price' => $request->selling_price,
                'updated_by' => $userId,
            ];

            $medicine->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'medicine updated succesfully',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'error' => $th->getMessage(),
                'message' => 'an error occured'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $medicine = Medicine::find($id);

            if (!$medicine) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'medicine not found'
                ], 404);
            }

            $medicine->delete($id);
            return response()->json([
                'status' => 'success',
                'message' => 'medicine deleted succesfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'an error occured'
            ], 500);
        }
    }
}
