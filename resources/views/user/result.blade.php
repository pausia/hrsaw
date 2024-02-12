<link rel="stylesheet" href="{{ asset('path/to/styles.css') }}">

<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('sweetalert::alert')

    <section class="text-gray-600 body-font">
        <div  class="container px-5 py-12 mx-auto">
            <div class="container mx-auto md:p-14 justify-between p-5 bg-indigo-700 rounded-3xl">
                <div class="flex flex-wrap -m-4 items-center">
                  <div class="p-4 lg:w-4/6">
                    <h1 class="title-font sm:text-5xl leading-10 text-2xl font-bold text-white">Congratulations to <span class="text-orange-400 leading-10">     @if($results->isNotEmpty() && $results->first()->alternative)
                        {{ $results->first()->alternative->name }}
                    @else
                        Nama Alternatif Default
                    @endif </span></h1>
                    <p class="max-w-2xl mt-6 font-light text-gray-100 leading-relaxed lg:mb-6 md:text-lg lg:text-xl dark:text-gray-400">Through calculations that we have conducted, the candidate is deemed the best in calculations using the Simple Additive Weighting (SAW) method. This decision is based on a comprehensive evaluation compared to other candidates.</p>
                    <a href="{{ route('offerletter.tampil') }}"><button type="submit" class="text-indigo-50 bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-4 text-center me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 inline-flex items-center">
                        <svg class="inline w-4 h-4 me-3 text-indigo-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                        </svg>
                        Kirim Offer Letter
                    </button></a>
                </div>
                  <div class="p-4 lg:w-2/6">
                    <div class="lg:max-w-lg mt-10 lg:w-full lg:mt-0 lg:col-span-5 lg:flex">
                        <img src="{{ asset('assets/src/celebration.svg') }}" alt="mockup">
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </section>

    <!-- Start block -->
    <section class="bg-gray-100 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl mb-10 px-4 lg:px-5">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-indigo-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4">ID</th>
                                <th scope="col" class="px-4 py-3">Name Kandidate</th>
                                <th scope="col" class="px-4 py-3">Total Value</th>
                                <th scope="col" class="px-4 py-3">Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                                    <td class="px-4 py-3 text-base">{{ $result->alternative->name }}</td>
                                    <td class="px-4 py-3 text-base">{{ $result->total_value }}</td>
                                    <td class="px-4 py-3 text-base">{{ $result->ranking }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->

    <div class="mx-auto max-w-screen-xl mb-24 pb-16 px-4 lg:px-5 ">
        <canvas id="columnChart"></canvas>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Ambil data yang diperlukan dari PHP (gunakan loop untuk mengumpulkan data dari $results)
            var labels = [];
            var totalValues = [];
    
            @foreach ($results as $result)
                labels.push("{{ $result->alternative->name }}");
                totalValues.push({{ $result->total_value }});
            @endforeach
    
            // Gambar chart
            var ctx = document.getElementById("columnChart").getContext("2d");
            var columnChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Value',
                        data: totalValues,
                        backgroundColor: 'rgba(85, 63, 194, 0.2)',
                        borderColor: 'rgba(85, 63, 194, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    @extends('components.footer-tailwind')
    @section('contentnav')

    @endsection
</x-app-layout>
