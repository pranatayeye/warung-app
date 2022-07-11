<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;

use function PHPUnit\Framework\isNull;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table 
        $stocks = DB::table('stock')->orderByDesc('updated_at')->paginate(5);

        // mengirim data ke view stock
        return view('stock', [
            'stocks' => $stocks,
            'title' => 'Stok'
        ]);
    }

    public function search (Request $request){
        // menangkap data pencarian
        $cari = $request->search;
        // dd($cari);
        
        // mengambil data dari table sesuai pencarian data
        $stocks = DB::table('stock')
        ->where('id','like',"%".$cari."%")
        ->orWhere('nama_stok','like',"%".$cari."%")
        ->orWhere('harga','like',"%".$cari."%")
        ->orWhere('created_at','like',"%".$cari."%")
        ->orWhere('updated_at','like',"%".$cari."%")
        ->orderByDesc('updated_at')
        ->paginate(5);

        // mengirim data ke view stock
        return view('stock', [
            'stocks' => $stocks,
            'title' => 'Stok'
        ]);
    }

    public function generateId($k, $n){
        // menggabungkan value kategori yang diambil dengan no urutan 
        $k = $k . $n ;
        // mencari data dari table
        $result = Stock::find($k);

        // jika hasil pencarian tidak ada
        if ($result == null) {
            // mengirim data 
            return $k;
        // jika hasil pencarian ada
        } if ($result != null) {
            // memecah kembali value kategori dengan no urutan
            $k = substr($k,0,3);
            // menaikan no urutan
            $n++;
            // mengirim data kembali ke fungsi ini
            return $this->generateId($k, $n);
        } else {
            return 'salah';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menangkap data stok baru
        $this->validate($request,[
    		'nama_stok' => 'required',
    		'harga' => 'required',
            'jumlah' => 'required',
            'kategori' => 'required'  
    	]);
        
        // mengambil data kategori
        $k = $request->kategori;
        // menginisiasi no urutan
        $n = 1;
        // membuat id
        $result = $this->generateId($k, $n);
        
        // mengirim data ke model stock
        Stock::create([
            'id' => $result,
    		'nama_stok' => ucwords($request->nama_stok),
    		'harga' => $request->harga,
            'sisa_stok' => $request->jumlah
    	]);
        
        // menampilkan halaman view stok
    	return redirect('/stok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // menangkap data stok baru
        $this->validate($request,[
    		'nama_stok' => 'required',
    		'harga' => 'required',
            'jumlah' => 'required'
    	]);

        // mencari id
        $stock = Stock::find($id);
        
        // megupdate data stok berdasarkan id
        $stock->nama_stok = $request->nama_stok;
        $stock->harga = $request->harga;
        $stock->sisa_stok = $request->jumlah;
        $stock->save();

        // menampilkan halaman view stok
    	return redirect('/stok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stok = Stock::find($id);
        $stok->delete();

        return redirect('/stok');
    }
}
