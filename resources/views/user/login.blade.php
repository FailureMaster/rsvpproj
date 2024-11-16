<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin | Responsive Bootstrap Landing Page Template</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Themesdesign" />

    <link rel="shortcut icon" href="login/images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="login/css/bootstrap.min.css" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="login/css/materialdesignicons.min.css" />

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="login/css/style.css" />

</head>

<body>

    <!-- START -->
    <div class="account-pages">
        <div class="container">
            <div class="row g-0 bg-white align-items-center">

                <div class="col-lg-6">
                    <div class="bg-login">
                        <img src="login/images/login-bg.png" class="img-fluid" alt=""
                            style="height: 100%; width: 100%;">
                        <div class="auth-contain">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="text-center text-white my-4 p-4">
                                            <h3 style="color: #447663">Welcome to Your Event Hub</h3>
                                            <p class=" f-20 mt-3" style="color: #447663">Effortlessly manage your
                                                event’s guest list, organizers, and VIP access in one place. Whether
                                                you’re adding new
                                                administrators, organizing details, or confirming guest RSVPs, we’ve got
                                                everything you need to ensure a smooth and
                                                memorable celebration.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="auth-box">
                        <div class="mb-4 mb-md-5 text-center">
                            <a href="javascript:void(0);" class="auth-logo">
                                <img src="login/images/macavent.jpg" height="100" alt="">
                            </a>
                        </div>

                        <div class="auth-content">
                            <div class="mb-3 pb-3 text-center">
                                <h4 class="fw-normal">Welcome to <span class="fw-bold">Mike & Mae </span></h4>
                                <p class="text-muted mb-0">Wedding admin panel</p>
                            </div>
                            <form action="{{route('login.auth')}}" method="POST">
                                @csrf
                                <div class="form-floating form-floating-custom mb-3">
                                    <input type="text" class="form-control" id="input-username"
                                        placeholder="Enter Email" name="username" required>
                                    <label for="input-username">Username</label>
                                </div>

                                <div class="form-floating form-floating-custom form-password auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control" id="password-input"
                                        placeholder="Enter Password" name="password" required>
                                    <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                                        id="password-addon" name="password">
                                        <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                    </button>
                                    <label for="input-password">Password</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label text-muted f-15" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>
                                <div class="mt-3">
                                    <button class="btn  shadow-none w-100"
                                        style="background-color: #447663; color: #fff" type="submit">Log In</button>
                                </div>
                                <hr>

                            </form><!-- end form -->
                        </div><!-- auth content -->
                    </div>
                    <!-- end authbox -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- END -->

    <!-- bootstrap -->
    <script src="login/js/bootstrap.bundle.min.js"></script>
    <!-- CUSTOM JS -->
    <script src="login/js/app.js"></script>
</body>

</html>
