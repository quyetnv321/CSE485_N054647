<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/manage.css" /> 

    <title>Admin</title>
</head>
<body class = "body-ad">
    <div class = "container-fluid">
        <div class = "row" id = "header">
            <h2>Administrator</h2>
        </div>
        <div class = "row box-content">
            <div class = "col-md-5 wrap">
                <h3>Tài khoản: <?= $_SESSION['login'] ?></h3>
                <a href="{{ route('logout.admin') }}">Đăng xuất</a>
                
            </div>
            <div class = "col-md-7 wrap">
                <div class="wrap-form">
                    <h3>Upload câu hỏi</h3>
                    @if(!empty($errors->first()))
                        <p id="up-success">{{ $errors->first() }}</p>
                    @endif
                    <form method="post" enctype="multipart/form-data" action="{{ route('upQuestion.admin') }}">
                        <input type ="hidden" name="_token" value="{{@csrf_token()}}">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Câu hỏi</label>
                            <textarea type="text" id="txtarea-noidung" class="form-control"  placeholder="Nội dung câu hỏi" name = "thread" required></textarea>
                        </div>
                        <p for="exampleFormControlSelect1">Câu trả lời</p>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án A" name="answerA" required="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án B" name="answerB" required="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án C" name="answerC" required="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án D" name="answerD" required="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <label for="exampleFormControlSelect1">Thời gian</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" style="margin: 0;" placeholder="15s" name="time-question" required="" disabled>
                        </div>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <label for="exampleFormControlSelect1">Level câu hỏi</label>
                            <select class="form-control" id="exampleFormControlSelect1" name = "level" required>
                                <option value = "">Chọn</option>
                                <option value = "1">Level 1</option>
                                <option value = "2">Level 2</option>
                            </select>      
                        </div>
                        <div class="form-group col-md-12 col-xs-12 tl">
                            <label for="exampleFormControlSelect1">Đáp án đúng</label>
                            <select class="form-control" id="exampleFormControlSelect1" name = "rightAnswer" required>
                                <option value = "">Chọn</option>
                                <option value = "1">Đáp án A</option>
                                <option value = "2">Đáp án B</option>
                                <option value = "3">Đáp án C</option>
                                <option value = "4">Đáp án D</option>
                            </select>      
                        </div>
                        <div class="form-group btn-submit">
                                <button type="submit" class="btn btn-primary" name = "up">Upload</button>
                        </div>  
                    </form>
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>