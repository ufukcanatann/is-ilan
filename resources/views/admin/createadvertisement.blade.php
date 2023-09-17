@extends('layouts.app')

@section('content')

<div class="container">

    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-end">
            <a href="/advertisement">İlanlara bak</a>
        </div>
        <div class="col-6">
            <form id="advertisement">
                @csrf
                <div class="form-group">
                    <label for="titleInput"><strong>Başlık</strong></label>
                    <input type="text" class="form-control" id="titleInput" name="title" placeholder="Başlık">
                </div>
                <div class="form-group mt-2">
                    <label for="descInput"><strong>Açıklama</strong></label>
                    <input type="textarea" class="form-control" name="desc" id="descInput" rows="3" placeholder="Açıklama">
                </div>
                <button type="buttton" id="save" class="btn btn-primary mt-2">Kaydet</button>
            </form>
        </div>
    </div>
</div>

<script>
    var target = window.location.origin+"/advertisement";

    $("#save").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/advertisement',
            type: "POST",
            data: $('#advertisement').serialize(),
            success: function(data) {
                    window.location.href=target;
                if ($.isEmptyObject(data.error)) {
                    alert(data.mesaj);
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    })

    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
    }
</script>
@endsection