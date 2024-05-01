<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Supir;
use RealRashid\SweetAlert\Facades\Alert;



class AdminController extends Controller
{
    //


    // PEMILIK KAPAL
    public function tambah_pemilik_kapal(){
        return view('auth.register_pemilik_kapal');
    }

    public function index_pemilik_kapal(){
        $pk = User::where('role_id', 3)->get();
        return view('Pemilik_Kapal.index', compact('pk'));
    }

    public function store_pemilik_kapal(Request $request){
        // Lakukan validasi
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],
            'nomor_telepon' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
        ]);
    
        // Periksa apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Jika validasi berhasil, buat entitas pengguna baru
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
            'nomor_telepon' => $request['nomor_telepon'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'alamat' => $request['alamat'],
        ]);
    
        
        // Redirect atau lakukan sesuatu setelah pengguna berhasil dibuat
        // return redirect()->back()->with('success', 'Task Created Successfully!');

        return redirect('index_pemilik_kapal')->with('success', 'Akun Pemilik Kapal Berhasil Dibuat!');

    }



    // SUPIR

    public function index_supir(){
        $supirs = Supir::all();
        return view('Supir.index', compact('supirs'));
    }

    public function tambah_supir(){
        return view('Supir.tambah');
    }

    public function store_supir(Request $request){
        $request->validate([
            'name' => 'required',
            'nomor_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        Supir::create([
            'name' => $request->name,
            'nomor_hp' => $request->nomor_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat
        ]);

        // return Redirect::route('index_supir');
        return redirect('index_supir')->with('success', 'Berhasil Menambah Nahkoda!');
    }

    public function edit_supir(Supir $supir){
        return view('Supir.edit', compact('supir'));
    }

    public function update_supir(Request $request,Supir $supir){

        $request->validate([
            'name' => 'required',
            'nomor_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'aktif' => 'required|in:0,1',
        ], [
            'aktif.in' => 'Status harus berisi nilai 0 atau 1 atau nilai boolean.',
        ]);

        $supir->update([
            'name' => $request->name,
            'nomor_hp' => $request->nomor_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'aktif' => $request->aktif
        ]);

        return Redirect::route('index_supir');
    }


    public function hapus_supir(Supir $supir){
        $supir->delete();
        return Redirect::route('index_supir')->with('delete', 'Berhasil Menghapus Nahkoda!');
    }

    
}
