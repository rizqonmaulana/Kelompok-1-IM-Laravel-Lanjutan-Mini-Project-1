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
 		return 'coba gan';
 	}
}
