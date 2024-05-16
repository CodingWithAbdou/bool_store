@extends('dashboard.layouts.app')

@section('header-name')
عرض المؤلف
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="w-[70%] mx-auto p-2 bg-white border rounded-md">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm  text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th colspan='2' class="px-6 py-3 rounded-lg">
                                <h2 class=" cairo">عرض المؤلف</h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($author->name)
                            <tr class="bg-white dark:bg-gray-800 border-b">
                                <td class="px-6 py-4 w-3/12 text-blod ">
                                    إسم المؤلف
                                </td>
                                <td class="px-6 py-4">
                                    {{$author->name}}
                                </td>
                            </tr>
                        @endif

                        @if($author->description)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4  text-blod flex w-full ">
                                    حول الكتاب
                                </td>
                                <td class="px-6 py-4 ">
                                    <p class="w-[80%] leading-6 ">
                                        {{$author->description}}
                                    </p>
                                </td>
                            </tr>
                        @endif
                        <tr class="bg-white dark:bg-gray-800  border-b">
                            <td colspan="2" class="px-6 py-4 " >
                                <div class="flex items-center w-fit mx-auto rounded-md  px-5 py-2.5 text-center text-sm font-medium">
                                    <form action="{{ route('authors.destroy' , $author)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                    <a href="{{ route('authors.edit' , $author) }}" class="btn cur-p btn-info btn-color me-2">
                                        <span class=""><i class="fa-solid fa-pencil "></i></span>
                                    </a>
                                    <button class="btn cur-p btn-danger btn-color" onclick="confirm('هل أنت متاكد ')">
                                        <span class=""><i class="fa-solid fa-trash "></i></span>
                                    </button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
