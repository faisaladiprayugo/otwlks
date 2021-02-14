<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    public function index(){
        $headmaster = DB::table('konten')->where('id_konten', 1)->first();
        $about = DB::table('konten')->where('id_konten', 2)->first();
        $d_about = DB::table('sub_konten')->where('id_konten', 2)->get();
        $news = DB::table('news')->orderBy('id_news', 'DESC')->limit(4)->get();
        $events = DB::table('events')
            ->orderBy('tanggal', 'ASC')
            ->where('tanggal', '>=', date('Y-m-d'))
            ->limit(4)
            ->get();

        $Month = [];
        $Day = [];
        $exploder = explode('-', $events[0]->tanggal);
        for($i = 0; $i < count($events); $i++){
            $addingMonth = Carbon::parse($events[$i]->tanggal)->format("M");
            array_push($Month, $addingMonth);
            $addingDay = Carbon::parse($events[$i]->tanggal)->format("d");
            array_push($Day, $addingDay);
        }

        return view('pages.user.index', ['headmaster' => $headmaster,'about' => $about,'d_about' => $d_about,'news' => $news,'events' => $events,'day'=>$Day,'month'=>$Month]);
    }

    public function pages(){
        return view('pages.user.pages');
    }

    public function academics(){
        return view('pages.user.academics');
    }
    public function admission(){
        return view('pages.user.admission');
    }

    public function courses(){
        return view('pages.user.courses');
    }
}
