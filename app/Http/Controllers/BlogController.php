<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Blog;
        $data = Blog::all();
        $title = 'Kelola Blog';

        return view('admin.blog.index', compact('data', 'model', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Blog;
        $data = Blog::all();
        $title = 'Kelola Blog';

        return view('admin.blog.create', compact('data', 'model', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Blog;
        $model->judul = $request->get('judul');
        $model->tanggal = $request->get('tanggal');
        $model->deskripsi = $request->get('deskripsi');
        $file = $request->gambar;
        $nama_file = time() . '.' . $file->getClientOriginalExtension();
        $file->move("images/", $nama_file);
        $model->nama_foto = $request->get('nama_foto');
        $model->url = $nama_file;
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();
        return redirect('blog')->with('pesanC', 'Data blog berhasil ditambahkan !!');
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
        $model = Blog::find($id);
        $model->judul = $request->get('judul');
        $model->tanggal = $request->get('tanggal');
        $model->deskripsi = $request->get('deskripsi');
        $file = $request->gambar;
        $url_lama = $request->get('url_lama');
        if ($request->gambar == !NUll) {
            unlink('images/' . $url_lama);
            $nama_file = time() . '.' . $file->getClientOriginalExtension();
            $file->move("images/", $nama_file);
            $model->url = $nama_file;
        }
        $model->nama_foto = $request->get('nama_foto');

        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();
        return redirect('blog')->with('pesanU', 'Data blog berhasil diubah !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Blog::find($id);
        unlink('images/' . $model->url);
        $model->delete();
        return redirect('blog')->with('pesanD', 'Data blog berhasil dihapus !!');
    }
}
