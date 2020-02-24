<?php


namespace App\Repositories;


use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticlesRepository implements ArticlesRepositoryInterface
{
    public function all()
    {
        return Article::all();
    }

    public function users()
    {
        return User::all();
    }

    public function getArticleId($id)
    {
       return  $article = Article::find($id);
    }

    public function update(Request $request,$id){
        $data[] = '';
        if($request->hasFile('item_image'))
        {
            foreach($request->file('item_image') as $image)
            {
                $name =  time() . $image->getClientOriginalName();
                $path = 'public/images';
                $image->move($path,$name);
                $data[] = $name;
            }
        }
        $article = $this->getArticleId($id);
        $article->text = $request->post('blog');
        $article->title = $request->post('title');
        if($request->hasFile('main_picture')){
            $main_picture = $request->file('main_picture');
            $mainPictureName = time() .  $main_picture->getClientOriginalName();
            $path =  'public/image';
            $main_picture->move( $path, $mainPictureName);
            $article->main_picture = $path . '/' . time() . $main_picture->getClientOriginalName();
        }
        $article->item_image = json_encode(implode(',' ,$data));
        return $article;
    }
    public function getArticleByUserId(){
        return $articles = DB::table('articles')->where('user_id', Auth::id())->get();
    }
}