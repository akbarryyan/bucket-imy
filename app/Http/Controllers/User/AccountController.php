<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderCustom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        $customOrders = OrderCustom::where('user_id', $user->id)->get();

        return view('user.my_account', compact('orders', 'customOrders'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (Hash::check($request->current_password, $user->password)) {
                $data['password'] = Hash::make($request->new_password);
            } else {
                return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
        }

        DB::table('users')->where('id', $user->id)->update($data);

        return redirect()->route('account.index')->with('success', 'Account details updated successfully.');
    }
}

