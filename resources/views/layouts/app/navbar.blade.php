<!--
  ============================================
  GUESTBOOK BPTIK DIKBUD 
  DEVELOPER : AJIS DZALPARO
  GITHUB    : https://github.com/ajisdzalparo
  ============================================
 -->

<div x-data="{open: false}">
<nav class="px-4 py-4 lg:py-6 backdrop-blur-sm bg-transparent fixed top-0 w-full z-10">
  <div class="container xl:max-w-screen-lg 2xl:max-w-screen-xl mx-auto lg:flex justify-between items-center">
      <div class="flex justify-between items-center">
        <!-- Logo -->
        <a href="{{route('welcome')}}"><img src="/image/logo.svg" alt="logo bptik" class="w-40 md:w-40 xl:w-40"></a>
        <button class="lg:hidden">
          <!-- Toggle Button -->
          <img @click="open = ! open" src="/icons/toggle.svg" alt="logo bptik" class="w-8 md:w-11">
        </button>
      </div>
      <ul class="gap-16 hidden lg:flex">
        <li class="text-black hover:opacity-50 transition-all"><a class="font-normal text-base" href="{{ url('/') }}">Home</a></li>
        <li class="text-black hover:opacity-50 transition-all"><a class="font-normal text-base" href="{{ url('guestbook') }}">Buku Tamu</a></li>
        <li class="text-black hover:opacity-50 transition-all"><a class="font-normal text-base" href="{{ url('guest') }}">Daftar Tamu</a></li>
      </ul>
    </div>
  <!-- </div> -->
</nav>
<div class="container lg:hidden">
  <div class="fixed bottom-0 right-0 left-0 px-4 py-4 bg-white z-50" x-show="open" x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0 scale-90"
  x-transition:leave="transition ease-in duration-300"
  x-transition:leave-start="opacity-100 scale-100"
  x-transition:leave-end="opacity-0 scale-90">
    <ul class="flex flex-row justify-between">
      <li>
        <a href="{{ url('/') }}" class="flex justify-center flex-col items-center gap-1 text-fuchsia-600">
          <ion-icon name="home-outline"></ion-icon>
          <span class="text-xs font-normal" >Home</span>
        </a>
      </li>
      <li>
        <a href="{{ url('guestbook') }}" class="flex justify-center flex-col items-center gap-1 text-fuchsia-600">
          <ion-icon name="book-outline"></ion-icon>
          <span class="text-xs font-normal">Buku Tamu</span>
        </a>
      </li>
      <li>
        <a href="{{ url('guest') }}" class="flex justify-center flex-col items-center gap-1 text-fuchsia-600">
          <ion-icon name="list-outline"></ion-icon>
          <span class="text-xs font-normal">Daftar Tamu</span>
        </a>
      </li>
    </ul>
  </div>
</div>
</div>