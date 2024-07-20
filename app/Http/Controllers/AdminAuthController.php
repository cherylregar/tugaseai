<?php

namespace App\Http\Controllers;

use App\Models\SampahJual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Article;
use App\Models\Kampus;
use App\Models\Fakultas;
use App\Models\Pelanggan;
use App\Models\Wastepals;
use App\Models\Event;
use App\Models\EventWastepalsSampah;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.loginadmin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('emailAdmin', 'password');

        $admin = Admin::where('emailAdmin', $credentials['emailAdmin'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->passAdmin)) {
            session(['nmAdmin' => $admin->nmAdmin, 'fotoAdmin' => $admin->fotoAdmin]);

            Auth::guard('admin')->login($admin);

            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('loginadmin')->with('errorMsg', 'Email atau sandi tidak valid.');
    }

    public function adminpage()
    {
        $sampahKertas = SampahJual::where('idSampah', 'SAMP001')->first();
        $sampahKardus = SampahJual::where('idSampah', 'SAMP002')->first();
        $sampahPlastik = SampahJual::where('idSampah', 'SAMP003')->first();
        $sampahItems = SampahJual::all();

        return view('admin.adminpage', compact('sampahKertas', 'sampahKardus', 'sampahPlastik', 'sampahItems'));
    }

    public function update(Request $request, $idSampah)
    {
        // Validasi input jika diperlukan

        $sampah = SampahJual::find($idSampah);

        if (!$sampah) {
            return redirect()->back()->with('errorMsg', 'Data sampah tidak ditemukan.');
        }

        // Update atribut-atribut yang diubah
        $sampah->nmSampah = $request->input('nmSampah');
        $sampah->poinjual = $request->input('poinjual');

        // Simpan perubahan
        $sampah->save();

        // Redirect dengan pesan sukses atau error jika diperlukan
        return redirect()->route('admin.adminpage')->with('successMsg', 'Data sampah berhasil diperbarui.');
    }

    public function tambahProdukSampah()
    {
        $lastSampah = SampahJual::latest('idSampah')->first();
        return view('admin.tambahproduksampah', compact('lastSampah'));
    }

    public function tambahartikel()
    {
        $admins = Admin::all(); // Retrieve all admins
        $lastArticle = Article::latest()->first();
        $lastIdArtikel = $lastArticle ? $lastArticle->idArtikel : null;

        return view('admin.tambahartikel', [
            'admins' => $admins,
            'lastIdArtikel' => $lastIdArtikel
        ]);
    }

    public function dashboard()
    {
        $jumlahKampus = Kampus::count();
        $jumlahFakultas = Fakultas::count();
        $jumlahPelanggan = Pelanggan::count();
        $jumlahLaki = DB::table('pelanggan')
            ->where('jenisKel', 'Laki-laki')
            ->count();
        $jumlahPerempuan = DB::table('pelanggan')
            ->where('jenisKel', 'Perempuan')
            ->count();
        $jumlahWastepals = Wastepals::count();
        $jumlahEvent = Event::count();
        $jumlahJenisSampah = SampahJual::count();

        return view('admin.dashboardadmin', compact('jumlahKampus', 'jumlahFakultas', 'jumlahPelanggan', 'jumlahLaki', 'jumlahPerempuan', 'jumlahWastepals', 'jumlahEvent', 'jumlahJenisSampah'));
    }

    public function pengajuanEvent()
    {
        $events = Event::all(); // Retrieve all events
        return view('admin.pengajuanevent', compact('events'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginadmin');
    }

    public function kelolaartikel()
    {
        $articles = \App\Models\Article::all(); // Ensure you import the Article model at the top of the file
        return view('admin.kelolaartikel', compact('articles'));
    }

    public function pengajuanSetorSampah()
    {
        $eventWastepalsSampah = EventWastepalsSampah::all();
        return view('admin.pengajuansetorsampah', compact('eventWastepalsSampah'));
    }
    

    public function editSetorSampah($id)
    {
        // Use where clause to find by idEvent instead of findOrFail
        $eventSampah = EventWastepalsSampah::where('idEvent', $id)->firstOrFail();
        return view('admin.editdatasetorevent', compact('eventSampah'));
    }
    
    public function updateSetorSampah(Request $request, $id)
    {
        $request->validate([
            'idWPal' => 'required|string',
            'idSampah' => 'required|string',
            'jumlahKilo' => 'required|numeric',
            'statusSetor' => 'required|string',
        ]);
    
        // Find the record by idEvent
        $eventSampah = EventWastepalsSampah::where('idEvent', $id)->firstOrFail();
    
        // Update the record with new data
        $eventSampah->idWPal = $request->input('idWPal');
        $eventSampah->idSampah = $request->input('idSampah');
        $eventSampah->jumlahKilo = $request->input('jumlahKilo');
        $eventSampah->statusSetor = $request->input('statusSetor');
        $eventSampah->save();
    
        return redirect()->route('setorsampah.index')->with('success', 'Data successfully updated');
    }
    

}
