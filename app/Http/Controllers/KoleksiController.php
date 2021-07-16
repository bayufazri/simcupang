<?php

namespace App\Http\Controllers;

use App\Koleksi;
use App\Jenis;
use App\Penjual;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::all();
        $penjual = Penjual::all();
        $koleksi = Koleksi::latest()->paginate(5);
        return view('koleksi.index',compact('koleksi','jenis','penjual'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penjual = Penjual::all();
        $jenis = Jenis::all();
        return view('koleksi.create',compact('jenis','penjual'));
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
            'nama' => 'required',
            'id_jenis' => 'required',
            'harga_beli' => 'required',
            'id_penjual' => 'required',
            'tanggal_beli' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
        ]);

        $imgName = $request->foto->getClientOriginalName();
        $request->foto->move(public_path('assets/img'), $imgName);

        Koleksi::create([
            'nama' => $request->nama,
            'id_jenis' => $request->id_jenis,
            'harga_beli' => $request->harga_beli,
            'id_penjual' => $request->id_penjual,
            'tanggal_beli' => $request->tanggal_beli,
            'foto' => $imgName,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('koleksi.index')
        ->with('success','Cupang baru berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function show(Koleksi $koleksi)
    {
        return view('koleksi.show',compact('koleksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Koleksi $koleksi)
    {
        $penjual = Penjual::all();
        $jenis = Jenis::all();
        return view('koleksi.edit',compact('koleksi','jenis','penjual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Koleksi $koleksi)
    {

        $koleksi->nama = $request->nama;
        $koleksi->id_jenis = $request->id_jenis;
        $koleksi->harga_beli = $request->harga_beli;
        $koleksi->id_penjual = $request->id_penjual;
        $koleksi->tanggal_beli = $request->tanggal_beli;

        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = $foto->getClientOriginalName();
            $foto->move(public_path('assets/img'), $filename);
            $koleksi->foto = $request->file('foto')->getClientOriginalName();
        }

        $koleksi->keterangan = $request->keterangan;
        $koleksi->save();
        return redirect()->route('koleksi.index')
        ->with('success','Cupang berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koleksi $koleksi)
    {
        $koleksi->delete();

        return redirect()->route('koleksi.index')
        ->with('success','Cupang berhasil di hapus');
    }
}
