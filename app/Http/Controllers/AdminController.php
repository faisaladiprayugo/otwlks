<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class AdminController extends Controller
{
    //
    public function login(Request $request){
        if($request->session()->has('admin')){
            return redirect('/admin');
        }elseif($request->session()->has('writter')){
            return redirect('/writter');
        }else{
            return view('pages.admin.login');
        }
    }

    public function storeLogin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $user = DB::table('users')
            ->where('username', $request->username)
            ->first();
        
        if($user == null){
            return redirect()->back()->with('canceled', 'Username Tersebut Tidak Ada !!!');
        }elseif($user->username == $request->username && $user->password == $request->password){
            if($user->akses == 1){
                $request->session()->put('admin', $request->username);
                return redirect('/admin');
            }elseif($user->akses == 2){
                $request->session()->put('writter', $request->username);
                return redirect('/writter');
            }
        }else{
            return redirect()->back()->with('canceled', 'Username / Password Mungkin Salah !!!');
        }
    }

    public function index(){
        return redirect('/admin/manage-writter');
    }

    public function manageWritter(){
        $writter = DB::table('users')->where('akses', 2)
            ->orderBy('id_user', 'DESC')
            ->get();
        return view('pages.admin.manage-writter', ['writter' => $writter]);
    }

    public function tambahWritter(){
        return view('forms.admin.tambah-writter');
    }

    public function storeWritter(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        DB::table('users')->insert([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect('/admin/manage-writter');
    }

    public function editWritter($id){
        $writter = DB::table('users')->where('id_user', $id)
            ->first();
        return view('forms.admin.edit-writter', ['writter' => $writter]);
    }

    public function editedWritter(Request $request, $id){
        $this->validate($request, [
            'password' => 'required',
        ]);
        
        DB::table('users')->where('id_user', $id)
            ->update([
                'password' => $request->password,
            ]);

        return redirect('/admin/manage-writter');
    }

    public function hapusWritter($id){
        DB::table('users')->where('id_user', $id)
            ->delete();

        return redirect('/admin/manage-writter');
    }

    public function headmaster(){
        $headmaster = DB::table('konten')->where('id_konten', 1)
            ->first();
        return view('pages.admin.headmaster', ['headmaster' => $headmaster]);
    }

    public function editHeadmaster(){
        $headmaster = DB::table('konten')->where('id_konten', 1)
            ->first();
        return view('forms.admin.edit-headmaster', ['headmaster' => $headmaster]);
    }

    public function editedHeadmaster(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'sub_judul' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
        ]);

        $headmaster = DB::table('konten')->where('id_konten', 1)
            ->first();

        $file = $request->file('foto');
        $direktori = "uploads/headmaster";
        $namaFile = time()."_".$file->getClientOriginalName();
        $file->move($direktori, $namaFile);

        DB::table('konten')->where('id_konten', 1)
            ->update([
                'judul' => $request->judul,
                'sub_judul' => $request->sub_judul,
                'foto' => $namaFile,
                'deskripsi' => $request->deskripsi,
            ]);

        File::delete('/uploads/headmaster/'.$headmaster->foto);

        return redirect('/admin/headmaster');
    }

    public function manageAbout(){
        $about = DB::table('konten')->where('id_konten', 2)
            ->first();
        $sub_about = DB::table('sub_konten')->where('id_konten', 2)
            ->get();
        return view('pages.admin.manage-about', ['about' => $about, 'sub_about' => $sub_about]);
    }

    public function editAbout(){
        $about = DB::table('konten')->where('id_konten', 2)
            ->first();
        return view('forms.admin.edit-about', ['about' => $about]);
    }

    public function editedAbout(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'sub_judul' => 'required',
        ]);

        DB::table('konten')->where('id_konten', 2)
            ->update([
                'judul' => $request->judul,
                'sub_judul' => $request->sub_judul,
            ]);

        return redirect('admin/manage-about');
    }

    public function tambahSubAbout(){
        return view('forms.admin.tambah-sub-about');
    }

    public function storeSubAbout(Request $request){
        $this->validate($request, [
            'deskripsi' => 'required',
        ]);

        DB::table('sub_konten')->insert([
            'id_konten' => 2,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('admin/manage-about');
    }

    public function editSubAbout($id){
        $about = DB::table('sub_konten')->where('id_subkonten', $id)
            ->first();
        return view('forms.admin.edit-sub-about', ['about' => $about]);
    }

    public function editedSubAbout(Request $request, $id){
        $this->validate($request, [
            'deskripsi' => 'required',
        ]);
        DB::table('sub_konten')->where('id_subkonten', $id)
            ->update([
                'deskripsi' => $request->deskripsi,
            ]);
        
        return redirect('admin/manage-about');
    }

    public function hapusSubAbout($id){
        DB::table('sub_konten')->where('id_subkonten', $id)
            ->delete();

        return redirect('admin/manage-about');
    }






    public function logout(Request $request){
        $request->session()->forget('admin');

        return redirect('/login-admin');
    }
}
