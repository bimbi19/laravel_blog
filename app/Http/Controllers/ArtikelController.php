<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//panggil class model artikel
use App\Artikel;

//pangil library db
use Illuminate\Support\Facades\DB;

//memangil fungsi substring
use Illuminate\Support\Str;

use Uuid;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //$artikel   = Artikel::get();
        $artikel = Artikel::orderBy('id','ASC')->paginate(5);
        $jumlah_artikel = $artikel->count();      

        return view('artikel.index',compact('artikel', 'jumlah_artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'judul' => 'required|min:5',
                'isi' => 'required|min:5',
                'komentar' => 'required|min:5',
                'rating' => 'required|numeric',
                'gambar' => 'required|max:256'
        ]);

        $tambah = new Artikel();
        $tambah->id = Uuid::generate(4);
        $tambah->user_id = $request['user_id'];
        $tambah->judul = $request['judul'];
        //judul akan dirubah menjadi string
        $tambah->slug_judul = Str::slug($request->get('judul'));
        $tambah->isi = $request['isi'];
        $tambah->komentar = $request['komentar'];
        $tambah->rating = $request['rating'];
        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image

        $file       = $request->file('gambar');
        $ext        = $file->getClientOriginalExtension();
        $fileName   = str_random(18). ".$ext";
        $request->file('gambar')->move("upload_artikel/", $fileName);

        $tambah->gambar = $fileName;
      
        $tambah->save();

        return redirect()->to('/artikel')->with('alert-success', 'Berhasil Mengubah Data');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tampiledit = Artikel::where('id', $id)->first();
        return view('artikel.edit')->with('tampiledit', $tampiledit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //fungsi untuk update data
        $update = Artikel::where('id', $id)->first();
        $update->slug_judul = Str::slug($request->get('judul'));        
        $update->judul = $request['judul'];
        $update->isi = $request['isi'];
        $update->komentar = $request['komentar'];
        $update->rating = $request['rating'];

        //cek ketersediaan file uploadtan
        if($request->file('gambar')== '')
        {
            $update->gambar = $update->gambar;
        } else
        {
            $file       = $request->file('gambar');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = str_random(30).".$ext";
            $request->file('gambar')->move("upload_artikel/", $fileName);
            $update->gambar = $fileName;
        }
        $update->update();

        return redirect()->to('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responses
     */
    public function destroy($id)
    {

        $hapus = Artikel::find($id);        
        $hapus->delete();

        return redirect()->to('/artikel');
    }
}
