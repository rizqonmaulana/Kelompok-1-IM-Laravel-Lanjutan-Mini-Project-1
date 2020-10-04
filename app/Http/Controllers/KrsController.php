<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KrsController extends Controller
{
 	public function store(Request $request){
 		$krs = DB::table('krs')->insert([
				    [
				    	'id' => request('id'),
				    	'nim' => request('nim'), 
				    	'kode_mata_kuliah' => request('kode_mata_kuliah'),
				    ],
				]);
 		return response('Data Berhasil Di Tambahkan');
 	}

 	public function get(){
 		return 'coba test';
 	}

 	public function all(){
 		$allKrs = DB::table('krs')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'krs.nim')
            ->join('mata_kuliah', 'krs.kode_mata_kuliah', '=', 'mata_kuliah.kode_mata_kuliah')
            ->join('dosen','mata_kuliah.nip_dosen','=','dosen.nip')
            ->select('mahasiswa.nim AS Nim','mahasiswa.name AS Nama Mahasiswa','mata_kuliah.kode_mata_kuliah AS Kode Mata Kuliah','mata_kuliah.nama_mata_kuliah AS Nama Mata Kuliah','dosen.nip AS Kode Dosen Pengajar','dosen.nama AS Nama Dosen Pengajar')
            ->get();

        return response($allKrs);
 	}

 	public function detail($nim){

 		$detailKrs = DB::table('krs')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'krs.nim')
            ->join('mata_kuliah', 'krs.kode_mata_kuliah', '=', 'mata_kuliah.kode_mata_kuliah')
            ->join('dosen','mata_kuliah.nip_dosen','=','dosen.nip')
            ->select('mahasiswa.nim AS Nim','mahasiswa.name AS Nama Mahasiswa','mata_kuliah.kode_mata_kuliah AS Kode Mata Kuliah','mata_kuliah.nama_mata_kuliah AS Nama Mata Kuliah','dosen.nip AS Kode Dosen Pengajar','dosen.nama AS Nama Dosen Pengajar')
            ->where('krs.nim',$nim)
            ->get();

        return response($detailKrs);
 	}
}
