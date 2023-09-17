$(".basvur").click(function (e) {
    e.preventDefault();
    $(this).attr("data-id")

    $.ajax({
        url: '/basvur',
        type: "POST",
        data: id,
        success: function (data) {
            alert(data)

        }
    });
})