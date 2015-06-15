--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.14
-- Dumped by pg_dump version 9.1.14
-- Started on 2015-06-15 10:02:33 VET

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 179 (class 3079 OID 11645)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1965 (class 0 OID 0)
-- Dependencies: 179
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 178 (class 3079 OID 16791)
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- TOC entry 1966 (class 0 OID 0)
-- Dependencies: 178
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET search_path = public, pg_catalog;

--
-- TOC entry 500 (class 1247 OID 16386)
-- Dependencies: 5
-- Name: nombre_corto; Type: DOMAIN; Schema: public; Owner: inventario
--

CREATE DOMAIN nombre_corto AS character varying(30) NOT NULL;


ALTER DOMAIN public.nombre_corto OWNER TO inventario;

--
-- TOC entry 501 (class 1247 OID 16387)
-- Dependencies: 5
-- Name: nombre_largo; Type: DOMAIN; Schema: public; Owner: inventario
--

CREATE DOMAIN nombre_largo AS character varying(50) NOT NULL;


ALTER DOMAIN public.nombre_largo OWNER TO inventario;

--
-- TOC entry 502 (class 1247 OID 16388)
-- Dependencies: 5
-- Name: observacion_corta; Type: DOMAIN; Schema: public; Owner: inventario
--

CREATE DOMAIN observacion_corta AS character varying(200);


ALTER DOMAIN public.observacion_corta OWNER TO inventario;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 162 (class 1259 OID 16391)
-- Dependencies: 500 5 502
-- Name: empresas; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE empresas (
    id integer NOT NULL,
    nombre nombre_corto NOT NULL,
    observacion observacion_corta
);


ALTER TABLE public.empresas OWNER TO inventario;

--
-- TOC entry 1967 (class 0 OID 0)
-- Dependencies: 162
-- Name: TABLE empresas; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE empresas IS 'Tabla catálogo de empresas';


--
-- TOC entry 161 (class 1259 OID 16389)
-- Dependencies: 5 162
-- Name: empresas_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE empresas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.empresas_id_seq OWNER TO inventario;

--
-- TOC entry 1968 (class 0 OID 0)
-- Dependencies: 161
-- Name: empresas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE empresas_id_seq OWNED BY empresas.id;


--
-- TOC entry 172 (class 1259 OID 16731)
-- Dependencies: 501 5 502 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 501 500
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


ALTER TABLE public.estaciones OWNER TO inventario;

--
-- TOC entry 171 (class 1259 OID 16729)
-- Dependencies: 172 5
-- Name: estaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE estaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estaciones_id_seq OWNER TO inventario;

--
-- TOC entry 1969 (class 0 OID 0)
-- Dependencies: 171
-- Name: estaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE estaciones_id_seq OWNED BY estaciones.id;


--
-- TOC entry 164 (class 1259 OID 16402)
-- Dependencies: 5 502 500
-- Name: gerencias; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE gerencias (
    id integer NOT NULL,
    nombre nombre_corto NOT NULL,
    observacion observacion_corta
);


ALTER TABLE public.gerencias OWNER TO inventario;

--
-- TOC entry 1970 (class 0 OID 0)
-- Dependencies: 164
-- Name: TABLE gerencias; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE gerencias IS 'Tabla catálogo de gerencias';


--
-- TOC entry 163 (class 1259 OID 16400)
-- Dependencies: 5 164
-- Name: gerencias_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE gerencias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gerencias_id_seq OWNER TO inventario;

--
-- TOC entry 1971 (class 0 OID 0)
-- Dependencies: 163
-- Name: gerencias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE gerencias_id_seq OWNED BY gerencias.id;


--
-- TOC entry 166 (class 1259 OID 16413)
-- Dependencies: 502 500 5
-- Name: marcas; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE marcas (
    id integer NOT NULL,
    nombre nombre_corto NOT NULL,
    observacion observacion_corta
);


ALTER TABLE public.marcas OWNER TO inventario;

--
-- TOC entry 1972 (class 0 OID 0)
-- Dependencies: 166
-- Name: TABLE marcas; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE marcas IS 'Tabla catálogo de las marcas de los equipos';


--
-- TOC entry 165 (class 1259 OID 16411)
-- Dependencies: 5 166
-- Name: marcas_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE marcas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.marcas_id_seq OWNER TO inventario;

