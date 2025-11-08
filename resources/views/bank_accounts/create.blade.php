@extends('layouts.app')

@section('title', 'Create Account')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
        <h2 class="text-2xl font-semibold text-blue-900 mb-6 flex items-center gap-2">
            <i data-lucide="plus"></i> Create New Bank Account
        </h2>

        <form action="{{ route('bank_accounts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block font-medium text-gray-700">Account Number</label>
                <input type="text" name="account_number" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Holder Name</label>
                <input type="text" name="holder_name" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Account Type</label>
                <select name="account_type" class="w-full border-gray-300 rounded-lg p-2 bg-white">
                    <option value="savings">Savings</option>
                    <option value="checking">Checking</option>
                    <option value="investment">Investment</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Initial Balance</label>
                <input type="number" step="0.01" name="balance" class="w-full border-gray-300 rounded-lg p-2" value="0.00">
            </div>

            <div>
                <label class="block font-medium text-gray-700">Notes</label>
                <textarea name="notes" rows="3" class="w-full border-gray-300 rounded-lg p-2"></textarea>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Account Image / Logo</label>
                <input type="file" name="photo" class="w-full border-gray-300 rounded-lg p-2 bg-white">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('bank_accounts.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-800 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
                    <i data-lucide="save"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection