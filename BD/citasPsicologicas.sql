
--############################################################## CITAS PSICOLOGICAS ##############################################################--
--################################################################################################################################################--

--tabla de carreras
CREATE TABLE carreras(
idcarrera serial,
nombreCarrera varchar,
statusCarrera int,
PRIMARY KEY (idcarrera)
);
--tabla de registro alumno
CREATE TABLE registroAlumno(
idAlumno serial,
nombreAlumno varchar,
edadAlumno int,
idcarrera int REFERENCES carreras(idcarrera),
numControlAlumno varchar,
correoPersonalAlumno varchar,
correoInstitucionalAlumno varchar,
contraseñaAlumno varchar,
numeroCelularAlumno varchar(10),
statusAlumno int,
PRIMARY KEY (idAlumno)
);
--tabla de registro psicologo
CREATE TABLE registroPsicologo(
idPsicologo serial,
nombrePsicologo varchar,
edadPsicologo int,
escuelaProcedenciaPsicologo varchar,
correoPersonalPsicologo varchar,
contraseñaPsicologo varchar,
numeroCelularPsicologo varchar(10),
statusPsicologo int,
PRIMARY KEY (idPsicologo)
);
--tabla de horarios de alumnos
create table horarioAlumnos(
idHorarioAlm serial,
idAlumno int REFERENCES registroalumno(idAlumno),
nombreHorarioAlm varchar,
rutaHorarioAlm varchar,
primary key (idHorarioAlm)
);
--tabla de ficha de canalizacion de alumnos
create table fichaCanalizacionAlumnos(
idFichaAlm serial,
idAlumno int REFERENCES registroalumno(idAlumno),
nombreFichaAlm varchar,
rutaFichaAlm varchar,
primary key (idFichaAlm)
);
--tabla de horario de psicologos
create table horarioPsicologo(
idHorarioPsi serial,
idPsicologo int REFERENCES registroPsicologo(idPsicologo),
dia varchar,
hora varchar,
statusHorarioPsi int,
primary key (idHorarioPsi)
);


--################################################################################################################################################--
--------------------------------------------------------------------------CONSULTAS-----------------------------------------------------------------
--drop table horarioPsicologo 

select * from carreras 
select * from registroalumno
select * from registroPsicologo
select * from horarioAlumnos
select * from FichaCanalizacionAlumnos
select * from horarioPsicologo


select * from registroalumno where numcontrolalumno = 'IS18110312' and contraseñaalumno = md5('josue121099')
select h.idHorarioPsi, r.nombrepsicologo , h.dia, h.hora from horarioPsicologo h, registroPsicologo r 

--################################################################################################################################################--
---------------------------------------------------------------------------INSERTS------------------------------------------------------------------
insert into carreras (nombrecarrera, statuscarrera) values ('INFORMATICA', 1),('SISTEMAS COMPUTACIONALES', 1),('MECATRONICA',1),('ELECTRONICA',1),('AERONAUTICA',1),('GESTION EMPRESARIAL',1)