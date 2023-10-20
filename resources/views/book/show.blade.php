@extends('layouts.main')


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
                                    <a href="#" class="flex items-center w-fit mx-auto rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                        <span>{{ __('Add to cart') }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
