<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
  public function index()
  {
      $penghunies = Penghuni::with('kamars', 'phone', 'univ')->latest()->get();
      dd($penghunies);
      return view('penghuni.index', compact('penghunies'));
  }
  
    public function create(Request $request)
    {
      $kamars = Kamar ::all();
      return view('penghuni.create', compact('kamars'));
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
    
        return redirect('/');
    }
    
    public function edit($id, Request $request)
    {
      $penghunies = Penghuni ::find($id);
      $kamars=Kamar ::all();
      // dd($penghunies);
      return view('penghuni.edit', compact('penghunies', 'kamars'));
    }
    public function update($id, Request $request)
    {
      $penghunies = Penghuni::findOrFail($id);
    
      $penghuniesData = $request->all();
      $penghunies->update($penghuniesData);
    
      return redirect('/');
    }
    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->delete();
        return redirect('/');
    }
}
