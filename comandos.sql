CREATE DATABASE agencia
USE agencia
CREATE TABLE
    header (
        hea_logo VARCHAR(20) NOT NULL,
        hea_subtitulo VARCHAR(50) NOT NULL,
        hea_titulo VARCHAR(50) NOT NULL
    )
INSERT INTO
    header (
        hea_logo,
        hea_subtitulo,
        hea_titulo
    )
VALUES (
        "Sofia Casas",
        "Bienvenido(a) A Mi Panaderia",
        "El dulce sabor"
    );

-- CREATE TABLE auditoria(

--     au_id,

--     au_user_id,

--     au_fecha DATETIME,

--     au_tipo, -- add, edit, delete, view

--     au_ip_publica

--     au_ip_local

-- )

CREATE TABLE
    usuarios (
        user_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_nombres VARCHAR(100) NOT NULL,
        user_apellidos VARCHAR(100) NOT NULL,
        user_email VARCHAR(100) NOT NULL,
        user_img TEXT,
        user_pass VARCHAR(255) NOT NULL,
        user_token TEXT,
        user_status TINYINT DEFAULT 0 COMMENT 'status 0: no activo, status 1: activo',
        user_rol VARCHAR(50) NOT NULL DEFAULT 'suscriptor'
    )
INSERT INTO
    usuarios (
        user_nombres,
        user_apellidos,
        user_email,
        user_pass
    )
VALUES (
        'Marco',
        'Mendoza',
        'marloc2194@gmail.com',
        '123456'
    )
CREATE TABLE
    portafolios (
        por_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        por_user_id INT NOT NULL,
        por_titulo VARCHAR(20) NOT NULL,
        por_subtitulo VARCHAR(20) NOT NULL,
        por_imgSmall TEXT NOT NULL,
        por_imgLarge TEXT NOT NULL,
        por_contenido TEXT NOT NULL,
        por_fecha DATE NOT NULL,
        por_status VARCHAR(20) NOT NULL,
        por_vistas INT DEFAULT 0,
        por_delete TINYINT DEFAULT 1 COMMENT '0: desactivado, 1: activo'
    );

CREATE TABLE
    contacto (
        con_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        con_nombre VARCHAR(40) NOT NULL,
        con_correo VARCHAR(40) NOT NULL,
        con_telefono VARCHAR(15) NOT NULL,
        con_mensaje TEXT NOT NULL,
        con_fecha DATE NOT NULL,
        por_status TINYINT DEFAULT 0 COMMENT '0: sin respuesta, 1: respondido',
        por_delete TINYINT DEFAULT 1 COMMENT '0: desactivado, 1: activo'
    );

INSERT INTO contacto
VALUES (
        1,
        'Marco Mendoza',
        'marloc2194@gmail.com',
        '+51977132299',
        'mas informacion sobre la elaboracion de paginas web',
        NOW(),
    )
CREATE TABLE
    comentarios (
        com_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
        com_user_id INT NOT NULL,
        com_por_id INT NOT NULL,
        com_mensaje VARCHAR(100) NOT NULL,
        com_fecha DATETIME NOT NULL,
        com_status TINYINT DEFAULT 0 NOT NULL COMMENT '0: pendiente, 1: aprobado'
    )