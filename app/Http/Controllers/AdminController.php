<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\TaUpakara;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Response;

class AdminController extends Controller
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @return Response
     */
{
     public function pancawara(Request $request){
          $pancawara_hari = DB::table('ref_hari')->where('wewaran_id', 1)->get();
          $data = [
               'page_active' => 'pancawara', 
               'pancawara_hari' => $pancawara_hari
          ];
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
                         ->select('id_upakara','nama_wewaran', 'nama_hari', 'pebayuh', 'sedahan_ngurah', 'genah', 'ket', 'hari_id')
                         ->where('id_upakara', $id)
                         ->first();

               return response()->json($query);
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

     public function add_upkara(Request $request){
          $rules =[
               'hari' => 'required',
               'pebayuh' => 'required',
               'sedahan_ngurah' => 'required',
               'genah' => 'required',
          ];
          $messages = [
               'hari.required' => 'Hari tidak boleh kosong',
               'pebayuh.required' => 'Pebayuh tidak boleh kosong',
               'sedahan_ngurah.required' => 'sedahan ngurah tidak boleh kosong',
               'genah.required' => 'genah tidak boleh kosong',
          ];
          $validator = Validator::make($request->all(), $rules, $messages);
          if ($validator->fails()) {
               return response()->json(['status'=>false, 'message'=>$validator->errors()]);
          }else{
               $upakara = new TaUpakara;
               $upakara->hari_id = $request->input('hari');
               $upakara->pebayuh = $request->input('pebayuh');
               $upakara->sedahan_ngurah = $request->input('sedahan_ngurah');
               $upakara->genah = $request->input('genah');
               $upakara->ket = $request->input('ket');
               $upakara->created_by = $request->session()->get('username');
               $upakara->save();
               return response()->json(['status'=>true, 'message'=>"data berhasil disimpan"]);
          }
     }
     
     public function update_upkara(Request $request){
          $upakara = TaUpakara::find($request->input('id_upakara'));
          $upakara->hari_id = $request->input('hari');
          $upakara->pebayuh = $request->input('pebayuh');
          $upakara->sedahan_ngurah = $request->input('sedahan_ngurah');
          $upakara->genah = $request->input('genah');
          $upakara->ket = $request->input('ket');
          // $upakara = TaUpakara::where('id_upakara', $request->input('id_upakara'))
          // ->update([
          //      'hari_id' => $request->input('hari'),
          //      'pebayuh' => $request->input('pebayauh'),
          //      'sedahan_ngurah' => $request->input('sedahan_ngurah'),
          //      'genah' => $request->input('genah'),
          //      'ket' => $request->input('ket'),
          // ]);
          $upakara->save();
          // return response()->json(['status'=>true, 'message'=>$request->all()]);
          if($upakara->wasChanged()){
               return response()->json(['status'=>true, 'message'=>"data berhasil disimpan"]);
          }
     }
}
