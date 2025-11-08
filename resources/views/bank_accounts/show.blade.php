@extends('layouts.app')

@section('title', 'Account Details')

@section('content')

    <div class="bg-white shadow-2xl rounded-xl p-8 max-w-2xl mx-auto border-t-8 border-blue-600">
        <h2 class="text-3xl font-extrabold text-blue-900 mb-8 border-b pb-4 flex items-center gap-3">
            <i data-lucide="file-text" class="w-7 h-7 text-blue-600"></i> Account Details
        </h2>

        <div class="flex flex-col items-center p-6 mb-8 bg-blue-50 rounded-lg border border-blue-100">
            @if($bank_account->photo_path)
                <img src="{{ asset('storage/'.$bank_account->photo_path) }}"
                     class="w-24 h-24 rounded-full object-cover border-4 border-blue-600 shadow-lg">
            @else
                <i data-lucide="user-circle" class="text-gray-400 w-20 h-20"></i>
            @endif

            <h3 class="text-2xl mt-3 font-extrabold text-blue-900">{{ $bank_account->holder_name }}</h3>
            <p class="text-lg font-medium text-gray-600 capitalize mb-4">
                {{ $bank_account->account_type }} Account
            </p>

            <div class="text-center p-4 bg-white rounded-lg shadow-inner border border-blue-200 w-full max-w-sm">
                <p class="text-sm font-medium text-gray-500 uppercase">Current Balance</p>
                <p class="text-4xl font-bold text-blue-800">${{ number_format($bank_account->balance, 2) }} <span class="text-base font-normal text-gray-400">USD</span></p>
            </div>
        </div>

        <div class="space-y-4 text-sm">
            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                <span class="font-semibold text-gray-700 flex items-center gap-2">
                    <i data-lucide="hash" class="w-4 h-4 text-blue-500"></i> Account Number:
                </span>
                <span class="font-bold text-gray-900">{{ $bank_account->account_number }}</span>
            </div>

            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                <span class="font-semibold text-gray-700 flex items-center gap-2">
                    <i data-lucide="info" class="w-4 h-4 text-blue-500"></i> Created At:
                </span>
                <span class="text-gray-700">{{ $bank_account->created_at->format('d/m/Y H:i') }}</span>
            </div>

            <div class="py-2">
                <p class="font-semibold text-gray-700 mb-2 flex items-center gap-2">
                    <i data-lucide="notebook-pen" class="w-4 h-4 text-blue-500"></i> Notes:
                </p>
                <div class="bg-gray-50 p-3 rounded-lg text-gray-800 italic border border-gray-200">
                    {{ $bank_account->notes ?? 'No notes available for this account.' }}
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-gray-100">
            <a href="{{ route('bank_accounts.index') }}"
               class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150 flex items-center gap-2">
                <i data-lucide="arrow-left"></i> Back to List
            </a>
            <a href="{{ route('bank_accounts.edit', $bank_account) }}"
               class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-blue-700 transition duration-150 flex items-center gap-2">
                <i data-lucide="edit"></i> Edit Account
            </a>
        </div>
    </div>
@endsection