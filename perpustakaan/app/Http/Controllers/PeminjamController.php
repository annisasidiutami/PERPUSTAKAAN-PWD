<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
        'nama_peminjam' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'judul_buku' => 'required', 
    ]);
    if ($validation->fails()) {
        $errors = $validation->errors();
        return [
            'status' => 'error',
            'message' => $errors,
            'result' => null
        ];
    }
    $result = \App\Peminjam::create($request->all());
    if ($result) {
        return [
            'status' => 'success',
            'message' => 'Data Berhasil ditambahkan',
            'result' => $result
        ];
    }
    else {
        return [
            'status' => 'error',
            'message' => 'Data Gagal ditambahkan',
            'result' => null
        ];
    }
}
public function read(Request $request){
    $result = \App\Peminjam::all();
    return[
        'status'=>'success',
        'message'=>'',
        'result'=>$result
    ];
}
public function update(Request $request,$id){
        $validation = Validator::make($request->all() ,[
            'nama_peminjam' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'judul_buku' => 'required',  
        ]);
        if($validation->fails()){
            $errors = $validation->errors();
            return[
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }
        $peminjam= \App\Peminjam::find($id);
        if(empty($peminjam)){
            return[
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }
        $result =  $peminjam->update($request->all());
        if($result){
            return[
                'status' => 'success',
                'message' => 'Data Berhasil Diubah',
                'result' => $result
            ];
        }else{
            return[
                'status' => 'error',
                'message' => 'Data gagal Diubah',
                'result' => null
            ];
        }
}
public function delete(Request $request,$id){
    $peminjam = \App\Peminjam::find($id);
    if(empty($peminjam)){
        return[
            'status'=>'error',
            'message'=>'Data Tidak Ditemukan',
            'result'=>null
        ];
    }
    $result = $peminjam->delete($id);
    if($result){
        return[
            'status'=>'success',
            'message'=>'Data Berhasil Dihapus',
            'result'=>$result
        ];
    }else{
        return[
            'status'=>'error',
            'message'=>'Data gagal Dihapus',
            'result'=>null
        ];
    }
}
public function detail($id) {
    $peminjam = \App\Peminjam::find($id);

    if(empty($peminjam)){
        return[
            'status'=>'error',
            'message'=>'Data tidak ditemukan',
            'result'=>null
        ];
    }
    return[
        'status'=>'success',
        'result'=> $peminjam
    ];
}
}
?>