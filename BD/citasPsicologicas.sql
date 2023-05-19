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
numeroCelularAlumno int,
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
numeroCelularPsicologo int,
statusPsicologo int,
PRIMARY KEY (idPsicologo)
);
--

--################################################################################################################################################--
--------------------------------------------------------------------------CONSULTAS-----------------------------------------------------------------

select * from carreras 
select * from registroalumno 
select * from registroPsicologo

SELECT * FROM registroAlumno WHERE (nombreAlumno='josue') or (numControlAlumno='is18113012') or (correoInstitucionalAlumno = 'ejem')