--
-- TOC entry 1973 (class 0 OID 0)
-- Dependencies: 165
-- Name: marcas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE marcas_id_seq OWNED BY marcas.id;


--
-- TOC entry 168 (class 1259 OID 16424)
-- Dependencies: 5 500 502
-- Name: sistemas_operativos; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE sistemas_operativos (
    id integer NOT NULL,
    nombre nombre_corto NOT NULL,
    observacion observacion_corta
);


ALTER TABLE public.sistemas_operativos OWNER TO inventario;

--
-- TOC entry 1974 (class 0 OID 0)
-- Dependencies: 168
-- Name: TABLE sistemas_operativos; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE sistemas_operativos IS 'Tabla catálogo de los sistemas_operativos';


--
-- TOC entry 167 (class 1259 OID 16422)
-- Dependencies: 5 168
-- Name: sistemas_operativos_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE sistemas_operativos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sistemas_operativos_id_seq OWNER TO inventario;

--
-- TOC entry 1975 (class 0 OID 0)
-- Dependencies: 167
-- Name: sistemas_operativos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE sistemas_operativos_id_seq OWNED BY sistemas_operativos.id;


--
-- TOC entry 170 (class 1259 OID 16435)
-- Dependencies: 502 5 501
-- Name: ubicaciones; Type: TABLE; Schema: public; Owner: inventario; Tablespace: 
--

CREATE TABLE ubicaciones (
    id integer NOT NULL,
    nombre nombre_largo NOT NULL,
    observacion observacion_corta
);


ALTER TABLE public.ubicaciones OWNER TO inventario;

--
-- TOC entry 1976 (class 0 OID 0)
-- Dependencies: 170
-- Name: TABLE ubicaciones; Type: COMMENT; Schema: public; Owner: inventario
--

COMMENT ON TABLE ubicaciones IS 'Tabla catálogo de ubicaciones';


--
-- TOC entry 169 (class 1259 OID 16433)
-- Dependencies: 170 5
-- Name: ubicaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: inventario
--

CREATE SEQUENCE ubicaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ubicaciones_id_seq OWNER TO inventario;

--
-- TOC entry 1977 (class 0 OID 0)
-- Dependencies: 169
-- Name: ubicaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: inventario
--

ALTER SEQUENCE ubicaciones_id_seq OWNED BY ubicaciones.id;


--
-- TOC entry 173 (class 1259 OID 16771)
-- Dependencies: 1941 500 5 502
-- Name: vista_empresas; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_empresas AS
    SELECT empresas.id, empresas.nombre, empresas.observacion FROM empresas WHERE (empresas.id <> 1);


ALTER TABLE public.vista_empresas OWNER TO inventario;

--
-- TOC entry 174 (class 1259 OID 16775)
-- Dependencies: 1942 5 502 500
-- Name: vista_gerencias; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_gerencias AS
    SELECT gerencias.id, gerencias.nombre, gerencias.observacion FROM gerencias WHERE (gerencias.id <> 1);


ALTER TABLE public.vista_gerencias OWNER TO inventario;

--
-- TOC entry 176 (class 1259 OID 16783)
-- Dependencies: 1944 5 502 500
-- Name: vista_marcas; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_marcas AS
    SELECT marcas.id, marcas.nombre, marcas.observacion FROM marcas WHERE (marcas.id <> 1);


ALTER TABLE public.vista_marcas OWNER TO inventario;

--
-- TOC entry 177 (class 1259 OID 16787)
-- Dependencies: 1945 502 5 500
-- Name: vista_sistemas_operativos; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_sistemas_operativos AS
    SELECT sistemas_operativos.id, sistemas_operativos.nombre, sistemas_operativos.observacion FROM sistemas_operativos WHERE (sistemas_operativos.id <> 1);


ALTER TABLE public.vista_sistemas_operativos OWNER TO inventario;

--
-- TOC entry 175 (class 1259 OID 16779)
-- Dependencies: 1943 5 501 502
-- Name: vista_ubicaciones; Type: VIEW; Schema: public; Owner: inventario
--

CREATE VIEW vista_ubicaciones AS
    SELECT ubicaciones.id, ubicaciones.nombre, ubicaciones.observacion FROM ubicaciones WHERE (ubicaciones.id <> 1);


ALTER TABLE public.vista_ubicaciones OWNER TO inventario;

--
-- TOC entry 1811 (class 2604 OID 16394)
-- Dependencies: 161 162 162
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY empresas ALTER COLUMN id SET DEFAULT nextval('empresas_id_seq'::regclass);


