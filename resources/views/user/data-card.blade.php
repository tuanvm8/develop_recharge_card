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
                <h5 class="card p-3">Chọn thẻ data</h5>
                <div class="d-flex flex-wrap p-2" id="provider2-container">
                    <div class="w-100 text-center p-3">
                        <p style="font-size: 1.2em; color: #ff0000">
                            Hãy chọn nhà cung cấp
                        </p>
                    </div>
                </div>
                <h5 class="card p-3">Chọn số lượng thẻ</h5>
                <div class="input-group p-3 justify-content-between">
                    <p class="fw-semibold">Số lượng</p>
                    <div class="d-flex">
                        <button class="btn btn-sm me-1 btn-decrease"
                            style="background-color: rgb(12, 164, 176); color: #fff">
                            -
                        </button>
                        <input type="number" class="form-control text-center me-1 quantity-input" value="1"
                            min="0" style="max-width: 80px" />
                        <button class="btn btn-sm btn-increase" style="background-color: rgb(12, 164, 176); color: #fff">
                            +
                        </button>
                    </div>
                </div>
                <h5 class="card p-3">Thông tin nhận thẻ</h5>
                <div class="p-3">
                    <p class="fw-semibold">Email nhận mã thẻ <span class="text-danger">*</span></p>
                    <input id="email-input" class="form-control" placeholder="Vui lòng nhập email nhận mã thẻ"
                        type="email" style="height: 60px" />
                        <p id="email-error" style="color: red; display: none;"></p>
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
                        Loại mã thẻ:
                        <span class="float-end text-danger"> </span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Mệnh giá thẻ:
                        <span class="float-end text-danger"></span>
                    </li>
                    <li class="border-bottom border-secondary pb-2 pt-2">
                        Data:
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
                style="background-image: linear-gradient(90deg,#01b49b,#277de4) !important;">
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

            const quantityInput = document.querySelector(".form-control");
            const decreaseButton = document.querySelector(".btn-decrease");
            const increaseButton = document.querySelector(".btn-increase");
            const emailInput = document.getElementById("email-input");
            quantityInput.disabled = true;
            decreaseButton.disabled = true;
            increaseButton.disabled = true;
            const data = {
                vina: [{
                        value: "500 MB",
                        nsd: "30 ngày",
                        listedPrice: "10.000đ",
                        sellingPrice: "9.000đ",
                    },
                    {
                        value: "1 GB",
                        nsd: "30 ngày",
                        listedPrice: "20.000đ",
                        sellingPrice: "18.000đ",
                    },
                    {
                        value: "3 GB",
                        nsd: "30 ngày",
                        listedPrice: "50.000đ",
                        sellingPrice: "45.000đ",
                    },
                    {
                        value: "5 GB",
                        nsd: "30 ngày",
                        listedPrice: "70.000đ",
                        sellingPrice: "66.500đ",
                    },
                    {
                        value: "8 GB",
                        nsd: "30 ngày",
                        listedPrice: "100.000đ",
                        sellingPrice: "95.000đ",
                    },
                    {
                        value: "12 GB",
                        nsd: "30 ngày",
                        listedPrice: "120.000đ",
                        sellingPrice: "120.000đ",
                    },
                    {
                        value: "15 GB",
                        nsd: "30 ngày",
                        listedPrice: "150.000đ",
                        sellingPrice: "150.000đ",
                    },
                ],
                viettel: [{
                        value: "1 GB",
                        nsd: "1 ngày",
                        listedPrice: "9.000đ",
                        sellingPrice: "8.505đ",
                    },
                    {
                        value: "3 GB",
                        nsd: "6 giờ",
                        listedPrice: "11.000đ",
                        sellingPrice: "10.395đ",
                    },
                    {
                        value: "2 GB",
                        nsd: "1 ngày",
                        listedPrice: "12.000đ",
                        sellingPrice: "11.340đ",
                    },
                    {
                        value: "2 GB",
                        nsd: "1 ngày",
                        listedPrice: "13.000đ",
                        sellingPrice: "12.285đ",
                    },
                    {
                        value: "4 GB",
                        nsd: "3 ngày",
                        listedPrice: "20.000đ",
                        sellingPrice: "18.900đ",
                    },
                    {
                        value: "4 GB",
                        nsd: "3 ngày",
                        listedPrice: "22.000đ",
                        sellingPrice: "20.790đ",
                    },
                    {
                        value: "8 GB",
                        nsd: "7 ngày",
                        listedPrice: "36.000đ",
                        sellingPrice: "34.020đ",
                    },
                    {
                        value: "8 GB",
                        nsd: "7 ngày",
                        listedPrice: "38.000đ",
                        sellingPrice: "35.910đ",
                    },
                    {
                        value: "1 GB/Ngày",
                        nsd: "30 ngày",
                        listedPrice: "110.000đ",
                        sellingPrice: "103.950đ",
                    },
                    {
                        value: "1 GB/Ngày",
                        nsd: "30 ngày",
                        listedPrice: "115.000đ",
                        sellingPrice: "108.675đ",
                    },
                    {
                        value: "2 GB/Ngày",
                        nsd: "30 ngày",
                        listedPrice: "145.000đ",
                        sellingPrice: "137.025đ",
                    },
                    {
                        value: "2 GB/Ngày",
                        nsd: "30 ngày",
                        listedPrice: "150.000đ",
                        sellingPrice: "141.750đ",
                    },
                    {
                        value: "3 GB/Ngày",
                        nsd: "30 ngày",
                        listedPrice: "165.000đ",
                        sellingPrice: "155.925đ",
                    },
                    {
                        value: "3 GB/Ngày",
                        nsd: "30 ngày",
                        listedPrice: "170.000đ",
                        sellingPrice: "160.650đ",
                    },
                ],
                mobile: [{
                        value: "15000 MB",
                        nsd: "3 ngày",
                        listedPrice: "15.000đ",
                        sellingPrice: "14.700đ",
                    },
                    {
                        value: "24000 MB",
                        nsd: "1 ngày",
                        listedPrice: "20.000đ",
                        sellingPrice: "19.600đ",
                    },
                    {
                        value: "1500 MB",
                        nsd: "10 ngày",
                        listedPrice: "20.000đ",
                        sellingPrice: "19.600đ",
                    },
                    {
                        value: "30000 MB",
                        nsd: "7 ngày",
                        listedPrice: "30.000đ",
                        sellingPrice: "29.400đ",
                    },
                ],
            };

            // Hàm cập nhật thông tin hiển thị
            const updateInfo = (
                providerName,
                cardValue,
                listedPrice,
                sellingPrice,
                nsd,
                quantity = 1,
                email = ""
            ) => {
                const fee = 1980; // Phí giao dịch cố định
                const discount =
                    (parseFloat(listedPrice.replace(/[^\d]/g, "")) -
                        parseFloat(sellingPrice.replace(/[^\d]/g, ""))) *
                    quantity;
                const total =
                    quantity * parseFloat(sellingPrice.replace(/[^\d]/g, "")) +
                    fee * quantity;

                infoList.innerHTML = `
    <li class="border-bottom border-secondary pb-2 pt-2">
      Loại mã thẻ:
      <span class="float-end text-danger">${providerName}</span>
    </li>
    <li class="border-bottom border-secondary pb-2 pt-2">
      Mệnh giá thẻ:
      <span class="float-end text-danger">${listedPrice}</span>
    </li>
    <li class="border-bottom border-secondary pb-2 pt-2">
      Data:
      <span class="float-end text-danger">${cardValue}</span>
    </li>
    <li class="border-bottom border-secondary pb-2 pt-2">
      Số lượng:
      <span class="float-end text-danger">${quantity}</span>
    </li>
    <li class="border-bottom border-secondary pb-2 pt-2">
      Email nhận:
      <span class="float-end text-danger"> ${email}</span>
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

            // Hàm render danh sách giá trị
            const renderPrices = (selectedData, providerName) => {
                provider2Container.innerHTML = selectedData
                    .map(
                        (item, index) => `
      <div style="height: 100% !important" class="provider2 me-3 mb-3" ${index === 0 ? "active" : ""}" 
           data-value="${item.value}" data-nsd="${item.nsd}" 
           data-listed-price="${item.listedPrice}" data-selling-price="${
                item.sellingPrice
              }">
        <p>${item.value}</p>
        <div>
          <samp>NSD: ${item.nsd}</samp><br>
          <small> 
            <del class="me-3">${item.listedPrice}</del> 
            <a style="color: #002bff">${item.sellingPrice}</a> 
          </small>
        </div>
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
                        const nsd = priceEl.getAttribute("data-nsd");
                        const listedPrice = priceEl.getAttribute("data-listed-price");
                        const sellingPrice = priceEl.getAttribute("data-selling-price");
                        const email = emailInput.value;
                        updateInfo(
                            providerName,
                            cardValue,
                            listedPrice,
                            sellingPrice,
                            nsd,
                            parseInt(quantityInput.value, 10),
                            email
                        );
                    });

                    // Mặc định active phần tử đầu tiên
                    if (index === 0) {
                        const cardValue = priceEl.getAttribute("data-value");
                        const nsd = priceEl.getAttribute("data-nsd");
                        const listedPrice = priceEl.getAttribute("data-listed-price");
                        const sellingPrice = priceEl.getAttribute("data-selling-price");
                        const email = emailInput.value;
                        updateInfo(
                            providerName,
                            cardValue,
                            listedPrice,
                            sellingPrice,
                            nsd,
                            parseInt(quantityInput.value, 10),
                            email
                        );
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

            emailInput.addEventListener("input", () => {
                const email = emailInput.value.trim();
                const activeProvider = document.querySelector(".provider.active");
                const activeCard = document.querySelector(".provider2.active");
                if (activeProvider && activeCard) {
                    const providerName = activeProvider.getAttribute("data-provider");
                    const cardValue = activeCard.getAttribute("data-value");
                    const listedPrice = activeCard.getAttribute("data-listed-price");
                    const sellingPrice = activeCard.getAttribute("data-selling-price");
                    const nsd = activeCard.getAttribute("data-nsd");
                    const quantity = parseInt(quantityInput.value, 10) || 1;
                    updateInfo(
                        providerName,
                        cardValue,
                        listedPrice,
                        sellingPrice,
                        nsd,
                        quantity,
                        email
                    );
                }
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
                            const providerName =
                                activeProvider.getAttribute("data-provider");
                            const cardValue = activeCard.getAttribute("data-value");
                            const listedPrice =
                                activeCard.getAttribute("data-listed-price");
                            const sellingPrice =
                                activeCard.getAttribute("data-selling-price");
                            updateInfo(
                                providerName,
                                cardValue,
                                listedPrice,
                                sellingPrice,
                                activeCard.getAttribute("data-nsd"),
                                currentValue,
                                email
                            );
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
                            const providerName =
                                activeProvider.getAttribute("data-provider");
                            const cardValue = activeCard.getAttribute("data-value");
                            const listedPrice =
                                activeCard.getAttribute("data-listed-price");
                            const sellingPrice =
                                activeCard.getAttribute("data-selling-price");
                            updateInfo(
                                providerName,
                                cardValue,
                                listedPrice,
                                sellingPrice,
                                activeCard.getAttribute("data-nsd"),
                                currentValue,
                                email
                            );
                        }
                    }
                    // Vô hiệu hóa nếu đạt max
                    if (currentValue === 10) {
                        increaseButton.disabled = true;
                    }
                    decreaseButton.disabled = false;
                }
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
            const emailInput = document.getElementById('email-input');
            const emailError = document.getElementById('email-error');
            const emailValue = emailInput.value.trim();

            const providerValue = activeProvider.getAttribute("data-provider");

            const activeCard = document.querySelector(".provider2.active");
            const cardValue = activeCard ? activeCard.getAttribute("data-listed-price") : '';

            const quantityInput = document.querySelector(".form-control");
            let quantity = quantityInput ? parseInt(quantityInput.value, 10) || 1 : 1;

            const spanElement = document.querySelector('.total');
            const totalAmount = spanElement ? spanElement.textContent.trim() : '0';

            const cardName = document.querySelector('.float-end.text-danger');
            const nameCard = cardName ? cardName.textContent.trim() : '';
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailValue) {
                emailError.textContent = "Bạn chưa nhập email!";
                emailError.style.display = "block";
                emailInput.classList.add('is-invalid');
                return;
            }

            if (!emailRegex.test(emailValue)) {
                emailError.textContent = "Email không hợp lệ!";
                emailError.style.display = "block";
                emailInput.classList.add('is-invalid');
                return;
            } 

            emailError.style.display = "none"; // Ẩn lỗi nếu nhập đúng
            emailInput.classList.remove('is-invalid');

            // Tạo một form ẩn
            const form = document.createElement('form');
            form.method = 'GET';
            form.action = '/payment-data';

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
        .is-invalid {
            border: 1px solid red !important;
        }
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
