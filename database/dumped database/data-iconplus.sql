-- Insert data untuk table Users
INSERT INTO `roles` (`ID_ROLE`, `CRM_ROLE`, `DESKRIPSI`) VALUES (NULL, 'Admin', 'memiliki peran dalam mengelola pengguna, SBU, Menu , Menambah produk, dll');

INSERT INTO `roles` (`ID_ROLE`, `CRM_ROLE`, `DESKRIPSI`) VALUES (NULL, 'Sales', 'Memiliki peran dalam mengelola Lead, Opportunity, Agreement. Role ini bertanggun jawab dalam mencari pelanggan untuk meningkatkan pendapatan perusahaan.');

INSERT INTO `roles` (`ID_ROLE`, `CRM_ROLE`, `DESKRIPSI`) VALUES (NULL, 'Aktivasi', 'Memiliki peran dalam mengelola project survey dan project activation, dimana peran ini bertanggun jawab dalam pekerjaan lapangan untuk melakukan pendataan sebelum pemasangan dan pendataan ketika pemasangan.');

INSERT INTO `roles` (`ID_ROLE`, `CRM_ROLE`, `DESKRIPSI`) VALUES (NULL, 'Adev', 'Memiliki peran dalam mengelola BAKBB, activation request dan activation list,  , dimana peran ini bertanggun jawab dalam membuat kesepakatan antara perwakilan pihak perusahaan dan pelanggan, mengelola permintaan aktivasi dan mengelola activation list.');

INSERT INTO `roles` (`ID_ROLE`, `CRM_ROLE`, `DESKRIPSI`) VALUES (NULL, 'Manager', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

INSERT INTO `roles` (`ID_ROLE`, `CRM_ROLE`, `DESKRIPSI`) VALUES (NULL, 'General Manager', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

-- Insert data sbu
INSERT INTO `sbu` (`ID_SBU`, `DESKRIPSI`, `SBU_REGION`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Jakarta');
INSERT INTO `sbu` (`ID_SBU`, `DESKRIPSI`, `SBU_REGION`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Cawang');

-- Inser dashboard
INSERT INTO `menus` (`ID_MENU`, `MEN_ID_MENU`, `NAMA_MENU`, `ICON`, `LINK`) VALUES (NULL, NULL, 'Dashboard', '<i class=\"mdi mdi-gauge\"></i>', 'user/dashboard');