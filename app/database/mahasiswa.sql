-- Hapus tabel jika sudah ada
DROP TABLE IF EXISTS mahasiswa;

-- Membuat ulang tabel mahasiswa dengan id AUTO_INCREMENT
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nirm VARCHAR(20) NOT NULL UNIQUE,
    kelas VARCHAR(10) NOT NULL,
    Jurusan VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Menambahkan data awal
INSERT INTO mahasiswa (nama, nirm, kelas, Jurusan) VALUES
('Alfin F', '2022020081', '6SIA1', 'Sistem Informasi'),
('Nifla A', '2022020082', '6SIA1', 'Sistem Informasi');
