<!-- resources/views/birthday/index.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday Sayang!</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&display=swap');

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-sans {
            font-family: 'Poppins', sans-serif;
        }

        /* Kustomisasi scrollbar biar rapi */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #fda4af;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-rose-50 text-gray-800 font-sans antialiased overflow-x-hidden">

    <!-- HERO & SURAT CINTA -->
    <section class="min-h-screen flex flex-col items-center justify-center p-6 text-center">
        <h1 data-aos="zoom-in" data-aos-duration="1000"
            class="font-serif text-5xl md:text-7xl font-bold text-rose-900 mb-4">
            Happy Birthday, <br> Nona Libra & Hukum! ⚖️❤️
        </h1>

        <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000"
            class="max-w-2xl bg-white p-8 md:p-12 rounded-2xl shadow-xl mt-8 border-t-4 border-rose-400">
            <p class="text-lg leading-relaxed text-left text-gray-700">
                Hai Sayang,<br><br>
                Selamat bertambah umur! 🎉<br><br>
                Sebagai anak pertama, adek itu sering banget sok kuat, sok mandiri, dan pengen nanggung semuanya
                sendiri. Tapi asal adek tau, di depan mas adek selalu boleh kok berubah jadi Masha yang rewel, banyak
                maunya, dan hobi berantakin hidup mas (<i>in a very good way</i>!). Mas selalu siap jadi Bear-nya yang
                sabar ngadepin adek.<br><br>
                Buat sarjana Hukum yang berzodiak Libra, mas tau kadang salah satu menjawab terserah aja bisa jadi
                perdebatan
                sengit. Tapi berdasarkan Pasal 1 Hukum Percintaan Kita: <b>"Adek selalu benar (dan cantik)"</b>.
                <br><br>
                Terima kasih ya sudah lahir ke dunia dan mampir ke hidup mas. <i>I love you so much!</i>
            </p>
        </div>
    </section>

    <!-- TIMELINE PERJALANAN -->
    <section class="max-w-3xl mx-auto py-16 px-6">
        <h2 data-aos="fade-up" class="font-serif text-3xl font-bold text-center text-rose-900 mb-12">Rekam Jejak Kasus
            Kita...</h2>

        <div class="relative border-l-2 border-rose-300 ml-4 md:ml-0">
            @foreach($timeline as $index => $item)
                <!-- Delay ditambah pelan-pelan berdasarkan index biar munculnya bergantian -->
                <div data-aos="fade-up" data-aos-delay="{{ $index * 200 }}" class="mb-10 ml-6 relative">
                    <span
                        class="absolute -left-9 flex items-center justify-center w-6 h-6 bg-rose-400 rounded-full shadow-lg text-xs">
                        {{ $item['icon'] }}
                    </span>

                    <h3 class="text-sm font-semibold text-rose-500 tracking-wider">{{ $item['tanggal'] }}</h3>
                    <h4 class="text-xl font-bold text-gray-800 mt-1">{{ $item['judul'] }}</h4>
                    <p class="text-gray-600 mt-2">{{ $item['cerita'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- TOMBOL KEJUTAN -->
    <section class="py-20 text-center px-6 min-h-[50vh] flex flex-col justify-center items-center">
        <h2 data-aos="fade-in" class="font-serif text-2xl mb-6 text-gray-700">Sidang belum selesai, ada satu barang
            bukti lagi...</h2>

        <button data-aos="zoom-in" data-aos-delay="200" onclick="bukaPetunjuk()"
            class="bg-rose-600 hover:bg-rose-700 text-white font-bold py-4 px-8 rounded-full shadow-lg transform transition hover:scale-110 duration-300 animate-bounce mt-4">
            Klik Untuk Cari Tahu Kado Adek! 🎁
        </button>

        <div id="petunjuk-kado"
            class="hidden mt-8 max-w-md mx-auto bg-gray-900 text-white p-8 rounded-xl shadow-2xl transform transition-all">
            <h3 class="text-xl font-bold text-rose-300 mb-3">Petunjuk Kado:</h3>
            <p class="text-gray-200">
                Karena adek berharga dan istimewa, coba bayangkan sesuatu yang adek biasa hobi (manifestasikan barangnya
                yang berhubungan dengan Cewek). Ada sesuatu dari The Bear buat Masha! 🐻🩷
            </p>
        </div>
    </section>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi animasi
        AOS.init({
            once: true, // Animasi cuma jalan sekali saat discroll ke bawah
            offset: 100, // Jarak trigger animasi dari bawah layar
        });

        function bukaPetunjuk() {
            const petunjuk = document.getElementById('petunjuk-kado');
            petunjuk.classList.remove('hidden');
            // Menambahkan efek fade in manual untuk kotak petunjuk
            petunjuk.classList.add('animate-pulse');
            setTimeout(() => petunjuk.classList.remove('animate-pulse'), 1000);

            petunjuk.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    </script>
</body>

</html>