<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landingFrontend()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $item = [
            'jumlah_pengaduan' => Pengaduan::count(),
            'jumlah_pengaduan_selesai' => Pengaduan::whereStatus('selesai')->count()
        ];

        return view('pages.dashboard', compact('item'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
