<?php
// app/Http/Controllers/BirthdayController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function index()
    {
        $timeline = [
            [
                'tanggal' => '30 April 2022',
                'judul' => 'Sidang Pertama (Awal Kenal)',
                'cerita' => 'Momen pertama kali kita ngobrol. Waktu itu kamu masih jaim banget, wajar aura masih gelap hahaha. Belum kelihatan sifat asli rewelnya.',
                'icon' => '👀'
            ],
            [
                'tanggal' => '23 September 2022',
                'judul' => 'Masa Penyelidikan (PDKT)',
                'cerita' => 'Fase di mana aku mulai sadar: memilihmu adalah keputusan yang akan mengubah hidupku, dan anehnya, aku malah makin sayang.',
                'icon' => '🕵️♂️'
            ],
            [
                'tanggal' => '12 Juni 2022',
                'judul' => 'Vonis Seumur Hidup (Jadian)',
                'cerita' => 'Hari putusan Akhirnya kita sepakat buat jalan bareng. Resmi sudah The Bear punya Masha-nya sendiri buat dijagain dan disabarin setiap hari.',
                'icon' => '❤️'
            ],
            [
                'tanggal' => 'Hari Ini, 2026',
                'judul' => 'Bertambah Umur & Makin Bersinar',
                'cerita' => 'Merayakan hari lahirnya si anak pertama yang selalu sok kuat. Hari ini kamu bebas minta apa aja, aku siap nurut!',
                'icon' => '🎂'
            ]
        ];

        return view('birthday.index', compact('timeline'));
    }
}
