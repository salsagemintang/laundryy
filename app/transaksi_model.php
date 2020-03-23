<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_model extends Model
{
    protected $table = "transaksi";
    protected $primarKey = "id";
    protected $fillable = ['id_pelanggan', 'id_petugas', 'tgl_transaksi' , 'tgl_selesai'];
    
    public function pelanggan_model(){
        return $this->belongsTo('App\pelanggan_model', 'id_pelanggan');
    }
    public function petugas_model(){
        return $this->belongsTo('App\petugas_model', 'id_petugas');

    }
    
    public $timestamps = false;
}
