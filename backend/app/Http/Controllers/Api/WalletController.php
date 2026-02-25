<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $userId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'sometimes|string|max:255',
        ]);
        
        $user = \App\Models\User::findOrFail($userId);

        $wallet = $user->wallets()->create($validated);

        return response()->json([
            'message' => 'Wallet created successfully',
            'wallet' => $wallet
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wallet = \App\Models\Wallet::with(['transactions'])->findOrFail($id);

        return response()->json([
            'wallet' => $wallet,
        ]);
    }
}
