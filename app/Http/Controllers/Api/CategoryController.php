<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

/**
 * Class: CategoryController
 * @see App\Models\Category
 * @package App\Http\Controllers\Api
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\CategoryStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryStoreRequest $request): JsonResponse
    {
        return response()->json(Category::create($request->validated()));
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json(Category::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\CategoryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryUpdateRequest $request, int $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->fill($request->validated());
        $category->save();

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            return response(null, 204);
        }
    }
}
