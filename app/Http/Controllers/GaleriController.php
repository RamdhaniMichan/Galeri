<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\Album;
use File;
use Alert;
use Image;
use Auth;

class GaleriController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $batas = 4;
        $galeri = Galeri::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($galeri->currentPage() - 1);
        return view('admincontent.galeri.index', compact('galeri', 'no'));
    }

    public function create(){
        $album = Album::all();
        return view('admincontent.galeri.create', compact('album'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $galeri = new Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_album = $request->id_album;
        $galeri->id_user = Auth::id();

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(180,130)->save('thumb/'.$namafile);
        $foto->move('images/',$namafile);
        
        $galeri->foto = $namafile;
        $galeri->save();
        Alert::success('pesan', 'Data Berhasil Disimpan');
        return redirect('/galeri');
    }

    public function edit($id){
        $album = Album::all();
        $galeri = Galeri::find($id);
        return view('admincontent.galeri.edit', compact('album','galeri'));
    }

    public function update(Request $request,$id){
        $galeri = Galeri::find($id);
        if ($request->has('foto')) {
            $this->validate($request, [
                'nama_galeri' => 'required',
                'keterangan' => 'required',
                'foto' => 'required|image|mimes:jpeg,jpg,png',
            ]);

            $galeri->nama_galeri = $request->nama_galeri;
            $galeri->keterangan = $request->keterangan;
            $galeri->id_album = $request->id_album;
            $galeri->id_user = Auth::id();

            $foto = $request->foto;
            $namafile = time().'.'.$foto->getClientOriginalExtension();

            Image::make($foto)->resize(180,130)->save('thumb/'.$namafile);
            $foto->move('images/',$namafile);

            $galeri->foto = $namafile;
        }else {
            $galeri->nama_galeri = $request->nama_galeri;
            $galeri->keterangan = $request->keterangan;
            $galeri->id_album = $request->id_album;
        }

        $galeri->update();
        Alert::success('pesan','Data Berhasil Diupdate');
        return redirect('/galeri');
    }

    public function destroy($id){
        $galeri = Galeri::find($id);
        $namafile = $galeri->foto;
        File::delete('images/'.$namafile);
        File::delete('thumb/'.$namafile);
        $galeri->delete();
        Alert::success('pesan', 'Data Berhasil Dihapus');
        return redirect('/galeri');
    }
}
