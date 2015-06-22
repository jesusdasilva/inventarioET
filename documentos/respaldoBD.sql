--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.4
-- Dumped by pg_dump version 9.4.4
-- Started on 2015-06-22 16:22:33 VET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

DROP DATABASE "inventarioDB";
--
-- TOC entry 2121 (class 1262 OID 16385)
-- Name: inventarioDB; Type: DATABASE; Schema: -; Owner: inventario
--

CREATE DATABASE "inventarioDB" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'es_VE.UTF-8' LC_CTYPE = 'es_VE.UTF-8';


ALTER DATABASE "inventarioDB" OWNER TO inventario;

\connect "inventarioDB"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 6 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 2122 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 193 (class 3079 OID 11861)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2124 (class 0 OID 0)
-- Dependencies: 193
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 192 (class 3079 OID 16386)
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- TOC entry 2125 (class 0 OID 0)
-- Dependencies: 192
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET search_path = public, pg_catalog;

--
-- TOC entry 551 (class 1247 OID 16395)
-- Name: nombre_corto; Type: DOMAIN; Schema: public; Owner: inventario
--

CREATE DOMAIN nombre_corto AS character varying(30);


ALTER DOMAIN nombre_corto OWNER TO inventario;

--
-- TOC entry 552 (class 1247 OID 16396)
-- Name: nombre_largo; Type: DOMAIN; Schema: public; Owner: inventario
--

CREATE DOMAIN nombre_largo AS character varying(50);


ALTER DOMAIN nombre_largo OWNER TO inventario;

--
-- TOC entry 545 (class 1247 OID 16397)
-- Name: observacion_corta; Type: DOMAIN; Schema: public; Owner: inventario
--

CREATE DOMAIN observacion_corta AS character varying(200);


ALTER DOMAIN observacion_corta OWNER TO inventario;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 172 (class 1259 OID 16398)
-- Name: empresas; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE empresas (
    id integer NOT NULL,
    nombre nombre_corto NOT NULL,
    observacion observacion_corta
);


ALTER TABLE empresas OWNER TO inventario;

--
-- TOC entry 2126 (class 0 OID 0)
-- Dependencies: 172
-- Name: TABLE empresas; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE empresas IS 'Tabla catálogo de empresas';


--
-- TOC entry 173 (class 1259 OID 16404)
-- Name: empresas_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE empresas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE empresas_id_seq OWNER TO inventario;

--
-- TOC entry 2127 (class 0 OID 0)
-- Dependencies: 173
-- Name: empresas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE empresas_id_seq OWNED BY empresas.id;


--
-- TOC entry 174 (class 1259 OID 16406)
-- Name: estaciones; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE estaciones (
    id integer NOT NULL,
    estatus nombre_corto,
    usuario_nombre nombre_largo,
    usuario_indicador nombre_largo,
    usuario_id_empresa integer,
    usuario_id_gerencia integer,
    usuario_id_ubicacion integer,
    equipo_id_marca integer,
    equipo_serial nombre_largo,
    equipo_etiqueta_pdvsa nombre_largo,
    almacenamiento_ram nombre_largo,
    almacenamiento_dd nombre_largo,
    almacenamiento_dd_cantidad nombre_largo,
    procesador_marca_modelo nombre_largo,
    procesador_velocidad nombre_largo,
    procesador_cantidad nombre_largo,
    monitor_marca_modelo nombre_largo,
    "monitor_tamaño" nombre_largo,
    monitor_cantidad nombre_largo,
    video_integrada nombre_largo,
    video_memoria nombre_largo,
    video_marca_modelo nombre_largo,
    video_cantidad nombre_largo,
    red_hostname nombre_largo,
    red_vlan nombre_largo,
    red_ip nombre_largo,
    red_gateway nombre_largo,
    red_mascara nombre_largo,
    red_mac nombre_largo,
    energia_dispositivo nombre_largo,
    energia_estado nombre_largo,
    energia_marca_modelo nombre_largo,
    software_id_sistema_operativo integer,
    software_aplicaciones nombre_largo,
    observacion observacion_corta
);


ALTER TABLE estaciones OWNER TO inventario;

--
-- TOC entry 175 (class 1259 OID 16412)
-- Name: estaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE estaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE estaciones_id_seq OWNER TO inventario;

