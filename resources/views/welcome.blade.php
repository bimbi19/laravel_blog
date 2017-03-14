@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Selamat Datang</div>

                <div class="panel-body">
                @if (Auth::check() && Auth::user()->level_pengguna == 'admin')
                    Anda Login sebgai <b> {{ Auth::user()->username }} </b><br>
                    Level user anda <b><u> {{ Auth::user()->level_pengguna }} </u></b><br>
                    ID anda <b><u> {{ Auth::user()->id }} </u></b>
                @elseif (Auth::check() && Auth::user()->level_pengguna == 'pengguna')
                    Anda Login sebgai <b> {{ Auth::user()->username }} </b><br>
                    Level user anda <b><u> {{ Auth::user()->level_pengguna }} </u></b>
                @elseif (Auth::check() && Auth::user()->level_pengguna == 'pemilik')
                    Anda Login sebgai <b> {{ Auth::user()->username }} </b><br>
                    Level user anda <b><u> {{ Auth::user()->level_pengguna }} </u></b>                    
                 @else
                    Selamat datang
                 @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
