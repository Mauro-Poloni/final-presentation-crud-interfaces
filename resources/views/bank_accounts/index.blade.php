@extends('layouts.app')

@section('title', 'Bank Accounts')

@section('content')
    <div class="mb-12 md:mb-16">
        <img class="w-full aspect-[4/1] object-cover object-center" src="{{ asset('storage/bank_photos/assets/bank_accounts_banner.png') }}">
    </div>
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-blue-900 flex items-center gap-2">
                <i data-lucide="credit-card"></i> Bank Accounts
            </h1>
            <a href="{{ route('bank_accounts.create') }}"
               class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center gap-2">
                <i data-lucide="plus-circle"></i> New Account
            </a>
        </div>

        <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-blue-800 text-white">
            <tr>
                <th class="py-3 px-4 text-left">#</th>
                <th class="py-3 px-4 text-left">Holder</th>
                <th class="py-3 px-4 text-left">Account Type</th>
                <th class="py-3 px-4 text-right">Balance</th>
                <th class="py-3 px-4 text-center">Photo</th>
                <th class="py-3 px-4 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @foreach($bank_accounts as $account)
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $account->id }}</td>
                    <td class="py-3 px-4">{{ $account->holder_name }}</td>
                    <td class="py-3 px-4 capitalize">{{ $account->account_type }}</td>
                    <td class="py-3 px-4 text-right">${{ number_format($account->balance, 2) }}</td>
                    <td class="py-3 px-4 text-center">
                        @if($account->photo_path)
                            <img src="{{ asset('storage/'.$account->photo_path) }}" class="w-10 h-10 rounded-full mx-auto object-cover">
                        @else
                            <i data-lucide="user-circle" class="mx-auto text-gray-400"></i>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center">
                        <a href="{{ route('bank_accounts.show', $account) }}" class="text-blue-600 hover:underline">View</a> |
                        <a href="{{ route('bank_accounts.edit', $account) }}" class="text-green-600 hover:underline">Edit</a> |
                        <form action="{{ route('bank_accounts.destroy', $account) }}" method="POST"
                              class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-6">
            {{ $bank_accounts->links() }}
        </div>
    </div>
@endsection