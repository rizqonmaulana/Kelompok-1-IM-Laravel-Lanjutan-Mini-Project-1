<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class matakuliahController extends Controller
{
    public function store(Request $request){

            $mataKuliah = DB::table('mata_kuliah')->insert([
                    [
                       'id' => request('id'),
                       'kode_mata_kuliah' => request('kode_mata_kuliah'),
                       'sks' => request('sks'),
                   ],
            ]);

            return response('Data Berhasil Di Tambahkan');
    }

    public function update(Request $request){

        $this->validate($request, [
            'kode' => 'required',
            'name' => 'required',
            'sks' => 'required',

        ]);

        $matakuliah = DB::table('mata_kuliah')->where('id', $request -> id) -> update([
            'kode_mata_kuliah' => $request-> kode,
            'nama_mata_kuliah' => $request-> name,
            'sks' => $request -> sks
        ]);

        return response('Data Berhasil Di update');
    }
}
