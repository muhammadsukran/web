CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    nomor_hp VARCHAR(20) NOT NULL,
    note TEXT,
    waktu_tgl TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
