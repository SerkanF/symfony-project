--
-- Table structure for table `items_from_game`
--

DROP TABLE IF EXISTS `items_from_game`;
CREATE TABLE IF NOT EXISTS `items_from_game` (
  `id_in_game` varchar(255) NOT NULL COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_stackable` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_in_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40039', 'Amulette EXP I', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40040', 'Amulette EXP II', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40099', 'Amulette EXP I (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40374', 'Amulette EXP II (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40150', 'Talisman EXP I (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40151', 'Talisman EXP II (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40043', 'Amulette de PC I', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40044', 'Amulette de PC II', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40100', 'Amulette de PC I (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40377', 'Amulette de PC II (NT)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40154', 'Talisman de CP Eternal I (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40155', 'Talisman de CP Eternal II (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40041', 'Amulette de Butin I', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40042', 'Amulette de Butin II', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40375', 'Amulette de Butin I (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40376', 'Amulette de Butin II (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40152', 'Talisman de Butin I (NE', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40153', 'Talisman de Butin II (NE', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40098', 'Nourriture de Familier (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40372', 'Bijou Iris (1 jour) (NT)', 0);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40373', 'Bijou Aurique (7 jours) (NT)', 0);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40175', 'Cristal eden (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40241', 'Cristal eden', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('41261', 'Sac à  Dos à  20 Emplacements', 0);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40470', 'Coeur de Flamme de Couronne', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40037', 'Pierre de Sécurité', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40038', 'Pierre de Sécurité  Fétiche', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40471', 'Pierre de Sécurité Sublime', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40472', 'Pierre de Sécurité Alcyon', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40922', 'Pierre de Sécurité Fétiche (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42127', 'Pierre de Sécurité de Feregal', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42128', 'Pierre de Sécurité de Hurlevent', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42129', 'Pierre de Sécurité de Noireflamme', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42130', 'Pierre de Sécurité Fétiche de Feregal', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42131', 'Pierre de Sécurité Fétiche de Hurlevent', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42132', 'Pierre de Sécurité Fétiche de Noireflamme', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42133', 'Pierre de Sécurité Alcyon de Feregal', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42134', 'Pierre de Sécurité Alcyon de Hurlevent', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42135', 'Pierre de Sécurité Alcyon de Noireflamme', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42136', 'Pierre de Sécurité Sublime de Feregal', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42137', 'Pierre de Sécurité Sublime de Hurlevent', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42138', 'Pierre de Sécurité Sublime de Noireflamme', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42139', 'Pierre de Sécurité de Feregal (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42140', 'Pierre de Sécurité de Hurlevent (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42141', 'Pierre de Sécurité de Noireflamme (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42142', 'Pierre de Sécurité  Fétiche de Feregal (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42143', 'Pierre de Sécurité  Fétiche de Hurlevent (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42144', 'Pierre de Sécurité  Fétiche de Noireflamme (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42145', 'Pierre de Sécurité  Alcyon de Feregal (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42146', 'Pierre de Sécurité  Alcyon de Hurlevent (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42147', 'Pierre de Sécurité  Alcyon de Noireflamme (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42148', 'Pierre de Sécurité  Sublime de Feregal (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42149', 'Pierre de Sécurité  Sublime de Hurlevent (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42150', 'Pierre de Sécurité  Sublime de Noireflamme (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('43257', 'Fortified Stats Reset Scroll', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40149', 'Ciseau Ezur Nv. 60', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40035', 'Feuille de Vie', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40036', 'Feuille de Vie de Lotus', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40170', 'Eternal points', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40473', 'Pierre de Guerre', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40562', 'Essence de Couronne Nv. 35 (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40563', 'Essence de Couronne Nv. 45 (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40564', 'Essence de Couronne Nv. 50 (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40565', 'Essence de Couronne Nv. 55 (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40566', 'Essence de Couronne Nv. 60 (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42054', 'Poussière étoile de Couronne Nv. 35', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42055', 'Poussière étoile de Couronne Nv. 45', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42056', 'Poussière étoile de Couronne Nv. 50', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42057', 'Poussière étoile de Couronne Nv. 55', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42058', 'Poussière étoile de Couronne Nv. 60', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42064', 'Extrait de Couronne Nv. 35', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42065', 'Extrait de Couronne Nv. 45', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42066', 'Extrait de Couronne Nv. 50', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42067', 'Extrait de Couronne Nv. 55', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42068', 'Extrait de Couronne Nv. 60', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42074', 'Coeur de Flamme de Couronne Nv. 35', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42075', 'Coeur de Flamme de Couronne Nv. 45', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42076', 'Coeur de Flamme de Couronne Nv. 50', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42077', 'Coeur de Flamme de Couronne Nv. 55', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42078', 'Coeur de Flamme de Couronne Nv. 60', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42096', 'Gemme Déliante pour Familier', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42097', 'Gemme Déliante pour Familier (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42098', 'Ciseau Eternal Niveau 30 (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42099', 'Ciseau Eternal Niveau 40 (NE)', 1);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('42100', 'Ciseau Eternal Niveau 50 (NE)', 1);

INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40608', 'Tenue de Premier de Classe Mystérieuse', 0);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40615', 'Tenue de Premiè re de Classe Mystérieuse', 0);
INSERT INTO `items_from_game` (`id_in_game`, `name`, `is_stackable`) VALUES ('40319', 'Sanglier Punk', 0);

--
-- Table structure for table `pack`
--

DROP TABLE IF EXISTS `pack`;
CREATE TABLE IF NOT EXISTS `pack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` bigint(20) UNSIGNED NOT NULL,
  `expired_at` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pack` (`id`, `name`, `is_activated`, `created_at`, `expired_at`) VALUES (1, 'Starter pack', 0, 1598605298, 1598832000);
INSERT INTO `pack` (`id`, `name`, `is_activated`, `created_at`, `expired_at`) VALUES (2, 'Pack de compensation', 0, 1598605298, 1598832000);

DROP TABLE IF EXISTS `pack_items_from_game`;
CREATE TABLE IF NOT EXISTS `pack_items_from_game` (
  `id_pack` int(11) NOT NULL,
  `id_in_game` varchar(255) NOT NULL COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id_pack`, `id_in_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Started pack --

-- Amulette et Talisman EXP PC BUTIN

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40099 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40374 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40100 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40377 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40150 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40151 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40154 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40155 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40375 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40376 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40152 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40153 ', 5);

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40608 ', 1);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40615 ', 1);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40319 ', 1);

-- Aurique --

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (1, '40373', 1);

-- Pack de compensation --

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40099 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40374 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40100 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40377 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40150 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40151 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40154 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40155 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40375 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40376 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40152 ', 5);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40153 ', 5);

-- Aurique --

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40373', 2);
  
-- Sublime férégale --

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '42148', 12);

-- Sublime Hurlevent / Noireflamme --

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '42149 ', 6);
INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '42150 ', 6);

-- Iris --

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40372', 7);

-- CE --

INSERT INTO `pack_items_from_game` (`id_pack`, `id_in_game`, `item_quantity`) VALUES (2, '40175', 50);

--
-- Table structure for table `packs_users`
--

DROP TABLE IF EXISTS `packs_users`;
CREATE TABLE IF NOT EXISTS `packs_users` (
  `id_user` int(11) NOT NULL,
  `id_pack` int(11) NOT NULL,
  PRIMARY KEY (`id_user`, `id_pack`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
