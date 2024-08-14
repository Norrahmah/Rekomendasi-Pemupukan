<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetaniController extends Controller
{
    public function index()
    {
        $petanis = Petani::all();
        return view('petani.index', compact('petanis'));
    }

    public function create()
    {
        return view('petani.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:petanis',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'lokasi' => 'required',
            'luas' => 'required',
            'username' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $petani = Petani::create($request->all());

        User::create([
            'petani_id' => $petani->id,
            'name' => $petani->nama,
            'email' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'petani'
        ]);

        return redirect()->route('petani.index')->with('success', 'Data petani berhasil ditambahkan');
    }

    public function show($id)
    {
        $petani = Petani::find($id);
        return view('petani.show', compact('petani'));
    }

    public function edit($id)
    {
        $petani = Petani::find($id);
        return view('petani.edit', compact('petani'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:petanis,nik,' . $id,
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'lokasi' => 'required',
            'luas' => 'required',
            'username' => 'required|unique:users,email,' . $id . ',petani_id',
            'password' => 'nullable|min:8',
        ]);

        $petani = Petani::find($id);
        $petani->update($request->all());

        $user = User::where('petani_id', $id)->first();
        $user->update([
            'name' => $petani->nama,
            'email' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('petani.index')->with('success', 'Data petani berhasil diperbarui');
    }

    public function destroy($id)
    {
        $petani = Petani::find($id);
        $petani->delete();

        User::where('petani_id', $id)->delete();

        return redirect()->route('petani.index')->with('success', 'Data petani berhasil dihapus');
    }

    public function cetakLaporan()
    {
        $petanis = Petani::all();

        return view('petani.cetak_laporan', compact('petanis'));
    }
}
