
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
--tabla estado de horario de psicologo
create table statusHorarioPsicologo(
idStatusHorarioPsi serial,
descripcionHorarioPsi varchar,
primary key (idStatusHorarioPsi)
);
--tabla de horario de psicologos
create table horarioPsicologo(
idHorarioPsi serial,
idPsicologo int REFERENCES registroPsicologo(idPsicologo),
dia varchar,
hora varchar,
idStatusHorarioPsi int references statusHorarioPsicologo(idStatusHorarioPsi),
primary key (idHorarioPsi)
);
--tabla estado de asociaciones
create table statusAsociaciones(
idStatusAsociacion serial,
descripcionAsociacion varchar,
primary key (idStatusAsociacion)
);
--tabla asociacion alumno-psicologo
create table asociacionAlumnoPsicologo(
idAsociacion serial,
idPsicologo int REFERENCES registroPsicologo(idPsicologo),
idAlumno int REFERENCES registroalumno(idAlumno),
hora varchar,
dia varchar,
numTerapias int,
idStatusAsociacion int references statusAsociaciones(idStatusAsociacion),
primary key (idAsociacion)
);


--################################################################################################################################################--
--------------------------------------------------------------------------CONSULTAS-----------------------------------------------------------------
--drop table asociacionAlumnoPsicologo 

select * from carreras 
select * from registroalumno
select * from registroPsicologo
select * from horarioAlumnos
select * from FichaCanalizacionAlumnos
select * from horarioPsicologo
select * from asociacionAlumnoPsicologo
select * from statusAsociaciones
select * from statusHorarioPsicologo


select * from registroalumno where numcontrolalumno = 'IS18110312' and contraseñaalumno = md5('josue121099')
select h.idHorarioPsi, r.nombrepsicologo , h.dia, h.hora from horarioPsicologo h, registroPsicologo r 
SELECT h.idHorarioPsi, h.idPsicologo, h.dia, h.hora, s.descripcionHorarioPsi FROM horarioPsicologo h, statusHorarioPsicologo s WHERE h.idStatusHorarioPsi=s.idStatusHorarioPsi and idPsicologo=1 order by dia ASC, hora ASC

--################################################################################################################################################--
---------------------------------------------------------------------------INSERTS------------------------------------------------------------------
insert into carreras (nombrecarrera, statuscarrera) values ('INFORMATICA', 1),('SISTEMAS COMPUTACIONALES', 1),('MECATRONICA',1),('ELECTRONICA',1),('AERONAUTICA',1),('GESTION EMPRESARIAL',1);
insert into statusAsociaciones (descripcionAsociacion) values ('ACTIVO SIN PRIMERA CITA'),('ACTIVO CON PRIMERA CITA'),('ACTIVO CON SEGUNDA CITA'),('CITAS COMPLETAS'),('INACTIVO CON CITAS CANCELADAS');
insert into statusHorarioPsicologo (descripcionHorarioPsi) values ('HORA LIBRE'),('HORA OCUPADA');


