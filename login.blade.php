<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CashFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#458393] min-h-screen flex items-center justify-center px-4 font-sans">
    
    <div class="bg-[#E5CB90] p-8 rounded-2xl shadow-xl w-full max-w-md border border-[#34A99D]">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-[#34A99D]">CashFlow</h1>
            <p class="text-slate-700 text-sm mt-1">Silakan masukkan nama Anda untuk mulai</p>
        </div>

        <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-[#34A99D] uppercase tracking-wider mb-1">Username / Nama</label>
                <input type="text" name="username" required placeholder="Contoh: Veda" class="w-full px-4 py-3 rounded-xl border border-[#34A99D] bg-white text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#34A99D] text-sm">
            </div>

            <button type="submit" class="w-full bg-[#34A99D] hover:bg-opacity-90 text-white font-semibold py-3 rounded-xl transition shadow-md">
                Masuk ke Aplikasi
            </button>
        </form>
    </div>

</body>
</html>