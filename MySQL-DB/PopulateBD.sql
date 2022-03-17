--********* USUARIO ADMIN *********

INSERT INTO `users` (`username`, `password`, `enable`) VALUES ('admin', 'admin', '1');
INSERT INTO `authorities` (`username`, `authority`) VALUES ('admin', 'admin');

--********* USUARIOS MANAGER *********

INSERT INTO `users`(`username`, `password`, `enable`) VALUES ('laposada','admin1234','1');
INSERT INTO `manager` (`id`, `username`, `name`, `tipo`) VALUES (NULL, 'laposada', 'Taberna La Posada', 'Restaurante');
INSERT INTO `authorities` (`username`, `authority`) VALUES ('laposada', 'manager');

--********* USUARIOS MESA *********

INSERT INTO `users`(`username`, `password`, `enable`) VALUES ('laposada_1','admin1234','1')
INSERT INTO `mesa` (`id`, `username`, `numero`, `id_manager`) VALUES (NULL, 'laposada_1', '1', '1');
INSERT INTO `authorities` (`username`, `authority`) VALUES ('laposada_1', 'mesa');

INSERT INTO `users` (`username`, `password`, `enable`) VALUES ('laposada_2', 'admin1234', '1');
INSERT INTO `mesa` (`id`, `username`, `numero`, `id_manager`) VALUES (NULL, 'laposada_2', '2', '1');
INSERT INTO `authorities` (`username`, `authority`) VALUES ('laposada_2', 'mesa');

--********* PRODUCTOS *********

INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'LAGRIMAS DE POLLO MIELMOSTAZA', 'ESTO ES UNA DESCRIPCION', 'comida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('1', 'tapa', '3.50');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('1', 'racion', '9.20');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'PISTO CON HUEVO', 'ESTO ES UNA DESCRIPCION', 'comida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('2', 'tapa', '3.40');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('2', 'media', '6.00');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'SOLOMILLO ROQUEFORT', 'ESTO ES UNA DESCRIPCION', 'comida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('3', 'tapa', '3.70');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('3', 'media', '4.10');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('3', 'racion', '11.60');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'SOLOMILLO WHISKY', 'ESTO ES UNA DESCRIPCION', 'comida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('4', 'tapa', '3.70');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('4', 'media', '4.20');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('4', 'racion', '11.70');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'ENSALADILLA RUSA', 'ESTO ES UNA DESCRIPCION', 'comida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('5', 'tapa', '2.50');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('5', 'media', '4.30');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'TARTA DE QUESO', 'ESTO ES UNA DESCRIPCION', 'postre', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('6', null, '4.85');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'HELADO DE CHOCOLATE Y HOJALDRE', 'ESTO ES UNA DESCRIPCION', 'postre', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('7', null, '5.10');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'AQUABONA 50CL', 'ESTO ES UNA DESCRIPCION', 'bebida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('8', null, '1.60');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'COCACOLA 33CL', 'ESTO ES UNA DESCRIPCION', 'bebida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('9', null, '2.10');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'COCACOLA ZERO AZUCAR 33CL', 'ESTO ES UNA DESCRIPCION', 'bebida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('10', null, '2.10');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'CERVEZA CRUZCAMPO CAÑA', 'ESTO ES UNA DESCRIPCION', 'bebida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('11', null, '1.20');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'CERVEZA CRUZCAMPO JARRA', 'ESTO ES UNA DESCRIPCION', 'bebida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('12', null, '2.50');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'TERCIO 1906 CLASICA', 'ESTO ES UNA DESCRIPCION', 'bebida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('13', null, '2.50');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'TERCIO ESTRELLA GALICIA', 'ESTO ES UNA DESCRIPCION', 'bebida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('14', null, '2.50');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'BOTELLIN ESTRELLA GALICIA 0.0 TOSTADA', 'ESTO ES UNA DESCRIPCION', 'bebida', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('15', null, '1.50');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'RON BARCELO', 'ESTO ES UNA DESCRIPCION', 'combinado', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('16', null, '7.00');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'CACIQUE', 'ESTO ES UNA DESCRIPCION', 'combinado', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('17', null, '6.50');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'LARIOS', 'ESTO ES UNA DESCRIPCION', 'combinado', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('18', null, '6.50');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'BEEFEATER', 'ESTO ES UNA DESCRIPCION', 'combinado', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('19', null, '7.00');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'RED LABEL', 'ESTO ES UNA DESCRIPCION', 'combinado', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('20', null, '7.00');
INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', 'DYC', 'ESTO ES UNA DESCRIPCION', 'combinado', '0');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('21', null, '6.50');

--********* OFERTAS *********

INSERT INTO `producto` (`id_manager`, `nombre`, `descripcion`, `tipo`, `oferta`) VALUES ('1', '5 BOTELLINES CRUZCAMPO 25CL', 'ESTO ES UNA DESCRIPCION', 'bebida', '1');
INSERT INTO `precio` (`id_producto`, `tipo`, `precio`) VALUES ('22', null, '6.00');
INSERT INTO `oferta` (`id_producto`, `enable`) VALUES ('22', '1');

--********* COMANDA *********

INSERT INTO `comanda` (`id_cuenta`, `id_mesa`) VALUES ('1', '1');
INSERT INTO `comanda` (`id_cuenta`, `id_mesa`) VALUES ('1', '1');

--********* LINEAS *********

INSERT INTO `linea` (`id_comanda`, `id_producto`, `id_precio`, `cantidad`) VALUES ('1','5','11','1');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `id_precio`, `cantidad`) VALUES ('1','4','10','1');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `id_precio`, `cantidad`) VALUES ('1','2','4','1');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `id_precio`, `cantidad`) VALUES ('1','11','18','4');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `id_precio`, `cantidad`) VALUES ('2','6','13','2');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `id_precio`, `cantidad`) VALUES ('2','16','23','2');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `id_precio`, `cantidad`) VALUES ('2','20','27','1');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `id_precio`, `cantidad`) VALUES ('2','13','20','1');

--********* CUENTAS *********

INSERT INTO `cuenta` (`total`, `formapago`) VALUES ('58.20','tarjeta');
