var countQuestion = 0;
var rightAnswer;
var IdRightAnswer;
var time;
var choice;
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var Interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.text(minutes + ":" + seconds);
        // end time
        if (--timer < 0) {
            timer = 0;
            // css đáp án đúng
            $('#'+rightAnswer).addClass("quadrat")
            //update pass question
            updatePassQuestion(IdRightAnswer)
            clearInterval(Interval);    // dừng chạy x
        }
    }, 1000);
}
function updatePassQuestion(idQuestion) {
    $.ajax({
        url : "http://moket-dev.com/game/question/UpdatePassQuestion",
        method : "POST",
        dataType : "JSON",
        data : {
            idQuestion : idQuestion
        },
        success : function(result) {
            console.log(result)
        }
    });
}
function getData() {
    $.ajax({
        url: "http://moket-dev.com/game/question",
        method: "POST",
        dataType: "JSON",
        data: {
        },
         //dữ liệu nhận về
        success:function(data) {
            // console.log(data)
            if(data.OutOfQuestion) {
                alert("Hệ thống tạm thời hết câu hỏi. Chúng tôi sẽ cập nhật thêm. Cảm ơn!");
            }
            $("#question").html(data.content)
            $(".answer-a").html(data.answerA)
            $(".answer-b").html(data.answerB)
            $(".answer-c").html(data.answerC)
            $(".answer-d").html(data.answerD)
            $("#count-question").html(countQuestion)
            rightAnswer = data.right_answer;
            IdRightAnswer = data.id;
            time = data.time;
            // timedown
            var time = time * 1,
            display = $('#time');
            startTimer(time, display);
            // end timedown
        }
     });
}
$(document).ready(function(){
    $('#btn-play').click(function(e) {
        $('#play').html('Câu tiếp theo')
        countQuestion++;
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        getData();
        $('#'+rightAnswer).removeClass("quadrat")

        // chọn đáp án
        $(".answer").click(function() {
            choice = $(this).attr('value')
            // console.log(choice)
        })
    })
});
// đang làm đến: get đc đáp án người chơi chọn
// tiếp theo: làm 1 biến dem để check số câu hỏi, = 15 thì hết chương trình chơi.
// 1 biến right chứa câu trl đúng trog db, khi click chọn đ.án thì ktra value click có = right ko? bằng thì + điểm.
