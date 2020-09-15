<?php


namespace App\Repositories;


use App\Article;

class FooRepository
{
    public function get()
    {
        return ['array', 'of', 'items'];
//        return Article::all();
    }
}