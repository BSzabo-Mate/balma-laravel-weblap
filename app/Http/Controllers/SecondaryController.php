<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SecondaryController extends Controller
{
// Az oldal megjelenítése
public function index()
{
return view('secondary');
}

//SZOLGÁLATON ÍVŰL              |
// Képfeltöltés kezelése        V
public function uploadImage(Request $request)
{
$request->validate([
'image' => 'required|image|max:2048', // max 2MB
]);

$path = $request->file('image')->store('uploads', 'public');

return response()->json([
'url' => asset('storage/' . $path)
]);
}
}
