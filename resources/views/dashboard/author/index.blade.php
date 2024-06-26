@extends('dashboard.layouts.app')

@section('header-name')
    عرض المؤلفون
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="row">
            <div class="col-md-2 ms-auto my-4">
                <a href="{{ route('authors.create') }}" class="btn cur-p btn-success btn-color">
                    <span class="me-2"><i class="fa-solid fa-plus "></i></span>
                    <span>إضافة مؤلف</span>
                </a>
            </div>
        </div>
        <hr />
        <table class="table table-striped" id="book-table" width="100%">
          <thead>
            <tr>
              <th scope="col"> الإسم  </th>
              <th scope="col"> الوصف  </th>
              <th scope="col"> العميليات  </th>
            </tr>
          </thead>
          <tbody>
            @foreach($authors as $author)
                <tr>
                    <td> {{  $author->name  }}</td>
                    <td> {{  $author->description  }}</td>
                    <td>
                        <form action="{{ route('authors.destroy' , $author)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('authors.show' , $author) }}"class="btn cur-p btn-secondary btn-color">
                                <span class=""><i class="fa-regular fa-eye"></i></span>
                            </a>
                            <a href="{{ route('authors.edit' , $author) }}" class="btn cur-p btn-info btn-color">
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
