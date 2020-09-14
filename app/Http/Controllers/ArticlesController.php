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
//        Auth::user()->articles()->save(new Article($request->all()));
//        Article::create($request->all());
        Auth::user()->articles()->create($request->all());
//        \Session::flash('flash_message', 'Your article has been created!');
//        using a session() helper

//        session()->flash('flash_message', 'Your article has been created!');
//        session()->flash('flash_message_important', true);    // we may pass it through with

//        return redirect('articles')->with([
//            'flash_message' => 'Your article has been created',
//            'flash_message_important' => true
//        ]);

//        flash('Your article has been created!')->important();   // the same with packet laracasts/flash
//        flash('Your article has been created!');
//        flash()->success('Your article has been created!');
        flash()->overlay('Your article has been successfully created!', 'Good job!');
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