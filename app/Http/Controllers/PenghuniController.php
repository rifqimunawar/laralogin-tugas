<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Univ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenghuniController extends Controller
{
  public function index()
  {
      $penghunies = Penghuni::with('kamars', 'phone', 'univ')->latest()->get();
      return view('penghuni.index', compact('penghunies'));
  }
  
    public function create(Request $request)
    {
      $universitas = Univ ::all();
      $user = Auth::user();
      return view('admin.penghuni.create', compact('universitas', 'user'));
    }
  
    public function store(Request $request)
    {
        // Mengambil data dari permintaan
        $penghuniData = [
            'name' => $request->input('name'),
            'domisili' => $request->input('domisili'),
            'kamars_id' => $request->input('kamars_id'),
        ];
    
        // Buat objek Penghuni dan simpan data
        $penghuni = Penghuni::create($penghuniData);
    
        // Jika nomor telepon disertakan dalam permintaan, buat objek Phone dan hubungkan dengan Penghuni
        if ($request->has('phone')) {
            $phoneData = ['phone' => $request->input('phone')];
            $phone = $penghuni->phone()->create($phoneData);
        }
    
        return redirect('/dashboard');
    }
    
    public function edit($id, Request $request)
    {
      $user = Auth::user();
      $penghunies = Penghuni ::find($id);
      $kamars=Kamar ::all();
      // dd($penghunies);
      return view('penghuni.edit', compact('penghunies', 'kamars', 'user'));
    }
    public function update($id, Request $request)
    {
      $penghunies = Penghuni::findOrFail($id);
    
      $penghuniesData = $request->all();
      $penghunies->update($penghuniesData);
    
      return redirect('/dashboard');
    }
    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->delete();
        return redirect('/dashboard');
    }

        // MANY TO MANY RELATION
        public function univ()
        {
            $penghuni = Penghuni::get();
            return view('admin.penghuni.univ', [
                'title' => 'Data Matkul',
                'data' => $penghuni
            ]);
        }
}
