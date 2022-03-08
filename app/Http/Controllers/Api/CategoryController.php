<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * @var Category $categories
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'string|max:10',
        ]);

        $category ??= new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response()->json(['success' => 'La catégorie a bien été crée']);
    }

    public function show(Category $category): JsonResponse
    {
        return response()->json(['category' => $category]);
    }

    public function update(Request $request, Category $category): void
    {
        $request->validate([
            'name' => 'string|max:10',
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();
        return response()->json(['success' => 'Le tag à bien été supprimé.']);
    }

    public function showBooksByCategory(Category $category): JsonResponse
    {
        $books = Category::find($category->id)->books;

        return response()->json(['books' => $books]);
    }
}
