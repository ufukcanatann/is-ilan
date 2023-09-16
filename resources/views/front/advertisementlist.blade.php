@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th scope="col">İlan Başlığı</th>
            <td scope="col">İlan Açıklaması</td>
        </tr>
        @foreach($ilanListesi as $ilan)
        <tr>
            <th scope="row">{{$ilan->title}}</th>
            <td>{{$ilan->description}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection