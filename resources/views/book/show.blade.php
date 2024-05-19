@extends('layouts.main')

@push('style')
    <style>
        .yellow-icon:hover {
            display: none;
        }
        .gray-icon:hover ~ div {
            display: none;
        }
        .gray-icon:hover {
            z-index: 12;
        }
        .gray-icon svg:hover ~ svg ,
        .gray-icon svg:hover {
            color : #fde047;
        }
    </style>
@endpush

@section('content')
    <div class="container mx-auto">
        <div class="w-[70%] mx-auto p-2 bg-white border rounded-md">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm  text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th colspan='2' class="px-6 py-3 rounded-lg">
                                <h2 class="text-xl">عرض الكتاب</h2>
                                <input type="hidden" value="{{$book->id}}" id="bookid">
                            </th>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800  border-b">
                            <td colspan="2" class="px-6 py-4" >
                                <div class=" flex gap-6 items-start justify-center  ">
                                    <div class="flex items-center mt-1">
                                        <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                            </button>
                                        <input type="text" id="counter-input" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder="" value="1" min="1"  required />
                                        <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div >
                                        <button id="addto-cart" class="flex items-center w-fit mx-auto rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                            <span>{{ __('Add to cart') }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                            </td>
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
                        <tr class="bg-white dark:bg-gray-800 border-b">
                            <td class="px-6 py-4 w-3/12 text-blod ">
                                تقييم الكتاب
                            </td>
                            <td class="px-6 py-4">
                                <div class="mt-1 mb-5 flex items-center relative">
                                    <div class=" flex  relative z-10 w-[100px] ">
                                        <div class=" flex  overflow-hidden" style="width: {{$book->rate() * 20   }}px ">
                                            <svg aria-hidden="true" class="h-5  w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 1.25rem">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg aria-hidden="true" class="h-5 w-5  text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 1.25rem">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg aria-hidden="true" class="h-5 w-5  text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 1.25rem">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg aria-hidden="true" class="h-5 w-5  text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 1.25rem">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg aria-hidden="true" class="h-5 w-5  text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 1.25rem">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class=" flex  absolute " dir="ltr">
                                        <svg aria-hidden="true" class="h-5 w-5 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="h-5 w-5 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="h-5 w-5 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="h-5 w-5 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="h-5 w-5 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    </div>
                                    <span class="mr-2 rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold">{{is_float($book->rate()) ? number_format($book->rate() , 1)   :  $book->rate() . '.0'  }}</span>
                                </div>
                                <span class="block text-neutral-700"> عدد المقيمين {{ $book->ratings()->count() }}</span>
                            </td>
                        </tr>
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

                        @if($bool)
                            @auth
                                <tr>
                                    <td  colspan="2" class="bg-white   border-b px-6 py-4">
                                        <div class="mt-1 mb-5 flex items-center relative justify-center" style="min-height: 32px">
                                            <div class=" flex  relative z-10 w-[160px] hover:opacity-0 yellow-icon">
                                                <div class=" flex  overflow-hidden" style="width: {{ auth()->user()->bookRating($book) == NULL ? 0 : auth()->user()->bookRating($book)->value  * 20   }}% ">
                                                    <svg aria-hidden="true" class="  h-8  w-8 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 2rem">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                    <svg aria-hidden="true" class="h-8 w-8  text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 2rem">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                    <svg aria-hidden="true" class="h-8 w-8  text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 2rem">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                    <svg aria-hidden="true" class="h-8 w-8  text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 2rem">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                    <svg aria-hidden="true" class="h-8 w-8  text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="min-width: 2rem">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class=" flex absolute gray-icon " dir="ltr">
                                                <svg data-rate="5" aria-hidden="true" class="cursor-pointer h-8 w-8 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg  data-rate="4" aria-hidden="true" class=" cursor-pointer h-8 w-8 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg data-rate="3" aria-hidden="true" class=" cursor-pointer h-8 w-8 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg data-rate="2" aria-hidden="true" class=" cursor-pointer h-8 w-8 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg data-rate="1" aria-hidden="true" class=" cursor-pointer h-8 w-8 text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endauth
                        @else
                        <tr>
                            <td colspan="2 my-2">
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 mt-2" role="alert">
                                    <span class="font-medium"> تستطيع تقيييم هذا الكتاب فقط بعد أن تشتريه</span>
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


@push('script')
<script>

    let inputQuantity = $('#counter-input').val()
    $('#counter-input').keyup(function() {
        if (/\D/g.test(this.value)) {
            this.value = this.value.replace(/\D/g,'')
        }
        if(this.value == 0) {
            this.value = 1
        }
    })

    $('#increment-button').click(function() {
        $('#counter-input').val(++inputQuantity)
    })
    $('#decrement-button').click(function() {
        if($('#counter-input').val() > 1) {
            $('#counter-input').val(--inputQuantity)
        }else {
            toastr.error('الحقل لايقبل قيمة سالبة')
        }
    })

    $('#addto-cart').click(function() {
        let inputQuantity = $('#counter-input').val();
        let bookid = $('#bookid').val();
        $.ajax({
            type: 'POST',
            url: "{{ route('add.cart') }}",
            data: {
                "_token": "{{session()->token() }}",
                'bookid' : bookid ,
                'inputQuantity' : inputQuantity
            },
            success: function(data) {
                $('.badge').html(data.num_of_product)
                toastr.success('تمت الإضافة بنجاح')
            },
            error: function() {
                toastr.error('حدث خطأ ما')
            }
        });
    });

    $('.gray-icon > svg').click(function() {
            let submitStars = $(this).attr('data-rate');
            $.ajax({
                type: 'POST',
                url: '/book/' + {{ $book->id }} + '/rate',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'value' : submitStars
                },
                success: function() {
                    location.reload();
                },
                error: function() {
                    toastr.error('حدث خطأ ما')
                },
            });
        });
</script>
@endpush
