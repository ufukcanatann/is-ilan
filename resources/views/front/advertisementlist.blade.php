@extends('layouts.app')

@section('content')
<div class="container">    

    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    
    @if(Auth::user()->role_id==0)
    <div class="col-12 d-flex justify-content-end">
        <a class="btn btn-sm btn-primary" href="/">İlan Ekle</a>
    </div>
    @endif
 
    @if(Auth::user()->role_id==1)
    <div class="col-12 d-flex justify-content-end">
        <a class="" href="/basvurular">Başvuruları Görüntüle</a>
    </div>
    @endif

    <table class="table">
        <tr>
            <th scope="col">İlan Başlığı</th>
            <td scope="col">İlan Açıklaması</td>
            <td scope="col">Seçim</td>

        </tr>
        @foreach($ilanListesi as $ilan)
        <tr>
            <th scope="row">{{$ilan->title}}</th>
            <td>{{$ilan->description}}</td>
            @if(Auth::user()->role_id==1)
            <td>
                <a href="/appeal/{{$ilan->id}}" class="btn btn-primary">Başvur</a>
            </td>
            @endif
        </tr>
        @endforeach
    </table>
</div>
@endsection