--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: ad; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE ad (
    id integer NOT NULL,
    description text NOT NULL,
    owner integer NOT NULL,
    cheched boolean DEFAULT false NOT NULL,
    ts time without time zone DEFAULT now() NOT NULL,
    location integer
);


ALTER TABLE ad OWNER TO web;

--
-- Name: ad_cat; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE ad_cat (
    ads integer NOT NULL,
    cat integer NOT NULL
);


ALTER TABLE ad_cat OWNER TO web;

--
-- Name: address; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE address (
    city character varying(64) NOT NULL,
    street character varying(128) NOT NULL,
    house character varying(16) NOT NULL,
    id integer NOT NULL
);


ALTER TABLE address OWNER TO web;

--
-- Name: address_id_seq; Type: SEQUENCE; Schema: public; Owner: web
--

CREATE SEQUENCE address_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE address_id_seq OWNER TO web;

--
-- Name: address_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: web
--

ALTER SEQUENCE address_id_seq OWNED BY address.id;


--
-- Name: ads_id_seq; Type: SEQUENCE; Schema: public; Owner: web
--

CREATE SEQUENCE ads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ads_id_seq OWNER TO web;

--
-- Name: ads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: web
--

ALTER SEQUENCE ads_id_seq OWNED BY ad.id;


--
-- Name: area; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE area (
    sid integer NOT NULL,
    aid integer NOT NULL,
    start date NOT NULL,
    exp date
);


ALTER TABLE area OWNER TO web;

--
-- Name: category; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE category (
    id integer NOT NULL,
    description text
);


ALTER TABLE category OWNER TO web;

--
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: web
--

CREATE SEQUENCE category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE category_id_seq OWNER TO web;

--
-- Name: category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: web
--

ALTER SEQUENCE category_id_seq OWNED BY category.id;


--
-- Name: comment; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE comment (
    aid integer NOT NULL,
    uid integer NOT NULL,
    ts time without time zone DEFAULT now() NOT NULL,
    data text NOT NULL
);


ALTER TABLE comment OWNER TO web;

--
-- Name: favorite; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE favorite (
    aid integer NOT NULL,
    uid integer NOT NULL
);


ALTER TABLE favorite OWNER TO web;

--
-- Name: order; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE "order" (
    id integer NOT NULL,
    owner integer NOT NULL,
    description text NOT NULL,
    serv integer NOT NULL,
    loc integer NOT NULL,
    start time without time zone,
    exp time without time zone,
    state character varying(16) DEFAULT 'waiting'::character varying NOT NULL,
    ts time without time zone DEFAULT now() NOT NULL
);


ALTER TABLE "order" OWNER TO web;

--
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: web
--

CREATE SEQUENCE orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE orders_id_seq OWNER TO web;

--
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: web
--

ALTER SEQUENCE orders_id_seq OWNED BY "order".id;


--
-- Name: photo; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE photo (
    id integer NOT NULL,
    path character varying(256) NOT NULL,
    ads integer NOT NULL
);


ALTER TABLE photo OWNER TO web;

--
-- Name: photo_id_seq; Type: SEQUENCE; Schema: public; Owner: web
--

CREATE SEQUENCE photo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE photo_id_seq OWNER TO web;

--
-- Name: photo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: web
--

ALTER SEQUENCE photo_id_seq OWNED BY photo.id;


--
-- Name: service; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE service (
    id integer NOT NULL,
    name character varying(128) NOT NULL,
    description text NOT NULL
);


ALTER TABLE service OWNER TO web;

--
-- Name: service_id_seq; Type: SEQUENCE; Schema: public; Owner: web
--

CREATE SEQUENCE service_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE service_id_seq OWNER TO web;

--
-- Name: service_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: web
--

ALTER SEQUENCE service_id_seq OWNED BY service.id;


--
-- Name: staff; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE staff (
    uid integer NOT NULL,
    sid integer NOT NULL,
    exp date,
    start date NOT NULL,
    id integer NOT NULL,
    post character varying(256) NOT NULL
);


ALTER TABLE staff OWNER TO web;

--
-- Name: staff_id_seq; Type: SEQUENCE; Schema: public; Owner: web
--

