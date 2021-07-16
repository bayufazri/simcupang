<?php

namespace App\Http\Controllers;

use App\Penjual;
use Illuminate\Http\Request;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjual = Penjual::latest()->paginate(5);
  
        return view('penjual.index',compact('penjual'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('penjual.create');
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
            'jk' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
  
        Penjual::create($request->all());
   
        return redirect()->route('penjual.index')
                        ->with('success','Penjual berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function show(Penjual $penjual)
    {
         return view('penjual.show',compact('penjual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjual $penjual)
    {
        return view('penjual.edit',compact('penjual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjual $penjual)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
  
        $penjual->update($request->all());
  
        return redirect()->route('penjual.index')
                        ->with('success','Penjual Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjual $penjual)
    {
        $penjual->delete();
  
        return redirect()->route('penjual.index')
                        ->with('success','Penjual Berhasil dihapus');
    }
}
