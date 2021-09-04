<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\Jadwal;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Surah;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kontak;

class QuranController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Home,Index,/
    public function index(Request $request)
    {
        // get title
        $title = 'E-Quran';

        // get jadwal
        $model = new Jadwal;
        $data = Jadwal::all();

        // get waktu now
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        // get banner
        $fbanner = new Banner;
        $banner = Banner::all();

        // get quran
        $client       = new Client();
        $url          = "https://api.quran.sutanlab.id/surah";
        $response     = $client->request('GET', $url);
        $index = $request->page;
        if ($index == NULL || $index == '') {
            $ind = 1;
            $responseBody = json_decode($response->getBody());
            $datas = $responseBody->data;
            $collect = collect($datas)->forPage($ind, 17);
            $paging = $collect->toJson();
            $row = json_decode($paging);

            // prev
            $prev = $ind - 1;

            //next
            $next = $ind + 1;
        } else {
            $ind = $index;
            $responseBody = json_decode($response->getBody());
            $datas = $responseBody->data;
            $collect = collect($datas)->forPage($ind, 17);
            $paging = $collect->toJson();
            $row = json_decode($paging);

            // prev
            $prev = $ind - 1;

            //next
            $next = $ind + 1;
        }

        // get pencarian
        $responseBody = json_decode($response->getBody());
        $datas = $responseBody->data;
        $collect = collect($datas)->forPage(1, 114);
        $paging = $collect->toJson();
        $tampil = json_decode($paging);

        $responseBody = json_decode($response->getBody());
        $datas = $responseBody->data;
        $collect = collect($datas)->forPage(1, 114);
        $paging = $collect->toJson();
        $test = json_decode($paging);



        $kontak = Kontak::all();


        // return view
        return view('quran.index', compact('row', 'today', 'data', 'banner', 'title', 'prev', 'next', 'tampil', 'kontak', 'test'));
    }

    // Per Ayat
    public function surah(Request $request)
    {
        // get title
        // $title = 'Detail Surah | E-Quran';

        // get jadwal
        $model = new Jadwal;
        $data = Jadwal::all();

        // get banner
        $fbanner = new Banner;
        $banner = Banner::all();

        // get waktu now
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        $client       = new Client();
        $url          = "https://api.quran.sutanlab.id/surah/" . $request->segment(2);
        $response     = $client->request('GET', $url);
        $responseBody = json_decode($response->getBody());
        $datas = $responseBody->data->verses;
        $collect = collect($datas)->forPage(1, 286);
        $paging = $collect->toJson();
        $row = json_decode($paging);

        $datas_ = $responseBody->data->name->transliteration->id;

        $title = $datas_;
        $cek = $responseBody->data->preBismillah;
        $kontak = Kontak::all();
        if ($cek == NULL) {
            return view(
                'quran.surah',
                compact('row', 'today', 'data', 'banner', 'title', 'cek', 'kontak')
            );
        } else {
            $pre = $responseBody->data->preBismillah->text->arab;
            $bis = $pre;
            $pre_ = $responseBody->data->preBismillah->text->transliteration->en;
            $bis_ = $pre_;
            $pre__ = $responseBody->data->preBismillah->translation->id;
            $bis__ = $pre__;

            return view(
                'quran.surah',
                compact('row', 'today', 'data', 'banner', 'title', 'bis', 'bis_', 'bis__', 'cek', 'kontak')
            );
        }
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

    public function blog()
    {
        $model = new Jadwal;
        $data = Jadwal::all();
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $artike = new Blog;
        $data_artikel = Blog::orderBy('tanggal')->paginate(6);
        Paginator::useBootstrap();
        $fbanner = new Banner;
        $banner = Banner::all();
        $title = 'Blogs | E-Quran';
        $kontak = Kontak::all();

        return view('quran.blog', compact('today', 'data', 'data_artikel', 'banner', 'title', 'kontak'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        $model = new Jadwal;
        $data = Jadwal::all();
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $title = 'Contact Us | E-Quran';
        $kontak = Kontak::all();


        return view('quran.about', compact('today', 'data', 'title', 'kontak'));
    }
    public function disFav(Request $request)
    {
        $id_surah = $request->id_surah;
        $id_user = $request->id_user;
        DB::table('surahfavs')
            ->where('id_surah', $id_surah)
            ->where('user_id', $id_user)
            ->delete();
        return redirect('/surah-favorit')->with('pesanH', 'Surah tersebut dihapus dari daftar favorit !!');
    }
    public function store(Request $request)
    {
        $model = new Surah;
        $id_surah = $request->id_surah;
        $id_user = $request->id_user;
        if ($id_user == !NULL) {
            if (DB::table('surahfavs')
                ->where('id_surah', $id_surah)
                ->where('user_id', $id_user)
                ->first()
            ) {
                return redirect('/')->with('pesanD', 'Surah tersebut sudah dalam daftar favorit !!');
            } else {
                $model->user_id = $request->get('id_user');
                $model->id_surah = $request->get('id_surah');

                $model->save();
                return redirect('/')->with('pesanC', 'Surah Ditambahkan kedalam daftar Favorit !!');
            }
        } elseif ($id_user == NULL || $id_user == '') {
            return redirect('/')->with('pesanU', 'Silahkan Login Terlebih Dahulu !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function surahFavorit()
    {
        if (Auth()->check()) {
            // get title
            $title = 'Surah Favorit | E-Quran';
            $user = Auth::user()->id;
            $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
            $data = DB::select("select * from surahfavs where user_id = $user ");
            $get = collect($data)->toArray();
            $tampil = array_map(
                function ($dt) {
                    $get =
                        [
                            $dt->id_surah,
                        ];
                    return $get;
                },
                $get
            );
            // dd($tampil);
            $client       = new Client();
            // $keyword = $request->get('search');

            $url          = "https://api.quran.sutanlab.id/surah";

            $response     = $client->request('GET', $url);

            $responseBody = json_decode($response->getBody());
            $datas = $responseBody->data;
            $data = Jadwal::all();
            $kontak = Kontak::all();


            return view('quran.show', compact('datas', 'tampil', 'today', 'data', 'title', 'kontak'));
        } else {
            return redirect('login');
        }
    }
    public function show($id)
    {
        $datas = Blog::find($id);
        $data = Jadwal::all();
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $title = 'Blog Detail | E-Quran';
        $kontak = Kontak::all();



        $recent = DB::table('blog')
            ->orderBy('tanggal', 'desc')->take(5)
            ->get();
        return view('quran.blog-detail', compact('data', 'today', 'title', 'datas', 'recent', 'kontak'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
