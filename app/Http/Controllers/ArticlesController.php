<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class ArticlesController extends Controller
{

    public function index()
    {
//        $articles = Article::all();
        $articles = Article::latest('published_at')->get();
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

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
//        $input = Request::get('title');
        $input = Request::all();
        $input['published_at'] = Carbon::now();
        Article::create($input);
//        return $input;
        return redirect('articles');
    }
}