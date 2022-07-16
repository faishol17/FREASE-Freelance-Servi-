<!DOCTYPE html>
<html x-data="data()" lang="en">
    <head> 
        @include('includes.dashboard.meta') 
        <title>@yield('title') | FREASE</title> 

        @stack('before-style') 
        @include('includes.dashboard.style') 
        @stack('after-style') 
         <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
    </head>
<body class="antialiased">
     <div class="flex h-screen bg-serv-services-bg">  
				@include('admin.sidebar_lg')
            <div class="flex flex-col flex-1 w-full">
                @yield('content')
            </div>
        </div>
        @stack('before-script')
        @include('includes.dashboard.script')
        @stack('after-script')
    </body>
</html> 