<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        $books = Book::all();

        return response()->json(['books' => $books]);
    }

    /**
     * @var Book $book
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|min:10',
            'author' => 'required|string',
            'description' => 'required|string|max:500',
            'category' => 'required'
        ]);

        $book ??= new Book();
        $book->user_id = Auth::id();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->slug = Str::slug($request->title);
        $book->category_id = $request->category;
        if ($request->isRead) {
            $book->isRead = now();
        }
        $book->save();

        return response()->json(['success' => 'Le livre a bien été ajouté.']);
    }

    public function show(Book $book): JsonResponse
    {
        return response()->json(['book' => $book]);
    }

    public function update(Request $request, Book $book): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|min:10',
            'author' => 'required|string',
            'description' => 'required|string|max:500',
            'category' => 'required'
        ]);

        $book->user_id = Auth::id();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        if($request->isRead) {
            $book->isRead = now();
        }
        $book->category_id = $request->category;
        $book->save();

        return response()->json(['success' => 'Le livre a bien été modifié.']);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(['success' => 'Le livre a bien été supprimé.']);
    }
}
