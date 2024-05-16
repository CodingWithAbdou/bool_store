@extends('dashboard.layouts.app')

@push('style')
<style>
    .invalid-feedback-img {
        display: block !important
    }
</style>
@endpush
@section('head-title')
إضافة مؤلف
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="w-[70%] mx-auto p-2 bg-white border rounded-md">
            <div class="relative overflow-x-auto">
                <form action="{{route('authors.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="w-full text-sm  text-gray-500 dark:text-gray-400 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th colspan='2' class="px-6 py-3 rounded-lg">
                                    <h2 class="text-xl">إضافة مؤلف</h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800 border-b">
                                <td class="px-6 py-4 w-3/12 text-blod ">
                                    إسم المؤلف
                                </td>
                                <td class="px-6 py-4">
                                    <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="" placeholder="إسم المؤلف" value="{{ old('name') }}" >
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>

                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td class="px-6 py-4  text-blod flex w-full ">
                                    حول المؤلف
                                </td>
                                <td class="px-6 py-4 ">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="وصف المؤلف"  value="{{ old('description') }}"></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>

                            </tr>
                            <tr class="bg-white dark:bg-gray-800  border-b">
                                <td colspan="2" class="px-6 py-4 " >
                                    <div class="flex items-center w-fit mx-auto rounded-md  px-5 py-2.5 text-center text-sm font-medium">
                                        <button role="submit" href="{{ route('authors.store') }}" class="btn cur-p btn-success btn-color me-2">
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
</script>
@endpush
