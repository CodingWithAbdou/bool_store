@extends('layouts.main')


@section('content')
    <div class="container mx-auto">
        <div class="w-[70%] mx-auto p-2 bg-white border rounded-md">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm  text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th  class="px-6 py-3 rounded-lg">
                                <h2 class="text-xl">عرض الناشرون</h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white dark:bg-gray-800 ">
                            <td class="px-6 py-4">
                                <div>
                                    <div class="mb-3">
                                        <form  class="relative mb-4 flex mx-auto flex-wrap items-stretch w-[80%]"  action="{{ route('publisher.search') }}"   method="GET" >
                                            <input type="search" name="searchname"
                                            class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                            placeholder="{{__('Search')}}">
                                            <button
                                                class="relative z-[2] flex items-center rounded-l bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg bg-blue-500"
                                                id="button-addon1"
                                                >
                                                <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="h-5 w-5"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800 ">
                            <td class="px-6 py-4">
                                <h2>{{ $title }}</h2>
                            </td>
                        </tr>
                        @if($publishers->count() > 0 )
                            @foreach ($publishers as $publisher)
                                <tr class="bg-white dark:bg-gray-800  border rounded-lg">
                                    <td class="py-4 px-6">
                                        <a class="hover:text-blue-600"  href="{{ route('publisher.list' , $publisher) }}" >
                                            {{ $publisher->name  }}
                                            ({{ $publisher->books->count()  }})
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr class="bg-white dark:bg-gray-800 ">
                            <td class="px-6 py-4">
                                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                    <p class="text-sm">{{ __('There Is No Categoty To Show') }}</p>
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
