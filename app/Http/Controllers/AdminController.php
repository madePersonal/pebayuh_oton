<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\TaUpakara;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @return Response
     */
{
     public function pancawara(Request $request){
          $data = ['page_active' => 'pancawara'];
          return view('pages.pancawara', $data);
     }

     public function get_data_upakara_pancawara(Request $request){
          if($request->ajax()){
               $query =  DB::table('ref_wewaran')
                         ->join('ref_hari', 'ref_hari.wewaran_id', '=', 'ref_wewaran.id_wewaran')
                         ->join('ta_upakara', 'ta_upakara.hari_id', '=', 'ref_hari.id_hari')
                         ->select('id_upakara','nama_wewaran', 'nama_hari', 'pebayuh', 'sedahan_ngurah', 'genah', 'ket')
                         ->where('id_wewaran', 1)
                         ->get();
               return DataTables::of($query)->toJson();
          }
     }

     public function get_data_upakara_pancawara_by_id(Request $request, $id){
          if($request->ajax()){
               $query =  DB::table('ref_wewaran')
                         ->join('ref_hari', 'ref_hari.wewaran_id', '=', 'ref_wewaran.id_wewaran')
                         ->join('ta_upakara', 'ta_upakara.hari_id', '=', 'ref_hari.id_hari')
                         ->select('id_upakara','nama_wewaran', 'nama_hari', 'pebayuh', 'sedahan_ngurah', 'genah', 'ket')
                         ->where('id_upakara', $id)
                         ->first();

               return json_encode($query);
          }
          
     }

     public function get_data_upakara_saptawara(Request $request){
          if($request->ajax()){
               $query =  DB::table('ref_wewaran')
                         ->join('ref_hari', 'ref_hari.wewaran_id', '=', 'ref_wewaran.id_wewaran')
                         ->join('ta_upakara', 'ta_upakara.hari_id', '=', 'ref_hari.id_hari')
                         ->select('id_upakara','nama_wewaran', 'nama_hari', 'pebayuh', 'sedahan_ngurah', 'genah', 'ket')
                         ->where('id_wewaran', 2)
                         ->get();
               return DataTables::of($query)->toJson();
          }
     }

     public function add_upkara_pancawara(Request $request){
          $upakara = TaUpakara::create([
               'hari_id' => $request->input('hari'),
               'pebayuh' => $request->input('pebayauh'),
               'sedahan_ngurah' => $request->input('sedahan_ngurah'),
               'genah' => $request->input('genah'),
               'ket' => $request->input('ket'),
               'created_by' => $request->session()->get('username'),
          ]);
          return json_encode(['status'=>true, 'message'=>"data berhasil disimpan"]);
     }
}
