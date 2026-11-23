<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lawyer regesrtation</title>
     <link rel="icon" href="img/logo Lawyer.png" type="image/png">
    <style>
        input
        {
            padding: 10px;
            width: 100%;
            
        }
      body, html {
      height: 100%;
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-image: url('img/ChatGPT Image Jun 14, 2025, 11_27_53 PM.png'); /* update path if needed */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    input{
        background-color: rgba(0, 0, 0, 0.28);
        border-radius: 5px;
        border: 1px solid rgb(255, 255, 255);
        color: white !important;
    }

    .placeholder{
        color: white !important;
    }
    label{
        color: white !important;
        
    }
    .mh{
        color: white !important;
        text-align: center;
    }
    .button2{
       width: 100%;
    }
    select{
        width: 100%;
    }
    img{
        height: 60px !important;
        margin-top: -10px;
        width: 60px !important;
    }
    .text-center{
        color: white
    }
    @media (min-width: 767px){
	.navbar-brand img{
		position: relative;
        bottom:10px;
        height:58px !important;
		
	}
		
}
    @media (min-width: 390px){
	.navbar-brand img{
		position: relative;
        bottom:10px;
        height:58px !important;
		
	}
		
}
    @media (min-width: 767px){
	.navbar-brand img{
		position: relative;
        bottom:10px;
        height:58px !important;
		
	}
		
}


    
    </style>
    <link href="user/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="user/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="user/assets/css/owl.carousel.theme.min.css" rel="stylesheet">
    <link href="user/assets/css/main.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body data-spy="scroll" data-target="#main-navbar">

    <!-- NavigationBar Section -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img class="img-responsive" src="img/logo Lawyer.png" alt="logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="/#header">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="/#choose">Why us</a></li>
                    <li><a href="/#practice">practice</a></li>
                    <li><a href="/#slider-1">Cases</a></li>
                    <li><a href="/#team">Our Team</a></li>
                    <li><a href="/#clients">Clients</a></li>
                    <li><a href="/#faq">FAQ</a></li>
                    <li><a href="/#contact">Contact</a></li>
                    @auth
                    
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link navbar-btn nb2">Logout</button>
                        </form>
                    </li>
                    
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    
                    
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                    

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <br>
    <br><br>
    <BR>
    <div class="container ">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
       @if(Auth::user()->lawyer_request == 'Pending')
       <br><br>
       <div class="text-center">
       <h3>Application already submitted</h3>
       <p>Dear user, wait for the approval from the admin</p>
       <hr>
       <p>You will be notified shortly</p>
       <a href="/">Return To Home</a>
       </div>
       @else
        <h2 class="mh">Become a Lawyer</h2>
        <hr>
        <form action="/lawyerrequest/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Enter Name</label>
        <input type="text" class="p-1 w-100" placeholder="Enter name" value="{{Auth::user()->name}}" readonly>
        <br><br>
        <label for="">Enter Email</label>
        <input type="text" class="p-1 w-100" placeholder="Enter email" value="{{Auth::user()->email}}" readonly>
        <br><br>
        <label for="">Upload CNIC</label>
        <input type="file" class="p-1 w-100" name="lawyercnic" placeholder="Enter email"  readonly>
        <br><br>
         <label for="">Upload profile image</label>
        <input type="file" class="p-1 w-100" name="lawyer_image" placeholder="Enter email"  value="{{Auth::user()->lawyer_image}}" readonly>
        <br><br>

        <label for="">Enter Phone Number</label>
        <input type="text" class="p-1 w-100" name="lawyerphone" class="pl" placeholder="Enter phone"  >
        <br><br>
         <label for="">Upload Certificate</label>
         <input type="file" class="p-1 w-100" name="lawyercertificate" placeholder="Enter email"  >
         <br><br>
         <select name="lawyercategory" id="" Auth::user()->lawyer_category>
            <option value="Family">Family</option>
            <option value="Property">Property</option>
            <option value="Accidental">Accidental</option>
            <option value="Personal">Personal Injury</option>  
            <option value="Other">Other</option>
         </select>
         <br><br>
         <button type="submit" class="btn btn-primary button2">Submit Request</button>
        <br>
        </form>
       @endif

    </div>
    <br>
    <br>
    <br>
    <br>
    <!-- Footer -->
    <footer class="footer" style="position: fixed;width:100%;bottom:0px">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>
                        @ Legal Connect
                    </p>
                </div>
                <div class="col-sm-6">
                    <div class="footer-social">
                        <a href="#"><i class="ion-social-facebook"></i></a>
                        <a href="#"><i class="ion-social-linkedin-outline"></i></a>
                        <a href="#"><i class="ion-social-skype-outline"></i></a>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>



        
    </footer>

    <!-- Scripts -->
    <script src="user/assets/js/jquery-1.12.3.min.js"></script>
    <script src="user/assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script src="user/assets/js/owl.carousel.min.js"></script>
    <script src="user/assets/js/script.js"></script>
</body>
<style>
    html {
  scroll-behavior: smooth;
}

   </style>
</html>