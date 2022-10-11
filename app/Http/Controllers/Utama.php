<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Barang;
use Illuminate\Support\Facades\DB;

class Utama extends Controller
{
    public function index(){
        $barang = DB::table('tbl_barang')->get();
        return view('utama', ['barang' => $barang]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'file' => 'required|max: 2048'
        ]);

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = $file->storeAs('public/data_file', $nama_file);
        if($file->move($tujuan_upload, $nama_file)){
            $data = M_Barang::create([
                'nama_produk' => $request -> nama_produk,
                'harga' => $request -> harga,
                'gambar' => $nama_file
            ]);
            $res['message'] = "Success!";
            $res['value'] = $data;
            return response($res);
        }
    }

    public function getData(){
        $data = DB::table('tbl_barang')->get();
        if(count($data) > 0){
            $res['message'] = "Success";
            $res['value'] = $data;
            return response($res);
        }else{
            $res['message'] = "Empty";
            return response($res);
        }
    }

    public function contact(){
        return view('contact');
    }
}
