<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profil;
use App\Models\Produks;
use App\Models\Transaksi;
use App\Models\Categories;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PetugasController extends Controller
{
    public function dashboard_petugas()
    {
        $data = Profil::all();
        $jumlah_pengguna_sistem = User::whereIn('keterangan', ['Administrator', 'Petugas'])->count();
        $jumlah_produk = Produks::count();
        $user_id = auth()->user()->id;
        $produk_terjual = ShoppingCart::where('user_id', $user_id)->count();
        $total_harga_barang = Transaksi::where('user_id', $user_id)->sum('total_harga');
        return view('petugas.dashboard_petugas', [
            'title' => 'Dashboard Petugas',
            'data2' => $data,
            'jumlah_pengguna' => $jumlah_pengguna_sistem,
            'jumlah_produk' => $jumlah_produk,
            'jumlah_saldo' => $total_harga_barang,
            'produk_terjual' => $produk_terjual,
        ]);
    }


    public function akun_petugas()
    {
        $dataa = Profil::all();
        return view("petugas/akun_petugas", [
            "data2" => $dataa
        ]);
    }

    public function ubah_akun($created_at)
    {
        $dataa = Profil::all();
        $user = User::where('created_at', $created_at)->firstOrFail();
        return view("petugas/ubah_akun_petugas", [
            "data2" => $dataa,
            'user' => $user,
        ]);
    }
    public function ubah_akun_petugas(Request $request, $created_at)
    {
        $request->validate([
            "nama_lengkap" => "required|min:3|max:100",
            "email" => "required|min:3|max:100|unique:users",
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $user = User::where('created_at', $created_at)->firstOrFail();

        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img');
            $user->image = $imagePath;
        }
        $user->save();

        return redirect()->route("akun_petugas")->with("berhasil", "berhasil");
    }

    public function data_produk_petugas()
    {
        $dataa = Profil::latest()->get();
        $data_produk = Produks::with('categories')->latest()->get();
        $user = auth()->user();
        $keranjangCount = ShoppingCart::where('user_id', $user->id)->count();
        return view("petugas.data_produk_petugas", [
            'title' => "Daftar Produk",
            'data2' => $dataa,
            'data_produk2' => $data_produk,
            'keranjangCount' => $keranjangCount

        ]);
    }
    public function produk_masuk()
    {
        $user = auth()->user();
        $dataa = Profil::all();
        $data_produk = Transaksi::where('user_id', $user->id)->with('detailTransaksis')->latest()->get();
        return view("petugas.produk_masuk", [
            'title' => "Daftar Produk Masuk",
            'data_produk2' => $data_produk,
            "data2" => $dataa,

        ]);
    }

    public function view_produk_masuk($created_at)
    {
        $transaksii = Transaksi::where('created_at', $created_at)->first();
        $detailTransaksii = DetailTransaksi::where('nomor_struk', $transaksii->id)->get();
        $data = Profil::all();
        return view('petugas.view_produk_masuk', [
            'transaksi' => $transaksii,
            'detailTransaksi' => $detailTransaksii,
            'data2' => $data
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

    public function laporan_penjualan(Request $request)
    {
        $from_date = Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = Carbon::parse($request->input('to_date'))->endOfDay();
        $data = Profil::all();
        $user_id = auth()->user()->id;
        $penjualan = DB::table('detail_transaksis')
            ->join('transaksis', 'detail_transaksis.nomor_struk', '=', 'transaksis.id')
            ->select(DB::raw('DATE(transaksis.tanggal_transaksi) as tanggal'), DB::raw('COUNT(detail_transaksis.nomor_struk) as jumlah_transaksi'), DB::raw('SUM(detail_transaksis.subtotal) as total_penjualan'))
            ->where('transaksis.user_id', $user_id)
            ->whereBetween('transaksis.tanggal_transaksi', [$from_date, $to_date])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();
        $total_penjualan = $penjualan->sum('total_penjualan');
        return view('petugas.laporan_penjualan', [
            'title' => 'Laporan Penjualan',
            'penjualan' => $penjualan,
            'total_penjualan' => $total_penjualan,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'data2' => $data,
        ]);
    }


    public function addToCart(Request $request, $id)
    {
        $product = Produks::findOrFail($id);

        if ($request->input('quantity') > $product->stok_barang) {
            return redirect()->back()->with('error', 'The quantity requested exceeds the available stock!');
        }

        $keranjang = new ShoppingCart();
        $keranjang->products_id = $product->id;
        $keranjang->quantity = $request->input('quantity');
        $keranjang->subtotal = $product->harga_barang * $request->input('quantity');
        $keranjang->user_id = auth()->user()->id;
        $keranjang->save();

        $product->stok_barang -= $request->input('quantity');
        $product->save();

        return redirect()->back()->with('berhasil', 'Product added to cart successfully!');
    }


    public function bookCart()
    {
        $user = auth()->user();
        $keranjangCount = ShoppingCart::where('user_id', $user->id)->count();
        return view('petugas.data_produk_petugas', [
            'keranjangCount' => $keranjangCount
        ]);
    }
    public function deleteProduct(Request $request)
    {
        $keranjangId = $request->input('id');
        $keranjang = ShoppingCart::findOrFail($keranjangId);
        $keranjang->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
    public function showCart()
    {
        $user = auth()->user();
        $data = Profil::all();
        $keranjangCount = ShoppingCart::where('user_id', $user->id)->count();
        $keranjang = $user->keranjangs;
        return view('petugas.cart', [
            'keranjangs' => $keranjang,
            'keranjangCount' => $keranjangCount,
            'data2' => $data,
        ]);
    }

    public function checkout(Request $request)
    {
        $totalPayment = $request->input('payment_amount');
        $totalCart = $request->input('total_payment');

        if ($totalPayment < $totalCart) {
            return redirect()->back()->with('error', 'Jumlah pembayaran harus melebihi total belanja!');
        }

        $user = auth()->user();
        $keranjang = $user->keranjangs;

        if ($keranjang->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong!');
        }

        $tanggal_sekarang = Carbon::now();
        $dataa = Profil::latest()->get();
        $data_produk1 = ShoppingCart::with('product')->latest()->get();
        $totalHarga = $keranjang->sum('subtotal');

        $transaksi = new Transaksi();
        $transaksi->no_struk = mt_rand(100000, 999999);
        $transaksi->user_id = $user->id;
        $transaksi->tanggal_transaksi = now();
        $transaksi->total_harga = $totalHarga;
        $transaksi->total_bayar = $totalPayment;
        $transaksi->kembalian = $totalPayment - $totalHarga;

        $keterangan = ($totalPayment >= $totalHarga) ? 'Sudah Bayar' : 'Belum Bayar';
        $transaksi->keterangan = $keterangan;
        $transaksi->save();

        foreach ($keranjang as $item) {
            DetailTransaksi::create([
                'nomor_struk' => $transaksi->id,
                'nama_produk' => $item->products_id,
                'jumlah_produk' => $item->quantity,
                'subtotal' => $item->subtotal,
            ]);

            $item->delete();
        }

        return view(
            'petugas/print_produk_masuk',
            [
                'transaksi' => $transaksi,
                'data_produk2' => $data_produk1,
                'tanggal' => $tanggal_sekarang,
                'data2' => $dataa,
            ]
        );
    }
    public function print_produk_masuk($created_at)
    {
        $transaksi = Transaksi::where('created_at', $created_at)->first();
        $detailTransaksi = DetailTransaksi::where('nomor_struk', $transaksi->id)->get();
        $data = Profil::all();
        return view('petugas.print_produk_masuk', [
            'transaksi' => $transaksi,
            'detailTransaksi' => $detailTransaksi,
            'data2' => $data
        ]);
    }
}
