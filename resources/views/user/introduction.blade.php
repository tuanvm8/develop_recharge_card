@extends('user.main')
@section('templateContent')
<div class="col-12 my-4">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" style="height: 300px"
                    src="https://cdn.mobilecity.vn/mobilecity-vn/images/2024/05/hinh-nen-bau-troi-1.jpg.webp"
                    alt="First slide" />
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div>
            <span class="" style="color: #1976d2 !important"><b>Trang chủ</b></span>
            / Giới thiệu
        </div>
        <div class="my-5">
            <h2 class="text-introduce d-flex align-items-center px-5">
                <b>GIỚI THIỆU</b>
            </h2>
        </div>
        <div class="row my-3 px-5">
            <div class="col col-12">
                <h6 class="subtitle-1 font-weight-bold">
                    Hệ thống NAPLUON trân trọng cảm ơn quý khách hàng đã quan tâm đến
                    dịch vụ của chúng tôi!
                </h6>
                <div>
                    <p class="p">
                        Hệ thống
                        <strong>NAPLUON</strong> trực thuộc Công ty cổ phần công nghệ và
                        thương mại TEKTRA, có trụ sở tại tòa nhà D17, ngõ 76/8 Phố Duy
                        Tân, Phường Dịch Vọng Hậu, Cầu Giấy, Hà Nội. TEKTRA luôn mong muốn
                        mang đến cho quý khách hàng những tiện ích tối ưu trong quá trình
                        chơi game.
                    </p>
                </div>
                <div>
                    <p class="p">
                        Hệ thống
                        <strong>NAPLUON</strong> ra đời như một bước tiến mới để chúng tôi
                        có thể tiếp tục sứ mệnh mang đến sự hài lòng cho quý khách hàng
                        một cách thường xuyên và lâu dài.
                    </p>
                </div>
                <div class="subtitle-1 font-weight-bold">
                    <p>Hệ thống NAPLUON cung cấp các dịch vụ:</p>
                </div>
                <ul class="ull">
                    <li>
                        Mua
                        <span class="lighten-3">thẻ game online</span>
                        của 15 loại tài khoản game từ các nhà cung cấp.
                    </li>
                </ul>
                <div>
                    Đặc biệt, tại
                    <strong>NAPLUON</strong>, chúng tôi đưa các tiêu chí
                    <strong>MINH BẠCH – RÕ RÀNG – AN TOÀN – TIỆN ÍCH</strong>
                    để mang đến dịch vụ nạp tiền chất lượng và đảm bảo nhất hiện nay.
                </div>
                <div>
                    <p class="p">
                        Các chính sách bảo mật; chính sách cung cấp, hủy và hoàn trả dịch
                        vụ; điều khoản sử dụng; quy trình giải quyết khiếu nại đều được
                        <strong>NAPLUON</strong> quy định cụ thể trên website chính thức
                        của hệ thống.
                    </p>
                </div>
                <div class="subtitle-1 font-weight-bold mb-3">
                    <h6>Mọi thắc mắc và đề nghị hợp tác, quý khách hàng vui lòng liên hệ:</h6>
                </div>
                <div>
                    - Công ty cổ phần công nghệ và thương mại TEKTRA&ZeroWidthSpace;
                </div>
                <div>
                    - Email:
                    <span class="blue-text">hotro@NAPLUON.vn</span>&ZeroWidthSpace;
                </div>
            </div>
        </div>
    </div>
    <style>
        .custom-text {
            color: #1976d2 !important;
            font-size: 14px;
            font-weight: 500;
            padding-top: 6px;
        }

        .custom-button {
            padding-top: 6px;
            font-weight: 500;
            color: #1976d2 !important;
        }

        .text-introduce {
            height: 88px;
            width: 100%;
            background: #e0e0e0 !important;
        }

        .blue-text {
            color: #2196f3 !important;
        }
    </style>
@endsection
