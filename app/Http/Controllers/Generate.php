<?php

namespace App\Http\Controllers;
use App\Models\DataSertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Generate extends Controller
{
       
    public function generatepdf(Request $request){
        
        $details = $request->id;
        
      
        $Event1 = DB::table('data_sertifikats')->where('id', $details)->first();
        
        return view('/dashboard/Admin/layouts/Sertifikat/Sertifikat',compact('Event1'));
    }


}
