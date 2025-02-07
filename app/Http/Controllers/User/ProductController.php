<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Product;



class ProductController extends Controller
{
    public function home()
    {
        return view('user.index');
    }

    public function phone()
    {
        return view('user.phone-card');
    }

    public function loadedPhone()
    {
        return view('user.loader-phone');
    }

    public function dataCard()
    {
        return view('user.data-card');
    }

    // mua thẻ game
    public function paymentVNPAY(Request $request)
    {
        // dd($request->all());
        $contactInfo = $request->input('email');
        $nameCard = $request->input('nameCard');
        $quantity = $request->input('quantity');
        $cardValue = (float) str_replace('.', '', $request->input('cardValue'));
        $totalAmount = (float) str_replace('.', '', $request->input('totalAmount'));

        $vnp_TxnRef = time() . rand(1000, 9999);

        // Thông tin VNPAY
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('return.vnpay');
        $vnp_TmnCode = "KA1BV3N8";
        $vnp_HashSecret = "12GUKMUAGMQR4QW57D26MKG56RCYN9G8";

        $vnp_Amount = $totalAmount * 100;
        $vnp_Locale = "VN";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_OrderInfo = "Thanh toán VNPAY đơn hàng #$vnp_TxnRef";

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Tạo hash key bảo mật
        ksort($inputData);
        $hashdata = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $query = $hashdata . '&vnp_SecureHash=' . $vnpSecureHash;

        // Lưu tạm vào session 
        session([
            'contact_info' => $contactInfo,
            'name_card' => $nameCard,
            'quantity' => $quantity,
            'card_value' => $cardValue,
            'total_amount' => $totalAmount,
            'vnp_TxnRef' => $vnp_TxnRef,
        ]);

        // Chuyển hướng đến VNPAY
        return redirect($vnp_Url . "?" . $query);
    }

    public function returnVNPAY(Request $request)
    {
        // Lấy thông tin từ VNPAY phản hồi
        $vnp_ResponseCode = $request->input('vnp_ResponseCode'); // Mã phản hồi
        $vnp_TxnRef = $request->input('vnp_TxnRef'); // Mã giao dịch

        if ($vnp_ResponseCode == '00') {
            // Lấy lại dữ liệu từ session
            $contactInfo = session('contact_info');
            $nameCard = session('name_card');
            $quantity = session('quantity');
            $cardValue = session('card_value');
            $totalAmount = session('total_amount');

            Payment::create([
                'user_id' => 1,
                'contact_info' => $contactInfo,
                'name_card' => $nameCard,
                'quantity' => $quantity,
                'card_value' => $cardValue,
                'total_amount' => $totalAmount,
                'transaction_type' => 'Mua thẻ game',
                'vnp_TxnRef' => $vnp_TxnRef,
                'status' => 1,
            ]);

            session()->forget([
                'contact_info',
                'name_card',
                'quantity',
                'card_value',
                'total_amount',
                'vnp_TxnRef'
            ]);

            return redirect()->route('home')->with('success', 'Thanh toán thành công!');
        } else {
            return redirect()->route('home')->with('error', 'Thanh toán thất bại!');
        }
    }

    // mua thẻ điện thoại
    public function paymentPhoneVNPAY(Request $request)
    {
        $contactInfo = $request->input('email');
        $nameCard = $request->input('nameCard');
        $quantity = $request->input('quantity');
        $cardValue = (float) str_replace('.', '', $request->input('cardValue'));
        $totalAmount = (float) str_replace('.', '', $request->input('totalAmount'));

        $vnp_TxnRef = time() . rand(1000, 9999);

        // Thông tin VNPAY
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('return.phone.vnpay');
        $vnp_TmnCode = "KA1BV3N8";
        $vnp_HashSecret = "12GUKMUAGMQR4QW57D26MKG56RCYN9G8";

        $vnp_Amount = $totalAmount * 100;
        $vnp_Locale = "VN";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_OrderInfo = "Thanh toán VNPAY đơn hàng #$vnp_TxnRef";

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Tạo hash key bảo mật
        ksort($inputData);
        $hashdata = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $query = $hashdata . '&vnp_SecureHash=' . $vnpSecureHash;

        // Lưu tạm vào session 
        session([
            'contact_info' => $contactInfo,
            'name_card' => $nameCard,
            'quantity' => $quantity,
            'card_value' => $cardValue,
            'total_amount' => $totalAmount,
            'vnp_TxnRef' => $vnp_TxnRef,
        ]);

        // Chuyển hướng đến VNPAY
        return redirect($vnp_Url . "?" . $query);
    }

    public function returnPhoneVNPAY(Request $request)
    {
        // Lấy thông tin từ VNPAY phản hồi
        $vnp_ResponseCode = $request->input('vnp_ResponseCode'); // Mã phản hồi
        $vnp_TxnRef = $request->input('vnp_TxnRef'); // Mã giao dịch

        if ($vnp_ResponseCode == '00') {
            // Lấy lại dữ liệu từ session
            $contactInfo = session('contact_info');
            $nameCard = session('name_card');
            $quantity = session('quantity');
            $cardValue = session('card_value');
            $totalAmount = session('total_amount');

            Payment::create([
                'user_id' => 1,
                'contact_info' => $contactInfo,
                'name_card' => $nameCard,
                'quantity' => $quantity,
                'card_value' => $cardValue,
                'total_amount' => $totalAmount,
                'transaction_type' => 'Mua thẻ điện thoại',
                'vnp_TxnRef' => $vnp_TxnRef,
                'status' => 1,
            ]);

            session()->forget([
                'contact_info',
                'name_card',
                'quantity',
                'card_value',
                'total_amount',
                'vnp_TxnRef'
            ]);

            return redirect()->route('home')->with('success', 'Thanh toán thành công!');
        } else {
            return redirect()->route('home')->with('error', 'Thanh toán thất bại!');
        }
    }

