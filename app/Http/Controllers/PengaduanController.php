<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioCategory as Category;
use App\Models\Pengaduan;
use App\Http\Requests\PortfolioRequest;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pengaduan::all();
 
        return view('pages.pengaduan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $request->merge([
            'nik' => session()->get('nik'),
            'tgl_pengaduan' => date('Y-m-d')
        ]);
     
        $request->validate([    
            'nik'             => 'required|exists:masyarakat,nik',
            'foto'            => 'required|file',
            'isi_laporan'     => 'required',
            'tgl_pengaduan'   => 'required|date',
            'judul_pengaduan' => 'required|max:255',
        ]);

        $data = $request->all();
        $data['foto'] = time().'.'.$foto->getClientOriginalExtension();

        Pengaduan::create($data);

        $foto->move('foto_pengaduan', $data['foto']);

        return redirect()->route('pengaduan.index')->withSucceed('Success added data');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        $item = $pengaduan;

        return view('pages.pengaduan.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Pengaduan::findOrfail($id);

        return view('pages.pengaduan.edit', compact('item'));
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
            'isi_laporan'     => 'required',
            'judul_pengaduan' => 'required|max:255',
        ]);

        $data = $request->only('foto', 'isi_laporan', 'judul_pengaduan');
      
        if ($foto = $request->file('foto')) {
            $data['foto'] = time().'.'.$foto->getClientOriginalExtension();
        }
                     
        Pengaduan::find($id)->update($data);

        if ($foto = $request->file('foto')) {
            $foto->move('foto_pengaduan', $data['foto']);
        }

        return redirect()->route('pengaduan.index')->withSucceed('Data Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Portfolio::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Data deleted');
    }
}
