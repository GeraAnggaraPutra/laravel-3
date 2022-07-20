<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan semua data dari model Siswa
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'tanggal_pembelian' => 'required',
            'nama_barang' => 'required',
            'harga_satuan' => 'required',
            'jumlah_barang' => 'required',
            'total_harga' => 'required',
        ]);

        $barang = new Barang();
        $barang->nama_pembeli = $request->nama_pembeli;
        $barang->tanggal_pembelian = $request->tanggal_pembelian;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_satuan = $request->harga_satuan;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->total_harga = $request->total_harga;
        $barang->save();
        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
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
        // Validasi
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'tanggal_pembelian' => 'required',
            'nama_barang' => 'required',
            'harga_satuan' => 'required',
            'jumlah_barang' => 'required',
            'total_harga' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->nama_pembeli = $request->nama_pembeli;
        $barang->tanggal_pembelian = $request->tanggal_pembelian;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_satuan = $request->harga_satuan;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->total_harga = $request->total_harga;
        $barang->save();
        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
