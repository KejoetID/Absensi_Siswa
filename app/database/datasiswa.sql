DROP TABLE IF EXISTS Absensi;

CREATE TABLE Absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nisn VARCHAR(100) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    wali_kelas VARCHAR(100) NOT NULL
);



INSERT INTO Absensi (nama, nisn, kelas, wali_kelas) VALUES
('Budi Santoso', '202202001', '7A', 'Pak Rahmat'),
('Siti Aminah', '202202002','7B', 'Bu Sari'),
('Dian Prasetyo', '202202003', '8A', 'Pak Joko'),
('Rina Kusuma', '202202004','8B', 'Bu Ani');
