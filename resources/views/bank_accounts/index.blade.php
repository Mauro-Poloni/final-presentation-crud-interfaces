@extends('layouts.app')

@section('title', 'Bank Accounts')

@section('content')

    <div class="mb-8">
        <img class="w-full aspect-[3/1] object-cover object-center rounded-xl shadow-lg"
             src="{{ asset('storage/bank_photos/assets/bank_accounts_banner.png') }}"
             alt="Bank Accounts Management Banner">
    </div>

    <div class="bg-white shadow-2xl rounded-xl p-8 border-t-8 border-blue-600">

        <div class="flex justify-between items-center mb-8 border-b pb-4">
            <h1 class="text-3xl font-extrabold text-blue-900 flex items-center gap-3">
                <i data-lucide="wallet" class="w-8 h-8"></i> Your Financial Overview
            </h1>

            <a href="{{ route('bank_accounts.create') }}"
               class="bg-blue-600 text-white px-5 py-2.5 rounded-full font-semibold shadow-lg hover:bg-blue-700 transition duration-300 flex items-center gap-2">
                <i data-lucide="plus-circle"></i> New Account
            </a>
        </div>

        <div class="mb-8 p-6 bg-blue-50 rounded-lg border border-blue-100">
            <h2 class="text-xl font-medium text-blue-800 mb-2">Total Consolidated Balance</h2>
            <p class="text-4xl font-bold text-blue-900">$145,200.55 <span class="text-base font-normal text-gray-500">USD</span></p>
        </div>

        <h2 class="text-2xl font-semibold text-blue-900 mb-5">Individual Accounts</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($bank_accounts as $account)
                <div class="bg-gradient-to-br from-blue-900 to-blue-700 text-white rounded-xl shadow-2xl p-6 relative overflow-hidden transform hover:scale-[1.02] transition duration-300">


                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-sm font-light opacity-80">Account Type</p>
                            <span class="text-xl font-bold capitalize">{{ $account->account_type }}</span>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center p-0.5 shadow-md">
                            @if($account->photo_path)
                                <img src="{{ asset('storage/'.$account->photo_path) }}"
                                     class="w-full h-full rounded-full object-cover">
                            @else
                                <i data-lucide="user-circle" class="w-8 h-8 text-gray-400"></i>
                            @endif
                        </div>
                    </div>

                    <p class="text-sm font-light opacity-80 mt-4">Account Holder</p>
                    <p class="text-lg font-semibold mb-6">{{ $account->holder_name }}</p>

                    <p class="text-sm font-light opacity-80">Current Balance</p>
                    <p class="text-3xl font-extrabold">${{ number_format($account->balance, 2) }}</p>

                    <div x-data="{ open: false }" class="absolute bottom-4 right-4">
                        <button @click="open = true" class="p-2 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white">
                            <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                        </button>
                        <div x-show="open" @click.away="open = false"
                             class="absolute right-0 bottom-full mb-2 w-40 bg-white rounded-lg shadow-xl text-gray-800 text-sm z-10 overflow-hidden">
                            <a href="{{ route('bank_accounts.show', $account) }}" class="block px-4 py-2 hover:bg-gray-100">
                                <i data-lucide="eye" class="w-4 h-4 inline mr-2"></i> View
                            </a>
                            <a href="{{ route('bank_accounts.edit', $account) }}" class="block px-4 py-2 hover:bg-gray-100">
                                <i data-lucide="edit" class="w-4 h-4 inline mr-2"></i> Edit
                            </a>
                            <form action="{{ route('bank_accounts.destroy', $account) }}" method="POST" class="inline delete-form w-full">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block px-4 py-2 hover:bg-red-50 text-red-600 w-full text-left">
                                    <i data-lucide="trash-2" class="w-4 h-4 inline mr-2"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center p-8 bg-gray-50 rounded-lg text-gray-500 italic">
                    <i data-lucide="inbox" class="w-10 h-10 mx-auto mb-2"></i>
                    <p>No bank accounts found. Click "New Account" to get started.</p>
                </div>
            @endforelse
        </div>

        <h2 class="text-2xl font-semibold text-blue-900 mt-10 mb-5 border-t pt-6">Account Summary Table</h2>
        <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden shadow-lg">
            <thead class="bg-blue-900 text-white">
            <tr>
                <th class="py-3 px-4 text-left">#</th>
                <th class="py-3 px-4 text-left">Holder</th>
                <th class="py-3 px-4 text-left">Account Type</th>
                <th class="py-3 px-4 text-right">Balance</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @foreach($bank_accounts as $account)
                <tr class="hover:bg-blue-50 transition">
                    <td class="py-3 px-4 font-medium text-blue-700">{{ $account->id }}</td>
                    <td class="py-3 px-4">{{ $account->holder_name }}</td>
                    <td class="py-3 px-4 capitalize">{{ $account->account_type }}</td>
                    <td class="py-3 px-4 text-right font-semibold text-blue-900">${{ number_format($account->balance, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $bank_accounts->links() }}
        </div>
    </div>
@endsection