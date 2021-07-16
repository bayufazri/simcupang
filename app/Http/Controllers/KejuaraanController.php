<?php

namespace App\Http\Controllers;

use App\Kejuaraan;
use App\Jenis;
use App\Koleksi;
use Illuminate\Http\Request;

class KejuaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $koleksi = Koleksi::all();
        $jenis = Jenis::all();
        $kejuaraan = Kejuaraan::latest()->paginate(5);
        return view('kejuaraan.index',compact('kejuaraan','jenis','koleksi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $koleksi = Koleksi::all();
        $jenis = Jenis::all();
        return view('kejuaraan.create',compact('jenis','koleksi'));
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
            'id_koleksi' => 'required',
            'nama_kontes' => 'required',
            'penyelenggara' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgName = $request->foto->getClientOriginalName();
        $request->foto->move(public_path('assets/img'), $imgName);

        Kejuaraan::create([
            'id_koleksi' => $request->id_koleksi,
            'nama_kontes' => $request->nama_kontes,
            'penyelenggara' => $request->penyelenggara,
            'keterangan' => $request->keterangan,
            'foto' => $imgName,
        ]);

        return redirect()->route('kejuaraan.index')
        ->with('success','Kejuaraan baru berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kejuaraan $kejuaraan)
    {
        return view('kejuaraan.show',compact('kejuaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kejuaraan $kejuaraan)
    {
        $koleksi = Koleksi::all();
        $jenis = Jenis::all();
        return view('kejuaraan.edit',compact('kejuaraan','jenis','koleksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kejuaraan $kejuaraan)
    {
        $kejuaraan->id_koleksi = $request->id_koleksi;
        $kejuaraan->nama_kontes = $request->nama_kontes;
        $kejuaraan->penyelenggara = $request->penyelenggara;
        $kejuaraan->keterangan = $request->keterangan;

        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = $foto->getClientOriginalName();
            $foto->move(public_path('assets/img'), $filename);
            $kejuaraan->foto = $request->file('foto')->getClientOriginalName();
        }

        $kejuaraan->save();
        return redirect()->route('kejuaraan.index')
        ->with('success','Kejuaraan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kejuaraan $kejuaraan)
    {
        $kejuaraan->delete();

        return redirect()->route('kejuaraan.index')
        ->with('success','Kejuaraan berhasil di hapus');
    }
}
