@extends('layouts.app')

@section('title', 'Profil - CashFlow')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="bg-[#E5CB90] p-8 rounded-2xl shadow-sm border border-[#34A99D] text-center space-y-4">
        <div class="w-20 h-20 bg-[#34A99D] text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto shadow">
            {{ strtoupper(substr($userProfile['name'], 0, 1)) }}
        </div>
        <div>
            <h1 class="text-2xl font-bold text-[#34A99D]">{{ $userProfile['name'] }}</h1>
            <p class="text-slate-700 text-sm">{{ $userProfile['role'] }}</p>
        </div>
        <div class="bg-white bg-opacity-70 p-4 rounded-xl text-left border border-[#34A99D] space-y-2 text-sm">
            <p><strong class="text-[#34A99D]">Email:</strong> {{ $userProfile['email'] }}</p>
            <p><strong class="text-[#34A99D]">Aplikasi:</strong> CashFlow (UTS Web Programming)</p>
        </div>
    </div>
</div>
@endsection