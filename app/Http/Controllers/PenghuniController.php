<?php

namespace App\Http\Controllers;

use App\Models\Univ;
use App\Models\Kamar;
use App\Models\Penghuni;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as DomPDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PenghuniController extends Controller
{
  public function index()
  {
      $user=Auth::user();
      $penghunies = Penghuni::with('kamars', 'phone', 'univ')->latest()->get();
      return view('admin.index', compact('penghunies', 'user'));
  }
    public function create(Request $request)
    {
      $universitas = Univ ::all();
      $kamars = Kamar ::all();
      $user = Auth::user();
      return view('admin.penghuni.create', compact(
        'universitas', 'user', 'kamars'
      ));
    }
    public function store(Request $request)
    {
        // Mengambil data dari permintaan
        $penghuniData = [
            'name' => $request->input('name'),
            'domisili' => $request->input('domisili'),
            'kamars_id' => $request->input('kamars_id'),
            'univ_id' => $request->input('univ_id'),
        ];
    
        // Buat objek Penghuni dan simpan data
        $penghuni = Penghuni::create($penghuniData);
    
        // Jika nomor telepon disertakan dalam permintaan, 
        // buat objek Phone dan hubungkan dengan Penghuni
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
      $universitas = Univ ::all();
      // dd($penghunies);
      return view('admin.penghuni.edit', compact('penghunies', 
      'kamars', 'user', 'universitas'));
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
}
