<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::all();
//        return $articles; // suitable to return json in api
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
//        return $id;
//        $article = Article::find($id);
//        dd($article);
//        return $article;
//        if (is_null($article)) {
//            abort(404);
//        }
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}