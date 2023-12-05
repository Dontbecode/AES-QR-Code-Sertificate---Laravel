<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\datamahasiswa;
use App\Models\Datanilai;
use App\Models\DataSertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class Adminsetting extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard()
    {
        
        $cek = datamahasiswa::count();
        $cek1 = Datanilai::count();
        $cek2 = DataSertifikat::count();
     

       return view('dashboard.Admin.index',compact('cek','cek1','cek2'));
    }



    public function index()
    {
        $dtadmin = User::all();
        return view('dashboard.Admin.layouts.Dataadmin.dataadmin',compact('dtadmin'));
    }

    public function Tambahadmin()
    {
       
        return view('dashboard.Admin.layouts.Dataadmin.TambahAdmin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function generate ($id)
    {
        $dtuser = User::findOrFail($id);
        $qrcode = QrCode::size(250)->generate($dtuser->email);
        return redirect('/DataAdmin',compact('qrcode'))->with('success', 'QR Code Telah Berhasil Di Tambahkan');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required','min:3','max:255','unique:users',
            'nohp'   =>'required|min:11|max:13',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        $validateData['password'] = hash::make($validateData['password']);
        User::create($validateData);
       
           return redirect('/DataAdmin')->with('success', 'Data Admin Telah Berhasil Di Tambahkan');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect('/DataAdmin')->with('success', 'Data Admin Telah Berhasil Di Hapus');
    }
}
