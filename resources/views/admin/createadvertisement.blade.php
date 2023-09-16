@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="container">
    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
    <form id="advertisement">
        @csrf
        <div class="form-group">
            <label for="titleInput">Title</label>
            <input type="text" class="form-control" id="titleInput" name="title" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="descInput">Description</label>
            <input type="text" class="form-control" name="desc" id="descInput" placeholder="Password">
        </div>
        <button type="buttton" id="kaydet" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $("#kaydet").click(function() {

        $.ajax({
            url: '/advertisement',
            type: "POST",
            data: $('#advertisement').serialize(),
            success: function(data) {

                if ($.isEmptyObject(data.error)) {
                    alert(data.mesaj);
                    location.reload();
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