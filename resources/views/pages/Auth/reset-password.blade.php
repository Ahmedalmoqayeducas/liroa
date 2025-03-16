@extends('layouts.Dashboard')
@section('content')
<div class="card">
    <div class="card-body flex flex-col p-6">
        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">Simple Form Validation With Tootltips</div>
            </div>
        </header>
        <div class="card-text h-full">
            <form action="{{}}" method="POST" class="space-y-4" id="tooltipValidation" novalidate="novalidate">
                @csrf
                @method('PUT')
                <div class="input-area">
                    <label for="tooltip_name" class="form-label">Current Password</label>
                    <input id="tooltip_name" name="current_password" type="password" class="form-control"
                        placeholder="Current Password">
                </div>
                <div class="input-area">
                    <label for="tooltip_email" class="form-label">New Password</label>
                    <input id="tooltip_email" name="new_password" type="password" class="form-control"
                        placeholder="New Passowrd" required="required">
                </div>
                <div class="input-area">
                    <label for="tooltip_email" class="form-label">New Password Confirmation</label>
                    <input id="tooltip_email" name="new_password_confirmation" type="password" class="form-control"
                        placeholder="New Passowrd Confirmation" required="required">
                </div>
                <button class="btn flex justify-center btn-dark ml-auto">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
