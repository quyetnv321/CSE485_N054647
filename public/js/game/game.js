var countQuestion = 0;
var rightAnswer;
var idQuestion;
var time;
var choice;
var timeRun;
var timeDown;   // t.gian của câu hỏi
var checkSelected = 1; // check khi người dùng chọn đáp án
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
            if(checkSelected == 0) {    
                Scores(timeDown, idUser)    // hết t.g ko trl + 15đ
                checkSelected = 1;
            }
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
function getDataUser(id) {
    $.ajax({
        url: "http://moket-dev.com/game/user",
        method: "POST",
        dataType: "JSON",
        data: {
            id : id
        },
         //dữ liệu nhận về
        success:function(data) {
            $("#scores").html(data[0].scores)
        }
     });
}
function updateQuestionDay(id) {
    $.ajax({
        url: "http://moket-dev.com/game/user-question-day",
        method: "POST",
        dataType: "JSON",
        data: {
            id : id
        },
         //dữ liệu nhận về
        success:function(data) {
            console.log(data)
        }
     });
}
$(document).ready(function(){
    $('#btn-play').click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(countQuestion <= questionsDay) {    // giới hạn số câu / 1 lượt chơi (ngày chơi)
            $(".answer").removeClass("selected")
            $('#play').html('Câu tiếp theo')
            e.preventDefault();
            if(checkSelected == 1) {    // phải trả lời mới đc next câu tiếp theo
                checkSelected = 0;
                countQuestion++;
                getDataUser(idUser)
                updateQuestionDay(idUser)
                getData();
            }
            $('#'+rightAnswer).removeClass("quadrat")
            // chọn đáp án
        }
        else {
            alert("Lượt chơi của bạn hôm nay đã hết."+"\n"+"Số câu trả lời đúng: " + countRightAnswer+"\n" + "Điểm số có được: " + countScores)
        }
    })
    $(".answer").click(function() {
        // $(".answer").unbind("click");
        choice = $(this).attr('value')
        $(this).addClass("selected");
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
});
// loi login tk moi