<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Logs;
use Session;


class HomeController extends Controller
{

    public function index(){

    $stm = DB::table('logins')->pluck('id', 'username');
    $data = ['LoggedUserInfo'=>Login::where('username','=', session('LoggedUser'))->first()];
    $xdata = Session::all();
    return view('instagram.home', $data);
    }

    public function logs($username){

        $user = DB::table('logs')->where('username', $username)->get();
        //die(json_encode($user));
       // $logs = Logs::find($username);

        $data = ['LoggedUserInfo'=>Logs::where('username','=', session('LoggedUser'))->first()];
        return view('instagram.logs',['stmt'=> $user]);

        }

        public function logs_all(){
            $logs = Logs::all();
            return view('instagram.logs_all', ["stmt" => $logs]);

            }

    public function destroy($id)
    {
        $users = Login::find($id);
        $users->delete();
        if(session()->has('LoggedUser')){
        session()->pull('LoggedUser');
        return redirect('/auth/login');
    }
    }
}
