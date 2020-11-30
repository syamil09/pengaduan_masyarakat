<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;
use App\Models\Petugas;

class AuthController extends Controller
{
    public function loginMasyarakat()
    {
    	return view('auth.login_masyarakat');
    }

    public function loginPetugas()
    {
        return view('auth.login_petugas');
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
    		'username' => 'required',
    		'password' => 'required',
            'type' => 'required'
    	], ['required' => 'Kolom :attribute harus diisi.']);

        $type = $request->type;

    	// Check type login only then check exists by username or nik
    	$checkExists =  $type == 'masyarakat'
                        ? Masyarakat::whereNik($request->username)->orWhere('username', $request->username)->first()
                        : ( $type == 'petugas' 
                        ? Petugas::whereUsername($request->username)->first() 
                        : '' );
    
    	if ($checkExists) {
    		// check password match or not
    		if (Hash::check($request->password, $checkExists['password'])) {
    			// set session
    			$request->session()->put('level', $type == 'masyarakat' ? $type : $checkExists['level']);
    			$request->session()->put('nama', $checkExists['nama']);
    			$request->session()->put('user_id', $type == 'masyarakat' ? $checkExists['nik'] : $checkExists['id']);
    			$request->session()->put('username', $checkExists['username']);

                $route = $type == 'masyarakat' ? 'pengaduan.index' : 'home-dashboard';

    			return redirect()->route($route)->withSucceed('Login Berhasil. '. $checkExists['nama']);
    		}
    	}

        $route = $type == 'masyarakat' ? 'login-masyarakat' : 'login-petugas';

    	return redirect()->route($route)->withFailed('Gagal Login, Nik / Username atau Password salah.');
    }

    public function showProfile($id)
    {
        $type = session()->get('level');

        $item = $type == 'masyarakat'
                ? Masyarakat::whereNik($id)->first()
                : Petugas::findOrFail($id);

        return view('auth.profile', compact('item'));
    }

    public function updateProfile(Request $request, $id)
    {
        $type = session()->get('level');

        $data = $request->only('nama', 'username', 'password', 'telpon');

        if (!$pw = $request->password) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($pw);
        }

        $update = $type == 'masyarakat'
                  ? Masyarakat::whereNik($id)
                  : Petugas::find($id);
        $update->update($data);

        $request->session()->put('username', $checkExists['username']);

        return redirect()->route('profile.show', $id)->withSucceed('Berhasil update profile'); 

    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }

}
