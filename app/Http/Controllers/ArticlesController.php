<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Request;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth' , ['except' => 'index']);
    }

    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');
//        $tagIds = $article->getTagListAttribute()->toArray();
//        $tags = Tag::find($tagIds)->lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());
        return redirect('articles');
    }

    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
//        $article->tags()->attach($request->input('tags'));
        $article->tags()->attach($request->input('tag_list'));
        flash('Your article has been created!');
        return redirect('articles')->with('Your article has been created');
    }
}