<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
  public function index(Request $request)
  {
    $kamars = Kamar::latest()->get();
    return view('kamar.index', compact('kamars'));
  }

  public function create()
  {
  return view('kamar.create');
  }

  public function store(Request $request)
  {
    $kamar = $request -> all();
    $kamar = kamar::create($kamar);
    return redirect('/kamar');
  }
  public function edit($id, Request $request)
  {
    $kamars = Kamar ::find($id);
    return view('kamar.edit', compact('kamars'));
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
