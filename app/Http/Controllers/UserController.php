<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Alert;
use Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $batas = 5;
        $user = User::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($user->currentPage() - 1);
        return view('admincontent.user.index', compact('user', 'no'));
    }

    public function create(){
        return view('admincontent.user.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|email|unique:users',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->password);
        $user->save();
        Alert::success('pesan','Data Berhasil Disimpan');
        return redirect('/user');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admincontent.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        if ($request->input('password')) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->password = bcrypt($request->password);
        }else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
        }

        $user->update();
        Alert::success('pesan','Data berhasil Diupdate');
        return redirect('/user');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        Alert::success('pesan','Data Berhasil Dihapus');
        return redirect('/user');
    }
}
