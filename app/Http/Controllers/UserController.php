<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Pegawai;
use DB;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function index()
    {
        $datas = User::orderBy('id', 'ASC')->get();
        return view('user.index', compact(['datas']));
    }

    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('user.index')->with(['message' => 'Data Berhasil disimpan']);
    }
    public function edit($id)
    {

        $user = User::where('id', $id)->first();
        return view('user.edit', compact(['user']));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'level' => 'required',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($request->get('password')) {


            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'password' => bcrypt($request->password)

            ]);
        } else {

            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level

            ]);
        }


        return redirect()->route('user.index')->with(['message' => 'Data Berhasil diubah']);
    }
    public function destroy($id)
    {


        User::where('id', $id)->delete();

        return redirect()->route('user.index')->with(['message' => 'Data Berhasil dihapus']);
    }
}
