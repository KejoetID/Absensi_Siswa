
-- Tabel untuk data siswa
CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nisn VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    wali_kelas VARCHAR(100) NOT NULL
);

INSERT INTO siswa (nisn, nama, kelas, wali_kelas) VALUES
('2022020081', 'Alfin Fahreza', '9A', 'Budi Santoso');


-- Tabel untuk riwayat absensi
CREATE TABLE absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nisn VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    mata_pelajaran VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    sesi INT NOT NULL,
    keterangan ENUM('Hadir', 'Sakit', 'Izin', 'Alpha') NOT NULL
);

INSERT INTO absensi (nisn, nama, mata_pelajaran, tanggal, sesi, keterangan) VALUES
('2022020081', 'Alfin Fahreza', 'Matematika', '2024-02-05', 1, 'Hadir'),
('2022020081', 'Alfin Fahreza', 'Bahasa Indonesia', '2024-02-06', 2, 'Sakit'),
('2022020081', 'Alfin Fahreza', 'Fisika', '2024-02-07', 1, 'Hadir'),
('2022020081', 'Alfin Fahreza', 'Kimia', '2024-02-08', 2, 'Alpha'),
('2022020081', 'Alfin Fahreza', 'Biologi', '2024-02-09', 1, 'Izin'),
('2022020081', 'Alfin Fahreza', 'Sejarah', '2024-02-10', 2, 'Hadir'),
('2022020081', 'Alfin Fahreza', 'Seni Budaya', '2024-02-11', 1, 'Hadir'),
('2022020081', 'Alfin Fahreza', 'Pendidikan Kewarganegaraan', '2024-02-12', 2, 'Sakit'),
('2022020081', 'Alfin Fahreza', 'Informatika', '2024-02-13', 1, 'Alpha'),
('2022020081', 'Alfin Fahreza', 'Bahasa Inggris', '2024-02-14', 2, 'Hadir');
