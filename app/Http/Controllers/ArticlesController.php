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
//        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();
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
        dd($article->published_at);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $input['published_at'] = Carbon::now();
        Article::create(Request::all());
        return redirect('articles');
    }
}