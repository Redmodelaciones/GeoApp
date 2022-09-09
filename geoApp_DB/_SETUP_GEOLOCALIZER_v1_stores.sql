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
DROP TABLE IF EXISTS admstr01
CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `storeName` varchar(100) DEFAULT NULL,
  `phoneFormatted` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postalCode` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `estado` int(10) NOT NULL
) ENGINE=InnoDB CHARACTER SET latin1 COLLATE latin1_spanish_ci;

COMMIT;

ALTER TABLE `stores`
  DROP PRIMARY KEY, ADD PRIMARY KEY (`id`);
COMMIT;

ALTER TABLE stores MODIFY id INTEGER NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE OR REPLACE VIEW admstr01 AS select id as strid, codigo, storeName as strnomb, phoneFormatted as strcel, address as strdir, city as strcity, country, postalCode, latitude as strlat, longitude as strlng from stores

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