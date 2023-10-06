<!--
  ============================================
  GUESTBOOK BPTIK DIKBUD 
  DEVELOPER : AJIS DZALPARO
  GITHUB    : https://github.com/ajisdzalparo
  ============================================
 -->


@extends('layouts.admin')

@section('title', "Daftar Tamu")

@section('content')
  <style>
    /* Menggunakan CSS untuk mengatasi teks yang terlalu panjang */
    .table td,
    .table th {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

  </style>
  @include('layouts.app.guestlist-header')

  <div class="w-full px-2 md:px-6 py-6 mx-auto animate__animated animate__fadeIn">
    <!-- table 1 -->
    <div class="flex flex-wrap">
      <div class="flex-none w-full max-w-full md:px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex justify-center md:justify-between gap-4 flex-col sm:flex-row items-center p-6 pb-0 mb-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h1 class="text-2xl">Daftar Tamu</h1>
            <div class="flex justify-center items-center border rounded-md border-gray-300 overflow-hidden">
              <input type="text" id="searchInput" class="py-2 px-3 w-full active:rounded-md focus:rounded-md focus:rounded-r-none active:rounded-r-none" name="query" placeholder="Search...">
              <button type="submit" id="searchButton"><ion-icon name="search-outline" class="text-2xl px-3 border-l bg-slate-100 py-2"></ion-icon></button>
            </div>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto lg:overflow-x-hidden flex flex-col justify-center">
            <table class="w-full table-auto mb-4 md:mb-0 align-top border-gray-200 text-slate-500 table">
                <thead class="align-bottom">
                  <tr>
                    <th class="px-3 py-2 md:py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs md:text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                    <th class="px-3 py-2 md:py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs md:text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Lengkap</th>
                    <th class="px-3 py-2 md:py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs md:text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hidden lg:table-cell">Instansi</th>
                    <th class="px-3 py-2 md:py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs md:text-xs border-b-solid tracking-none whitespace-normal text-slate-400 opacity-70 hidden md:table-cell">Keperluan</th>
                    <th class="px-3 py-2 md:py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs md:text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No. Telpon</th>
                    <th class="px-3 py-2 md:py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs md:text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal</th>
                    <th class="px-3 py-2 md:py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs md:text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($guests as $guest)
                  <tr>
                    <td class="p-2 md:p-3 text-center align-middle bg-transparent border-b md:border-none whitespace-nowrap shadow-transparent">
                      <span class="text-xxs md:text-xs font-semibold leading-tight text-slate-400">{{ ($guests->currentPage() - 1) * $guests->perPage() + $loop->index + 1 }}</span>
                    </td>
                    <td class="p-2 md:p-3 align-middle bg-transparent border-b md:border-none whitespace-nowrap shadow-transparent">
                      <div class="flex items-center">
                        <img src="{{ asset('uploads/' . $guest->foto) }}" alt="user1" class="w-10 h-10 md:w-12 md:h-12 mr-2 rounded-full object-cover">
                        <div class="flex flex-col">
                          <h6 class="mb-1 text-xs md:text-sm leading-normal font-semibold uppercase text-ellipsis overflow-hidden" title="{{ $guest->nama_lengkap }}">{{ $guest->nama_lengkap }}</h6>
                          <p class="mb-0 text-xxs md:text-xs text-slate-400 capitalize text-ellipsis overflow-hidden" style="white-space: pre-wrap; word-break: break-word;">{{$guest->instansi}}</p>
                        </div>
                      </div>
                    </td>
                    <td class="p-2 md:p-3 align-middle bg-transparent border-b md:border-none whitespace-normal shadow-transparent hidden lg:table-cell" style="max-width: 200px;">
                      <p class="mb-0 text-xs md:text-sm font-semibold leading-tight uppercase text-ellipsis overflow-hidden">{{$guest->instansi}}</p>
                      <p class="mb-0 text-xxs md:text-xs leading-tight text-slate-400 capitalize" style="white-space: pre-wrap; word-break: break-word;">{{$guest->alamat}}</p>
                    </td>
                    <td class="p-2 md:p-3 align-middle bg-transparent border-b md:border-none whitespace-normal shadow-transparent hidden md:table-cell" style="max-width: 200px;">
                      <p class="mb-0 text-xs md:text-sm font-semibold leading-tight uppercase">{{$guest->jumlah_orang}} Orang</p>
                      <p class="mb-0 text-xxs md:text-xs leading-tight text-slate-400" style="white-space: pre-wrap; word-break: break-word;">{{$guest->keperluan}}</p>
                    </td>
                    <td class="p-2 md:p-3 text-center align-middle bg-transparent border-b md:border-none whitespace-nowrap shadow-transparent">
                      <span class="text-xxs md:text-xs font-semibold leading-tight text-slate-400">{{$guest->telpon}}</span>
                    </td>
                    <td class="p-2 md:p-3 text-center align-middle bg-transparent border-b md:border-none whitespace-nowrap shadow-transparent">
                      <span class="text-xxs md:text-xs font-semibold leading-tight text-slate-400">{{$guest->created_at}}</span>
                    </td>
                    <td class="p-2 md:p-3 align-middle bg-transparent border-b md:border-none whitespace-nowrap shadow-transparent">
                      <div class="flex justify-center items-center">
                        <button onclick="showGuestDetail('{{ $guest->id }}')" class="p-1 my-auto flex md:p-2 text-lg md:text-xl font-semibold leading-tight text-slate-400" title="Detail">
                          <ion-icon name="information-outline"></ion-icon>
                        </button>
                        <form action="{{ route('delete', ['id' => $guest->id]) }}" method="post" class="flex my-auto delete-form" data-guest-name="{{ $guest->nama_lengkap }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="p-1 md:p-2 text-lg md:text-xl font-semibold leading-tight text-slate-400" title="Hapus">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>

                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="px-4 py-6 justify-center hidden md:flex overflow-x-auto w-full mt-4 border-t border-gray-200 rounded-b-2xl items-center">
                {{ $guests->links('layouts.vendor.pagination.custom-pagination-desktop') }}
              </div>
            </div>
          </div>
          <div class="px-4 md:hidden overflow-x-auto w-full mt-4 bg-white pb-10 rounded-b-2xl items-center">
              {{ $guests->links('layouts.vendor.pagination.custom-pagination') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<!-- Tambahkan SweetAlert2 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function showGuestDetail(guestId) {
    // Ajukan permintaan AJAX untuk mengambil data detail pengunjung berdasarkan ID
    $.ajax({
        type: 'GET',
        url: '/guest/' + guestId, // Ganti sesuai dengan rute yang sesuai di aplikasi Anda
        success: function (data) {
            // Menampilkan detail pengunjung dalam SweetAlert2
            Swal.fire({
                title: 'Detail Tamu',
                title: 'Detail Tamu',
                html: '<p><strong>Nama Lengkap:</strong> ' + data.nama_lengkap + '</p>' +
                    '<p><strong>Instansi:</strong> ' + data.instansi + '</p>' +
                    '<p><strong>Alamat:</strong> ' + data.alamat + '</p>' +
                    '<p><strong>Jumlah Orang:</strong> ' + data.jumlah_orang + ' Orang</p>' +
                    '<p><strong>Keperluan:</strong> ' + data.keperluan + '</p>' +
                    '<p><strong>Telpon/WhatsApp:</strong> ' + data.telpon + '</p>',
                imageUrl: '/uploads/' + data.foto, // Ganti sesuai dengan direktori gambar Anda
                imageAlt: 'Foto Tamu',
                confirmButtonText: 'Tutup',
                onRender: function() {
                    // Mengatur properti object-fit pada gambar
                    $('.swal2-image').css({
                        'object-fit': 'cover',
                        'max-width': '100%',
                        'max-height': '100%'
                    });
                }
            });
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan saat mengambil data.'
            });
        }
    });
}
    // search
    $(document).ready(function () {
        $("#searchButton").on("click", function () {
            var searchTerm = $("#searchInput").val().toLowerCase();

            $("table tbody tr").each(function () {
                var guestName = $(this).find("td:eq(1)").text().toLowerCase();

                if (guestName.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });

    // Tambahkan konfirmasi saat tombol hapus diklik
    $(document).on("click", "form.delete-form button[type=submit]", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");
        var guestName = form.data("guest-name");

        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Anda yakin ingin menghapus tamu ' + guestName + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

</script>


