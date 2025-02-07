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
                        <p style="font-size: 1.2em; color: #ff0000;">Hãy chọn nhà cung cấp</p>
                    </div>
                </div>
                <h5 class="card p-3">Chọn số lượng thẻ</h5>
                <div class="input-group p-3 justify-content-between">
                    <p class="fw-semibold">Số lượng</p>
                    <div class="d-flex">
                        <button class="btn btn-sm me-1 btn-decrease"
                            style="background-color: rgb(12, 164, 176); color: #fff;">-</button>
                        <input type="number" class="form-control text-center me-1 quantity-input" value="1"
                            min="0" style="max-width: 80px" />
                        <button class="btn btn-sm btn-increase"
                            style="background-color: rgb(12, 164, 176); color: #fff;">+</button>
                    </div>
                </div>
                <h5 class="card p-3">Thông tin nhận thẻ</h5>
                <div class="p-3">
                    <p class="fw-semibold">Email nhận mã thẻ <span class="text-danger">*</span></p>
                    <input id="email-input" class="form-control" placeholder="Vui lòng nhập email nhận mã thẻ"
                        type="email" style="height: 60px" />
                    <div id="email-error" class="text-danger mt-2" style="display: none;">
                        Vui lòng nhập một địa chỉ email hợp lệ.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                {{-- <h2 class="fw-semibold">Thanh toán</h2>
                <h5 class="card fw-normal p-2">Hình thức thanh toàn</h5> --}}
                {{-- <div class="payment-method mb-3">
                    <div class="row p-2">
                        <div class="col-4">
                            <img alt="VNPay logo" src="/image/vnpay-qrcode-1.png" width="120" />
                        </div>
                        <div class="col-4">
                            <p class="fw-normal fs-6">Thanh toán quét mã VNPAYQR</p>
                        </div>
                        <div class="col-4">
                            <a class="text-decoration-none" href="#"> Thay đổi </a>
                        </div>
                    </div>
                </div> --}}
                <h5 class="card fw-normal p-2">Chi tiết giao dịch</h5>
                <p class="text-danger p-2">
                    Quý khách kiểm tra và cảnh giác không thanh toán hộ, hoặc cung cấp
                    thông tin cho người lạ trước khi thanh toán
                </p>
                <ul class="list-unstyled p-2">
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Loại mã thẻ:
                        <span class="float-end text-danger"> </span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Mệnh giá thẻ:
                        <span class="float-end text-danger"></span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Số lượng:
                        <span class="float-end text-danger"></span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Email nhận:
                        <span class="float-end text-danger"> </span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Phí giao dịch:
                        <span class="float-end text-danger"></span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Giảm giá:
                        <span class="float-end text-danger"></span>
                    </li>
                    <li class="fw-bold">
                        Tổng tiền:
                        <span class="float-end text-danger total" style="font-size: xx-large"></span>
                    </li>
                </ul>
                <button id="pay-button" class="btn btn-primary w-100"
                    style="background-image: linear-gradient(90deg,#01b49b,#277de4)!important;">Thanh Toán</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const providers = document.querySelectorAll('.provider');
            const provider2Container = document.getElementById('provider2-container');
            const infoList = document.querySelector(".list-unstyled");
            const defaultContent = provider2Container.innerHTML;

            const quantityInput = document.querySelector(".form-control");
            const decreaseButton = document.querySelector(".btn-decrease");
            const increaseButton = document.querySelector(".btn-increase");
            const emailInput = document.getElementById('email-input');
            quantityInput.disabled = true;
            decreaseButton.disabled = true;
            increaseButton.disabled = true;
            const data = {
                vina: [{
                        value: "10.000đ",
                        price: "9.750đ"
                    },
                    {
                        value: "20.000đ",
                        price: "19.500đ"
                    },
                    {
                        value: "30.000đ",
                        price: "29.250đ"
                    },
                    {
                        value: "50.000đ",
                        price: "48.750đ"
                    },
                    {
                        value: "100.000đ",
                        price: "97.500đ"
                    },
                    {
                        value: "200.000đ",
                        price: "195.000đ"
                    },
                    {
                        value: "300.000đ",
                        price: "292.500đ"
                    },
                    {
                        value: "500.000đ",
                        price: "487.500đ"
                    },
                ],
                viettel: [{
                        value: "10.000đ",
                        price: "9.850đ"
                    },
                    {
                        value: "20.000đ",
                        price: "19.800đ"
                    },
                    {
                        value: "50.000đ",
                        price: "49.250đ"
                    },
                    {
                        value: "100.000đ",
                        price: "98.500đ"
                    },
                    {
                        value: "200.000đ",
                        price: "197.000đ"
                    },
                    {
                        value: "300.000đ",
                        price: "295.500đ"
                    },
                    {
                        value: "500.000đ",
                        price: "492.500đ"
                    },
                ],
                mobile: [{
                        value: "10.000đ",
                        price: "9.850đ"
                    },
                    {
                        value: "20.000đ",
                        price: "19.700đ"
                    },
                    {
                        value: "30.000đ",
                        price: "29.550đ"
                    },
                    {
                        value: "50.000đ",
                        price: "49.250đ"
                    },
                    {
                        value: "100.000đ",
                        price: "98.500đ"
                    },
                    {
                        value: "200.000đ",
                        price: "197.000đ"
                    },
                    {
                        value: "300.000đ",
                        price: "295.500đ"
                    },
                    {
                        value: "500.000đ",
                        price: "492.500đ"
                    },
                ],
            };

            // Hàm cập nhật thông tin hiển thị
            const updateInfo = (providerName, cardValue, cardPrice, quantity = 1, email = "") => {
                const fee = 1980; // Phí giao dịch cố định
                const discount =
                    quantity *
                    (parseFloat(cardValue.replace(/[^\d]/g, "")) -
                        parseFloat(cardPrice.replace(/[^\d]/g, "")));
                const total =
                    quantity * parseFloat(cardPrice.replace(/[^\d]/g, "")) + fee * quantity;

                infoList.innerHTML = `
      <li class="border-bottom border-secondary pb-2 pt-2">
        Loại mã thẻ:
        <span class="float-end text-danger">${providerName}</span>
      </li>
      <li class="border-bottom border-secondary pb-2 pt-2">
        Mệnh giá thẻ:
        <span class="float-end text-danger">${cardValue}</span>
      </li>
      <li class="border-bottom border-secondary pb-2 pt-2">
        Số lượng:
        <span class="float-end text-danger">${quantity}</span>
      </li>
      <li class="border-bottom border-secondary pb-2 pt-2">
        Email nhận:
        <span class="float-end text-danger">${email} </span>
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

            emailInput.addEventListener('input', () => {
                const email = emailInput.value.trim();
                const activeProvider = document.querySelector(".provider.active");
                const activeCard = document.querySelector(".provider2.active");

                if (activeProvider && activeCard) {
                    const providerName = activeProvider.getAttribute("data-provider");
                    const cardValue = activeCard.getAttribute("data-value");
                    const cardPrice = activeCard.getAttribute("data-price");
                    const quantity = parseInt(quantityInput.value, 10) || 1;

                    updateInfo(providerName, cardValue, cardPrice, quantity, email);
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
                        const email = emailInput.value;
                        updateInfo(providerName, cardValue, cardPrice, parseInt(quantityInput
                            .value, 10), email);
                    });

                    // Mặc định active phần tử đầu tiên
                    if (index === 0) {
                        const cardValue = priceEl.getAttribute("data-value");
                        const cardPrice = priceEl.getAttribute("data-price");
                        const email = emailInput.value;
                        updateInfo(providerName, cardValue, cardPrice, parseInt(quantityInput.value,
                            10), email);
                    }
                });

                // Kích hoạt nút và ô nhập số lượng
                quantityInput.disabled = false;
                decreaseButton.disabled = false;
                increaseButton.disabled = false;
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
                        infoList.innerHTML = `
          <li class="border-bottom border-secondary pb-2 pt-2">
            Loại mã thẻ:
            <span class="float-end text-danger">${providerType}</span>
          </li>
        `;
                    }
                });
            });

            // Tăng giảm số lượng
            decreaseButton.addEventListener("click", () => {
                if (!quantityInput.disabled) {
                    let currentValue = parseInt(quantityInput.value, 10) || 1;
                    if (currentValue > 1) {
                        quantityInput.value = --currentValue;
                        const activeProvider = document.querySelector(".provider.active");
                        const activeCard = document.querySelector(".provider2.active");
                        const email = emailInput.value.trim();
                        if (activeProvider && activeCard) {
                            const providerName = activeProvider.getAttribute("data-provider");
                            const cardValue = activeCard.getAttribute("data-value");
                            const cardPrice = activeCard.getAttribute("data-price");
                            updateInfo(providerName, cardValue, cardPrice, currentValue, email);
                        }
                    }
                    // Vô hiệu hóa nếu đạt min
                    if (currentValue === 1) {
                        decreaseButton.disabled = true;
                    }
                    increaseButton.disabled = false;
                }
            });

            increaseButton.addEventListener("click", () => {
                if (!quantityInput.disabled) {
                    let currentValue = parseInt(quantityInput.value, 10) || 1;
                    if (currentValue < 10) {
                        quantityInput.value = ++currentValue;
                        const activeProvider = document.querySelector(".provider.active");
                        const activeCard = document.querySelector(".provider2.active");
                        const email = emailInput.value.trim();
                        if (activeProvider && activeCard) {
                            const providerName = activeProvider.getAttribute("data-provider");
                            const cardValue = activeCard.getAttribute("data-value");
                            const cardPrice = activeCard.getAttribute("data-price");
                            updateInfo(providerName, cardValue, cardPrice, currentValue, email);
                        }
                    }
                    // Vô hiệu hóa nếu đạt max
                    if (currentValue === 10) {
                        increaseButton.disabled = true;
                    }
                    decreaseButton.disabled = false;
                }
            });
        });

        document.getElementById('pay-button').addEventListener('click', function() {
            const emailInput = document.getElementById('email-input');
            const emailError = document.getElementById('email-error');
            const emailValue = emailInput.value.trim();

            const activeProvider = document.querySelector(".provider.active");
            const providerValue = activeProvider ? activeProvider.getAttribute("data-provider") : '';

            const activeCard = document.querySelector(".provider2.active");
            const cardValue = activeCard ? activeCard.getAttribute("data-value") : '';

            const quantityInput = document.querySelector(".form-control");
            let quantity = quantityInput ? parseInt(quantityInput.value, 10) || 1 : 1;

            const spanElement = document.querySelector('.total');
            const totalAmount = spanElement ? spanElement.textContent.trim() : '0';

            const cardName = document.querySelector('.float-end.text-danger');
            const nameCard = cardName ? cardName.textContent.trim() : '';

            // Kiểm tra email hợp lệ
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailValue)) {
                emailError.style.display = 'block';
                emailInput.classList.add('is-invalid');
                return;
            } else {
                emailError.style.display = 'none';
                emailInput.classList.remove('is-invalid');
            }

            // Tạo một form ẩn
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/payment-phone';

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
                email: emailValue,
                nameCard: nameCard,
                quantity: quantity,
                cardValue: cardValue.replace(/[^\d.-]/g, ''),
                totalAmount: totalAmount.replace(/[^\d.-]/g, '')
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
        .is-invalid {
            border: 1px solid red !important;
        }
    </style>
@endsection
