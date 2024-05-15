@extends('dashboard.layouts.app')

@section('header-name')
    عرض الكتب
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="row">
            <div class="col-md-2 ms-auto my-4">
                <a href="{{ route('book.create') }}" class="btn cur-p btn-success btn-color">
                    <span class="me-2"><i class="fa-solid fa-plus "></i></span>
                    <span>إضافة كتاب</span>
                </a>
            </div>
        </div>
        <hr />
        <table class="table table-striped" id="book-table" width="100%">
          <thead>
            <tr>
              <th scope="col"> صورة  </th>
              <th scope="col"> العنوان  </th>
              <th scope="col">التصنيف </th>
              <th scope="col">دار النشر</th>
              <th scope="col">المؤلفون</th>
              <th scope="col">عدد النسخ المتوفرة</th>
              <th scope="col"> السعر</th>
              <th scope="col">خيارات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
                <tr>
                    <td> <img class="rounded" src="{{  asset('storage/' . $book->cover_image)  }}" alt="" width="60"></td>
                    <td> {{  $book->title  }}</td>

                    <td>{{  $book->Category != null  ? $book->Category->name : ''   }}</td>
                    <td>{{   $book->publisher != null  ? $book->publisher->name : ''  }}</td>
                    <td>
                        @if($book->authors()->count() > 0)
                            @foreach($book->authors as $author)
                                {{ $loop->first ? '' : 'و' }}
                                {{ $author->name }}
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $book->number_of_copies }}</td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <form action="{{ route('book.destroy' , $book)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('book.show' , $book) }}"class="btn cur-p btn-secondary btn-color">
                                <span class=""><i class="fa-regular fa-eye"></i></span>
                            </a>
                            <a href="{{ route('book.edit' , $book) }}" class="btn cur-p btn-info btn-color">
                                <span class=""><i class="fa-solid fa-pencil "></i></span>
                            </a>
                            <button class="btn cur-p btn-danger btn-color" onclick="confirm('هل أنت متاكد ')">
                                <span class=""><i class="fa-solid fa-trash "></i></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
