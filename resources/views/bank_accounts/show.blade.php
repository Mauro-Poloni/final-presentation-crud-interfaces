@extends('layouts.app')

@section('title', 'Account Details')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
        <h2 class="text-2xl font-semibold text-blue-900 mb-6 flex items-center gap-2">
            <i data-lucide="file-text"></i> Account Details
        </h2>

        <div class="flex flex-col items-center mb-6">
            @if($bank_account->photo_path)
                <img src="{{ asset('storage/'.$bank_account->photo_path) }}"
                     class="w-28 h-28 rounded-full object-cover border-4 border-blue-800 shadow">
            @else
                <i data-lucide="user-circle" class="text-gray-400 w-20 h-20"></i>
            @endif
            <h3 class="text-xl mt-3 font-medium text-blue-900">{{ $bank_account->holder_name }}</h3>
            <p class="text-gray-600">{{ ucfirst($bank_account->account_type) }} Account</p>
        </div>

        <table class="w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
            <tr class="bg-gray-100">
                <th class="py-2 px-4 text-left w-1/3">Account Number</th>
                <td class="py-2 px-4">{{ $bank_account->account_number }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 text-left">Balance</th>
                <td class="py-2 px-4">${{ number_format($bank_account->balance, 2) }}</td>
            </tr>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 text-left">Notes</th>
                <td class="py-2 px-4">{{ $bank_account->notes ?? 'No notes available' }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 text-left">Created</th>
                <td class="py-2 px-4">{{ $bank_account->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('bank_accounts.index') }}"
               class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Back</a>
            <a href="{{ route('bank_accounts.edit', $bank_account) }}"
               class="px-4 py-2 bg-blue-800 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
                <i data-lucide="edit"></i> Edit
            </a>
        </div>
    </div>
@endsection