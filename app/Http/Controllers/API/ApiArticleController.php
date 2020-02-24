<?php
namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Eloquent;
use Intervention\Image\ImageServiceProvider;
use Image;
use FormRequestAlias;
class ApiArticleController extends BaseController
{
    private $_apiArticleControllerRepositories;

    public function __construct(ApiArticleControllerRepositories $apiArticleControllerRepositories)
    {
        $this->_apiArticleControllerRepositories = $apiArticleControllerRepositories;
    }

    public function index()
    {
            $url = url()->full();
            $url = explode('?',$url);
            if(isset($url[1])) {
                $url[1] = explode('=', $url[1]);
                if ($url[1][0] == 'title') {
                    $id = $url[1][1];
                    $article = $this->_apiArticleControllerRepositories->getArticleById($id);
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
                    $article = $this->_apiArticleControllerRepositories->getArticlesByUserId($id);
                    $data = $article->toArray();
                    $response = [
                        'success' => true,
                        'data' => $data,
                        'message' => 'Articles retrieved successfully.'
                    ];

                    return response()->json($response, 200);
                }
            }else
                    {
                    $artices = $this->_apiArticleControllerRepositories->all();

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

        $this->_apiArticleControllerRepositories->store($request);
        $response = [
            'message' => 'Articles retrieved successfully.'
        ];

        return response()->json($response['message'], 201);

    }

    public function destroy($id) {
            $this->_apiArticleControllerRepositories->destroy($id);
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }




}    