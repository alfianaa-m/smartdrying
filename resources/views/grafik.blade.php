<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART DRY - Grafik Monitoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-[#F4F8FC] via-[#D0E2F5] to-[#457CB8] min-h-screen text-slate-800 flex flex-col justify-between m-0 p-0 overflow-x-hidden">

    <!-- Header Judul -->
    <header class="pt-8 pb-3 text-center z-10">
        <h1 class="text-2xl md:text-3xl font-black text-[#041A3E] tracking-tight">Grafik Monitoring</h1>
        <p class="text-xs md:text-sm text-[#386292] font-semibold mt-1 tracking-wide">
            Pengering Ikan Asin
        </p>
    </header>

    <!-- Main Content Desktop Layout -->
    <main class="w-full max-w-4xl mx-auto px-6 py-2 flex-1 flex flex-col justify-center space-y-5 z-10">
        
        <!-- 1. KARTU UTAMA: Grafik Monitoring 2 Line (Suhu & Kelembapan) -->
        <div class="bg-white border-[2.5px] border-[#88A9D0] rounded-[28px] p-6 shadow-sm space-y-4">
            
            <!-- Filter Waktu Capsule Bar -->
            <div class="border-[2px] border-[#88A9D0] rounded-full p-1 flex justify-between items-center bg-white shadow-inner">
                <button onclick="updateMainChart('1Jam')" id="btn-1jam" class="filter-btn flex-1 py-1.5 rounded-full bg-[#041A3E] text-white font-extrabold text-xs shadow transition">1 Jam</button>
                <button onclick="updateMainChart('3Jam')" id="btn-3jam" class="filter-btn flex-1 py-1.5 rounded-full text-[#041A3E] font-bold text-xs hover:bg-slate-100 transition">3 Jam</button>
                <button onclick="updateMainChart('6Jam')" id="btn-6jam" class="filter-btn flex-1 py-1.5 rounded-full text-[#041A3E] font-bold text-xs hover:bg-slate-100 transition">6 Jam</button>
                <button onclick="updateMainChart('12Jam')" id="btn-12jam" class="filter-btn flex-1 py-1.5 rounded-full text-[#041A3E] font-bold text-xs hover:bg-slate-100 transition">12 Jam</button>
                <button onclick="updateMainChart('24Jam')" id="btn-24jam" class="filter-btn flex-1 py-1.5 rounded-full text-[#041A3E] font-bold text-xs hover:bg-slate-100 transition">24 Jam</button>
            </div>

            <!-- Legend Indikator Line -->
            <div class="flex justify-end items-center space-x-6 text-xs font-bold pt-1">
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-[#0284C7]"></span>
                    <span class="text-slate-700">Kelembapan (%)</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-[#F97316]"></span>
                    <span class="text-slate-700">Suhu (°C)</span>
                </div>
            </div>

            <!-- Canvas Chart.js 2 Line -->
            <div class="w-full h-56 relative">
                <canvas id="tempHumidityChart"></canvas>
            </div>
        </div>

        <!-- 2. KARTU ESTIMASI SELESAI -->
        <div class="bg-white border-[2.5px] border-[#88A9D0] rounded-[28px] p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <span class="font-black text-[#041A3E] text-xl">Estimasi Selesai :</span>
                <span class="font-black text-[#041A3E] text-2xl">2 Jam</span>
            </div>

            <!-- Progress Bar -->
            <div class="w-full md:w-2/3 bg-slate-100 rounded-full h-8 overflow-hidden border-[2px] border-[#88A9D0] relative p-0.5">
                <div class="bg-[#041A3E] h-full rounded-full flex items-center justify-center text-xs font-black text-white shadow" style="width: 70%">
                    Progres 70%
                </div>
            </div>
        </div>

        <!-- 3. KARTU GRAFIK PENCAHAYAAN (PER 20 MENIT) -->
        <div class="bg-white border-[2.5px] border-[#88A9D0] rounded-[28px] p-6 shadow-sm space-y-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-amber-100 text-amber-500 rounded-2xl flex items-center justify-center text-xl">
                        <i class="fa-regular fa-lightbulb"></i>
                    </div>
                    <div>
                        <h3 class="font-black text-[#041A3E] text-lg">Pencahayaan</h3>
                        <p class="text-xs text-slate-400 font-semibold">Lux</p>
                    </div>
                </div>

                <!-- Tag Rata-rata Lux -->
                <div class="bg-amber-100 border border-amber-300 text-amber-900 px-3 py-1 rounded-xl text-xs font-black shadow-sm">
                    Rata-rata 482,6 lux
                </div>
            </div>

            <!-- Canvas Chart.js Pencahayaan -->
            <div class="w-full h-36 relative">
                <canvas id="lightChart"></canvas>
            </div>
        </div>

    </main>

    <!-- Bottom Navigation Bar -->
    <footer class="bg-[#041A3E] text-white py-4 px-12 relative w-full border-t border-[#041A3E] mt-4">
        <div class="max-w-4xl mx-auto flex justify-around items-center relative">
            
            <!-- Home -->
            <a href="/dashboard" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-house text-2xl"></i>
            </a>

            <!-- Camera -->
            <a href="/camera" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-camera text-2xl"></i>
            </a>

            <!-- Chart (ACTIVE dengan Indikator) -->
            <a href="/grafik" class="relative flex flex-col items-center py-1 group">
                <div class="absolute -top-4 w-12 h-1 bg-white/70 rounded-full"></div>
                <i class="fa-solid fa-chart-line text-2xl text-white"></i>
            </a>

            <!-- Settings -->
            <a href="/setting" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-gear text-2xl"></i>
            </a>

        </div>
    </footer>

    <!-- Script Chart.js Configuration -->
    <script>
        // 1. Chart Suhu & Kelembapan (2 Lines)
        const ctx1 = document.getElementById('tempHumidityChart').getContext('2d');
        const tempHumidityChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['12:40', '12:50', '13:00', '13:10', '13:20', '13:30'],
                datasets: [
                    {
                        label: 'Kelembapan (%)',
                        data: [85, 82, 80, 78, 78, 78],
                        borderColor: '#0284C7',
                        backgroundColor: 'rgba(2, 132, 199, 0.1)',
                        borderWidth: 3.5,
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#0284C7'
                    },
                    {
                        label: 'Suhu (°C)',
                        data: [35, 38, 41, 43, 45, 45],
                        borderColor: '#F97316',
                        backgroundColor: 'rgba(249, 115, 22, 0.1)',
                        borderWidth: 3.5,
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#F97316'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 20,
                        max: 100,
                        grid: { color: 'rgba(136, 169, 208, 0.2)' },
                        ticks: { font: { weight: 'bold' } }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { weight: 'bold' } }
                    }
                }
            }
        });

        // 2. Chart Pencahayaan (Skala per 20 Menit)
        const ctx2 = document.getElementById('lightChart').getContext('2d');
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['11:20', '11:40', '12:00', '12:20', '12:40', '13:00', '13:20'],
                datasets: [{
                    label: 'Pencahayaan (Lux)',
                    data: [380, 400, 415, 430, 425, 428, 435],
                    borderColor: '#F59E0B',
                    backgroundColor: 'rgba(245, 158, 11, 0.25)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4,
                    pointBackgroundColor: '#F59E0B'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 800,
                        ticks: { stepSize: 200, font: { weight: 'bold' } },
                        grid: { color: 'rgba(136, 169, 208, 0.2)' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { weight: 'bold' } }
                    }
                }
            }
        });

        // Handler Filter Waktu
        function updateMainChart(timeRange) {
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.className = "filter-btn flex-1 py-1.5 rounded-full text-[#041A3E] font-bold text-xs hover:bg-slate-100 transition";
            });

            if (timeRange === '1Jam') {
                document.getElementById('btn-1jam').className = "filter-btn flex-1 py-1.5 rounded-full bg-[#041A3E] text-white font-extrabold text-xs shadow transition";
                tempHumidityChart.data.labels = ['12:40', '12:50', '13:00', '13:10', '13:20', '13:30'];
                tempHumidityChart.data.datasets[0].data = [85, 82, 80, 78, 78, 78];
                tempHumidityChart.data.datasets[1].data = [35, 38, 41, 43, 45, 45];
            } else if (timeRange === '3Jam') {
                document.getElementById('btn-3jam').className = "filter-btn flex-1 py-1.5 rounded-full bg-[#041A3E] text-white font-extrabold text-xs shadow transition";
                tempHumidityChart.data.labels = ['10:30', '11:00', '11:30', '12:00', '12:30', '13:30'];
                tempHumidityChart.data.datasets[0].data = [90, 88, 83, 80, 79, 78];
                tempHumidityChart.data.datasets[1].data = [30, 32, 36, 40, 43, 45];
            }
            tempHumidityChart.update();
        }
    </script>

</body>
</html>