$(document).ready(function() {
    $("#btn-chart").click(function() {
        var room = $(".room option:selected").val();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "http://moket-dev.com/admin/get-chart",
            method: "POST",
            dataType: "JSON",
            data: {
                room : room,
            },
            success : function(result) {
                console.log(result)
                var table = '<table class="table table-striped"><thead><tr><th scope="col">Hạng</th><th scope="col">Tài khoản</th><th scope="col">Tên</th><th scope="col">Điểm số</th><th scope="col">Email</th><th scope="col">SĐT</th></tr></thead><tbody>'
                $.each(result, function(key, value) {
                    table += '<tr><th scope="row">'+(key + 1)+'</th><td>'+value.user_name+'</th><td>'+value.name+'</th><td>'+value.scores+'</th><td>'+value.email+'</th><td>'+value.phone+'</td></tr>';
                });
                table += '</tbody></table>'
                $("#data-chart").html(table)
            }
         });
    })
});