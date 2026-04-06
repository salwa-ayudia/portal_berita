-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2026 at 07:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `views` int(11) DEFAULT 0,
  `id_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `gambar`, `tanggal`, `views`, `id_kategori`, `id_user`) VALUES
(3, 'Momen Prabowo dan Carmen Hearts2Hearts Pose Finger Heart di Korea', 'Cirebon, CIU -- Presiden Prabowo Subianto melakukan pertemuan dengan Carmen, member Hearts2Hearts asal Indonesia, di sela kunjungan kenegaraannya ke Korea Selatan pada Kamis (1/4).\r\n    \r\nMomen itu sempat diabadikan dalam unggahan Instagram resmi Presiden Korea Selatan, Lee Jae Myung. Dalam foto, Prabowo dan Lee Jae Myung mengapit Carmen, dan kompak melakukan pose simbol jari hati (finger heart) yang ikonis.\r\n\r\nCarmen mencatatkan prestasi sebagai Warga Negara Indonesia (WNI) pertama yang berhasil debut di bawah Big 3 agensi Korea, SM Entertainment.\r\n\r\nIa juga menjadi salah satu WNI yang hadir dalam jamuan makan siang kenegaraan di Blue House. Kehadiran Carmen jadi simbol kedekatan hubungan budaya kedua negara di tengah rangkaian agenda resmi kunjungan kepresidenan.\r\n\r\nPertemuan itu juga terjadi beberapa hari setelah Carmen bersama tujuh member Hearts2Hearts menyelesaikan fan meeting pertama mereka di Jakarta Indonesia.\r\n\r\nFan meeting bertajuk Hearts2House in Jakarta yang berlangsung Tennis Indoor Senayan pada Sabtu (28/3) itu menjadi penampilan tunggal girl group Korea tersebut di Indonesia.\r\n\r\nAcara tersebut pun juga terasa spesial karena bertepatan dengan hari ulang tahun ke-20 Carmen. Sehingga, idol bernama lengkap Nyoman Ayu Carmenita itu merayakannya bersama keluarga, member, dan fan di negaranya sendiri.\r\n\r\nSementara itu, di luar momen kebudayaan pertemuan Prabowo dan Carmen, kunjungan Prabowo ke Korea Selatan juga menghasilkan kesepakatan krusial dalam penguatan kerja sama bilateral.\r\n\r\nPrabowo dan Lee Jae Myung sepakat meningkatkan kemitraan menjadi Kemitraan Strategis Komprehensif Khusus (Special Comprehensive Strategic Partnership), menjadikan Indonesia sebagai satu-satunya negara di dunia yang menyandang status kemitraan tersebut dengan Korea Selatan.\r\n\r\nSelain penguatan status kemitraan, kunjungan ini juga ditandai dengan pertukaran 10 nota kesepahaman (MoU) di berbagai sektor.\r\n\r\nSebagai bentuk apresiasi tertinggi, Pemerintah Korea Selatan menganugerahkan penghargaan kehormatan \"The Grand Order of Mugunghwa\" kepada Presiden Prabowo Subianto, yang merupakan tanda kehormatan tertinggi di negara tersebut.', 'berita.png', '2026-04-02 14:30:46', 29, 1, 1),
(4, 'Berapa Lama APBN Mampu Tahan Kenaikan Harga BBM Saat Minyak Bergolak?', 'Pemerintah menyiapkan berbagai mitigasi dan antisipasi dalam menghadapi lonjakan harga minyak dunia imbas dari perang Iran melawan agresi Amerika Serikat (AS) dan Israel. Namun, menaikkan harga BBM tak jadi plihan.\r\n    \r\nMenteri Koordinator Bidang Perekonomian Airlangga Hartarto menyampaikan terdapat beberapa hal transformasi dan perubahan dalam menghadapi perkembangan dan dinamika global geopolitik saat ini, termasuk efisiensi dan realokasi anggaran.\r\n\r\n\"Khususnya dalam mitigasi dan antisipasi perkembangan dan dinamika global dan memanfaatkan momentum ini untuk melakukan transformasi dan perubahan. Program kebijakan ini disebut dengan 8 butir transformasi budaya kerja nasional, dan nanti ditambah kebijakan energi,\" ungkap Airlangga dalam konferensi pers secara daring di Seoul, Korea Selatan, Selasa (31/3).\r\n\r\nPemerintah menerapkan kerja dari rumah atau work from home (WFH) bagi aparatur sipil negara (ASN) satu hari seminggu setiap Jumat demi efisiensi energi. Kebijakan tersebut diperkirakan dapat menghemat Anggaran Pendapatan dan Belanja Negara (APBN) hingga Rp6,2 triliun. Sementara, total pembelanjaan bahan BBM masyarakat yang berpotensi dihemat mencapai Rp59 triliun.\r\n\r\nPemerintah juga melakukan langkah strategis dalam pengelolaan keuangan negara, melalui prioritasisasi dan refocusing belanja Kementerian/Lembaga (K/L) dalam rentang Rp121,2 triliun hingga Rp130,2 triliun. Belanja yang kurang prioritas, seperti perjalanan dinas, rapat, belanja non-operasional, dan kegiatan seremonial, dipangkas.\r\n\r\nKemudian, pelaksanaan program Makan Bergizi Gratis (MBG) juga diubah menjadi sedang lima hari dalam sepekan. Penghematannya sekitar Rp20 triliun.\r\n\r\nDengan berbagai strategi itu, seberapa lama pemerintah mampu menahan kenaikan harga BBM agar APBN tak jebol?\r\n\r\nAnalis Senior Indonesia Strategic and Economic Action Institution Ronny P Sasmita menjelaskan secara teknis persoalannya bukan soal mampu atau tidak, tetapi seberapa mahal harga yang harus dibayar karena menunda berhadapan langsung dengan realitas.\r\n\r\nRonny menilai realokasi anggaran hanya memberi napas pendek, apakah hanya hitungan minggu atau bulan, tergantung seberapa besar deviasi harga minyak dari asumsi APBN. Subsidi dan kompensasi energi bekerja seperti kebocoran fiskal yang tidak terlihat, tetapi pasti terus membesar.\r\n\r\n\"Jadi kalau harga global bertahan tinggi, ruang fiskal akan cepat tergerus. Pemerintah dihadapkan pada pilihan klasik antara menambah utang, memangkas belanja lain, atau akhirnya menaikkan harga BBM juga. Dengan kata lain, kebijakan ini lebih mirip menunda kenaikan daripada mencegah kenaikan,\" ujar Ronny kepada CNNIndonesia.com, Rabu (1/4).', 'berita1.jpeg', '2026-04-02 14:48:54', 18, 5, 1),
(5, 'Daftar Fitur Baru WhatsApp di 2026, Meta AI Hingga Bantuan Menulis', 'CIU News -- WhatsApp terus memberikan pembaruan fitur untuk mendukung aktivitas berkirim pesan penggunanya. Simak beberapa fitur baru WhatsApp yang bisa dimanfaatkan di 2026.\r\n    \r\nPerusahaan menyadari obrolan WhatsApp menjadi catatan momen penting: percakapan dengan keluarga, tawa bersama teman, foto dan video yang terus dibagikan.\r\n\r\n\"Untuk membantu Anda memaksimalkan semuanya, kami meluncurkan cara baru agar WhatsApp lebih mudah digunakan, baik untuk membantu tetap terorganisir, membagi waktu antara pekerjaan dan pribadi, atau mendapatkan hasil maksimal dari setiap obrolan,\" tulis WhatsApp dalam keterangannya, Jumat (27/3).\r\n\r\nBerikut adalah fitur-fitur terbaru WhatsApp pada awal 2026.\r\n\r\nMENGOSONGKAN RUANG PENYIMPANAN\r\nPenggunaan WhatsApp dalam periode sangat lama akan membebani memori ponsel. Salah satu cara mengurangi konsumsi penyimpanan tersebut adalah dengan menghapus file, khususnya yang berukuran besar.\r\n\r\nKini WhatsApp memiliki fitur yang membuat pengguna bisa menemukan dan menghapus file besar secara langsung dalam obrolan sehingga pengguna bisa menghapus hal yang tidak diperlukan tanpa menghapus seluruh percakapan.\r\n\r\nPengguna hanya perlu ketuk nama obrolan, lalu pilih Kelola Penyimpanan. Pengguna juga bisa memilih untuk hanya membersihkan file media ketika membersihkan obrolan sehingga riwayat obrolan tetap tersimpan.\r\n\r\nTRANSFER CHAT LINTAS PLATFORM\r\nBagi pengguna yang ingin pindah perangkat lintas platform seperti dari iOS ke Android, WhatsApp juga memiliki fitur transfer obrolan. Dengan proses yang mudah, pengguna bisa memindahkan percakapan, foto, dan video yang terdapat di obrolan WhatsApp.\r\n\r\nDUA AKUN DI SATU HP\r\nKemudian, fitur dua akun dalam satu ponsel kini diperluas ke perangkat iOS. Kini pengguna bisa memiliki dua akun WhatsApp sekaligus dalam satu perangkat iOS, sehingga tak perlu lagi repot membawa dua ponsel jika ingin memisahkan akun personal dan profesional.\r\n    \r\nREKOMENDASI STIKER\r\nWhatsApp juga kini memberikan fitur rekomendasi stiker ketika Anda tengah terlibat dalam obrolan. Ketika Anda mengetik emoji, WhatsApp akan menyarankan stiker yang sesuai dengan emoji tersebut.\r\n\r\nPERCANTIK FOTO DENGAN META AI\r\nLebih lanjut, kini pengguna juga bisa menggunakan Meta AI untuk mempercantik foto secara langsung di obrolan sebelum mengirimnya.\r\n\r\nHal ini akan memudahkan pengguna menghapus sesuatu yang mengganggu, mengganti latar belakang baru, atau menerapkan gaya yang seru.\r\n\r\nWhatsApp mengatakan fitur Meta AI ini mungkin belum tersedia bagi semua pengguna.\r\n\r\nBANTUAN MENULIS META AI\r\nFitur AI lainnya adalah bantuan menulis yang bisa membuat draf tanggapan yang disarankan berdasarkan percakapan. Fitur ini sedang dalam tahap peluncuran dan akan segera tersedia bagi semua pengguna.', 'berita2.png', '2026-04-02 14:58:17', 62, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Hiburan'),
(2, 'Gaya Hidup'),
(3, 'Teknologi'),
(4, 'Olahraga'),
(5, 'Ekonomi'),
(6, 'Nasional'),
(7, 'Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
