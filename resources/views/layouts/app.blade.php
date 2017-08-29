<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mini-Url</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    @yield('css')

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Mini-Url</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/login">Daxil ol</a></li>
                    <li><a href="/register">Qeydiyyat</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/dash">Profil</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" style="color: #b92c28;"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Çıxış
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                    <li><a href="https://github.com/TunayNovruzov/mini-link" target="_blank">Github</a></li>
            </ul>
        </div>
    </div>
</nav>
@yield('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Mini-Url Vasitəsilə qısaldılmış link sayı:</h1>
            <div id="count" class="text-center">
                {{count(\App\Url::withTrashed()->get())}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            @if (Auth::guest())
            <p style="padding: 1.8%;font-size: 20px;"><a href="/register">Qeydiyyatdan keç</a> qısaltdığın  linklər haqqında statistikanı öyrən</p>
            @else
                <br><br><br>
            @endif
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });

        $(window).scroll(function() {
            $(".slideanim").each(function(){
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>
@yield('js')
</body>

