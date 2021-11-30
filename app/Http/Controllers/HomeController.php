<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Login;


class HomeController extends Controller
{

    public function index(){

    $stm = DB::table('logins')->pluck('id', 'username');
    //echo $stm;
    return view('instagram.home',['stm' => $stm]);
    }

    public function destroy($id)
    {
        $student = Login::find($id);
        $student->delete();
        return redirect('/main');
    }

}
