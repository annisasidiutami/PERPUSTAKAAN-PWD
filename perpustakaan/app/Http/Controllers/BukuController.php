<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
        'judul_buku' => 'required',
        'pengarang' => 'required',
        'tahun_terbit' => 'required', 
    ]);
    if ($validation->fails()) {
        $errors = $validation->errors();
        return [
            'status' => 'error',
            'message' => $errors,
            'result' => null
        ];
    }
    $result = \App\Buku::create($request->all());
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
    $result = \App\Buku::all();
    return[
        'status'=>'success',
        'message'=>'',
        'result'=>$result
    ];
}
public function update(Request $request,$id){
        $validation = Validator::make($request->all() ,[
        'judul_buku' => 'required',
        'pengarang' => 'required',
        'tahun_terbit' => 'required', 
        ]);
        if($validation->fails()){
            $errors = $validation->errors();
            return[
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }
        $buku= \App\Buku::find($id);
        if(empty($buku)){
            return[
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }
        $result =  $buku->update($request->all());
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
    $buku = \App\Buku::find($id);
    if(empty($buku)){
        return[
            'status'=>'error',
            'message'=>'Data Tidak Ditemukan',
            'result'=>null
        ];
    }
    $result = $buku->delete($id);
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
    $buku = \App\Buku::find($id);

    if(empty($buku)){
        return[
            'status'=>'error',
            'message'=>'Data tidak ditemukan',
            'result'=>null
        ];
    }
    return[
        'status'=>'success',
        'result'=> $buku
    ];
}

}
?>