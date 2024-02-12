<x-app-layout>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('sweetalert::alert')



    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-col px-5 py-24 justify-center items-center">
          <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{ asset('assets/src/emptyresult.svg') }}">
          <div class="w-full md:w-2/3 flex flex-col mb-16 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Hi! <span class="text-indigo-700 font-bold">{{ Auth::user()->name }}</span> Silahkan Tambah Dulu Alternatif, lalu bobot dan matriks</h1>
            <p class="mb-6 leading-relaxed">Lakukan penambahan Data Alternatif, Bobot dan Matriks sesuai keinginan anda dan raih kandidat terbaik anda.</p>
          </div>
        </div>
      </section>
        @extends('components.footer-tailwind')
        @section('contentnav')
    
        @endsection
    </x-app-layout>
    