<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Sport club </title>

    <!-- color sceme -->
    <link rel="stylesheet" href="assets/css/colorvariants/default.css" id="defaultscheme">

    <!-- font-awesome -->
    <!-- Bootstrap-5 -->
    <link rel="stylesheet" href="{{ url('front/css/bootstrap.min.css') }}">

    <!-- custom-styles -->
    <link rel="stylesheet" href="{{ url('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('front/css/responsive.css') }} ">
    <link rel="stylesheet" href="{{ url('front/css/animation.css') }} ">

    <!-- color switcher -->
</head>

<body>
    <main>
        <div class="logo">
            <div class="logo-icon">
                <img height="100" src="https://greensportclub.com/front/assets/images/logo.png" alt="BeRifma">
            </div>

        </div>
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="c-order tab-sm-100 col-md-6">

                        <!-- side -->
                        <div class="left">
                            <div class="left-img">
                                <img src="{{ url('front/images/left-bg.gif') }}" alt="BeRifma">
                            </div>


                        </div>
                    </div>
                    <div class="tab-sm-100 offset-md-1 col-md-5">
                        <div class="right">

 

                            <form action="{{url('result')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">

                                    <div class="input-field">
                                        <label><i
                                                class="fa-regular
                                                    fa-user"></i>phone
                                            number <span>*</span></label>
                                        <input required type="text" name="phone" placeholder="Type your phone">
                                        <span></span>
                                    </div>



                                    <div class="input-field">
                                        <label><i
                                                class="fa-regular
                                                    fa-user"></i> 
                                            Birth Date <span>*</span></label>
                                        <input required type="date" name="birth_date" placeholder="Type birth date">
                                        <span></span>
                                    </div>







                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="submit text-center col-lg-12" style="text-align: center;">
                                            <button type="submit" class="  btn-primary">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>





                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-shape">
            <img src="{{ url('front/images/top-left.png') }}" alt="">
        </div>
        <div class="right-shape">
            <img src="{{ url('front/images/top-right.png') }}" alt="">
        </div>

    </main>


    <div id="error">

    </div>

    <!-- colorswitcher -->
</body>

</html>
