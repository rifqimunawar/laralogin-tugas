<?php

namespace App\Http\Controllers;

use App\Models\Univ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnivController extends Controller
{
    public function index(Request $request)
  {
    $universitas = Univ::latest()->get();
    $user = Auth::user();
    return view('admin.univ.index', compact('universitas', 'user'));
  }

  public function create()
  {
    $user = Auth::user();
    return view('admin.univ.create', compact('user'));
  }

  public function store(Request $request)
  {
    $universitas = $request -> all();
    $universitas = Univ::create($universitas);
    return redirect('/univ');
  }
  public function edit($id, Request $request)
  {
    $user=Auth::user();
    $universitas = Univ ::find($id);
    return view('admin.univ.edit', compact('universitas', 'user'));
  }
  public function update($id, Request $request)
  {
    $universitas = Univ::findOrFail($id);
  
    $universitasData = $request->all();
    $universitas->update($universitasData);
  
    return redirect('/univ');
  }
  public function destroy($id)
  {
      $universitas = Univ::findOrFail($id);
      $universitas->delete();
      return redirect('/univ');
  }
}
