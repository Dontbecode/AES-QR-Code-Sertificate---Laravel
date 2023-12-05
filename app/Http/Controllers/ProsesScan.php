<?php

namespace App\Http\Controllers;
use App\Models\DataSertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProsesScan extends Controller
{
  
    public function scan(){
        return view('/dashboard/Umum/Scan');
    }
    public function Dekripsi(Request $request){
        
      
        return view('/dashboard/Umum/Dekripsi');
    }
    public function validasiQrcode(Request $request)
    {
        // dd($request->Kode_Enkripsi);
        
        $qrcode = DataSertifikat::where("Kode_Enkripsi", $request->Kode_Enkripsi)->first();

        if($qrcode == null){
            return response()->json([
                "status_error" => "Data Sertifikat Tidak Terverifikasi" 
                
            ]);
            
        }

        return response()->json([
            "berhasil" => "Data Sertifikat Terverifikasi" 
        ]);

    }

    public function detaildata(Request $request){
        
        $details = $request->No_Sertifikat;
        
      
        $Event1 = DB::table('data_sertifikats')->where('No_Sertifikat', $details)->first();
        
        return view('/dashboard/Umum/Detail',compact('Event1'));
    }




}
