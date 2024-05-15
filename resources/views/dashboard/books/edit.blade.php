@extends('dashboard.layouts.app')

@push('style')
<style>
    .invalid-feedback-img {
        display: block !important
    }
</style>
@endpush


@section('content')
    <div class="container mx-auto">
        <div class="w-[70%] mx-auto p-2 bg-white border rounded-md">
            <div class="relative overflow-x-auto">
                <form action="{{route('book.update' , $book)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="w-full text-sm  text-gray-500 dark:text-gray-400 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th colspan='2' class="px-6 py-3 rounded-lg">
                                    <h2 class="text-xl">تعديل الكتاب</h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800 border-b">
                                <td class="px-6 py-4 w-3/12 text-blod ">
                                    إسم الكتاب
                                </td>
                                <td class="px-6 py-4">
                                    <input name="title" type="text" class="form-control  @error('title') is-invalid @enderror" id="" placeholder="إسم الكتاب" value="{{ $book->title }}" >
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    الرقم التسلسلي
                                </td>
                                <td class="px-6 py-4">
                                    <input name="isbn" type="text" class="form-control  @error('isbn') is-invalid @enderror" id="" placeholder="الرقم التسلسلي"  value="{{ $book->isbn }}">
                                    @error('isbn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800 border-b">
                                <td class="px-6 py-4  text-blod flex w-full ">
                                    صورة الكتاب
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <div class="mb-4 d-flex justify-content-center">
                                            <img id="selectedImage" src="{{asset('storage/' . $book->cover_image)}}"
                                            style="width: 300px;" />
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                                <label class="form-label text-white m-1" for="custom-img">إختر صورة </label>
                                                <input type="file"  name="cover_image" accept='image/*' class="form-control d-none " id="custom-img" onchange="displaySelectedImage(event, 'selectedImage')" value="{{ $book->cover_image}}" />
                                            </div>
                                        </div>

                                        @error('cover_image')
                                        <span class="invalid-feedback invalid-feedback-img " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                                <tr class="bg-white dark:bg-gray-800  border-b">
                                    <td class="px-6 py-4  text-blod flex w-full ">
                                        حول الكتاب
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="وصف الكتاب" >{{ $book->description}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr class="bg-white dark:bg-gray-800  border-b">
                                    <td class="px-6 py-4 w-3/12 text-blod">
                                        تصنيف الكتاب
                                    </td>
                                    <td class="px-6 py-4">
                                        <select name="category" id="category" class="form-control ">
                                            <option {{  $book->Category == null ? 'selected' : '' }} disabled>أختر</option>
                                            @foreach($categories as $category)
                                                <option {{ $book->Category == $category ? 'selected' : ''}} value="{{$category->id}}"> {{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800  border-b">
                                    <td class="px-6 py-4 w-3/12 text-blod">
                                        دار النشر
                                    </td>
                                    <td class="px-6 py-4">
                                        <select name="publisher" id="publisher" class="form-control">
                                            <option {{  $book->publisher == null ? 'selected' : '' }} disabled>أختر</option>
                                            @foreach($publishers as $publisher)
                                                <option {{ $book->$publisher == $publisher ? 'selected' : ''}}  value="{{$publisher->id}}"> {{$publisher->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('publisher')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800  border-b">
                                    <td class="px-6 py-4 w-3/12 text-blod">
                                        المؤلفون
                                    </td>
                                    <td class="px-6 py-4">
                                        <select  name="authors[]" id="authors" multiple class="form-control">
                                            <option {{  $book->authors == null ? 'selected' : '' }}  disabled>أختر</option>
                                            @foreach($authors as $author)
                                                <option  value="{{$author->id}}" {{ $book->authors->contains($author) ? 'selected' : '' }}> {{$author->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('authors')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800  border-b">
                                    <td class="px-6 py-4 w-3/12 text-blod">
                                        تاريخ النشر
                                    </td>
                                    <td class="px-6 py-4">
                                        <input name="publish_year" type="number" class="form-control @error('publish_year') is-invalid @enderror" id="" placeholder="سنة النشر"  value="{{ $book->publish_year}}">
                                        @error('publish_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800  border-b ">
                                    <td class="px-6 py-4 w-3/12 text-blod">
                                        عدد صفحات الكتاب
                                    </td>
                                    <td class="px-6 py-4">
                                        <input name="number_of_pages" type="number" class="form-control @error('number_of_pages') is-invalid @enderror" id="" placeholder="عدد صفحات الكتاب" value="{{ $book->number_of_pages}}">
                                        @error('number_of_pages')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800  border-b">
                                    <td class="px-6 py-4 w-3/12 text-blod">
                                        عدد النسخ المتوفر
                                    </td>
                                    <td class="px-6 py-4">
                                        <input name="number_of_copies" type="number" class="form-control @error('number_of_copies') is-invalid @enderror" id="" placeholder="عدد النسخ المتوفر" value="{{ $book->number_of_copies}}">
                                        @error('number_of_copies')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800  border-b">
                                    <td class="px-6 py-4 w-3/12 text-blod">
                                        سعر الكتاب
                                    </td>
                                    <td class="px-6 py-4">
                                        <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" id="" placeholder="سعر الكتاب"   value="{{ $book->price}}">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800  border-b">
                                    <td colspan="2" class="px-6 py-4 " >
                                        <div class="flex items-center w-fit mx-auto rounded-md  px-5 py-2.5 text-center text-sm font-medium">
                                            <button role="submit" href="{{ route('book.store') }}" class="btn cur-p btn-success btn-color me-2">
                                                حفظ
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;
    console.log(fileInput.files)
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

function selectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const input = event.target;

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                selectedImage
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endpush
