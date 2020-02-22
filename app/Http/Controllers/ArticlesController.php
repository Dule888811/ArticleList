<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $articles = Article::all();

        return view('articles.index')->with(['articles' => $articles]);
    }

    public function create(){
        return view('articles.create');
    }
    public function user()
    {
        $users = User::all();
        return view('articles.user')->with(['users' => $users]);
    }
    public function edit()
    {
        return view('articles.edit');
    }
    public function store(Request $request, User $user)
    {
        $this->_articlesRepositories->store($request,$user);
        return redirect()->route('home');
    }
  
}