$(document).ready(function() {
    $("#btn-sum").click(function() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "http://moket-dev.com/admin/get-summary",
            method: "POST",
            dataType: "JSON",
            data: {
            },
            success : function(result) {
                console.log(result)
                $("#title-list").html("Danh sách những người nhận giải");
                var table = '<table class="table table-striped"><thead><tr><th scope="col">Phòng</th><th scope="col">Tài khoản</th><th scope="col">Tên</th><th scope="col">Điểm số</th><th scope="col">Email</th><th scope="col">SĐT</th></tr></thead><tbody>'
                $.each(result, function(key, value) {
                    table += '<tr><th scope="row">'+value.id_room+'</th><td>'+value.user_name+'</th><td>'+value.name+'</th><td>'+value.scores+'</th><td>'+value.email+'</th><td>'+value.phone+'</td></tr>';
                });
                table += '</tbody></table>'
                $("#data-sum").html(table)
            }
         });
    })
})