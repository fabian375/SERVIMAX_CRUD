create database login;

use login;

create table usuarios (
id_usuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username varchar(20) NOT NULL,
password char(32) NOT NULL,
email varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

select * from usuarios;


alter table usuarios add column fecha_alta timestamp;

alter table usuarios modify column fecha_alta timestamp default current_timestamp;

insert into usuarios values ('','pedro',MD5('890123'),'pedro@gmail.com','');










    
);