--
-- TOC entry 1816 (class 2604 OID 16734)
-- Dependencies: 171 172 172
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones ALTER COLUMN id SET DEFAULT nextval('estaciones_id_seq'::regclass);


--
-- TOC entry 1812 (class 2604 OID 16405)
-- Dependencies: 164 163 164
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY gerencias ALTER COLUMN id SET DEFAULT nextval('gerencias_id_seq'::regclass);


--
-- TOC entry 1813 (class 2604 OID 16416)
-- Dependencies: 166 165 166
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY marcas ALTER COLUMN id SET DEFAULT nextval('marcas_id_seq'::regclass);


--
-- TOC entry 1814 (class 2604 OID 16427)
-- Dependencies: 168 167 168
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY sistemas_operativos ALTER COLUMN id SET DEFAULT nextval('sistemas_operativos_id_seq'::regclass);


--
-- TOC entry 1815 (class 2604 OID 16438)
-- Dependencies: 169 170 170
-- Name: id; Type: DEFAULT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY ubicaciones ALTER COLUMN id SET DEFAULT nextval('ubicaciones_id_seq'::regclass);


--
-- TOC entry 1947 (class 0 OID 16391)
-- Dependencies: 162 1958
-- Data for Name: empresas; Type: TABLE DATA; Schema: public; Owner: inventario
--

COPY empresas (id, nombre, observacion) FROM stdin;
1	NADA	SIN ASIGNACIÓN
\.


--
-- TOC entry 1978 (class 0 OID 0)
-- Dependencies: 161
-- Name: empresas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('empresas_id_seq', 7, true);


--
-- TOC entry 1957 (class 0 OID 16731)
-- Dependencies: 172 1958
-- Data for Name: estaciones; Type: TABLE DATA; Schema: public; Owner: inventario
--

COPY estaciones (id, estatus, usuario_nombre, usuario_indicador, usuario_id_empresa, usuario_id_gerencia, usuario_id_ubicacion, equipo_id_marca, equipo_serial, equipo_etiqueta_pdvsa, almacenamiento_ram, almacenamiento_dd, almacenamiento_dd_cantidad, procesador_marca_modelo, procesador_velocidad, procesador_cantidad, monitor_marca_modelo, "monitor_tamaño", monitor_cantidad, video_integrada, video_memoria, video_marca_modelo, video_cantidad, red_hostname, red_vlan, red_ip, red_gateway, red_mascara, red_mac, energia_dispositivo, energia_estado, energia_marca_modelo, software_id_sistema_operativo, software_aplicaciones, observacion) FROM stdin;
\.


--
-- TOC entry 1979 (class 0 OID 0)
-- Dependencies: 171
-- Name: estaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('estaciones_id_seq', 2, true);


--
-- TOC entry 1949 (class 0 OID 16402)
-- Dependencies: 164 1958
-- Data for Name: gerencias; Type: TABLE DATA; Schema: public; Owner: inventario
--

COPY gerencias (id, nombre, observacion) FROM stdin;
1	NADA	\N
\.


--
-- TOC entry 1980 (class 0 OID 0)
-- Dependencies: 163
-- Name: gerencias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('gerencias_id_seq', 2, true);


--
-- TOC entry 1951 (class 0 OID 16413)
-- Dependencies: 166 1958
-- Data for Name: marcas; Type: TABLE DATA; Schema: public; Owner: inventario
--

COPY marcas (id, nombre, observacion) FROM stdin;
1	NADA	\N
\.


--
-- TOC entry 1981 (class 0 OID 0)
-- Dependencies: 165
-- Name: marcas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('marcas_id_seq', 2, true);


--
-- TOC entry 1953 (class 0 OID 16424)
-- Dependencies: 168 1958
-- Data for Name: sistemas_operativos; Type: TABLE DATA; Schema: public; Owner: inventario
--

COPY sistemas_operativos (id, nombre, observacion) FROM stdin;
1	NADA	\N
\.


--
-- TOC entry 1982 (class 0 OID 0)
-- Dependencies: 167
-- Name: sistemas_operativos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('sistemas_operativos_id_seq', 2, true);


--
-- TOC entry 1955 (class 0 OID 16435)
-- Dependencies: 170 1958
-- Data for Name: ubicaciones; Type: TABLE DATA; Schema: public; Owner: inventario
--

