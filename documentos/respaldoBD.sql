-- Database: inventariodb

-- DROP DATABASE inventariodb;

CREATE DATABASE inventariodb
  WITH OWNER = inventario
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'es_VE.UTF-8'
       LC_CTYPE = 'es_VE.UTF-8'
       CONNECTION LIMIT = -1;

-- Domain: nombre_corto

-- DROP DOMAIN nombre_corto;

CREATE DOMAIN nombre_corto
  AS character varying(20)
  COLLATE pg_catalog."default"
  NOT NULL;
ALTER DOMAIN nombre_corto
  OWNER TO inventario;

-- Domain: nombre_largo

-- DROP DOMAIN nombre_largo;

CREATE DOMAIN nombre_largo
  AS character varying(50)
  COLLATE pg_catalog."default"
  NOT NULL;
ALTER DOMAIN nombre_largo
  OWNER TO inventario;

-- Domain: observacion_corta

-- DROP DOMAIN observacion_corta;

CREATE DOMAIN observacion_corta
  AS character varying(100)
  COLLATE pg_catalog."default";
ALTER DOMAIN observacion_corta
  OWNER TO inventario;


-- Table: empresas

-- DROP TABLE empresas;

CREATE TABLE empresas
(
  id serial NOT NULL,
  nombre nombre_corto NOT NULL,
  observacion observacion_corta,
  CONSTRAINT empresas_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE empresas
  OWNER TO inventario;
COMMENT ON TABLE empresas
  IS 'Tabla catálogo de empresas';

-- Table: gerencias

-- DROP TABLE gerencias;

CREATE TABLE gerencias
(
  id serial NOT NULL,
  nombre nombre_corto NOT NULL,
  observacion observacion_corta,
  CONSTRAINT gerencias_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE gerencias
  OWNER TO inventario;
COMMENT ON TABLE gerencias
  IS 'Tabla catálogo de gerencias';

-- Table: marcas

-- DROP TABLE marcas;

CREATE TABLE marcas
(
  id serial NOT NULL,
  nombre nombre_corto NOT NULL,
  observacion observacion_corta,
  CONSTRAINT marcas_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE marcas
  OWNER TO inventario;
COMMENT ON TABLE marcas
  IS 'Tabla catálogo de las marcas de los equipos';

-- Table: sistemas_operativos

-- DROP TABLE sistemas_operativos;

CREATE TABLE sistemas_operativos
(
  id serial NOT NULL,
  nombre nombre_corto NOT NULL,
  observacion observacion_corta,
  CONSTRAINT sistemas_operativos_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE sistemas_operativos
  OWNER TO inventario;
COMMENT ON TABLE sistemas_operativos
  IS 'Tabla catálogo de los sistemas_operativos';

-- Table: ubicaciones

-- DROP TABLE ubicaciones;

CREATE TABLE ubicaciones
(
  id serial NOT NULL,
  nombre nombre_largo NOT NULL,
  observacion observacion_corta,
  CONSTRAINT ubicaciones_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE ubicaciones
  OWNER TO inventario;
COMMENT ON TABLE ubicaciones
  IS 'Tabla catálogo de ubicaciones';

