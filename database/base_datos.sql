CREATE DATABASE senati;
USE senati;

CREATE TABLE cursos(
	idcurso		INT 		AUTO_INCREMENT PRIMARY KEY,
	nombrecurso	VARCHAR(50)	NOT NULL,
	especialidad	VARCHAR(70)	NOT NULL,
	complejidad 	CHAR(1)		NOT NULL DEFAULT 'B',
	fechainicio	DATE 		NOT NULL,
	precio 		DECIMAL(7,2)	NOT NULL,
	fechacreacion 	DATETIME 	NOT NULL DEFAULT NOW(),
	fechaupdate	DATETIME	NULL,
	estado 		CHAR(1)		NOT NULL DEFAULT '1'
)ENGINE = INNODB;

INSERT INTO cursos (nombrecurso, especialidad, complejidad, fechainicio, precio) VALUES
	('Java','ETI','M','2023-05-10',180),
	('Desarrollo Web','ETI','B','2023-04-20',190),
	('Excel Financiero','Adminsitración','A','2023-05-14',250),
	('ERP SAP','Administración','A','2023-05-11',400),
	('Inventor','Mecánica','M','2023-04-29',380);

SELECT * FROM cursos;

-- STORE PROCEDURE
-- Un procedimiento almacenado es un PROGRAMA que se ejecuta desde el motor de BD
-- y que permite recibir valor de entrada, realizar diferentes tipos de cálculos y 
-- entregar una salida.

-- ------------------
-- LISTAR LOS CURSOS
-- ------------------
DELIMITER $$
CREATE PROCEDURE spu_curso_listar()
BEGIN
	SELECT 	idcurso,
		nombrecurso,
		especialidad,
		complejidad,
		fechainicio,
		precio
	FROM cursos
	WHERE estado = '1'
	ORDER BY idcurso DESC;
END $$
CALL spu_curso_listar();

-- ----------------------------------------------
-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR CURSOS
-- ----------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_registrar_cursos(
IN nombrecurso_ 	VARCHAR(40),
IN especialidad_	VARCHAR(70),
IN complejidad_	CHAR(1),
IN fechainicio_	DATE,
IN precio_			DECIMAL(7,2)
)
BEGIN
	INSERT INTO cursos(nombrecurso, especialidad, fechainicio, complejidad, precio) 
	VALUES (nombrecurso_, especialidad_, fechainicio_, complejidad_, precio_);
END $$
CALL spu_registrar_cursos('Python','ETI','B','2023-05-10','120');
CALL spu_curso_listar();