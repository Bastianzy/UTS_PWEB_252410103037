<header class="bg-[#34A99D] text-white shadow-md border-b border-[#E5CB90]">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('dashboard', ['username' => request('username')]) }}" class="text-xl font-bold tracking-wide text-[#FFF3C8]">
            CashFlow
        </a>
        <nav class="hidden md:flex space-x-6 text-[#FFF3C8]">
            <a href="{{ route('dashboard', ['username' => request('username')]) }}" class="hover:text-white transition font-medium">Dashboard</a>
            <a href="{{ route('pengelolaan', ['username' => request('username')]) }}" class="hover:text-white transition font-medium">Pengelolaan</a>
            <a href="{{ route('profile', ['username' => request('username')]) }}" class="hover:text-white transition font-medium">Profil</a>
        </nav>
        <div>
            <a href="{{ route('login') }}" class="bg-[#E5CB90] hover:bg-opacity-80 text-slate-800 px-4 py-2 rounded-lg text-sm font-semibold transition">Keluar</a>
        </div>
    </div>
</header>