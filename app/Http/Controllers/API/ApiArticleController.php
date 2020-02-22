<?php
namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Article;


use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageServiceProvider;
use Image;
use Illuminate\Support\Facades\Auth;
use  App\Http\Requests\ArticleRequest;
use Illuminate\Validation\ValidationException;
use FormRequestAlias;
class ApiArticleController extends BaseController
{
    public function index()
    {
            $url = url()->full();
            $url = explode('?',$url);
            if(isset($url[1])) {
                $url[1] = explode('=', $url[1]);
                if ($url[1][0] == 'title') {
                    $id = $url[1][1];
                    $article = DB::table('articles')->where('id', $id)->get();
                    $data = $article->toArray();
                    $response = [
                        'success' => true,
                        'data' => $data,
                        'message' => 'Articles retrieved successfully.'
                    ];

                    return response()->json($response, 200);
                } elseif($url[1][0] == 'user')
                {
                    $id = $url[1][1];
                    $article = DB::table('articles')->where('user_id', $id)->get();
                    $data = $article->toArray();
                    $response = [
                        'success' => true,
                        'data' => $data,
                        'message' => 'Articles retrieved successfully.'
                    ];

                    return response()->json($response, 200);
                }
            }
               else
                    {
                    $artices = Article::all();

                        $data = $artices->toArray();
                        $response = [
                            'success' => true,
                            'data' => $data,
                            'message' => 'Articles retrieved successfully.'
                        ];

                        return response()->json($response, 200);
                    }

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
            'main_picture' => $path . '/' . $main_picture->getClientOriginalName(),
            'item_image' => json_encode(implode(',' ,$data)),
            'user_id' =>  $request->post('user_id'),
            'title' =>  $request->post('title')
        ]);
        $article->save();
        $response = [
            'message' => 'Articles retrieved successfully.'
        ];

        return response()->json($response['message'], 200);

    }


}    