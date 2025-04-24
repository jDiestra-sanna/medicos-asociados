/*AGREGA PERMISOS CAPITADOS*/
INSERT INTO m_permiso(cod_permiso, des_permiso, activo, idparent) VALUES(17005, 'PRODUCTOS CAPITADOS', TRUE, NULL)
INSERT INTO m_permiso(cod_permiso, des_permiso, activo, idparent) VALUES(17006, 'Resumen', TRUE, 17005)
INSERT INTO m_permiso(cod_permiso, des_permiso, activo, idparent) VALUES(17007, 'Consulta', TRUE, 17005)
INSERT INTO m_permiso(cod_permiso, des_permiso, activo, idparent) VALUES(17008, 'Registro', TRUE, 17005)
INSERT INTO m_permisoxusuario(cod_permiso, nom_usu) VALUES(17005, 'LCHUCHON')
INSERT INTO m_permisoxusuario(cod_permiso, nom_usu) VALUES(17006, 'LCHUCHON')
INSERT INTO m_permisoxusuario(cod_permiso, nom_usu) VALUES(17007, 'LCHUCHON')
INSERT INTO m_permisoxusuario(cod_permiso, nom_usu) VALUES(17008, 'LCHUCHON')
/*AGREGA PERMISOS CAPITADOS*/