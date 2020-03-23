<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_transaksi_model extends Model
{
    protected $table="detail_transaksi";
  protected $primaryKey="id";
  public $timestamps= false;
  protected $fillable = [
    'id_transaksi' , 'id_jenis' , 'qty' , 'subtotal'
  ];

  public function jenis_cuci_model(){
        return $this->belongsTo('App\jenis_cuci_model', 'id_jenis');
    }
    public function transaksi_model(){
        return $this->belongsTo('App\transaksiodel', 'id_transaksi');

    }
}
