<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
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
        $data = Kontak::all();
        $title = 'Kelola Kontak';

        return view('admin.kontak.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Kontak;
        $data = Kontak::all();
        $title = 'Kelola Kontak';

        return view('admin.kontak.create', compact('data', 'model', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Kontak;
        $model->nama = $request->get('nama');
        $model->link = $request->get('link');
        $model->logo = $request->get('logo');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();
        return redirect('kontak')->with('pesanC', 'Data kontak berhasil ditambahkan !!');
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
        $model = Kontak::find($id);
        $model->nama = $request->get('nama');
        $model->link = $request->get('link');
        $model->logo = $request->get('logo');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();
        return redirect('kontak')->with('pesanU', 'Data kontak berhasil diubah !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Kontak::find($id);
        $model->delete();
        return redirect('kontak')->with('pesanD', 'Data Kontak berhasil dihapus !!');
    }
}