COPY ubicaciones (id, nombre, observacion) FROM stdin;
1	NADA	\N
\.


--
-- TOC entry 1983 (class 0 OID 0)
-- Dependencies: 169
-- Name: ubicaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: inventario
--

SELECT pg_catalog.setval('ubicaciones_id_seq', 2, true);


--
-- TOC entry 1818 (class 2606 OID 16399)
-- Dependencies: 162 162 1959
-- Name: empresas_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY empresas
    ADD CONSTRAINT empresas_pkey PRIMARY KEY (id);


--
-- TOC entry 1820 (class 2606 OID 16410)
-- Dependencies: 164 164 1959
-- Name: gerencias_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY gerencias
    ADD CONSTRAINT gerencias_pkey PRIMARY KEY (id);


--
-- TOC entry 1822 (class 2606 OID 16421)
-- Dependencies: 166 166 1959
-- Name: marcas_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY marcas
    ADD CONSTRAINT marcas_pkey PRIMARY KEY (id);


--
-- TOC entry 1834 (class 2606 OID 16739)
-- Dependencies: 172 172 1959
-- Name: pk_empresa; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id);


--
-- TOC entry 1824 (class 2606 OID 16432)
-- Dependencies: 168 168 1959
-- Name: sistemas_operativos_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY sistemas_operativos
    ADD CONSTRAINT sistemas_operativos_pkey PRIMARY KEY (id);


--
-- TOC entry 1826 (class 2606 OID 16443)
-- Dependencies: 170 170 1959
-- Name: ubicaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: inventario; Tablespace: 
--

ALTER TABLE ONLY ubicaciones
    ADD CONSTRAINT ubicaciones_pkey PRIMARY KEY (id);


--
-- TOC entry 1827 (class 1259 OID 16765)
-- Dependencies: 172 1959
-- Name: fki_empresa; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_empresa ON estaciones USING btree (usuario_id_empresa);


--
-- TOC entry 1828 (class 1259 OID 16766)
-- Dependencies: 172 1959
-- Name: fki_gerencia; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_gerencia ON estaciones USING btree (usuario_id_gerencia);


--
-- TOC entry 1829 (class 1259 OID 16767)
-- Dependencies: 172 1959
-- Name: fki_marca; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_marca ON estaciones USING btree (equipo_id_marca);


--
-- TOC entry 1830 (class 1259 OID 16768)
-- Dependencies: 172 1959
-- Name: fki_sistema_operativo; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_sistema_operativo ON estaciones USING btree (software_id_sistema_operativo);


--
-- TOC entry 1831 (class 1259 OID 16769)
-- Dependencies: 172 1959
-- Name: fki_ubicacion; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX fki_ubicacion ON estaciones USING btree (usuario_id_ubicacion);


--
-- TOC entry 1832 (class 1259 OID 16770)
-- Dependencies: 172 1959
-- Name: indx_red_ip; Type: INDEX; Schema: public; Owner: inventario; Tablespace: 
--

CREATE INDEX indx_red_ip ON estaciones USING btree (red_ip);


--
-- TOC entry 1835 (class 2606 OID 16740)
-- Dependencies: 172 162 1817 1959
-- Name: fk_empresa; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_empresa FOREIGN KEY (usuario_id_empresa) REFERENCES empresas(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1836 (class 2606 OID 16745)
-- Dependencies: 164 172 1819 1959
-- Name: fk_gerencia; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_gerencia FOREIGN KEY (usuario_id_gerencia) REFERENCES gerencias(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1837 (class 2606 OID 16750)
-- Dependencies: 172 166 1821 1959
-- Name: fk_marca; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_marca FOREIGN KEY (equipo_id_marca) REFERENCES marcas(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1838 (class 2606 OID 16755)
-- Dependencies: 172 1817 162 1959
-- Name: fk_sistema_operativo; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_sistema_operativo FOREIGN KEY (software_id_sistema_operativo) REFERENCES empresas(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1839 (class 2606 OID 16760)
-- Dependencies: 170 172 1825 1959
-- Name: fk_ubicacion; Type: FK CONSTRAINT; Schema: public; Owner: inventario
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT fk_ubicacion FOREIGN KEY (usuario_id_ubicacion) REFERENCES ubicaciones(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 1964 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-06-15 10:02:33 VET

--
-- PostgreSQL database dump complete
--

