<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPayments()
    {
        $payments = Payment::all();
        return view('admin.payments', compact('payments'));
    }

    public function storePayment(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
        ]);

        Payment::create([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
        ]);

        return redirect()->route('admin.payments')->with('success', 'Payment account added successfully.');
    }

    public function updatePayment(Request $request, $id)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
        ]);

        return redirect()->route('admin.payments')->with('success', 'Payment account updated successfully.');
    }

    public function destroyPayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payments')->with('success', 'Payment account deleted successfully.');
    }
}