CREATE SEQUENCE staff_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE staff_id_seq OWNER TO web;

--
-- Name: staff_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: web
--

ALTER SEQUENCE staff_id_seq OWNED BY staff.id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: web; Tablespace: 
--

CREATE TABLE "user" (
    id integer NOT NULL,
    name character varying(64) NOT NULL,
    surname character varying(64) NOT NULL,
    patronymic character varying(64),
    login character varying(64) NOT NULL,
    passwd character varying(64) NOT NULL,
    mail character varying(64) NOT NULL,
    home integer NOT NULL,
    room integer,
    role character varying(16) DEFAULT 'user'::character varying NOT NULL,
    bdata date,
    floor integer,
    gender character(1),
    picture character varying(256)
);


ALTER TABLE "user" OWNER TO web;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: web
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO web;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: web
--

ALTER SEQUENCE users_id_seq OWNED BY "user".id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: web
--

ALTER TABLE ONLY ad ALTER COLUMN id SET DEFAULT nextval('ads_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: web
--

ALTER TABLE ONLY address ALTER COLUMN id SET DEFAULT nextval('address_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: web
--

ALTER TABLE ONLY category ALTER COLUMN id SET DEFAULT nextval('category_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: web
--

ALTER TABLE ONLY "order" ALTER COLUMN id SET DEFAULT nextval('orders_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: web
--

ALTER TABLE ONLY photo ALTER COLUMN id SET DEFAULT nextval('photo_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: web
--

ALTER TABLE ONLY service ALTER COLUMN id SET DEFAULT nextval('service_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: web
--

ALTER TABLE ONLY staff ALTER COLUMN id SET DEFAULT nextval('staff_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: web
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: ad; Type: TABLE DATA; Schema: public; Owner: web
--

COPY ad (id, description, owner, cheched, ts, location) FROM stdin;
\.


--
-- Data for Name: ad_cat; Type: TABLE DATA; Schema: public; Owner: web
--

COPY ad_cat (ads, cat) FROM stdin;
\.


--
-- Data for Name: address; Type: TABLE DATA; Schema: public; Owner: web
--

COPY address (city, street, house, id) FROM stdin;
\.


--
-- Name: address_id_seq; Type: SEQUENCE SET; Schema: public; Owner: web
--

SELECT pg_catalog.setval('address_id_seq', 1, false);


--
-- Name: ads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: web
--

SELECT pg_catalog.setval('ads_id_seq', 1, false);


--
-- Data for Name: area; Type: TABLE DATA; Schema: public; Owner: web
--

COPY area (sid, aid, start, exp) FROM stdin;
\.


--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: web
--

COPY category (id, description) FROM stdin;
\.


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: web
--

SELECT pg_catalog.setval('category_id_seq', 1, false);


--
-- Data for Name: comment; Type: TABLE DATA; Schema: public; Owner: web
--

COPY comment (aid, uid, ts, data) FROM stdin;
\.


--
-- Data for Name: favorite; Type: TABLE DATA; Schema: public; Owner: web
--

COPY favorite (aid, uid) FROM stdin;
\.


--
-- Data for Name: order; Type: TABLE DATA; Schema: public; Owner: web
--

COPY "order" (id, owner, description, serv, loc, start, exp, state, ts) FROM stdin;
\.


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: web
--

SELECT pg_catalog.setval('orders_id_seq', 1, false);


--
-- Data for Name: photo; Type: TABLE DATA; Schema: public; Owner: web
--

COPY photo (id, path, ads) FROM stdin;
\.


--
-- Name: photo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: web
--

SELECT pg_catalog.setval('photo_id_seq', 1, false);


--
-- Data for Name: service; Type: TABLE DATA; Schema: public; Owner: web
--

COPY service (id, name, description) FROM stdin;
\.


--
-- Name: service_id_seq; Type: SEQUENCE SET; Schema: public; Owner: web
--

SELECT pg_catalog.setval('service_id_seq', 1, false);


--
-- Data for Name: staff; Type: TABLE DATA; Schema: public; Owner: web
--

COPY staff (uid, sid, exp, start, id, post) FROM stdin;
\.


--
-- Name: staff_id_seq; Type: SEQUENCE SET; Schema: public; Owner: web
--

SELECT pg_catalog.setval('staff_id_seq', 1, false);


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: web
--

COPY "user" (id, name, surname, patronymic, login, passwd, mail, home, room, role, bdata, floor, gender, picture) FROM stdin;
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: web
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- Name: address_pkey; Type: CONSTRAINT; Schema: public; Owner: web; Tablespace: 
--

ALTER TABLE ONLY address
    ADD CONSTRAINT address_pkey PRIMARY KEY (id);


--
-- Name: ads_pkey; Type: CONSTRAINT; Schema: public; Owner: web; Tablespace: 
--

ALTER TABLE ONLY ad
    ADD CONSTRAINT ads_pkey PRIMARY KEY (id);


--
-- Name: area_pkey; Type: CONSTRAINT; Schema: public; Owner: web; Tablespace: 
--

ALTER TABLE ONLY area
    ADD CONSTRAINT area_pkey PRIMARY KEY (sid, aid);


--
-- Name: category_pkey; Type: CONSTRAINT; Schema: public; Owner: web; Tablespace: 
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- Name: orders_pkey; Type: CONSTRAINT; Schema: public; Owner: web; Tablespace: 
--

ALTER TABLE ONLY "order"
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);


--
-- Name: service_pkey; Type: CONSTRAINT; Schema: public; Owner: web; Tablespace: 
--

ALTER TABLE ONLY service
    ADD CONSTRAINT service_pkey PRIMARY KEY (id);


--
-- Name: staff_pkey; Type: CONSTRAINT; Schema: public; Owner: web; Tablespace: 
--

ALTER TABLE ONLY staff
    ADD CONSTRAINT staff_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: web; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: a_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY ad_cat
    ADD CONSTRAINT a_fkey FOREIGN KEY (ads) REFERENCES ad(id);


--
-- Name: ads_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY photo
    ADD CONSTRAINT ads_fkey FOREIGN KEY (ads) REFERENCES ad(id);


--
-- Name: ads_location_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY ad
    ADD CONSTRAINT ads_location_fkey FOREIGN KEY (location) REFERENCES address(id);


--
-- Name: afa_key; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY area
    ADD CONSTRAINT afa_key FOREIGN KEY (aid) REFERENCES address(id);


--
-- Name: afs_key; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY area
    ADD CONSTRAINT afs_key FOREIGN KEY (sid) REFERENCES staff(id);


--
-- Name: c_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY ad_cat
    ADD CONSTRAINT c_fkey FOREIGN KEY (cat) REFERENCES category(id);


--
-- Name: comments_aid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY comment
    ADD CONSTRAINT comments_aid_fkey FOREIGN KEY (aid) REFERENCES ad(id);


--
-- Name: comments_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY comment
    ADD CONSTRAINT comments_uid_fkey FOREIGN KEY (uid) REFERENCES "user"(id);


--
-- Name: fad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY favorite
    ADD CONSTRAINT fad_fkey FOREIGN KEY (aid) REFERENCES ad(id);


--
-- Name: fus_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY favorite
    ADD CONSTRAINT fus_fkey FOREIGN KEY (uid) REFERENCES "user"(id);


--
-- Name: ord_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY "order"
    ADD CONSTRAINT ord_fkey FOREIGN KEY (owner) REFERENCES "user"(id);


--
-- Name: owner_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY ad
    ADD CONSTRAINT owner_fkey FOREIGN KEY (owner) REFERENCES "user"(id);


--
-- Name: serv_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY "order"
    ADD CONSTRAINT serv_fkey FOREIGN KEY (serv) REFERENCES service(id);


--
-- Name: staff_sid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY staff
    ADD CONSTRAINT staff_sid_fkey FOREIGN KEY (sid) REFERENCES service(id);


--
-- Name: staff_uid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY staff
    ADD CONSTRAINT staff_uid_fkey FOREIGN KEY (uid) REFERENCES "user"(id);


--
-- Name: users_home_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: web
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT users_home_id_fkey FOREIGN KEY (home) REFERENCES address(id);


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

