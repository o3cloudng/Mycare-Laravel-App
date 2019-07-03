@extends('layouts.dashboard')

@section('title')
    404 Error
@endsection
@section('header')
    
@endsection
@section('week')
@endsection

@section('content')
               <section>
                <div class="container">
                  <div class="row mt-5  justify-content-center">
                      <img src="{{ asset('/img/svg/error_page.svg') }}" />                    
                  </div>
                  <div class="row mx-auto">
                    <h3 class="align-items-center text-center" style="margin-left: 45% !important;">Oops!</h3>
                  </div>
                  <div class="row justify-content-center mx-auto">                    
                    <p>You are not Currently Subscribed to this Service, Click the Button below to subscribe now</p>
                  </div>
                  <div class="row mx-auto"> 
                    <a href="/subscription" class="btn btn2 button shadow mr-2 activeBPLink mx-auto">Subscriber Now</a>
                  </div>
                  <div class="row justify-content-center"> 
                    <a href="javascript:history.back()" class="mt-1"><img style="width: 15px; height: 10px;" src="{{ asset('/img/back.png') }}" /> Back</a>
                  </div>

                </div>

                    
               </section>
@endsection
@section('scripts')


@endsection
<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->


