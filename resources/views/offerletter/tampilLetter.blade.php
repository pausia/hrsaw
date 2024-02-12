<x-app-layout>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweetalert::alert')
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Kirim Surat Tawaran</h2>
            
            @if(session('success'))
            <script>
                swal("Sukses!", "{{ session('success') }}", "success");
            </script>
            @endif
        
            @if(session('warning'))
                <script>
                    swal("Peringatan!", "{{ session('warning') }}", "warning");
                </script>
            @endif
        


            <form action="{{ route('offerletter.send') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="sub_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Email Penerima</label>
                        <input type="email" name="sub_email" id="sub_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap Kandidat</label>
                        <input type="text" name="full_name" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="company_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Email Perushaan Anda</label>
                        <input type="email" name="company_email" id="company_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi yang Dilamar</label>
                        <input type="text" name="position" id="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="letter_content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi Surat Tawaran</label>
                        <textarea name="letter_content" id="letter_content" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" required></textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="attachment"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Lampiran Surat (PDF)</label>
                        <input type="file" name="attachment" id="attachment"  class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" required>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Kirim Surat Tawaran
                    </button>
                </div>
            </form>
        </div>
    </section>

    @extends('components.footer-tailwind')
    @section('contentnav')

    @endsection
</x-app-layout>

{{-- @component('mail::message')
Hai, saya {{ $senderName }}
Senang berkenalan dengan Anda {{ $recipientName }}
@endcomponent --}}