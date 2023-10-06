<!--
  ============================================
  GUESTBOOK BPTIK DIKBUD 
  DEVELOPER : AJIS DZALPARO
  GITHUB    : https://github.com/ajisdzalparo
  ============================================
 -->


@extends('layouts.app')

@section('title', "History Pengunjung")

@section('content')
<div class="background-shapes">
    <div class="triangle bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
    <div class="circle bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
    <div class="triangle-2 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
    <div class="circle-2 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
</div>
<div class="container mx-auto py-8 mt-28" id="content">
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold mb-4">Daftar Tamu</h1>
        @php(setlocale(LC_TIME, 'id_ID.utf8'))
        <p class="my-2">Tanggal: {{ date('d - M / Y') }}</p>
        <div class="overflow-x-auto">
            <div class="border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap tracking-wider">
                                Nama Lengkap
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                Instansi
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Keperluan
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php($no = 1)
                        @foreach ($guests as $guest)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 ">
                                {{ $no }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    <p class="text-sm font-medium text-gray-500 uppercase">
                                        {{ $guest->nama_lengkap }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                                <p class="text-sm text-gray-500 capitalize">{{ $guest->instansi }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-normal hidden lg:table-cell">
                                <p class="text-sm text-gray-500 capitalize">{{ $guest->alamat }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-sm text-gray-500">{{ $guest->keperluan }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-sm text-gray-500">{{ $guest->jumlah_orang }} Orang</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button onclick="showGuestDetail('{{ $guest->id }}')" class="p-1 my-auto flex md:p-2 text-lg md:text-xl font-semibold leading-tight text-slate-400" title="Detail">
                                    <ion-icon name="information-outline"></ion-icon>
                                </button>
                            </td>
                        </tr>
                        @php($no++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan SweetAlert2 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                html: '<p><strong>Nama Lengkap:</strong> ' + data.nama_lengkap + '</p>' +
                    '<p><strong>Instansi:</strong> ' + data.instansi + '</p>' +
                    '<p><strong>Alamat:</strong> ' + data.alamat + '</p>' +
                    '<p><strong>Jumlah Orang:</strong> ' + data.jumlah_orang + ' Orang</p>' +
                    '<p><strong>Keperluan:</strong> ' + data.keperluan + '</p>',
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
</script>
@endsection
