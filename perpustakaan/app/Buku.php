<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Buku extends Model
{
    public $table = 'buku';
    public $timestamps = false;
    protected $fillable = [
        'judul_buku','pengarang','tahun_terbit'
    ];
}
?>