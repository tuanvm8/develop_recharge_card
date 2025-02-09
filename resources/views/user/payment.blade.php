<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thông tin thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="background: #faf7f7">
        <div class="row py-5">
            <div class="col-2"></div>
            <div class="col-4" style="background: #e9e9e9">
                <div class="col-12 mt-4">
                    <h4>Hóa đơn sản phẩm</h4>
                    <hr>
                </div>
                <div class="col-12">
                    <p>Tổng tiền: <span id="totalAmount" style="color: red;font-size: 28px;"> {{ number_format($totalAmount, 0, ',', '.') }}đ</span></p>
                </div>
                <div class="col-12">
                    <p>Loại thẻ: <span id="cardName" style="color: red;font-size: 22px;">{{ $nameCard }}</span></p>
                </div>
                <div class="col-12">
                    <p>Mã thẻ: <span id="cardValue" style="color: red;font-size: 22px;">{{ $cardValue }}</span></p>
                </div>
                <div class="col-12">
                    <p>Mệnh giá: <span id="cardValue" style="color: red;font-size: 22px;">{{ $cardValue }}</span></p>
                </div>
                <div class="col-12">
                    <p>Số lượng: <span id="quantity" style="color: red;font-size: 22px;">{{ $quantity }}</span></p>
                </div>
                <div class="col-12">
                @if(isset($phone) && !empty($phone))
                    <p>Số điện thoại: <span id="email" style="color: red; font-size: 22px;">{{ $phone }}</span></p>
                @else
                    <p>Email: <span id="email" style="color: red; font-size: 22px;">{{ $email }}</span></p>
                @endif
                </div>
            </div>
            <div class="col-4">
                <div class="col-12 text-center">
                    <h4 class="qr" style="font-size: 20px">Scan QR code via Bank / E wallet app </h4>
                </div>
                <br>
                <div class="col-12 d-flex justify-content-center">
                    <img src="{{ asset('asset/qr/' . $bank->filename) }}" alt="Mã QR của {{ $bank->filename }}" width="300">
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
