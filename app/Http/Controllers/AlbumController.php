<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Str;
use App\Album;
use File;
use Alert;
use Auth;

class AlbumController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    
    public function index(){
        $batas = 5;
        $jumlah_album = Album::count();
        $album = Album::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($album->currentPage()-1);
        return view('admincontent.album.album', compact('album', 'no', 'jumlah_album'));
    }

    public function create(){
        return view('admincontent.album.create');
    }

    public function store(Request $request){
        $album = new Album;
        $album->nama_album = $request->nama_album;
        $album->album_seo = Str::slug($request->nama_album);

        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move('images/', $namafile);

        $album->gambar = $namafile;
        $album->save();
       
        Alert::success('pesan', 'Data Berhasil Disimpan');
        return redirect('/album');
        
    }

    public function edit($id){
        $album = Album::find($id);
        return view('admincontent.album.edit', compact('album'));
    }

    public function update(Request $request, $id){
        $album = Album::find($id);
        if ($request->has('gambar')){
            $album->nama_album = $request->nama_album;
            $album->album_seo = Str::slug($request->nama_album);

            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('images/', $namafile);
            $album->gambar = $namafile;
        }
        else {
            $album->nama_album = $request->nama_album;
            $album->album_seo = Str::slug($request->nama_album);
        }

        $album->update();
        Alert::success('pesan', 'Data Berhasil Diupdate');
        return redirect('/album');
    }

    public function destroy($id){
        $album = Album::find($id);
        $namafile = $album->gambar;
        File::delete('images/'.$namafile);
        $album->delete();
        Alert::success('pesan', 'Data Berhasil Dihapus');
        return redirect('/album');
    }
}
