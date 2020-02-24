<?php

namespace App\Http\Controllers;

use App\Article;
use App\Repositories\ArticlesRepository;
use App\Repositories\ArticlesRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private  $_articlesRepositories;
    public function __construct(ArticlesRepositoryInterface $articlesRepositories)
    {
        $this->_articlesRepositories = $articlesRepositories;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles =  $this->_articlesRepositories->all();

        return view('articles.index')->with(['articles' => $articles]);
    }

    public function create(){
        return view('articles.create');
    }

    public function user()
    {
        $users =  $this->_articlesRepositories->users();
        return view('articles.user')->with(['users' => $users]);
    }

    public function edit($id)
    {
        $article = $this->_articlesRepositories->getArticleId($id)->toArray();
        return view('articles.edit')->with(['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article =  $this->_articlesRepositories->update($request,$id);
        $article->update();
        return redirect()->route('home');
    }

    public function getArticleByUserId()
    {
                $articles = $this->_articlesRepositories->getArticleByUserId();
                $data = $articles->toArray();
                if(count($data) > 0){
                    return view('articles.author')->with(['articles' => $articles]);

                }else{
                    echo "You don't have any articles";
                }
    }
    public function delete($id){
        return view('articles.delete')->with('id',$id);
    }

}