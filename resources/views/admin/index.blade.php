<!--
  ============================================
  GUESTBOOK BPTIK DIKBUD 
  DEVELOPER : AJIS DZALPARO
  GITHUB    : https://github.com/ajisdzalparo
  ============================================
 -->


@extends('layouts.admin')

@section('title', "Dashboard Admin")

@section('content')
@include('layouts.app.dashboard-header')
<div class="max-w-screen mx-4 my-4 flex flex-col gap-4 bg-white py-5 px-5 rounded-xl shadow-lg animate__animated animate__fadeIn">
    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <strong class="font-bold">Kesalahan!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <form action="{{ route('dashboard') }}" method="GET" class="flex flex-col gap-2 lg:w-3/12">
        <label for="period">Pilih Periode:</label>
        <select name="period" class="border rounded-md py-2 px-2 text-gray-900 ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 sm:text-sm bg-transparent sm:leading-6">
            <option value="yearly">Pertahun</option>
            <option value="monthly">Perbulan</option>
        </select>

        <!-- Opsi untuk tahun tertentu jika memilih perbulan -->
        <label for="year">Pilih Tahun (jika perbulan): </label>
        <input class="border rounded-md py-2 px-2 text-gray-900 ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 sm:text-sm bg-transparent sm:leading-6" type="number" name="year" min="YYYY" max="YYYY" placeholder="Tahun">

        <button class="my-3 py-2 rounded-md text-white bg-gradient-to-tl from-purple-700 to-pink-500 w-full" type="submit">Tampilkan Statistik</button>
    </form>

    <!-- Tampilkan chart batang dan pie -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 py-6">
        <div class="chart py-10 lg:py-0" style="height: 400px;"> <!-- Atur tinggi di sini -->
            <h2 class="text-lg font-semibold">Grafik Kunjungan</h2>
            {!! $barChart->container() !!}
            {!! $barChart->script() !!}
        </div>
        <div class="chart" style="height: 400px;"> <!-- Atur tinggi di sini -->
            <h2 class="text-lg font-semibold">Grafik Keperluan</h2>
            {!! $pieChart->container() !!}
            {!! $pieChart->script() !!}

        </div>
    </div>
</div>
@endsection
