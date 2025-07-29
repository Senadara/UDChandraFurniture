-- Seeder SQL untuk UD Chandra Furniture
INSERT INTO barang (tipe, nama, stok, satuan, harga, status) VALUES
('bahan baku', 'Kayu Jati', 100, 'batang', 500000, 'active'),
('bahan jadi', 'Meja Makan', 20, 'unit', 1500000, 'active'),
('bahan jadi', 'Kursi Tamu', 30, 'unit', 750000, 'active');

INSERT INTO employee (nama, email, password, telp, salary, status) VALUES
('Admin Utama', 'admin@chandra.com', 'admin123', '08123456789', 5000000, 'active'),
('Budi Santoso', 'budi@chandra.com', 'budi123', '08129876543', 3500000, 'active');

INSERT INTO role (idEmployee, role) VALUES
(1, 'admin'),
(2, 'employee');

INSERT INTO shipment (idRole, tujuan, tanggal, deskripsi, totalHarga) VALUES
(1, 'Surabaya', '2024-06-01', 'Pengiriman Meja ke Surabaya', 3000000),
(2, 'Malang', '2024-06-02', 'Pengiriman Kursi ke Malang', 2250000);

INSERT INTO detailshipment (idShipment, idBarang, jumlah, jumlahHarga) VALUES
(1, 2, 2, 3000000),
(2, 3, 3, 2250000);

INSERT INTO keuangan (totalIncome, totalOutcome, profit) VALUES
(10000000, 4000000, 6000000),
(15000000, 5000000, 10000000);

INSERT INTO logbook (totalUang, deskripsi, type, tanggal, idKeuangan) VALUES
(3000000, 'Penjualan Meja', 'income', '2024-06-01', 1),
(2250000, 'Penjualan Kursi', 'income', '2024-06-02', 2),
(1000000, 'Pembelian Kayu', 'outcome', '2024-06-03', 1); 