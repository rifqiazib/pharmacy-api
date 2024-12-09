<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicineCategoryResource;
use App\Http\Resources\MedicineCategoryResourceCollection;
use App\Models\MedicineCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicineCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->get('per_page',10);
            $medicineCategory = MedicineCategory::paginate($perPage);

            return response()->json([
                'status' => 'success',
                'message' => 'success get medicine categories data',
                'data' => new MedicineCategoryResourceCollection($medicineCategory),
                'meta' => [
                    'total' => $medicineCategory->total(),
                    'per_page' => $medicineCategory->perPage(),
                    'current_page' => $medicineCategory->currentPage(),
                    'last_page' => $medicineCategory->lastPage(),
                    'from' => $medicineCategory->firstItem(),
                    'to' => $medicineCategory->lastItem(),
                ]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred'
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'code' => 'required|max:5|unique:medicine_categories,code',
                'name' => 'required',
                'description' => 'max:255'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $data = [
                'code' => $request->code,
                'name' => $request->name,
                'description' => $request->description
            ];

            MedicineCategory::create($data);
            return response()->json([
                'status' => 'success',
                'message' => 'success create medicine category',
                'data' => $data
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $medicineCategory = MedicineCategory::find($id);

            if (!$medicineCategory) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'medicine category not found'
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'success get medicine categories data',
                'data' => new MedicineCategoryResource($medicineCategory)
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'an error occured'
            ],500);
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
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:medicine_categories,code,' . $id,
                'name' => 'required',
                'description' => 'max:255'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $medicineCategory = MedicineCategory::find($id);

            if (!$medicineCategory) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'medicine category not found'
                ], 401);
            }

            $data = [
                'code' => $request->code,
                'name' => $request->name,
                'description' => $request->description
            ];

            $medicineCategory->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'medicine category updated successfully',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
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
            $medicineCategory = MedicineCategory::find($id);

            if (!$medicineCategory) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'medicine category not found'
                ], 404);
            }

            $medicineCategory->delete($id);
            return response()->json([
                'status' => 'success',
                'message' => 'medicine category deleted successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'an error occured'
            ], 500);
        }
    }
}
