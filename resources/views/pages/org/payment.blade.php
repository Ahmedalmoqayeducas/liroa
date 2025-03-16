{{-- @extends('layouts.org')
@section('content')
    @include('components.org.branch-slide', [
        'pageName' => 'Payment Gateway',
        'title' => 'Secure Payment Options',
    ])

<div class="container">
    <h2 class="text-center">Payment</h2>

    <!-- Stripe Payment Form -->
    <h3>Pay with Stripe</h3>
    <form action="{{ route('pay.stripe') }}" method="POST">
        @csrf
        <input type="text" name="card_number" placeholder="Card Number" required>
        <input type="text" name="exp_month" placeholder="Expiry Month (MM)" required>
        <input type="text" name="exp_year" placeholder="Expiry Year (YYYY)" required>
        <input type="text" name="cvc" placeholder="CVC" required>
        <input type="number" name="amount" placeholder="Amount" required>
        <button type="submit">Pay with Stripe</button>
    </form>

    <!-- PayPal Payment Button -->
    <h3>Pay with PayPal</h3>
    <form action="{{ route('pay.paypal') }}" method="POST">
        @csrf
        <input type="number" name="amount" placeholder="Amount" required>
        <button type="submit">Pay with PayPal</button>
    </form>
</div>
@endsection --}}

{{-- @extends('layouts.org')
@section('content')
    @include('components.org.branch-slide', [
        'pageName' => 'Payment Gateway',
        'title' => 'Secure Payment Options',
    ])

<div class="container">
    <h2 class="text-center">Payment</h2>
    <h3>Pay with PayPal</h3>
    <form action="{{ route('processTransaction') }}" method="POST">
        @csrf
        <input type="number" name="amount" placeholder="Amount" required>
        <button type="submit">Pay with PayPal</button>
    </form>
</div>
@endsection --}}
