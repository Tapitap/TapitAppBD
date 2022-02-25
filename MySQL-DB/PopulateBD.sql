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

INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('LAGRIMAS DE POLLO MIELMOSTAZA', '3.50', 'ESTO ES UNA DESCRIPCION', 'comida', 'tapa');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('LAGRIMAS DE POLLO MIELMOSTAZA', '9.20', 'ESTO ES UNA DESCRIPCION', 'comida', 'racion');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('PISTO CON HUEVO', '3.40', 'ESTO ES UNA DESCRIPCION', 'comida', 'tapa');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('PISTO CON HUEVO', '6.00', 'ESTO ES UNA DESCRIPCION', 'comida', 'media');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('SOLOMILLO ROQUEFORT', '4.10', 'ESTO ES UNA DESCRIPCION', 'comida', 'media');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('SOLOMILLO ROQUEFORT', '11.60', 'ESTO ES UNA DESCRIPCION', 'comida', 'racion');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('SOLOMILLO WHISKY', '4.20', 'ESTO ES UNA DESCRIPCION', 'comida', 'media');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('SOLOMILLO WHISKY', '11.70', 'ESTO ES UNA DESCRIPCION', 'comida', 'racion');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('ENSALADILLA RUSA', '2.50', 'ESTO ES UNA DESCRIPCION', 'comida', 'tapa');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('ENSALADILLA RUSA', '4.30', 'ESTO ES UNA DESCRIPCION', 'comida', 'media');
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('TARTA DE QUESO', '4.85', 'ESTO ES UNA DESCRIPCION', 'postre', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('HELADO DE CHOCOLATE Y HOJALDRE', '5.10', 'ESTO ES UNA DESCRIPCION', 'postre', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('AQUABONA 50CL', '1.60', 'ESTO ES UNA DESCRIPCION', 'bebida', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('COCACOLA 33CL', '2.10', 'ESTO ES UNA DESCRIPCION', 'bebida', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('COCACOLA ZERO AZUCAR 33CL', '2.10', 'ESTO ES UNA DESCRIPCION', 'bebida', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('CERVEZA CRUZCAMPO CAÑA', '1.20', 'ESTO ES UNA DESCRIPCION', 'bebida', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('CERVEZA CRUZCAMPO JARRA', '2.50', 'ESTO ES UNA DESCRIPCION', 'bebida', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('TERCIO 1906 CLASICA', '2.50', 'ESTO ES UNA DESCRIPCION', 'bebida', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('TERCIO ESTRELLA GALICIA', '2.50', 'ESTO ES UNA DESCRIPCION', 'bebida', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('BOTELLIN ESTRELLA GALICIA 0.0 TOSTADA', '2.50', 'ESTO ES UNA DESCRIPCION', 'bebida', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('RON BARCELO', '7.00', 'ESTO ES UNA DESCRIPCION', 'combinado', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('CACIQUE', '6.50', 'ESTO ES UNA DESCRIPCION', 'combinado', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('LARIOS', '6.50', 'ESTO ES UNA DESCRIPCION', 'combinado', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('BEEFEATER', '7.00', 'ESTO ES UNA DESCRIPCION', 'combinado', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('RED LABEL', '7.00', 'ESTO ES UNA DESCRIPCION', 'combinado', null);
INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`) VALUES ('DYC', '6.50', 'ESTO ES UNA DESCRIPCION', 'combinado', null);

--********* OFERTAS *********

INSERT INTO `producto` (`nombre`, `precio`, `descripcion`, `tipo`, `tipoplato`, `oferta`) VALUES ('5 BOTELLINES CRUZCAMPO 25CL', '6.00', 'ESTO ES UNA DESCRIPCION', 'bebida', null, '1');
INSERT INTO `oferta` (`id_producto`, `enable`) VALUES ('27', '1');

--********* COMANDA *********

INSERT INTO `comanda` (`id_cuenta`, `id_mesa`) VALUES ('1', '1');
INSERT INTO `comanda` (`id_cuenta`, `id_mesa`) VALUES ('1', '1');

--********* LINEAS *********

INSERT INTO `linea` (`id_comanda`, `id_producto`, `cantidad`) VALUES ('1','9','1');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `cantidad`) VALUES ('1','8','1');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `cantidad`) VALUES ('1','4','1');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `cantidad`) VALUES ('1','16','4');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `cantidad`) VALUES ('2','11','2');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `cantidad`) VALUES ('2','21','2');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `cantidad`) VALUES ('2','25','1');
INSERT INTO `linea` (`id_comanda`, `id_producto`, `cantidad`) VALUES ('2','18','1');

--********* CUENTAS *********

INSERT INTO `cuenta` (`total`, `formapago`) VALUES ('58.20','tarjeta');
