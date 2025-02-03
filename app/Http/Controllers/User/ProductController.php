<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
   
    public function createQr(Request $request)
    {
        dd($request->all());
        // try {
        // Lưu thông tin vào session
        // session(['cost_id' => $request->id]);
        // session(['url_prev' => url()->previous()]);

        // Cấu hình thông tin của VNPay
        // $vnp_TmnCode = "UDOPNWS1";  // Mã website tại VNPAY
        // $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN";  // Chuỗi bí mật
        // $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";  // URL sandbox VNPay
        // $vnp_Returnurl = "http://localhost:8000/return-vnpay";  // URL trả về sau khi thanh toán

        // // Lấy các dữ liệu từ request và xử lý
        // $vnp_TxnRef = date("YmdHis");  // Mã đơn hàng (nên lưu vào database thực tế)
        // $vnp_OrderInfo = "Thanh toán hóa đơn phí dịch vụ";
        // $vnp_OrderType = 'billpayment';  // Loại thanh toán
        // $totalAmount = str_replace('.', '', $request->totalAmount);  // Xử lý số tiền
        // $vnp_Amount = $totalAmount * 100;  // VNPay yêu cầu số tiền phải là đơn vị nhỏ nhất (đồng)
        // $vnp_Locale = 'vn';  // Ngôn ngữ
        // $vnp_IpAddr = request()->ip();  // Địa chỉ IP của người dùng

        // // Tạo dữ liệu gửi lên VNPay
        // $inputData = array(
        //     "vnp_Version" => "2.0.0",
        //     "vnp_TmnCode" => $vnp_TmnCode,
        //     "vnp_Amount" => $vnp_Amount,
        //     "vnp_Command" => "pay",
        //     "vnp_CreateDate" => date('YmdHis'),
        //     "vnp_CurrCode" => "VND",
        //     "vnp_IpAddr" => $vnp_IpAddr,
        //     "vnp_Locale" => $vnp_Locale,
        //     "vnp_OrderInfo" => $vnp_OrderInfo,
        //     "vnp_OrderType" => $vnp_OrderType,
        //     "vnp_ReturnUrl" => $vnp_Returnurl,
        //     "vnp_TxnRef" => $vnp_TxnRef,
        // );

        // // Nếu có lựa chọn ngân hàng thì thêm vnp_BankCode
        // if (isset($request->vnp_BankCode) && $request->vnp_BankCode != "") {
        //     $inputData['vnp_BankCode'] = $request->vnp_BankCode;
        // }

        // // Sắp xếp tham số và tạo mã hash
        // ksort($inputData);
        // $query = "";
        // $i = 0;
        // $hashdata = "";
        // foreach ($inputData as $key => $value) {
        //     if ($i == 1) {
        //         $hashdata .= '&' . $key . "=" . $value;
        //     } else {
        //         $hashdata .= $key . "=" . $value;
        //         $i = 1;
        //     }
        //     $query .= urlencode($key) . "=" . urlencode($value) . '&';
        // }

        // // Tạo URL thanh toán
        // $vnp_Url = $vnp_Url . "?" . $query;

        // // Tính toán Secure Hash
        // if (isset($vnp_HashSecret)) {
        //     $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
        //     $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        // }

        // Redirect đến VNPay
        // return redirect($vnp_Url);
        // } catch (\Throwable $th) {
        //     dd($th);
        // }
    }

    // public function returnVnpay(Request $request)
    // {
    //     $vnp_SecureHash = $request->vnp_SecureHash;
    //     $vnp_TxnRef = $request->vnp_TxnRef;
    //     $vnp_Amount = $request->vnp_Amount;
    //     $vnp_ResponseCode = $request->vnp_ResponseCode;
    // }
}
