CREATE TABLE `userSiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(20) NOT NULL UNIQUE,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `userSiswa` (`nisn`, `nama`, `password`) VALUES
('2022020081', 'Alfin Fahreza', '$2y$10$djXua.hhO3lfVjk/2rU4FO.zTtJ0fib7fBZSVmp5b0Ec1FNTWzysa');