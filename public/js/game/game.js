var countQuestion = 0;
var rightAnswer;
var idQuestion;
var time;
var choice;
var timeRun;
var timeDown;
var checkSelected; // check khi người dùng chọn đáp án
var countRightAnswer = 0;
var countScores = 0;
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var Interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.text(minutes + ":" + seconds);
        timeRun = timer
        // end time
        if(checkSelected == 1) {
            timer = -1;
        }
        if (--timer < 0) {
            timer = 0;
            // css đáp án đúng
            $('#'+rightAnswer).addClass("quadrat")
            //update pass question
            updatePassQuestion(idQuestion)
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
function Scores(score, user) {
    $.ajax({
        url: "http://moket-dev.com/game/scores",
        method: "POST",
        dataType: "JSON",
        data: {
            user : user,
            score : score
        },
         //dữ liệu nhận về
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
            rightAnswer = data.right_answer; // đáp án đúng
            idQuestion = data.id;  // id câu hỏi
            time = data.time;
            // timedown
            timeDown = time * 1,
            display = $('#time');
            startTimer(timeDown, display);
            // end timedown
        }
     });
}
$(document).ready(function(){
    $('#btn-play').click(function(e) {
        countQuestion++;
        if(countQuestion < 15) {    // giới hạn 15 câu/1 lượt chơi
            checkSelected = 0;
            $(".answer").removeClass("selected")
            $('#play').html('Câu tiếp theo')
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
            $(".answer").unbind("click");
            choice = $(this).attr('value')
            $(this).addClass("selected");
            console.log(choice)
            if(choice == rightAnswer){
                var timeScore = time - timeRun;
                Scores(timeScore, idUser)
                countRightAnswer++;
                countScores += timeScore;
            }
            else {
                Scores(time, idUser)
                countScores += time;
            }
            updatePassQuestion(idQuestion)
            checkSelected = 1;
        });
        }
        else {
            alert("Lượt chơi của bạn đã kết thúc."+"\n"+"Số câu trả lời đúng: " + countRightAnswer+"\n" + "Điểm số có được: " + countScores)
        }
    })
});
// Thành tích chưa cập nhập khi click chơi tiếp
// loi login tk moi
