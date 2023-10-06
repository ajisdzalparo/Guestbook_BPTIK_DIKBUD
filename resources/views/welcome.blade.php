<!--
  ============================================
  GUESTBOOK BPTIK DIKBUD 
  DEVELOPER : AJIS DZALPARO
  GITHUB    : https://github.com/ajisdzalparo
  ============================================
 -->


@extends('layouts.app')

@section('title', "Welcome to BPTIK DIKBUD")

@section('content')
  <div class="background-shapes">
      <div class="home-circle1 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
      <div class="home-circle2 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
  </div>
    <div class="grid grid-cols-12 justify-center items-center lg:min-h-screen">
        <div class="col-span-12 lg:col-span-4 order-2 lg:order-1">
          <span class="text-sm font-semibold text-fuchsia-500 flex justify-center lg:justify-start mt-7">Selamat Datang di..</span>
          <h1 class="font-bold text-2xl md:text-4xl lg:text-4xl leading-tight text-center lg:text-start py-4">
            BPTIK DIKBUD<br>
            <span class="font-bold text-4xl md:text-6xl lg:text-6xl relative inline-block">
              <span class="bg-gradient-to-r from-fuchsia-600 to-purple-700 text-transparent bg-clip-text">
                Guest Book
              </span>
            </span>
          </h1>
          <p class="text-base w-3/4 md:text-xl lg:text-[16px] lg:w-5/6 lg:font-normal mx-auto lg:mx-0 text-center lg:text-start md:w-1/2 text-gray-900 py-4 mb-8">Balai Pengembangan Teknologi Informasi Dan Komunikasi Pendidikan Dan Kebudayaan Provinsi Jawa Tengah.</p>
          <div class="flex flex-col justify-center lg:justify-start gap-2 lg:gap-8 w-full">
            <a href="{{ url('guestbook') }}" class="md:order-2 order-1 lg:order-1 text-center mx-auto lg:mx-0 py-3 md:py-6 lg:py-3 w-3/4 lg:w-full rounded-md text-white text-[14px] md:text-[16px] lg:text-base font-semibold hover:scale-105 transition-all bg-gradient-to-tl from-fuchsia-600 to-purple-700 hover:shadow-lg">ISI BUKU TAMU</a>
            <div class="md:order-1 order-2 lg:order-2 flex flex-col gap-1 md:gap-4 justify-center items-center lg:items-start lg:mx-0 py-3">
              <div>
                <span class="text-xs font-bold text-gray-900">IKUTI KAMI:</span>
              </div>
              <div class="flex gap-3 justify-center lg:justify-start">
                <a class="text-gray-900 text-2xl md:text-[35px] lg:text-[32px] transition-all hover:text-fuchsia-600 hover:scale-125" href="{{url('https://web.facebook.com/bptikpjateng')}}" target="_black"><ion-icon name="logo-facebook"></ion-icon></a>
                <a class="text-gray-900 text-2xl md:text-[35px] lg:text-[32px] transition-all hover:text-fuchsia-600 hover:scale-125" href="{{url('https://www.instagram.com/bptik_dikbud/')}}" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
                <a class="text-gray-900 text-2xl md:text-[35px] lg:text-[32px] transition-all hover:text-fuchsia-600 hover:scale-125 scroll-my-2" href="{{url('https://www.youtube.com/@BPTIKDIKBUDJATENG')}}" target="_blank"><ion-icon name="logo-youtube"></ion-icon></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 lg:col-span-8 order-1 lg:order-2 justify-center flex lg:justify-end items-center">
          <img src="/image/gambarhero.svg" class="w-4/5">
        </div>
    </div>
@endsection
