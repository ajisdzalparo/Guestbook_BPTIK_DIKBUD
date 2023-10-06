<!--
  ============================================
  GUESTBOOK BPTIK DIKBUD 
  DEVELOPER : AJIS DZALPARO
  GITHUB    : https://github.com/ajisdzalparo
  ============================================
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{asset("assets/img/favicon.png")}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/img/apple-icon.png")}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To BPTIK DIKBUD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Vite -->
    @vite('resources/css/app.css')
    
  </head>
  <body class="bg-gray-50 w-screen overflow-x-hidden">
    @include('layouts.app.navbar')
    <section class="my-24 lg:my-0 mx-5">
      <div class="container xl:max-w-screen-lg 2xl:max-w-screen-xl mx-auto">
        @yield('content')
      </div>
    </section>
  <!-- Alpine js -->
  <script src="https://unpkg.com/alpinejs" defer></script>
  <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>
