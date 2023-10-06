<!--
  ============================================
  GUESTBOOK BPTIK DIKBUD 
  DEVELOPER : AJIS DZALPARO
  GITHUB    : https://github.com/ajisdzalparo
  ============================================
 -->


@extends('layouts.app')
@section('title', "Form Pengunjung")
@section('content')
<div class="background-shapes">
    <div class="triangle bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
    <div class="circle bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
    <div class="triangle-2 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
    <div class="circle-2 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500"></div>
</div>
<div class="grid grid-cols-12 my-20 lg:my-32 px-4 lg:px-0 relative">
    <div class="col-span-12 md:col-span-12 lg:col-span-7 order-2 lg:order-1">
        <form id="pengunjungForm" action="{{ route('guestbook.store') }}" method="post">
            @csrf
            <div class="flex flex-col gap-1">
                <label class="after:content-['*'] after:text-red-400 block text-sm font-semibold leading-6 text-gray-900" for="nama_lengkap">Nama Lengkap</label>
                <input class="rounded h-11 px-3 text-gray-900 ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 sm:text-sm sm:leading-6 bg-transparent" type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
            </div>
            <input type="file" accept="image/jpeg, image/png, image/jpg, image/gif" id="foto" name="foto" style="display: none;">
            <input type="hidden" id="data-gambar" name="data_gambar">
            <div class="flex flex-col gap-1 py-3">
                <label class="after:content-['*'] after:text-red-400 block text-sm font-semibold leading-6 text-gray-900" for="instansi">Instansi</label>
                <input class="rounded h-11 px-3 text-gray-900 ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 sm:text-sm bg-transparent sm:leading-6" type="text" id="instansi" name="instansi" placeholder="Nama Instansi" required>
            </div>
            <div class="flex flex-col gap-1 py-3">
                <label class="after:content-['*'] after:text-red-400 block text-sm font-semibold leading-6 text-gray-900" for="alamat">Alamat</label>
                <input class="rounded h-11 px-3 text-gray-900 ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 sm:text-sm bg-transparent sm:leading-6" type="text" id="alamat" name="alamat" placeholder="Alamat Lengkap" required>
            </div>
            <div class="flex flex-col gap-1 py-3">
                <label class="after:content-['*'] after:text-red-400 block text-sm font-semibold leading-6 text-gray-900" for="jumlah_orang">Jumlah Orang</label>
                <input class="rounded h-11 px-3 text-gray-900 ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 sm:text-sm bg-transparent sm:leading-6" type="number" id="jumlah_orang" name="jumlah_orang" min="1" placeholder="Jumlah Orang" required>
            </div>
            <div class="flex flex-col gap-1 py-3">
                <label class="after:content-['*'] after:text-red-400 block text-sm font-semibold leading-6 text-gray-900" for="keperluan">Keperluan</label>
                <select name="keperluan" id="keperluan" class="rounded h-11 px-3 text-gray-900 ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 sm:text-sm bg-transparent sm:leading-6">
                    <option value="Kunjungan">Kunjungan</option>
                    <option value="Administrasi">Administrasi</option>
                    <option value="Rapat">Rapat</option>
                    <option value="Dinas">Dinas</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="flex flex-col gap-1 py-3">
                <label class="after:content-['*'] after:text-red-400 block text-sm font-semibold leading-6 text-gray-900" for="telpon" autocomplete="tel">Telpon/WhatsApp</label>
                <input class="rounded h-11 px-3 text-gray-900 ring-1 ring-inset ring-gray-400 placeholder:text-gray-400 sm:text-sm bg-transparent sm:leading-6" type="tel" pattern="^\+62\d{1,5}\d{1,4}\d{4}$" id="telpon" name="telpon" placeholder="Contoh: +6285899999999" required>
            </div>
            <div class="flex flex-row justify-center gap-3 py-5">
                <button type="submit" class="block w-full rounded-md bg-fuchsia-600 px-3 py-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 hover:scale-105 hover:shadow-md transition-all">Simpan</button>
                <a href="{{route("welcome")}}" class="block w-full rounded-md border border-fuchsia-600 px-3 py-3 text-center text-sm font-semibold text-gray-800 shadow-sm hover:text-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 hover:scale-105 hover:shadow-md transition-all">Kembali</a>
            </div>
        </form>
    </div>
    <div class="col-span-12 md:col-span-12 lg:col-span-5 flex justify-center order-1 lg:order-2 mb-4 lg:mb-0">
        <div class="flex flex-col w-3/4 my-6 gap-3">
            <video class="rounded-lg border-2 border-gray-300 shadow-lg" id="webcam" autoplay></video>
            <canvas id="canvas" class="rounded-lg border-4 border-green-500 shadow-lg" style="display: none;"></canvas>
            <div id="hasil-foto" class="flex flex-col" style="display: none;">
                <button id="ambil-ulang" class="block w-full rounded-md bg-fuchsia-600 px-3 py-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 hover:scale-105 hover:shadow-md transition-all">Ambil Ulang</button>
                <img id="tampil-foto" src="" alt="Foto Anda" style="display: none;">
                <button id="unggah" class="my-2 block w-full rounded-md bg-green-600 px-3 py-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 hover:scale-105 hover:shadow-md transition-all">Unggah Gambar</button>
            </div>
            <button type="button" id="ambil" class="block w-full rounded-md bg-fuchsia-600 px-3 py-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 hover:scale-105 hover:shadow-md transition-all">Ambil Foto</button>
        </div>
    </div>
</div>
<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Impor SweetAlert2 -->
<script src="{{asset('js/style.js')}}"></script>
<script>
    // Tambahkan script untuk menampilkan SweetAlert ketika data berhasil disimpan
    $('#pengunjungForm').on('submit', function (e) {
        e.preventDefault();
        // Periksa apakah gambar sudah diambil
        if ($('#data-gambar').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Anda harus mengambil foto terlebih dahulu.',
            });
            return; // Jangan melanjutkan jika gambar belum diambil
        }
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message, // Pastikan response dari controller berisi pesan sukses
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mengosongkan nilai input pada formulir
                            $('#nama_lengkap').val('');
                            $('#instansi').val('');
                            $('#alamat').val('');
                            $('#jumlah_orang').val('');
                            $('#telpon').val('');

                            // Mengarahkan ke halaman welcome
                            window.location.href = '{{ route("welcome") }}';
                        }
                    });
                } else if (response.status === 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message, // Atau pesan kesalahan kustom
                    });
                } else if (response.status === 'warning') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: response.message, // Atau pesan peringatan kustom
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat mengirim data.',
                });
            }
        });
    });
</script>
@endsection
