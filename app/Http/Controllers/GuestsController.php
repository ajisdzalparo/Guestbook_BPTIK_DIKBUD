<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class GuestsController extends Controller
{
    public function index(){
        // Mengatur lokasi (locale) ke "id_ID" (Indonesia)
        Carbon::setLocale('id_ID');
        $today = Carbon::today();
        $guests = Guest::OrderBy('created_at', 'desc')->whereDate('created_at', $today)->get();

        return view('guestbook.history', compact('guests'));
    }

    public function create()
    {
        return view('guestbook.guestbook');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jumlah_orang' => 'required|integer',
            'keperluan' => 'required|string|max:255',
            'telpon' => 'required|string|max:255|regex:/^\+62\d{1,5}\d{1,4}\d{4}$/',
            'data_gambar' => 'required',
        ]);

        if ($validator->fails()) {
            \Log::error('Validasi Gagal', $validator->errors()->all());
            return response()->json(['status' => 'error', 'message' => 'Validasi gagal!']);
        }
        

        // Periksa apakah pengguna telah mengambil gambar
        if (!$request->has('data_gambar')) {
            return response()->json(['status' => 'error', 'message' => 'Anda harus mengambil foto terlebih dahulu.']);
        }

        // Cek apakah ada data pengunjung untuk hari ini dengan nama dan instansi yang sama
        $today = Carbon::today();
        $existingGuest = Guest::whereDate('created_at', $today)
            ->where('nama_lengkap', $request->nama_lengkap)
            ->where('instansi', $request->instansi)
            ->first();

        if ($existingGuest) {
            // Data pengunjung dengan nama dan instansi yang sama sudah ada untuk hari ini
            return response()->json(['status' => 'warning', 'message' => 'Data pengunjung dengan nama dan instansi yang sama sudah ada untuk hari ini.']);
        }

        // Lanjutkan menyimpan data pengunjung jika tidak ada data yang sama
        $guestbook = new Guest();
        $guestbook->nama_lengkap = $request->nama_lengkap;
        $guestbook->instansi = $request->instansi;
        $guestbook->alamat = $request->alamat;
        $guestbook->jumlah_orang = $request->jumlah_orang;
        $guestbook->keperluan = $request->keperluan;
        $guestbook->telpon = $request->telpon;

        // Simpan data gambar ke dalam database
        $imageData = $request->data_gambar;
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageName = time() . '.jpeg';

        // Simpan gambar ke dalam direktori yang ditentukan
        file_put_contents(public_path('uploads/' . $imageName), base64_decode($imageData));

        $guestbook->foto = $imageName;

        // Simpan data pengunjung ke database
        $guestbook->save();

        return response()->json(['status' => 'success', 'message' => 'Data pengunjung berhasil disimpan.']);
    }

    public function show($id)
    {
        // Mengambil data pengunjung berdasarkan ID
        $guest = Guest::find($id);

        if (!$guest) {
            // Handle jika data tidak ditemukan
            return abort(404);
        }

        return response()->json($guest);
    }
}
