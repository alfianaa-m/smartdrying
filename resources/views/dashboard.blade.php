<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTDRY - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-[#F4F8FC] via-[#D0E2F5] to-[#457CB8] min-h-screen text-slate-800 flex flex-col justify-between m-0 p-0 overflow-x-hidden">

    <!-- Header Dashboard -->
    <header class="pt-8 pb-4 text-center z-10">
        <h1 class="text-2xl md:text-3xl font-black text-[#041A3E] tracking-tight">SMART DRY</h1>
        <p class="text-xs md:text-sm text-[#386292] font-semibold mt-1 tracking-wide">
            Update Time: 13:30:00 12/10/2026
        </p>
    </header>

    <!-- Main Content Desktop Layout -->
    <main class="w-full max-w-5xl mx-auto px-6 py-4 flex-1 flex flex-col justify-center space-y-6 z-10">
        
        <!-- Grid 3 Kartu Telemetri Sensor -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card 1: Kelembapan -->
            <div class="bg-white border-[2.5px] border-[#88A9D0] rounded-[28px] p-6 shadow-sm flex items-center justify-between hover:shadow-md transition">
                <div class="space-y-3">
                    <span class="text-[#041A3E] font-extrabold text-2xl tracking-tight block">Kelembapan</span>
                    <div class="text-[#041A3E] text-4xl">
                        <i class="fa-solid fa-droplet"></i>
                    </div>
                </div>
                <div class="text-right self-end">
                    <span class="text-5xl md:text-6xl font-black text-[#041A3E]">78</span>
                    <span class="text-3xl font-extrabold text-[#041A3E] ml-1">%</span>
                </div>
            </div>

            <!-- Card 2: Suhu -->
            <div class="bg-white border-[2.5px] border-[#88A9D0] rounded-[28px] p-6 shadow-sm flex items-center justify-between hover:shadow-md transition">
                <div class="space-y-3">
                    <span class="text-[#041A3E] font-extrabold text-2xl tracking-tight block">Suhu</span>
                    <div class="text-[#041A3E] text-4xl">
                        <i class="fa-solid fa-temperature-three-quarters"></i>
                    </div>
                </div>
                <div class="text-right self-end">
                    <span class="text-5xl md:text-6xl font-black text-[#041A3E]">45</span>
                    <span class="text-3xl font-extrabold text-[#041A3E] ml-1">°</span>
                </div>
            </div>

            <!-- Card 3: Pencahayaan -->
            <div class="bg-white border-[2.5px] border-[#88A9D0] rounded-[28px] p-6 shadow-sm flex items-center justify-between hover:shadow-md transition">
                <div class="space-y-3">
                    <span class="text-[#041A3E] font-extrabold text-2xl tracking-tight block">Pencahayaan</span>
                    <div class="text-[#041A3E] text-4xl">
                        <i class="fa-regular fa-lightbulb"></i>
                    </div>
                </div>
                <div class="text-right self-end">
                    <span class="text-5xl md:text-6xl font-black text-[#041A3E]">280</span>
                </div>
            </div>

        </div>

        <!-- Mode Switcher (Otomatis / Manual) -->
        <div class="w-full max-w-2xl mx-auto bg-white border-[2.5px] border-[#88A9D0] rounded-[28px] p-1.5 shadow-sm flex items-center mt-4">
            <button id="btn-otomatis" onclick="setMode('otomatis')" class="flex-1 py-4 rounded-[22px] bg-[#041A3E] text-white font-black text-xl tracking-wide shadow transition duration-300">
                Otomatis
            </button>
            <button id="btn-manual" onclick="setMode('manual')" class="flex-1 py-4 rounded-[22px] text-[#041A3E] font-black text-xl tracking-wide hover:bg-slate-100 transition duration-300">
                Manual
            </button>
        </div>

        <!-- Tombol Kontrol Manual (Pemanas & Exhaus) - Hanya muncul di Mode Manual -->
        <div id="manual-controls" class="hidden w-full max-w-2xl mx-auto grid grid-cols-2 gap-4 pt-2 transition-all duration-300">
            <button id="btn-pemanas" onclick="toggleAktuator('pemanas')" class="bg-white border-[2.5px] border-[#88A9D0] rounded-[22px] py-4 text-[#041A3E] font-black text-xl tracking-wide shadow-sm hover:bg-blue-50 transition active:scale-95">
                Pemanas
            </button>
            <button id="btn-exhaus" onclick="toggleAktuator('exhaus')" class="bg-white border-[2.5px] border-[#88A9D0] rounded-[22px] py-4 text-[#041A3E] font-black text-xl tracking-wide shadow-sm hover:bg-blue-50 transition active:scale-95">
                Exhaus
            </button>
        </div>

    </main>

    <!-- Bottom Navigation Bar -->
    <footer class="bg-[#041A3E] text-white py-4 px-12 relative w-full border-t border-[#041A3E]">
        <div class="max-w-4xl mx-auto flex justify-around items-center relative">
            
            <!-- Item Active: Home dengan Indikator Garis Atas -->
            <a href="/dashboard" class="relative flex flex-col items-center py-1 group">
                <div class="absolute -top-4 w-12 h-1 bg-white/70 rounded-full"></div>
                <i class="fa-solid fa-house text-2xl text-white"></i>
            </a>

            <!-- Camera -->
            <a href="/camera" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-camera text-2xl"></i>
            </a>

            <!-- grafik -->
            <a href="/grafik" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-chart-line text-2xl"></i>
            </a>

            <!-- Settings -->
            <a href="/setting" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-gear text-2xl"></i>
            </a>

        </div>
    </footer>

    <!-- Logic Switch Mode & Toggle Aktuator -->
    <script>
        let isPemanasOn = false;
        let isExhausOn = false;

        function setMode(mode) {
            const btnOtomatis = document.getElementById('btn-otomatis');
            const btnManual = document.getElementById('btn-manual');
            const manualControls = document.getElementById('manual-controls');

            if (mode === 'manual') {
                // Style tombol Manual aktif
                btnManual.className = "flex-1 py-4 rounded-[22px] bg-[#041A3E] text-white font-black text-xl tracking-wide shadow transition duration-300";
                btnOtomatis.className = "flex-1 py-4 rounded-[22px] text-[#041A3E] font-black text-xl tracking-wide hover:bg-slate-100 transition duration-300";
                
                // Tampilkan tombol Pemanas & Exhaus
                manualControls.classList.remove('hidden');
            } else {
                // Style tombol Otomatis aktif
                btnOtomatis.className = "flex-1 py-4 rounded-[22px] bg-[#041A3E] text-white font-black text-xl tracking-wide shadow transition duration-300";
                btnManual.className = "flex-1 py-4 rounded-[22px] text-[#041A3E] font-black text-xl tracking-wide hover:bg-slate-100 transition duration-300";
                
                // Sembunyikan tombol Pemanas & Exhaus
                manualControls.classList.add('hidden');
            }
        }

        function toggleAktuator(type) {
            if (type === 'pemanas') {
                isPemanasOn = !isPemanasOn;
                const btn = document.getElementById('btn-pemanas');
                if (isPemanasOn) {
                    btn.classList.add('bg-[#041A3E]', 'text-white');
                    btn.classList.remove('bg-white', 'text-[#041A3E]');
                } else {
                    btn.classList.remove('bg-[#041A3E]', 'text-white');
                    btn.classList.add('bg-white', 'text-[#041A3E]');
                }
            } else if (type === 'exhaus') {
                isExhausOn = !isExhausOn;
                const btn = document.getElementById('btn-exhaus');
                if (isExhausOn) {
                    btn.classList.add('bg-[#041A3E]', 'text-white');
                    btn.classList.remove('bg-white', 'text-[#041A3E]');
                } else {
                    btn.classList.remove('bg-[#041A3E]', 'text-white');
                    btn.classList.add('bg-white', 'text-[#041A3E]');
                }
            }
        }
    </script>

</body>
</html> 