    // nạp thẻ điên thoại
    public function paymentLoadedPhoneVNPAY(Request $request)
    {
        // dd($request->all());
        $contactInfo = $request->input('phone');
        $nameCard = $request->input('nameCard');
        $cardValue = (float) str_replace('.', '', $request->input('cardValue'));
        $totalAmount = (float) str_replace('.', '', $request->input('totalAmount'));

        $vnp_TxnRef = time() . rand(1000, 9999);

        // Thông tin VNPAY
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('return.loaded.phone.vnpay');
        $vnp_TmnCode = "KA1BV3N8";
        $vnp_HashSecret = "12GUKMUAGMQR4QW57D26MKG56RCYN9G8";

        $vnp_Amount = $totalAmount * 100;
        $vnp_Locale = "VN";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_OrderInfo = "Thanh toán VNPAY đơn hàng #$vnp_TxnRef";

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Tạo hash key bảo mật
        ksort($inputData);
        $hashdata = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $query = $hashdata . '&vnp_SecureHash=' . $vnpSecureHash;

        // Lưu tạm vào session 
        session([
            'contact_info' => $contactInfo,
            'name_card' => $nameCard,
            'card_value' => $cardValue,
            'total_amount' => $totalAmount,
            'vnp_TxnRef' => $vnp_TxnRef,
        ]);

        // Chuyển hướng đến VNPAY
        return redirect($vnp_Url . "?" . $query);
    }

    public function returnLoadedPhoneVNPAY(Request $request)
    {
        // Lấy thông tin từ VNPAY phản hồi
        $vnp_ResponseCode = $request->input('vnp_ResponseCode'); // Mã phản hồi
        $vnp_TxnRef = $request->input('vnp_TxnRef'); // Mã giao dịch

        if ($vnp_ResponseCode == '00') {
            // Lấy lại dữ liệu từ session
            $contactInfo = session('contact_info');
            $nameCard = session('name_card');
            $cardValue = session('card_value');
            $totalAmount = session('total_amount');

            Payment::create([
                'user_id' => 1,
                'contact_info' => $contactInfo,
                'name_card' => $nameCard,
                'quantity' => 1,
                'card_value' => $cardValue,
                'total_amount' => $totalAmount,
                'transaction_type' => 'Nạp thẻ điện thoại',
                'vnp_TxnRef' => $vnp_TxnRef,
                'status' => 1,
            ]);

            session()->forget([
                'contact_info',
                'name_card',
                'card_value',
                'total_amount',
                'vnp_TxnRef'
            ]);

            return redirect()->route('home')->with('success', 'Thanh toán thành công!');
        } else {
            return redirect()->route('home')->with('error', 'Thanh toán thất bại!');
        }
    }

    // mua thẻ data
    public function paymentDataVNPAY(Request $request)
    {
        // dd($request->all());
        $contactInfo = $request->input('email');
        $nameCard = $request->input('nameCard');
        $quantity = $request->input('quantity');
        $cardValue = (float) str_replace('.', '', $request->input('cardValue'));
        $totalAmount = (float) str_replace('.', '', $request->input('totalAmount'));

        $vnp_TxnRef = time() . rand(1000, 9999);

        // Thông tin VNPAY
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('return.data.vnpay');
        $vnp_TmnCode = "KA1BV3N8";
        $vnp_HashSecret = "12GUKMUAGMQR4QW57D26MKG56RCYN9G8";

        $vnp_Amount = $totalAmount * 100;
        $vnp_Locale = "VN";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_OrderInfo = "Thanh toán VNPAY đơn hàng #$vnp_TxnRef";

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Tạo hash key bảo mật
        ksort($inputData);
        $hashdata = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $query = $hashdata . '&vnp_SecureHash=' . $vnpSecureHash;

        // Lưu tạm vào session 
        session([
            'contact_info' => $contactInfo,
            'name_card' => $nameCard,
            'quantity' => $quantity,
            'card_value' => $cardValue,
            'total_amount' => $totalAmount,
            'vnp_TxnRef' => $vnp_TxnRef,
        ]);

        // Chuyển hướng đến VNPAY
        return redirect($vnp_Url . "?" . $query);
    }

    public function returnDataVNPAY(Request $request)
    {
        // Lấy thông tin từ VNPAY phản hồi
        $vnp_ResponseCode = $request->input('vnp_ResponseCode'); // Mã phản hồi
        $vnp_TxnRef = $request->input('vnp_TxnRef'); // Mã giao dịch

        if ($vnp_ResponseCode == '00') {
            // Lấy lại dữ liệu từ session
            $contactInfo = session('contact_info');
            $nameCard = session('name_card');
            $quantity = session('quantity');
            $cardValue = session('card_value');
            $totalAmount = session('total_amount');

            Payment::create([
                'user_id' => 1,
                'contact_info' => $contactInfo,
                'name_card' => $nameCard,
                'quantity' => $quantity,
                'card_value' => $cardValue,
                'total_amount' => $totalAmount,
                'transaction_type' => 'Mua thẻ data',
                'vnp_TxnRef' => $vnp_TxnRef,
                'status' => 1,
            ]);

            session()->forget([
                'contact_info',
                'name_card',
                'quantity',
                'card_value',
                'total_amount',
                'vnp_TxnRef'
            ]);

            return redirect()->route('home')->with('success', 'Thanh toán thành công!');
        } else {
            return redirect()->route('home')->with('error', 'Thanh toán thất bại!');
        }
    }
}
