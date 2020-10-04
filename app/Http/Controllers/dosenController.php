<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dosenController extends Controller
{
    public function store(Request $request){
        $dosen = DB::table('dosen')->insert([
            [
                'id' => request('id'),
                'nip' => request('nip'),
                'nama' => request('nama'),
            ],
        ]);

        return response('Data berhasil di insert');
    }

    public function update(Request $request){
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required'
        ]);

        $dosen = DB::table('dosen')-> where('id', $request -> id) -> update([
            'nip' => $request-> nip,
            'nama' => $request-> namacls
        ]);

        return response('Data berhasil di update');
    }
}
