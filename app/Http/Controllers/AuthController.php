<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;

class AuthController extends Controller
{
    public function loginMasyarakat()
    {
    	return view('auth.login_masyarakat');
    }

    public function registerMasyarakat()
    {
    	return view('auth.register_masyarakat');
    }

    public function registerProses(Request $request)
    {
    	// validate input value
    	$this->validate($request, [
    		'nik' => 'required|string|size:16|unique:Masyarakat',
    		'nama' => 'required|string|max:40',
    		'username' => 'required|max:25|unique:masyarakat',
    		'password' => 'required|max:30',
    		'telpon' => 'required|max:20'
    	],
    	[
    		'required' => 'Kolom :attribute harus diisi.',
    		'size' => 'Jumlah karakter :attribute harus :size digit.',
    		'unique' => ':attribute harus unik, :attribute tersebut sudah digunakan',
    		'max' => 'Maksimal jumlah karakter :max digit.',

    	]);

    	$data = $request->all();
    	$data['password'] = Hash::make($data['password']); /* Hash Password */

    	Masyarakat::create($data);

    	return redirect()->route('login-masyarakat')->withSucceed('Register Berhasil.');
    }

    public function loginProses(Request $request)
    {
    	// validate input value
    	$this->validate($request, [
    		'nik' => 'required',
    		'password' => 'required'
    	], ['requried' => 'Kolom :attribute harus diisi.']);

    	// Check user exists by nik or username
    	$checkExists = Masyarakat::whereNik($request->nik)->orWhere('username', $request->nik)->first();

    	if ($checkExists) {

    		// check password match or not
    		if (Hash::check($request->password, $checkExists['password'])) {
    			// set session
    			$request->session()->put('level', 'masyarakat');
    			$request->session()->put('nama', $checkExists['nama']);
    			$request->session()->put('user_id', $checkExists['nik']);
    			$request->session()->put('username', $checkExists['username']);

    			return redirect()->route('login-masyarakat')->withSucceed('Login Berhasil. '. $checkExists['nama']);
    		}
    	}

    	return redirect()->route('login-masyarakat')->withFailed('Gagal Login, Nik / Username atau Password salah.');
    }
}
