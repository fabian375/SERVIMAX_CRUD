alter table usuarios 
add 
column activo varchar(2) 
not null default('SI/NO')

insert into usuarios
(username,password,email)
VALUES
('mramos',md5('nomeacuerdo456'),'mramos@empresa.com')

select username,email,activo from usuarios where id_usuario=11