--
-- TOC entry 2128 (class 0 OID 0)
-- Dependencies: 175
-- Name: estaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE estaciones_id_seq OWNED BY estaciones.id;


--
-- TOC entry 176 (class 1259 OID 16414)
-- Name: gerencias; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE gerencias (
    id integer NOT NULL,
    nombre nombre_corto NOT NULL,
    observacion observacion_corta
);


ALTER TABLE gerencias OWNER TO inventario;

--
-- TOC entry 2129 (class 0 OID 0)
-- Dependencies: 176
-- Name: TABLE gerencias; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE gerencias IS 'Tabla catálogo de gerencias';


--
-- TOC entry 177 (class 1259 OID 16420)
-- Name: gerencias_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE gerencias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE gerencias_id_seq OWNER TO inventario;

--
-- TOC entry 2130 (class 0 OID 0)
-- Dependencies: 177
-- Name: gerencias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE gerencias_id_seq OWNED BY gerencias.id;


--
-- TOC entry 178 (class 1259 OID 16422)
-- Name: marcas; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE marcas (
    id integer NOT NULL,
    nombre nombre_corto NOT NULL,
    observacion observacion_corta
);


ALTER TABLE marcas OWNER TO inventario;

--
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 178
-- Name: TABLE marcas; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE marcas IS 'Tabla catálogo de las marcas de los equipos';


--
-- TOC entry 179 (class 1259 OID 16428)
-- Name: marcas_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE marcas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE marcas_id_seq OWNER TO inventario;

--
-- TOC entry 2132 (class 0 OID 0)
-- Dependencies: 179
-- Name: marcas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE marcas_id_seq OWNED BY marcas.id;


--
-- TOC entry 180 (class 1259 OID 16430)
-- Name: sistemas_operativos; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE sistemas_operativos (
    id integer NOT NULL,
    nombre nombre_corto NOT NULL,
    observacion observacion_corta
);


ALTER TABLE sistemas_operativos OWNER TO inventario;

--
-- TOC entry 2133 (class 0 OID 0)
-- Dependencies: 180
-- Name: TABLE sistemas_operativos; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE sistemas_operativos IS 'Tabla catálogo de los sistemas_operativos';


--
-- TOC entry 181 (class 1259 OID 16436)
-- Name: sistemas_operativos_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE sistemas_operativos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sistemas_operativos_id_seq OWNER TO inventario;

--
-- TOC entry 2134 (class 0 OID 0)
-- Dependencies: 181
-- Name: sistemas_operativos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE sistemas_operativos_id_seq OWNED BY sistemas_operativos.id;


--
-- TOC entry 182 (class 1259 OID 16438)
-- Name: ubicaciones; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE ubicaciones (
    id integer NOT NULL,
    nombre nombre_largo NOT NULL,
    observacion observacion_corta
);


ALTER TABLE ubicaciones OWNER TO inventario;

--
-- TOC entry 2135 (class 0 OID 0)
-- Dependencies: 182
-- Name: TABLE ubicaciones; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE ubicaciones IS 'Tabla catálogo de ubicaciones';


--
-- TOC entry 183 (class 1259 OID 16444)
-- Name: ubicaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE ubicaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ubicaciones_id_seq OWNER TO inventario;

--
-- TOC entry 2136 (class 0 OID 0)
-- Dependencies: 183
-- Name: ubicaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE ubicaciones_id_seq OWNED BY ubicaciones.id;


--
-- TOC entry 191 (class 1259 OID 17024)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE usuarios (
    id integer NOT NULL,
    indicador nombre_corto,
    clave nombre_largo,
    nombre nombre_largo
);


ALTER TABLE usuarios OWNER TO inventario;

--
-- TOC entry 2137 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN usuarios.nombre; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON COLUMN usuarios.nombre IS 'Nombre Completo';


--
-- TOC entry 190 (class 1259 OID 17022)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuarios_id_seq OWNER TO inventario;

--
-- TOC entry 2138 (class 0 OID 0)
-- Dependencies: 190
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- TOC entry 184 (class 1259 OID 16446)
-- Name: vista_empresas; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_empresas AS
 SELECT empresas.id,
    empresas.nombre,
    empresas.observacion
   FROM empresas
  WHERE (empresas.id <> 1);


ALTER TABLE vista_empresas OWNER TO inventario;

