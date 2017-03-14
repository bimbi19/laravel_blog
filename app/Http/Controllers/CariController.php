<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Crud;

class CariController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        $hasil = Crud::where('judul', 'LIKE', '%' . $query . '%')->orWhere('isi','LIKE','%'.$query.'%')->orWhere('id','LIKE','%'.$query.'%')->paginate(10);

        return view('result', compact('hasil', 'query'));
    }
}
