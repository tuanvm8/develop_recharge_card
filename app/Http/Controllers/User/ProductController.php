<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WithdrawMoney;

class ProductController extends Controller
{
    public function home(Request $request)
    {
        $banks = WithdrawMoney::all();
        return view('user.index', compact('banks'));
    }

    public function phone(Request $request)
    {
        $banks = WithdrawMoney::all();
        return view('user.phone-card', compact('banks'));
    }

    public function loadedPhone()
    {
        $banks = WithdrawMoney::all();
        return view('user.loader-phone', compact('banks'));
    }

    public function dataCard()
    {
        $banks = WithdrawMoney::all();
        return view('user.data-card', compact('banks'));
    }

    // mua thẻ game
    public function showPaymentPage(Request $request)
    {
        $email = $request->input('email');
        $nameCard = $request->input('nameCard');
        $quantity = $request->input('quantity');
        $cardValue = $request->input('cardValue');
        $totalAmount = $request->input('totalAmount');
        $selectedBankId = $request->input('selectedBankId');

        $bank = WithdrawMoney::find($selectedBankId);

        if (!$bank) {
            return redirect()->back()->with('error', 'Ngân hàng không tồn tại!');
        }
        // Trả về view và truyền dữ liệu vào
        return view('user.payment', compact('email', 'nameCard', 'quantity', 'cardValue', 'totalAmount', 'bank'));
    }

    // mua thẻ điện thoại
    public function paymentPhoneVNPAY(Request $request)
    {
        $email = $request->input('email');
        $nameCard = $request->input('nameCard');
        $quantity = $request->input('quantity');
        $cardValue = $request->input('cardValue');
        $totalAmount = $request->input('totalAmount');
        $selectedBankId = $request->input('selectedBankId');

        $bank = WithdrawMoney::find($selectedBankId);

        if (!$bank) {
            return redirect()->back()->with('error', 'Ngân hàng không tồn tại!');
        }
        // Trả về view và truyền dữ liệu vào
        return view('user.payment', compact('email', 'nameCard', 'quantity', 'cardValue', 'totalAmount', 'bank'));
    }

    // nạp thẻ điên thoại
    public function paymentLoadedPhoneVNPAY(Request $request)
    {
        $phone = $request->input('phone');
        $nameCard = $request->input('nameCard');
        $quantity = $request->input('quantity');
        $cardValue = $request->input('cardValue');
        $totalAmount = $request->input('totalAmount');
        $selectedBankId = $request->input('selectedBankId');

        $bank = WithdrawMoney::find($selectedBankId);

        if (!$bank) {
            return redirect()->back()->with('error', 'Ngân hàng không tồn tại!');
        }
        // Trả về view và truyền dữ liệu vào
        return view('user.payment', compact('phone', 'nameCard', 'quantity', 'cardValue', 'totalAmount', 'bank'));
    }

    // mua thẻ data
    public function paymentDataVNPAY(Request $request)
    {
        $email = $request->input('email');
        $nameCard = $request->input('nameCard');
        $quantity = $request->input('quantity');
        $cardValue = $request->input('cardValue');
        $totalAmount = $request->input('totalAmount');
        $selectedBankId = $request->input('selectedBankId');

        $bank = WithdrawMoney::find($selectedBankId);

        if (!$bank) {
            return redirect()->back()->with('error', 'Ngân hàng không tồn tại!');
        }
        // Trả về view và truyền dữ liệu vào
        return view('user.payment', compact('email', 'nameCard', 'quantity', 'cardValue', 'totalAmount', 'bank'));
    }
}
