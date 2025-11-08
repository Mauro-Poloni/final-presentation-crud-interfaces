@extends('layouts.app')

@section('title', 'Edit Account')

@section('content')

    <div class="bg-white shadow-2xl rounded-xl p-8 max-w-2xl mx-auto border-t-8 border-blue-600">
        <h2 class="text-3xl font-extrabold text-blue-900 mb-8 border-b pb-4 flex items-center gap-3">
            <i data-lucide="edit-3" class="w-7 h-7 text-blue-600"></i> Edit Bank Account
        </h2>

        <form action="{{ route('bank_accounts.update', $bank_account) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Account Number</label>
                    <input type="text" name="account_number" class="w-full border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                           value="{{ $bank_account->account_number }}" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Holder Name</label>
                    <input type="text" name="holder_name" class="w-full border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                           value="{{ $bank_account->holder_name }}" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Account Type</label>
                    <select name="account_type" class="w-full border-gray-300 rounded-lg p-3 bg-white focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        <option value="savings" {{ $bank_account->account_type == 'savings' ? 'selected' : '' }}>Savings</option>
                        <option value="checking" {{ $bank_account->account_type == 'checking' ? 'selected' : '' }}>Checking</option>
                        <option value="investment" {{ $bank_account->account_type == 'investment' ? 'selected' : '' }}>Investment</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Balance</label>
                    <input type="number" step="0.01" name="balance" class="w-full border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                           value="{{ $bank_account->balance }}">
                </div>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Notes</label>
                <textarea name="notes" rows="3" class="w-full border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150">{{ $bank_account->notes }}</textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-6 items-center border p-4 rounded-lg bg-gray-50">
                <div class="flex-shrink-0">
                    <p class="font-semibold text-gray-700 mb-2 sm:mb-0">Current Image:</p>
                    @if($bank_account->photo_path)
                        <img src="{{ asset('storage/'.$bank_account->photo_path) }}"
                             class="w-20 h-20 rounded-full object-cover border-4 border-blue-200 shadow-md">
                    @else
                        <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 border border-dashed">
                            <i data-lucide="image-off" class="w-8 h-8"></i>
                        </div>
                    @endif
                </div>
                <div class="flex-grow w-full">
                    <label class="block font-semibold text-gray-700 mb-1">Upload New Image</label>
                    <input type="file" name="photo" class="w-full border-gray-300 rounded-lg p-3 bg-white text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 cursor-pointer">
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('bank_accounts.index') }}" class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-800 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-blue-700 transition duration-150 flex items-center gap-2">
                    <i data-lucide="refresh-cw"></i> Update Account
                </button>
            </div>
        </form>
    </div>
@endsection