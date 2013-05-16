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
-- Name: configuraciones; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE configuraciones (
    id integer NOT NULL,
    dias_laborables character varying(50) DEFAULT 'lun:mar:mie:jue:vie'::character varying NOT NULL,
    horas_laborables_por_dia integer DEFAULT 8 NOT NULL
);


ALTER TABLE public.configuraciones OWNER TO johel;

--
-- Name: configuraciones_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE configuraciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.configuraciones_id_seq OWNER TO johel;

--
-- Name: configuraciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE configuraciones_id_seq OWNED BY configuraciones.id;


--
-- Name: configuraciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('configuraciones_id_seq', 1, true);


--
-- Name: documentos; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE documentos (
    id integer NOT NULL,
    titulo character varying(50) NOT NULL,
    descripcion text NOT NULL,
    status character varying(20) DEFAULT 'en curso'::character varying NOT NULL,
    "timestamp" integer DEFAULT 0 NOT NULL,
    ruta_fkey integer NOT NULL
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

SELECT pg_catalog.setval('documentos_id_seq', 43, true);


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

SELECT pg_catalog.setval('estaciones_id_seq', 50, true);


--
-- Name: movimientos; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE movimientos (
    id integer NOT NULL,
    documento_fkey integer NOT NULL,
    unidad_fkey integer NOT NULL,
    cargo_fkey integer NOT NULL,
    usuario_fkey integer NOT NULL,
    descripcion text NOT NULL,
    orden integer NOT NULL,
    horas integer NOT NULL,
    observacion text,
    "timestamp" integer
);


ALTER TABLE public.movimientos OWNER TO johel;

--
-- Name: movimientos_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE movimientos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.movimientos_id_seq OWNER TO johel;

--
-- Name: movimientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE movimientos_id_seq OWNED BY movimientos.id;


--
-- Name: movimientos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('movimientos_id_seq', 17, true);


--
-- Name: permisos; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE permisos (
    id integer NOT NULL,
    permiso character varying(50) NOT NULL,
    descripcion text NOT NULL,
    status character varying(20) DEFAULT 'activo'::character varying NOT NULL
);


ALTER TABLE public.permisos OWNER TO johel;

--
-- Name: permisos_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE permisos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.permisos_id_seq OWNER TO johel;

--
-- Name: permisos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE permisos_id_seq OWNED BY permisos.id;


--
-- Name: permisos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('permisos_id_seq', 18, true);


--
-- Name: roles; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE roles (
    id integer NOT NULL,
    rol character varying(20) NOT NULL,
    status character varying(20) DEFAULT 'activo'::character varying NOT NULL
);


ALTER TABLE public.roles OWNER TO johel;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO johel;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE roles_id_seq OWNED BY roles.id;


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('roles_id_seq', 14, true);


--
-- Name: roles_permisos; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE roles_permisos (
    id integer NOT NULL,
    rol_fkey integer NOT NULL,
    permiso_fkey integer NOT NULL
);


ALTER TABLE public.roles_permisos OWNER TO johel;

--
-- Name: roles_permisos_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE roles_permisos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.roles_permisos_id_seq OWNER TO johel;

--
-- Name: roles_permisos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE roles_permisos_id_seq OWNED BY roles_permisos.id;


--
-- Name: roles_permisos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('roles_permisos_id_seq', 27, true);


--
-- Name: rutas; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE rutas (
    id integer NOT NULL,
    ruta character varying(50) NOT NULL,
    status character varying(20) DEFAULT 'activo'::character varying NOT NULL,
    bloqueado character varying(2) DEFAULT 'no'::character varying
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

SELECT pg_catalog.setval('rutas_id_seq', 14, true);


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
    status character varying(20) DEFAULT 'activo'::character varying,
    rol_fkey integer NOT NULL,
    email character varying(50) NOT NULL
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

SELECT pg_catalog.setval('usuarios_id_seq', 11, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY cargos ALTER COLUMN id SET DEFAULT nextval('cargos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY configuraciones ALTER COLUMN id SET DEFAULT nextval('configuraciones_id_seq'::regclass);


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

ALTER TABLE ONLY movimientos ALTER COLUMN id SET DEFAULT nextval('movimientos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY permisos ALTER COLUMN id SET DEFAULT nextval('permisos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY roles ALTER COLUMN id SET DEFAULT nextval('roles_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY roles_permisos ALTER COLUMN id SET DEFAULT nextval('roles_permisos_id_seq'::regclass);


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
-- Data for Name: configuraciones; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY configuraciones (id, dias_laborables, horas_laborables_por_dia) FROM stdin;
1	lun:mar:mie:jue:vie:sab:dom	8
\.


--
-- Data for Name: documentos; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY documentos (id, titulo, descripcion, status, "timestamp", ruta_fkey) FROM stdin;
42	Contrato	Firma de contrato para el ciudadano Johel Cediel, por un periodo de 6 meses.	en curso	1368552791	12
43	Liquidación	dasdas sadgsd gsfh sfhs	en curso	1368555412	14
\.


--
-- Data for Name: estaciones; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY estaciones (id, ruta_fkey, unidad_fkey, cargo_fkey, usuario_fkey, orden, horas, descripcion) FROM stdin;
38	12	85	1	11	1	2	asdasdasdasda
39	12	85	2	7	2	3	safsfsfsdf f sf
40	12	88	1	8	3	5	Verificación de existencia
41	13	88	1	8	1	1	Descripción breve del paso
42	13	88	3	3	2	2	Otra descripción del paso
43	12	85	1	8	4	2	xxxxxxxxxxxxxxxxxxxxxxx
44	13	85	1	10	3	1	1231231231
45	13	87	3	9	4	2	232323
46	13	86	2	5	5	2	3242342342
47	13	87	3	10	6	2	212312313
49	14	85	1	10	1	2	12121313
48	14	85	1	11	2	1	121212
50	14	84	1	3	3	60	e4rwgfs hhs ghhgg h
\.


--
-- Data for Name: movimientos; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY movimientos (id, documento_fkey, unidad_fkey, cargo_fkey, usuario_fkey, descripcion, orden, horas, observacion, "timestamp") FROM stdin;
11	42	85	1	11	asdasdasdasda	1	2	\N	\N
12	42	85	2	7	safsfsfsdf f sf	2	3	\N	\N
13	42	88	1	8	Verificación de existencia	3	5	\N	\N
14	42	85	1	8	xxxxxxxxxxxxxxxxxxxxxxx	4	2	\N	\N
15	43	85	1	10	12121313	1	2	\N	\N
16	43	85	1	11	121212	2	1	\N	\N
17	43	84	1	3	e4rwgfs hhs ghhgg h	233	60	\N	\N
\.


--
-- Data for Name: permisos; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY permisos (id, permiso, descripcion, status) FROM stdin;
2	unidades.editar	Permite editar unidades	activo
4	cargos.editar	Permite editar cargos	activo
6	rutas.editar	Permite editar el nombre de las rutas de documentos	activo
7	unidades.acceso	Permite el acceso al modulo de unidades	activo
8	cargos.acceso	Permite el acceso al modulo de Cargos	activo
1	unidades.insertar	Permite insertar una unidad	activo
3	cargos.insertar	Permite insertar cargos	activo
5	rutas.insertar	Permite insertar rutas de documentos	activo
9	rutas.acceso	Permite el acceso al modulo Rutas de documentos	activo
10	rutas.eliminar	Permite eliminar rutas de documentos	activo
11	usuarios.acceso	Permite el acceso al adminstrador de usuario	activo
12	usuarios.roles.acceso	Permite el acceso al modulo de roles en el administrador de usuarios	activo
14	usuarios.insertar	Permite añadir un nuevo usuario	activo
13	usuarios.editar	Permite editar los usuarios	activo
15	permisos.acceso	Permite el acceso al modulo de permisos	activo
16	roles.acceso	Permite el acceso al modulo de Roles	activo
17	documentos.acceso	Permite el acceso a modulo de Documentos	activo
18	documentos.insertar	Permite añadir nuevos documentos	activo
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY roles (id, rol, status) FROM stdin;
3	Responsable	activo
5	Prueba	activo
7	asdasda	activo
8	qqq	activo
9	Cediel	activo
10	qqqq	activo
11	qqqqq	activo
12	qqqqqqqq	activo
13	sdfgg	activo
6	Esto es una prueba	activo
4	Secretaria	activo
14	asd asd	activo
1	Administrador 2	activo
\.


--
-- Data for Name: roles_permisos; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY roles_permisos (id, rol_fkey, permiso_fkey) FROM stdin;
5	1	7
6	1	8
7	1	9
8	1	5
9	1	6
10	1	10
11	1	11
12	1	12
13	1	13
14	1	14
20	1	4
21	1	3
22	1	2
23	1	1
24	1	15
25	1	16
26	1	17
27	1	18
\.


--
-- Data for Name: rutas; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY rutas (id, ruta, status, bloqueado) FROM stdin;
12	Control de Obras Públicas	activo	si
14	Puntos de Cuenta	activo	si
13	Prueba	activo	si
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

COPY usuarios (id, usuario, clave, cedula, nombre, status, rol_fkey, email) FROM stdin;
4	johel	e10adc3949ba59abbe56e057f20f883e	17515094	Johel Cediel	activo	1	cedielj@alcaldiadeguacara.gob.ve
5	jolibert.carolina@hotmail.com	123456	19000650	Jolibert Cediel	activo	1	jolibert.carolina@hotmail.com
6	jcct19@hotmail.com	123456	15333946	José Cediel	activo	1	jcct19@hotmail.com
7	heriberto.cediel@hotmail.com	123456	5027147	Heriberto Cediel	activo	1	heriberto.cediel@hotmail.com
10	admin@localhost2.com	111111	33333333	3333333333	activo	1	admin@localhost2.com
8	admin@localhost.com	123123123	99999995	Pedro Perez	bloqueado	1	admin@localhost.com
3	alex@teran.com	123	17258025	Alexander Teran	inactivo	1	alex@teran.com
9	admin@localhos1.com	123123123	12222222	12eq2eqwe	bloqueado	1	admin@localhos1.com
11	admin@localhost111.com	4297f44b13955235245b2497399d7a93	12312312	12312312312	bloqueado	1	admin@localhost1.com
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
-- Name: configuraciones_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY configuraciones
    ADD CONSTRAINT configuraciones_pkey PRIMARY KEY (id);


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
-- Name: movimientos_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT movimientos_pkey PRIMARY KEY (id);


--
-- Name: permisos_permiso_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY permisos
    ADD CONSTRAINT permisos_permiso_key UNIQUE (permiso);


--
-- Name: permisos_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY permisos
    ADD CONSTRAINT permisos_pkey PRIMARY KEY (id);


--
-- Name: roles_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: roles_rol_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_rol_key UNIQUE (rol);


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
-- Name: usuarios_email_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_email_key UNIQUE (email);


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
-- Name: roles_permisos_rol_fkey_permiso_fkey_idx; Type: INDEX; Schema: public; Owner: johel; Tablespace: 
--

CREATE INDEX roles_permisos_rol_fkey_permiso_fkey_idx ON roles_permisos USING btree (rol_fkey, permiso_fkey);


--
-- Name: documentos_ruta_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_ruta_fkey_fkey FOREIGN KEY (ruta_fkey) REFERENCES rutas(id);


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
-- Name: movimientos_cargo_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT movimientos_cargo_fkey_fkey FOREIGN KEY (cargo_fkey) REFERENCES cargos(id);


--
-- Name: movimientos_documento_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT movimientos_documento_fkey_fkey FOREIGN KEY (documento_fkey) REFERENCES documentos(id);


--
-- Name: movimientos_unidad_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT movimientos_unidad_fkey_fkey FOREIGN KEY (unidad_fkey) REFERENCES unidades(id);


--
-- Name: movimientos_usuario_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT movimientos_usuario_fkey_fkey FOREIGN KEY (usuario_fkey) REFERENCES usuarios(id);


--
-- Name: roles_permisos_permiso_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY roles_permisos
    ADD CONSTRAINT roles_permisos_permiso_fkey_fkey FOREIGN KEY (permiso_fkey) REFERENCES permisos(id);


--
-- Name: roles_permisos_rol_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY roles_permisos
    ADD CONSTRAINT roles_permisos_rol_fkey_fkey FOREIGN KEY (rol_fkey) REFERENCES roles(id);


--
-- Name: usuarios_rol_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_rol_fkey_fkey FOREIGN KEY (rol_fkey) REFERENCES roles(id);


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

