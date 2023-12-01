<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainpageController extends Controller
{
    public function index(): View
    {
        $books = Book::query()->limit(10)->get();
        $bookNumber = Book::query()->count();
        $totalPages = ceil($bookNumber / 10); // 10 books per page
        return view("index", compact("books", 'totalPages'));
    }

    public function paginate(Request $data): JsonResponse
    {
        $offset = ($data->input("page") - 1) * 10;
        $books = Book::with('authors', 'publishers')->offset($offset)->limit(10)->get();

        return response()->json($books);
    }
}
