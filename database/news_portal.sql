-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2025 pada 01.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image_url`, `category`, `created_at`) VALUES
(1, 'Breaking News: Economy Update', 'The economy is showing signs of recovery...', 'https://via.placeholder.com/300', 'economy', '2025-04-03 18:24:13'),
(2, 'Sports Highlights: Football Finals', 'The finals were thrilling with a last-minute goal...', 'https://via.placeholder.com/300', 'sports', '2025-04-03 18:24:13'),
(3, 'Technology Trends 2023', 'Discover the latest trends in technology...', 'https://via.placeholder.com/300', 'technology', '2025-04-03 18:24:13'),
(4, 'National News: Election Updates', 'The latest updates on the national elections...', 'https://via.placeholder.com/300', 'national', '2025-04-03 18:24:13'),
(5, 'International News: Global Summit', 'World leaders gather for the annual summit...', 'https://via.placeholder.com/300', 'international', '2025-04-03 18:24:13'),
(6, 'Bentrok Warga Desa di Maluku Tengah, Satu Polisi Tewas Tertembak', 'Seorang anggota Polsek Wahai Bripka Husni Abdullah tewas tertembak saat melerai bentrok antar Desa Sawai dan Desa Masihulan, Kecamatan Seram Utara, Kabupaten Maluku Tengah, Maluku.\r\n\"Aparat kena tembak, mundur sudah,\"kata seorang anggota di lokasi bentrok, Kamis (3/4).\r\n\r\nDalam video berdurasi 6 detik tersebut memperlihatkan Bripka Husni Abdullah tewas tertembak bersimbah darah terbaring di tengah jalan. Beberapa anggota TNI bersenjata lengkap berusaha menyelamatkan Bripka Husni Abdullah.\r\n\r\nSementara anggota lain mencari tempat perlindungan.\r\n\r\n\"Iya benar ada anggota yang jadi korban tadi,\" ujar Kabid Humas Polda Maluku, Kombes Pol Aries Aminullah, saat dikonfirmasi CNNIndonesia.com, Kamis (3/4).\r\n\r\nBentrokan Antar Kampung di Maluku Tengah: Satu Tewas, Dua Luka\r\nAries menuturkan pihaknya masih melakukan koordinasi dengan Kapolres Maluku Tengah terkait bentrokan tersebut. Ia juga belum merincikan secara detail terkait motif bentrokan yang menewaskan anggota Polsek Wahai.\r\n\r\n\"Belum ada info yang mendetail, masih konfirmasi dengan Kapolres,\" katanya.\r\n\r\nAparat TNI-Polri bersenjata lengkap yang tiba di lokasi sempat melerai massa yang berdatangan dengan peralatan perang di perbatasan. Aparat meminta massa segera mundur dan tidak saling serang.', 'https://akcdn.detik.net.id/visual/2020/04/05/7681bedb-dbfa-4cbc-aa13-656b9b263e5f_169.jpeg?w=650&q=90', 'national', '2025-04-03 22:47:43'),
(7, 'Paloh Ungkap Alasan NasDem Tak Masuk Kabinet Prabowo: Ada Budaya Malu', 'Ketua Umum Partai NasDem Surya Paloh mengungkapkan alasan kadernya tak ada yang menjadi di Kabinet Merah Putih Presiden Prabowo Subianto.\r\n\"Kenapa kami tidak ada dalam kabinet rezim Prabowo? Karena kami tahu diri, ada budaya malu lah bagi kami,\" kata Paloh di Denpasar, Bali, Kamis (3/4), dikutip dari Antara.\r\n\r\nPaloh mengingatkan kepada kadernya bahwa semasa Pilpres 2024 mereka tidak mengusung pasangan Prabowo-Gibran sehingga tidak etis partainya mendapat posisi dalam kabinet.\r\n\r\n\"Saat ini NasDem tahu diri, memahami sepenuhnya NasDem memang tidak pantas untuk berada di dalam lapisan mengisi anggota kabinet karena memang kami tidak berjuang banyak,\" ujarnya.\r\n\r\n\"Maka, inilah konsekuensi politik yang harus kami buktikan, NasDem tahu diri, ada budaya malu,\" sambungnya.\r\n\r\nMeski tak masuk kabinet, NasDem tak menjadi partai oposisi. Paloh menjamin NasDem tetap mendukung dan memberi bantuan ke pemerintah meski kontribusinya terbatas.\r\n\r\n\"Bukan berarti kami anti, kami tidak suka, melainkan komitmen nilai-nilai moralitas, esensi perubahan kami perjuangkan, perilaku sikap kami buktikan, saya mau pikiran-pikiran ini terus berlanjut,\" katanya.\r\n\r\nPaloh mengaku partainya sempat ditawari posisi menteri, namun menolak sebagai pembuktian bahwa tidak semua partai politik di Indonesia mabuk kekuasaan.\r\n\r\nIa lantas mencontohkan dari sektor ekonomi. Ketika stabilitas ekonomi baik, akan didukung. Namun, ketika stabilitas ekonomi terganggu, tak dapat diam dan harus ikut waspada.\r\n\r\nPaloh terakhir bertemu Prabowo pada awal November 2024. Paloh dan Prabowo tak jadi bertemu saat acara buka puasa NasDem lantaran Prabowo memiliki agenda di Istana Jakarta.\r\n\r\n(fra/antara/fra)', 'https://akcdn.detik.net.id/visual/2024/08/28/penutupan-kongres-iii-partai-nasdem-7_169.jpeg?w=650&q=90', 'national', '2025-04-03 22:49:26'),
(8, 'Satu Jenazah Korban Longsor Mojokerto Ditemukan', 'Satu korban longsor di jalur Pacet-Cangar, Mojokerto, Jawa Timur (Jatim) ditemukan. Namun, korban diperkirakan berjumlah lebih dari satu, mengingat kendaraan yang tertimpa longsoran berjumlah dua.\r\n\r\nSatu korban tanah longsor di Mojokerto yang baru ditemukan ini diketahui berjenis kelamin laki-laki. Sedangkan, identitas jenazah, hingga kini masih dalam pencarian.\r\n\r\nTim Sar Gabungan polisi, TNI, BPBD Kabupaten Mojokerto, BPBD Batu, dan Basarnas Unit Malang Raya melihat pintu mobil Innova sekitar pukul 15.40 WIB.\r\n\r\nPosisi Innova terbalik dan tertimbun material longsor. Setelah pintu berhasil dibuka, didapati pengemudi mobil dalam kondisi meninggal dunia.\r\n\r\n\"Posisi driver meninggal dunia. Mobilnya terbalik, roda di atas,\" ujar Koordinator Basarnas Unit Malang Raya Yoni Fariza, Kamis (3/4).\r\n\r\nMobil Innova tersebut juga tertimbun, berupa lumpur dan dua batu besar di bagian kabinnya. Dua batu besar yang menimpa itu baru akan diupayakan diangkat pada Jumat esok.\r\n\r\nTerkait identitas korban yang sudah ditemukan belum teridentifikasi. Jenazah korban dibawah ke RSUD Sumberglagah, Pacet, Kabupaten Mojokerto.\r\n\r\nSementara itu, terkait posisi mobil Pikap Grand Max juga sudah diketahui beserta posisi penumpangnya.\r\n\r\nNamun, korban belum bisa dievakuasi karena terkendala kontur tanah yang labil, hujan dan membutuhkan alat tambahan.\r\n\r\n\r\n\"Yang di Grand Max ada [korban]. Tapi belum bisa terevakuasi,\" ujarnya.\r\n\r\nLebih lanjut, sejauh ini, Yoni belum bisa memastikan berapa jumlah pasti korban dan kendaraan yang tertimpa longsor ini.', 'https://akcdn.detik.net.id/visual/2025/04/03/jalur-pacet-cangar-mojokerto-longsor-dua-mobil-tertimpa-jalur-terputus-1743677420575_169.jpeg?w=650&q=90', '', '2025-04-03 23:10:33'),
(9, 'Pacar Tewas Ditusuk Gara-gara Diduga Pakai Uang Buat Judi Slot', 'Charles Leo Putra (39), pria asal Payakumbuh Sumatera Barat tewas di tangan kekasihnya Fania Putri (25), akibat ditusuk menggunakan pisau dapur di bagian dada di kos - kosan yang ada di Baloi Blok V, Lubuk Baja, Kota Batam, Kepulauan Riau Kamis (3/4).\r\nKorban yang terluka dan berdarah, sempat dilarikan ke rumah sakit oleh kekasihnya. Namun, nyawa korban tidak tertolong. Sebelum pelaku tewas, mereka sempat berkelahi di kos - kosan meski dilerai oleh penghuni kos lainnya.\r\n\r\nKendati perkelahian tetap berlanjut hingga pelaku mengambil pisau dapur menusuk korban di bagian dada. Pelaku mengaku kesal terhadap korban, lantaran uang hasil kerjanya sebagai pemandu karaoke digunakan untuk judi slot.\r\n\r\n\"Pelaku dan korban pacaran, untuk motif masih didalami lebih lanjut,\" ujar Kapolres Barelang Kombes Pol Zainal Arifin kepada Wartawan, Kamis (3/4).\r\n\r\nLebih lanjut, dia mengatakan sebelum berkelahi mereka sempat cek - cok dan sang wanita kekasih korban terbawa emosi sesaat. Saat ini, pelaku sudah diamankan jajaran Polsek Lubuk Baja dan Satreskrim Polresta Barelang.\r\n\r\n\"Jajaran Polsek Lubuk Baja, di backup Reskrim sudah mengamankan Pelaku,\" Ujarnya.\r\n\r\nSebelumnya, Kamis dini hari (3/4) penghuni kos dihebohkan perkelahian antara pelaku dan korban hingga korban tewas akibat ditusuk dengan pisau dapur. Perkelahian keduanya terekam CCTV atau kamera pengawas.', 'https://akcdn.detik.net.id/visual/2019/10/10/6093733d-241e-45c5-9488-7edcc3ec95f7_169.jpeg?w=650&q=90', 'national', '2025-04-03 23:10:33'),
(10, 'Viral Polisi di Labusel Sulteng Dituding Pesta Narkoba, Polisi Selidik', 'Unggahan terkait oknum perwira pertama (pama) Polres Labuhanbatu Selatan (Labusel), Sumut, Iptu CS yang disebut melakukan pesta narkoba hingga terlibat dalam jaringan peredaran barang haram itu viral di media sosial.\r\nUnggahan  itu pertama kali muncul di akun Facebook Putri Tanjung. Akun tersebut menyebutkan dugaan pesta narkoba dan praktik-praktik tak terpuji lainnya melibatkan Iptu CS. Belakangan unggahan itu telah dihapus.\r\n\r\nKemudian narasi serupa diunggah ulang oleh akun Facebook Lacin Lacin, yang meminta pihak berwenang untuk memeriksa kebenaran informasi tersebut. Unggahan itupun diberitakan di berbagai media lokal.\r\n\r\nKasi Propam Polres Labusel, AKP DP Tarigan didampingi Kasi Humas AKP Sujono mengatakan pihaknya telah melakukan penyelidikan terkait unggahan viral itu. Hasilnya Iptu CS tidak terbukti mengonsumsi narkoba.\r\n\r\n\"Hasil tes urine yang kita lakukan terhadap oknum yang bersangkutan menunjukkan negatif narkoba,\" kata AKP DP Tarigan, Kamis (3/4/2025) malam.\r\n\r\nAKP DP Tarigan menyebutkan, penyelidikan dugaan keterlibatan narkoba Iptu CS dilakukan atas perintah Kapolres Labusel AKBP Aditya SP Sembiring.\r\n\r\n\"Langkah awal penyelidikan, kami (Kasi) Propam Polres Labusel melaksanakan pemanggilan terhadap Iptu CS dan istrinya, HP,\" ungkap AKP DP Tarigan.\r\n\r\nKemudian, pada Rabu (2/4/2025), Unit Paminal Polres Labusel, tambahnya, melakukan patroli cyber dan menemukan akun Facebook milik Putri Tanjung yang berisi narasi yang menyudutkan Iptu CS.\r\n\r\n\"Selanjutnya, Kamis (3/4), pukul 12.00 WIB, dilakukan tes urine terhadap Iptu CS di ruang Provos Propam Polres Labusel, dan menunjukkan hasil negatif amphetamine,\" urainya.\r\n\r\nSelain itu, tambahnya, pada Selasa (1/4/2025), Iptu CS sedang melaksanakan pengembangan kasus dugaan pembunuhan yang terjadi di wilayah hukum Polsek Silangkitang, dan pelakunya berhasil diamankan.\r\n\r\n\"Foto-foto yang diunggah oleh Putri Tanjung di akun Facebook-nya adalah foto lama dan narasi yang diungkapkan tidaklah benar,\" sebutnya.\r\n\r\nTak hanya itu, polisi juga melakukan klarifikasi terhadap HP yang tak lain istri dari Iptu CS. Meski begitu, HP tidak mempermasalahkan viralnya unggahan tersebut.\r\n\r\n\"Istri Iptu CS, HP juga memberikan klarifikasi, mengetahui tentang pemberitaan tersebut, namun tidak mempermasalahkannya dan tetap memberikan dukungan moral kepada suaminya untuk terus menjalankan tugasnya,\" jelas AKP DP Tarigan.\r\n\r\nAKP DP Tarigan menegaskan Polres Labusel akan memanggil Putri Tanjung untuk dimintai keterangan lebih lanjut. Selain itu, penyidik akan melakukan klarifikasi atas pemberitaan di berbagai media yang telah memuat berita tersebut.\r\n\r\n\"Berdasarkan hasil penyelidikan, tes urine yang menunjukkan hasil negatif, serta keterangan yang diterima dari pihak terkait, dapat disimpulkan narasi yang beredar melalui akun Facebook Putri Tanjung dan pemberitaan media online tidak terbukti kebenarannya,\" tuturnya.\r\n\r\nAKP DP Tarigan menambahkan, polisi tetap komitmen dan konsisten dalam pemberantasan narkoba. Kepolisian sangat mengharapkan bantuan masyarakat untuk menindak pelaku narkoba.\r\n\r\n\"Siapa pun yang terlibat dalam peredaran dan penyalahgunaan narkoba, tanpa terkecuali, termasuk personel kepolisian, pasti kita tindak sesuai dengan ketentuan hukum yang berlaku,\" pungkasnya', 'https://akcdn.detik.net.id/visual/2025/03/30/banjir-di-jambi-1743325686460_169.jpeg?w=650&q=90', 'national', '2025-04-03 23:10:33'),
(11, 'Polresta Banyuwangi Proyeksi Puncak Arus Balik di Ketapang 5-7 April', 'Kepolisian Resor Kota (Polresta) Banyuwangi, Jawa Timur, memprediksi puncak arus balik lebaran 2025 jatuh pada 5, 6, dan 7 April 2025.\r\n\"Selama puncak arus balik Lebaran, sekitar 25 ribu kendaraan roda empat dan roda dua per hari menyeberang dari Pelabuhan Ketapang ke Gilimanuk,\" ujar perusahaan dalam keterangan resmi.\r\n\r\nKapolresta Banyuwangi Komisaris Besar Polisi Rama Samtama Putra menyebutkan selama tiga hari pada 5, 6, dan 7 April 2025 kendaraan roda empat dan roda dua yang akan menyeberang ke Gilimanuk melalui Pelabuhan Ketapang diperkirakan mencapai 25 ribu kendaraan per hari.\r\n\r\n\"Pada hari ini (H+2 Lebaran) hasil pemantauan kami di Pelabuhan Ketapang, kendaraan roda empat dan roda dua yang menyeberang ke Gilimanuk (Bali) ada sekitar 3.000 kendaraan,\" terangnya kepada wartawan usai memantau arus balik di Pelabuhan Ketapang, Banyuwangi,\" terangnya malam.\r\n\r\nPolisi Selidik\r\nUntuk mengantisipasi penumpukan kendaraan di pelabuhan pada puncak arus balik, pihaknya telah melakukan simulasi rekayasa lalu lintas, dengan mengalihkan kendaraan dari arah Banyuwangi kota melalui jalan lingkar, termasuk kendaraan dari arah Situbondo ke Banyuwangi.\r\n\r\n\"Tadi kami sudah melaksanakan simulasi, pintu keluar pelabuhan kendaraan bisa langsung ke arah Situbondo maupun ke Banyuwangi kota,\" terangnya.\r\n\r\nIa juga menyampaikan jika terjadi kepadatan kendaraan di pelabuhan akan diberlakukan sistem penundaan dengan mengarahkan kendaraan ke beberapa zona penyangga (kantong parkir) di Wisata Pantai Grand Watudodol dan Terminal Sritanjung (kendaraan dari arah Situbondo), dan zona penyangga di parkir ASDP Bulusan (kendaraan dari arah Banyuwangi kota).\r\n\r\n\"Jika terjadi kepadatan, kami alihkan ke kantong-kantong parkir secara berjenjang,\" kata Rama.\r\n\r\nIa menambahkan penerapan Surat Keputusan Bersama (SKB) pembatasan angkutan barang arus mudik Lebaran 2025 masih berlaku hingga 8 April mendatang.\r\n\r\nDalam hal itu, kendaraan sumbu tiga tidak boleh melintas, kecuali truk angkutan logistik dan bahan bakar minyak.', 'https://akcdn.detik.net.id/visual/2024/04/06/arus-mudik-lebaran-di-pelabuhan-gilimanuk-bali-1_169.jpeg?w=650&q=90', 'national', '2025-04-03 23:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_photo`, `created_at`) VALUES
(5, 'apis', 'apis@gmail.com', '$2y$10$UVkV2YX9T7YGnfdVF8T04ulYa1eqS.82bciyFZTBXzjLHeHOnot2a', 'uploads/67ef0f8b301d5_Gambar WhatsApp 2025-01-26 pukul 18.59.02_9bd0651d.jpg', '2025-04-03 22:45:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
