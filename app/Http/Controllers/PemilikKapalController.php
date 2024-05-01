<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Kapal;


class PemilikKapalController extends Controller
{
    public function index_kapal(){
        $user = Auth::user();
        $kapals = $user->kapals()->get();
        return view('Kapal.index', compact('kapals'));
    }


    public function tambah_kapal(){
        return view('Kapal.tambah');
    }


    public function store_kapal(Request $request){
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kapasitas' => 'required|min:1',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ],[
            'kapasitas.min' => 'Kapasitas harus minimal 1.',
        ]);

        $file = $request->file('gambar');

        $path = time() . $request->nama . '.' . $file->getClientOriginalExtension(); 
        
        Storage::disk('local')->put('public/Kapal_Image/'. $path, file_get_contents($file));

        Kapal::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kapasitas' => $request->kapasitas,
            'gambar' => $path,
            'user_id' => Auth::user()->id,
            'aktif' => false,
            'available_booking' => false,
            'booking' => false
        ]);

        return Redirect::route('index_kapal');
    }


    public function edit_kapal(Kapal $kapal){
        return view('Kapal.edit', compact('kapal'));
    }

    public function update_kapal(Request $request, Kapal $kapal){
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kapasitas' => 'required|min:1',
            'aktif' => 'required|in:0,1'
        ],[
            'kapasitas.min' => 'Kapasitas harus minimal 1.',
        ]);
    
        if($request->hasFile('gambar')){
            
            // Hapus file gambar lama menggunakan disk 'local'
            Storage::disk('local')->delete('public/Kapal_Image/'. $kapal->gambar);
    
            // Unggah file gambar baru
            $file = $request->file('gambar');
            $path = time(). '_' . $request->nama . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/Kapal_Image/'. $path, file_get_contents($file));

            // Update record Kapal dengan data baru, termasuk path gambar yang baru
            $kapal->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kapasitas' => $request->kapasitas,
                'gambar' =>  $path,
                'aktif' => $request->aktif,
                'booking' => $request->booking,
                'available_booking' => $request->available_booking
            ]);
        }else{
            // Jika tidak ada file gambar yang diunggah, update data Kapal tanpa mengubah path gambar
            $kapal->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kapasitas' => $request->kapasitas,
                'aktif' => $request->aktif,
                'booking' => $request->booking,
                'available_booking' => $request->available_booking
            ]);
        }
        
        return Redirect::route('index_kapal');
    }
    

    
}
