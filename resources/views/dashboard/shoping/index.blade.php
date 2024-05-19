@extends('dashboard.layouts.app')

@section('header-name')
    جميع المشتريات
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">

                <hr />
                <table class="table table-striped" id="book-table" width="100%">
                    <thead>
                        <tr>
                            <th scope="col"> المشتري </th>
                            <th scope="col"> الكتاب </th>
                            <th scope="col"> السعر </th>
                            <th scope="col">عدد النسخ</th>
                            <th scope="col">السعر الإجمالي</th>
                            <th scope="col">تاريخ الشراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td> {{ $product->user->name }}</td>
                                <td> {{ $product->book->title }}</td>
                                <td> {{ $product->price }}</td>
                                <td> {{ $product->number_of_copies }}</td>
                                <td> {{ $product->number_of_copies * $product->price }}$</td>
                                <td> {{ $product->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
