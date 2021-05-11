create table marcas (
id_marca int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
descripcion varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;


create table colores (
id_color int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
descripcion varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

create table zapatillas (
id_zapatilla int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
modelo varchar(50) NOT NULL,
precio decimal(7,2),
genero varchar(50),
id_marca int(11) NOT NULL,
fecha_alta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
imagen varchar(255),
descripcion varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

create table colores_zapatillas (
id_color int(11) NOT NULL,
id_zapatilla int(11) NOT NULL,
primary key (id_color, id_zapatilla)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Clave Foránea Marcas (uno) en la tabla zapatillas (varios)
--
ALTER TABLE zapatillas
ADD CONSTRAINT zapatillas_marcas FOREIGN KEY (id_marca) REFERENCES marcas 
(id_marca);
--
-- Clave Foránea zapatillas (uno) y colores_zapatillas (varios)
--
ALTER TABLE colores_zapatillas
ADD CONSTRAINT colores_zapatillas FOREIGN KEY (id_zapatilla) REFERENCES 
zapatillas(id_zapatilla);
--
-- Clave Foránea colores (uno) y colores_zapatillas (varios)
--
ALTER TABLE colores_zapatillas
ADD CONSTRAINT zapatillas_colores FOREIGN KEY (id_color) REFERENCES 
colores(id_color);

alter table zapatillas add column disciplina VARCHAR(50);

alter table zapatillas modify column disciplina VARCHAR(30);

--
-- Volcado de datos para la tabla Marcas
--
INSERT INTO marcas (id_marca, descripcion) VALUES
(NULL, 'Nike'),
(NULL, 'Adidas'),
(NULL, 'Converse'),
(NULL, 'Fila'),
(NULL, 'Lacoste'),
(NULL, 'New Balance');
--
--
-- Volcado de datos para la tabla Colores
--
INSERT INTO colores (id_color, descripcion) VALUES
(NULL, 'Azul'),
(NULL, 'Roja'),
(NULL, 'Marrón'),
(NULL, 'Negra'),
(NULL, 'Blanca'),
(NULL, 'Verde'),
(NULL, 'Amarillo'),
(NULL, 'Gris');
