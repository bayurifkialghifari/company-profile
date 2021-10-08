<!DOCTYPE html>
<html>

<head>
    <title>{{ app_name }} | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ base_url }}assets/admin/img/favicon.ico"/>
    <!-- Bootstrap -->
    <link href="{{ base_url }}assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- end of bootstrap -->
    <!--page level css -->
    <link type="text/css" href="{{ base_url }}assets/admin/vendors/themify/css/themify-icons.css" rel="stylesheet"/>
    <link href="{{ base_url }}assets/admin/vendors/iCheck/css/all.css" rel="stylesheet">
    <link href="{{ base_url }}assets/admin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet"/>
    <link href="{{ base_url }}assets/admin/css/login.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/sweetalert2/css/sweetalert2.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/css/custom_css/sweet_alert2.css">
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/sweetalert2/js/sweetalert2.min.js"></script>
    <!--end page level css-->
</head>

<body id="sign-in">
<div class="preloader">
    <div class="loader_img"><img src="{{ base_url }}assets/admin/img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 login-form">
            <div class="panel-header">
                <h2 class="text-center">
                    <img src="{{ base_url }}assets/admin/img/pages/clear_black.png" alt="Logo">
                </h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form action="#" id="authentication2" method="post" class="login_validator">
                            <div class="form-group">
                                <label for="email" class="sr-only"> E-mail</label>
                                <input type="text" class="form-control  form-control-lg" id="email" name="username"
                                       placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password"
                                       name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-primary btn-block"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{ base_url }}assets/admin/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ base_url }}assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!-- end of global js -->
<!-- page level js -->
<script type="text/javascript" src="{{ base_url }}assets/admin/vendors/iCheck/js/icheck.js"></script>
<script src="{{ base_url }}assets/admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ base_url }}assets/admin/js/custom_js/login.js"></script>
<!-- end of page level js -->

<script type="text/javascript">
    $('#authentication2').submit(ev =>
    {
        ev.preventDefault()

        let email = $('#email').val()
        let password = $('#password').val()

        $.ajax({
            url: '{{ base_url }}auth',
            method: 'post',
            data: {
                email: email,
                password: password,
            },
            success(data)
            {
                data = JSON.parse(data)

                if(data.status > 0)
                {
                    swal({
                        title: "Success",
                        text: "Login sukses !!",
                        type: "success",
                        confirmButtonColor: "#66cc99"
                    })

                    setTimeout(() => { location.href = '{{ base_url }}admin/dashboard' }, 500)
                }
                else
                {
                    swal({
                        title: "Gagal",
                        text: data.message,
                        type: "warning"
                    })
                }
            }
        })
    })
</script>
</body>

</html>