--
-- TOC entry 189 (class 1259 OID 16516)
-- Name: vista_estaciones; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_estaciones AS
 SELECT es.id,
    es.estatus,
    es.usuario_nombre,
    es.usuario_indicador,
    em.nombre AS usuario_empresa,
    ge.nombre AS usuario_gerencia,
    ub.nombre AS usuario_ubicacion,
    ma.nombre AS equipo_marca,
    es.equipo_serial,
    es.equipo_etiqueta_pdvsa,
    es.almacenamiento_ram,
    es.almacenamiento_dd,
    es.almacenamiento_dd_cantidad,
    es.procesador_marca_modelo,
    es.procesador_velocidad,
    es.procesador_cantidad,
    es.monitor_marca_modelo,
    es."monitor_tamaño",
    es.monitor_cantidad,
    es.video_integrada,
    es.video_memoria,
    es.video_marca_modelo,
    es.video_cantidad,
    es.red_hostname,
    es.red_vlan,
    es.red_ip,
    es.red_gateway,
    es.red_mascara,
    es.red_mac,
    es.energia_dispositivo,
    es.energia_estado,
    es.energia_marca_modelo,
    so.nombre AS software_sistema_operativo,
    es.software_aplicaciones,
    es.observacion
   FROM (((((estaciones es
     JOIN empresas em ON ((es.usuario_id_empresa = em.id)))
     JOIN gerencias ge ON ((es.usuario_id_gerencia = ge.id)))
     JOIN ubicaciones ub ON ((es.usuario_id_ubicacion = ub.id)))
     JOIN marcas ma ON ((es.equipo_id_marca = ma.id)))
     JOIN sistemas_operativos so ON ((es.software_id_sistema_operativo = so.id)));


ALTER TABLE vista_estaciones OWNER TO inventario;

--
-- TOC entry 185 (class 1259 OID 16450)
-- Name: vista_gerencias; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_gerencias AS
 SELECT gerencias.id,
    gerencias.nombre,
    gerencias.observacion
   FROM gerencias
  WHERE (gerencias.id <> 1);


ALTER TABLE vista_gerencias OWNER TO inventario;

--
-- TOC entry 186 (class 1259 OID 16454)
-- Name: vista_marcas; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_marcas AS
 SELECT marcas.id,
    marcas.nombre,
    marcas.observacion
   FROM marcas
  WHERE (marcas.id <> 1);


ALTER TABLE vista_marcas OWNER TO inventario;

--
-- TOC entry 187 (class 1259 OID 16458)
-- Name: vista_sistemas_operativos; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_sistemas_operativos AS
 SELECT sistemas_operativos.id,
    sistemas_operativos.nombre,
    sistemas_operativos.observacion
   FROM sistemas_operativos
  WHERE (sistemas_operativos.id <> 1);


ALTER TABLE vista_sistemas_operativos OWNER TO inventario;

--
-- TOC entry 188 (class 1259 OID 16462)
-- Name: vista_ubicaciones; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_ubicaciones AS
 SELECT ubicaciones.id,
    ubicaciones.nombre,
    ubicaciones.observacion
   FROM ubicaciones
  WHERE (ubicaciones.id <> 1);


ALTER TABLE vista_ubicaciones OWNER TO inventario;

--
-- TOC entry 1956 (class 2604 OID 16466)
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY empresas ALTER COLUMN id SET DEFAULT nextval('empresas_id_seq'::regclass);


--
-- TOC entry 1957 (class 2604 OID 16467)
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones ALTER COLUMN id SET DEFAULT nextval('estaciones_id_seq'::regclass);


--
-- TOC entry 1958 (class 2604 OID 16468)
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY gerencias ALTER COLUMN id SET DEFAULT nextval('gerencias_id_seq'::regclass);


--
-- TOC entry 1959 (class 2604 OID 16469)
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY marcas ALTER COLUMN id SET DEFAULT nextval('marcas_id_seq'::regclass);


--
-- TOC entry 1960 (class 2604 OID 16470)
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY sistemas_operativos ALTER COLUMN id SET DEFAULT nextval('sistemas_operativos_id_seq'::regclass);


--
-- TOC entry 1961 (class 2604 OID 16471)
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY ubicaciones ALTER COLUMN id SET DEFAULT nextval('ubicaciones_id_seq'::regclass);


