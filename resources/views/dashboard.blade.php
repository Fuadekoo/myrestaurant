<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Main Function') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul class="flex justify-between">
                        <a href="/management">
                            <li class="text-center">
                                <img width="50px" src="{{asset('images/dashboard.svg')}}" alt="">
                                <h4>Management</h4>
                            </li>
                        </a>

                        <a href="/cashier">
                        <li class="text-center">
                            <img width="50px" src="{{asset('images/cashier.svg')}}" alt="">
                            <h4>Cashier</h4>
                        </li>
                        </a>

                        <a href="/report">
                        <li class="text-center">
                            <img width="50px" src="{{asset('images/report.svg')}}" alt="">
                            <h4>Report</h4>
                        </li>
                        </a>

                    </ul>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
