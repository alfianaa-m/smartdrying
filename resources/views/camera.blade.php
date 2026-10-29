<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART DRY - AR QR Scanner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- jsQR Library -->
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
        }
        /* Membalikkan orientasi horizontal video agar tidak mirror di layar */
        #webcam {
            transform: scaleX(-1) !important;
            -webkit-transform: scaleX(-1) !important;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-[#F4F8FC] via-[#D0E2F5] to-[#457CB8] min-h-screen text-slate-800 flex flex-col justify-between m-0 p-0 overflow-x-hidden pb-24">

    <!-- Header Judul -->
    <header class="pt-8 pb-3 text-center z-10">
        <h1 class="text-2xl md:text-3xl font-black text-[#041A3E] tracking-tight">AR QR Scanner</h1>
        <p class="text-xs md:text-sm text-[#386292] font-semibold mt-1 tracking-wide">
            Arahkan Kamera ke QR Code Pengering Ikan
        </p>
    </header>

    <!-- Main Content Camera Container -->
    <main class="w-full max-w-3xl mx-auto px-4 sm:px-6 py-2 flex-1 flex flex-col justify-center items-center z-10">
        
        <!-- Frame Utama Kamera -->
        <div class="relative w-full aspect-[4/3] max-h-[480px] bg-black rounded-[28px] overflow-hidden shadow-xl border-[2.5px] border-[#88A9D0]">
            
            <!-- Video Webcam Stream (Non-Mirror) -->
            <video id="webcam" class="w-full h-full object-cover" autoplay playsinline muted></video>
            
            <!-- Canvas Tersembunyi untuk Pemrosesan QR -->
            <canvas id="qr-canvas" class="hidden"></canvas>

            <!-- Target Box Frame / Viewfinder saat Memindai -->
            <div id="scan-frame" class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                <div class="w-48 h-48 sm:w-60 sm:h-60 border-2 border-dashed border-sky-400 rounded-3xl relative animate-pulse flex items-center justify-center bg-black/10">
                    <div class="absolute -top-1 -left-1 w-6 h-6 border-t-4 border-l-4 border-sky-400 rounded-tl-xl"></div>
                    <div class="absolute -top-1 -right-1 w-6 h-6 border-t-4 border-r-4 border-sky-400 rounded-tr-xl"></div>
                    <div class="absolute -bottom-1 -left-1 w-6 h-6 border-b-4 border-l-4 border-sky-400 rounded-bl-xl"></div>
                    <div class="absolute -bottom-1 -right-1 w-6 h-6 border-b-4 border-r-4 border-sky-400 rounded-br-xl"></div>
                    <p class="text-xs font-semibold text-white/80 bg-black/50 px-3 py-1 rounded-full backdrop-blur-sm">Arahkan QR Code</p>
                </div>
            </div>

            <!-- OVERLAY ESTIMASI AI (FULL MENUTUPI WADAH KAMERA) -->
            <div id="overlay-estimasi" class="absolute inset-0 z-30 bg-white/95 backdrop-blur-md rounded-[26px] p-5 sm:p-8 flex flex-col justify-between hidden transition-all duration-300">
                
                <!-- Header Overlay + Tombol Close X -->
                <div class="flex justify-between items-start">
                    <div class="flex items-start space-x-3.5">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#0284C7] text-white rounded-2xl flex items-center justify-center text-xl shadow-md shrink-0">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-[#041A3E] tracking-tight">Estimasi AI</h2>
                            <p class="text-xs sm:text-sm text-slate-500 font-semibold leading-relaxed mt-0.5">
                                Berdasarkan pola data saat ini, proses pengeringan berjalan dengan baik.
                            </p>
                        </div>
                    </div>
                    <button onclick="closeOverlay()" class="text-slate-400 hover:text-[#041A3E] text-2xl font-bold transition p-1 rounded-lg hover:bg-slate-100">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <!-- Grid Indikator Hasil Scan AI -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 my-2 sm:my-4">
                    <div class="bg-[#F0F4F9] border border-slate-200/80 rounded-2xl p-3.5 flex flex-col justify-between">
                        <div class="flex items-center space-x-2 text-slate-500 mb-1">
                            <i class="fa-regular fa-clock text-sm"></i>
                            <span class="text-[11px] font-bold uppercase tracking-wider">Waktu tersisa</span>
                        </div>
                        <p id="res-waktu" class="text-lg sm:text-xl font-black text-[#041A3E]">± 2 jam</p>
                    </div>

                    <div class="bg-[#F0F4F9] border border-slate-200/80 rounded-2xl p-3.5 flex flex-col justify-between">
                        <div class="flex items-center space-x-2 text-slate-500 mb-1">
                            <i class="fa-solid fa-chart-line text-sm text-sky-600"></i>
                            <span class="text-[11px] font-bold uppercase tracking-wider">Perkiraan hasil</span>
                        </div>
                        <p id="res-progres" class="text-lg sm:text-xl font-black text-[#041A3E]">± 85%</p>
                    </div>

                    <div class="bg-[#F0F4F9] border border-slate-200/80 rounded-2xl p-3.5 flex flex-col justify-between">
                        <div class="flex items-center space-x-2 text-slate-500 mb-1">
                            <i class="fa-solid fa-temperature-half text-sm text-amber-500"></i>
                            <span class="text-[11px] font-bold uppercase tracking-wider">Tren suhu</span>
                        </div>
                        <p id="res-suhu" class="text-lg sm:text-xl font-black text-[#041A3E]">Stabil</p>
                    </div>

                    <div class="bg-[#F0F4F9] border border-slate-200/80 rounded-2xl p-3.5 flex flex-col justify-between">
                        <div class="flex items-center space-x-2 text-slate-500 mb-1">
                            <i class="fa-solid fa-droplet text-sm text-blue-500"></i>
                            <span class="text-[11px] font-bold uppercase tracking-wider">Tren kelembapan</span>
                        </div>
                        <p id="res-kelembapan" class="text-lg sm:text-xl font-black text-[#041A3E]">Tinggi</p>
                    </div>
                </div>

                <!-- Progress Bar & Tombol Aksi Single (Detail Grafik) -->
                <div class="space-y-3">
                    <div class="w-full bg-slate-100 rounded-full h-4 overflow-hidden border border-slate-200 relative">
                        <div id="res-bar" class="bg-[#041A3E] h-full rounded-full transition-all duration-500" style="width: 85%"></div>
                    </div>

                    <div class="pt-1">
                        <a href="/grafik" class="block w-full bg-[#041A3E] hover:bg-blue-900 text-white font-bold text-xs sm:text-sm py-3 rounded-xl text-center transition shadow">
                            <i class="fa-solid fa-chart-line mr-1.5"></i> Detail Grafik
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </main>

    <!-- Bottom Navigation Bar (Fixed Bottom) -->
    <footer class="fixed bottom-0 left-0 right-0 bg-[#041A3E] text-white py-3.5 px-8 z-50 border-t border-[#041A3E] shadow-2xl">
        <div class="max-w-4xl mx-auto flex justify-around items-center relative">
            <a href="/dashboard" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-house text-2xl"></i>
            </a>
            <a href="/kamera" class="relative flex flex-col items-center py-1 group">
                <div class="absolute -top-3.5 w-10 h-1 bg-white/80 rounded-full"></div>
                <i class="fa-solid fa-camera text-2xl text-white"></i>
            </a>
            <a href="/grafik" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-chart-line text-2xl"></i>
            </a>
            <a href="/setting" class="flex flex-col items-center py-1 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-gear text-2xl"></i>
            </a>
        </div>
    </footer>

    <!-- Script Scanner Camera & Logic -->
    <script>
        const video = document.getElementById('webcam');
        const canvas = document.getElementById('qr-canvas');
        const ctx = canvas.getContext('2d');
        const overlay = document.getElementById('overlay-estimasi');
        const scanFrame = document.getElementById('scan-frame');
        let isScanning = true;

        async function startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ 
                    video: { facingMode: 'environment', width: { ideal: 1280 }, height: { ideal: 720 } } 
                });
                video.srcObject = stream;
                video.setAttribute('playsinline', true);
                requestAnimationFrame(scanQRCode);
            } catch (err) {
                console.error("Gagal mengakses kamera:", err);
            }
        }

        function scanQRCode() {
            if (video.readyState === video.HAVE_ENOUGH_DATA && isScanning) {
                canvas.height = video.videoHeight;
                canvas.width = video.videoWidth;
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                
                const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                const code = jsQR(imageData.data, imageData.width, imageData.height, {
                    inversionAttempts: "attemptBoth",
                });

                if (code) {
                    showResults(code.data);
                }
            }
            if (isScanning) {
                requestAnimationFrame(scanQRCode);
            }
        }

        async function showResults(qrContent) {
            isScanning = false;
            scanFrame.classList.add('hidden');

            try {
                const response = await fetch('/api/sensor-latest');
                if (response.ok) {
                    const data = await response.json();
                    if (data) {
                        let kelembapan = data.kelembapan ?? 80;
                        let estimasiMenit = Math.max(15, Math.round((kelembapan / 100) * 180));
                        let jam = (estimasiMenit / 60).toFixed(1);

                        document.getElementById('res-waktu').innerText = `± ${jam} jam`;
                        document.getElementById('res-progres').innerText = `± ${Math.round(100 - (kelembapan * 0.8))}%`;
                        document.getElementById('res-bar').style.width = `${Math.round(100 - (kelembapan * 0.8))}%`;
                    }
                }
            } catch (e) {
                console.warn('Gagal ambil data API sensor:', e);
            }

            overlay.classList.remove('hidden');
        }

        function closeOverlay() {
            overlay.classList.add('hidden');
            scanFrame.classList.remove('hidden');
            isScanning = true;
            requestAnimationFrame(scanQRCode);
        }

        document.addEventListener('DOMContentLoaded', startCamera);
    </script>

</body>
</html>