--
-- TOC entry 1962 (class 2604 OID 17027)
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- TOC entry 2103 (class 0 OID 16398)
-- Dependencies: 172
-- Data for Name: empresas; Type: TABLE DATA; Schema: public; Owner: inventario
--

INSERT INTO empresas (id, nombre, observacion) VALUES (1, 'NADA', NULL);
INSERT INTO empresas (id, nombre, observacion) VALUES (8, 'PETROMONAGAS', '');


--
-- TOC entry 2139 (class 0 OID 0)
-- Dependencies: 173
-- Name: empresas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('empresas_id_seq', 8, true);


--
-- TOC entry 2105 (class 0 OID 16406)
-- Dependencies: 174
-- Data for Name: estaciones; Type: TABLE DATA; Schema: public; Owner: inventario
--

INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (5, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAA', '10.60.9.1', '10.60.9.100', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (6, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAB', '10.60.9.1', '10.60.9.102', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (7, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAC', '10.60.9.1', '10.60.9.103', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (8, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAD', '10.60.9.1', '10.60.9.104', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (9, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAE', '10.60.9.1', '10.60.9.105', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (10, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAF', '10.60.9.1', '10.60.9.106', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (11, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAG', '10.60.9.1', '10.60.9.107', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (12, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAH', '10.60.9.1', '10.60.9.108', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (13, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAI', '10.60.9.1', '10.60.9.109', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (14, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAJ', '10.60.9.1', '10.60.9.110', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (15, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAK', '10.60.9.1', '10.60.9.111', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (16, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAL', '10.60.9.1', '10.60.9.112', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (17, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAM', '10.60.9.1', '10.60.9.113', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (18, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAN', '10.60.9.1', '10.60.9.114', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (19, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAO', '10.60.9.1', '10.60.9.115', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (20, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAP', '10.60.9.1', '10.60.9.116', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (21, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAQ', '10.60.9.1', '10.60.9.117', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (22, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAR', '10.60.9.1', '10.60.9.118', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) VALUES (23, 'Sin Asignar', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PMGCBPAS', '10.60.9.1', '10.60.9.119', '10.60.9.101', '255.255.255.192', NULL, NULL, NULL, NULL, 1, NULL, NULL);


--
-- TOC entry 2140 (class 0 OID 0)
-- Dependencies: 175
-- Name: estaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('estaciones_id_seq', 23, true);


--
-- TOC entry 2107 (class 0 OID 16414)
-- Dependencies: 176
-- Data for Name: gerencias; Type: TABLE DATA; Schema: public; Owner: inventario
--

INSERT INTO gerencias (id, nombre, observacion) VALUES (1, 'NADA', NULL);


--
-- TOC entry 2141 (class 0 OID 0)
-- Dependencies: 177
-- Name: gerencias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('gerencias_id_seq', 2, true);


--
-- TOC entry 2109 (class 0 OID 16422)
-- Dependencies: 178
-- Data for Name: marcas; Type: TABLE DATA; Schema: public; Owner: inventario
--

INSERT INTO marcas (id, nombre, observacion) VALUES (1, 'NADA', NULL);


--
-- TOC entry 2142 (class 0 OID 0)
-- Dependencies: 179
-- Name: marcas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('marcas_id_seq', 2, true);


--
-- TOC entry 2111 (class 0 OID 16430)
-- Dependencies: 180
-- Data for Name: sistemas_operativos; Type: TABLE DATA; Schema: public; Owner: inventario
--

INSERT INTO sistemas_operativos (id, nombre, observacion) VALUES (1, 'NADA', NULL);


--
-- TOC entry 2143 (class 0 OID 0)
-- Dependencies: 181
-- Name: sistemas_operativos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('sistemas_operativos_id_seq', 2, true);


--
-- TOC entry 2113 (class 0 OID 16438)
-- Dependencies: 182
-- Data for Name: ubicaciones; Type: TABLE DATA; Schema: public; Owner: inventario
--

INSERT INTO ubicaciones (id, nombre, observacion) VALUES (1, 'NADA', NULL);


--
-- TOC entry 2144 (class 0 OID 0)
-- Dependencies: 183
-- Name: ubicaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('ubicaciones_id_seq', 2, true);


--
-- TOC entry 2116 (class 0 OID 17024)
-- Dependencies: 191
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: inventario
--

INSERT INTO usuarios (id, indicador, clave, nombre) VALUES (1, 'dasilvajm', '123456', 'Jesús Dasilva');
INSERT INTO usuarios (id, indicador, clave, nombre) VALUES (2, 'murgasc', '123456', 'Carlos Murgas');
INSERT INTO usuarios (id, indicador, clave, nombre) VALUES (3, 'levyj', '123456', 'Jonathan Levy');
INSERT INTO usuarios (id, indicador, clave, nombre) VALUES (4, 'rodriguezatc', '123456', 'Aronsis Rodriguez');
INSERT INTO usuarios (id, indicador, clave, nombre) VALUES (5, 'rodriguezjfu', '123456', 'José Felix Rodriguez');
INSERT INTO usuarios (id, indicador, clave, nombre) VALUES (6, 'rodriguezjrv', '123456', 'Jeison Rafael Rodriguez');
INSERT INTO usuarios (id, indicador, clave, nombre) VALUES (7, 'mujicass', '123456', 'Suelen Mujicas');


--
-- TOC entry 2145 (class 0 OID 0)
-- Dependencies: 190
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('usuarios_id_seq', 6, true);


--
-- TOC entry 1964 (class 2606 OID 16473)
-- Name: empresas_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY empresas
    ADD CONSTRAINT empresas_pkey PRIMARY KEY (id);


--
-- TOC entry 1974 (class 2606 OID 16475)
-- Name: gerencias_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY gerencias
    ADD CONSTRAINT gerencias_pkey PRIMARY KEY (id);


--
-- TOC entry 1976 (class 2606 OID 16477)
-- Name: marcas_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY marcas
    ADD CONSTRAINT marcas_pkey PRIMARY KEY (id);


--
-- TOC entry 1972 (class 2606 OID 16479)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id);


--
-- TOC entry 1978 (class 2606 OID 16481)
-- Name: sistemas_operativos_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY sistemas_operativos
    ADD CONSTRAINT sistemas_operativos_pkey PRIMARY KEY (id);


--
-- TOC entry 1980 (class 2606 OID 16483)
-- Name: ubicaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY ubicaciones
    ADD CONSTRAINT ubicaciones_pkey PRIMARY KEY (id);


--
-- TOC entry 1982 (class 2606 OID 17032)
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- TOC entry 1965 (class 1259 OID 16484)
-- Name: fki_empresa; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_empresa ON estaciones USING btree (usuario_id_empresa);


--
-- TOC entry 1966 (class 1259 OID 16485)
-- Name: fki_gerencia; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_gerencia ON estaciones USING btree (usuario_id_gerencia);


--
-- TOC entry 1967 (class 1259 OID 16486)
-- Name: fki_marca; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_marca ON estaciones USING btree (equipo_id_marca);


--
-- TOC entry 1968 (class 1259 OID 16487)
-- Name: fki_sistema_operativo; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_sistema_operativo ON estaciones USING btree (software_id_sistema_operativo);


--
-- TOC entry 1969 (class 1259 OID 16488)
-- Name: fki_ubicacion; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_ubicacion ON estaciones USING btree (usuario_id_ubicacion);


--
-- TOC entry 1970 (class 1259 OID 16489)
-- Name: indx_red_ip; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX indx_red_ip ON estaciones USING btree (red_ip);


--
-- TOC entry 1983 (class 2606 OID 16490)
-- Name: fk_empresa; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_empresa FOREIGN KEY (usuario_id_empresa) REFERENCES empresas(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1984 (class 2606 OID 16495)
-- Name: fk_gerencia; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_gerencia FOREIGN KEY (usuario_id_gerencia) REFERENCES gerencias(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1985 (class 2606 OID 16500)
-- Name: fk_marca; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_marca FOREIGN KEY (equipo_id_marca) REFERENCES marcas(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1986 (class 2606 OID 16505)
-- Name: fk_sistema_operativo; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_sistema_operativo FOREIGN KEY (software_id_sistema_operativo) REFERENCES empresas(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1987 (class 2606 OID 16510)
-- Name: fk_ubicacion; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_ubicacion FOREIGN KEY (usuario_id_ubicacion) REFERENCES ubicaciones(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2123 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-06-22 16:22:33 VET

--
-- PostgreSQL database dump complete
--

