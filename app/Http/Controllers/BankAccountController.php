<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank_accounts = BankAccount::orderBy('created_at', 'desc')->paginate(10);
        return view('bank_accounts.index', compact('bank_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank_accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_number' => 'required|string|max:30|unique:bank_accounts,account_number',
            'holder_name'    => 'required|string|max:100',
            'account_type'   => 'required|in:savings,checking,investment',
            'balance'        => 'required|numeric|min:0',
            'notes'          => 'nullable|string',
            'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('bank_photos', 'public');
        }

        BankAccount::create($validated);

        session()->flash('success', 'Bank account created successfully.');
        return redirect()->route('bank_accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BankAccount $bank_account)
    {
        return view('bank_accounts.show', compact('bank_account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankAccount $bank_account)
    {
        return view('bank_accounts.edit', compact('bank_account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankAccount $bank_account)
    {
        $validated = $request->validate([
            'account_number' => 'required|string|max:30|unique:bank_accounts,account_number,' . $bank_account->id,
            'holder_name'    => 'required|string|max:100',
            'account_type'   => 'required|in:savings,checking,investment',
            'balance'        => 'required|numeric|min:0',
            'notes'          => 'nullable|string',
            'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // eliminar imagen anterior
            if ($bank_account->photo_path && Storage::disk('public')->exists($bank_account->photo_path)) {
                Storage::disk('public')->delete($bank_account->photo_path);
            }
            $validated['photo_path'] = $request->file('photo')->store('bank_photos', 'public');
        }

        $bank_account->update($validated);

        session()->flash('success', 'Bank account updated successfully.');
        return redirect()->route('bank_accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankAccount $bank_account)
    {
        if ($bank_account->photo_path && Storage::disk('public')->exists($bank_account->photo_path)) {
            Storage::disk('public')->delete($bank_account->photo_path);
        }

        $bank_account->delete();

        session()->flash('success', 'Bank account deleted successfully.');
        return redirect()->route('bank_accounts.index');
    }
}