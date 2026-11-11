<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $username =$request->input('username');
        return redirect()->route('dashboard', ['username' => $username]);
    }

    public function dashboard(Request $request)
    {
        $username =$request->input('username', session('username', 'Tamu'));
        $transactions = session('transactions', []);$totalPemasukan = 0;
        $totalPengeluaran = 0;

        foreach ($transactions as$item) {
            if ($item['tipe'] == 'masuk') {
                $totalPemasukan += (int)$item['nominal'];
            } else {
                $totalPengeluaran += (int)$item['nominal'];
            }
        }

        $totalSaldo = $totalPemasukan -$totalPengeluaran;

        $summary = [
            'saldo' => 'Rp ' . number_format($totalSaldo, 0, ',', '.'),
            'pemasukan' => 'Rp ' . number_format($totalPemasukan, 0, ',', '.'),
            'pengeluaran' => 'Rp ' . number_format($totalPengeluaran, 0, ',', '.'),
        ];

        return view('dashboard', compact('username', 'summary'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->input('username', session('username', 'Tamu'));$transactions = session('transactions', []);

        return view('pengelolaan', compact('username', 'transactions'));
    }

    public function storeTransaksi(Request $request)
    {
        $username =$request->input('username');
        $nominal =$request->input('nominal');

        if ($nominal <= 0) {
            return redirect()->back();
        }

        $newTransaction = [
            'id' => time(),
            'keterangan' => $request->input('keterangan'),
            'kategori' => $request->input('kategori'),
            'nominal' => (int) $nominal,
            'tipe' => $request->input('tipe'),
        ];

        $transactions = session('transactions', []);
        array_unshift($transactions,$newTransaction);
        session(['transactions' => $transactions]);

        return redirect()->route('pengelolaan', ['username' => $username]);
    }

    public function profile(Request $request)
    {
        $username = $request->input('username', 'Tamu');$userProfile = [
            'name' => $username,
            'role' => 'Mahasiswa Informatika',
            'email' => 'vedabastian128@gmail.com',
        ];

        return view('profile', compact('username', 'userProfile'));
    }
}