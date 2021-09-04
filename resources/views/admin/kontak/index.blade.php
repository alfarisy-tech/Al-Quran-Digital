@extends('admin.layouts.master')
@section('content')
    <div class="row">


        <div class="col-sm-12">

            <div class="white-box">
                <h3 class="box-title m-b-0">Kelola Kontak</h3>

                <p class="text-muted m-b-30"></p>

                <a class="btn btn-success" href="{{ url('kontak/create') }}">Tambah Data</a>
                <hr>
                <div class="table-responsive">
                    <table id="myTable" class="table color-table primary-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Link</th>
                                <th>Logo</th>
                                <th>Created By</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td style="width: 30%">{{ $value->nama }}</td>
                                    <td>{{ $value->link }}</td>
                                    <td>{{ $value->logo }}</td>
                                    <td>{{ $value->createdBy->name }}</td>
                                    <td>
                                        <div class="btn-group">


                                            {{-- EDIT --}}
                                            <button data-toggle="modal" data-target="#edit-modal{{ $value->id }}"
                                                class="btn btn-primary" href=""><i class="fa fa-edit"></i></button>
                                            <div id="edit-modal{{ $value->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog">
                                                    <form method="post" action="{{ url('kontak/' . $value->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="PATCH">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                                <h4 class="modal-title">Edit Kontak</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="control-label">Nama:</label>
                                                                    <input name="nama" type="text" class="form-control"
                                                                        id="recipient-name" value="{{ $value->nama }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="control-label">Link:</label>
                                                                    <input name="link" type="text" class="form-control"
                                                                        id="recipient-name" value="{{ $value->link }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="control-label">Logo:</label>
                                                                    <input name="logo" type="text" class="form-control"
                                                                        id="recipient-name" value="{{ $value->logo }}">
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">Save</button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger waves-effect"
                                                                    data-dismiss="modal">Close</button>
                                                                {{-- <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button> --}}
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- //EDIT --}}

                                            {{-- HAPUS --}}
                                            <button
                                                onclick="document.getElementById('delete{{ $value->id }}').submit();"
                                                class="btn btn-danger" href="#"><i class="fa fa-trash"></i></button>

                                            <form id="delete{{ $value->id }}"
                                                action="{{ url('kontak/' . $value['id']) }}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                            </form>
                                            {{-- //HAPUS --}}
                                        </div>


                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
