<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Request;

class ArticlesController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('auth' , ['only' => 'create']);
        $this->middleware('auth' , ['except' => 'index']);
    }

    public function index()
    {
//        return \Auth::user()->username;
//        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

//    public function show(Article $id)
    public function show(Article $article)
    {
//        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
//        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
//        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }

    public function create()
    {
//        if (Auth::guest())
//        {
//            return redirect('articles');
//        }
        return view('articles.create');
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        // All validation is triggered befor this method through CreateArticleRequest
//        $input['published_at'] = Carbon::now();
//        Article::create(Request::all());
//        Auth::user();     // We'll gonna make o further
        Auth::user()->articles()->save(new Article($request->all()));

        Article::create($request->all());
        return redirect('articles');
    }

    // Simple way to validate right from the controller
/*    public function store(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date',
        ]);
        Article::create($request->all());
        return redirect('articles');
    }*/
}