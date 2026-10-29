<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART DRY - Setting</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-[#F4F8FC] via-[#D0E2F5] to-[#457CB8] min-h-screen text-slate-800 flex flex-col justify-between m-0 p-0 overflow-x-hidden pb-28">

    <!-- Toast Notifikasi Melayang (Floating Toast) -->
    <div id="toast" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 hidden opacity-0 transition-all duration-300 w-11/12 max-w-md">
        <div class="bg-[#041A3E] text-white text-center py-3.5 px-6 rounded-2xl shadow-2xl font-bold text-xs sm:text-sm border border-sky-400/30 flex items-center justify-center space-x-2">
            <i class="fa-solid fa-circle-check text-sky-400 text-base"></i>
            <span id="toast-message">Parameter berhasil diperbarui!</span>
        </div>
    </div>

    <!-- Header Judul -->
    <header class="pt-6 sm:pt-8 pb-2 sm:pb-4 text-center z-10">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#041A3E] tracking-tight">SMART DRY</h1>
        <p class="text-xs sm:text-sm text-[#386292] font-semibold mt-1 tracking-wide">Pengaturan Parameter Alat</p>
    </header>

    <!-- Main Content Layout (Responsif HP - Desktop) -->
    <main class="w-full max-w-xl md:max-w-2xl mx-auto px-4 sm:px-6 py-2 sm:py-4 flex-1 flex flex-col justify-center space-y-6 z-10">
        
        <!-- Card Input Setting Parameter -->
        <div class="bg-white/95 backdrop-blur-md border-[2.5px] border-[#88A9D0] rounded-[24px] sm:rounded-[28px] p-5 sm:p-8 shadow-lg space-y-6 sm:space-y-8">
            
            <!-- Field 1: Temperatur -->
            <div class="space-y-2 sm:space-y-3">
                <label class="flex items-center space-x-2 text-[#041A3E] font-black text-lg sm:text-xl tracking-tight">
                    <i class="fa-solid fa-temperature-half text-amber-500"></i>
                    <span>Temperatur</span>
                </label>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4">
                    <div class="relative flex-1">
                        <input type="number" id="input-temp" value="75" placeholder="0" class="w-full bg-white border-[2.5px] border-[#88A9D0] rounded-[18px] sm:rounded-[20px] pl-6 pr-12 py-3 sm:py-3.5 font-black text-xl sm:text-2xl text-[#041A3E] text-center focus:outline-none focus:ring-4 focus:ring-sky-200 transition">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 font-bold text-slate-400 text-sm">°C</span>
                    </div>
                    <button onclick="saveSetting('Temperatur', 'input-temp')" class="bg-[#041A3E] hover:bg-blue-900 active:bg-slate-950 text-white font-black text-base sm:text-lg px-8 py-3.5 rounded-[18px] sm:rounded-[20px] shadow-md hover:shadow-lg transition active:scale-95 flex items-center justify-center space-x-2">
                        <span>SET</span>
                    </button>
                </div>
            </div>

            <!-- Divider Line -->
            <hr class="border-slate-200">

            <!-- Field 2: Pencahayaan -->
            <div class="space-y-2 sm:space-y-3">
                <label class="flex items-center space-x-2 text-[#041A3E] font-black text-lg sm:text-xl tracking-tight">
                    <i class="fa-regular fa-lightbulb text-amber-500"></i>
                    <span>Pencahayaan</span>
                </label>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4">
                    <div class="relative flex-1">
                        <input type="number" id="input-light" value="49" placeholder="0" class="w-full bg-white border-[2.5px] border-[#88A9D0] rounded-[18px] sm:rounded-[20px] pl-6 pr-14 py-3 sm:py-3.5 font-black text-xl sm:text-2xl text-[#041A3E] text-center focus:outline-none focus:ring-4 focus:ring-sky-200 transition">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 font-bold text-slate-400 text-sm">Lux</span>
                    </div>
                    <button onclick="saveSetting('Pencahayaan', 'input-light')" class="bg-[#041A3E] hover:bg-blue-900 active:bg-slate-950 text-white font-black text-base sm:text-lg px-8 py-3.5 rounded-[18px] sm:rounded-[20px] shadow-md hover:shadow-lg transition active:scale-95 flex items-center justify-center space-x-2">
                        <span>SET</span>
                    </button>
                </div>
            </div>

        </div>

    </main>

    <!-- Bottom Navigation Bar (Fixed Bottom Responsif) -->
    <footer class="fixed bottom-0 left-0 right-0 bg-[#041A3E] text-white py-3.5 px-6 sm:px-12 z-50 border-t border-[#041A3E] shadow-2xl">
        <div class="max-w-4xl mx-auto flex justify-around items-center relative">
            
            <!-- Home -->
            <a href="/dashboard" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-house text-2xl"></i>
            </a>

            <!-- Camera -->
            <a href="/kamera" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-camera text-2xl"></i>
            </a>

            <!-- Chart -->
            <a href="/grafik" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-chart-line text-2xl"></i>
            </a>

            <!-- Settings (ACTIVE dengan Indikator) -->
            <a href="/setting" class="relative flex flex-col items-center py-1 group">
                <div class="absolute -top-3.5 w-10 sm:w-12 h-1 bg-white/80 rounded-full"></div>
                <i class="fa-solid fa-gear text-2xl text-white"></i>
            </a>

        </div>
    </footer>

    <!-- Script Notifikasi Interaktif Toast -->
    <script>
        let toastTimeout = null;

        function saveSetting(parameter, inputId) {
            const val = document.getElementById(inputId).value;
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toast-message');

            if (!val && val !== "0") {
                toastMsg.innerText = `Harap masukkan nilai ${parameter} terlebih dahulu!`;
            } else {
                toastMsg.innerText = `Target ${parameter} berhasil diset ke: ${val}`;
            }

            // Reset Animasi Toast
            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.remove('opacity-0');
                toast.classList.add('opacity-100');
            }, 10);

            if (toastTimeout) clearTimeout(toastTimeout);

            toastTimeout = setTimeout(() => {
                toast.classList.remove('opacity-100');
                toast.classList.add('opacity-0');
                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 300);
            }, 3000);
        }
    </script>

</body>
</html>