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
                <h3>Tài khoản</h3>
               
                <form action = "" method = "post">
                    
                </form>
            </div>
            <div class = "col-md-7 wrap">
                <div class="wrap-form">
                    <h3>Upload câu hỏi</h3>
                    <form method="post" enctype="multipart/form-data" action="">
                        
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Câu hỏi</label>
                            <textarea type="text" id="txtarea-noidung" class="form-control"  placeholder="Nội dung câu hỏi" name = "thread" required></textarea>
                        </div>
                        
                        <p for="exampleFormControlSelect1">Câu trả lời</p>

                        <div class="form-group col-md-6 col-xs-12 tl">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án A" name="answer-a" required="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án B" name="answer-b" required="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án C" name="answer-c" required="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 tl">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án D" name="answer-d" required="">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 tl">
                            <label for="exampleFormControlSelect1">Đáp án đúng</label>
                            <select class="form-control" id="exampleFormControlSelect1" name = "right-answer" required>
                                <option value = "">Chọn</option>
                                <option value = "right-a">Đáp án A</option>
                                <option value = "right-b">Đáp án B</option>
                                <option value = "right-c">Đáp án C</option>
                                <option value = "right-d">Đáp án D</option>
                            </select>      
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