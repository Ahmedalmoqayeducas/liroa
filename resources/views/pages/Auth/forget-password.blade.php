@extends('layouts.auth')
@section('form')
    <div class="text-center 2xl:mb-10 mb-5">
        <h4 class="font-medium mb-4">{{__('auth.forget')}}</h4>
        <div class="text-slate-500 dark:text-slate-400 text-base">
            {{__('auth.reset')}}
        </div>
    </div>
    <div
        class="font-normal text-base text-slate-500 dark:text-slate-400 text-center px-2 bg-slate-100 dark:bg-slate-600 rounded
                                py-3 mb-4 mt-10">{{__('auth.enter_email')}}

    </div>
    <!-- BEGIN: Forgot Password Form -->
    <form class="space-y-4" action='{{ route('password.change') }}' method="POST">
        @csrf
        <div class="fromGroup">
            <label class="block capitalize form-label">{{__('dashboard.email')}}</label>
            <div class="relative ">
                <input id="email" type="email" name="email" class="  form-control py-2"
                    placeholder="Enter your Email">
            </div>
        </div>
        <button type="button" onclick="sendResetEmail()" class="btn btn-dark block w-full text-center">{{__('auth.send_recovry')}}</button>
    </form>
    <!-- END: Forgot Password Form -->

    <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-8 uppercase text-sm">
        {{__('auth.back')}}
        <a href="{{ route('auth.show-login', ['guard' => session('guard')]) }}"
            class="text-slate-900 dark:text-white font-medium hover:underline">
            {{__('auth.login')}}
        </a>

    </div>
@endsection
@section('script')
    <script>
        function sendResetEmail() {
            axios.post(`forget`, {
                email: document.getElementById('email').value,
            }).then(function(response) {
                toastr.success(response.data.message);
            }).catch(function(error) {
                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection
