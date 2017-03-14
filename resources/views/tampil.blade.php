@extends('layouts.index')
@section('content')

<div class="section">
	<div class="card-panel purple darken-3 white-text">Praktikum Crud</div>
</div>

<div class="section">
	
	<div class="row">
		<div class="col s12">
			<label>Judul</label><br>
			<h5>{{ $tampilkan->judul }}</h5><br>
			<label>Gambar</label><br>
			<img src="{{ asset('upload/'.$tampilkan->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;"><br>
			<label>Isi</label>			           
            <p>{!! $tampilkan->isi !!}</p>
            <label>Komentar</label>
            <p>{!! $tampilkan->komentar !!}</p>
            <label>Rating</label><br><br>
            <a class="btn-floating btn-large red" href="#">
           		 <i class="large material-icons">star</i>          		 
            </a>
            <a class="btn-floating btn-large red" href="#">
           		 <i class="large material-icons">star</i>          		 
            </a><a class="btn-floating btn-large red" href="#">
           		 <i class="large material-icons">star</i>          		 
            </a><a class="btn-floating btn-large red" href="#">
           		 <i class="large material-icons">star</i>          		 
            </a><a class="btn-floating btn-large red" href="#">
           		 <i class="large material-icons">star</i>          		 
            </a>
            	 <p>{!! $tampilkan->rating !!}</p>

                
		</div>
	</div>

</div>



@endsection
