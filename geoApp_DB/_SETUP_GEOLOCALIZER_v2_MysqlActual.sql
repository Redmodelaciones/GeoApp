-- Tabla de Configuraciones
IF (SELECT count(*) FROM information_schema.tables WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='config' LIMIT 1)=0 THEN
 CREATE TABLE `config` ( `NM` VARCHAR(120) NOT NULL DEFAULT '' , `VL` VARCHAR(400) NOT NULL DEFAULT '' , PRIMARY KEY (`NM`)
 ) ENGINE = InnoDB CHARACTER SET latin1 COLLATE latin1_spanish_ci;
END IF;

COMMIT;

ALTER TABLE `config`
  ADD PRIMARY KEY (`NM`);
COMMIT;

IF (select count(*) from config WHERE NM='geolatitude' LIMIT 1)=0 THEN
 INSERT INTO config (NM, VL) VALUES('geolatitude', '0');END IF;
IF (select count(*) from config WHERE NM='geolongitude' LIMIT 1)=0 THEN
 INSERT INTO config (NM, VL) VALUES('geolongitude', '0');END IF;
IF (select count(*) from config WHERE NM='geocodemarker' LIMIT 1)=0 THEN
 INSERT INTO config (NM, VL) VALUES('geocodemarker', '\'<h3 class=\"text-center\">\'+strnomb+\'</h3><h4>\'+(strdir?\'\'+strdir+\'<br>\':\'\')+(phone?\'<b>Teléfono: </b>\'+phone:\'\')+\'</h4>\'');END IF;
IF (select count(*) from config WHERE NM='geobackground' LIMIT 1)=0 THEN
 INSERT INTO config (NM, VL) VALUES('geobackground', '');END IF;
IF (select count(*) from config WHERE NM='geofontcolor' LIMIT 1)=0 THEN
 INSERT INTO config (NM, VL) VALUES('geofontcolor', '#FFFFFF');END IF;
IF (select count(*) from config WHERE NM='geosidebarbackground' LIMIT 1)=0 THEN
 INSERT INTO config (NM, VL) VALUES('geosidebarbackground', '#FFFFFF');END IF;

COMMIT;

-- Tabla de Tiendas
IF (SELECT count(*) FROM information_schema.tables WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='admstr01' LIMIT 1)=0 THEN
CREATE TABLE `admstr01` (
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
END IF;
COMMIT;

ALTER TABLE `admstr01`
  ADD PRIMARY KEY (`strid`);
COMMIT;

ALTER TABLE admstr01 MODIFY strid INTEGER NOT NULL AUTO_INCREMENT;
COMMIT;

COMMIT;

-- Tabla de Registro de Visitas
IF (SELECT count(*) FROM information_schema.tables WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='geoclinav01' LIMIT 1)=0 THEN
CREATE TABLE `geoclinav01` (
  `CLIIP` varchar(20) NOT NULL,
  `CLIPSCOD` varchar(2) NOT NULL DEFAULT '',
  `CLIPAIS` varchar(50) NOT NULL,
  `CLIFREG` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CLIDIRRF` varchar(200) NOT NULL,
  `CLILATITUDE` varchar(80) NOT NULL,
  `CLILONGITUDE` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM CHARACTER SET latin1 COLLATE latin1_spanish_ci;
END IF;

COMMIT;