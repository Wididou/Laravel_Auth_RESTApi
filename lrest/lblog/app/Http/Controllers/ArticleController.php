<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        $article= Article::create($request->all);
        return response()->json($article, 201);
    }

    public function show($article)
    {
        return $article;
    }

    public function update(Request $request, $article)
    {
        $article->update($request->all);
        return response()->json($article, 200);
    }


    public function delete($article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
