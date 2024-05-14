@extends('dashboard.layouts.app')


@section('content')
    <div class="container mx-auto">
        <div class="w-[70%] mx-auto p-2 bg-white border rounded-md">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm  text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th colspan='2' class="px-6 py-3 rounded-lg">
                                <h2 class="text-xl">عرض الكتاب</h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($book->title)
                            <tr class="bg-white dark:bg-gray-800 border-b">
                                <td class="px-6 py-4 w-3/12 text-blod ">
                                    إسم الكتاب
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->title}}
                                </td>
                            </tr>
                        @endif
                        @if($book->isbn)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    الرقم التسلسلي
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->isbn}}
                                </td>
                            </tr>
                        @endif
                        @if($book->cover_image)
                            <tr class="bg-white dark:bg-gray-800 border-b">
                                <td class="px-6 py-4  text-blod flex w-full ">
                                    صورة الكتاب
                                </td>
                                <td class="px-6 py-4">
                                    <div class="p-2 border rounded-md">
                                        <img class="border rounded-md" src="{{asset('storage/' . $book->cover_image)}}" alt="{{$book->title}}">
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @if($book->description)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4  text-blod flex w-full ">
                                    حول الكتاب
                                </td>
                                <td class="px-6 py-4 ">
                                    <p class="w-[80%] leading-6 ">
                                        {{$book->description}}
                                    </p>
                                </td>
                            </tr>
                        @endif
                        @if($book->publish_year)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    تاريخ النشر
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->publish_year}}
                                </td>
                            </tr>
                        @endif
                        @if($book->category)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    تصنيف الكتاب
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->category->name}}
                                </td>
                            </tr>
                        @endif
                        @if($book->publisher)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    دار النشر
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->publisher->name}}
                                </td>
                            </tr>
                        @endif
                        @if($book->authors->count() > 0)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    {{$book->authors->count() > 1  ? 'المؤلفون' : 'المؤلف'}}
                                </td>
                                <td class="px-6 py-4">
                                    <ul>
                                        @foreach ($book->authors as $author)
                                            <li class="py-1">- {{ $author->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endif
                        @if($book->number_of_pages)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    عدد صفحات الكتاب
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->number_of_pages}}
                                </td>
                            </tr>
                        @endif
                        @if($book->number_of_copies)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    عدد النسخ المتوفر
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->number_of_copies}}
                                </td>
                            </tr>
                        @endif
                        @if($book->price)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4 w-3/12 text-blod">
                                    سعر الكتاب
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->price}} $
                                </td>
                            </tr>
                        @endif
                        @if($book->number_of_copies > 0)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td colspan="2" class="px-6 py-4 " >
                                    <div class="flex items-center w-fit mx-auto rounded-md  px-5 py-2.5 text-center text-sm font-medium">
                                        <a href="{{ route('book.edit' , $book) }}" class="btn cur-p btn-info btn-color me-2">
                                            <span class=""><i class="fa-solid fa-pencil "></i></span>
                                        </a>
                                        <a href="{{ route('book.destroy' , $book) }}" class="btn cur-p btn-danger btn-color">
                                            <span class=""><i class="fa-solid fa-trash "></i></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
