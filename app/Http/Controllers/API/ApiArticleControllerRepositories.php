<?php


namespace App\Http\Controllers\API;


use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiArticleControllerRepositories implements ApiArticleControllerRepositoriesInterface
{
    public function all()
    {
        return Article::all();
    }

    public function getArticleById($id)
    {
      return  DB::table('articles')->where('id', $id)->get();
    }

    public function getArticlesByUserId($id)
    {
        return DB::table('articles')->where('user_id', $id)->get();
    }

    public function store(Request $request)
    {

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
        $main_picture = $request->file('main_picture');
        $mainPictureName = time() .  $main_picture->getClientOriginalName();
        $path =  'public/image';
        $main_picture->move( $path, $mainPictureName);

        $article = new Article([
            'text' => $request->post('blog'),
            'main_picture' => $path . '/' . time() . $main_picture->getClientOriginalName(),
            'item_image' => json_encode(implode(',' ,$data)),
            'user_id' =>  $request->post('user_id'),
            'title' =>  $request->post('title')
        ]);
        $article->save();
        }

        public function destroy($id) {
            $article = Article::find($id);
                $article->delete();
            }
}