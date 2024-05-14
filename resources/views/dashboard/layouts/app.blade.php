<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>داشبورد</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" >

    <style>
      #loader {
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000;
      }

      #loader.fadeOut {
        opacity: 0;
        visibility: hidden;
      }

      .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
      }

      @-webkit-keyframes sk-scaleout {
        0% { -webkit-transform: scale(0) }
        100% {
          -webkit-transform: scale(1.0);
          opacity: 0;
        }
      }

      @keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        } 100% {
          -webkit-transform: scale(1.0);
          transform: scale(1.0);
          opacity: 0;
        }
      }
    </style>
        <script src="https://kit.fontawesome.com/9ec39cb0cb.js" crossorigin="anonymous"></script>
        <script defer="defer" src="{{ asset('dashboard/main.js') }}"></script></head>
  <style>
       body {
        font-family: 'Cairo', sans-serif !important;
    }
    .header-name {
        height: 65px;
        min-height: 100%;
        display: flex;
        align-items: center;
        padding-inline-start: 1rem
    }
  </style>
  <body class="app">

    <div id="loader">
      <div class="spinner"></div>
    </div>

    <script>
      window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function() {
          loader.classList.add('fadeOut');
        }, 300);
      });
    </script>

    <div>
        @include('dashboard.layouts.sidebar')

      <!-- #Main ============================ -->
      <div class="page-container">
        @include('dashboard.layouts.header')

        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100">
            @yield('content')
        </main>
        <!-- ### $App Screen Footer ### -->
        @include('dashboard.layouts.footer')
      </div>
    </div>
  </body>
</html>
