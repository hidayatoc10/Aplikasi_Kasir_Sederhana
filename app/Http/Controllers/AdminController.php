<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profil;
use App\Models\Produks;
use App\Models\Categories;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard_admin()
    {
        $data = Profil::all();
        $produk_terjual = DetailTransaksi::count();
        $jumlah_penggua_sistem = User::whereIn('keterangan', ['Administrator', 'Petugas'])->count();
        $jumlah_produk = Produks::count();
        $total_harga_barang = Transaksi::sum('total_harga');
        return view('admin.dashboard_admin', [
            'title' => 'Dashboard Admin',
            'data2' => $data,
            'jumlah_pengguna' => $jumlah_penggua_sistem,
            'jumlah_produk' => $jumlah_produk,
            'jumlah_saldo' => $total_harga_barang,
            'produk_terjual' => $produk_terjual
        ]);
    }

    public function tambah_pengguna_sistem()
    {
        $data = Profil::all();
        return view('admin.tambah_pengguna_sistem', [
            'title' => 'Tambah Pengguna',
            'data2' => $data,
        ]);
    }
    public function tambah_pengguna_sistem_post(Request $request)
    {
        $request->validate([
            "nama_lengkap" => "required|min:3|max:100",
            "username" => "required|min:3|max:100|unique:users",
            "email" => "required|min:3|max:100|unique:users|email",
            "password" => "required|min:5|max:50",
            "image" => "required|image|max:5000",
            "keterangan" => "required|min:3|max:100",
        ]);

        $imagePath = $request->file('image')->store('img');

        $data = User::create([
            "nama_lengkap" => $request->nama_lengkap,
            "username" => $request->username,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "image" => $imagePath,
            "keterangan" => $request->keterangan,
        ]);

        if ($data) {
            return redirect()->route("tambah_pengguna_sistem")->with("berhasil", "berhasil");
        } else {
            return redirect()->route("tambah_pengguna_sistem")->with("gagal", "gagal");
        }
    }

    public function daftar_pengguna_sistem()
    {
        $dataa = Profil::all();
        $data = User::all();
        return view('admin.daftar_pengguna_sistem', [
            'user2' => $data,
            'data2' => $dataa,
        ]);
    }

    public function view_pengguna_sistem($created_at)
    {
        $dataa = User::where('created_at', $created_at)->first();
        $data = Profil::all();
        return view('admin.view_pengguna_sistem', [
            'view2' => $dataa,
            'data2' => $data
        ]);
    }

    public function delete_pengguna_sistem($created_at)
    {
        $dataa = User::where('created_at', $created_at)->first();
        $dataa->delete();
        return redirect('admin/daftar_pengguna_sistem')->with('delete_pengguna', 'delete');
    }

    public function profil()
    {
        $dataa = Profil::all();
        return view('admin.profil', [
            'title' => 'Profil',
            'data2' => $dataa,
        ]);
    }
    public function edit_profil()
    {
        $dataa = Profil::all();
        return view('admin.edit_profil', [
            'title' => 'Edit Profil',
            'data2' => $dataa,
        ]);
    }

    public function edit_profil_put(Request $request, $created_at)
    {
        $request->validate([
            "nama_sekolah" => "required|min:3|max:100",
            "alamat" => "required|min:3|max:100",
            "tahun_ajaran" => "required|min:3|max:100",
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $user = Profil::where('created_at', $created_at)->firstOrFail();

        $user->nama_sekolah = $request->nama_sekolah;
        $user->alamat = $request->alamat;
        $user->tahun_ajaran = $request->tahun_ajaran;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img');
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route("profil")->with("berhasil", "berhasil");
    }

    public function edit_pengguna_sistem($created_at)
    {
        $dataa = Profil::all();
        $user = User::where('created_at', $created_at)->firstOrFail();
        return view('admin/edit_pengguna_sistem', [
            'title' => 'Edit Pengguna',
            'data2' => $dataa,
            'user' => $user,
        ]);
    }


    public function edit_pengguna_sistem_put(Request $request, $created_at)
    {
        $request->validate([
            "nama_lengkap" => "required|min:3|max:100",
            "username" => "required|min:3|max:100|unique:users",
            "email" => "required|min:3|max:100|unique:users",
            "password" => "required|min:5|max:50",
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:5000',
            "keterangan" => "required|min:3|max:100",
        ]);

        $user = User::where('created_at', $created_at)->firstOrFail();

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img');
            $user->image = $imagePath;
        }
        $user->keterangan = $request->keterangan;

        $user->save();

        return redirect()->route("daftar_pengguna_sistem")->with("berhasil", "berhasil");
    }

    public function akun_admin()
    {
        $dataa = Profil::all();
        return view("admin/akun_admin", [
            "data2" => $dataa
        ]);
    }

    public function ubah_akun($created_at)
    {
        $dataa = Profil::all();
        $user = User::where('created_at', $created_at)->firstOrFail();
        return view("admin/ubah_akun_admin", [
            "data2" => $dataa,
            'user' => $user,
        ]);
    }

    public function ubah_akun_admin(Request $request, $created_at)
    {
        $request->validate([
            "nama_lengkap" => "required|min:3|max:100",
            "username" => "required|min:3|max:100|unique:users",
            "email" => "required|min:3|max:100|unique:users",
            "password" => "required|min:5|max:50",
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $user = User::where('created_at', $created_at)->firstOrFail();

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img');
            $user->image = $imagePath;
        }
        $user->save();

        return redirect()->route("akun_admin")->with("berhasil", "berhasil");
    }

    public function data_produk_admin()
    {
        $dataa = Profil::latest()->get();
        $data_produk = Produks::with('categories')->latest()->get();
        return view("admin.data_produk_admin", [
            'title' => "Daftar Produk",
            'data2' => $dataa,
            'data_produk2' => $data_produk,
        ]);
    }

    public function tambah_data_produk_admin()
    {
        $dataa = Profil::all();
        $produk = Categories::all();
        return view('admin.tambah_data_produk_admin', [
            'title' => 'Tambah Produk',
            'data2' => $dataa,
            'data' => $produk,
        ]);
    }

    public function tambah_data_produk_post(Request $request)
    {
        $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'nama_barang' => 'required|min:3|max:100',
            'kode_barang' => 'required|min:3|max:50|unique:produks',
            'harga_barang' => 'required|min:3|max:50',
            'stok_barang' => 'required|max:50',
            'image' => 'required|image|max:5000',
        ]);

        $imagePath = $request->file('image')->store('img');

        $data = Produks::create([
            "categories_id" => $request->categories_id,
            "nama_barang" => $request->nama_barang,
            "kode_barang" => $request->kode_barang,
            "harga_barang" => $request->harga_barang,
            "stok_barang" => $request->stok_barang,
            "user_id" => Auth::user()->id,
            "image" => $imagePath,
        ]);

        return redirect()->route("tambah_data_produk_admin")->with("berhasil", "berhasil");
    }


    public function delete_produk_admin($created_at)
    {
        $dataa = Produks::where('created_at', $created_at)->first();
        $dataa->delete();
        return redirect('admin/data_produk_admin')->with('delete_pengguna', 'delete');
    }


    public function edit_produk_admin(Request $request, $created_at)
    {
        $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'nama_barang' => 'required|min:3|max:100',
            'kode_barang' => 'required|min:3|max:50',
            'harga_barang' => 'required|min:3|max:50',
            'stok_barang' => 'required|max:50',
            'image' => 'image|max:5000',
        ]);

        $produk = Produks::where('created_at', $created_at)->firstOrFail();

        $produk->categories_id = $request->categories_id;
        $produk->nama_barang = $request->nama_barang;
        $produk->kode_barang = $request->kode_barang;
        $produk->harga_barang = $request->harga_barang;
        $produk->stok_barang = $request->stok_barang;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img');
            $produk->image = $imagePath;
        }

        $produk->save();

        return redirect('/admin/data_produk_admin')->with('edit', 'berhasil edit');
    }

    public function edit_produk_admin_view($created_at)
    {
        $dataa = Profil::all();
        $produk2 = Produks::where('created_at', $created_at)->firstOrFail();
        $categories = Categories::all();
        return view('admin.edit_produk_admin', [
            'title' => 'Tambah Produk',
            'data2' => $dataa,
            'produk' => $produk2,
            'categories' => $categories,
        ]);
    }

    public function print_produk_admin()
    {
        $dataa = Profil::latest()->get();
        $tanggal_sekarang = Carbon::now();
        $data_produk = Produks::with('categories')->latest()->get();
        return view("admin/print_produk_admin", [
            'data2' => $dataa,
            'data_produk2' => $data_produk,
            'tanggal' => $tanggal_sekarang,
        ]);
    }

    public function data_categori()
    {
        $dataa = Profil::all();
        $produk = Categories::all();
        return view('admin.data_categori', [
            'title' => 'Tambah Kategori',
            'data2' => $dataa,
            'data' => $produk,
        ]);
    }

    public function delete_kategori_admin($created_at)
    {
        $dataa = Categories::where('created_at', $created_at)->first();
        $dataa->delete();
        return redirect('admin/data_categori')->with('delete', 'delete');
    }

    public function ubah_kategori_admin($created_at)
    {
        $data = Profil::all();
        $produk2 = Categories::where('created_at', $created_at)->firstOrFail();
        return view('admin.ubah_kategori_admin', [
            'title' => 'Edit Kategori',
            'user' => $produk2,
            'data2' => $data,
        ]);
    }

    public function ubah_kategori_admin_put(Request $request, $created_at)
    {
        $request->validate([
            'nama_categories' => 'required|min:3|max:100',
        ]);
        $produk = Categories::where('created_at', $created_at)->firstOrFail();
        $produk->nama_categories = $request->nama_categories;
        $produk->save();
        return redirect('/admin/data_kategori')->with('edit', 'berhasil edit');
    }

    public function tambah_kategori_admin()
    {
        $data = Profil::all();
        return view('admin.tambah_kategori_admin', [
            'title' => 'Tambah Kategori',
            'data2' => $data,
        ]);
    }

    public function tambah_kategori_admin_post(Request $request)
    {
        $request->validate([
            "nama_categories" => "required|min:3|max:100",
        ]);

        $data = Categories::create([
            "nama_categories" => $request->nama_categories,
        ]);

        if ($data) {
            return redirect()->route("tambah_kategori_admin")->with("berhasil", "berhasil");
        } else {
            return redirect()->route("tambah_kategori_admin")->with("gagal", "gagal");
        }
    }

    public function produk_masuk_admin()
    {
        $dataa = Profil::all();
        $data_produk = Transaksi::with('detailTransaksis', 'cashier')->latest()->get();
        return view("admin.produk_masuk_admin", [
            'title' => "Daftar Produk Masuk",
            'data_produk2' => $data_produk,
            "data2" => $dataa,

        ]);
    }

    public function delete_produk_masuk($created_at)
    {
        $transaksi = Transaksi::where('created_at', $created_at)->first();
        if ($transaksi) {
            DetailTransaksi::where('nomor_struk', $transaksi->id)->delete();
            $transaksi->delete();
            return redirect()->back()->with('delete', 'Produk berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function data_produk_admin_view()
    {
        $dataa = Profil::latest()->get();
        $data_produk = Produks::with('categories')->latest()->get();
        return view("admin.data_produk_admin_view", [
            'title' => "Daftar Produk",
            'data2' => $dataa,
            'data_produk2' => $data_produk,
        ]);
    }

    public function laporan_penjualan(Request $request)
    {
        $from_date = Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = Carbon::parse($request->input('to_date'))->endOfDay();
        $data = Profil::all();
        $penjualan = DB::table('detail_transaksis')
            ->join('transaksis', 'detail_transaksis.nomor_struk', '=', 'transaksis.id')
            ->select(DB::raw('DATE(transaksis.tanggal_transaksi) as tanggal'), DB::raw('COUNT(detail_transaksis.nomor_struk) as jumlah_transaksi'), DB::raw('SUM(detail_transaksis.subtotal) as total_penjualan'))
            ->whereBetween('transaksis.tanggal_transaksi', [$from_date, $to_date])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $total_penjualan = $penjualan->sum('total_penjualan');

        return view('admin.laporan_penjualan', [
            'title' => 'Laporan Penjualan',
            'penjualan' => $penjualan,
            'total_penjualan' => $total_penjualan,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'data2' => $data,
        ]);
    }


    public function keranjang()
    {
        $dataa = Profil::all();
        $keranjangg = ShoppingCart::with('cashier', 'product')->latest()->get();
        return view('admin.keranjang', [
            'data2' => $dataa,
            'keranjang' => $keranjangg
        ]);
    }

}
