<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SMART DRY - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Efek pantulan cahaya lengkung (glossy curve) yang menyesuaikan rasio layar */
        .bg-glossy-curve {
            position: fixed;
            top: 0;
            left: 0;
            width: 85vw;
            height: 70vh;
            max-width: 800px;
            max-height: 600px;
            background: linear-gradient(135deg, rgba(56, 128, 209, 0.45) 0%, rgba(6, 24, 54, 0) 75%);
            border-bottom-right-radius: 100%;
            pointer-events: none;
            z-index: 1;
        }

        /* Smooth scaling & rendering optimization */
        svg {
            shape-rendering: geometricPrecision;
        }
    </style>
</head>
<body class="w-full min-h-screen min-h-[100dvh] bg-[#030F26] relative overflow-x-hidden overflow-y-auto flex flex-col items-center justify-center font-sans p-4 sm:p-6 md:p-8 select-none">

    <!-- Latar Belakang Gradien Biru Sesuai Desain (Fixed Viewport) -->
    <div class="fixed inset-0 bg-gradient-to-br from-[#1B4684] via-[#081C3D] to-[#020A1A] z-0"></div>
    
    <!-- Efek Pantulan Cahaya Lengkung Atas Kiri -->
    <div class="bg-glossy-curve"></div>

    <!-- Container Utama Responsive (Klik untuk masuk ke Dashboard) -->
    <a href="/dashboard" class="relative z-10 my-auto flex flex-col items-center justify-center text-center group cursor-pointer w-full max-w-lg transform transition duration-500 hover:scale-105 active:scale-95 focus:outline-none">
        
        <!-- EMBLEM LOGO VEKTOR CUSTOM (Ukuran Dinamis Responsif) -->
        <div class="w-44 h-44 sm:w-56 sm:h-56 md:w-64 md:h-64 lg:w-72 lg:h-72 xl:w-80 xl:h-80 mb-2 sm:mb-4 relative flex items-center justify-center drop-shadow-[0_10px_25px_rgba(0,0,0,0.5)] group-hover:drop-shadow-[0_0_35px_rgba(56,189,248,0.6)] transition duration-500">
            <svg viewBox="0 0 200 200" class="w-full h-full" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <!-- Gradien Warna Metalik/Glossy -->
                    <linearGradient id="houseGrad" x1="20" y1="20" x2="180" y2="180" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#38BDF8"/>
                        <stop offset="50%" stop-color="#0284C7"/>
                        <stop offset="100%" stop-color="#0369A1"/>
                    </linearGradient>

                    <linearGradient id="fishGrad" x1="40" y1="90" x2="160" y2="130" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#E0F2FE"/>
                        <stop offset="40%" stop-color="#7DD3FC"/>
                        <stop offset="100%" stop-color="#0284C7"/>
                    </linearGradient>

                    <linearGradient id="waveGrad" x1="20" y1="120" x2="180" y2="170" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#0284C7"/>
                        <stop offset="50%" stop-color="#38BDF8"/>
                        <stop offset="100%" stop-color="#BAE6FD"/>
                    </linearGradient>

                    <linearGradient id="steamGrad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#E0F2FE" stop-opacity="0.9"/>
                        <stop offset="100%" stop-color="#38BDF8" stop-opacity="0.2"/>
                    </linearGradient>
                </defs>

                <!-- Outline Rumah Metalik -->
                <path d="M 100 32 L 155 72 V 135 H 140 V 80 L 100 50 L 60 80 V 135 H 45 V 72 Z" fill="url(#houseGrad)" />
                <path d="M 142 62 V 48 H 152 V 70 Z" fill="url(#houseGrad)" />

                <!-- Sinyal Wi-Fi (Pojok Atas Kanan) -->
                <path d="M 156 38 A 12 12 0 0 1 172 54" stroke="#38BDF8" stroke-width="3" stroke-linecap="round"/>
                <path d="M 160 44 A 7 7 0 0 1 168 52" stroke="#7DD3FC" stroke-width="2.5" stroke-linecap="round"/>
                <circle cx="163" cy="49" r="1.5" fill="#E0F2FE"/>

                <!-- 3 Garis Gelombang Uap Panas -->
                <path d="M 90 70 Q 94 62 90 54 T 90 42" stroke="url(#steamGrad)" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                <path d="M 100 68 Q 104 58 100 48 T 100 36" stroke="url(#steamGrad)" stroke-width="3" stroke-linecap="round" fill="none"/>
                <path d="M 110 70 Q 114 62 110 54 T 110 42" stroke="url(#steamGrad)" stroke-width="2.5" stroke-linecap="round" fill="none"/>

                <!-- Bentuk Ikan -->
                <g filter="drop-shadow(0px 4px 6px rgba(0,0,0,0.3))">
                    <!-- Badan & Ekor Ikan -->
                    <path d="M 52 112 C 70 82, 135 88, 152 108 C 132 124, 75 132, 52 112 Z" fill="url(#fishGrad)"/>
                    <path d="M 55 110 L 36 96 C 42 110, 42 114, 35 124 Z" fill="url(#fishGrad)"/>
                    <!-- Mata Ikan -->
                    <circle cx="138" cy="104" r="2.5" fill="#032B56"/>
                    <circle cx="139" cy="103" r="0.8" fill="#FFFFFF"/>
                    <!-- Sirip Atas & Bawah -->
                    <path d="M 92 92 C 102 82, 118 85, 122 93 Z" fill="#38BDF8" opacity="0.8"/>
                    <path d="M 98 122 C 108 128, 120 125, 124 119 Z" fill="#0284C7" opacity="0.7"/>
                </g>

                <!-- Gelombang Air Sumbu Bawah -->
                <path d="M 30 132 C 60 118, 90 142, 120 126 C 145 112, 168 124, 175 130 C 150 148, 110 148, 80 138 C 55 130, 38 138, 30 132 Z" fill="url(#waveGrad)"/>
                <path d="M 45 140 C 75 128, 105 150, 138 136 C 158 128, 170 136, 172 138 C 148 154, 105 154, 75 144 C 58 138, 48 142, 45 140 Z" fill="#0284C7" opacity="0.6"/>
            </svg>
        </div>

        <!-- TEKS BRAND "SMART DRY" (Responsif) -->
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-black text-white tracking-widest drop-shadow-lg flex items-center justify-center">
            SMART<span class="text-[#38BDF8] ml-2 sm:ml-3">DRY</span>
        </h1>

        <!-- Tombol / Petunjuk Akses (Responsif untuk Mobile & Desktop) -->
        <div class="mt-4 sm:mt-6 inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md border border-white/15 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-semibold text-sky-200 shadow-lg transition duration-300 group-hover:bg-sky-500 group-hover:text-white group-hover:border-sky-400">
            <span>Klik untuk Masuk ke Dashboard</span>
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </div>

    </a>

</body>
</html>