@extends('layouts.org')
@section('content')
    @include('components.org.branch-slide', [
        'pageName' => 'Payment Gateway',
        'title' => 'Secure Payment Options',
    ])

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 50px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-header {
            background-color: #0d6efd;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 10px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .payment-method-logo {
            height: 30px;
            margin-right: 10px;
        }

        .payment-input {
            display: flex;
            align-items: center;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            background-color: white;
        }

        .payment-input img {
            height: 20px;
            margin-right: 10px;
        }

        .payment-input input {
            border: none;
            width: 100%;
            outline: none;
            font-size: 16px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-danger ">
                        <h3 class="text-white">donate this project</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('processTransaction') }}" method="POST" id="payment-form">
                            @csrf
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount (USD):</label>
                                <input type="number" name="amount" id="amount" class="form-control"
                                    placeholder="Enter amount" required>
                            </div>
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Payment Method:</label>
                                <select name="payment_method" id="payment_method" class="form-control" required>
                                    <option value="paypal">PayPal</option>
                                </select>
                            </div>
                            <div class="mb-3 payment-input row">

                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="Card"
                                    class="col-md-2">
                                <input type="text" id="card_number" name="card_number" placeholder="Card number"
                                    class="col-md-4" required maxlength="19">
                                <input type="text" id="expiry" name="expiry" placeholder="MM / YY" class="col-md-2"
                                    required maxlength="5">
                                <input type="text" name="cvc" placeholder="CVC" class="col-md-2" required
                                    maxlength="3">

                            </div>
                            <div class="mb-3 text-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg"
                                    alt="Visa" class="payment-method-logo">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg"
                                    alt="Mastercard" class="payment-method-logo">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal"
                                    class="payment-method-logo">
                            </div>
                            <button type="submit" class="btn btn-danger w-100 ">Donate</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('card_number').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // حذف أي شيء غير الأرقام
            value = value.replace(/(\d{4})/g, '$1 ').trim(); // إضافة مسافة بعد كل 4 أرقام
            e.target.value = value;
        });

        document.getElementById('expiry').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // السماح فقط بالأرقام
            if (value.length > 2) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4);
            }
            e.target.value = value;
        });

        $(document).ready(function() {
            $('#payment-form').submit(function(event) {
                event.preventDefault();
                let amount = $('#amount').val();
                if (!amount || amount <= 0) {
                    alert('Please enter a valid amount.');
                    return;
                }
                this.submit();
            });
        });
    </script>
@endsection
