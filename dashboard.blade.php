@extends('layouts.app')

@section('title', 'Dashboard - CashFlow')

@section('content')
<div class="space-y-6">
    <div class="bg-[#E5CB90] p-6 rounded-2xl shadow-sm border border-[#34A99D] flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#34A99D]">Halo, <span class="text-slate-800">{{ $username }}</span>!</h1>
            <p class="text-slate-700 text-sm mt-1">Selamat datang di CashFlow. Berikut ringkasan keuangan Anda.</p>
        </div>
        <div>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="bg-[#34A99D] hover:bg-opacity-80 text-white px-4 py-2 rounded-xl text-sm font-semibold transition shadow">Kelola Transaksi</a>
        </div>
    </div>

    <div class="bg-[#E5CB90] p-6 rounded-2xl shadow-sm border border-[#34A99D]">
        <h2 class="text-base font-bold text-[#34A99D] mb-4">Ringkasan Keuangan</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white bg-opacity-80 p-5 rounded-xl border border-[#34A99D]">
                <p class="text-xs text-[#34A99D] font-semibold">Total Saldo</p>
                <h3 class="text-2xl font-bold text-[#34A99D] mt-1">{{ $summary['saldo'] }}</h3>
            </div>
            <div class="bg-white bg-opacity-80 p-5 rounded-xl border border-[#34A99D]">
                <p class="text-xs text-[#34A99D] font-semibold">Pemasukan</p>
                <h3 class="text-2xl font-bold text-[#34A99D] mt-1">{{ $summary['pemasukan'] }}</h3>
            </div>
            <div class="bg-white bg-opacity-80 p-5 rounded-xl border border-[#34A99D]">
                <p class="text-xs text-[#34A99D] font-semibold">Pengeluaran</p>
                <h3 class="text-2xl font-bold text-[#34A99D] mt-1">{{ $summary['pengeluaran'] }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection