@extends('layouts.auth')
@section('form')
<div class="text-center mb-10">
    <h4 class="font-medium mb-4">{{__('auth.verification')}}</h4>
    <div class="text-slate-500 dark:text-slate-400 text-base">
        {{__('auth.verification_title')}}
    </div>
</div>
<div class="author-bio text-center mb-8">
    <div class="h-14 w-14 mx-auto rounded-full">
        <img src="{{Storage::url("$user->image") }}" alt="" class="w-full h-full object-cover block" width="56px"
            height="56px">
    </div>
    <div class="text-slate-900 dark:text-white text-base font-medium mt-4">
        {{ $user->name }}
    </div>
</div>
<!-- BEGIN: Lock Form -->
<form class="space-y-4">
    @csrf
    <button type="button" onclick="sendEmail()" class="btn btn-dark block w-full text-center">{{__('auth.unlock_button')}}</button>
</form>
<!-- END: Lock Form -->
{{-- @dd(session('guard')) --}}
<div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
    <div
        class="absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                px-4 min-w-max text-sm text-slate-500 font-normal">

    </div>
</div>
<div class="max-w-[242px] mx-auto mt-8 w-full">

    <!-- BEGIN: Social Log in Area -->

    <!-- END: Social Log In Area -->
</div>
<div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
    {{__('auth.verify_later')}}
    <a href="{{ route('auth.logout', ['guard' => 'admin']) }}"
        class="text-slate-900 dark:text-white font-medium hover:underline">
        {{__('dashboard.logout')}}
    </a>
</div>


@endsection
@section('script')
<script>
    function sendEmail() {
        axios.get('{{ route('verification.send') }}', {})
            .then(function(response) {
                toastr.success(response.data.message);
            })
            .catch(function(error) {
                toastr.error(error.response.data.message);
            });
    }
</script>
@endsection
