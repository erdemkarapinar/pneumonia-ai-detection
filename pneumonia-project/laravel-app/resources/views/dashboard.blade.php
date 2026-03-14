<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pneumonia Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-lg font-semibold">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- X-ray Prediction Form -->
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
                <form action="/predict" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                    @csrf

                    <label class="block text-gray-700 dark:text-gray-200 font-medium">
                        Upload X-ray Image
                        <input type="file" name="image" required
                            class="mt-2 block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-600 file:text-white
                                    hover:file:bg-indigo-700
                                    cursor-pointer
                                    ">
                    </label>

                <button type="submit"
                    class="bg-indigo-600 text-white font-bold py-2 px-4 rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200" style="background-color: #4F46E5;">
                    Analyze X-ray
                </button>

                </form>
            </div>

            <!-- Result Section -->
            @if(session('result'))
            <div class="mt-6 bg-green-50 dark:bg-green-900 border-l-4 border-green-500 dark:border-green-400 p-4 rounded-md" style="background-color: #D1FAE5; border-color: #10B981;">
                <h2 class="text-lg font-semibold text-green-800 dark:text-green-200">Result: {{ session('result')['prediction'] }}</h2>
                <p class="text-gray-700 dark:text-gray-300">Confidence: {{ session('result')['confidence'] }}</p>
            </div>
            @endif

            <!-- Chart Section -->
            <div class="mt-8 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                    Prediction Confidence History
                </h2>

                <div class="relative h-64">
                    <canvas id="predictionChart"></canvas>
                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
const ctx = document.getElementById('predictionChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($dates),
        datasets: [{
            label: 'Confidence over Time',
            backgroundColor: 'rgba(255,99,132,0.2)',
            borderColor: 'rgba(255,99,132,1)',
            data: @json($confidence),
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        },
        scales: {
            y: { beginAtZero: true, max: 1 }
        }
    }
});
</script>

</x-app-layout>
