-- Migration SQL untuk UD Chandra Furniture
CREATE TABLE IF NOT EXISTS barang (
    idBarang INT AUTO_INCREMENT PRIMARY KEY,
    tipe VARCHAR(50) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    stok INT NOT NULL,
    satuan VARCHAR(20) NOT NULL,
    harga DECIMAL(15,2) NOT NULL,
    status ENUM('active','nonactive') DEFAULT 'active'
);

CREATE TABLE IF NOT EXISTS employee (
    idEmployee INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    telp VARCHAR(20),
    salary DECIMAL(15,2) DEFAULT 0,
    status ENUM('active','nonactive') DEFAULT 'active'
);

CREATE TABLE IF NOT EXISTS role (
    idRole INT AUTO_INCREMENT PRIMARY KEY,
    idEmployee INT NOT NULL,
    role ENUM('admin','manager','employee') NOT NULL,
    FOREIGN KEY (idEmployee) REFERENCES employee(idEmployee) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS shipment (
    idShipment INT AUTO_INCREMENT PRIMARY KEY,
    idRole INT NOT NULL,
    tujuan VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    deskripsi TEXT,
    totalHarga DECIMAL(15,2) NOT NULL,
    FOREIGN KEY (idRole) REFERENCES role(idRole) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS detailshipment (
    idDetail INT AUTO_INCREMENT PRIMARY KEY,
    idShipment INT NOT NULL,
    idBarang INT NOT NULL,
    jumlah INT NOT NULL,
    jumlahHarga DECIMAL(15,2) NOT NULL,
    FOREIGN KEY (idShipment) REFERENCES shipment(idShipment) ON DELETE CASCADE,
    FOREIGN KEY (idBarang) REFERENCES barang(idBarang) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS keuangan (
    idKeuangan INT AUTO_INCREMENT PRIMARY KEY,
    totalIncome DECIMAL(15,2) DEFAULT 0,
    totalOutcome DECIMAL(15,2) DEFAULT 0,
    profit DECIMAL(15,2) DEFAULT 0
);

CREATE TABLE IF NOT EXISTS logbook (
    idLogbook INT AUTO_INCREMENT PRIMARY KEY,
    totalUang DECIMAL(15,2) NOT NULL,
    deskripsi TEXT,
    type ENUM('income','outcome') NOT NULL,
    tanggal DATE NOT NULL,
    idKeuangan INT,
    FOREIGN KEY (idKeuangan) REFERENCES keuangan(idKeuangan) ON DELETE SET NULL
); 