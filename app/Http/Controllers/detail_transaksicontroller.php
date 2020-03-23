<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\detail_transaksi_model;
use App\jenis_cuci_model;
use JWTAuth;
use DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class detail_transaksicontroller extends Controller
{
     public function store(Request $req){
          if(Auth::user()->level=="petugas"){

        $validator=Validator::make($req->all(),
        [
            'id_transaksi'=>'required',
            'id_jenis'=>'required',
            'qty'=>'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $id_jenis=$req->id_jenis;
            $harga=DB::table('jenis_cuci')->where('id',$id_jenis)->first();
            $harga_total=$harga->harga_per_kg;
            $subtotal=$harga_total*$req->qty;

        $simpan=detail_transaksi_model::create([
            'id_transaksi'=>$req->id_transaksi,
            'id_jenis'=>$req->id_jenis,
            'qty'=>$req->qty,
            'subtotal'=>$subtotal
        ]);
        $status=1;
        $message="Data Berhasil Ditambahkan!";
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
          }
     }
    public function tampil_detail()
    {
        $data_pelanggan=detail_transaksi_model::count();
        $data_pelanggan1=detail_transaksi_model::all();
        return Response()->json(['count'=> $data_pelanggan, 'pelanggan'=> $data_pelanggan1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_transaksi'=>'required',
            'id_jenis'=>'required',
            'qty'=>'required',
            'subtotal'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah=detail_transaksi_model::where('id',$id)->update([
            'id_transaksi'=>$req->id_transaksi,
            'id_jenis'=>$req->id_jenis,
            'qty'=>$req->qty,
            'subtotal'=>$req->subtotal
        ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=detail_transaksi_model::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}