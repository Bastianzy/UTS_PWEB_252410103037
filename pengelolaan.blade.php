@extends('layouts.app')

@section('title', 'Pengelolaan Transaksi - CashFlow')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center bg-[#E5CB90] p-4 rounded-2xl border border-[#34A99D]">
        <div>
            <h1 class="text-2xl font-bold text-[#34A99D]">Riwayat & Kategori Transaksi</h1>
            <p class="text-slate-700 text-sm">Tambah dan pantau arus kas masuk/keluar.</p>
        </div>
        <span class="text-xs bg-[#34A99D] text-white px-3 py-1.5 rounded-full font-medium">User: {{ $username }}</span>
    </div>

    <div class="bg-[#E5CB90] p-6 rounded-2xl shadow-sm border border-[#34A99D]">
        <h3 class="text-lg font-bold text-[#34A99D] mb-4">Tambah Transaksi Baru</h3>
        <form action="{{ route('pengelolaan.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @csrf
            <input type="hidden" name="username" value="{{ $username }}">
            
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold text-[#34A99D] mb-1">Keterangan</label>
                <input type="text" name="keterangan" required placeholder="Contoh: Makan Siang" class="w-full px-3 py-2 border border-[#34A99D] rounded-xl text-sm bg-white focus:ring-2 focus:ring-[#34A99D]">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#34A99D] mb-1">Kategori</label>
                <input type="text" name="kategori" required placeholder="Contoh: Konsumsi" class="w-full px-3 py-2 border border-[#34A99D] rounded-xl text-sm bg-white focus:ring-2 focus:ring-[#34A99D]">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#34A99D] mb-1">Nominal (Angka)</label>
                <input type="number" name="nominal" min="1" required placeholder="50000" class="w-full px-3 py-2 border border-[#34A99D] rounded-xl text-sm bg-white focus:ring-2 focus:ring-[#34A99D]">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#34A99D] mb-1">Tipe Arus</label>
                <select name="tipe" class="w-full px-3 py-2 border border-[#34A99D] rounded-xl text-sm bg-white">
                    <option value="masuk">Pemasukan</option>
                    <option value="keluar">Pengeluaran</option>
                </select>
            </div>

            <div class="md:col-span-5 flex justify-end">
                <button type="submit" class="bg-[#34A99D] hover:bg-opacity-90 text-white px-5 py-2 rounded-xl text-sm font-semibold transition shadow">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>

    <div class="bg-[#E5CB90] p-6 rounded-2xl shadow-sm border border-[#34A99D]">
        <h3 class="text-lg font-bold text-[#34A99D] mb-4">Daftar Transaksi</h3>
        <div class="bg-white rounded-xl overflow-hidden border border-[#34A99D]">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#34A99D] text-white text-xs uppercase tracking-wider font-semibold">
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Keterangan</th>
                            <th class="px-6 py-3">Kategori</th>
                            <th class="px-6 py-3">Nominal</th>
                            <th class="px-6 py-3">Tipe</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 text-sm">
                        @forelse($transactions as $item)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-slate-500">#{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-slate-800">{{ $item['keterangan'] }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-[#E5CB90] text-slate-800 px-2.5 py-1 rounded-md text-xs font-semibold">
                                    {{ $item['kategori'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold {{ $item['tipe'] == 'masuk' ? 'text-emerald-700' : 'text-rose-700' }}">
                                Rp {{ number_format($item['nominal'], 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                @if($item['tipe'] == 'masuk')
                                    <span class="bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full text-xs font-semibold">Pemasukan</span>
                                @else
                                    <span class="bg-rose-100 text-rose-800 px-2.5 py-1 rounded-full text-xs font-semibold">Pengeluaran</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-500 italic">
                                Belum ada transaksi yang diinput. Silakan tambah transaksi melalui form di atas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection