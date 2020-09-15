<?php


namespace App\Http\Composers;


use App\Article;
use Illuminate\Contracts\View\View;

class NavigationComposer
{
/*    public function __construct(ArticlesRepository $articles) // Laravel builds such repository automatically
    {

    }*/

    public function compose(View $view)
    {
        $view->with('latest', Article::latest()->first());
        // if there are lots of model and queries use specific methods at instatiated repositories!!!!!
//        $view->with('latest', Article::with('')->join('')->where('')->first());
//        $view->with('latest', $this->articles->ofSomeType()); // more clean

    }
}