const video = document.getElementById('webcam');
const canvas = document.getElementById('canvas');
const ambilButton = document.getElementById('ambil');
const ambilUlangButton = document.getElementById('ambil-ulang');
const unggahButton = document.getElementById('unggah');
const hasilFoto = document.getElementById('hasil-foto');
const tampilFoto = document.getElementById('tampil-foto');
const dataGambarInput = document.getElementById('data-gambar'); // Input data gambar
const fotoInput = document.getElementById('foto'); // Input file foto

let imageData = null;

// Mengakses kamera
navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) {
        video.srcObject = stream;
    })
    .catch(function(error) {
        console.error('Gagal mengakses kamera:', error);
    });

// Mengambil foto dari kamera
ambilButton.addEventListener('click', function() {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Menampilkan hasil foto
    video.style.display = 'none';
    canvas.style.display = 'block';
    hasilFoto.style.display = 'block';

    // Menyembunyikan tombol "Ambil Foto" ketika tombol tersebut diklik
    ambilButton.style.display = 'none';

    // Menampilkan tombol "Unggah Gambar" ketika foto sudah diambil
    unggahButton.style.display = 'block';

    // Menyimpan foto ke dalam variabel imageData
    imageData = canvas.toDataURL('image/jpeg');

    // Menampilkan foto di preview
    tampilFoto.src = imageData;
});

// Mengambil ulang foto
ambilUlangButton.addEventListener('click', function() {
    video.style.display = 'block';
    canvas.style.display = 'none';
    hasilFoto.style.display = 'none';

    // Menampilkan kembali tombol "Ambil Foto" ketika tombol "Ambil Ulang" diklik
    ambilButton.style.display = 'block';

    // Menyembunyikan tombol "Unggah Gambar" ketika mengambil ulang foto
    unggahButton.style.display = 'none';

    // Menghapus data foto yang sebelumnya diambil
    imageData = null;

    // Menghilangkan foto di preview
    tampilFoto.src = '';
    tampilFoto.style.display = 'none';
});

// Mengunggah foto ke server saat tombol "Unggah Gambar" diklik
unggahButton.addEventListener('click', function() {
    if (imageData) {
        dataGambarInput.value = imageData; // Mengisi data gambar ke input hidden
        fotoInput.value = ''; // Mengosongkan input file foto

        // Tambahkan SweetAlert setelah mengunggah gambar
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Gambar berhasil diunggah.',
        });
    } else {
        // Tampilkan SweetAlert jika pengguna belum mengambil foto
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Anda belum mengambil foto.',
        });
    }
});