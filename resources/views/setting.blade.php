<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART DRY - Pengaturan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-[#F4F8FC] via-[#D0E2F5] to-[#457CB8] min-h-screen text-slate-800 flex flex-col justify-between m-0 p-0 overflow-x-hidden pb-24">

    <!-- Header Pengaturan -->
    <header class="pt-8 pb-4 text-center z-10">
        <h1 class="text-2xl md:text-3xl font-black text-[#041A3E] tracking-tight">Pengaturan Sistem</h1>
        <p class="text-xs md:text-sm text-[#386292] font-semibold mt-1 tracking-wide">
            Konfigurasi Ambang Batas Pengeringan
        </p>
    </header>

    <!-- Main Content Pengaturan -->
    <main class="w-full max-w-3xl mx-auto px-6 py-2 flex-1 flex flex-col justify-center space-y-6 z-10">
        
        <!-- KARTU 1: Parameter Batas Suhu Maximum -->
        <div class="bg-white border-[2.5px] border-[#88A9D0] rounded-[28px] p-8 shadow-sm space-y-6 mt-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center text-3xl shadow-sm">
                        <i class="fa-solid fa-temperature-high"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-[#041A3E]">Batas Suhu Maksimal</h2>
                        <p class="text-sm text-slate-500 font-medium mt-1">Sistem otomatis mematikan pemanas jika melebihi batas ini.</p>
                    </div>
                </div>
                <span class="text-2xl font-black text-[#041A3E] bg-slate-100 px-4 py-2 rounded-xl border border-slate-300 shadow-inner">
                    <span id="temp-val">50</span>°C
                </span>
            </div>

            <div class="pt-4">
                <input type="range" id="temp-range" min="35" max="80" value="50" oninput="updateTemp(this.value)" class="w-full h-3 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-[#041A3E]">
                <div class="flex justify-between text-xs font-bold text-slate-400 mt-2 px-1">
                    <span>35°C</span>
                    <span>80°C</span>
                </div>
            </div>
        </div>

        <!-- KARTU 2: Tombol Simpan Pengaturan -->
        <button onclick="saveSettings()" class="w-full bg-[#041A3E] text-white font-black text-lg py-4 rounded-[22px] shadow-md hover:bg-slate-900 active:scale-[0.98] transition duration-200 flex items-center justify-center space-x-2">
            <i class="fa-solid fa-floppy-disk"></i>
            <span>Simpan Pengaturan</span>
        </button>

    </main>

    <!-- Bottom Navigation Bar -->
    <footer class="bg-[#041A3E] text-white py-4 px-12 fixed bottom-0 left-0 right-0 z-50 border-t border-[#041A3E]">
        <div class="max-w-4xl mx-auto flex justify-around items-center relative">
            
            <a href="/dashboard" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-house text-2xl"></i>
            </a>

            <a href="/camera" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-camera text-2xl"></i>
            </a>

            <a href="/grafik" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-chart-line text-2xl"></i>
            </a>

            <!-- Settings (ACTIVE) -->
            <a href="/setting" class="relative flex flex-col items-center py-1 group">
                <div class="absolute -top-4 w-12 h-1 bg-white/70 rounded-full"></div>
                <i class="fa-solid fa-gear text-2xl text-white"></i>
            </a>

        </div>
    </footer>

    <!-- JavaScript Interaktif -->
    <script>
        function updateTemp(val) {
            document.getElementById('temp-val').innerText = val;
        }

        function saveSettings() {
            let temp = document.getElementById('temp-val').innerText;
            alert(`Pengaturan Berhasil Disimpan!\nBatas Suhu Maksimal diatur pada: ${temp}°C`);
        }
    </script>

</body>
</html>