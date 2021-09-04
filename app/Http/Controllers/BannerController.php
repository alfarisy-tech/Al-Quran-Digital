<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
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
        $model = new Banner;
        $data = Banner::all();
        $title = 'Kelola Banner';
        return view('admin.banner.index', compact('data', 'model', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Banner;
        $data = Banner::all();
        $title = 'Kelola Banner';

        return view('admin.banner.create', compact('data', 'model', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Banner;
        $model->judul = $request->get('judul');
        $model->sub_judul = $request->get('sub_judul');
        $model->nama_foto = $request->get('nama_foto');
        $file = $request->gambar;
        $nama_file = time() . '.' . $file->getClientOriginalExtension();
        $file->move("images/", $nama_file);
        $model->url = $nama_file;
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();
        return redirect('banner')->with('pesanC', 'Banner berhasil ditambahkan !!');
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
        //
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
        $model = Banner::find($id);
        $model->judul = $request->get('judul');
        $model->sub_judul = $request->get('sub_judul');
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
        return redirect('banner')->with('pesanU', 'Banner berhasil diubah !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Banner::find($id);
        unlink('images/' . $model->url);
        $model->delete();
        return redirect('banner')->with('pesanD', 'Banner berhasil dihapus !!');
    }
}
