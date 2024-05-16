@extends('dashboard.layouts.app')

@section('header-name')
    عرض المستخدمين
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <hr />
        <table class="table table-striped" id="book-table" width="100%">
          <thead>
            <tr>
              <th scope="col"> الصورة  </th>
              <th scope="col"> الإسم  </th>
              <th scope="col"> الإيميل  </th>
              <th scope="col"> العميليات  </th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
                <tr>
                    <td> <img src="{{asset( $user->profile_photo_path )}}" alt="" width="40"> </td>
                    <td> {{  $user->name  }}</td>
                    <td> {{  $user->email  }}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('users.update' , $user)}}" method="POST" class="d-flex items-center justify-center gap-2">
                            @csrf
                            <div class="input-group" style="width: fit-content">
                                <select class="form-control"  name='value'>
                                        <option  value="0" {{$user->administration_level == 0 ? 'selected' : ''}}>عادي</option>
                                        <option  value="1" {{$user->administration_level == 1 ? 'selected' : ''}}> أدمين </option>
                                        <option  value="2" {{$user->administration_level == 2 ? 'selected' : ''}}> أدمين عام</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn cur-p btn-secondary btn-color" >
                                    <span class=""><i class="fa-solid fa-pencil "></i></span>
                                </button>
                            </div>
                        </form>
                        <form action="{{ route('users.destroy' , $user)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if(Auth::user()->id == $user->id)
                            <div class="btn cur-p btn-danger btn-color" style="cursor: auto;">
                                <span class=""><i class="fa-solid fa-trash "></i></span>
                            </div>
                            @else
                            <button class="btn cur-p btn-danger btn-color" onclick="confirm('هل أنت متاكد ')">
                                <span class=""><i class="fa-solid fa-trash "></i></span>
                            </button>
                            @endif
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
