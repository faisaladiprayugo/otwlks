<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class WritterController extends Controller
{
    //
    public function index(){
        return redirect('/writter/manage-news');
    }

    public function news(){
        $news = DB::table('news')->orderBy('id_news', 'DESC')->get();
        return view('pages.writter.manage-news', ['news' => $news]);
    }

    public function tambahNews(){
        $kategori = DB::table('kategori')->get();
        return view('forms.writter.tambah-news', ['kategori' => $kategori]);
    }

    public function storeNews(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'foto' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        $foto = $request->file('foto');
        $direktori = "uploads/news";
        $namaFile = time()."_".$foto->getClientOriginalName();
        $foto->move($direktori, $namaFile);

        DB::table('news')->insert([
            'judul' => $request->judul,
            'foto' => $namaFile,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/writter/manage-news');
    }

    public function editNews($id){
        $news = DB::table('news')->where('id_news', $id)
            ->first();

        $kategori = DB::table('kategori')
            ->get();
        return view('forms.writter.edit-news', ['news' => $news, 'kategori' => $kategori]);
    }

    public function editedNews(Request $request, $id){
        $this->validate($request, [
            'judul' => 'required',
            'foto' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        $news = DB::table('news')->where('id_news', $id)
            ->first();

        $foto = $request->file('foto');
        $direktori = "uploads/news";
        $namaFile = time()."_".$foto->getClientOriginalName();
        $foto->move($direktori, $namaFile);

        File::delete('uploads/news/'.$news->foto);

        DB::table('news')->where('id_news', $id)
            ->update([
                'judul' => $request->judul,
                'foto' => $namaFile,
                'kategori' => $request->kategori,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
            ]);

        return redirect('/writter/manage-news');
    }

    public function hapusNews($id){
        DB::table('news')->where('id_news', $id)
            ->delete();

        return redirect('/writter/manage-news');
    }


    public function events(){
        $now = date('Y/d/m');
        $events = DB::table('events')
            ->orderBy('tanggal', 'DESC')
            ->get();
        return view('pages.writter.manage-events', ['events' => $events]);
    }

    public function tambahEvents(){
        return view('forms.writter.tambah-events');
    }

    public function storeEvents(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'tempat' => 'required',
            'author' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
        ]);

        DB::table('events')->insert([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'tempat' => $request->tempat,
            'author' => $request->author,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/writter/manage-events');
    }

    public function editEvents($id){
        $events = DB::table('events')->where('id_events', $id)
            ->first();
        return view('forms.writter.edit-events', ['events' => $events]);
    }

    public function editedEvents(Request $request, $id){
        $this->validate($request, [
            'judul' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'tempat' => 'required',
            'author' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
        ]);

        DB::table('events')->where('id_events', $id)
            ->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'tempat' => $request->tempat,
                'author' => $request->author,
                'kontak' => $request->kontak,
                'deskripsi' => $request->deskripsi,
            ]);

        return redirect('/writter/manage-events');
    }

    public function hapusEvents($id){
        DB::table('events')->where('id_events', $id)
            ->delte();

        return redirect('/writter/manage-events');
    }

    public function kategori(){
        $kategori = DB::table('kategori')->get();
        return view('pages.writter.manage-kategori', ['kategori' => $kategori]);
    }

    public function tambahKategori(){
        return view('forms.writter.tambah-kategori');
    }

    public function storeKategori(Request $request){
        $this->validate($request, [
            'nama' => 'required',
        ]);

        DB::table('kategori')->insert([
            'nama' => $request->nama,
        ]);

        return redirect('/writter/manage-kategori');
    }

    public function editKategori($id){
        $kategori = DB::table('kategori')->where('id_kategori', $id)
            ->first();
        return view('forms.writter.edit-kategori', ['kategori' => $kategori]);
    }

    public function editedKategori(Request $request, $id){
        $this->validate($request, [
            'nama' => 'required',
        ]);

        DB::table('kategori')->where('id_kategori', $id)
            ->update([
                'nama' => $request->nama,
            ]);

        return redirect('/writter/manage-kategori');
    }

    public function hapusKategori(Request $request, $id){
        DB::table('kategori')->where('id_kategori', $id)
            ->delete();

        return redirect('/writter/manage-kategori');
    }




    public function logout(Request $request){
        $request->session()->forget('writter');

        return redirect('/login-admin');
    }
}
