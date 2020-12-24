#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` char(10) NOT NULL,
  `Nama` varchar(20) DEFAULT NULL,
  `Alamat` text,
  `Email` varchar(20) DEFAULT NULL,
  `Nohp` char(13) DEFAULT NULL,
  `Jenis_Kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sandi` varchar(50) NOT NULL,
  `level` enum('Client','Admin') DEFAULT NULL,
  `status` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO users (`id`, `Nama`, `Alamat`, `Email`, `Nohp`, `Jenis_Kelamin`, `username`, `password`, `sandi`, `level`, `status`) VALUES ('1517665175', 'ucup', 'Bogor', 'ucup@gmail.com', '(082) 991-901', 'Laki-Laki', 'ucup', '1e17778d0d8217b035daffba02c06054', 'ucup', 'Client', '1');
INSERT INTO users (`id`, `Nama`, `Alamat`, `Email`, `Nohp`, `Jenis_Kelamin`, `username`, `password`, `sandi`, `level`, `status`) VALUES ('1517665403', 'jaki efendi', 'Bogor', 'jaki@gmail.com', '(089) 188-199', 'Laki-Laki', 'Jaki', '92ab1583c4542e6ea322221231aeffe4', 'jaki', 'Client', '1');
INSERT INTO users (`id`, `Nama`, `Alamat`, `Email`, `Nohp`, `Jenis_Kelamin`, `username`, `password`, `sandi`, `level`, `status`) VALUES ('1517745919', 'Ranu', 'Bogor', 'admin@gmail.com', '(089) 128-812', 'Laki-Laki', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin', '1');
INSERT INTO users (`id`, `Nama`, `Alamat`, `Email`, `Nohp`, `Jenis_Kelamin`, `username`, `password`, `sandi`, `level`, `status`) VALUES ('1517819648', 'ranu pirmansyah', 'Bogor', 'ranu@gmail.com', '(089) 507-172', 'Laki-Laki', 'ranu', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin', '0');
INSERT INTO users (`id`, `Nama`, `Alamat`, `Email`, `Nohp`, `Jenis_Kelamin`, `username`, `password`, `sandi`, `level`, `status`) VALUES ('1518926179', 'ranu', 'Bogor', 'ranu@gmail.com', '(089) 128-188', 'Laki-Laki', 'cuank', '0fcb6320922db86a6302ba2e91cfa5b3', 'ranu', 'Client', '0');


