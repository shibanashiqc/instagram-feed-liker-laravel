<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Logs;


class HomeController extends Controller
{

    public function index(){

    $stm = DB::table('logins')->pluck('id', 'username');
    //echo $stm;
    return view('instagram.home',['stm' => $stm]);
    }

    public function logs(){

        //$stmt = DB::table('logs')->pluck('username','media_id');
        //echo $stmt;

        $logs = Logs::all();
        //$last = DB::table('logs')->latest()->first();
        //echo $last;
        //die(json_encode($logs));
        return view('instagram.logs',['stmt' => $logs]);

        }

    public function destroy($id)
    {
        $student = Login::find($id);
        $student->delete();
        return redirect('/main');
    }

}
