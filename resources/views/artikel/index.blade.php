@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading panel-info">Welcome</div>
                 @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                  @endif

                <div class="panel-body">
                        <center>Data artikel</center><br>
                    Terdapat <b>{{$artikel->count()}}</b>  Artikel

                    <table class="table table-bordered table-striped">
                       <thead>
                            <tr>
                                <td>Nomor</td>
                                <td>ID Artikel</td>
                                <td>Judul</td>
                                <td>Komentar</td>
                                <td>Rating</td>
                                <td>Gambar</td> 
                                <td>Aksi</td>                              
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($artikel as $data)
                          <tr>
                            <td width="10%">{{ ++$i }}</td>
                            <td>{{$data->id}}</td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->komentar}}</td>
                            <td>{{$data->rating}}</td> 
                            <td><img src="{{ asset('upload_artikel/'.$data->gambar)  }}" width="60" height="100"></td>
                            <td  width="20%">
                                    <a href="{{ url('artikel/edit', $data->id) }}" class="btn btn-info btn-sm">Cetak</a>
                                    <a href="{{ url('artikel/edit', $data->id) }}" class="btn btn-info btn-sm">Edit data</a>
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['ArtikelController@destroy', $data->id]]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                            </td>                          
                                                 
                          </tr>
                        </tbody>   
                        @endforeach                                           

                    </table>
                    <div class="pagination">
                       <center><ul class="paginate">{{$artikel->render()}}</ul></center> 
                    </div>
                      <div class="form-group">
                        <div class="col-lg-2">
                            <a href="{{ url('/artikel/create') }}" class="form-control btn btn-success fa fa-star">Tambah data</a>
                        </div>                        
                      </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
