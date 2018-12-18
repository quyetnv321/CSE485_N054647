var countQuestion = 0;
function getData() {
    $.ajax({
        url:"http://moket-dev.com/game/question",
        method: "POST",
        dataType: "JSON",
        data: {
        },
         //dữ liệu nhận về
        success:function(data) {
            console.log(data)
            $("#question").html(data.content)
            $(".answer-a").html(data.answerA)
            $(".answer-b").html(data.answerB)
            $(".answer-c").html(data.answerC)
            $(".answer-d").html(data.answerD)
            $("#count-question").html(countQuestion)
        }
     });
}

$(document).ready(function(){
    $('#btn-play').click(function(e) {
        countQuestion++;
        e.preventDefault();
			$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        getData();
    })
});