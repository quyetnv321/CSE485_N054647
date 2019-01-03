<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css" /> <!-- css file -->
    <link rel="stylesheet" href="plugin/bootstrap-grid.min.css"> <!-- grid  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <title>Chơi game</title>
    <script src="plugin/jquery-3.3.1.js"></script>
    <script src="js/action.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="wrap-game">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-12 box-left">
                    <div class="box-info-user">
                        <div class="info">
                            <img src="images/icon.png">
                                @if(isset(Auth::user()->user_name))
                                    <p id="name">{{Auth::user()->name}}</p>
                                    <a href="{{ url('/home/logout') }}">Đăng xuất</a>
                                @else
                                    <script>window.location = "/home";</script>
                                @endif
                                
                        </div>
                        <div class="rank-time">
                            <div class="rank">
                                <p class="title-rt">Phòng</p>
                                <p>Random {{Auth::user()->id_room}}</p>
                            </div>
                            <div class="time">
                                <p class="title-rt">Thành tích (s)</p>
                                @if(isset(Auth::user()->user_name))
                                    <p id = "scores">{{Auth::user()->scores}}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="thanh-tich">
                        <div class="num-right">
                            <div class="txt-tt" id="btn-play">
                                <p id="play">Chơi</p>
                            </div>
                        </div>
                        <div class="top">
                            <div class="txt-tt" id="tt">
                                <p>Thành tích</p>
                            </div>
                            <!-- <div>
                                <p>0</p>
                            </div> -->
                        </div>
                    </div>
                    <div class="author">

                    </div>
                </div>
                <div class="col-md-8 col-12 box-right">
                    <div id="mc">

                    </div>
                    <div id="box-question">
                        <div id= "threads">
                            <span id="count-question"></span>
                            <span id="question"></span>
                        </div>
                        <div id="box-answer">
                            <div class="row">
                                <div class="col-6">
                                    <div class="answer answer-a" id='1' value = '1'><p></p></div>
                                    <div class="answer answer-c" id='3' value = '3'><p></p></div>

                                </div>
                                <div class="col-6">
                                    <div class="answer answer-b" id='2' value = '2'><p></p></div>
                                    <div class="answer answer-d" id='4' value = '4'><p></p></div>
                                </div>
                                <div class="time-run">
                                   <span id="time">00:00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="box-achievements">
            <div id = "achievements"></div>
        </div>
        <div class="wrap-login">
        </div>
    </div>
    {{ csrf_field() }}
    @if(isset(Auth::user()->user_name))
        <script>
            var idUser = {{Auth::user()->id}}
            var questionsDay = {{Auth::user()->questions_day}}
            var room = {{Auth::user()->id_room}}

        </script>
    @endif
    <script src="js/game/game.js"></script>
</body>

</html>