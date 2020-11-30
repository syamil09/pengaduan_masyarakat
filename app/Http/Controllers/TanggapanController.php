<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $items = $category->all();
        $itemEdit = false;
        return view('pages.portfolio_category.index', compact('items', 'itemEdit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPengaduan)
    {
        $item = Pengaduan::findOrFail($idPengaduan);

        return view('pages.tanggapan.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggapan' => 'required'
        ]);

        $request->merge([
            'tgl_tanggapan' => date('Y-m-d'),
            'id_petugas'    => 4 
        ]);

        $data = $request->only('tanggapan', 'tgl_tanggapan', 'id_petugas', 'id_pengaduan');

        Tanggapan::create($data);

        return redirect()->route('tanggapan.show',$data['id_pengaduan'])
                        ->withSucceed('Berhasil Menambahkan Tanggapan');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Tanggapan::with('petugas')->whereIdPengaduan($id)->get();
        $pengaduan = Pengaduan::findOrFail($id);
        
        return view('pages.tanggapan.index', compact('items', 'pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Tanggapan::find($id) ?? '';

        return view('pages.tanggapan.create', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([    
            'nama'     => 'required',
            'username' => 'required|unique:petugas',
            'telpon' => 'string',
            'level' => 'required|in:petugas,admin'
        ]);

        // $data = $request->only('foto', 'isi_laporan', 'judul_pengaduan');
                     
        Pengaduan::find($id)->update($request->all());

        return redirect()->route('pengaduan.index')->withSucceed('Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggapan $tanggapan)
    {
        $tanggapan->delete();

        return redirect()->back()->withSucceed('Berhasil Menghapus Tanggapan');
    }
}
