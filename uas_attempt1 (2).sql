-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 10:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_attempt1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin`
--

CREATE TABLE `ci_admin` (
  `id_admin` int(11) DEFAULT NULL,
  `nama_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_admin`
--

INSERT INTO `ci_admin` (`id_admin`, `nama_admin`) VALUES
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ci_dosen`
--

CREATE TABLE `ci_dosen` (
  `id_dosen` int(11) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_dosen`
--

INSERT INTO `ci_dosen` (`id_dosen`, `nama_dosen`, `id_matkul`, `id`) VALUES
(1, 'Rizal Amri', 2, 1),
(13, 'Shenhe', 3, 3),
(14, 'Ganyu', 4, 4),
(12, 'Cloud Retainer Xianyun', NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `ci_fakultas`
--

CREATE TABLE `ci_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_kelas`
--

CREATE TABLE `ci_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_kelas`
--

INSERT INTO `ci_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'D3TI01'),
(2, 'D3TI02'),
(3, 'D3TI03');

-- --------------------------------------------------------

--
-- Table structure for table `ci_krs`
--

CREATE TABLE `ci_krs` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `nilai` float DEFAULT NULL CHECK (`nilai` between 0 and 100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_mahasiswa`
--

CREATE TABLE `ci_mahasiswa` (
  `id_users` int(11) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `nim` varchar(10) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `alamat_mahasiswa` text DEFAULT NULL,
  `email_mahasiswa` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `tahun_masuk` year(4) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_mahasiswa`
--

INSERT INTO `ci_mahasiswa` (`id_users`, `nama_mahasiswa`, `nim`, `id_mahasiswa`, `alamat_mahasiswa`, `email_mahasiswa`, `password`, `prodi`, `fakultas`, `tahun_masuk`, `id_kelas`) VALUES
(2, 'Kamisato Ayaka', '1', 1, 'klaten', 'ayaka@gmail.com', 'ayaka', 'D3 Teknik Informatika', 'Ilmu Komputer', '2023', 2),
(4, 'Furina Fontainette', '2', 2, 'klaten', 'furina@gmail.com', 'furina', 'D3 Teknik Informatika', 'Ilmu Komputer', '2023', 1),
(NULL, 'Ei', '3', 6, 'klaten', 'ei@gmail.com', 'ei', 'D3 Teknik Informatika', 'Ilmu Komputer', '2023', 1),
(NULL, 'Xilonen', '4', 10, 'klaten', 'xilonen@gmail.com', 'xilonen', 'D3 Teknik Informatika', 'Ilmu Komputer', '2023', 2),
(NULL, 'Citlali', '5', 11, 'klaten', 'citlalli@gmail.com', 'citlali', 'D3 Teknik Informatika', 'Ilmu Komputer', '2023', 1),
(NULL, 'Lumine', '6', 23, 'Klaten', 'lumine@gmail.com', 'lumine', 'D3 Teknik Informatika', 'Ilmu Komputer', '2024', NULL);

--
-- Triggers `ci_mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `aim` AFTER INSERT ON `ci_mahasiswa` FOR EACH ROW insert into ci_users(id_users, username, nama_users, email_users, password, role) VALUES
(NEW.id_mahasiswa, new.nama_mahasiswa, new.nama_mahasiswa, new.email_mahasiswa, new.password, 'mahasiswa')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `aim2` AFTER INSERT ON `ci_mahasiswa` FOR EACH ROW BEGIN
    INSERT INTO ci_nilai (id_mahasiswa, id_matkul, nilai) 
    SELECT NEW.id_mahasiswa, id_matkul, 0
    FROM ci_matkul;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_matkul`
--

CREATE TABLE `ci_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_matkul`
--

INSERT INTO `ci_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `sks`, `semester`, `created_at`, `updated_at`) VALUES
(1, '001', 'Frontend Development', 4, 2, '2024-12-28 18:06:31', '2024-12-28 18:17:09'),
(2, '002', 'Backend Development', 4, 3, '2024-12-28 18:06:31', '2024-12-28 18:17:09'),
(3, '003', 'Algoritma dan Pemrograman', 4, 1, '2024-12-28 18:23:57', '2024-12-28 18:23:57'),
(4, '004', 'Sistem Operasi', 4, 1, '2024-12-28 18:23:57', '2024-12-28 18:23:57'),
(5, '005', 'Keamaanan Data dan Informasi', 4, 2, '2024-12-28 18:23:57', '2024-12-28 18:23:57'),
(6, '006', 'Rekayasa Perangkat Lunak', 4, 3, '2024-12-28 18:23:57', '2024-12-28 18:23:57');

--
-- Triggers `ci_matkul`
--
DELIMITER $$
CREATE TRIGGER `aimat` AFTER INSERT ON `ci_matkul` FOR EACH ROW BEGIN
    INSERT INTO ci_nilai (id_mahasiswa, id_matkul, nilai) 
    SELECT id_mahasiswa, NEW.id_matkul, 0 
    FROM ci_mahasiswa;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_nilai`
--

CREATE TABLE `ci_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL CHECK (`nilai` between 0 and 100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_nilai`
--

INSERT INTO `ci_nilai` (`id_nilai`, `id_mahasiswa`, `id_matkul`, `nilai`) VALUES
(25, 1, 1, 90),
(26, 1, 2, 80),
(27, 1, 3, 99),
(28, 1, 4, 65),
(29, 1, 5, 90),
(30, 1, 6, 98),
(31, 2, 1, 90),
(32, 2, 2, 90),
(33, 2, 3, 89),
(34, 2, 4, 70),
(35, 2, 5, 89),
(36, 2, 6, 99),
(37, 6, 1, 80),
(38, 6, 2, 90),
(39, 6, 3, 100),
(40, 6, 4, 60),
(41, 6, 5, 87),
(42, 6, 6, 97),
(43, 10, 1, 0),
(44, 10, 2, 0),
(45, 10, 3, 0),
(46, 10, 4, 0),
(47, 10, 5, 0),
(48, 10, 6, 0),
(50, 11, 1, 0),
(51, 11, 2, 0),
(52, 11, 3, 0),
(53, 11, 4, 80),
(54, 11, 5, 0),
(55, 11, 6, 0),
(133, 23, 1, 0),
(134, 23, 2, 0),
(135, 23, 3, 0),
(136, 23, 4, 0),
(137, 23, 5, 0),
(138, 23, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_prodi`
--

CREATE TABLE `ci_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email_users` varchar(250) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','dosen','mahasiswa') DEFAULT 'mahasiswa',
  `profile_picture` varchar(255) DEFAULT 'uploads/profile_photos/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id_users`, `nama_users`, `username`, `email_users`, `password`, `role`, `profile_picture`) VALUES
(1, 'Rizal Amri', 'rizal', 'rizal@gmail.com', '$2y$10$kb12ynLqPHPtj52b3axZ/OpD4MWrrIxWZNLnm2zJ8JHMYbXwiDiHu', 'dosen', 'uploads/profile_photos/e5ef04981cb9000b3dd226d578e1c003'),
(2, 'Kamisato Ayaka', 'ayaka', 'ayaka@gmail.com', '$2y$10$vSaZthvwHs3NJ2KKU6X.4e9EzdzKn7rHCRwxG9DgK.SmvOre996XG', 'mahasiswa', 'uploads/profile_photos/f90cff8328e2ae2cb4d572fdb73de529'),
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$10$XyLPjX9379RdWZ7B0SrHcOp7Aktz5PX/xaeWepMxBZ4IxlTgHnUuy', 'admin', 'uploads/profile_photos/aa428b15afdcc3e4e16b7793f4bee37c'),
(4, 'Furina Fontainette', 'focalors', 'furina@gmail.com', '$2y$10$.NjRU0SzRsbtS5acvZcTGewf6nKs6PgAjEV5D.d8Kr73OVNJpw6s2', 'mahasiswa', 'uploads/profile_photos/db4ef1b9913573536cba842266766eea'),
(6, 'Ei', NULL, 'ei@gmail.com', 'ei', 'mahasiswa', 'uploads/profile_photos/default.png'),
(10, 'Xilonen', 'Xilonen', 'xilonen@gmail.com', 'xilonen', 'mahasiswa', 'uploads/profile_photos/default.png'),
(11, 'Citlali', 'Citlali', 'citlalli@gmail.com', 'citlali', 'mahasiswa', 'uploads/profile_photos/default.png'),
(12, 'Cloud Retainer Xianyun', 'xianyun', 'xianyun@gmail.com', 'xianyun', 'dosen', 'uploads/profile_photos/4e623715469982988952a619fe4f4ac7'),
(13, 'Shenhe', 'shenhe', 'shenhe@gmail.com', 'shenhe', 'dosen', NULL),
(14, 'Ganyu', 'ganyu', 'ganyu@gmail.com', 'ganyu', 'dosen', NULL),
(23, 'Lumine', 'Lumine', 'lumine@gmail.com', 'lumine', 'mahasiswa', 'uploads/profile_photos/default.png');

--
-- Triggers `ci_users`
--
DELIMITER $$
CREATE TRIGGER `after_update_role` AFTER UPDATE ON `ci_users` FOR EACH ROW BEGIN
	IF old.role = 'admin' THEN
    	delete from ci_admin where id_admin = old.id_users;
    ELSEIF old.role = 'dosen' THEN
    	DELETE FROM ci_dosen where id_dosen = old.id_users;
    ELSEIF old.role = 'mahasiswa' then
    	DELETE FROM ci_mahasiswa where id_mahasiswa = old.id_users;
    end IF;
    
    IF new.role = 'admin' then 
    	insert into ci_admin (id_admin, nama_admin) values (new.id_users, new.nama_users);
    ELSEIF new.role = 'dosen' THEN
    	INSERT INTO ci_dosen (id_dosen, nama_dosen) values (new.id_users, new.nama_users);
	ELSEIF new.role = 'mahasiswa' then 
    	INSERT INTO ci_mahasiswa (id_mahasiswa, nama_mahasiswa) values (new.id_users, new.nama_users);
    end  if;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_admin`
--
ALTER TABLE `ci_admin`
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `ci_dosen`
--
ALTER TABLE `ci_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `fk_id_matkul` (`id_matkul`);

--
-- Indexes for table `ci_fakultas`
--
ALTER TABLE `ci_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `ci_kelas`
--
ALTER TABLE `ci_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `ci_krs`
--
ALTER TABLE `ci_krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `ci_mahasiswa`
--
ALTER TABLE `ci_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id_mahasiswa` (`id_users`),
  ADD KEY `fk_id_kelas` (`id_kelas`);

--
-- Indexes for table `ci_matkul`
--
ALTER TABLE `ci_matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `ci_nilai`
--
ALTER TABLE `ci_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `ci_prodi`
--
ALTER TABLE `ci_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_dosen`
--
ALTER TABLE `ci_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ci_fakultas`
--
ALTER TABLE `ci_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_kelas`
--
ALTER TABLE `ci_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_krs`
--
ALTER TABLE `ci_krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_mahasiswa`
--
ALTER TABLE `ci_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ci_matkul`
--
ALTER TABLE `ci_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ci_nilai`
--
ALTER TABLE `ci_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `ci_prodi`
--
ALTER TABLE `ci_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ci_admin`
--
ALTER TABLE `ci_admin`
  ADD CONSTRAINT `ci_admin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `ci_users` (`id_users`) ON DELETE CASCADE;

--
-- Constraints for table `ci_dosen`
--
ALTER TABLE `ci_dosen`
  ADD CONSTRAINT `ci_dosen_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `ci_users` (`id_users`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `ci_matkul` (`id_matkul`);

--
-- Constraints for table `ci_krs`
--
ALTER TABLE `ci_krs`
  ADD CONSTRAINT `ci_krs_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `ci_mahasiswa` (`id_users`),
  ADD CONSTRAINT `ci_krs_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `ci_matkul` (`id_matkul`);

--
-- Constraints for table `ci_mahasiswa`
--
ALTER TABLE `ci_mahasiswa`
  ADD CONSTRAINT `ci_mahasiswa_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `ci_users` (`id_users`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `ci_kelas` (`id_kelas`);

--
-- Constraints for table `ci_nilai`
--
ALTER TABLE `ci_nilai`
  ADD CONSTRAINT `ci_nilai_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `ci_matkul` (`id_matkul`),
  ADD CONSTRAINT `id_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `ci_mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
