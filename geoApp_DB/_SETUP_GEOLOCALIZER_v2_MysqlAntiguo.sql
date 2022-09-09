-- Tabla de Configuraciones
CREATE TABLE IF NOT EXISTS `config` ( `NM` VARCHAR(120) NOT NULL DEFAULT '' , `VL` VARCHAR(400) NOT NULL DEFAULT '' , PRIMARY KEY (`NM`)
 ) ENGINE = InnoDB CHARACTER SET latin1 COLLATE latin1_spanish_ci;

COMMIT;

ALTER TABLE `config`
  DROP PRIMARY KEY, ADD PRIMARY KEY (`NM`);
COMMIT;

INSERT IGNORE INTO config (NM, VL) VALUES('geolatitude', '0');
INSERT IGNORE INTO config (NM, VL) VALUES('geolongitude', '0');
INSERT IGNORE INTO config (NM, VL) VALUES('geocodemarker', '\'<h3 class=\"text-center\">\'+strnomb+\'</h3><h4>\'+(strdir?\'\'+strdir+\'<br>\':\'\')+(phone?\'<b>Teléfono: </b>\'+phone:\'\')+\'</h4>\'');
INSERT IGNORE INTO config (NM, VL) VALUES('geobackground', '');
INSERT IGNORE INTO config (NM, VL) VALUES('geofontcolor', '#FFFFFF');
INSERT IGNORE INTO config (NM, VL) VALUES('geosidebarbackground', '#FFFFFF');

COMMIT;

-- Tabla de Tiendas
CREATE TABLE IF NOT EXISTS `admstr01` (
  `strid` int(11) NOT NULL,
  `strnomb` varchar(100) DEFAULT NULL,
  `strcel` varchar(100) DEFAULT NULL,
  `strdir` varchar(100) DEFAULT NULL,
  `strcity` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postalCode` varchar(100) DEFAULT NULL,
  `strlat` varchar(100) NOT NULL,
  `strlng` varchar(100) NOT NULL,
  `catsocio` int(10) NOT NULL,
  `codigo` int(10) NOT NULL
) ENGINE=InnoDB CHARACTER SET latin1 COLLATE latin1_spanish_ci;

COMMIT;

ALTER TABLE `admstr01`
  ADD PRIMARY KEY (`strid`);
COMMIT;

ALTER TABLE admstr01 MODIFY strid INTEGER NOT NULL AUTO_INCREMENT;
COMMIT;

COMMIT;

-- Tabla de Registro de Visitas
CREATE TABLE IF NOT EXISTS `geoclinav01` (
  `CLIIP` varchar(20) NOT NULL,
  `CLIPSCOD` varchar(2) NOT NULL DEFAULT '',
  `CLIPAIS` varchar(50) NOT NULL,
  `CLIFREG` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CLIDIRRF` varchar(200) NOT NULL,
  `CLILATITUDE` varchar(80) NOT NULL,
  `CLILONGITUDE` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM CHARACTER SET latin1 COLLATE latin1_spanish_ci;

COMMIT;