@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Artikel</div>
                

                <div class="panel-body">
                  {!! Form::open(array('url' => '/artikel', 'files'=> true)) !!}
                  <div class="form-group">
                    {!! Form::label('judul', 'Judul') !!}
                    <input class="form-control" placeholder="Judul Buku" name="judul" type="text" value="{{ old('judul') }}" id="judul">


                     @if ($errors->has('judul'))
                       <span class="help-block">
                          <strong>{{ $errors->first('judul') }}</strong>
                       </span>
                     @endif
                  </div>
                  <div class="form-group">
                    {!! Form::label('isi', 'Isi') !!}
                    <textarea class="form-control" placeholder="Isi artikel" name="isi" cols="50" rows="10" id="isi">{{ old('isi') }}</textarea>
                    @if ($errors->has('isi'))
                       <span class="help-block">
                          <strong>{{ $errors->first('isi') }}</strong>
                       </span>
                     @endif
                  </div>
                  <div class="form-group">
                    {!! Form::label('komentar', 'Komentar') !!}
                    <input class="form-control" placeholder="komentar" name="komentar" type="text" value="{{ old('komentar') }}" id="komentar">
                    @if ($errors->has('komentar'))
                       <span class="help-block">
                          <strong>{{ $errors->first('komentar') }}</strong>
                       </span>
                     @endif
                  </div>
                  <div class="form-group">
                    {!! Form::label('rating', 'rating') !!}
                     <input class="form-control" placeholder="rating" name="rating" type="text" id="rating" value="{{ old('rating') }}">
                     @if ($errors->has('rating'))
                       <span class="help-block">
                          <strong>{{ $errors->first('rating') }}</strong>
                       </span>
                     @endif
                  </div>
                  <div class="form-group">
                    {!! Form::label('Gambar', 'Upload Gambar') !!}
                      <input name="gambar" type="file" value="{{ old('gambar') }}" class="form-control">
                     @if ($errors->has('gambar'))
                       <span class="help-block">
                          <strong>{{ $errors->first('gambar') }}</strong>
                       </span>
                     @endif
                  </div>
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                  {!! Form::button('<i class="fa fa-plus-square"></i>'. ' Simpan', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
                  {!! Form::button('<i class="fa fa-times"></i>'. ' Reset', array('type' => 'reset', 'class' => 'btn btn-danger'))!!}

                  {!! Form::close()!!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
