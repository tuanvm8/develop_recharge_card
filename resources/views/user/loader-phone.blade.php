@extends('user.main')
@section('pageTitle', 'Trang chủ')
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
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <h5 class="card p-3">Chọn nhà cung cấp</h5>
                <div class="d-flex flex-wrap p-2" id="provider-container">
                    <div class="provider me-3 mb-3" data-provider="vina">
                        <img alt="Vina" src="{{ asset('asset/images/VINAPHONE_01.jpg') }}" />
                    </div>
                    <div class="provider me-3 mb-3" data-provider="viettel">
                        <img alt="Viettel" src="{{ asset('asset/images/VIETTEL_01.png') }}" />
                    </div>
                    <div class="provider me-3 mb-3" data-provider="mobile">
                        <img alt="Mobile" src="{{ asset('asset/images/MOBIFONE_01.png') }}" />
                    </div>
                </div>
                <h5 class="card p-3">Chọn mệnh giá</h5>
                <div class="d-flex flex-wrap p-2" id="provider2-container">
                    <div class="w-100 text-center p-3">
                        <p style="font-size: 1.2em; color: #ff0000">
                            Hãy chọn nhà cung cấp
                        </p>
                    </div>
                </div>

                <h5 class="card p-3">Thông tin nạp</h5>
                <div class="p-3">
                    <p class="fw-semibold">
                        Số điện thoại nạp (Vui lòng nhập số điện thoại 10 số, bắt đầu từ
                        số 0, ví dụ: 09...) <span class="text-danger">*</span>
                    </p>
                    <input id="phone-input" class="form-control" placeholder="Vui lòng nhập số điện thoại" type="number"
                        style="height: 60px" />
                    <p id="phone-error" style="color: red; display: none;"></p> 
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="fw-semibold">Thanh toán</h2>
                <h5 class="card fw-normal p-2">Hình thức thanh toàn</h5>
                <div class="payment-method mb-3">
                    <div class="row p-2">
                        <div class="col-4" id="selectedBankLogo">
                            <img alt="VNPay logo" src="{{ asset('asset/images/vnpay-qrcode-1.png') }}" width="120" />
                        </div>
                        <div class="col-4">
                            <p class="fw-normal fs-6">Thanh toán quét mã VNPAYQR</p>
                        </div>
                        <div class="col-4 text-end">
                            <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal">Thay đổi</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="paymentModalLabel">Thay đổi kênh thanh toán</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-wrap p-2 justify-content-center">
                                    @foreach ($banks as $bank)
                                        <div class="me-3 mb-3">
                                            <img class="custom-logo" 
                                                src="{{ asset('asset/logo/' . $bank->logo) }}"
                                                data-bank="{{ $bank->title }}" 
                                                data-id="{{ $bank->id }}" 
                                                style="height: 75px;" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tiếp tục</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="card fw-normal p-2">Chi tiết giao dịch</h5>
                <p class="text-danger p-2">
                    Quý khách kiểm tra và cảnh giác không thanh toán hộ, hoặc cung cấp
                    thông tin cho người lạ trước khi thanh toán
                </p>
                <ul class="list-unstyled p-2">
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Hình thức nạp:
                        <span class="float-end text-danger"> </span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Mệnh giá:
                        <span class="float-end text-danger"></span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Số điện thoại nạp:
                        <span class="float-end text-danger"> </span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Phí giao dịch:
                        <span class="float-end text-danger"></span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Giảm giá:
                        <span class="float-end text-danger"> </span>
                    </li>
                    <li class="fw-bold">
                        Tổng tiền:
                        <span class="float-end text-danger total" style="font-size: xx-large"></span>
                    </li>
                </ul>
                <button id="pay-button" class="btn btn-primary w-100"
                    style="
            background-image: linear-gradient(
              90deg,
              #01b49b,
              #277de4
            ) !important;
          ">
                    Thanh Toán
                </button>
            </div>
        </div>
    </div>
    <script>
        let selectedBankId = null;
        let selectedBank = null;
        // Giá cho từng loại thẻ
        document.addEventListener("DOMContentLoaded", () => {
            const providers = document.querySelectorAll(".provider");
            const provider2Container = document.getElementById(
                "provider2-container"
            );
            const infoList = document.querySelector(".list-unstyled");
            const defaultContent = provider2Container.innerHTML;

            const data = {
                vina: [{
                        value: "100.000đ",
                        price: "99.000đ"
                    },
                    {
                        value: "200.000đ",
                        price: "198.000đ"
                    },
                    {
                        value: "300.000đ",
                        price: "297.000đ"
                    },
                    {
                        value: "500.000đ",
                        price: "495.000đ"
                    },
                ],
                viettel: [{
                    value: "50.000đ",
                    price: "49.500đ"
                }],
                mobile: [{
                        value: "100.000đ",
                        price: "99.000đ"
                    },
                    {
                        value: "200.000đ",
                        price: "198.000đ"
                    },
                    {
                        value: "300.000đ",
                        price: "297.000đ"
                    },
                    {
                        value: "500.000đ",
                        price: "495.000đ"
                    },
                ],
            };

            // Hàm cập nhật thông tin hiển thị
            const updateInfo = (
                providerName,
                cardValue,
                cardPrice,
                phoneNumber = ""
            ) => {
                const fee = 1980; // Phí giao dịch cố định
                const discount =
                    parseFloat(cardValue.replace(/[^\d]/g, "")) -
                    parseFloat(cardPrice.replace(/[^\d]/g, ""));
                const total = parseFloat(cardPrice.replace(/[^\d]/g, "")) + fee;

                infoList.innerHTML = `
      <li class="border-bottom border-secondary pb-2 pt-2">
        Hình thức nạp:
        <span class="float-end text-danger">${providerName}</span>
      </li>
      <li class="border-bottom border-secondary pb-2 pt-2">
        Mệnh giá:
        <span class="float-end text-danger">${cardValue}</span>
      </li>
      <li class="border-bottom border-secondary pb-2 pt-2">
        Số điện thoại nạp:
        <span class="float-end text-danger">${phoneNumber || "Chưa nhập"}</span>
      </li>
      <li class="border-bottom border-secondary pb-2 pt-2">
        Phí giao dịch:
        <span class="float-end text-danger">${fee.toLocaleString()}đ</span>
      </li>
      <li class="border-bottom border-secondary pb-2 pt-2">
        Giảm giá:
        <span class="float-end text-danger">${discount.toLocaleString()}đ</span>
      </li>
      <li class="fw-bold">
        Tổng tiền:
        <span class="float-end text-danger total" style="font-size: xx-large">
          ${total.toLocaleString()}đ
        </span>
      </li>
    `;
            };

            const phoneInput = document.getElementById("phone-input");
            phoneInput.addEventListener("input", () => {
                const activeProvider = document.querySelector(".provider.active");
                const activeCard = document.querySelector(".provider2.active");
                if (activeProvider && activeCard) {
                    const providerName = activeProvider.getAttribute("data-provider");
                    const cardValue = activeCard.getAttribute("data-value");
                    const cardPrice = activeCard.getAttribute("data-price");
                    const phoneNumber = phoneInput.value;
                    updateInfo(providerName, cardValue, cardPrice, phoneNumber);
                }
            });

            // Hàm render danh sách giá trị
            const renderPrices = (selectedData, providerName) => {
                provider2Container.innerHTML = selectedData
                    .map(
                        (item, index) => `
        <div class="provider2 me-3 mb-3 ${index === 0 ? "active" : ""}" 
             data-value="${item.value}" data-price="${item.price}">
          <p>${item.value}</p>
          <small> Giá bán: <a style="color: #002bff">${item.price}</a> </small>
        </div>
      `
                    )
                    .join("");

                const priceElements = document.querySelectorAll(".provider2");
                priceElements.forEach((priceEl, index) => {
                    priceEl.addEventListener("click", () => {
                        priceElements.forEach((el) => el.classList.remove("active"));
                        priceEl.classList.add("active");
                        const cardValue = priceEl.getAttribute("data-value");
                        const cardPrice = priceEl.getAttribute("data-price");
                        const phoneNumber = phoneInput.value; // Lấy số điện thoại hiện tại
                        updateInfo(providerName, cardValue, cardPrice, phoneNumber);
                    });

                    // Mặc định active phần tử đầu tiên
                    if (index === 0) {
                        const cardValue = priceEl.getAttribute("data-value");
                        const cardPrice = priceEl.getAttribute("data-price");
                        const phoneNumber = phoneInput.value; // Lấy số điện thoại hiện tại
                        updateInfo(providerName, cardValue, cardPrice, phoneNumber);
                    }
                });
            };

            // Khi người dùng click vào nhà cung cấp
            providers.forEach((provider) => {
                provider.addEventListener("click", () => {
                    providers.forEach((el) => el.classList.remove("active"));
                    provider.classList.add("active");
                    const providerType = provider.getAttribute("data-provider");
                    if (data[providerType]) {
                        renderPrices(data[providerType], providerType);
                    } else {
                        provider2Container.innerHTML = `
          <div class="w-100 text-center p-3">
            <p style="font-size: 1.2em; color: #ff0000;">Sắp mở bán</p>
          </div>
        `;
                    }
                });
            });
            const logos = document.querySelectorAll(".custom-logo");
            const btnContinue = document.querySelector("#paymentModal .btn-primary");

            const selectedBankLogo = document.querySelector("#selectedBankLogo");

            logos.forEach(logo => {
                logo.addEventListener("click", function () {
                    logos.forEach(item => item.classList.remove("active"));
                    this.classList.add("active");

                    selectedBank = this.getAttribute("data-bank");
                    selectedBankId = this.getAttribute("data-id");
                    console.log("Ngân hàng được chọn:", selectedBank);
                });
            });

            btnContinue.addEventListener("click", function () {
                if (selectedBank) {
                    const selectedLogo = document.querySelector(`.custom-logo[data-bank="${selectedBank}"]`);
                    if (selectedLogo) {
                        const newImgSrc = selectedLogo.getAttribute("src");
                        const paymentImage = document.querySelector(".payment-method img");
                        paymentImage.setAttribute("src", newImgSrc);
                        paymentImage.classList.add("active");
                    }
                }
            });

            selectedBankLogo.addEventListener("click", function () {
                selectedBankLogo.classList.toggle("active");
            });
        });

        document.getElementById('pay-button').addEventListener('click', function() {
            const activeProvider = document.querySelector(".provider.active");
            if (!activeProvider) {
                alert("Bạn cần chọn nhà cung cấp trước khi thanh toán!");
                return;
            }
            if (!selectedBankId || selectedBankId === "null") {
                alert("Bạn cần chọn ngân hàng trước khi thanh toán!");
                return;
            }
            const phoneInput = document.getElementById('phone-input');
            const phoneError = document.getElementById('phone-error');
            const phoneValue = phoneInput.value.trim();

            const providerValue = activeProvider.getAttribute("data-provider");

            const activeCard = document.querySelector(".provider2.active");
            const cardValue = activeCard ? activeCard.getAttribute("data-value") : '';

            const spanElement = document.querySelector('.total');
            const totalAmount = spanElement ? spanElement.textContent.trim() : '0';

            const cardName = document.querySelector('.float-end.text-danger');
            const nameCard = cardName ? cardName.textContent.trim() : '';

            const phoneRegex = /^(0[3|5|7|8|9])([0-9]{8})$/; // Regex kiểm tra số điện thoại VN

            // Kiểm tra số điện thoại trước
            if (!phoneValue) {
                phoneError.textContent = "Bạn chưa nhập số điện thoại!";
                phoneError.style.display = "block";
                return;
            } 

            if (!phoneRegex.test(phoneValue)) {
                phoneError.textContent = "Số điện thoại không hợp lệ!";
                phoneError.style.display = "block";
                return;
            } 

            // Nếu nhập đúng, ẩn thông báo lỗi
            phoneError.style.display = "none";


            // Tạo một form ẩn
            const form = document.createElement('form');
            form.method = 'GET';
            form.action = '/payment-loaded-phone';

            // Thêm CSRF token
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : null;

            if (csrfToken) {
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);
            }

            // Thêm dữ liệu vào form
            const requestData = {
                phone: phoneValue,
                nameCard: nameCard,
                cardValue: cardValue.replace(/[^\d.-]/g, ''),
                totalAmount: totalAmount.replace(/[^\d.-]/g, ''),
                selectedBankId: selectedBankId
            };

            for (const key in requestData) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = requestData[key];
                form.appendChild(input);
            }

            // Thêm form vào body và submit
            document.body.appendChild(form);
            form.submit();
        });
    </script>
    <style>
        .custom-logo {
            cursor: pointer;
            width: 150px;
            height: 80px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .custom-logo.active {
            border: 4px solid #277de4;
        }
    </style>
@endsection
