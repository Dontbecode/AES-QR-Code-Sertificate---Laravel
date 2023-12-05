<?php

namespace App\Http\Controllers;
use App\Models\DataSertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Datasertifikats extends Controller
{

    public function index(Request $request)
    {
        
        

        if($request->has('search')){
            $dtcetak = DataSertifikat::where('No_Sertifikat','like','%' .$request->search.'%')
            ->orWhere('No_peserta','like','%' .$request->search.'%')
            ->orWhere('Nama_peserta','like','%' .$request->search.'%')->paginate(10);
        
        
            

            
        } else{
            $dtcetak = DataSertifikat::paginate(10);
            
        }
        return view('/dashboard/Admin/layouts/Datasertifikat/datasertifikat',compact('dtcetak'));
    }




    public function updateenkrip(Request $request, $id)
    {
        // $dt = CetakSertifikat::where("id_absensi", 'like',"%" .$request->id."%");
        $dt = DB::table('data_sertifikats')->where('id_sertifikat', $id)->first();
       
        if($dt == null){
            $data = $request->all();
            $dtcetak =  new DataSertifikat;
            $dtcetak->No_Sertifikat = $data['No_Sertifikat'];
            $dtcetak->id_sertifikat = $data['id'];
            $dtcetak->No_peserta = $data['No_peserta'];
            $dtcetak->NIM = $data['NIM'];
            $dtcetak->Nama_mhs = $data['Nama_mhs'];
            $dtcetak->Kode_Enkripsi = $data['Kode_Enkripsi'];
            $dtcetak->J_Kelamin = $data['J_Kelamin'];
            $dtcetak->ProgramStudi = $data['ProgramStudi'];
            $dtcetak->Angkatan = $data['Angkatan'];
            $dtcetak->No_tlpn = $data['No_tlpn'];
            $dtcetak->email = $data['email'];
            $dtcetak->tanggal = $data['tanggal'];
            $dtcetak->Listening = $data['Listening'];
            $dtcetak->Structure = $data['Structure'];
            $dtcetak->Reading = $data['Reading'];
            $dtcetak->Total = $data['Total'];
    
       
            $dtcetak->save();
        }else {

            // dd($dt->id);
          
        $dtcetak = DataSertifikat::find($dt->id);
       
     
        $dtcetak->update($request->all());
        }
        
        return redirect('/DataNilai')->with('success', 'Data Nilai Telah Berhasil Di Update');
        
    }

    
    public function detail(Request $request){
        
        $details = $request->id;
        
      
        $Event1 = DB::table('data_sertifikats')->where('id', $details)->first();
        
        return view('/dashboard/Admin/layouts/Datasertifikat/Detail',compact('Event1'));
    }




    public function destroy(string $id)
    {
        $dtsertifikat = DataSertifikat::find($id);
        $dtsertifikat->delete();
        return redirect('/DataSertifikat')->with('success', 'Data Sertifikat Telah Berhasil Di Hapus');
    }



}
