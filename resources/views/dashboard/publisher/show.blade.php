@extends('dashboard.layouts.app')

@section('header-name')
عرض دار النشر
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="w-[70%] mx-auto p-2 bg-white border rounded-md">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm  text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th colspan='2' class="px-6 py-3 rounded-lg">
                                <h2 class=" cairo">عرض دار النشر</h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($publisher->name)
                            <tr class="bg-white dark:bg-gray-800 border-b">
                                <td class="px-6 py-4 w-3/12 text-blod ">
                                    إسم دار النشر
                                </td>
                                <td class="px-6 py-4">
                                    {{$publisher->name}}
                                </td>
                            </tr>
                        @endif

                        @if($publisher->address)
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4  text-blod flex w-full ">
                                    عنوان دار النشر
                                </td>
                                <td class="px-6 py-4 ">
                                    <p class="w-[80%] leading-6 ">
                                        {{$publisher->address}}
                                    </p>
                                </td>
                            </tr>
                        @endif
                        <tr class="bg-white dark:bg-gray-800  border-b">
                            <td colspan="2" class="px-6 py-4 " >
                                <div class="flex items-center w-fit mx-auto rounded-md  px-5 py-2.5 text-center text-sm font-medium">
                                    <form action="{{ route('publishers.destroy' , $publisher)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                    <a href="{{ route('publishers.edit' , $publisher) }}" class="btn cur-p btn-info btn-color me-2">
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
