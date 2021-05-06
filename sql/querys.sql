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

select * from usuarios where username in ('mariana','marina');

select password from usuarios where username='marcelo';

select * from usuarios where (username='marcelo' or email='marcelo@gmail.com') and (password='995bf053c4694e1e353cfd42b94e4447');

delete from usuarios where username='maria';

insert into usuarios values ('','micaela',MD5('mica'),'micaela@gmail.com',NULL);

update usuarios set password=md5('123456') where username='micaela'






    
);