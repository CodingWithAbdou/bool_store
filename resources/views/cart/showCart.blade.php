@extends('layouts.main')

@push('style')
<style>

</style>
@endpush



@section('content')

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4  2xl:px-0 ">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl" >عربة التسوق </h2>
      <div class="hidden" id="success">
          <div  class="  mt-8 flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">تم عملية الشراء بنجاح</span>
            </div>
        </div>
      </div>
      <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8 cart-shoping ">
        <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
          <div class="space-y-6">
            @php
            $total_price = 0;
            @endphp
            @if($items->count() > 0)
            @foreach($items as $item)
            <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                <a href="{{ route('book.justshow',  $item) }}" class="shrink-0 md:order-1">
                <img class="h-20 w-20 dark:hidden rounded-lg" src="{{asset('storage/' . $item->cover_image)}}" alt="" />
                </a>

                <label for="counter-input" class="sr-only">Choose quantity:</label>
                <div class="flex items-center justify-between md:order-3 md:justify-end">
                <div class="flex items-center" data-book='{{$item->id}}'>
                    <button type="button" id="" data-input-counter-decrement="counter-input" class="decrement-button inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                    </svg>
                    </button>
                    <input  type="text" id="" data-input-counter class="counter-input w-16 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder="" value="{{$item->pivot->number_of_copies}}" required />
                    <button type="button" id="" data-input-counter-increment="counter-input" class=" increment-button inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                    </button>
                </div>
                <div class="text-end md:order-4 md:w-32">
                    <p class="text-base font-bold text-gray-900 dark:text-white"> {{$item->price * $item->pivot->number_of_copies}} $ </p>
                </div>
                </div>
                @php
                    $total_price +=    $item->price * $item->pivot->number_of_copies
                @endphp
                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                <a href="{{ route('book.justshow',  $item) }}" class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $item->title}}</a>

                <div class="flex items-center gap-4">
                    <form action="{{ route('remove.item') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <div class="text-start md:order-4 md:w-32 mb-2">
                            <p class="text-xs text-neutral-600900 dark:text-white">سعر الكتاب : <span class="text-xs underline">   {{$item->price}} $ </span></p>
                        </div>
                        <button  type="submit" class="inline-flex items-center text-sm font-medium text-red-600  dark:text-red-500">
                            حذف
                        <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        </button>

                    </form>
                </div>
                </div>
            </div>
            </div>
        @endforeach


          </div>
        </div>

        <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
          <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
            <p class="text-xl font-semibold text-gray-900 dark:text-white mb-8">الفاتورة</p>

            <div class="space-y-4">
              <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500 dark:text-gray-400">السعر الأصلي</dt>
                  <dd class="text-base font-medium text-gray-900 dark:text-white">$ {{$total_price}}</dd>
                </dl>
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500 dark:text-gray-400">سعر التوصيل</dt>
                  <dd class="text-base font-medium text-gray-900 dark:text-white">$ 0</dd>
                </dl>

              <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-bold text-gray-900 dark:text-white">المجموع</dt>
                <dd class="text-base font-bold text-gray-900 dark:text-white">$ {{$total_price}}</dd>
              </dl>

              <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                  <dt class="text-base font-bold text-gray-900 dark:text-white self-start">الدفع</dt>
                  <dd class="text-base font-bold text-gray-900 dark:text-white"><div id="paypal-button-container"></div></dd>
              </dl>

            {{-- <dl class="flex items-center justify-between gap-4  dark:border-gray-700">
                <dt class="text-base font-bold text-gray-900 dark:text-white self-start"></dt>
                <dd class="text-base font-bold text-gray-900 dark:text-white w-9/12 ">
                    <a  href="{{ route('credit.checkout')}}" style="background:#ffc439" class="w-full  text-sm text-white transition-colors hover:text-neutral-700 flex items-center justify-center gap-2 rounded-sm p-2" >
                    <span>
                        البطاقة الائتمانية
                    </span>
                    <span><i class='bx bx-credit-card-alt '></i></span>
                    </a>
                </dd>
            </dl> --}}
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
          <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
          <span class="sr-only">Info</span>
          <div>
            <span class="font-medium">لاتوجد كتب لعرضها </span>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection

@push('script')

<script src="https://www.paypal.com/sdk/js?client-id=Aee01_oRdFCl_q2hTKPwtaRHvmJI8uS-g0KoF6KNjKQy0tgKzNDYtjKCEfVOFR3Gnz-Fpu5EGkNe6YiH&currency=USD&disable-funding=card"></script>

<script>
  paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
        return fetch('/api/paypal/create-payment', {
            method: 'POST',
            body:JSON.stringify({
                'userId' : "{{auth()->user()->id}}",
            })
        }).then(function(res) {
            return res.json();
        }).then(function(orderData) {
            return orderData.id;
        });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
        return fetch('/api/paypal/execute-payment' , {
            method: 'POST',
            body :JSON.stringify({
                orderId : data.orderID,
                userId: "{{ auth()->user()->id }}",
            })
        }).then(function(res) {
            return res.json();
        }).then(function(orderData) {
            $('#success').slideDown(200);
            $('.cart-shoping').slideUp(0);
            $('.badge').html(0)

        });
    }
  }).render('#paypal-button-container');
</script>

<script>
      $('.increment-button').click(function() {
          let inputQuantity = $(this).siblings('.counter-input').val()
          $(this).siblings('.counter-input').val(++inputQuantity)
          freshQuantity( $(this).parent().attr('data-book') , inputQuantity)
    })
    $('.decrement-button').click(function() {
        let inputQuantity = $(this).siblings('.counter-input').val()
        if(inputQuantity > 1) {
            $(this).siblings('.counter-input').val(--inputQuantity)
            freshQuantity( $(this).parent().attr('data-book') , inputQuantity)
        }else {
            toastr.error('الحقل لايقبل قيمة سالبة')
        }
    })

    $('.counter-input').keyup(function() {
        if (/\D/g.test(this.value)) {
            this.value = this.value.replace(/\D/g,'')
        }
        if(this.value == 0) {
            this.value = 1
        }

    })
    $('.counter-input').blur(function() {

        freshQuantity( $(this).parent().attr('data-book') , this.value )

    })

    function freshQuantity(bookid , inputQuantity) {
            $.ajax({
                type: 'post',
                url: "{{ route('add.cart') }}",
                data: {
                    "_token": "{{session()->token() }}",
                    'bookid' : bookid ,
                    'inputQuantity' : inputQuantity,
                    'isnew' : true
                },
                success: function(data) {
                    location.reload();
                    toastr.success('تمت التعديل بنجاح')
                },
                error: function() {
                    toastr.error('حدث خطأ ما')
                }
            });
    }
</script>

@endpush
