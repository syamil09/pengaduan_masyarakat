<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Petugas::all();
        // return $items;
        return view('pages.petugas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate input value
        $this->validate($request, [
            'nama' => 'required|string|max:40',
            'username' => 'required|max:25|unique:petugas',
            'password' => 'required|max:30',
            'telpon' => 'required|max:20',
            'level' => 'required|in:admin,petugas'
        ],
        [
            'required' => 'Kolom :attribute harus diisi.',
            'size' => 'Jumlah karakter :attribute harus :size digit.',
            'unique' => ':attribute harus unik, :attribute tersebut sudah digunakan',
            'max' => 'Maksimal jumlah karakter :max digit.',

        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']); /* Hash Password */

        Petugas::create($data);

        return redirect()->route('petugas.index')->withSucceed('Berhasil menambah data petugas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Petugas::findOrFail($id);
        // return $item;
        return view('pages.petugas.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([    
            'nama'     => 'required',
            'username' => 'required|max:255',
            'telpon' => 'required',
            'level' => 'required|in:admin,petugas'
        ]);

        $data = $request->all();
      
        if (!$pw = $request->password) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($pw);
        }
                     
        Petugas::find($id)->update($data);

        return redirect()->route('petugas.index')->withSucceed('Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::find($id)->delete();

        return redirect()->route('petugas.index')->withSucceed('Data Petugas Deleted');
    }
}
