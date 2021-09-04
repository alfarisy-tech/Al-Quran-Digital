@extends('admin.layouts.master')
@section('content')
    <div class="row">


        <div class="col-sm-12">

            <div class="white-box">
                <h3 class="box-title m-b-0">Kelola Blog</h3>

                <p class="text-muted m-b-30"></p>

                <a class="btn btn-success" href="{{ url('blog/create') }}">Tambah Data</a>
                <hr>
                <div class="table-responsive">
                    <table id="myTable" class="table color-table primary-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                {{-- <th>Deskripsi</th>
                            <th>Foto</th> --}}
                                <th>Created By</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td style="width: 30%">{{ $value->judul }}</td>
                                    <td>{{ $value->tanggal }}</td>
                                    {{-- <td style="width: 30%"> {{ $value->deskripsi }}</td>
                            <td><img style="width: 100px;height:100px;" src="{{ asset('plugins/images/img1.jpg') }}" alt=""></td> --}}
                                    <td>{{ $value->createdBy->name }}</td>
                                    <td>
                                        <div class="btn-group">

                                            {{-- DETAIL --}}
                                            <button data-toggle="modal" data-target="#detail-modal{{ $value->id }}"
                                                class="btn btn-warning" href=""><i class="fa fa-eye"></i></button>
                                            <div id="detail-modal{{ $value->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog">

                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Detail Blog</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="message-text"
                                                                    class="control-label">Foto:</label>
                                                                <br>
                                                                <img style="width: 100%"
                                                                    src="{{ asset('images/' . $value->url) }}"
                                                                    class="img-thumbnail" alt="thumbnail">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text"
                                                                    class="control-label">Deskripsi:</label>
                                                                <textarea rows="10" readonly name="deskripsi"
                                                                    class="form-control"
                                                                    id="message-text">{{ $value->deskripsi }}</textarea>
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger waves-effect"
                                                                data-dismiss="modal">Close</button>
                                                            {{-- <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button> --}}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- //DETAIL --}}

                                            {{-- EDIT --}}
                                            <button data-toggle="modal" data-target="#edit-modal{{ $value->id }}"
                                                class="btn btn-primary" href=""><i class="fa fa-edit"></i></button>
                                            <div id="edit-modal{{ $value->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog">
                                                    <form method="post" action="{{ url('blog/' . $value->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="PATCH">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                                <h4 class="modal-title">Edit Blog</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="text" name="url_lama" id="" hidden
                                                                    value="{{ $value->url }}">
                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="control-label">Judul:</label>
                                                                    <input name="judul" type="text" class="form-control"
                                                                        id="recipient-name" value="{{ $value->judul }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="control-label">Tanggal:</label>
                                                                    <input name="tanggal" type="date" class="form-control"
                                                                        id="recipient-name"
                                                                        value="{{ $value->tanggal }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="control-label">Deskripsi:</label>
                                                                    <textarea rows="10" name="deskripsi"
                                                                        class="form-control"
                                                                        id="message-text">{{ $value->deskripsi }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="control-label">Nama
                                                                        Foto:</label>
                                                                    <input name="nama_foto" type="text" class="form-control"
                                                                        id="recipient-name"
                                                                        value="{{ $value->nama_foto }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name"
                                                                        class="control-label">Foto:</label>
                                                                    <input name="gambar" type="file" class="form-control"
                                                                        id="recipient-name"
                                                                        value="{{ $value->nama_foto }}">
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
                                            <button onclick="event.preventDefault();
                                                        document.getElementById('delete{{ $value->id }}').submit();"
                                                class="btn btn-danger" href="#"><i class="fa fa-trash"></i></button>

                                            <form id="delete{{ $value->id }}"
                                                action="{{ url('blog/' . $value['id']) }}" method="post">
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
