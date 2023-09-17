@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12 d-flex justify-content-end">
        <a class="" href="/">İlanlara Dön</a>
    </div>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">İlan</th>
                <th scope="col">Tarih</th>
            </tr>
        </thead>
        <tbody>
            @foreach($basvurular as $basvuru)
            <tr>
                <th scope="row">{{$basvuru->id}}</th>
                <td>{{$basvuru->title}}</td>
                <td>{{$basvuru->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection