<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categories;
use App\Models\Produks;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::insert([
            'nama_lengkap' => 'Admin Utama',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Telkomdso123'),
            'image' => 'img/foto_admin.png',
            'keterangan' => 'Administrator',
            'created_at' => '2024-02-29 11:44:37',
            'updated_at' => '2024-02-29 11:44:37',
        ]);

        User::insert([
            'nama_lengkap' => 'Hidayat',
            'username' => 'petugas_1',
            'email' => 'petugas1@smkn17.id',
            'password' => bcrypt('petugas_satu'),
            'image' => 'img/foto_petugas.png',
            'keterangan' => 'Petugas',
            'created_at' => '2024-02-29 11:44:37',
            'updated_at' => '2024-02-29 11:44:37',
        ]);

        User::insert([
            'nama_lengkap' => 'Manusia',
            'username' => 'petugas_2',
            'email' => 'petugas@smkn17.com',
            'password' => bcrypt('petugas_dua'),
            'image' => 'img/foto_petugas.png',
            'keterangan' => 'Petugas',
            'created_at' => '2024-02-29 11:44:37',
            'updated_at' => '2024-02-29 11:44:37',
        ]);

        Profil::insert([
            'nama_sekolah' => 'SMK NEGERI 17 JAKARTA',
            'alamat' => 'SLIPI KEMANGGISAN JAKARTA',
            'tahun_ajaran' => '2024 / 2025',
            'image' => 'img/logo.png',
            'created_at' => '2024-02-29 11:44:37',
            'updated_at' => '2024-02-29 11:44:37',
        ]);

        Categories::insert([
            'nama_categories' => 'Monitor',
            'created_at' => '2024-02-29 11:44:37',
            'updated_at' => '2024-02-29 11:44:37',
        ]);

        Categories::insert([
            'nama_categories' => 'Mouse',
            'created_at' => '2024-02-29 11:44:37',
            'updated_at' => '2024-02-29 11:44:37',
        ]);

        Categories::insert([
            'nama_categories' => 'Keyboard',
            'created_at' => '2024-02-29 11:44:37',
            'updated_at' => '2024-02-29 11:44:37',
        ]);

        Categories::insert([
            'nama_categories' => 'Ipad',
            'created_at' => '2024-02-29 11:44:37',
            'updated_at' => '2024-02-29 11:44:37',
        ]);

        DB::table('produks')->insert([
            [
                'categories_id' => 1,
                'nama_barang' => 'Monitor Acer P891-2',
                'kode_barang' => 746001,
                'harga_barang' => 2000000,
                'stok_barang' => 99,
                'image' => 'img/zi4OcLMe42FhkM9WR7pJP8QRvxELeSX4Ylmw2TjG.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 2,
                'nama_barang' => 'Mouse Apple C092',
                'kode_barang' => 746002,
                'harga_barang' => 5000000,
                'stok_barang' => 99,
                'image' => 'img/RnN6B7qlAt1MngPvi3CaYgWURKu1pk1csMRTKcCC.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 2,
                'nama_barang' => 'Mouse Gaming 189-G',
                'kode_barang' => 746003,
                'harga_barang' => 350000,
                'stok_barang' => 99,
                'image' => 'img/p0nRgyaqvDztgAZUkgjfvsYIlJ5FlR9TmA2zUJMU.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 1,
                'nama_barang' => 'Monitor Apple C092',
                'kode_barang' => 746004,
                'harga_barang' => 8000000,
                'stok_barang' => 99,
                'image' => 'img/0g6H9biIW01NIuM1hoYtk3yqTp5pGhBOUW7T2TSM.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 1,
                'nama_barang' => 'Monitor Gaming AG005',
                'kode_barang' => 746005,
                'harga_barang' => 3500000,
                'stok_barang' => 99,
                'image' => 'img/N7IFmwKk26VLTRSewXDNSkwWW0sQ4dQZQviCpV92.jpg',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 3,
                'nama_barang' => 'Keyboard Gaming C8',
                'kode_barang' => 746006,
                'harga_barang' => 2200000,
                'stok_barang' => 99,
                'image' => 'img/XdfjRTHnTUU0BcLKKGQXH5z76uewyAd4ZBo99Ikd.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 3,
                'nama_barang' => 'Keyboard Apple C092',
                'kode_barang' => 746007,
                'harga_barang' => 2400000,
                'stok_barang' => 99,
                'image' => 'img/0S32vvszynf4SAQTTtUiVCDlGQ82NeGOTOG0mBsL.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 2,
                'nama_barang' => 'Mouse Robot M206',
                'kode_barang' => 746008,
                'harga_barang' => 150000,
                'stok_barang' => 99,
                'image' => 'img/dgfzMpSy38GyNwj1ahnS6gBpFCaYrZuJ1ZpogHoB.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 1,
                'nama_barang' => 'Monitor Dell',
                'kode_barang' => 746009,
                'harga_barang' => 2800000,
                'stok_barang' => 99,
                'image' => 'img/9pv6GvEW4utKRmUmwiryxadMsVsQfcwxiwRrwO5p.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 3,
                'nama_barang' => 'Keyboard AZIO',
                'kode_barang' => 7460010,
                'harga_barang' => 500000,
                'stok_barang' => 99,
                'image' => 'img/bcqad09gXetcDIzhK0AUPXmrKNEQ4R47yZVSMAra.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 3,
                'nama_barang' => 'Keyboard Logitech',
                'kode_barang' => 7460011,
                'harga_barang' => 650000,
                'stok_barang' => 99,
                'image' => 'img/Fmy5zCxtTn6VrqBhAXlSywpDCbmBM5GIK20YZTss.jpg',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 1,
                'nama_barang' => 'Monitor Asus B010',
                'kode_barang' => 7460012,
                'harga_barang' => 10000000,
                'stok_barang' => 99,
                'image' => 'img/udqu3yYWgCxz354SGU8FZXhBpnIInQ0ZsZy9bvGN.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 4,
                'nama_barang' => 'Ipad Apple Pro, 256 GB',
                'kode_barang' => 7460013,
                'harga_barang' => 8000000,
                'stok_barang' => 99,
                'image' => 'img/SiN8cBaY7dHOEb6ddQWmNrB1wL2hxTpmmWzUvtLr.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 4,
                'nama_barang' => 'Ipad Samsung S7, 128 GB',
                'kode_barang' => 7460014,
                'harga_barang' => 3530000,
                'stok_barang' => 99,
                'image' => 'img/IuOM6Tz65rQO3yDEe55ZwbDIoR99oGDwfRkVLKnE.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 4,
                'nama_barang' => 'Ipad Apple Pro, 64 GB',
                'kode_barang' => 7460015,
                'harga_barang' => 5000000,
                'stok_barang' => 99,
                'image' => 'img/82UkLJD4LgoytuD4IUwl2RpWkibW1Edbin1RrWjN.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 4,
                'nama_barang' => 'Ipad Xiaomi, 256 GB',
                'kode_barang' => 7460016,
                'harga_barang' => 4000000,
                'stok_barang' => 99,
                'image' => 'img/6TJbc5HrmlK1CwQVGfp2R4oczywK8xJ4ugfX7TDT.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 4,
                'nama_barang' => 'Ipad Samsung, 32 GB',
                'kode_barang' => 7460017,
                'harga_barang' => 2500000,
                'stok_barang' => 99,
                'image' => 'img/MawlHAnEYN7E1PWYePdZZKf9Z2LqpC2k5hdlNbSj.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
            [
                'categories_id' => 4,
                'nama_barang' => 'Ipad Asus, 64 GB',
                'kode_barang' => 7460018,
                'harga_barang' => 1500000,
                'stok_barang' => 99,
                'image' => 'img/GkDkjzFPfqTQ5bYazvAoCzucJgK0gGaoT9XqrwSg.png',
                'user_id' => 1,
                'created_at' => '2024-02-29 11:44:37',
                'updated_at' => '2024-02-29 11:44:37',
            ],
        ]);

    }
}
