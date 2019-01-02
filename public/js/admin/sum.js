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
            }
         });
    })
})