<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = new Book;
        $book->name = $request->input("name");
        $book->save();
        $book->publishers()->attach(explode(",", $request->input("publisher_id")));
        $book->authors()->attach(explode(",", $request->input("author_id")));

        return response()->json(["message" => "Successfully added"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $book = Book::with("authors", "publishers")->find($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $book = Book::query()->find($id);
        if ($request->input("name")) {
            /** @var Book  $book */
            $book->name = $request->input("name");
            $book->save();
        }
        if ($request->input("publisher_id")) {
            $book->publishers()->detach();
            $book->publishers()->attach(explode(",", $request->input("publisher_id")));
        }
        if ($request->input("author_id")) {
            $book->authors()->detach();
            $book->authors()->attach(explode(",", $request->input("author_id")));
        }

        return response()->json(["message" => "Successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Book::query()->find($id)->delete();

        return response()->json(["message" => "Successfully deleted"]);
    }
}
