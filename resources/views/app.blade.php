<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Pokepedia &#9889;| JosemihMl Pokemon Database</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Template by Colorlib" />
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP" />
        <meta name="author" content="DryThemes" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link  rel="stylesheet" type="text/css" href="{{url('assets/css/style.css')}}" />
        <link rel="shortcut icon" href="{{url('assets/img/pokeball.png')}}"/>
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/css/own.css')}}" rel="stylesheet">
        <link href="{{url('assets/css/preloader.css')}}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="{{url('assets/js/preloader.js')}}"></script>
        <script src="{{url('assets/js/main-form.js')}}"></script>
    </head>
    <body>
        <div class="loaderc">
            <div class="loader">
                    <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                	 viewBox="0 0 330 331.7" enable-background="new 0 0 330 331.7" xml:space="preserve" >
                      <circle id="center" fill="#FFFFFF" cx="165" cy="165.9" r="36.5"/>
                <g id="bottom">
                <path id="bottom1" fill="#FFFFFF" d="M165,267.6c-28.7,0-54.6-11.9-73.1-31L76.2,252c22.5,23.2,53.9,37.6,88.8,37.6
                		c30.5,0,58.4-11,80-29.3l-14.6-16.5C212.7,258.6,189.9,267.6,165,267.6z"/>
                	<path id="bottom2" fill="#FFFFFF" d="M288.1,178.4l-22.1,0c-3.2,26.1-16.4,49.2-35.6,65.3l14.6,16.5
                		C268.7,240.1,284.8,211.2,288.1,178.4z"/>
                	<path id="bottom3" fill="#FFFFFF" d="M244.8,178.4C244.8,178.4,244.8,178.4,244.8,178.4l-21.8,0c-3.8,18.8-16.6,33.7-33.7,41.4l0,0
                		l8.8,19.6c-9.4,4.3-19.8,6.8-30.8,7.1l0.5,21c50.6-1.4,92-39.8,98.1-89.1L244.8,178.4z"/>
                	<path id="bottom4" fill="#FFFFFF" d="M198.2,239.5l-8.8-19.6c-7.4,3.4-15.7,5.2-24.4,5.2c-28.4,0-52.1-20-57.9-46.6l-21.8,0l-0.1,0
                		l-21.1,0c0,0.1,0,0.1,0,0.2l-0.1-0.2l-22.1,0.1c2.9,28.5,15.4,54.1,34.3,73.5l15.7-15.4l-0.1-0.2c18.5,19.2,44.5,31.1,73.2,31.1
                		c0.9,0,1.9,0,2.8,0l-0.5-21C178.4,246.2,188.8,243.7,198.2,239.5z"/>
                </g>
                <g id="top">
                	<path id="top3" fill="#FFFFFF" d="M288.1,153.2c-2.2-22.1-10.3-42.5-22.7-59.7l-17.9,12.9l-17,12.3c0.1,0.2,0.2,0.3,0.3,0.5
                		c-14.6-20.6-38.7-34-65.8-34c-40.3,0-73.7,29.5-79.8,68.1l21.9,0c5.8-26.7,29.5-46.6,57.9-46.6c28.4,0,52.1,20,57.9,46.6
                		L288.1,153.2z"/>
                	<path id="top2" fill="#FFFFFF" d="M165,64.1c-39.2,0-73.3,22.2-90.2,54.7c0,0,0,0,0,0l-19.5-10.2c-7.1,13.6-11.7,28.6-13.3,44.6
                		l22.1,0v0l21.2,0c6-38.6,39.5-68.1,79.8-68.1c7.9,0,15.6,1.2,22.8,3.3l5.9-20.2C184.6,65.6,175,64.1,165,64.1z"/>
                	<path id="top1" fill="#FFFFFF" d="M193.7,68.2l-5.9,20.2c17.4,5.1,32.4,15.9,42.7,30.3l17-12.3l17.9-12.9
                		c-15.9-22-38.8-38.6-65.5-46.4c-11.1-3.3-22.8-5-34.9-5c-47.7,0-89.1,27-109.7,66.6l19.5,10.2c17-32.5,51-54.7,90.2-54.7
                		C175,64.1,184.6,65.6,193.7,68.2"/>
                </g>
                </svg>

            </div>
        </div>
        <div id="canvas-wrap">
          	<canvas id="canvas"></canvas>
        	<div class="containerp">
        	    <div class="pokemon">
                    <div class="pokemon1">
                        <div class="nav">
                	        @guest
                	        <div class="nav1">
                          			<a class="nav11" href="{{url('login')}}" role="button">Login</a>
                         			<a class="nav11" href="{{url('register')}}" role="button">Register</a>
                         	</div>
                        	@endguest
                			@auth
                			<div class="nav1">
                			    <h3>User: {{auth() ->user() -> name}} </h3>
                				<form id="frm-logout" action="{{ route('logout') }}" method="POST">
                			        @csrf
                				<input type="submit" class="nav13" value="logout">
                				</form>
                			</div>
                			@endauth
                			 <div class="logos">
                			    <a href="{{url('.')}}">
                                <div class="pokemonsword">
                                
                                </div>
                                </a>
                            </div>
                            
                            <div class="nav3">
                			     <a class="nav31" href="{{url('pokemon')}}" role="button" > Database </a>
                			     <a class="nav31" href="{{url('post')}}" role="button" > Foro </a>
                			 </div>
                        </div>
                    </div>    
                </div>
                <div class="containerp1">
               @yield('contenido')
                 </div>
            </div>

        </div>
         <script src="{{url('assets/js/canvas.js')}}"></script>
         <script src="{{url('https://code.jquery.com/jquery-2.2.4.min.js')}}"></script>
         <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </body>
  
</html>
