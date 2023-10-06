<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Charts\GuestChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $all = Guest::count();
        $period = $request->input('period', 'yearly');
        $year = $request->input('year');

        $barChart = new GuestChart;
        $pieChart = new GuestChart;

        try {
            if ($period === 'yearly') {
                $query = Guest::query();
                $query->selectRaw('YEAR(created_at) as year, COUNT(*) as count');
                $query->groupBy('year');
                $barChartData = $query->pluck('count')->toArray();

                // Ambil label tahun dari data yang ada di database
                $barChartLabels = $query->pluck('year')->toArray();
                $barChart->labels($barChartLabels);
                $barChart->dataset('Jumlah Kunjungan', 'bar', $barChartData)
                    ->backgroundColor('rgba(79, 70, 229, 0.7)'); // Atur warna dataset di sini

                // Data untuk pie chart berdasarkan keperluan
                $pieChartData = Guest::select('keperluan', \DB::raw('COUNT(*) as count'))
                    ->groupBy('keperluan')
                    ->pluck('count')
                    ->toArray();

                $pieChartLabels = Guest::select('keperluan')
                    ->groupBy('keperluan')
                    ->pluck('keperluan')
                    ->toArray();

            } elseif ($period === 'monthly' && $year) {
                $query = Guest::query();
                $query->whereYear('created_at', $year);
                $query->selectRaw('MONTH(created_at) as month, COUNT(*) as count');
                $query->groupBy('month');

                // Menggunakan format bulan dalam tiga huruf (e.g., "Jan")
                $barChartData = $query->get();
                $barChartLabels = $barChartData->map(function ($item) {
                    return date('M', mktime(0, 0, 0, $item->month, 1));
                })->toArray();

                $barChartData = $barChartData->pluck('count')->toArray();

                $barChart->labels($barChartLabels);
                $barChart->dataset("Jumlah Kunjungan per Bulan ($year)", 'bar', $barChartData)
                    ->backgroundColor('rgba(79, 70, 229, 0.7)'); // Atur warna dataset di sini

                $pieChartLabels = Guest::select('keperluan')
                ->whereYear('created_at', $year)
                ->groupBy('keperluan')
                ->pluck('keperluan')
                ->toArray();

                $pieChartData = Guest::select('keperluan', \DB::raw('COUNT(*) as count'))
                ->groupBy('keperluan')
                ->whereYear('created_at', $year)
                ->pluck('count')
                ->toArray();

            } elseif ($period === 'monthly' && empty($year)) {
                // Kembalikan dengan pesan kesalahan jika tahun tidak diisi saat memilih "Perbulan"
                throw new \Exception('Harap pilih tahun untuk statistik bulanan.');
            }

            $pieChart->labels($pieChartLabels);
            $pieChart->dataset('Jumlah Kunjungan berdasarkan Keperluan', 'pie', $pieChartData)
                ->backgroundColor(['rgba(250, 204, 21, 0.7)', 'rgba(132, 204, 22, 0.7)', 'rgba(6, 182, 212, 0.7)', 'rgba(168, 85, 247, 0.7)', 'rgba(236, 72, 153, 0.7)']); // Atur warna dataset di sini
        } catch (\Exception $e) {
            // Tangani error dan kembalikan dengan pesan kesalahan
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('admin.index', compact('barChart', 'pieChart', 'all'));
    }

    public function daftarTamu(){
        $guests = Guest::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.guestlist', compact('guests'));
    }

    public function delete($id) {
    $guest = Guest::find($id);

        // Jika gambar tamu bukan default-avatar.jpg, hapus gambar dari folder uploads
        if ($guest->foto !== 'default-avatar.png' && File::exists(public_path('uploads/' . $guest->foto))) {
            File::delete(public_path('uploads/' . $guest->foto));
        }

        // Hapus data dari database
        $guest->delete();

        return redirect('admin/guest-list');
    }

    public function editAccount()
    {
        $admin = Auth::user();
        return view('admin.edit_account', compact('admin'));
    }

    public function updateAccount(Request $request)
    {
        $admin = Auth::user();

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.account.edit')
                ->withErrors($validator)
                ->withInput();
        }

        // Periksa dan update nama dan email
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();

        // Periksa dan update password jika diisi
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password'));
            $admin->save();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('admin.edit')->with('success', 'Profil akun berhasil diperbarui.');
    }

}


