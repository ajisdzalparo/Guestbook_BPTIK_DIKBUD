<footer class="py-4">
  <div class="px-6 mx-auto items-center">
    <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
      <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left inline-block">
          ©
          <script>
            document.write(new Date().getFullYear() + ",");
          </script>
          made with <i class="fa fa-heart"></i> by
          <a href="https://jateng-pintar.teknoreka.com/" class="font-semibold text-slate-700" target="_blank">BPTIK DIKBUD JATENG</a>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
          <li class="nav-item">
            <a href="{{route('welcome')}}" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500" target="_blank">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{route('guestbook')}}" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500" target="_blank">Buku Tamu</a>
          </li>
          <li class="nav-item">
            <a href="{{route('guest')}}" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500" target="_blank">Tamu Hari Ini</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>