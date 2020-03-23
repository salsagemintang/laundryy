<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan_model extends Model
{
  protected $table="pelanggan";
  protected $primaryKey="id";
  public $timestamps= false;
  protected $fillable = [
    'nama', 'alamat', 'telp'
  ];
}