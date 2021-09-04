@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">KELOLA SURAH FAVORIT</h3>
                {{-- <p class="text-muted">Add class <code>.color-table .primary-table</code></p> --}}
                <div class="table-responsive">
                    <table class="table color-table primary-table text-center">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Surah Ke</th>
                                <th class="text-center">Nama Pembaca</th>
                                <th class="text-center">Option </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }} </td>
                                    <td>Surah ke-{{ $value->id_surah }} dalam Al-Quran</td>
                                    <td>{{ $value->createdBy->name }}</td>

                                    <td class="text-center"><button data-toggle="modal"
                                            data-target="#responsive-modal{{ $value->id }}" class="btn btn-primary"><i
                                                class="fa fa-edit"></i></button></td>
                                    <div id="responsive-modal{{ $value->id }}" class="modal fade" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog">
                                            <form method="post" action="{{ url('surah-fav/' . $value->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="PATCH">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-warning">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Ubah Data Surah Fav</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Surah Ke
                                                                :</label>
                                                            <input name="id_surah" type="text" class="form-control"
                                                                id="recipient-name"
                                                                value="{{ old('id_surah', $value->id_surah) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name"
                                                                class="control-label">Pembaca:</label>
                                                            <select name="user_id" id="" class="form-control">
                                                                <option value="{{ $value->user_id }}">Pilih
                                                                    Pembaca</option>
                                                                @foreach ($datas as $val)
                                                                    <option value="{{ $val->id }}">
                                                                        {{ $val->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger waves-effect"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
