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
                                @if(isset($user_login))
                                <p id="name">{{$user_login->name}}</p>
                                <a href="logout">Đăng xuất</a>
                                @endif
                                
                        </div>
                        <div class="rank-time">
                            <div class="rank">
                                <p class="title-rt">Xếp hạng</p>
                                <p>1</p>
                            </div>
                            <div class="time">
                                <p class="title-rt">Thời gian</p>
                                <p>0s</p>
                            </div>
                        </div>

                    </div>
                    <div class="thanh-tich">
                        <div class="num-right">
                            <div class="txt-tt" id="btn-play">
                                <p>Chơi</p>
                            </div>
                        </div>
                        <div class="top">
                            <div class="txt-tt">
                                <p>Thành tích cao nhất</p>
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
                                    <div class="answer answer-a"><p></p></div>
                                    <div class="answer answer-c"><p></p></div>

                                </div>
                                <div class="col-6">
                                    <div class="answer answer-b"><p></p></div>
                                    <div class="answer answer-d"><p></p></div>
                                </div>
                                <div class="time-run">
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    {{ csrf_field() }}
    <script src="js/game/game.js"></script>
</body>

</html>