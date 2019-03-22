<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Peminjam extends Model
{
    public $table = 'peminjam';
    public $timestamps = false;
    protected $fillable = [
        'nama_peminjam','alamat','no_hp','judul_buku'
    ];
}
?>