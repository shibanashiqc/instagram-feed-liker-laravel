<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class InstagramController extends Controller
{
    public function instagram($ighost, $useragent, $url, $cookie = 0, $data = 0, $httpheader = array(), $proxy = 0 ){
        $url = $ighost ? 'https://i.instagram.com/api/v1/' . $url : $url;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL , 1);
        //Set the proxy IP.
        if($proxy) curl_setopt($ch, CURLOPT_PROXY, $proxy);
        //if($userpwd) curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$userpwd");
        if($httpheader)curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if($cookie) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        if ($data):
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        endif;
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return false; else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }

    public function uamulti($sign_version = '6.22.0'){
        $resolusi = array('1080x1776','1080x1920','720x1280', '320x480', '480x800', '1024x768', '1280x720', '768x1024', '480x320');
           $versi = array('GT-N7000', 'SM-N9000', 'GT-I9220', 'GT-I9100');		$dpi = array('120', '160', '320', '240');
           $ver = $versi[array_rand($versi)];
           return 'Instagram '.$sign_version.' Android ('.mt_rand(10,11).'/'.mt_rand(1,3).'.'.mt_rand(3,5).'.'.mt_rand(0,5).'; '.$dpi[array_rand($dpi)].'; '.$resolusi[array_rand($resolusi)].'; samsung; '.$ver.'; '.$ver.'; smdkc210; pt_BR)';
           }


    public function generateDeviceId($seed){
        $volatile_seed = filemtime(__DIR__);
        return 'android-'.substr(md5($seed.$volatile_seed), 16);
    }
    public function hook($data){
        $hash = hash_hmac('sha256', $data, '673581b0ddb792bf47da5f9ca816b613d7996f342723aa06993a3f0552311c7d');
        return 'ig_sig_key_version=4&signed_body='.$hash.'.'.urlencode($data);
    }
    public function generate_useragent($sign_version = '42.0.0.19.95'){
        $resolusi = array('1080x1776','1080x1920','720x1280', '320x480', '480x800', '1024x768', '1280x720', '768x1024', '480x320');
        $versi = array('GT-N7000', 'SM-N9000', 'GT-I9220', 'GT-I9100');
        $dpi = array('120', '160', '320', '240');
        $ver = $versi[array_rand($versi)];
        return 'Instagram '.$sign_version.' Android ('.mt_rand(10,11).'/'.mt_rand(1,3).'.'.mt_rand(3,5).'.'.mt_rand(0,5).'; '.$dpi[array_rand($dpi)].'; '.$resolusi[array_rand($resolusi)].'; samsung; '.$ver.'; '.$ver.'; smdkc210; en_US)';
    }
    public function useragent($sign_version = '206.1.0.34.121'){
        $resolusi = array('1080x1776','1080x1920','720x1280', '320x480', '480x800', '1024x768', '1280x720', '768x1024', '480x320');
        $versi = array('GT-N7000', 'SM-N9000', 'GT-I9220', 'GT-I9100');
        $dpi = array('120', '160', '320', '240');
        $ver = $versi[array_rand($versi)];
        return 'Instagram '.$sign_version.' Android ('.mt_rand(10,11).'/'.mt_rand(1,3).'.'.mt_rand(3,5).'.'.mt_rand(0,5).'; '.$dpi[array_rand($dpi)].'; '.$resolusi[array_rand($resolusi)].'; samsung; '.$ver.'; '.$ver.'; smdkc210; en_US)';
    }
    public function get_csrftoken(){
        $fetch = $this->instagram('si/fetch_headers/', null, null);
        $header = $fetch[0];
        if (!preg_match('#Set-Cookie: csrftoken=([^;]+)#', $header, $match)) {
            return json_encode(array('result' => false, 'content' => 'Missing csrftoken'));
        } else {
            return $match[0];
        }
    }
    public function generateUUID($type){
        $uuid = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );

        return $type ? $uuid : str_replace('-', '', $uuid);
    }

    public function login(){
        return view('instagram.login');
    }

    /*
    public function store(Request  $request){
        $username =  request('username');
        $password = request('psw');
        $proxy = request('proxy');

    }
    */
    public function instagram_login(Request  $request){

         $post_username =  request('username');
         $post_password = request('password');
         $proxy = request('proxy');



         if (Login::where('username', $post_username)->exists()) {
            // exists
            $msg = 'Already have database please check your username!';
            die(json_encode(array('result' => 0, 'content' => '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-times" aria-hidden="true"></i> <b>Status:</b> '.$msg.'.</div><script>swal({title: "Hi, '.$msg.'!", text: "Please enter the data correctly!", icon: "error", timer: 2000});document.getElementById("usrloginform").reset();</script>')));
        }

        // echo request('proxy');
        // die();


        // $post_username = 'ssas';
        // $post_password = 'sas';
        // $proxy = '';


        $postq = json_encode([
            'phone_id' => $this->generateUUID(true),
            '_csrftoken' => $this->get_csrftoken(),
            'username' => $post_username,
            'guid' => $this->generateUUID(true),
            'device_id' => $this->generateUUID(true),
            'password' => $post_password,
            'login_attempt_count' => 0
        ]);
        $a = $this->instagram(1, $this->generate_useragent(), 'accounts/login/', 0, $this->hook($postq),array(),$proxy);
        $header = $a[0];
        $a = json_decode($a[1]);
        //header('Content-Type: application/json; charset=utf-8');
        if($a->status == 'ok'){
            preg_match('#set-cookie: csrftoken=([^;]+)#', $header, $match);
            $csrftoken = $match[1];
            preg_match_all('%set-cookie: (.*?);%',$header,$d);$cookies = '';
            for($o=0;$o<count($d[0]);$o++)$cookies.=$d[1][$o].";";
            $id = $a->logged_in_user->pk;
            $array = json_encode(['result' => true, 'cookies' => $cookies,  'csrftoken' => $csrftoken, 'useragent' => $this->generate_useragent(), 'id' => $id, 'token' => $csrftoken]);

            $instgarm = new Login();
            $instgarm->username = request('username');
            $instgarm->password = bcrypt($post_password);
            $instgarm->cookie = $cookies;
            $instgarm->save();
            die(json_encode(array('result' => 0, 'content' => '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check" aria-hidden="true"></i> <b>Status:</b> Sukses, Login ...</div><script>swal({title: "Hi, Sukses Login Account Added Success", text: "Mengalihkan ...", icon: "success", timer: 2000});setTimeout(function(){location.href = \'../main\';}, 2000);</script>')));
        } else {
            $msg = $a->message;
            $array = json_encode(['result' => false, 'msg' => $msg]);
            die(json_encode(array('result' => 0, 'content' => '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-times" aria-hidden="true"></i> <b>Status:</b> '.$msg.'.</div><script>swal({title: "Hi, '.$msg.'!", text: "Please enter the data correctly!", icon: "error", timer: 2000});document.getElementById("usrloginform").reset();</script>')));
        }

        return true;
    }

        }

