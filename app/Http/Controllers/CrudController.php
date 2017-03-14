<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//pangil library db
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Crud;

//memangil fungsi substring
use Illuminate\Support\Str;

//memangil fungsi uuid
use Uuid;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilkan data dari tabel crud    
        $loop = Crud::orderBy('created_at', 'DESC')->paginate(3);  
        return view('show')->with('loop', $loop);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');

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
                'judul' => 'required',
                'isi' => 'required',
                'komentar' => 'required',
                'rating' => 'required'
        ]);

        $tambah = new Crud();
        $tambah->id = Uuid::generate(4);
        $tambah->judul = $request['judul'];
        //judul akan dirubah menjadi string
        $tambah->slug_judul = Str::slug($request->get('judul'));
        $tambah->isi = $request['isi'];
        $tambah->komentar = $request['komentar'];
        $tambah->rating = $request['rating'];
        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('gambar');
        $fileName   = str_random(30);
        $request->file('gambar')->move("upload/", $fileName);

        $tambah->gambar = $fileName;
      
        $tambah->save();

        return redirect()->to('/crud');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function manual($id)
    {
        $tampilkan = Crud::where('id', $id)->first();
        return view('tampil')->with('tampilkan', $tampilkan);
    }

    public function show($slug)
    {
        //
        $tampilkan = Crud::where('slug_judul', $slug)->first();
        return view('tampil')->with('tampilkan', $tampilkan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $tampiledit = Crud::where('id', $id)->first();
        return view('edit')->with('tampiledit', $tampiledit);
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
        $update = Crud::where('id', $id)->first();
        $update->slug_judul = Str::slug($request->get('judul'));        
        $update->judul = $request['judul'];
        $update->isi = $request['isi'];

        //cek ketersediaan file uploadtan
        if($request->file('gambar')== '')
        {
            $update->gambar = $update->gambar;
        } else
        {
            $file       = $request->file('gambar');
            $fileName   = str_random(30);;
            $request->file('gambar')->move("upload/", $fileName);
            $update->gambar = $fileName;
        }
        $update->update();

        return redirect()->to('/crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Crud::find($id);        
        $hapus->delete();

        return redirect()->to('/crud');
    }

    public function lihat_data()
    {
        $parsing = 'Dashboard';    
        //$crud = DB::table('crud')->get();
        $crud = DB::table('crud')->where('judul', 'like', '%a%')->get();

        
        //perintah cek isi variabel
        //dd($crud);

        return view('blog', ['crud' => $crud, 'parsing' => $parsing]);
    }
}
