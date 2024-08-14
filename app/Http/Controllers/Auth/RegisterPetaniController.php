<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Petani;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterPetaniController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register_petani');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $petani = $this->createPetani($request->all());
        $this->createUser($request->all(), $petani->id);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255', 'unique:petanis'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'lokasi' => ['required', 'string', 'max:255'],
            'luas' => ['required', 'numeric', 'min:0'],
        ]);
    }

    protected function createPetani(array $data)
    {
        return Petani::create([
            'nama' => $data['nama'],
            'nik' => $data['nik'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'lokasi' => $data['lokasi'],
            'luas' => $data['luas'],
        ]);
    }

    protected function createUser(array $data, $petani_id)
    {
        return User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => 'petani',
            'petani_id' => $petani_id,
        ]);
    }
}

