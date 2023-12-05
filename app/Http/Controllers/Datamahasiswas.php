<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\datamahasiswa;
use App\Models\Datanilai;
use Illuminate\Support\Facades\DB;
class Datamahasiswas extends Controller
{

    public function Tambahmahasiswa(){

       

        $cek = datamahasiswa::count();
        if ($cek == 0) {
            $urut = 1001;
            $nomor = $urut;

        } else {
            $ambil = datamahasiswa::all()->last();
            $urut = (int)substr($ambil->No_peserta, -4) + 1;
            $nomor =  $urut; 
        }

        return view('dashboard.Admin.layouts.DataMahasiswa.TambahMahasiswa',compact('nomor'));
    }


    public function index(Request $request)
    {
        



        $dtmahasiswa = datamahasiswa::latest();

        if($request->has('search')){
            $dtmahasiswa = datamahasiswa::where('No_peserta','like','%' .$request->search.'%')
            ->orWhere('NIM','like','%' .$request->search.'%')
            ->orWhere('Nama_mhs','like','%' .$request->search.'%')
            ->orWhere('J_Kelamin','like','%' .$request->search.'%')
            ->orWhere('ProgramStudi','like','%' .$request->search.'%')
            ->orWhere('Angkatan','like','%' .$request->search.'%')
            ->orWhere('No_tlpn','like','%' .$request->search.'%')
            ->orWhere('email','like','%' .$request->search.'%')->paginate(10);

            
        }else{
            $dtmahasiswa = datamahasiswa::paginate(10);
            
        }
      
        return view('dashboard.Admin.layouts.DataMahasiswa.datamahasiswa',compact('dtmahasiswa'));
    }


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'No_peserta' => 'required|max:10|unique:datamahasiswas',
            'NIM' => 'required|numeric|digits_between:3,20',
            'Nama_mhs' => 'required|regex:/^[A-Za-z\s]+$/|min:3|max:255',
            'J_Kelamin'   => 'required|min:3|max:255',
            'ProgramStudi'   => 'required|min:3|max:255',
            'Angkatan'   => 'required|min:3|max:255',
            'No_tlpn' => 'required|numeric|digits_between:11,13',
            'email' => 'required|email:dns|unique:datamahasiswas',
        ],[
            'Nama_mhs.regex' => 'Kolom Nama Mahasiswa hanya boleh berisi huruf.',
            'Nama_mhs.min' => 'Kolom Nama Mahasiswa minimal tiga huruf.',
            'NIM.numeric' => 'Kolom NIM hanya boleh berisi angka.',
            'NIM.digits_between' => 'NIM harus terdiri dari 3 hingga 20 digit.',
            'No_tlpn.numeric' => 'Kolom No Telepon hanya boleh berisi angka.',
            'No_tlpn.digits_between' => 'Nomor telepon harus terdiri dari 11 hingga 13 digit.',
        ]);
       
        datamahasiswa::create($validateData);

            $data = $request->all();
            $dtnilai =  new Datanilai;
            $dtnilai->No_peserta = $data['No_peserta'];
            $dtnilai->NIM = $data['NIM'];
            $dtnilai->Nama_mhs = $data['Nama_mhs'];
            $dtnilai->J_Kelamin = $data['J_Kelamin'];
            $dtnilai->ProgramStudi = $data['ProgramStudi'];
            $dtnilai->Angkatan = $data['Angkatan'];
            $dtnilai->No_tlpn = $data['No_tlpn'];
            $dtnilai->email = $data['email'];
            $dtnilai->save();
        
 
        return redirect('/DataMahasiswa')->with('success', 'Data Mahasiswa Telah Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         

        $dtmahasiswa = datamahasiswa::find($id);
        return view('dashboard/Admin/layouts/DataMahasiswa/EditMahasiswa',compact('dtmahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $dtmahasiswa = $request->validate([
           
 
            'NIM' => 'required|numeric|digits_between:3,20',
            'Nama_mhs' => 'required|regex:/^[A-Za-z\s]+$/|min:3|max:255',
            'J_Kelamin'   => 'required|min:3|max:255',
            'ProgramStudi'   => 'required|min:3|max:255',
            'Angkatan'   => 'required|min:3|max:255',
            'No_tlpn' => 'required|numeric|digits_between:11,13',
       
        ],[
            'Nama_mhs.regex' => 'Kolom Nama Mahasiswa hanya boleh berisi huruf.',
            'Nama_mhs.min' => 'Kolom Nama Mahasiswa minimal tiga huruf.',
            'NIM.numeric' => 'Kolom NIM hanya boleh berisi angka.',
            'NIM.digits_between' => 'NIM harus terdiri dari 3 hingga 20 digit.',
            'No_tlpn.numeric' => 'Kolom No Telepon hanya boleh berisi angka.',
            'No_tlpn.digits_between' => 'Nomor telepon harus terdiri dari 11 hingga 13 digit.',
        ]);
        
        $dt = DB::table('datanilais')->where('id', $id)->first();
        $dtcetak = Datanilai::find($dt->id);
        $dtcetak->update($request->all());

        $dtmahasiswa = datamahasiswa::find($id);
        $dtmahasiswa->update($request->all());

        return redirect('/DataMahasiswa')->with('success', 'Data Mahasiswa Telah Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dtmahasiswa = datamahasiswa::find($id);
        $dtmahasiswa->delete();
        return redirect('/DataMahasiswa')->with('success', 'Data Mahasiswa Telah Berhasil Di Hapus');
    }
}
