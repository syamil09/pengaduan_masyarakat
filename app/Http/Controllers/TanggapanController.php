<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;

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
    public function create()
    {
        $itemEdit = false;
        return redirect()->route('portfolio-category.index');
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
            'name' => 'required'
        ]);

        $data = $request->all();
        if (Category::create($data)) {
            return redirect()->back()->with('success', 'Success add category');
        }
            return redirect()->back()->with('fail', 'Failed add category');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Tanggapan::whereIdPengaduan($id)->get();

        return view('pages.tanggapan.index', compact('items'));
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

        return view('pages.pengaduan.tanggapan', compact('item'));
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
    public function destroy($id)
    {
        $item = Category::findOrFail($id);

        if ($item->delete()) {
            return redirect()->back()->with('success', 'Success deleted data');
        }
        return redirect()->back()->with('fail', 'Failed deleted data');
    }
}
