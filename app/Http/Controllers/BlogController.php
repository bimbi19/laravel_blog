<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil semua data pada model Blog
        //$blogs = Blog::all();
        //paging
        $blogs = Blog::paginate(2);
        return view('blog.index', ['blogs' => $blogs]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //function untuk insert data
        
        //validasi form
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog = new Blog;
        $blog ->title = $request->title;
        $blog ->description = $request->description;
        //simpan data melalui array
        $blog->save();
        //redirect halaman
        return redirect('blog')->with('message', 'data berhasil terupdate');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan halaman not found
        $blog = Blog::find($id);
        if(!$blog){
            abort(404);
        } return view('blog.detail')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan halaman update
        $blog = Blog::find($id);
        if(!$blog){
            abort(404);
        } return view('blog.edit')->with('blog', $blog);

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
        //validasi form
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        // save all data
        $blog->save();
        //redirect page after save data
        return redirect('blog')->with('message','datahasbeen edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('blog')->with('message','data hasbeen deleted!');
    }
}
