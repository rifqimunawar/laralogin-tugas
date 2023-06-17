<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
  public function index(Request $request)
  {
    $kamars = Kamar::latest()->get();
    $user = Auth::user();
    return view('admin.kamar.index', compact('kamars', 'user'));
  }

  public function create()
  {
    $user = Auth::user();
    return view('admin.kamar.create', compact('user'));
  }

  public function store(Request $request)
  {
    $kamar = $request -> all();
    $kamar = kamar::create($kamar);
    return redirect('/kamar');
  }
  public function edit($id, Request $request)
  {
    $user=Auth::user();
    $kamars = Kamar ::find($id);
    return view('admin.kamar.edit', compact('kamars', 'user'));
  }
  public function update($id, Request $request)
  {
    $kamar = Kamar::findOrFail($id);
  
    $kamarData = $request->all();
    $kamar->update($kamarData);
  
    return redirect('/kamar');
  }
  public function destroy($id)
  {
      $kamar = Kamar::findOrFail($id);
      $kamar->delete();
      return redirect('/kamar');
  }
}
