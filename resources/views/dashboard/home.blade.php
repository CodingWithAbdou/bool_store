@extends('dashboard.layouts.app')
@section('header-name')
    الصفحة الرئيسية
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-3">
            <div class="layers bd bgc-white p-20">
                <div class="layer w-100 mB-10">
                    <h6 class="lh-1 cairo">عدد الكتب</h6>
                </div>
                <div class="layer w-100">
                    <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed">
                        <span id="sparklinedash"></span>
                    </div>
                    <div class="peer">
                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500 ltr cairo">{{ $books }}</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="layers bd bgc-white p-20">
                <div class="layer w-100 mB-10">
                    <h6 class="lh-1 cairo">عدد المؤلفين</h6>
                </div>
                <div class="layer w-100">
                    <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed">
                        <span id="sparklinedash2"></span>
                    </div>
                    <div class="peer">
                        <span class=" d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500 ltr cairo">{{ $authors }}</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="layers bd bgc-white p-20">
                <div class="layer w-100 mB-10">
                    <h6 class="lh-1 cairo">عدد التصنيفات</h6>
                </div>
                <div class="layer w-100">
                    <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed">
                        <span id="sparklinedas3"></span>
                    </div>
                    <div class="peer">
                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500 ltr cairo">{{ $categories }}</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="layers bd bgc-white p-20">
                <div class="layer w-100 mB-10">
                    <h6 class="lh-1 cairo">عدد الكتب</h6>
                </div>
                <div class="layer w-100">
                    <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed">
                        <span id="sparklinedash4"></span>
                    </div>
                    <div class="peer">
                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500 ltr cairo">{{ $books }}</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
