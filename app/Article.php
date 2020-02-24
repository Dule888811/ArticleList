<?php
namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'main_picture', 'text','item_image','user_id','title'
    ];
    public function User()
    {
        return $this->belongsTo('App\Users');
    }
   
  /*  public function getMainPictureAttribute($main_picture){
        return asset($main_picture);
    } */

}