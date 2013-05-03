--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cargos; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE cargos (
    id integer NOT NULL,
    cargo character varying(50) NOT NULL,
    status character varying(20) DEFAULT 'activo'::character varying NOT NULL
);


ALTER TABLE public.cargos OWNER TO johel;

--
-- Name: cargos_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE cargos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cargos_id_seq OWNER TO johel;

--
-- Name: cargos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE cargos_id_seq OWNED BY cargos.id;


--
-- Name: cargos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('cargos_id_seq', 3, true);


--
-- Name: documentos; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE documentos (
    id integer NOT NULL,
    titulo character varying(50) NOT NULL,
    descripcion text NOT NULL,
    status character varying(20) NOT NULL
);


ALTER TABLE public.documentos OWNER TO johel;

--
-- Name: documentos_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE documentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.documentos_id_seq OWNER TO johel;

--
-- Name: documentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE documentos_id_seq OWNED BY documentos.id;


--
-- Name: documentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('documentos_id_seq', 1, false);


--
-- Name: estaciones; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE estaciones (
    id integer NOT NULL,
    ruta_fkey integer NOT NULL,
    unidad_fkey integer NOT NULL,
    cargo_fkey integer NOT NULL,
    usuario_fkey integer NOT NULL,
    orden integer NOT NULL,
    horas integer NOT NULL,
    descripcion text NOT NULL
);


ALTER TABLE public.estaciones OWNER TO johel;

--
-- Name: estaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE estaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.estaciones_id_seq OWNER TO johel;

--
-- Name: estaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE estaciones_id_seq OWNED BY estaciones.id;


--
-- Name: estaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('estaciones_id_seq', 8, true);


--
-- Name: rutas; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE rutas (
    id integer NOT NULL,
    ruta character varying(50) NOT NULL,
    status character varying(20) DEFAULT 'activo'::character varying NOT NULL
);


ALTER TABLE public.rutas OWNER TO johel;

--
-- Name: rutas_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE rutas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.rutas_id_seq OWNER TO johel;

--
-- Name: rutas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE rutas_id_seq OWNED BY rutas.id;


--
-- Name: rutas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('rutas_id_seq', 13, true);


--
-- Name: unidades; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE unidades (
    id integer NOT NULL,
    unidad character varying(50) NOT NULL,
    status character varying(20) DEFAULT 'activo'::character varying
);


ALTER TABLE public.unidades OWNER TO johel;

--
-- Name: unidades_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE unidades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.unidades_id_seq OWNER TO johel;

--
-- Name: unidades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE unidades_id_seq OWNED BY unidades.id;


--
-- Name: unidades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('unidades_id_seq', 89, true);


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE usuarios (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    clave character varying(128) NOT NULL,
    cedula character varying(15),
    nombre character varying(50) NOT NULL,
    status character varying(20) DEFAULT 'activo'::character varying
);


ALTER TABLE public.usuarios OWNER TO johel;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO johel;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('usuarios_id_seq', 1, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY cargos ALTER COLUMN id SET DEFAULT nextval('cargos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY documentos ALTER COLUMN id SET DEFAULT nextval('documentos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY estaciones ALTER COLUMN id SET DEFAULT nextval('estaciones_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY rutas ALTER COLUMN id SET DEFAULT nextval('rutas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY unidades ALTER COLUMN id SET DEFAULT nextval('unidades_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: cargos; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY cargos (id, cargo, status) FROM stdin;
1	Asistente	activo
2	Director	activo
3	Jefe de unidad	activo
\.


--
-- Data for Name: documentos; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY documentos (id, titulo, descripcion, status) FROM stdin;
\.


--
-- Data for Name: estaciones; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY estaciones (id, ruta_fkey, unidad_fkey, cargo_fkey, usuario_fkey, orden, horas, descripcion) FROM stdin;
3	12	89	1	1	1	2	fsdfdfds
4	12	84	2	1	22	223	342342
5	12	85	1	1	1	2	gdfg sfhs hs
6	12	85	1	1	111	222	asdasdasda
7	12	83	2	1	1	3543453	gsdgfs
8	12	85	1	1	1	1	aasdasdas dasd as dasd sdfadsg adg adg fadfg adfg adfga
\.


--
-- Data for Name: rutas; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY rutas (id, ruta, status) FROM stdin;
12	Control de Obras Públicas	activo
13	12	activo
\.


--
-- Data for Name: unidades; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY unidades (id, unidad, status) FROM stdin;
83	Dirección de Informática	activo
84	Dirección de Gestión Interna	activo
86	Dirección de Recursos Humanos	activo
87	Dirección de Inquilinato	activo
88	Jefatura de Compras y Suministros	activo
89	Direccion de Hacienda Municipal	activo
85	Dirección de Gestion Externa	activo
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY usuarios (id, usuario, clave, cedula, nombre, status) FROM stdin;
1	cedielj@alcaldiadeguacara.gob.ve	e10adc3949ba59abbe56e057f20f883e	V17515094	Johel Cediel	activo
\.


--
-- Name: cargos_cargo_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY cargos
    ADD CONSTRAINT cargos_cargo_key UNIQUE (cargo);


--
-- Name: cargos_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY cargos
    ADD CONSTRAINT cargos_pkey PRIMARY KEY (id);


--
-- Name: documentos_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_pkey PRIMARY KEY (id);


--
-- Name: estaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT estaciones_pkey PRIMARY KEY (id);


--
-- Name: rutas_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY rutas
    ADD CONSTRAINT rutas_pkey PRIMARY KEY (id);


--
-- Name: rutas_ruta_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY rutas
    ADD CONSTRAINT rutas_ruta_key UNIQUE (ruta);


--
-- Name: unidades_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY unidades
    ADD CONSTRAINT unidades_pkey PRIMARY KEY (id);


--
-- Name: unidades_unidad_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY unidades
    ADD CONSTRAINT unidades_unidad_key UNIQUE (unidad);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: usuarios_usuario_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_usuario_key UNIQUE (usuario);


--
-- Name: estaciones_cargo_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT estaciones_cargo_fkey_fkey FOREIGN KEY (cargo_fkey) REFERENCES cargos(id);


--
-- Name: estaciones_ruta_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT estaciones_ruta_fkey_fkey FOREIGN KEY (ruta_fkey) REFERENCES rutas(id);


--
-- Name: estaciones_unidad_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT estaciones_unidad_fkey_fkey FOREIGN KEY (unidad_fkey) REFERENCES unidades(id);


--
-- Name: estaciones_usuario_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY estaciones
    ADD CONSTRAINT estaciones_usuario_fkey_fkey FOREIGN KEY (usuario_fkey) REFERENCES usuarios(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

