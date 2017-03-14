@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Artikel</div>

                <div class="panel-body">
                  <form method="POST" action="{{ url('artikel/update', $tampiledit->id) }}" enctype="multipart/form-data">
                     {!! csrf_field() !!}
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" class="form-control" value="{{ $tampiledit->judul }}" name="judul">
                    </div>                    
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" class="form-control" value="{{ $tampiledit->isi }}" name="isi">
                    </div>
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" class="form-control" value="{{ $tampiledit->komentar }}" name="komentar">
                    </div>
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" class="form-control" value="{{ $tampiledit->rating }}" name="rating">
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                      <img src="{{ asset('upload_artikel/'.$tampiledit->gambar)  }}" width="60" height="100" >
                    </div>
                    <div class="form-group">
                      <input type="file" name="gambar" class="validate"/ >
                    </div>
                    <button class="btn btn-primary">Update data</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
