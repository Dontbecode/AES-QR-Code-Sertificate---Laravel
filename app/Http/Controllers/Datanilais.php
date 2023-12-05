<?php

namespace App\Http\Controllers;
use App\Models\Datanilai;
use App\Models\DataSertifikat;
use Illuminate\Http\Request;

class Datanilais extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dtnilai = Datanilai::latest();

        if($request->has('search')){
            $dtnilai = Datanilai::where('No_peserta','like','%' .$request->search.'%')
            ->orWhere('NIM','like','%' .$request->search.'%')
            ->orWhere('Nama_mhs','like','%' .$request->search.'%')
            ->orWhere('ProgramStudi','like','%' .$request->search.'%')
            ->orWhere('tanggal','like','%' .$request->search.'%')
            ->orWhere('Listening','like','%' .$request->search.'%')
            ->orWhere('Structure','like','%' .$request->search.'%')
            ->orWhere('Reading','like','%' .$request->search.'%')
            ->orWhere('Total','like','%' .$request->search.'%')
            ->orWhere('No_Sertifikat','like','%' .$request->search.'%')->paginate(10);

            
        }else{
            $dtnilai = Datanilai::paginate(10);
            
        }
      
        return view('/dashboard/Admin/layouts/Datanilai/datanilai',compact('dtnilai'));
    }

    public function Lengkapidata($id)
    {

     
        $dtnilai = Datanilai::find($id);
        $dtsertifikat = DataSertifikat::find($id);
        return view('/dashboard/Admin/layouts/Datanilai/Lengkapidata',compact('dtnilai','dtsertifikat'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dtnilai = Datanilai::find($id);
        $dtnilai->update($request->all());
      
        return view('/dashboard/Admin/layouts/Datanilai/Lengkapidata',compact('dtnilai'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dtnilai = Datanilai::find($id);
        $dtnilai->delete();
        return redirect('/DataNilai')->with('success', 'Data Nilai Telah Berhasil Di Hapus');
    }
}
