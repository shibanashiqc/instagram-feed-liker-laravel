<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\InstagramController;


class CronController extends Controller
{


public function run(){

    $useragent = (new InstagramController)->uamulti();
    //echo $useragent;

   $stm = DB::table('logins')->pluck('cookie', 'username');
   //echo $stm;
   foreach ($stm as $name => $cookies) {
       $cookie = $cookies;
       $username = $name;

       // Media fetching feed
       $req = (new InstagramController)->instagram(1, $useragent, 'feed/timeline/',$cookie);
       $data = json_decode($req['1'],true);
      // die(json_encode($data));


      foreach($data['items'] as $key => $value) {
        $mediaid    = $value['id'];
        $shortcode = $value['code'];
        $liked = $value['has_liked'];

        //Checking
        if($liked == false)
     {

    $like = (new InstagramController)->instagram(1, $useragent, 'media/'.$mediaid.'/like/',$cookie,(new InstagramController)->hook('{"media_id":"'.$mediaid.'"}'));
    $json=json_decode($like[1]);
   // die(json_encode($json));


   if($json->status=='ok')
   {

    $return = [];
         $return[] = [
         'status' => $json->status,
         'user' => $username

     ];
    echo json_encode($return);
    break;

   }else{

    $return = [];
         $return[] = [
         'status' => $json->status,
         'user' => $username

     ];
    echo json_encode($return);

   }

     }
    }

   }


}



}
