
--********* TABLA DE USERS *********

CREATE TABLE `users` (
 `username` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL,
 `enable` tinyint(1) NOT NULL DEFAULT 1,
 PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--********* TABLA DE AUTHORITIES *********

CREATE TABLE `authorities` (
 `username` varchar(50) NOT NULL,
 `authority` varchar(50) NOT NULL,
 PRIMARY KEY (`authority`,`username`) USING BTREE,
 KEY `authority_user_fk` (`username`),
 CONSTRAINT `authority_user_fk` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--********* TABLA DE MANAGER *********

CREATE TABLE `manager` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `name` varchar(50) NOT NULL,
 `tipo` varchar(50) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `manager_user_fk` (`username`),
 CONSTRAINT `manager_user_fk` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4

--********* TABLA DE MESA *********

CREATE TABLE `mesa` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `numero` int(11) NOT NULL,
 `id_manager` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `mesa_user_fk` (`username`),
 KEY `mesa_manager_fk` (`id_manager`) USING BTREE,
 CONSTRAINT `mesa_manager_id` FOREIGN KEY (`id_manager`) REFERENCES `manager` (`id`),
 CONSTRAINT `mesa_user_fk` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4

--********* TABLA DE PRODUCTO *********

CREATE TABLE `producto` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(60) NOT NULL,
 `precio` decimal(4,2) NOT NULL,
 `descripcion` varchar(200) DEFAULT NULL,
 `tipo` enum('comida','postre','bebida','combinado') NOT NULL,
 `tipoplato` enum('tapa','media','racion') DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--********* TABLA DE OFERTA *********

CREATE TABLE `oferta` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_producto` int(11) NOT NULL,
 `enable` tinyint(1) NOT NULL DEFAULT 1,
 PRIMARY KEY (`id`),
 KEY `oferta_producto_fk` (`id_producto`),
 CONSTRAINT `oferta_producto_fk` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--********* TABLA DE CUENTA *********

CREATE TABLE `cuenta` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `total` decimal(4,2) DEFAULT NULL,
 `formapago` enum('tarjeta','efectivo') NOT NULL,
 `fecha` datetime NOT NULL DEFAULT (current_timestamp() + interval '-1' hour),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4

--********* TABLA DE COMANDA *********

CREATE TABLE `comanda` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_cuenta` int(11) DEFAULT NULL,
 `id_mesa` int(11) NOT NULL,
 `fecha` datetime NOT NULL DEFAULT (current_timestamp() + interval '-1' hour),
 PRIMARY KEY (`id`),
 KEY `comanda_cuenta_fk` (`id_cuenta`),
 KEY `comanda_mesa_fk` (`id_mesa`),
 CONSTRAINT `comanda_cuenta_fk` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id`),
 CONSTRAINT `comanda_mesa_fk` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4

--********* TABLA DE LINEA *********

CREATE TABLE `linea` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_comanda` int(11) NOT NULL,
 `id_producto` int(11) NOT NULL,
 `cantidad` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `linea_producto_fk` (`id_producto`),
 KEY `linea_comanda_fk` (`id_comanda`),
 CONSTRAINT `linea_comanda_fk` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id`),
 CONSTRAINT `linea_producto_fk` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--********* TABLA DE VALORACION *********

CREATE TABLE `valoracion` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(100) DEFAULT NULL,
 `email` varchar(60) DEFAULT NULL,
 `estrellas` int(11) NOT NULL,
 `comentario` varchar(500) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

COMMIT;
