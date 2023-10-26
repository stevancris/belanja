<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact ('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validate = $request->validate([
             'amount' => 'required|numeric',
             'type' => 'required|string|max:255',
             'category' => 'required|string|max:255',
             'notes' => 'required|string|max:255',
         ]);

         $transaction = Transaction::create([
             'amount' => $validate['amount'],
             'type' => $validate['type'],
             'category' => $validate['category'],
             'notes' => $validate['notes'],
         ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
         $validate = $request->validate([
             'amount' => 'required|numeric',
             'type' => 'required|string|max:255',
             'category' => 'required|string|max:255',
             'notes' => 'required|string|max:255',
         ]);
        
         $transaction-> update([
             'amount' => $validate['amount'],
             'type' => $validate['type'],
             'category' => $validate['category'],
             'notes' => $validate['notes'],
         ]);

         return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
