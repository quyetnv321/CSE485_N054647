<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" href="plugin/bootstrap-grid.min.css"> -->
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <title>Đăng ký tài khoản</title>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Form đăng ký</h2>
                    <div>
                        @if(Session::has('done'))
                            <p id="regis-done">{{Session::get('done')}}</p>
                        @endif
                        @if(Session::has('fails'))
                            <p id="regis-fails">{{Session::get('fails')}}</p>
                        @endif
                    </div>
                    <form method="POST" action="{{route('register')}}" id="register-form">
                    <input type ="hidden" name="_token" value="{{@csrf_token()}}">
                    
                        <div class="input-group">
                            <label class="label">Tên tài khoản</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <input class="input--style-4" type="text" id = "userName" required name="userName">
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Mật khẩu</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <input class="input--style-4" type="password" id="pass" required name="pass">
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Nhập lại mật khẩu</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <input class="input--style-4" type="password" id="passA" required name="passA">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group">
                                <label class="label">Họ và Tên</label>
                                <input class="input--style-4" type="text" id="full_name" required name="full_name">
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Ngày sinh</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" required name="birthday" id="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Giới tính</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Nam
                                            <input type="radio" checked="checked" value = '1' required name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Nữ
                                            <input type="radio" value = '0' required name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" id="email" required name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Số điện thoại</label>
                                    <input class="input--style-4" type="text" id="phone" required name="phone">
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script>
    $(document).ready(function() {
        $("#register-form").validate({
            rules: {
                userName: {
                    required: true,
                    minlength: 3,
                },
                pass: {
                    required: true,
                    minlength: 6,
                },
                passA: {
                    equalTo: "#pass"
                },
                email: {
                    required: true,
                    email: true,
                },
                phone: {
                    require: true,
                    minlength: 9
                },
                full_name: {
                    require: true,
                    minlength: 5,
                }
            },
            messages: {
                userName: {
                    required: "Vui lòng nhập tên tài khoản",
                    minlength: "Tên tài khoản phải dài hơn 3 ký tự",
                },
                pass: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải dài hơn 6 ký tự",
                },
                passA: {
                    required: "Vui lòng nhập lại mật khẩu",
                    equalTo: "Mật khẩu nhập lại không đúng",
                },
                email: {
                    required: "Vui lòng nhập email",
                    email: "Không đúng định dạng email",
                },
                phone: {
                    required: "Vui lòng nhập sđt",
                    minlength: "Không đúng định dạng số điện thoại"
                },
                full_name: {
                    required: "Vui lòng nhập tên của bạn",
                    minlength: "Tên dài hơn 5 ký tự",
                },
            }
        })
    })
    </script>
</body>

</html>