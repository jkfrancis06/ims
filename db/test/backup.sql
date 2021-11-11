--
-- PostgreSQL database dump
--

-- Dumped from database version 12.8 (Ubuntu 12.8-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.8 (Ubuntu 12.8-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

ALTER TABLE ONLY public.utilisateur_consultation DROP CONSTRAINT fk_ffb4a155fb88e14f;
ALTER TABLE ONLY public.utilisateur_consultation DROP CONSTRAINT fk_ffb4a155f082e755;
ALTER TABLE ONLY public.utilisateur_consultation DROP CONSTRAINT fk_ffb4a155b03a8386;
ALTER TABLE ONLY public.alias DROP CONSTRAINT fk_e16c6b94a21bd112;
ALTER TABLE ONLY public.affaire_utilisateur DROP CONSTRAINT fk_d8cc00c5fb88e14f;
ALTER TABLE ONLY public.affaire_utilisateur DROP CONSTRAINT fk_d8cc00c5f082e755;
ALTER TABLE ONLY public.courrier DROP CONSTRAINT fk_bef47caab03a8386;
ALTER TABLE ONLY public.courrier DROP CONSTRAINT fk_bef47caa6d0aba22;
ALTER TABLE ONLY public.courrier DROP CONSTRAINT fk_bef47caa20439135;
ALTER TABLE ONLY public.envenement DROP CONSTRAINT fk_bb3e452ff082e755;
ALTER TABLE ONLY public.piece_jointe DROP CONSTRAINT fk_ab5111d48bf41dc7;
ALTER TABLE ONLY public.envenement_entites DROP CONSTRAINT fk_a554c7f9573acf92;
ALTER TABLE ONLY public.envenement_entites DROP CONSTRAINT fk_a554c7f9193f62bd;
ALTER TABLE ONLY public.affaire DROP CONSTRAINT fk_9c3f18efccf9e01e;
ALTER TABLE ONLY public.affaire DROP CONSTRAINT fk_9c3f18efb03a8386;
ALTER TABLE ONLY public.tache DROP CONSTRAINT fk_93872075f082e755;
ALTER TABLE ONLY public.tache DROP CONSTRAINT fk_93872075b03a8386;
ALTER TABLE ONLY public.departement_director DROP CONSTRAINT fk_8feec61fb88e14f;
ALTER TABLE ONLY public.departement_director DROP CONSTRAINT fk_8feec61ccf9e01e;
ALTER TABLE ONLY public.tache_utilisateur DROP CONSTRAINT fk_8e15c4fdfb88e14f;
ALTER TABLE ONLY public.tache_utilisateur DROP CONSTRAINT fk_8e15c4fdd2235d39;
ALTER TABLE ONLY public.user_session DROP CONSTRAINT fk_8849cbdefb88e14f;
ALTER TABLE ONLY public.personne_telephone DROP CONSTRAINT fk_437a970efe649a29;
ALTER TABLE ONLY public.personne_telephone DROP CONSTRAINT fk_437a970ea21bd112;
ALTER TABLE ONLY public.affaire_directed DROP CONSTRAINT fk_4035ac6cfb88e14f;
ALTER TABLE ONLY public.affaire_directed DROP CONSTRAINT fk_4035ac6cf082e755;
ALTER TABLE ONLY public.envenement_utilisateur DROP CONSTRAINT fk_3210cca2fb88e14f;
ALTER TABLE ONLY public.envenement_utilisateur DROP CONSTRAINT fk_3210cca2193f62bd;
ALTER TABLE ONLY public.related_to DROP CONSTRAINT fk_29dc7595dd62c21b;
ALTER TABLE ONLY public.related_to DROP CONSTRAINT fk_29dc7595727aca70;
ALTER TABLE ONLY public.attachements DROP CONSTRAINT fk_212b82dc9bea957a;
ALTER TABLE ONLY public.attachements DROP CONSTRAINT fk_212b82dc193f62bd;
ALTER TABLE ONLY public.utilisateur DROP CONSTRAINT fk_1d1c63b3ccf9e01e;
ALTER TABLE ONLY public.entite DROP CONSTRAINT fk_1a291827f082e755;
DROP INDEX public.utilisateur_consultation_unique;
DROP INDEX public.type_idx;
DROP INDEX public.idx_ffb4a155fb88e14f;
DROP INDEX public.idx_ffb4a155f082e755;
DROP INDEX public.idx_ffb4a155b03a8386;
DROP INDEX public.idx_e16c6b94a21bd112;
DROP INDEX public.idx_d8cc00c5fb88e14f;
DROP INDEX public.idx_d8cc00c5f082e755;
DROP INDEX public.idx_bef47caab03a8386;
DROP INDEX public.idx_bef47caa6d0aba22;
DROP INDEX public.idx_bef47caa20439135;
DROP INDEX public.idx_bb3e452ff082e755;
DROP INDEX public.idx_ab5111d48bf41dc7;
DROP INDEX public.idx_a554c7f9573acf92;
DROP INDEX public.idx_a554c7f9193f62bd;
DROP INDEX public.idx_9c3f18efccf9e01e;
DROP INDEX public.idx_9c3f18efb03a8386;
DROP INDEX public.idx_93872075f082e755;
DROP INDEX public.idx_93872075b03a8386;
DROP INDEX public.idx_8feec61fb88e14f;
DROP INDEX public.idx_8feec61ccf9e01e;
DROP INDEX public.idx_8e15c4fdfb88e14f;
DROP INDEX public.idx_8e15c4fdd2235d39;
DROP INDEX public.idx_8849cbdefb88e14f;
DROP INDEX public.idx_437a970efe649a29;
DROP INDEX public.idx_437a970ea21bd112;
DROP INDEX public.idx_4035ac6cfb88e14f;
DROP INDEX public.idx_4035ac6cf082e755;
DROP INDEX public.idx_3210cca2fb88e14f;
DROP INDEX public.idx_3210cca2193f62bd;
DROP INDEX public.idx_29dc7595dd62c21b;
DROP INDEX public.idx_29dc7595727aca70;
DROP INDEX public.idx_212b82dc9bea957a;
DROP INDEX public.idx_212b82dc193f62bd;
DROP INDEX public.idx_1d1c63b3ccf9e01e;
DROP INDEX public.idx_1a291827f082e755;
ALTER TABLE ONLY public.utilisateur DROP CONSTRAINT utilisateur_pkey;
ALTER TABLE ONLY public.utilisateur_consultation DROP CONSTRAINT utilisateur_consultation_pkey;
ALTER TABLE ONLY public.user_session DROP CONSTRAINT user_session_pkey;
ALTER TABLE ONLY public.telephone DROP CONSTRAINT telephone_pkey;
ALTER TABLE ONLY public.tache_utilisateur DROP CONSTRAINT tache_utilisateur_pkey;
ALTER TABLE ONLY public.tache DROP CONSTRAINT tache_pkey;
ALTER TABLE ONLY public.related_to DROP CONSTRAINT related_to_pkey;
ALTER TABLE ONLY public.piece_jointe DROP CONSTRAINT piece_jointe_pkey;
ALTER TABLE ONLY public.personne_telephone DROP CONSTRAINT personne_telephone_pkey;
ALTER TABLE ONLY public.login_failure DROP CONSTRAINT login_failure_pkey;
ALTER TABLE ONLY public.envenement_utilisateur DROP CONSTRAINT envenement_utilisateur_pkey;
ALTER TABLE ONLY public.envenement DROP CONSTRAINT envenement_pkey;
ALTER TABLE ONLY public.envenement_entites DROP CONSTRAINT envenement_entites_pkey;
ALTER TABLE ONLY public.entite DROP CONSTRAINT entite_pkey;
ALTER TABLE ONLY public.departement DROP CONSTRAINT departement_pkey;
ALTER TABLE ONLY public.departement_director DROP CONSTRAINT departement_director_pkey;
ALTER TABLE ONLY public.courrier DROP CONSTRAINT courrier_pkey;
ALTER TABLE ONLY public.attachements DROP CONSTRAINT attachements_pkey;
ALTER TABLE ONLY public.alias DROP CONSTRAINT alias_pkey;
ALTER TABLE ONLY public.affectation DROP CONSTRAINT affectation_pkey;
ALTER TABLE ONLY public.affaire_utilisateur DROP CONSTRAINT affaire_utilisateur_pkey;
ALTER TABLE ONLY public.affaire DROP CONSTRAINT affaire_pkey;
ALTER TABLE ONLY public.affaire_directed DROP CONSTRAINT affaire_directed_pkey;
DROP SEQUENCE public.utilisateur_id_seq;
DROP SEQUENCE public.utilisateur_consultation_id_seq;
DROP TABLE public.utilisateur_consultation;
DROP TABLE public.utilisateur;
DROP SEQUENCE public.user_session_id_seq;
DROP TABLE public.user_session;
DROP SEQUENCE public.telephone_id_seq;
DROP TABLE public.telephone;
DROP SEQUENCE public.tache_utilisateur_id_seq;
DROP TABLE public.tache_utilisateur;
DROP SEQUENCE public.tache_id_seq;
DROP TABLE public.tache;
DROP SEQUENCE public.related_to_id_seq;
DROP TABLE public.related_to;
DROP SEQUENCE public.piece_jointe_id_seq;
DROP TABLE public.piece_jointe;
DROP TABLE public.personne_telephone;
DROP SEQUENCE public.login_failure_id_seq;
DROP TABLE public.login_failure;
DROP TABLE public.envenement_utilisateur;
DROP SEQUENCE public.envenement_id_seq;
DROP TABLE public.envenement_entites;
DROP TABLE public.envenement;
DROP SEQUENCE public.entite_id_seq;
DROP TABLE public.entite;
DROP SEQUENCE public.departement_id_seq;
DROP SEQUENCE public.departement_director_id_seq;
DROP TABLE public.departement_director;
DROP TABLE public.departement;
DROP SEQUENCE public.courrier_id_seq;
DROP TABLE public.courrier;
DROP SEQUENCE public.attachements_id_seq;
DROP TABLE public.attachements;
DROP SEQUENCE public.alias_id_seq;
DROP TABLE public.alias;
DROP SEQUENCE public.affectation_id_seq;
DROP TABLE public.affectation;
DROP SEQUENCE public.affaire_utilisateur_id_seq;
DROP TABLE public.affaire_utilisateur;
DROP SEQUENCE public.affaire_id_seq;
DROP SEQUENCE public.affaire_directed_id_seq;
DROP TABLE public.affaire_directed;
DROP TABLE public.affaire;
SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: affaire; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.affaire (
    id integer NOT NULL,
    created_by_id integer,
    departement_id integer NOT NULL,
    numero_matricule character varying(255) NOT NULL,
    nom character varying(255) NOT NULL,
    description text NOT NULL,
    niveau_accreditation integer NOT NULL,
    statut character varying(255) NOT NULL,
    source character varying(255) DEFAULT NULL::character varying,
    resume text,
    created_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    last_update timestamp(0) without time zone NOT NULL,
    rapport_final text,
    cloture_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.affaire OWNER TO admin;

--
-- Name: affaire_directed; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.affaire_directed (
    id integer NOT NULL,
    affaire_id integer NOT NULL,
    utilisateur_id integer NOT NULL,
    is_revoked boolean NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    last_update timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.affaire_directed OWNER TO admin;

--
-- Name: affaire_directed_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.affaire_directed_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.affaire_directed_id_seq OWNER TO admin;

--
-- Name: affaire_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.affaire_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.affaire_id_seq OWNER TO admin;

--
-- Name: affaire_utilisateur; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.affaire_utilisateur (
    id integer NOT NULL,
    utilisateur_id integer NOT NULL,
    affaire_id integer NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    is_revoked boolean,
    responsability character varying(255) DEFAULT NULL::character varying,
    niveau_accreditation integer
);


ALTER TABLE public.affaire_utilisateur OWNER TO admin;

--
-- Name: affaire_utilisateur_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.affaire_utilisateur_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.affaire_utilisateur_id_seq OWNER TO admin;

--
-- Name: affectation; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.affectation (
    id integer NOT NULL
);


ALTER TABLE public.affectation OWNER TO admin;

--
-- Name: affectation_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.affectation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.affectation_id_seq OWNER TO admin;

--
-- Name: alias; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.alias (
    id integer NOT NULL,
    personne_id integer NOT NULL,
    alias character varying(255) NOT NULL
);


ALTER TABLE public.alias OWNER TO admin;

--
-- Name: alias_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.alias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alias_id_seq OWNER TO admin;

--
-- Name: attachements; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.attachements (
    id integer NOT NULL,
    entite_id integer,
    envenement_id integer,
    name character varying(255) NOT NULL,
    type integer NOT NULL,
    description text NOT NULL,
    created_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    last_update timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.attachements OWNER TO admin;

--
-- Name: attachements_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.attachements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.attachements_id_seq OWNER TO admin;

--
-- Name: courrier; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.courrier (
    id integer NOT NULL,
    affectation_id integer,
    created_by_id integer NOT NULL,
    response_to_id integer,
    flux integer NOT NULL,
    origine character varying(255) NOT NULL,
    destination character varying(255) NOT NULL,
    datecourrier date NOT NULL,
    reference_interne character varying(255) NOT NULL,
    sujet text NOT NULL,
    contenu text,
    type character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    statut integer NOT NULL,
    commentaire text NOT NULL,
    is_response boolean NOT NULL,
    entry character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.courrier OWNER TO admin;

--
-- Name: courrier_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.courrier_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.courrier_id_seq OWNER TO admin;

--
-- Name: departement; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.departement (
    id integer NOT NULL,
    nom character varying(255) NOT NULL,
    description text,
    ceated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.departement OWNER TO admin;

--
-- Name: departement_director; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.departement_director (
    id integer NOT NULL,
    departement_id integer NOT NULL,
    utilisateur_id integer NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    last_update timestamp(0) without time zone NOT NULL,
    is_revoked boolean NOT NULL
);


ALTER TABLE public.departement_director OWNER TO admin;

--
-- Name: departement_director_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.departement_director_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departement_director_id_seq OWNER TO admin;

--
-- Name: departement_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.departement_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departement_id_seq OWNER TO admin;

--
-- Name: entite; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.entite (
    id integer NOT NULL,
    affaire_id integer,
    description character varying(255) DEFAULT NULL::character varying,
    description2 character varying(255) DEFAULT NULL::character varying,
    role integer NOT NULL,
    cat integer,
    created_at timestamp(0) without time zone NOT NULL,
    main_picture character varying(255) DEFAULT 'icon-default.png'::character varying NOT NULL,
    resume text DEFAULT ''::text NOT NULL,
    role_final character varying(255) DEFAULT NULL::character varying,
    rapport_final text,
    type character varying(3) NOT NULL,
    nom character varying(255) DEFAULT NULL::character varying,
    prenom character varying(255) DEFAULT NULL::character varying,
    date_naissance date,
    sexe character varying(255) DEFAULT NULL::character varying,
    num_passport character varying(255) DEFAULT NULL::character varying,
    num_carte character varying(255) DEFAULT NULL::character varying,
    nationalite character varying(255) DEFAULT NULL::character varying,
    categorie character varying(255) DEFAULT NULL::character varying,
    immatriculation character varying(255) DEFAULT NULL::character varying,
    other_infos text,
    taille integer,
    situation_matri integer,
    adresse character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.entite OWNER TO admin;

--
-- Name: entite_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.entite_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.entite_id_seq OWNER TO admin;

--
-- Name: envenement; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.envenement (
    id integer NOT NULL,
    affaire_id integer NOT NULL,
    type_evenement integer NOT NULL,
    localisation character varying(255),
    start_at timestamp(0) without time zone,
    duration character varying(255) DEFAULT NULL::character varying,
    resume text NOT NULL,
    end_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    geo_localisation character varying(255) DEFAULT NULL::character varying,
    titre character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.envenement OWNER TO admin;

--
-- Name: envenement_entites; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.envenement_entites (
    envenement_id integer NOT NULL,
    entites_id integer NOT NULL
);


ALTER TABLE public.envenement_entites OWNER TO admin;

--
-- Name: envenement_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.envenement_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.envenement_id_seq OWNER TO admin;

--
-- Name: envenement_utilisateur; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.envenement_utilisateur (
    envenement_id integer NOT NULL,
    utilisateur_id integer NOT NULL
);


ALTER TABLE public.envenement_utilisateur OWNER TO admin;

--
-- Name: login_failure; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.login_failure (
    id integer NOT NULL,
    username character varying(255) DEFAULT NULL::character varying,
    created_at timestamp(0) without time zone NOT NULL,
    client_ip character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.login_failure OWNER TO admin;

--
-- Name: COLUMN login_failure.created_at; Type: COMMENT; Schema: public; Owner: admin
--

COMMENT ON COLUMN public.login_failure.created_at IS '(DC2Type:datetime_immutable)';


--
-- Name: login_failure_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.login_failure_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.login_failure_id_seq OWNER TO admin;

--
-- Name: personne_telephone; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.personne_telephone (
    personne_id integer NOT NULL,
    telephone_id integer NOT NULL
);


ALTER TABLE public.personne_telephone OWNER TO admin;

--
-- Name: piece_jointe; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.piece_jointe (
    id integer NOT NULL,
    courrier_id integer NOT NULL,
    filename character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.piece_jointe OWNER TO admin;

--
-- Name: piece_jointe_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.piece_jointe_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.piece_jointe_id_seq OWNER TO admin;

--
-- Name: related_to; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.related_to (
    id integer NOT NULL,
    parent_id integer,
    child_id integer
);


ALTER TABLE public.related_to OWNER TO admin;

--
-- Name: related_to_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.related_to_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.related_to_id_seq OWNER TO admin;

--
-- Name: tache; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.tache (
    id integer NOT NULL,
    affaire_id integer,
    created_by_id integer,
    priorite integer NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    last_update timestamp(0) without time zone NOT NULL,
    expire_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    titre text,
    resume text
);


ALTER TABLE public.tache OWNER TO admin;

--
-- Name: tache_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.tache_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tache_id_seq OWNER TO admin;

--
-- Name: tache_utilisateur; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.tache_utilisateur (
    id integer NOT NULL,
    tache_id integer,
    utilisateur_id integer,
    statut integer NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL,
    remarque text
);


ALTER TABLE public.tache_utilisateur OWNER TO admin;

--
-- Name: tache_utilisateur_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.tache_utilisateur_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tache_utilisateur_id_seq OWNER TO admin;

--
-- Name: telephone; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.telephone (
    id integer NOT NULL,
    numero character varying(255) NOT NULL,
    fichier_cdr character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.telephone OWNER TO admin;

--
-- Name: telephone_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.telephone_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.telephone_id_seq OWNER TO admin;

--
-- Name: user_session; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.user_session (
    id integer NOT NULL,
    utilisateur_id integer,
    start_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    end_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    session_id character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.user_session OWNER TO admin;

--
-- Name: COLUMN user_session.start_at; Type: COMMENT; Schema: public; Owner: admin
--

COMMENT ON COLUMN public.user_session.start_at IS '(DC2Type:datetime_immutable)';


--
-- Name: COLUMN user_session.end_at; Type: COMMENT; Schema: public; Owner: admin
--

COMMENT ON COLUMN public.user_session.end_at IS '(DC2Type:datetime_immutable)';


--
-- Name: user_session_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.user_session_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_session_id_seq OWNER TO admin;

--
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.utilisateur (
    id integer NOT NULL,
    departement_id integer,
    nom character varying(255) NOT NULL,
    prenom character varying(255) NOT NULL,
    niveau_accreditation integer NOT NULL,
    numero_matricule character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    salt character varying(255) NOT NULL,
    create_at timestamp(0) without time zone NOT NULL,
    is_active boolean NOT NULL,
    roles text NOT NULL,
    last_login_for_user timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    last_login timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    is_deleted boolean NOT NULL
);


ALTER TABLE public.utilisateur OWNER TO admin;

--
-- Name: COLUMN utilisateur.roles; Type: COMMENT; Schema: public; Owner: admin
--

COMMENT ON COLUMN public.utilisateur.roles IS '(DC2Type:array)';


--
-- Name: utilisateur_consultation; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.utilisateur_consultation (
    id integer NOT NULL,
    affaire_id integer NOT NULL,
    utilisateur_id integer NOT NULL,
    created_by_id integer NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    expire_at timestamp(0) without time zone NOT NULL,
    is_revoked boolean NOT NULL,
    statut integer
);


ALTER TABLE public.utilisateur_consultation OWNER TO admin;

--
-- Name: utilisateur_consultation_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.utilisateur_consultation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.utilisateur_consultation_id_seq OWNER TO admin;

--
-- Name: utilisateur_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.utilisateur_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.utilisateur_id_seq OWNER TO admin;

--
-- Data for Name: affaire; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.affaire (id, created_by_id, departement_id, numero_matricule, nom, description, niveau_accreditation, statut, source, resume, created_at, last_update, rapport_final, cloture_at) FROM stdin;
1	4	3	2021-00009-AFF-DNE- 1631529644-393040	AFFAIRE MABEDJA	AFFAIRE MABEDJA	3	Ouvert	\N	<p>AFFAIRE MABEDJA</p>	2021-09-13 10:40:44	2021-09-13 10:40:44	\N	\N
2	5	3	2021-00010-AFF-DNE- 1635179356-908403	Détention d'armes à feu	Détention d'armes à feu	1	Ouvert	\N	<p>Le d&eacute;nomm&eacute; Fafa ndamy patron du restaurant &laquo; the Best 269 &raquo; sis &agrave; volo volo est une menace. Il est d&eacute;tenteur d&rsquo;armes &agrave; feu comme on le voit sur les vid&eacute;os qu&rsquo;il publie en ligne. Il publie un vid&eacute;o o&ugrave; on estime que c est lui faisant manipulation d&rsquo;un pistolet 9mm avec des mots peu rassurants. Sur son compte Facebook on le retrouve encore posant sur son &eacute;paule un fusil &agrave; pompe (calibre 12).&nbsp;<br />\r\nCeux qui le connaissent disent qu&rsquo;il a d&eacute;tenu r&eacute;ellement ces armes<br />\r\n&nbsp;</p>	2021-10-25 16:29:16	2021-10-25 16:29:16	\N	\N
5	11	6	2021-00011-AFF-DNE- 1636368925-718462	MMARS 1	MISSION DE SAUVEGARDE DES VIES HUMAINES EN MER	5	Ouvert	MMARS 1	<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:24.0pt">SYNTHESE</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">OBJET&nbsp;:</span></u></strong><span style="font-size:16.0pt"> Op&eacute;ration MMARS du 26 au 27 avril 2021</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">OBJECTIF DE LA MISSION&nbsp;</span></u></strong><span style="font-size:16.0pt">: Reconnaissance, rep&eacute;rage et observation sur tous les sites des fa&ccedil;ades maritimes Est et Ouest d&rsquo;Anjouan entre Domoni et Kangani ( l&rsquo;op&eacute;ration est appuy&eacute;e par des images)</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">CONDITIONS DE RECEUIL&nbsp;:</span></u></strong><span style="font-size:16.0pt"> Lundi 26 avril 2021, vent en surface de 19 n&oelig;uds SE sur tout le littoral, une houle de 2,5 m et une visibilit&eacute; appr&eacute;ci&eacute;e &agrave; environ 7 miles marins. </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Conditions relativement d&eacute;favorables ce jour-l&agrave;.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">RESULTATS&nbsp;</span></u></strong><span style="font-size:16.0pt">:</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Entre Domoni et Kangani, on compte au total 09 acc&egrave;s maritimes exploit&eacute;s par les trafiquants.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">1-Site de Chavani&nbsp;:</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Chavani est le premier acc&egrave;s maritime de Domoni du nord vers le sud&nbsp;. Position g&eacute;ographique (Lat&nbsp;: 12&deg;15&rsquo; 25&rsquo;&rsquo; S&nbsp;&nbsp; Long 044&deg; 32&rsquo; 53&rsquo;&rsquo; E).</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Cette position est &eacute;galement l&rsquo;axe de l&rsquo;acc&egrave;s facile aux entr&eacute;es et sorties des barques des passeurs sans se soucier la nuit des zones de d&eacute;ferlement constat&eacute;es aux alentours.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Un pyl&ocirc;ne &agrave; hauteur de Chavani est &eacute;galement pris comme amer dans ce site &agrave; faible marnage. Comme rep&egrave;re et de loin, il peut faciliter les observations en mer.&nbsp; </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Heures de sortie des Kwassas &agrave; Chavani&nbsp;:&nbsp; 19h00 (20%)&nbsp;&nbsp; 02h00 (80%)</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Sur site, un Kwassa de type COMA-4 du boss Youssouf Fakihidine Alias Koujou tel&nbsp;:332 20 30 y &eacute;tait stationn&eacute;e. Un boss d&rsquo;un nouveau r&eacute;seau de Domoni.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">2-Site de Shikirini&nbsp;:</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Shikirini est le deuxi&egrave;me acc&egrave;s maritime de Domoni au sud apr&egrave;s Chavani.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Position g&eacute;ographique ( Lat 12&deg; 15&rsquo; 26&rsquo;&rsquo; S&nbsp; Long 044&deg; 32&rsquo; 54&rsquo;&rsquo; E)</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Site discret enrob&eacute; de la baie de Domoni.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Heure de sortie des trafiquants&nbsp;: 02h00</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Aucune activit&eacute; &eacute;trange n&rsquo;a &eacute;t&eacute; observ&eacute;e dans la zone et il n&rsquo;y&rsquo;avait pratiquement rien &agrave; signaler ce jour-l&agrave; mais cet acc&egrave;s est potentiellement exploit&eacute; par les passeurs.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:16.0pt">3-<u>Site de M&rsquo;tsangua Umb&eacute;li et Balawi</u></span></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">M&rsquo;tsangua Umb&eacute;li et Balawi sont deux plages presque distinctes au sud apr&egrave;s l&rsquo;acc&egrave;s maritime de Shikirini.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Positions g&eacute;ographiques&nbsp;:</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">M&rsquo;tsangua Umb&eacute;li ( Lat 12&deg; 15&rsquo; 26&rsquo;&rsquo; S&nbsp; Long 044&deg; 32&rsquo; 54&rsquo;&rsquo; E) </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Balawi (Lat 12&deg; 15&rsquo; 26&rsquo;&rsquo; S Long 044&deg; 32&rsquo; 53&rsquo;&rsquo; E)</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Vu de la mer, ces deux acc&egrave;s maritimes se situent au pied de la poissonnerie de Domoni et de la grande place publique de la ville. Les sorties sont donc moins fr&eacute;quentes. </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">04 kwassas ont quand m&ecirc;me &eacute;t&eacute; identifi&eacute;s &agrave; Balawi parmi les embarcations de p&ecirc;che artisanale.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">4-Site de M&rsquo;djoumbi&nbsp;:</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">M&rsquo;djoumbi est l&rsquo;acc&egrave;s maritime au sud apr&egrave;s Balawi.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Position g&eacute;ographique (Lat 12&deg; 16&rsquo; 26&rsquo;&rsquo; S&nbsp; Long 044 &deg; 31&rsquo; 53&rsquo;&rsquo; E).</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Cet acc&egrave;s maritime est bien prot&eacute;g&eacute; contre les vagues par un grand rocher &agrave; son entr&eacute;e faisant office de brise-lames. Il y&rsquo;a &eacute;galement un plan inclin&eacute; facilitant les mises &agrave; l&rsquo;eau des Kwassas. M&rsquo;djoumbi est largement exploit&eacute; par les trafiquants.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><u><span style="font-size:16.0pt">Heure des d&eacute;parts&nbsp;:</span></u><span style="font-size:16.0pt"> Susceptible toutes les heures </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Sur les lieux, 07 kwassas ont &eacute;t&eacute; identifi&eacute;s parmi les vedettes de p&ecirc;che dont un portant une immatriculation de Mayotte ( DI 930&nbsp;658). La curiosit&eacute; raconte que cette barque est confi&eacute;e &agrave; Amir Allaouidine, responsable du chantier de production de vedette baptis&eacute; DOVE sis &agrave; </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Domoni, tel&nbsp;: 337 94 75</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">5) Gomaju M&rsquo;ramani</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Cette grande montagne situ&eacute;e au (Lat 12&deg;20&rsquo;,627&nbsp; S Long 044&deg; 32&rsquo;,134 E) se jette sur le plan d&rsquo;eau &agrave; M&rsquo;ramani. Site peu exploit&eacute; pour les sorties &agrave; cause des grandes vagues presque permanentes. &nbsp;</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">En provenance de Mayotte, c&rsquo;est la premi&egrave;re terre qui appara&icirc;t &agrave; l&rsquo;&oelig;il nu vers le sud-est d&rsquo;Anjouan. Elle repr&eacute;sente donc un azimuth pour les passeurs. En bon alignement au large, plusieurs barques pourraient donc y &ecirc;tre observ&eacute;es sur cette ligne maritime entre Gomaju et Mayotte. &nbsp;</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">6) M&rsquo;tsangani Dziani 1 M&rsquo;ramani</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">M&rsquo;tsangani Dziyani 1 est le deuxi&egrave;me acc&egrave;s maritime de M&rsquo;ramani au sud abrit&eacute; par Gomaju.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Position g&eacute;ographique (Lat 12&deg; 20&nbsp;&lsquo;,983 S Long 044&deg; 32&rsquo;,078 E)</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Heures des d&eacute;parts&nbsp;: ind&eacute;termin&eacute;es</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Le site est exploit&eacute; occasionnellement pour les travers&eacute;es Anjouan-Mayotte.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">0&nbsp;3 Kwassas identifi&eacute;s sur site. </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">8) M&rsquo;tsangani Dziyani 2 M&rsquo;ramani</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Cet acc&egrave;s maritime est le troisi&egrave;me de M&rsquo;ramani au sud apr&egrave;s M&rsquo;tsangani Dziyani 1.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Position g&eacute;ographique ( Lat 12&deg; 20&rsquo;, 981 S&nbsp; Long 044&deg; 32&rsquo;, 106 E)</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">M&ecirc;mes crit&egrave;res que l&rsquo;acc&egrave;s maritime M&rsquo;tsangani Dziyani 1.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">01 Kwassa identifi&eacute; sur site.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">9) Acc&egrave;s maritime de Hamchaco</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Unique site de Hamchaco au sud apr&egrave;s M&rsquo;tsangani Dziyani 2 de M&rsquo;ramani&nbsp;.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Position g&eacute;ographique ( Lat 12&deg; 23&rsquo;, 098 S&nbsp; Long 044&deg; 30&rsquo;, 745<sup> </sup>E ).</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Heure des d&eacute;parts&nbsp;: 14h00 ( 30%)&nbsp;&nbsp;&nbsp; 03h00 ( 70%)</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Acc&egrave;s au site tr&egrave;s difficile par voie terrestre, ce qui offre l&rsquo;occasion et le temps aux guetteurs des passeurs de se placer aux sommets et signaler tout mouvement. En mer, Il est tr&egrave;s facile d&rsquo;observer discr&egrave;tement toute activit&eacute; sur site. </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Hamchaco est potentiellement exploit&eacute; pour les travers&eacute;es Anjouan-Mayotte. 07 Kwassas ont &eacute;t&eacute; identifi&eacute;s sur site. Seulement quelques pirogues servent pour la p&ecirc;che.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">10) Acc&egrave;s maritime de Kangani</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Kangani est le premier site au sud-ouest de l&rsquo;&icirc;le.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Position g&eacute;ographique&nbsp;: ( Lat 12&deg; 19&rsquo;, 534 S Long 044&deg; 27&rsquo;, 896 E).</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Le site est prot&eacute;g&eacute; contre les violentes vagues &agrave; son entr&eacute;e par un rocher faisant office de brise-lames comme &agrave; Mdjoumbi Domoni. Ce qui facilite son exploitation toutes les saisons.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Par voie terrestre, l&rsquo;acc&egrave;s maritime de Kangani est tr&egrave;s &eacute;loign&eacute; et compliqu&eacute; au pied d&rsquo;une colline. L&rsquo;absence partielle des forces de l&rsquo;ordre au village est remarquable, c&rsquo;est le site le plus exploit&eacute; en termes d&rsquo;affaires mafieuses actuellement avec des &eacute;trangers qui s&rsquo;y regroupent.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">10 kwassas de type COMA-4 y sont stationn&eacute;es et deux barques seulement con&ccedil;ues pour la p&ecirc;che artisanale. </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Leur lieu de stockage des moteurs hors-bords c&rsquo;est surplace sous le bois. Les moteurs des passeurs sont dissimul&eacute;s un peu partout sur le site couverts de v&ecirc;tements ou de feuilles d&rsquo;arbres. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Plusieurs personnes &eacute;tranges sont observ&eacute;es sur les lieux durant les 48h d&rsquo;op&eacute;ration. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u><span style="font-size:16.0pt">11) Acc&egrave;s maritime de Maweni ya Kangani</span></u></strong></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">&nbsp;Deuxi&egrave;me site de Kangani au nord.</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Position g&eacute;ographique&nbsp;( Lat 12&deg; 19&rsquo;, 534 S Long 044&deg; 27&rsquo;,215 E).</span></span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt">Ce site est souvent oubli&eacute; mais c&rsquo;est un recourt des passeurs de Moya et Kangani. Il est exploit&eacute; souvent si la pr&eacute;sence des Garde-C&ocirc;tes se fait sentir proche des c&ocirc;tes ayant des acc&egrave;s maritimes tr&egrave;s suspects.</span></span></span></p>	2021-11-08 10:55:25	2021-11-08 10:55:25	\N	\N
4	11	6	2021-00011-AFF-DNE- 1636195519-805782	Abdourazakou Mohamed	<div>Immigration Abdourazakou Mohamed</div>	3	Ouvert	\N	<div>IMMIGRATION CLANDESTINE</div>	2021-11-06 10:45:19	2021-11-06 10:45:19	\N	\N
6	11	6	2021-00011-AFF-DNE- 1636537337-486195	MMARS 2	RESEAU DE PASSAGE CLANDESTIN VERS MAYOTTE	5	Ouvert	IMMIGRATION CLANDESTINE	<p>COMPTE-RENDU MMARS 2</p>\r\n\r\n<p>I) DEROULEMENT<br />\r\nDATE DE DEPLOIEMENT&nbsp;: &nbsp;Lundi 10 mai 2021 &agrave; 06h11<br />\r\nZONES CIBLEES&nbsp;: &nbsp;Domoni et Kangani<br />\r\nOBJECTIFS FIXES&nbsp;:<br />\r\n- &nbsp;Identification du r&eacute;seau Mena/Ali Hussein&nbsp;<br />\r\n- Criblage des caches ( Passeurs/R&eacute;seaux, kwassas, acc&egrave;s maritimes d&rsquo;exploitation et num&eacute;ro de t&eacute;l&eacute;phone).<br />\r\n- &nbsp; Observation de la mise en place / Pr&eacute;paratif pour d&eacute;part</p>\r\n\r\n<p>II) IDENTIFICATIONS OPERATIONNELLES&nbsp;<br />\r\nOBJECTIF 1<br />\r\nLe r&eacute;seau Mena/ Ali Hussein&nbsp;:&nbsp;<br />\r\nCe r&eacute;seau est entr&eacute; r&eacute;cemment en anarchie et en dysfonctionnement car le boss du r&eacute;seau le d&eacute;nomm&eacute; Mena est d&eacute;tenu &agrave; Mayotte Majicavo pour blanchiment d&rsquo;argent et contrebande. Ali Hussein en filature.<br />\r\nPilote de Mena&nbsp;: ++MABUYA++ &nbsp;en moto N&deg;721 Q 71&nbsp;<br />\r\nOBJECTIF 2<br />\r\nLe r&eacute;seau Issiaka&nbsp;:</p>\r\n\r\n<p>R&eacute;seau actif de Domoni et potentiellement organis&eacute;. Il forme une pyramide de 01 boss&nbsp;,01 second et neuf trafiquants associ&eacute;s.</p>\r\n\r\n<p>(1)NOM&nbsp;,PRENOM,SURNOM&nbsp;: ++ ISSIAKA++CHILEZA++<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NUMERO DE TELEPHONE&nbsp;: ++ 483 00 42++ 350 88 64++&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; METIER /ACTIVITE&nbsp;: Armateur ( Boss du r&eacute;seau)<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; ZONE D&rsquo;EVOLUTION&nbsp;: Pour l&rsquo;ensemble du r&eacute;seau, voir photos kwassa, &nbsp;Localisation g&eacute;ographique du lieu de stockage et des passeurs en annexe de ce compte-rendu.&nbsp;</p>\r\n\r\n<p>(2)NOM,PRENOM,SURNOM&nbsp;: ++MOUHAMADI++BASSOUR++ALIAS++MWEGNE<br />\r\nNUMERO DE TELEPHONE&nbsp;: ++ 492 58 58++<br />\r\nMETIER/ACTIVITE&nbsp;: N&deg;2 du r&eacute;seau Issiaka</p>\r\n\r\n<p>(3)NOM,PRENOM,SURNOM&nbsp;: ++ SAID++ANLY++ALIAS++ROUPA<br />\r\nNUMERO DE TELEPHONE&nbsp;: ++ 339 40 28++ 454 42 18++<br />\r\nMETIER/ACTIVITE&nbsp;: Cherche, oriente et regroupe les passagers du r&eacute;seau Issiaka</p>\r\n\r\n<p>(4)NOM,PRENOM,SURNOM&nbsp;:++MOUSSA++IBRAHIM++ALIAS++<br />\r\nJAPONAIS++<br />\r\nNUMERO DE TELEPHONE&nbsp;: neant<br />\r\nMETIER/ACTIVITE&nbsp;: Cherche, oriente et regroupe les passagers du r&eacute;seau Issiaka</p>\r\n\r\n<p>(5)NOM,PRENOM,SURNOM&nbsp;: ++SOYAD++BEN OMAR++NEANT<br />\r\nNUMERO DE TELEPHONE&nbsp;: Neant&nbsp;<br />\r\nMETIER/ACTIVITE&nbsp;: Cherche, oriente et regroupe les passagers du r&eacute;seau Issiaka</p>\r\n\r\n<p>(6)NOM,PRENOM,SURNOM&nbsp;: ++ ANLY++ MOHAMED++ALIAS++SEGOUWA<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Cherche, oriente et regroupe les passagers du r&eacute;seau Issiaka</p>\r\n\r\n<p>(7)NOM,PRENOM,SURNOM&nbsp;: ++ZAENBIDINE++HAMIDOUNE++NEANT++<br />\r\nNUMERO DE TELEPHONE&nbsp;: ++442 90 07++ 322 90 07++<br />\r\nMETIER/ACTIVITE&nbsp;: Cherche, oriente et regroupe les passagers du r&eacute;seau Issiaka</p>\r\n\r\n<p>(8)NOM,PRENOM,SURNOM&nbsp;: ++FARID++AHAMADI ABDEREMANE++ALIAS++GALFE++<br />\r\nNUMERO DE TELEPHONE&nbsp;: NEANT<br />\r\nMETIER&nbsp;/ACTIVITE&nbsp;: M&eacute;canicien des moteurs hors-bords utilis&eacute;s dans le r&eacute;seau Issiaka</p>\r\n\r\n<p><br />\r\n(9) NOM,PRENOM,SURNOM&nbsp;: ++INSA++SOULAIMANA++NEANT<br />\r\nNUMERO DE TELEPHONE&nbsp;:++ 325 21 00++ 446 21 00++<br />\r\nMETIER/ACTIVITE&nbsp;: Pilote de Kwassa&nbsp;</p>\r\n\r\n<p>(10) NOM,PRENOM,SURNOM&nbsp;: ++MOHAMED++ALIAS++MESSI++<br />\r\nNUMERO DE TELEPHONE&nbsp;: ++361 85 35++ 431 85 34++<br />\r\nMETIER/ACTIVITE&nbsp;: Pilote tr&egrave;s exp&eacute;riment&eacute; de Kwassa maitrisant parfaitement bien les eaux mahoraises&nbsp;</p>\r\n\r\n<p>(11)NOM,PRENOM,SURNOM&nbsp;: ++ANZIM++ABDOU SALIM++ NEANT<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Magasinier r&eacute;seau Issiaka&nbsp;<br />\r\nOBJECTIF 3<br />\r\nc)Le r&eacute;seau Karim&nbsp;:<br />\r\nR&eacute;seau formant une pyramide de 06 passeurs.<br />\r\n(01)NOM,PRENOM,SURNOM&nbsp;: ++KARIM++NDEDE++NEANT++<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant&nbsp;<br />\r\nMETIER/ACTIVITE&nbsp;: Boss du r&eacute;seau</p>\r\n\r\n<p>(02)NOM,PRENOM,SURNOM&nbsp;: ++MOUNA++ (depuis Mayotte)<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Facilitateur&nbsp;</p>\r\n\r\n<p><br />\r\n(03)NOM,PRENOM,SURNOM&nbsp;: ++ANDJIB++<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Magasinier</p>\r\n\r\n<p>(04)NOM,PRENOM,SURNOM&nbsp;: ++RASTA++<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Pilote</p>\r\n\r\n<p>(05)NOM,PRENOM,SURNOM&nbsp;: ++IBRAHIM++AHMED++ALIAS++MBOKO++<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Pilote</p>\r\n\r\n<p>(05)NOM,PRENOM,SURNOM&nbsp;: ++OMAR++<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Collecteur&nbsp;/Vendeur r&eacute;seau Karim</p>\r\n\r\n<p><br />\r\nOBJECTIF 4<br />\r\nLe r&eacute;seau Abd&eacute;r&eacute;mane&nbsp;:</p>\r\n\r\n<p>R&eacute;seau de trois trafiquants.&nbsp;</p>\r\n\r\n<p><br />\r\n(01)NOM,PRENOM,SURNOM&nbsp;: ++ABDEREMANE++<br />\r\nNUMERO DE TELEPHONE&nbsp;: 423 57 83<br />\r\nMETIER/ACTIVITE&nbsp;: Boss de r&eacute;seau&nbsp;</p>\r\n\r\n<p>(02) NOM,PRENOM,SURNOM&nbsp;: ++HAIRDINE++SOIBAHOU++<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Trafiquant de drogue</p>\r\n\r\n<p>&nbsp; &nbsp; (03)NOM, PRENOM, SURNOM&nbsp;: ++LAUTAR++ISMAEL++<br />\r\nNUMERO DE TELEPHONE&nbsp;: N&eacute;ant<br />\r\nMETIER/ACTIVITE&nbsp;: Trafiquant de drogue</p>\r\n\r\n<p>II) SYNTHESE<br />\r\nRep&eacute;rage, identification et observation maritime<br />\r\nLe naufrage survenu en mer la nuit du dimanche 9 mai 2021 entre Anjouan et Mayotte qui a fait plusieurs morts, a dissuad&eacute; un tr&egrave;s grand nombre de passeurs de Domoni et Kangani les deux jours suivants.&nbsp;<br />\r\nEn mer on observait les embarcations rang&eacute;es en mode inactifs. Toute fois le mercredi 12 mai 2021, les pr&eacute;paratifs semblaient reprendre sur quelques acc&egrave;s maritimes&nbsp;:<br />\r\nLe mercredi 12 mai 2021 &agrave; 16h26, &agrave; M&rsquo;djoumbi plus au sud, position g&eacute;ographique (lat 12&deg;15&rsquo;,988S&nbsp;; long 044&deg;31&rsquo;,908 E ), une grosse embarcation non pont&eacute;e d&rsquo;environ 12m avec une glaci&egrave;re centrale &eacute;tait pr&eacute;par&eacute;e. Des personnes non identifi&eacute;es &eacute;taient occup&eacute;es &agrave; embarquer une grosse quantit&eacute; de carburant &agrave; bord. Notons que la plupart des p&ecirc;cheurs en activit&eacute; dans les eaux anjouanaises ne partent pas en mer avec une quantit&eacute; de carburant d&eacute;passant 70 litres. Ils n&rsquo;ont finalement pas fait mouvement ce jour-la comme s&rsquo;ils attendaient du monde ou quelque chose.<br />\r\nEn plus, &eacute;quip&eacute;e de deux moteurs hors-bords de 40 CV, cette barque porte l&rsquo;immatriculation de Mayotte DI 931107 avec comme identifiant sur la coque BARAKAYATROU (voir image). Trois hypoth&egrave;ses&nbsp;: 1) P&ecirc;che ill&eacute;gale &agrave; Mayotte sous la couverture du num&eacute;ro. 2) Contrebande &nbsp;3) Immigration&nbsp;</p>\r\n\r\n<p>Le m&ecirc;me jour, &agrave; Hamchaco, acc&egrave;s maritime situ&eacute; &agrave; 3 miles marins au sud de Kangani, au sommet, un nombre cons&eacute;quent de passagers y &eacute;tait regroup&eacute; (voir image). Au pied du site aucun Kwassa n&rsquo;&eacute;tait encore pr&eacute;par&eacute;. A b&acirc;bord, sur la montagne nord de la plage, un guetteur y &eacute;tait positionn&eacute;(voir image). Son r&ocirc;le c&rsquo;est de d&eacute;tecter si l&rsquo;une des vedettes rapides des Garde-c&ocirc;tes rode dans les parages. Comme indice, d&egrave;s qu&rsquo;une personne se positionne par-l&agrave;, point qui offre une meilleure vue jusqu&rsquo;&agrave; Moya, c&rsquo;est qu&rsquo;une travers&eacute;e s&rsquo;y concr&eacute;tise. Ils ont d&ucirc; abandonner surement &agrave; cause de l&rsquo;&eacute;tat de la mer.</p>\r\n\r\n<p>A Kangani toujours un nombre aussi &eacute;norme d&rsquo;embarcations de type Coma-4&nbsp;, plus de 12 avec des anti-roulis (tous des Kwassas) pr&eacute;vus pour Anjouan Mayotte (voir image), il y&rsquo;avait seulement 5 pirogues de p&ecirc;che et une embarcation de 6m immatricul&eacute;e pour la p&ecirc;che. &nbsp;Le site &eacute;tait plut&ocirc;t calme.&nbsp;</p>\r\n\r\n<p>Rep&eacute;rage et criblage sur le littoral :<br />\r\nReseau Issiaka&nbsp;:<br />\r\nTous les associ&eacute;s du r&eacute;seau Issiaka viennent de Domoni. Leur principale activit&eacute; c&rsquo;est d&rsquo;assurer la ligne ill&eacute;gale &agrave; passagers entre Anjouan et Mayotte.&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; Ils se sont fabriqu&eacute;s un type de Kwassa tr&egrave;s spacieux &agrave; ma&icirc;tre-bau important afin de pouvoir transporter minimum 30 personnes en un seul coup (voir image). En cas d&rsquo;interception du Kwassa, quelques jours apr&egrave;s, il se font livrer un autre par un chantier fant&ocirc;me qui loue le moule de production de Kwassa chez Djamaldine Ali . Chef du chantier &nbsp;&laquo;&nbsp;Bahati ya walozi&nbsp;&raquo; de Domoni.<br />\r\nUne maison est utilis&eacute;e comme lieu de stockage et de regroupement (voir image). Elle est situ&eacute;e &agrave; Domoni dans la position g&eacute;ographique &nbsp;(Lat 12&deg; 15&rsquo;,654 S&nbsp;; long 044&deg; 32&rsquo;,058 E).<br />\r\nTous leurs d&eacute;parts s&rsquo;effectuent &agrave; l&rsquo;acc&egrave;s maritime de Chavani, localisation (Lat&nbsp;: 12&deg;15&rsquo; 25&rsquo;&rsquo; S&nbsp;&nbsp; Long 044&deg; 32&rsquo; 53&rsquo;&rsquo; E).</p>\r\n\r\n<p>Reseau Karim&nbsp;:<br />\r\nLe reseau actif Karim de Domoni s&rsquo;est bas&eacute; principalement sur la contrebande &agrave; Mayotte et le transport de marchandises et produits vol&eacute;s &agrave; Mayotte ( Motocycles, moteurs hors-bords etc) vers Anjouan.<br />\r\nLeur magasin de stockage est localis&eacute; &agrave; la position ( Lat 12&deg; 15&rsquo;,877 S&nbsp;; Long 044&deg; 31&rsquo;, 923 E). Le trafiquant roule sur la moto matricule sous le N&deg; 453 Z 71.<br />\r\nLeurs acc&egrave;s maritime d&rsquo;exploitation c&rsquo;est le site M&rsquo;djoumbi (Lat 12&deg; 16&rsquo; 26&rsquo;&rsquo; S &nbsp;Long 044 &deg; 31&rsquo; 53&rsquo;&rsquo; E) de Domoni.<br />\r\nLe r&eacute;seau b&eacute;n&eacute;ficie des services de facilitation du c&ocirc;t&eacute; de Mayotte d&rsquo;un certain Mouna (voir image) contre de ran&ccedil;ons r&eacute;guli&egrave;res.</p>\r\n\r\n<p>Le reseau Abderemane&nbsp;:<br />\r\nCe r&eacute;seau de Domoni s&rsquo;est focalis&eacute; sur le trafique des produits stup&eacute;fiants ( Cannabis, chimique et autres drogues) entre Anjouan et Mayotte.<br />\r\nLieu secret de stockage &agrave; la position g&eacute;ographique ( Lat 12&deg; 15&rsquo;,851 S, 044&deg; 32&rsquo;,661 E) Domoni.<br />\r\nLeurs acc&egrave;s maritime d&rsquo;exploitation c&rsquo;est encore le site M&rsquo;djoumbi (Lat 12&deg; 16&rsquo; 26&rsquo;&rsquo; S &nbsp;Long 044 &deg; 31&rsquo; 53&rsquo;&rsquo; E) de Domoni.</p>\r\n\r\n<p>Presque tous ces r&eacute;seaux b&eacute;n&eacute;ficient des grands services de deux malfaiteurs &agrave; Mayotte en &eacute;change de billets de banque. Ces deux l&agrave; orientent les passeurs et les font p&eacute;n&eacute;trer sur terre &agrave; Mayotte sans craindre les unit&eacute;s de r&eacute;pression en mer. Il s&rsquo;agit de&nbsp;:<br />\r\nSURNOM&nbsp;: ++RASTA++<br />\r\nNUMEROS DE TELEPHONE&nbsp;(Mayotte)&nbsp;: ++639 06 10 74++<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;++639 71 89 70++ &nbsp;&nbsp;<br />\r\nADRESSE&nbsp;: HAMJAGO MAYOTTE</p>\r\n\r\n<p>PRENOM&nbsp;: ++KARIM++<br />\r\nNUMERO DE TELEPHONE ( Mayotte)&nbsp;: ++639 26 27 62++<br />\r\nADRESSE&nbsp;: MTSAHARA MAYOTTE&nbsp;<br />\r\n&nbsp;</p>	2021-11-10 09:42:17	2021-11-10 09:42:17	\N	\N
\.


--
-- Data for Name: affaire_directed; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.affaire_directed (id, affaire_id, utilisateur_id, is_revoked, created_at, last_update) FROM stdin;
1	1	4	f	2021-09-13 10:40:44	2021-09-13 10:40:44
2	2	5	f	2021-10-25 16:29:16	2021-10-25 16:29:16
4	4	11	f	2021-11-06 10:45:19	2021-11-06 10:45:19
5	5	11	f	2021-11-08 10:55:26	2021-11-08 10:55:26
6	6	11	f	2021-11-10 09:42:17	2021-11-10 09:42:17
\.


--
-- Data for Name: affaire_utilisateur; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.affaire_utilisateur (id, utilisateur_id, affaire_id, created_at, is_revoked, responsability, niveau_accreditation) FROM stdin;
1	4	1	2021-09-13 10:40:44	f		3
2	5	2	2021-10-25 16:29:16	f		1
4	11	4	2021-11-06 10:45:19	f		3
5	11	5	2021-11-08 10:55:26	f		5
6	11	6	2021-11-10 09:42:17	f		5
\.


--
-- Data for Name: affectation; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.affectation (id) FROM stdin;
\.


--
-- Data for Name: alias; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.alias (id, personne_id, alias) FROM stdin;
1	1	FAFA NDAMY
2	4	Mwein Mpessa
3	5	Bolo
4	6	3698382
5	8	koudjou
\.


--
-- Data for Name: attachements; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.attachements (id, entite_id, envenement_id, name, type, description, created_at, last_update) FROM stdin;
1	1	\N	6176defa66dfd.jpg	1	jpg	\N	\N
2	\N	1	6176e520f21b5.jpg	1	jpg	\N	\N
3	\N	1	6176e520f23ab.jpg	1	jpg	\N	\N
4	\N	1	6176e520f2497.jpg	1	jpg	\N	\N
5	\N	1	6176e520f2571.jpg	1	jpg	\N	\N
6	\N	1	6176e520f264e.jpg	1	jpg	\N	\N
7	1	\N	6177a4a519e07.jpg	1	jpg	\N	\N
\.


--
-- Data for Name: courrier; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.courrier (id, affectation_id, created_by_id, response_to_id, flux, origine, destination, datecourrier, reference_interne, sujet, contenu, type, created_at, statut, commentaire, is_response, entry) FROM stdin;
1	\N	3	\N	1	AE	KM	2019-02-04	19/0147/442	A propos de Mayotte	\N	1	2021-09-11 11:14:05	1	<p>A propos de Mayotte</p>	f	entry_6151ac47b48746.37553516
3	\N	3	\N	1	AE	KM	2021-01-03	21/0002/232	محمد حسين دحلان	<p>تجنيد محمد حسين دحلان</p>	1	2021-09-18 10:45:19	1	<p>تجنيد محمد حسين دحلان</p>	f	entry_6151ac47c34ce1.95350972
4	\N	3	\N	1	AF	AF	2021-01-05	21/0011/547	جمعية أمناء شباب كينيا الخيرية	<p>جمعية أمناء شباب كينيا الخيرية</p>	1	2021-09-20 11:53:50	1	<p>جمعية أمناء شباب كينيا الخيرية</p>	f	entry_6151ac47c74ec6.48424719
5	\N	3	\N	1	AE	KM	2021-01-11	21/0032/037	جماعة الاخوان	<p>تقي راضي حول جماعة الاخوان في جزر القمر</p>	1	2021-09-20 12:07:48	1	<p>جماعة الاخوان في جزر القمر</p>	f	entry_6151ac47cb6ea4.65788926
7	\N	3	\N	1	AE	KM	2021-01-21	21/0066/631	العملية المشتركة في متابعة جماعة الاخوان في جزر القمر	<p>تجنيد المدعو محمد شيخ على مسؤول جماعة الاخوان في جزر القمر</p>	1	2021-09-20 12:16:11	1	<p>تجنيد محمد شيخ علي</p>	f	entry_6151ac47d39450.96215156
8	\N	3	\N	1	AE	KM	2021-02-12	20/1092/408	علاقة جماعة إخوغن المسلمين بالعمليات الارهابية الأخيرة	<p>علاقة الجماعة بالعمليات الارهابية</p>	1	2021-09-20 12:26:53	1	<p>علاقة الجماعة بالعمليات الارهابية</p>	f	entry_6151ac47d79966.94131374
9	\N	3	\N	1	AE	KM	2021-04-12	21/0406/822	تهنئة	<p>تهنئة بمناسبة حلول شهر رمضان</p>	0	2021-09-20 12:36:55	1	<p>تهنئة بمناسبة حلول شهر رمضان</p>	f	entry_6151ac47dbb793.43702706
10	\N	3	\N	1	AE	KM	2021-05-10	21/05/2021	تهنئة عيد الفطر	<p>تهنئة بمناسبة عيد الفطر</p>	0	2021-09-22 07:10:15	1	<p>تهنئة عيد الفطر</p>	f	entry_6151ac47dfb9a6.38087039
11	\N	3	\N	1	AE	KM	2021-05-05	21/0497/258	مركز الرواد للتعليم في مومباسا	<p>توفير معلومات مركز الرواد ومقره في كينيا</p>	1	2021-09-22 07:16:58	1	<p>توفير معلومات&nbsp; مركز الرواد</p>	f	entry_6151ac47e61a52.98858397
12	\N	3	\N	1	AE	KM	2021-05-05	21/0497/258	مركز الرواد للتعليم في مومباسا	<p>توفبر معلومات مركز الرواد ومقره في كينيا</p>	1	2021-09-22 07:23:03	1	<p>مركز الرواد في كينيا</p>	f	entry_6151ac47ef08a9.78878121
13	\N	3	\N	1	AE	KM	2021-03-29	21/0349/929	عقد اجتماع مختصين مكافحة الارهاب	<p>الأجندة المقترحة للاجتماع</p>	1	2021-09-22 07:31:37	1	<p>الأجندة المقترحة في الاجتماع</p>	f	entry_6151ac4801bf49.10276792
14	\N	3	\N	1	AE	KM	2021-03-29	21/0349/929	عقد اجتماع مختصين مكافحة الارهاب	<p>الأجندة المقترحة للاجتماع</p>	1	2021-09-22 07:31:53	1	<p>الأجندة المقترحة في الاجتماع</p>	f	entry_6151ac480a32a2.10433953
15	\N	3	\N	1	AE	KM	2021-05-16	21/0518/296	منظمة حسنة	<p>توفير معلومات عن الشخصيات التركية ومنظمة حسنة&nbsp;</p>	1	2021-09-22 07:42:46	1	<p>توفير معلومات عن الشخصيات التركية ومنظمة حسنة&nbsp;</p>	f	entry_6151ac4811ffb8.88218800
17	\N	3	\N	1	AE	KM	2021-06-16	21/0634/414	مستجدات تنظيم اخوان المسلمين في كينيا	<p>توفير معلزمات عن تنظيم اخوان المسلمين في كينيا</p>	1	2021-09-22 07:59:39	1	<p>توفير معلزمات عن تنظيم اخوان المسلمين في كينيا</p>	f	entry_6151ac481a6b30.17344386
18	\N	3	\N	2	KM	AE	2021-02-04	06/2021	زيارة وفد الجهاز الاستخبارات الوطني إلى جزر القمر	\N	1	2021-09-22 08:07:27	1	<p>زيارة وفد الجهز الاماراتي إلى جزر القمر</p>	f	entry_6151ac481e6af1.23784362
19	\N	3	\N	1	AE	KM	2021-03-31	21/0363/990	تدريب الأئمة	<p>طلب كشف أسماء الأئمة المراد تدريبهم</p>	1	2021-09-22 08:13:49	1	<p>طلب كشف أسماء الأئمة المراد تدريبهم</p>	f	entry_6151ac48228d41.06583357
20	\N	3	\N	1	AE	KM	2021-05-20	21/0541/564	العملية المشتركة في متابعة جماعة الاخوان	<p>تجنيد تقي راضي</p>	1	2021-09-22 08:20:00	1	<p>تجنيد تقي راضي</p>	f	entry_6151ac48269975.85858620
21	\N	3	\N	2	KM	AE	2021-01-10	01/21	مشروع دكسا	<p>انعقاد مناقشة مشروع دكسا</p>	1	2021-09-23 12:27:05	1	<p>انعقاد مناقشة مشروع دكسا</p>	f	entry_6151ac482ab410.40645021
22	\N	3	\N	2	KM	AE	2021-01-09	02/21	العملية المشتركة في متابعة جماعة الاخوان في جزر القمر	<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;متابعة مستجدات المدعو احمد مويني من قيادات الاخوان في جزر القمر</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;</p>	1	2021-09-23 12:36:51	1	<p>&nbsp; &nbsp;متابعة مستجدات المدعو احمد مويني من قيادات الاخوان في جزر القمر</p>	f	entry_6151ac482eb321.73458206
23	\N	3	\N	2	KM	AE	2021-01-21	03/21	العملية المشتركة في متابعة جماعة الاخوان المسلمين في جزر القمر	<p>&nbsp; &nbsp; &nbsp;حول التقرب ومحاولة تجنيد المدعو/ محمد حسين</p>	1	2021-09-23 12:45:23	1	<p>&nbsp;حول التقرب ومحاولة تجنيد المدعو/ محمد حسين</p>	f	entry_6151ac4832d8f0.56279205
24	\N	3	\N	2	KM	AE	2021-01-21	04/21	العملية المشتركة ضد النفوذ الاراني في جزر القمر	<p>حول ارسال مصدر لتغطيت النشاط الإيراني الي مدغشكر</p>	1	2021-09-23 13:03:43	1	<p>حول ارسال مصدر لتغطيت النشاط الإيراني الي مدغشكر</p>	f	entry_6151ac4836de17.45840061
25	\N	3	\N	2	KM	AE	2021-01-29	04/21	: العملية المشتركة في متابعة الاخوان المسلمين في جزر القمر	<p>بيان تخفيف العمل الميداني في زمن كورونا</p>	1	2021-09-23 13:17:39	1	<p>بيان تخفيف العمل الميداني في زمن كورونا</p>	f	entry_6151ac483c5fe3.01423463
26	\N	3	\N	2	KM	AE	2021-02-04	06/21	زيارة وفد جهاز الاستخبارات الوطني الي جزر القمر	<p>تأجيل زيارة وفد الجهاز الاماراتي&nbsp;</p>	1	2021-09-23 13:23:48	1	<p>تأجيل زيارة وفد الجهاز الاماراتي&nbsp;</p>	f	entry_6151ac48449092.64802406
2	\N	3	\N	1	AE	KM	2021-09-10	12/0632/639	مجال الدفاع	<p>مخاطبة الوزير الاماراتي</p>	1	2021-09-18 10:23:45	1	<p>مخاطبة الوزير الاماراتي</p>	f	entry_6151ac47badd97.75942185
6	\N	3	\N	1	AE	KM	2021-01-21	21/0066/631	العملية المشتركة في متابعة جماعة الاخوان في جزر القمر	<p>تجنيد المدعو محمد شيخ على مسؤول جماعة الاخوان في جزر القمر</p>	1	2021-09-20 12:16:07	1	<p>تجنيد محمد شيخ علي</p>	f	entry_6151ac47cf7275.10834238
16	\N	3	\N	1	AE	KM	2021-05-10	21/0512/529	العملية المشتركة في متابعة أنشطة جماعة الاخوان	<p>شخصيات تتبع تنظيم اخوان المسلمين في جزر القمر وعلاقتهم بشركة عيد الخيرية القطرية</p>	1	2021-09-22 07:49:14	1	<p>شخصيات تتبع تنظيم اخوان المسلمين في جزر القمر وعلاقتهم بشركة عيد الخيرية القطرية</p>	f	entry_6151ac48164d98.94425413
27	\N	3	\N	2	KM	AE	2021-03-10	09/21	تدريب الأئمة في جزر القمر	<p>البيانات الشخصية ألمئمة المساجد المراد تدريبهم في جزر القمر</p>	1	2021-09-27 11:36:00	1	<p>البيانات الشخصية ألمئمة المساجد المراد تدريبهم في جزر القمر</p>	f	entry_6151aca0754055.51449068
28	\N	3	\N	2	KM	AE	2021-04-04	11/21	عقد اجتماع مختصن مكافحة االرهاب	<p>موافقة على األجندة المقترحة من قبل&nbsp; الجهاز الاماراتي.</p>	1	2021-09-27 11:44:10	1	<p>موافقة على األجندة المقترحة من قبل&nbsp; الجهاز الاماراتي</p>	f	entry_6151ae8a294e85.03931210
29	\N	3	\N	2	KM	AE	2021-04-17	12/21	العملية المشتركة في متابعة جماعة االخوان في جزر القمر	<p>، تم اكتشاف جمعية خيرية مسجلة في فرنسا من قبل أفراد قمريين باسم &quot; فخار و نور لألعمال الخيرية</p>	1	2021-09-27 11:50:01	1	<p>، تم اكتشاف جمعية خيرية مسجلة في فرنسا من قبل أفراد قمريين باسم &quot; فخار و نور لألعمال الخيرية</p>	f	entry_6151afe9e96fc2.52279941
30	\N	3	\N	2	KM	AE	2021-04-17	13/21	: التهديدات اإلرهابية في موزمبيق	<p>موجز الوقائع الميدانية حول تطور العمليات اإلرهابية في موزمبيق ومدى خطورتها على األمن في جزر القمر، وما يمكن اتخاذها كإجراءات وقائية .</p>	1	2021-09-27 11:54:34	1	<p>موجز الوقائع الميدانية حول تطور العمليات اإلرهابية في موزمبيق ومدى خطورتها على األمن في جزر القمر، وما يمكن اتخاذها كإجراءات وقائية .</p>	f	entry_6151b0fa0e8ad1.50755367
31	\N	3	\N	2	KM	AE	2021-05-02	14/21	: العملية المشتركة في متابعة جماعة االخوان في جزر القمر	<p>تم اكتشاف وصول عنصرين تركيين هما المدعو ABDURRAHMAN SEKER و المدعو SELMAN AKTAS عبر دار السالم إلى جزر القمر و ذلك يوم 29/04/2021 من أجل إجراء مقابلة الختيار التالميذ المستفيدين من برنامج &quot; منح الديانات &quot; للعام 2</p>	1	2021-09-27 12:02:39	1	<p>تم اكتشاف وصول عنصرين تركيين هما المدعو ABDURRAHMAN SEKER و المدعو SELMAN AKTAS عبر دار السالم إلى جزر القمر و ذلك يوم 29/04/2021 من أجل إجراء مقابلة الختيار التالميذ المستفيدين من برنامج &quot; منح الديانات &quot; للعام 2</p>	f	entry_6151b2dfa2e022.95531324
32	\N	3	\N	2	KM	AE	2021-05-17	17/21	خطاب موجه الي معالي وزير الدولة لشؤون الدفاع بدولة اإلمارات العربية  المتحدة	<p>&nbsp;خطاب معالي الوزير/ محمد يوسف علي، مدير متكب فخامة الرئيس المكلف بالدفاع، موجه الي معالي الوزير/ محمد أحمد البواردي، وزير الدولة لشؤون الدفاع بدولة اإلمارات العربية المتحدة.</p>	1	2021-09-27 12:09:13	1	<p>خطاب معالي الوزير/ محمد يوسف علي، مدير متكب فخامة الرئيس المكلف بالدفاع، موجه الي معالي الوزير/ محمد أحمد البواردي، وزير الدولة لشؤون الدفاع بدولة اإلمارات العربية المتحدة.</p>	f	entry_6151b46951cd74.07771525
33	\N	3	\N	2	KM	AE	2020-02-14	18/20	العملية المشتركة في متابعة جماعة اإلخوان المسلمين في  جزر القمر	<p>مذكرة عن تحركات محمد شيخ علي ومحمد حسين دخالن من قادة جماعة اإلخوان في جزر القمر</p>	1	2021-09-27 12:14:28	1	<p>مذكرة عن تحركات محمد شيخ علي ومحمد حسين دخالن من قادة جماعة اإلخوان في جزر القمر</p>	f	entry_6151b5a4685049.54619314
34	\N	3	\N	2	KM	AE	2021-05-29	18/21	العملية المشتركة في متابعة جماعة اإلخوان في جزر القمر	<p>اكتشاف الأسر التنظيمية التابعة للجماعة والقائمين عليها، واكتشاف بعض الأسر الرئيسية تابعة لبعض المناطق مع قادة تلك األسر التنظيمية.</p>	1	2021-09-27 12:28:11	1	<p>كتشاف الأسر التنظيمية التابعة للجماعة والقائمين عليها، واكتشاف بعض الأسر الرئيسية تابعة لبعض المناطق مع قادة تلك األسر التنظيمية</p>	f	entry_6151b8db4204d2.94668994
35	\N	3	\N	2	KM	AE	2021-02-10	07/21	استلام أجهزة التقنية السرية	<p>استلام أجهزة التقنية السرية</p>	1	2021-09-27 12:48:00	1	<p>استلام أجهزة التقنية السرية</p>	f	entry_6151bd80a6bf61.99694632
36	\N	3	\N	2	KM	EG	2021-02-28	003/21	: المدعو محمد متوال زهيد )باكستاني الجنسية)	<p>&nbsp;المدعو محمد متوال زهيد باكستاني الجنسية</p>	1	2021-09-27 19:56:34	1	<p>&nbsp;المدعو محمد متوال زهيد باكستاني الجنسية</p>	f	entry_615221f243aba7.87227674
37	\N	3	\N	2	KM	EG	2021-02-28	004/21	: المدعو تقي راض MOHAMED IBRAHIM RADI T	<p>المدعو تقي راض مصر الجنسية عضو من التنظيم في جزر القمر. بياناته الشخصية</p>	1	2021-09-27 20:03:52	1	<p>المدعو تقي راض مصر الجنسية عضو من التنظيم في جزر القمر. البيانات الشخصية</p>	f	entry_615223a82033b8.29623867
38	\N	3	\N	2	KM	EG	2021-08-25	005/21	طلب تدقيق الشخصيات الوارد أسماؤهم أدناه	<p>تدقيق أسماء مصريين دخلوا جزر القمر بغرض القيام بأنشطة تجارية&nbsp;</p>	1	2021-09-30 08:02:42	1	<p>تدقيق أسماء مصريين دخلوا جزر القمر بغرض القيام بأنشطة تجارية&nbsp;</p>	f	entry_61556f23b10492.99333663
39	\N	3	\N	2	KM	EG	2021-09-12	006/21	الورشة التدريبية للجنة الإعلامية التابعة للمنتدى العربي الاستخباري	<p>أسماء المرشحين للمشاركة التدريبية للجنة الاعلامية التابعة للمنتدي العربي الاستخباري</p>	1	2021-09-30 08:14:23	1	<p>أسماء المرشحين للمشاركة التدريبية للجنة الاعلامية التابعة للمنتدي العربي الاستخباري</p>	f	entry_615571df6ce5c7.69556297
40	\N	3	\N	2	KM	EG	2021-02-28	002/21	توضيح حول بعض النقط التي تم اقتراحه ا في جلسة القاهرة بتاريخ 27 / 02 / 2021	<p>&nbsp;توضيح حول بعض النقط التي تم اقتراحه ا في جلسة القاهرة بتاريخ 27 / 02 / 2021</p>	1	2021-09-30 08:25:09	1	<p>&nbsp;توضيح حول بعض النقط التي تم اقتراحه ا في جلسة القاهرة بتاريخ 27 / 02 / 2021</p>	f	entry_61557465184462.50033937
41	\N	3	\N	2	KM	EG	2021-02-11	001/21	عبور وفد الجهاز القمري - المشارك في ” اجتماع العقبة " – في مطار القاهرة	<p>طلب تسهيل ضيافة وفد قمري فترة عبور في مطار القاهرة</p>	1	2021-09-30 08:38:29	1	<p>طلب تسهيل ضيافة وفد قمري فترة عبور في مطار القاهرة</p>	f	entry_61557785884546.33818127
42	\N	3	\N	2	KM	EG	2021-09-30	007/21	تهنئة	<p>تهنئة رمضان</p>	0	2021-09-30 08:51:30	1	<p>تهنئة حلول شهر رمضان</p>	f	entry_61557a92cba762.91164868
43	\N	3	\N	1	AE	KM	2021-01-19	002/21	استلام ميزانية المركز	<p>استلام ميزانية المركز لفترة يناير إلاى مرس 2021</p>	1	2021-09-30 09:28:39	1	<p>استلام ميزانية المركز لفترة يناير إلاى مرس 2021</p>	f	entry_61558347c62cd7.55314930
44	\N	3	\N	2	KM	AE	2021-01-27	330/2021	مشروع دكسا	<p dir="RTL" style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt"><span style="font-family:&quot;Simplified Arabic&quot;,&quot;serif&quot;">&nbsp;السير الذاتية لاثنين من الاعلاميين للدول العربية الذين يودون العمل معنا في لامشروع&nbsp;&nbsp;</span></span></span></span></p>	1	2021-09-30 09:44:35	1	<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:16.0pt"><span style="font-family:&quot;Simplified Arabic&quot;,&quot;serif&quot;">&nbsp;السير الذاتية لاثنين من الاعلاميين للدول العربية الذين يودون العمل معنا في لامشروع&nbsp;&nbsp;</span></span></span></span></p>	f	entry_615587032420e7.52523846
45	\N	3	\N	2	KM	AE	2021-01-31	004/2021	مشروع دكسا	<p>سورة ذاتية لاحد الراغبين للعمل معنا في مشروع دكسا</p>	1	2021-09-30 09:55:11	1	<p>سورة ذاتية لاحد الراغبين للعمل معنا في مشروع دكسا</p>	f	entry_6155897fc558d9.12057281
46	\N	3	\N	2	KM	AE	2021-01-31	004/2021	مشروع دكسا	<p>سيرة ذاتية لحد الراغبين للعمل معنا في مشروع دكسا</p>	1	2021-09-30 10:14:11	1	<p>سيرة ذاتية لحد الراغبين للعمل معنا في مشروع دكسا</p>	f	entry_61558df32a69e6.82340610
47	\N	3	\N	1	EG	KM	2021-03-22	002/21	الاجتماع الثالث عشرة لأمانة المنتدي العربي الاستخباري	<p>الاجتماع الثالث عشرة لأمانة المنتدي العربي الاستخباري</p>	1	2021-10-02 11:57:10	1	<p>الاجتماع الثالث عشرة لأمانة المنتدي العربي الاستخباري</p>	f	entry_61584916d25ec9.35262665
48	\N	3	\N	1	EG	KM	2021-02-27	03/2021	developments in the iranian scen	<p>developments in the iranian scen</p>	1	2021-10-02 12:03:54	1	<p>developments in the iranian scen</p>	f	entry_61584aaabcd205.13259606
49	\N	3	\N	1	EG	KM	2021-03-09	04/2021	developments in the iranian scen	<p>developments in the iranian scen</p>	1	2021-10-02 12:11:11	1	<p>developments in the iranian scen</p>	f	entry_61584c5f0cd6e7.11291207
50	\N	3	\N	1	EG	KM	2021-03-08	05/2021	الاجتماع الثاني عشرة لأمانة المنتدي العربي الاستخباري	<p>الاجتماع الثاني عشرة لأمانة المنتدي العربي الاستخباري</p>	1	2021-10-02 12:22:01	1	<p>الاجتماع الثاني عشرة لأمانة المنتدي العربي الاستخباري</p>	f	entry_61584ee9b04a48.58260899
51	\N	3	\N	1	EG	KM	2021-03-20	06/2021	development in the iranian scene	<p>development in the iranian scene</p>	1	2021-10-02 12:28:49	1	<p>development in the iranian scene</p>	f	entry_61585081b8e0a9.11972825
52	\N	3	\N	1	EG	KM	2021-05-09	09-10-11/2021	abdates in the situation in the iranian scene	<p>abdates in the situation in the iranian scene</p>	1	2021-10-02 12:38:09	1	<p>abdates in the situation in the iranian scene</p>	f	entry_615852b152c509.97492287
53	\N	3	\N	1	EG	KM	2021-04-07	07/08/2021	development in the iranian scene	<p>development in the iranian scene</p>	1	2021-10-14 08:12:16	1	<p>development in the iranian scene</p>	f	entry_6167e660611962.50373239
54	\N	3	\N	1	EG	KM	2021-04-07	07/08/2021	development in the iranian scene	<p>development in the iranian scene</p>	1	2021-10-14 08:18:18	1	<p>development in the iranian scene</p>	f	entry_6167e7ca236044.37691984
55	\N	3	\N	1	EG	KM	2021-05-09	09/10/11/2021	apdates on the situation in the iranian scene	<p>apdates on the situation in the iranian scene</p>	1	2021-10-14 08:25:29	1	<p>apdates on the situation in the iranian scene</p>	f	entry_6167e9798b1fd4.80977251
56	\N	3	\N	1	EG	KM	2021-04-21	09/2021	iranian eropean relations	<p>iranian eropean relations</p>	1	2021-10-14 08:35:37	1	<p>iranian eropean relations</p>	f	entry_6167ebd9edd833.34010824
57	\N	3	\N	1	EG	KM	2021-05-23	12/21	التعاون مع جزر القمر	<p>التعاون مع جزر القمر</p>	1	2021-10-14 08:40:58	1	<p>التعاون مع جزر القمر</p>	f	entry_6167ed1a9c6654.43309994
58	\N	3	\N	1	EG	KM	2021-06-27	13/21	محضر الاجتماع الثامن عشر الأمانة المنتدي العربي الاستخباري	<p>محضر الاجتماع الثامن عشر الأمانة المنتدي العربي الاستخباري</p>	1	2021-10-14 08:50:42	1	<p>محضر الاجتماع الثامن عشر الأمانة المنتدي العربي الاستخباري</p>	f	entry_6167ef62047751.00885919
59	\N	3	\N	1	EG	KM	2021-10-01	14/2021	تهنئة عيد الأضحى	<p>تهنئة عيد الأضحى</p>	1	2021-10-14 09:10:28	1	<p>تهنئة عيد الأضحى</p>	f	entry_6167f4046a28b3.72321247
60	\N	3	\N	1	EG	KM	2021-07-03	14/21	تهنئة عيد الفطر	<p>تهنئة عيد الفطر</p>	1	2021-10-14 09:13:11	1	<p>تهنئة عيد الفطر</p>	f	entry_6167f4a709fec1.88344022
61	\N	3	\N	1	EG	KM	2021-07-12	15/21	الاجتماع التاسع عشر الأمانة المنتدي العربي الاستخباري	<p>الاجتماع التاسع عشر الأمانة المنتدي العربي الاستخباري</p>	1	2021-10-14 09:19:12	1	<p>الاجتماع التاسع عشر الأمانة المنتدي العربي الاستخباري</p>	f	entry_6167f6104c2891.06089953
62	\N	3	\N	1	EG	KM	2021-07-11	14/21	تهنئة حلول عيد الفطر	<p>تهنئة حلول عيد الفطر</p>	0	2021-10-18 07:52:06	1	<p>تهنئة حلول عيد الفطر</p>	f	entry_616d27a6eb6187.77132240
63	\N	3	\N	1	EG	KM	2021-07-12	015/21	المحضر التاسع عشر لأمانة المتدي العربي الاستخباري	<p>المحضر التاسع عشر لأمانة المتدي العربي الاستخباري</p>	1	2021-10-18 07:56:25	1	<p>المحضر التاسع عشر لأمانة المتدي العربي الاستخباري</p>	f	entry_616d28a90d14b8.25733062
64	\N	3	\N	1	EG	KM	2021-08-05	21 22 /21	مستجدات الأوضاع في لبيا	<p>تسمية وزراء جديد في لبنان</p>	1	2021-10-18 08:07:17	1	<p>تسمية وزراء جديد في لبنان</p>	f	entry_616d2b3523bcc3.46228274
65	\N	3	\N	1	EG	KM	2021-07-12	19/21	DEVELOPEMNT IN SYRIA	<p>DEVELOPEMNT IN SYRIA</p>	1	2021-10-18 08:11:55	1	<p>DEVELOPEMNT IN SYRIA</p>	f	entry_616d2c4b9a64d3.46876219
66	\N	3	\N	1	EG	KM	2021-08-19	23 24 25/21	DEVELOPMENT IN THE PALESTINIAN AND ISRAELI SCENE	<p>DEVELOPMENT IN THE PALESTINIAN AND ISRAELI SCENE</p>	1	2021-10-18 08:18:43	1	<p>DEVELOPMENT IN THE PALESTINIAN AND ISRAELI SCENE</p>	f	entry_616d2de34ee045.77004311
67	\N	3	\N	1	EG	KM	2021-09-26	34/21	APDATES ON THE SITUATION IN LIBYA	<p>APDATES ON THE SITUATION IN LIBYA</p>	1	2021-10-18 08:25:16	1	<p>APDATES ON THE SITUATION IN LIBYA</p>	f	entry_616d2f6c148236.85120843
68	\N	3	\N	1	EG	KM	2021-09-26	34/21	APDATES ON THE SITUATION IN LIBYA	<p>APDATES ON THE SITUATION IN LIBYA</p>	1	2021-10-18 08:27:11	1	<p>APDATES ON THE SITUATION IN LIBYA</p>	f	entry_616d2fdf0bba64.27944525
69	\N	3	\N	1	EG	KM	2021-10-18	36/21	محضر الاجتماع الثاني وعشرين الأمانة المنتدي العربي الاستخباري	<p>محضر الاجتماع الثاني وعشرين الأمانة المنتدي العربي الاستخباري</p>	1	2021-10-18 08:32:16	1	<p>محضر الاجتماع الثاني وعشرين الأمانة المنتدي العربي الاستخباري</p>	f	entry_616d3110e7a298.14923795
70	\N	3	\N	1	EG	KM	2021-09-27	37/21	محضر الاجتماع الثالث و عشرون الأمانة المنتدي العربي الاستخباري	<p>محضر الاجتماع الثالث و عشرون الأمانة المنتدي العربي الاستخباري</p>	1	2021-10-18 08:37:40	1	<p>محضر الاجتماع الثالث و عشرون الأمانة المنتدي العربي الاستخباري</p>	f	entry_616d3254ab5186.11850017
71	\N	3	\N	1	EG	KM	2021-08-30	38/21	اللجنة الاعلامية للمنتدي العربي الاستخباري	<p>اللجنة الاعلامية للمنتدي العربي الاستخباري</p>	1	2021-10-18 08:51:05	1	<p>اللجنة الاعلامية للمنتدي العربي الاستخباري</p>	f	entry_616d35794f54d9.95845263
72	\N	3	\N	1	EG	KM	2021-09-15	30/21	تعزيز أوجه التعاون بين جهازينا	<p>تعزيز أوجه التعاون بين جهازينا</p>	1	2021-10-18 08:59:21	1	<p>تعزيز أوجه التعاون بين جهازينا</p>	f	entry_616d3769514383.68146782
73	\N	3	\N	1	EG	KM	2021-04-07	07 08/21	development in the asian scene	<p>development in the asian scene</p>	1	2021-10-18 09:04:54	1	<p>development in the asian scene</p>	f	entry_616d38b6acf6d0.05631389
74	\N	3	\N	1	AE	KM	2021-10-11	21/1152/326	دورة ميدانية لتدريب عناصر خلية القمر	<p>دورة ميدانية لتدريب عناصر خلية القمر</p>	1	2021-10-18 09:10:27	1	<p>دورة ميدانية لتدريب عناصر خلية القمر</p>	f	entry_616d3a0377c5d5.11414878
75	\N	3	\N	1	AE	KM	2021-10-05	21/1123/496	مستجدات التنظيمات الارهابية في العراق وبلاد الشام	<p>مستجدات التنظيمات الارهابية في العراق وبلاد الشام</p>	1	2021-10-18 09:17:41	1	<p>مستجدات التنظيمات الارهابية في العراق وبلاد الشام</p>	f	entry_616d3bb53e48e1.21934506
76	\N	3	\N	1	AE	KM	2021-10-18	21/1114/847	زيارة وفد وكالة الأنباء الاماراتية لمقر دكسا	<p>زيارة وفد وكالة الأنباء الاماراتية لمقر دكسا</p>	1	2021-10-18 09:23:48	1	<p>زيارة وفد وكالة الأنباء الاماراتية لمقر دكسا</p>	f	entry_616d3d241694d9.01343141
77	\N	3	\N	1	AE	KM	2021-09-30	21/112/311	مستجدات العمليات المشتركة مع الجانب القمري	<p>مستجدات العمليات المشتركة مع الجانب القمري</p>	1	2021-10-18 09:30:37	1	<p>مستجدات العمليات المشتركة مع الجانب القمري</p>	f	entry_616d3ebd399f70.38708190
78	\N	3	\N	1	AE	KM	2021-10-07	21/1136/893	اللجنة الاعلامية للمنتدي العربي الاستخباري المنعقدة في دولة الامارات	<p>اللجنة الاعلامية للمنتدي العربي الاستخباري المنعقدة في دولة الامارات</p>	1	2021-10-18 09:37:32	1	<p>اللجنة الاعلامية للمنتدي العربي الاستخباري المنعقدة في دولة الامارات</p>	f	entry_616d405c316cb8.33473350
79	\N	3	\N	1	KM	AE	2021-10-06	29/21	دورة ميدانية لتدريب عناصر خلية القمر	<p>اقتراح فترة الدورة</p>	1	2021-10-18 09:44:32	1	<p>اقتراح فترة الدورة</p>	f	entry_616d42000b6011.18501505
80	\N	3	\N	2	KM	AE	2021-10-07	30/21	: ورشة العمل التدريبية المنظمة من قبل اللجنة الإعلامية التابعة للمنتدى العربي الاستخباري	<p>اسماء الوفد المشاك في تدريب اللجنة الاعلامية للمنتدي العربي الاستخباري</p>	1	2021-10-18 09:49:50	1	<p>اسماء الوفد المشاك في تدريب اللجنة الاعلامية للمنتدي العربي الاستخباري</p>	f	entry_616d433e0609d4.90152367
81	\N	3	\N	2	KM	AE	2021-10-04	20/2021	مشروع دكسا	<p>&nbsp;مشروع دكسا</p>	1	2021-10-20 06:40:50	1	<p>&nbsp;مشروع دكسا</p>	f	entry_616fb9f2a73137.39287970
82	\N	3	\N	2	KM	AE	2021-10-04	30/2021	مشروع دكسا	<p>&nbsp;</p>\r\n\r\n<p>تجديد عقد مع المراسل الصحفي إبراهيم حنصال</p>	1	2021-10-20 06:48:05	1	<p>تجديد عقد مع المراسل الصحفي إبراهيم حنصال</p>\r\n\r\n<p>&nbsp;</p>	f	entry_616fbba5aae4c6.88675346
83	\N	3	\N	2	KM	AE	2021-10-04	31/2021	مشروع دكسا	<p>تغطية نفقات السفر والاقامة والسكن لثلاثة من فريق المشروع لتغطية فعاليات إكسبو دبي 2021</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>	1	2021-10-20 07:05:10	1	<p>تغطية نفقات السفر والاقامة والسكن لثلاثة من فريق المشروع لتغطية فعاليات إكسبو دبي 20</p>	f	entry_616fbfa65cdcb2.13597193
125	\N	2	\N	1	SC	KM	2021-10-21	0121328/1	Des suspects arrêtés sur un catamaran a MITSIO 2	\N	1	2021-10-28 06:28:38	1	<p>Des suspects ont &eacute;t&eacute; arret&eacute;s aux seychelles transportant de l&#39;or en utilisant des faux documents.&nbsp;</p>	f	entry_617a431625f3b3.34173221
84	\N	3	\N	2	KM	AE	2021-10-06	32/2021	مشروع دكسا	<p>تغطية نفقات السفر والاقامة والسكن لاثنين من فريق المشروع لتغطية&nbsp; فعليات الكأس</p>	1	2021-10-20 07:11:47	1	<p>تغطية نفقات السفر والاقامة والسكن لاثنين من فريق المشروع لتغطية&nbsp; فعليات الكأس</p>	f	entry_616fc133e08863.44799598
85	\N	3	\N	2	KM	AE	2021-09-22	27/2021	مشروع دكسا	<p>توفير وسائل خاصة بالمشروع</p>	1	2021-10-20 07:27:03	1	<p>توفير وسائل خاصة بالمشروع</p>	f	entry_616fc4c7af2c85.96740279
86	\N	3	\N	2	KM	AE	2021-01-10	01/2021	مشروع دكسا	<p>انعقاد اجتماع لمناقشة مستجدات مشرو دكسا</p>	1	2021-10-21 07:09:41	1	<p>انعقاد اجتماع لمناقشة مستجدات مشرو دكسا</p>	f	entry_6171123629edd6.69894961
87	\N	3	\N	2	KM	AE	2020-04-05	06/2020	المركز الاعلامي	<p>ميزانية تشغيلية لشهر فبراير</p>	1	2021-10-21 07:20:19	1	<p>ميزانية تشغيلية لشهر فبراير</p>	f	entry_617114b3312417.08353020
88	\N	3	\N	2	KM	AE	2020-04-07	07/2020/م	المركز الاعلامي	<p>أنشطة المركز الاعلامي خلال شهر مارس</p>	1	2021-10-21 07:31:07	1	<p>أنشطة المركز الاعلامي خلال شهر مارس</p>	f	entry_6171173bd849e5.42024482
89	\N	3	\N	2	KM	AE	2020-04-10	08/2020	تدريبات العاملين في المركز الاعلامي	<p>تدريبات العاملين في المركز الاعلامي</p>	1	2021-10-21 07:42:13	1	<p>تدريبات العاملين في المركز الاعلامي</p>	f	entry_617119d5d61f29.46611464
90	\N	3	\N	2	KM	AE	2020-05-02	09/2020م	المركز الاعلامي	<p>الميزانية التشغيلية لشهر أبريل</p>	1	2021-10-21 07:52:51	1	<p>الميزانية التشغيلية لشهر أبريل</p>	f	entry_61711c53d23564.03717598
91	\N	3	\N	1	EG	KM	2021-10-20	39/2021	آلية تحصين وحماية شباب العربي من الفكر المتطرف والارهابي	<p>آلية تحصين وحماية شباب العربي من الفكر المتطرف والارهابي</p>	1	2021-10-21 09:39:34	1	<p>آلية تحصين وحماية شباب العربي من الفكر المتطرف والارهابي</p>	f	entry_617135560b40f3.75159209
92	\N	3	\N	1	EG	KM	2021-10-20	39/2021	آلية تحصين وحماية شباب العربي من الفكر المتطرف والارهابي	<p>آلية تحصين وحماية شباب العربي من الفكر المتطرف والارهابي</p>	1	2021-10-21 09:40:41	1	<p>آلية تحصين وحماية شباب العربي من الفكر المتطرف والارهابي</p>	f	entry_617135995abea1.93499400
93	\N	3	\N	1	AE	KM	2018-11-27	18/1051/277	عملية مشتركة لرصد النشاط القطري وتوثيق في جمهورية جزر القمر	<p>موعد لقاء</p>	1	2021-10-26 06:56:51	1	<p>&nbsp;موعد لقاء</p>	f	entry_6177a6b34984c5.73151279
94	\N	3	\N	1	AE	KM	2018-10-11	18/0893/549	محمد جوهر	<p>طلب معلوملت والبيانات الشخصية لمحمد جوهر</p>	1	2021-10-26 07:04:34	1	<p>طلب معلوملت والبيانات الشخصية لمحمد جوهر</p>	f	entry_6177a88213b060.44136791
95	\N	3	\N	1	AE	KM	2019-08-10	19/0722/027	اجتماع مجلس شورى حركة الشباب في محافظة جلجلود	<p>اجتماع مجلس شورى حركة الشباب في محافظة جلجلود</p>	1	2021-10-26 07:23:53	1	<p>اجتماع مجلس شورى حركة الشباب في محافظة جلجلود</p>	f	entry_6177ad095e8959.48065520
96	\N	3	\N	1	AE	KM	2021-10-26	22/6734/567	احتياجات مبنى الادارة	<p>احتياجات مبنى الادارة</p>	1	2021-10-26 07:29:11	1	<p>احتياجات مبنى الادارة</p>	f	entry_6177ae47ce04b2.03801213
97	\N	3	\N	1	AE	KM	2019-01-22	19/0063/261	أبرز الأشخاص الصوفية في ساحة جزر القمر	<p>أبرز الشخصيات الصوفية المؤثرة على ساحة جزر القمر</p>	1	2021-10-26 07:38:01	1	<p>أبرز الشخصيات الصوفية المؤثرة على ساحة جزر القمر</p>	f	entry_6177b059663b36.59262674
98	\N	3	\N	1	AE	KM	2019-12-26	19/1239/447	الاحتياجات اللوجستية	<p>عدد السيارات المطلوبة ونوع الدراجات النارية والألوان المرغوب فيها</p>	1	2021-10-26 07:46:05	1	<p>عدد السيارات المطلوبة ونوع الدراجات النارية والألوان المرغوب فيها</p>	f	entry_6177b23deae233.35058155
99	\N	3	\N	1	AE	KM	2019-05-26	19/0483/577	العملية المشتركة	<p>طلب البيانات الشخصية للمدعوا محمد شيخ علي المرشد العام لجاعة الاخوان في جزر القمر وعلاقته بحكومة قطر&nbsp; ومدى قوى علاقته بالمدعو طايس الجميلي</p>	1	2021-10-26 08:06:31	1	<p>طلب البيانات الشخصية للمدعوا محمد شيخ علي المرشد العام لجاعة الاخوان في جزر القمر وعلاقته بحكومة قطر&nbsp; ومدى قوى علاقته بالمدعو طايس الجميلي</p>	f	entry_6177b7078468c7.18979933
100	\N	3	\N	2	KM	AE	2021-07-07	06/021	تنظيم لقاء خاص لسعادة المدير مع رئيس جهاز الاستخبارات الوطني	<p>تنظيم لقاء خاص لسعادة المدير مع رئيس جهاز الاستخبارات الوطني</p>	0	2021-10-26 09:28:19	1	<p>تنظيم لقاء خاص لسعادة المدير مع رئيس جهاز الاستخبارات الوطني</p>	f	entry_6177ca3333a042.25911786
101	\N	3	\N	1	AE	KM	2019-06-25	19/0574/654	القضية المشتركة في رصد نشاط الاخوان في جزر القمر	<p>الافادة عن المدعو طايس الجميلي مع المدعو عبد النور أحمد عيسى و الحزب الوطني للتنمية في جزر القمر</p>	1	2021-10-27 07:23:48	1	<p>الافادة عن المدعو طايس الجميلي مع المدعو عبد النور أحمد عيسى و الحزب الوطني للتنمية في جزر القمر</p>	f	entry_6178fe846f0cf0.86015167
102	\N	3	\N	1	AE	KM	2019-01-10	19/0024/198	العمل المشتركة ضد النفوذ الايراني في جزر القمر	<p>اتفاقية إنشاء المكتبة الاعلامية</p>	1	2021-10-27 07:38:21	1	<p>اتفاقية إنشاء المكتبة الاعلامية</p>	f	entry_617901ed9d1e91.60698021
103	\N	3	\N	1	AE	KM	2019-03-07	19/0221/205	القضية المشتركة	<p>توفير تقرير أسبوعي عن مستجدات القضية حول&nbsp; فرز شخصيات قريبة من المدعو طايس الجميلي ومتابعتها&nbsp; ومن ثم تجنيدها</p>	1	2021-10-27 08:02:30	1	<p>توفير تقرير أسبوعي عن مستجدات القضية حول&nbsp; فرز شخصيات قريبة من المدعو طايس الجميلي ومتابعتها&nbsp; ومن ثم تجنيدها</p>	f	entry_61790796e16987.54391944
104	\N	3	\N	1	AE	KM	2019-02-20	19/0168/778	العملية المشتركة	<p>تفير بيانات المصادر المراد تجنيدها و عقد لقاء مختصين لوضع الآلية للتعامل مع المصادر&nbsp;</p>	1	2021-10-27 08:09:21	1	<p>تفير بيانات المصادر المراد تجنيدها و عقد لقاء مختصين لوضع الآلية للتعامل مع المصادر&nbsp;</p>	f	entry_617909314f9804.63589727
105	\N	3	\N	1	AE	KM	2019-02-28	19/0197/217	معلومات عن الملف الاقتصادي لهيئة تحرير الشام	<p>معلومات عن الملف الاقتصادي لهيئة تحرير الشام</p>	1	2021-10-27 08:16:55	1	<p>معلومات عن الملف الاقتصادي لهيئة تحرير الشام</p>	f	entry_61790af74c1815.11695586
106	\N	3	\N	1	AE	KM	2019-10-31	19/0959/474	كشف تجديد الجوازات للدفعة الثانية	<p>كشف تجديد الجوازات للدفعة الثانية</p>	1	2021-10-27 08:29:03	1	<p>كشف تجديد الجوازات للدفعة الثانية</p>	f	entry_61790dcf602f81.74761499
107	\N	3	\N	1	AE	KM	2019-08-28	19/0804/726	العملية المشتركة لرصد جماعة الاخوان في جزر القمر	<p>النقاط المراد العمل بها في العملية المشتركة</p>	1	2021-10-27 08:47:22	1	<p>النقاط المراد العمل بها في العملية المشتركة</p>	f	entry_6179121a55c0b1.51106470
108	\N	3	\N	1	AE	KM	2019-07-03	19/0610/428	المدعو جعفر عبد الله	<p>تزويد معلومات عن المدعو جعفر عبد الله سفير جمهورية جزر القمر السابق في مصر</p>	1	2021-10-27 08:56:55	1	<p>تزويد معلومات عن المدعو جعفر عبد الله سفير جمهورية جزر القمر السابق في مصر</p>	f	entry_6179145715b850.33662719
109	\N	3	\N	2	AE	KM	2019-07-28	19/0703/179	محمد حسين	<p>رصد تحركات المدعو محمد حسين واجتماعاته في جزر القمر</p>	1	2021-10-27 09:01:35	1	<p>د تحركات المدعو محمد حسين واجتماعاته في جزر القمر</p>	f	entry_6179156f2dac99.05473698
110	\N	3	\N	1	AE	KM	2019-07-03	19/0906/740	تشكيل وفد من جزر القمر لدراسة المشاريع المراد تنفيذها في جمهورية جزر القمر	<p>تشكيل وفد من جزر القمر لدراسة المشاريع المراد تنفيذها في جمهورية جزر القمر</p>	1	2021-10-27 09:09:06	1	<p>تشكيل وفد من جزر القمر لدراسة المشاريع المراد تنفيذها في جمهورية جزر القمر</p>	f	entry_617917322e7146.18488094
111	\N	3	\N	1	AE	KM	2019-07-11	19/0640/696	مذكرة تفاهم	<p>مذكرة تفاهم</p>	1	2021-10-27 09:12:28	1	<p>مذكرة تفاهم</p>	f	entry_617917fcd5c0a2.73740029
112	\N	3	\N	1	AE	KM	2019-03-27	19/0291/041	مستجدات تنظيم  داعش	<p>مستجدات تنظيم &nbsp;داعش</p>	1	2021-10-27 09:15:33	1	<p>مستجدات تنظيم &nbsp;داعش</p>	f	entry_617918b5cc6c92.85537423
113	\N	3	\N	1	AE	KM	2019-10-29	19/1042/526	العملية العسكرية التي تخطط لزعزعة أمن واستقرار جزر القمر	<p>النقاط التي تم طلبها في الاجتماع</p>	1	2021-10-27 09:20:03	1	<p>النقاط التي تم طلبها في الاجتماع</p>	f	entry_617919c38e25c9.55141022
114	\N	3	\N	1	AE	KM	2019-05-20	19/0466/828	مستجدات المدعو طايس الجميلي في الساحة القمرية	<p>توفير معلومات أمنية عن المدعو طايس الجميلي والمرشد العام محمد شيخ علي و اليانات الشخصية لمدير المدرسة الفنية&nbsp; وبيانات الشخصية لعامل طايس في قطر</p>	1	2021-10-27 09:27:15	1	<p>توفير معلومات أمنية عن المدعو طايس الجميلي والمرشد العام محمد شيخ علي و اليانات الشخصية لمدير المدرسة الفنية&nbsp; وبيانات الشخصية لعامل طايس في قطر</p>	f	entry_61791b73ed5106.58269179
115	\N	3	\N	1	AE	KM	2020-07-28	20/0632/146	تهنئة عيد الأضحى	<p>تهنئة عيد الأضحى</p>	1	2021-10-27 10:01:55	1	<p>تهنئة عيد الأضحى</p>	f	entry_617923936d67c6.81131825
116	\N	3	\N	1	AE	KM	2020-08-04	20/0679/973	مشروع دكسا	<p>مناقشة مستجدات المشروع بعد أزمة كورونا في&nbsp; أبوظبي</p>	1	2021-10-27 10:08:02	1	<p>مناقشة مستجدات المشروع بعد أزمة كورونا في&nbsp; أبوظبي</p>	f	entry_617925029429e6.50406205
117	\N	3	\N	1	AE	KM	2020-01-07	20/0017/397	المركز الاعلامي	<p>توفير تقرير تفصيلي بإنشاء المركز وتقرير عن آلية العمل بالمركز</p>	1	2021-10-27 10:25:07	1	<p>توفير تقرير تفصيلي بإنشاء المركز وتقرير عن آلية العمل بالمركز</p>	f	entry_6179290378b297.13192565
118	\N	3	\N	1	AE	KM	2020-03-26	20/0322/319	تسليم المساجين المفرج عنهم	<p>طلب الآلية المناسبة للستقبال المساجين المفرج عنهم</p>	1	2021-10-27 10:31:03	1	<p>طلب الآلية المناسبة للستقبال المساجين المفرج عنهم</p>	f	entry_61792a67ba9d30.36352080
119	\N	3	\N	1	AE	KM	2020-01-12	20/0034/410	متابعة المدعو محمد شيخ علي	<p>متابعة المدعو محمد شيخ علي&nbsp; ورصد العناصر التي يرتبط بها</p>	1	2021-10-27 11:03:36	1	<p>متابعة المدعو محمد شيخ علي&nbsp; ورصد العناصر التي يرتبط بها</p>	f	entry_617932082df380.84312808
120	\N	3	\N	1	AE	KM	2020-07-29	20/0665/655	محضر اجتماع خلية القمر	<p>مناقشة مستجدات عمل خلية القمر في متابعة جماعة اخوان المسلمين</p>	1	2021-10-27 11:10:03	1	<p>مناقشة مستجدات عمل خلية القمر في متابعة جماعة اخوان المسلمين</p>	f	entry_6179338ba4f830.30891936
121	\N	3	\N	1	AE	KM	2020-08-06	20/0687/422	العناصر اللبنانية	<p>العناصر اللبنانية</p>	1	2021-10-27 11:15:00	1	<p>العناصر اللبنانية</p>	f	entry_617934b48df8c2.64578152
122	\N	3	\N	1	AE	KM	2020-05-13	20/0434/837	طلب مساعدة لمواجهة كورونا	<p>موافقة الطلب&nbsp;</p>	1	2021-10-27 11:32:48	1	<p>موافقة الطلب&nbsp;</p>	f	entry_617938e0ad9813.31048700
123	\N	3	\N	1	AE	KM	2020-01-12	20/003/759	استقطاب المدعو محمد معلوم وسؤول لبث في إذاعة التوجيه	<p>استقطاب المدعو محمد معلوم وسؤول لبث في إذاعة التوجيه</p>	1	2021-10-27 11:48:51	1	<p>استقطاب المدعو محمد معلوم وسؤول لبث في إذاعة التوجيه</p>	f	entry_61793ca3b5fe60.05951593
124	\N	3	\N	1	AE	KM	2020-01-12	20/0034/45	آلية عمل خلية القمر	<p>آلية عمل خلية القمر المتعلقة برصد نشاط اخولن المسلمين في جزر القمر</p>	1	2021-10-27 12:13:55	1	<p>آلية عمل خلية القمر المتعلقة برصد نشاط اخولن المسلمين في جزر القمر</p>	f	entry_61794283b1bc24.05128906
126	\N	3	\N	2	KM	AE	2021-06-14	22/21	طلبات وزارة الدفاع	<p>طلبات وزارة الدفاع الاماراتي حول زيارة معالي مدير مكتب الرئيس المكلف بالدفاع</p>	1	2021-11-02 09:31:15	1	<p>طلبات وزارة الدفاع الاماراتي حول زيارة معالي مدير مكتب الرئيس المكلف بالدفاع</p>	f	entry_61810563df2ff2.24704289
127	\N	3	\N	2	KM	AE	2014-09-14	26/21	طلب عقد لقاء مختصين لمشروع دكسا	<p>عقد لقاء مختصين لمناقشة مستجدات المشروع</p>	1	2021-11-02 09:39:36	1	<p>عقد لقاء مختصين لمناقشة مستجدات المشروع</p>	f	entry_618107585affe1.47642496
128	\N	3	\N	2	KM	AE	2021-09-21	27/21	متابعة انشطة جماعة الاخوان	<p>برامج الأسر في المنطقة مباجين</p>\r\n\r\n<p>اجتماعات التنظيم في منطقة مباجين</p>\r\n\r\n<p>بعض الشخصيات تم اكتشاف انتمائهم للجماعة&nbsp;</p>	1	2021-11-02 09:50:43	1	<p>برامج الأسر في المنطقة مباجين</p>\r\n\r\n<p>اجتماعات التنظيم في منطقة مباجين</p>\r\n\r\n<p>بعض الشخصيات تم اكتشاف انتمائهم للجماعة&nbsp;</p>	f	entry_618109f3150e41.71689869
129	\N	3	\N	1	AE	KM	2021-09-30	21/1102/311	مستجدات العمليات المشتركة مع الجانب القمري	<p>&nbsp;استفسارات جهاز الاستخبارات الوطني الاماراتي</p>	1	2021-11-02 09:59:39	1	<p>&nbsp;استفسارات جهاز الاستخبارات الوطني الاماراتي</p>	f	entry_61810c0be91c15.96857561
130	\N	3	\N	2	KM	AE	2021-10-24	21/010	تلقى الرئيس غزالي عثمان دعوة لزيارة دولة الامارات العربية المتحدة من قبل أخيه ولي عهد أبو ظبي	<p>تلقى الرئيس غزالي عثمان دعوة لزيارة دولة الامارات العربية المتحدة من قبل أخيه ولي عهد أبو ظبي</p>	0	2021-11-03 06:47:51	1	<p>تلقى الرئيس غزالي عثمان دعوة لزيارة دولة الامارات العربية المتحدة من قبل أخيه ولي عهد أبو ظبي</p>	f	entry_61823097743790.31458933
131	\N	3	\N	1	AE	KM	2021-09-19	21/1040/261	عقد لقاء مختصين لمشروع دكسا	<p>تأجيل عقد اللقاء&nbsp;</p>	1	2021-11-03 06:54:02	1	<p>تأجيل عقد اللقاء&nbsp;</p>	f	entry_6182320a328bf5.26667725
132	\N	3	\N	1	AE	KM	2021-07-13	21/0774/584	تنظيم اخوان المسلمين في دول القرن الافريقي	<p>توفير معلومات عن تنظيم اخوان المسلمين في دول القرن الافريقي</p>	1	2021-11-03 06:59:20	1	<p>توفير معلومات عن تنظيم اخوان المسلمين في دول القرن الافريقي</p>	f	entry_61823348325b92.61243804
133	\N	3	\N	1	AE	KM	2021-11-02	21/1259/069	تنظيم اخوان المسلمين في اثيوبيا	<p>توفير معلومات وهيكلة تنظيم اخوان المسلمين في اثيوبيا ودول القرن الافريقي</p>	1	2021-11-03 07:05:30	1	<p>توفير معلومات وهيكلة تنظيم اخوان المسلمين في اثيوبيا ودول القرن الافريقي</p>	f	entry_618234ba69fed9.75676797
134	\N	3	\N	1	AE	KM	2021-10-27	21/1224/577	شكر وتقدير على تهنئة الوزير	<p>شكر وتقدير على تهنئة الوزير</p>	0	2021-11-03 07:10:34	1	<p>شكر وتقدير على تهنئة الوزير</p>	f	entry_618235ea9d9d00.45065010
135	\N	3	\N	2	KM	AE	2021-11-03	21/30	العملية المشتركة في متابعة جماعة الاخوان	<p>أجوبة النقاط التي لم يتم الرد عليها</p>	1	2021-11-03 07:24:54	1	<p>أجوبة النقاط التي لم يتم الرد عليها</p>	f	entry_618239467ac904.72866175
136	\N	3	\N	2	KM	AE	2021-02-10	21/29	متابعة انشط جماعة اخوان المسلمين	<p>جلسة أعضاء جماعة الاخوان لاستثناف برامجهم من جديد وذلك بعد انقطاع أنشطته منذ سنتين بسبب جائحة كورونا</p>	1	2021-11-03 07:42:07	1	<p>جلسة أعضاء جماعة الاخوان لاستثناف برامجهم من جديد وذلك بعد انقطاع أنشطته منذ سنتين بسبب جائحة كورونا</p>	f	entry_61823d4f8f5f60.73283536
137	\N	3	\N	2	KM	AE	2021-11-03	28/21	تزويد الجهاز القمري بوسائل النقل	<p>تزويد الجهاز القمري بوسائل النقل</p>	1	2021-11-03 07:53:05	1	<p>تزويد الجهاز القمري بوسائل النقل</p>	f	entry_61823fe145fd98.45371561
138	\N	3	\N	2	KM	AE	2021-11-01	31/21	زيارة معالي الوزير رئيس الجهاز إلى دولة الامارات العربية المتحدة	<p>زيارة معالي الوزير رئيس الجهاز إلى دولة الامارات العربية المتحدة</p>	1	2021-11-03 08:00:29	1	<p>زيارة معالي الوزير رئيس الجهاز إلى دولة الامارات العربية المتحدة</p>	f	entry_6182419d4366e5.57378189
139	\N	3	\N	2	KM	AE	2021-10-30	21/31	دورة ميدانية لتدريب عناصر خلية القمر	<p>طلب استكمال الدورة التي عقد في ابوظبي (التجنيد وادارة المصادر)</p>	1	2021-11-03 08:08:59	1	<p>طلب استكمال الدورة التي عقد في ابوظبي (التجنيد وادارة المصادر)</p>	f	entry_6182439b7f1e17.53789442
140	\N	3	\N	2	KM	AE	2018-12-10	009/2018	المدهو محمد جوهر	<p>المدهو محمد جوهر</p>	1	2021-11-03 08:30:23	1	<p>المدهو محمد جوهر</p>	f	entry_6182489f300897.71754015
141	\N	3	\N	2	KM	AE	2018-12-10	010/2018	حزب جووا	<p>حزب جووا</p>	1	2021-11-03 10:25:59	1	<p>حزب جووا</p>	f	entry_618263b75c1215.00510204
142	\N	3	\N	2	KM	AE	2018-09-18	011/2018	المدعو محي الدين	<p>المدعو محي الدين</p>	1	2021-11-03 10:30:45	1	<p>المدعو محي الدين</p>	f	entry_618264d51c07b4.01916962
143	\N	3	\N	2	KM	AE	2019-02-13	007/2019	الانتخابات الرئاسية في جزر القمر 2019	<p>خطة دعم فوز الرئيس والانتخابات الرئاسية في جزر القمر</p>	1	2021-11-04 07:13:35	1	<p>خطة دعم فوز الرئيس والانتخابات الرئاسية في جزر القمر</p>	f	entry_6183881f7b54f0.92637051
144	\N	3	\N	2	KM	AE	2019-05-24	022/2019	شكر وثناء لدولة الامارات العربية المتحدة من قبل فخامة الرئيس الجمهورية	<p>شكر وثناء لدولة الامارات العربية المتحدة من قبل فخامة الرئيس الجمهورية</p>	1	2021-11-04 07:28:06	1	<p>شكر وثناء لدولة الامارات العربية المتحدة من قبل فخامة الرئيس الجمهورية</p>	f	entry_61838b86489fa9.21411275
145	\N	3	\N	2	KM	AE	2019-07-11	030/19	سعوديون من حركة التبليغ التابعة للاخوان في جزر القمر	<p>سعوديون من حركة التبليغ التابعة للاخوان في جزر القمر</p>	1	2021-11-04 07:32:40	1	<p>سعوديون من حركة التبليغ التابعة للاخوان في جزر القمر</p>	f	entry_61838c988a4e64.06457643
146	\N	3	\N	2	KM	AE	2019-07-24	034/20219	العملية المشتركة لرصد وتوثيق نشاط الاخوان المسلمين في جزر القمر	<p>الحولات البنكية للمدعو طايس الجميلي</p>	1	2021-11-04 07:56:33	1	<p>الحولات البنكية للمدعو طايس الجميلي</p>	f	entry_61839231603606.93929792
147	\N	3	\N	2	KM	AE	2019-07-24	034/2019	العملية المشتركة لرصد نشاط الاخوان	<p>رصد التحويلات البنكية للمدعو طايس</p>	1	2021-11-04 08:01:54	1	<p>رصد التحويلات البنكية للمدعو طايس</p>	f	entry_618393729be257.47277637
148	\N	3	\N	2	KM	AE	2019-08-01	035/2019	العملي المشتركة	<p>أبرز الشخصيات الصوفية في جزر القمر</p>	1	2021-11-04 08:12:12	1	<p>أبرز الشخصيات الصوفية في جزر القمر</p>	f	entry_618395dc2ccd84.56724701
149	\N	3	\N	2	KM	AE	2019-08-14	036/2019	البيانات لاشخصية لمدير المدرسة الفنية	<p>البيانات لاشخصية لمدير المدرسة الفنية</p>	1	2021-11-04 08:21:00	1	<p>البيانات لاشخصية لمدير المدرسة الفنية</p>	f	entry_618397ec929826.35735277
150	\N	3	\N	2	KM	AE	2019-02-03	004/2019	العملية المشتركة لرصد النشاط القطري والتوثيق في جزر القم	<p>أنشطة دولة قطر بواسطة الأكاديمية القطرية للمربيات</p>	1	2021-11-04 08:29:52	1	<p>أنشطة دولة قطر بواسطة الأكاديمية القطرية للمربيات</p>	f	entry_61839a00855765.96474655
151	\N	3	\N	2	KM	AE	2019-06-15	027/2019	العملية المشتركة	<p>تعريف موجز حول المدعو/عبد النور أحمد</p>	1	2021-11-04 08:56:14	1	<p>تعريف موجز حول المدعو/عبد النور أحمد</p>	f	entry_6183a02e7677e7.92999758
152	\N	3	\N	2	KM	AE	2019-05-01	015/2019	العملية المشتركة	<p>البيانات الشخصية للسيدتين :سحر جلال و سهير توفيق</p>	1	2021-11-04 09:05:00	1	<p>البيانات الشخصية للسيدتين :سحر جلال و سهير توفيق</p>	f	entry_6183a23c7322e2.92604052
153	\N	3	\N	2	KM	AE	2019-06-10	025/2019	العملية المشتركة	<p>البيانات الشخصية للمرشد العام لللاخوان في جزر القمر محمد الشيخ علي</p>	1	2021-11-04 10:54:20	1	<p>البيانات الشخصية للمرشد العام لللاخوان في جزر القمر محمد الشيخ علي</p>	f	entry_6183bbdcb44f23.69560017
154	\N	3	\N	2	KM	AE	2019-07-17	033/2019	العملية المشتركة لرصد نشاط الاخوان في جزر القمر	<p>التقرير المالي لشهر مايو</p>	1	2021-11-04 10:57:33	1	<p>التقرير المالي لشهر مايو</p>	f	entry_6183bc9dd4cf52.58834249
155	\N	3	\N	2	KM	AE	2019-06-11	19/34	إفادة الوزارة الخارجية القمرية أن ليس لديها مانع في شحن السيارات	<p>&nbsp;إفادة الوزارة الخارجية القمرية أن ليس لديها مانع في شحن السيارات</p>	0	2021-11-04 11:03:38	1	<p>&nbsp;إفادة الوزارة الخارجية القمرية أن ليس لديها مانع في شحن السيارات</p>	f	entry_6183be0a320a39.34294692
156	\N	3	\N	2	KM	AE	2019-06-15	026/19	العملية المشتركة ضد النفوذ الاراني في جزر القمر	<p>أسماء الموظفين المرشحين للعمل في المركز الاعلامي</p>	1	2021-11-04 11:07:31	1	<p>أسماء الموظفين المرشحين للعمل في المركز الاعلامي</p>	f	entry_6183bef3087495.75270104
\.


--
-- Data for Name: departement; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.departement (id, nom, description, ceated_at) FROM stdin;
2	Administration	Administration des utilisateurs	2021-09-09 12:09:47
4	ANTI-TERRORISME	ANTI-TERRORISME	2021-11-06 07:54:49
3	SECURITE NATIONALE	SECURITE NATIONALE	2021-09-13 08:10:52
5	OPERATIONS	OPERATIONS	2021-11-06 08:23:57
6	IMMIGRATION	IMMIGRATION	2021-11-06 09:03:08
\.


--
-- Data for Name: departement_director; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.departement_director (id, departement_id, utilisateur_id, created_at, last_update, is_revoked) FROM stdin;
1	6	11	2021-11-09 18:15:19	2021-11-09 18:15:19	f
\.


--
-- Data for Name: entite; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.entite (id, affaire_id, description, description2, role, cat, created_at, main_picture, resume, role_final, rapport_final, type, nom, prenom, date_naissance, sexe, num_passport, num_carte, nationalite, categorie, immatriculation, other_infos, taille, situation_matri, adresse) FROM stdin;
1	2	MOHAMED KASSIM	FAHARDINE	1	\N	2021-10-25 16:44:42	6176defa64bb5.jpg	<p style="margin-right:-48px; text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Suite &agrave; une vid&eacute;o publi&eacute; sur la page Facebook du d&eacute;nomm&eacute; FAFA NDAMY comme nom du profil, patron du restaurant &laquo;The Best 269&raquo;, on le voit asseoir sur une voiture, d&eacute;tenant et manipulant un pistolet automatique (PA) de 9mm de marque italien. Sur ce m&ecirc;me compte encore, on le retrouve sur un de ses photos publiaient, posant sur son &eacute;paule un fusil &agrave; pompe de calibre 12 donc ceci a suscit&eacute; &agrave; l&rsquo;ouverture d&rsquo;une enqu&ecirc;te de renseignement &agrave; son &eacute;gard. </span></span></p>	\N	\N	Per	MOHAMED KASSIM	FAHARDINE	\N	h	\N	0120308	COMORIEN	\N	\N	\N	\N	\N	\N
2	2	FATIMA	M'MADI AHAMADA	3	\N	2021-10-25 16:55:05	6176efb073f02.png	<p>FEMME DE MOHAMED KASSIM FAHARDINE</p>	\N	\N	Per	FATIMA	M'MADI AHAMADA	\N	f	\N	\N	COMORIENNE	\N	\N	\N	\N	\N	\N
4	4	Mohamed	chamsidine	1	\N	2021-11-06 11:18:01	icon-default.png	<p>&nbsp;Originaire de domoni, il &eacute;t&eacute; identifi&eacute; comme un proche collaborateur depuis Anjouan de&nbsp;<span>[[3]]</span></p>	\N	\N	Per	Mohamed	chamsidine	\N	h	\N	\N	\N	\N	\N	\N	\N	\N	Domoni
6	4	Edmond	\N	1	\N	2021-11-06 11:22:16	icon-default.png	<p>Le r&eacute;seau de trafics humains dirig&eacute; par <span>[[4]]</span>&nbsp;, et lui travaillent en &eacute;troite collaboration avec&nbsp;<span>[[3]]</span> pour livrer &agrave; Mayotte des clandestins malgaches. &nbsp;</p>	\N	\N	Per	Edmond	\N	\N	i	\N	\N	\N	\N	\N	\N	\N	\N	\N
3	4	Abdourazakou	Mohamed	1	\N	2021-11-06 11:12:47	6186632f5b883.png	<p>&nbsp;En octobre 2017 il a d&eacute;j&agrave; &eacute;t&eacute; sous observation &agrave; Domoni pour des pr&eacute;paratifs de transfert de drogue, de clandestin entre Madagascar, les Comores, Mayotte voir m&ecirc;me la Tanzanie.</p>\r\n\r\n<p>&nbsp;Son embarcation &eacute;quip&eacute;e de 02 moteurs de 130 chevaux avait quitt&eacute; la ville de domoni le 02 janvier 2018 pour arriver &agrave; Ankifi Ambanja quelques jours plus tard. &nbsp;A son bord :&nbsp;</p>\r\n\r\n<ul>\r\n\t<li><span>[[3]]</span></li>\r\n\t<li>Deux autres comoriens sans papiers</li>\r\n</ul>\r\n\r\n<p>Cette embarcation n&rsquo;a pas &eacute;t&eacute; enregistr&eacute;e aupr&egrave;s des autorit&eacute;s malgaches.&nbsp; En juillet 2020 Abdourazakou fait apparition avec l&rsquo;affaire Bobocha relative &agrave; la s&eacute;curit&eacute; nationale des Comores. Il a &eacute;t&eacute; cit&eacute; par ce dernier comme &eacute;tant son associ&eacute; dans la livraison de diff&eacute;rents produits illicites &agrave; Mayotte et aux Comores. Selon Bobocha des armes &eacute;taient sens&eacute;es &ecirc;tre achet&eacute;es &agrave; Madagascar et c&rsquo;est <span>[[3]]</span> qui allait &ecirc;tre charg&eacute; de la livraison aux Comores</p>\r\n\r\n<p>Le d&eacute;nomm&eacute; <span>[[4]]</span>, originaire de domoni a &eacute;t&eacute; identifi&eacute; comme un proche collaborateur depuis Anjouan de <span>[[3]]</span>.&nbsp;<br />\r\n&nbsp;<br />\r\nLe r&eacute;seau de trafics humains dirig&eacute; par <span>[[5]]</span>, et son associ&eacute; <span>[[6]]</span>, travaille en &eacute;troite collaboration avec&nbsp;<span>[[3]]</span> pour livrer &agrave; Mayotte des clandestins malgaches.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>	\N	\N	Per	Abdourazakou	Mohamed	\N	h	\N	\N	Comorien	\N	\N	<p>Profession : trafiquant tout genre</p>	\N	\N	Ambanja, Antsohy province de Diego
7	4	Bonhomme	Chamsidine	1	\N	2021-11-06 11:29:14	6186670a95ad0.jpg	<p>Li&eacute; au traffic de&nbsp;<span>[[3]]</span></p>	\N	\N	Per	Bonhomme	Chamsidine	\N	h	\N	\N	\N	\N	\N	\N	\N	\N	\N
5	4	Herdine	Soibaha	0	\N	2021-11-06 11:20:27	6186671a30a85.jpg	<p>Le r&eacute;seau de trafics humains dirig&eacute; par lui, et son associ&eacute;, travaille en &eacute;troite collaboration avec&nbsp;<span>[[3]]</span> pour livrer &agrave; Mayotte des clandestins malgaches.</p>	\N	\N	Per	Herdine	Soibaha	\N	h	\N	\N	comorienne	\N	\N	\N	\N	1	domoni Anjouan
8	5	youssouf	Fakihidine	0	\N	2021-11-10 09:12:52	icon-default.png	<p>koudjou joue le role de chef d&#39;agence pour les passage vers mayotte. il est joue egalement aux intermediaire.</p>\r\n\r\n<p>koudjou se fait facilement identifier par son infirmit&eacute; du pied droit.</p>\r\n\r\n<p>en dehors des trafics humains; il a un domaine d&#39;activit&eacute; legal de collecteur de girofles.&nbsp;</p>	\N	\N	Per	youssouf	Fakihidine	\N	h	neant	neant	comorienne	\N	\N	koudjou est affillié à Abdourazakou mohamed, Mena, Ndjewou...	0	1	Domoni Anjouan
9	6	ALI	OUSSENE OILI	0	\N	2021-11-10 10:00:51	618ccacf0074a.png	<p>RESEAU MENA</p>	\N	\N	Per	ALI	OUSSENE OILI	\N	h	\N	\N	\N	\N	\N	IL EST L'ALLIE NUMERO 01 DU TRAFIQUANT MENA ACTUELLEMENT EN PRISON  A MAJIKAVOU MAYOTTE	\N	1	CHANDRA/DOMONI
\.


--
-- Data for Name: envenement; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.envenement (id, affaire_id, type_evenement, localisation, start_at, duration, resume, end_at, geo_localisation, titre) FROM stdin;
1	2	2	MORONI	2021-10-25 09:45:00	\N	<p style="margin-right:-54px; text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Nous mentionnons qu&rsquo;apr&egrave;s avoir recueillir tant d&rsquo;information sur notre cible, sommes all&eacute;s &agrave; la rencontre de sa femme la nomm&eacute;e FATIMA M&rsquo;madi Ahamada&nbsp;</span></span><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">, laquelle a accept&eacute; de r&eacute;pondre &agrave; nos questions. Cependant cette derni&egrave;re nous a confirm&eacute; que son mari pourra &ecirc;tre d&eacute;tenteur des armes &agrave; feu tels que cit&eacute; en haut car il lui avait d&eacute;j&agrave; affirm&eacute; qu&rsquo;il avait tent&eacute; de faire rentrer des armes dans notre territoire en les mettant dans une voiture mais il a &eacute;t&eacute; appr&eacute;hend&eacute;. Donc au vu de cette d&eacute;claration, elle pense qu&rsquo;il est d&eacute;tenteur d&rsquo;autre arme mais elle ignore o&ugrave; il les cache. </span></span></p>\r\n\r\n<p style="margin-right:-54px; text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Nous vous informons que ce dernier a d&eacute;j&agrave; menac&eacute; son ex-&eacute;pouse avec arme blanche mais en France selon sa femme. Cependant il utilise comme moyen de transport&nbsp;: une moto scooter et une voiture de marque Renault-Kangoo de couleur Jaune, immatricul&eacute; sous le num&eacute;ro&nbsp;:<strong> 020BH73</strong> et nous estimons que c&rsquo;est dans cette Kangoo o&ugrave; la vid&eacute;o a &eacute;t&eacute; film&eacute;</span></span></p>	2021-10-25 14:59:00	\N	COLLECTE D'INFORMATIONS
3	4	3	\N	2021-11-06 12:55:00	\N	<p>La plus part du temps, les clandestins malgaches font escale &agrave; domoni Anjouan avant d&rsquo;&ecirc;tre acheminer &agrave; Mayotte.</p>\r\n\r\n<p>Observation :&nbsp;</p>\r\n\r\n<p><span>[[3]]</span>&nbsp; la liaison des nombreux trafics mafieux depuis Madagascar notamment &agrave; Ambanja, Nosy-Be et Antsohy :</p>\r\n\r\n<ul>\r\n\t<li>Trafics Humains</li>\r\n\t<li>Trafics de Stup&eacute;fiants</li>\r\n</ul>\r\n\r\n<p>&nbsp;Dernier adresse connu Antsohy&nbsp;</p>	\N	\N	MISSION DE SAUVEGARDE DES VIES HUMAINES EN MER
\.


--
-- Data for Name: envenement_entites; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.envenement_entites (envenement_id, entites_id) FROM stdin;
\.


--
-- Data for Name: envenement_utilisateur; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.envenement_utilisateur (envenement_id, utilisateur_id) FROM stdin;
\.


--
-- Data for Name: login_failure; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.login_failure (id, username, created_at, client_ip) FROM stdin;
\.


--
-- Data for Name: personne_telephone; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.personne_telephone (personne_id, telephone_id) FROM stdin;
1	1
1	2
3	3
4	4
5	5
8	6
9	7
\.


--
-- Data for Name: piece_jointe; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.piece_jointe (id, courrier_id, filename, created_at) FROM stdin;
1	1	613c8f7d24cf7.pdf	2021-09-11 11:14:05
2	2	6145be31d986a.pdf	2021-09-18 10:23:45
3	3	6145c33fc4961.pdf	2021-09-18 10:45:19
4	4	6148764ec1346.pdf	2021-09-20 11:53:50
5	5	614879946472b.pdf	2021-09-20 12:07:48
6	6	61487b87b55b8.pdf	2021-09-20 12:16:07
7	7	61487b8bad152.pdf	2021-09-20 12:16:11
8	8	61487e0d57993.pdf	2021-09-20 12:26:53
9	9	6148806729a9b.pdf	2021-09-20 12:36:55
10	10	614ad6d8980ca.pdf	2021-09-22 07:10:16
11	12	614ad9d71efcc.pdf	2021-09-22 07:23:03
12	13	614adbd96ed1e.pdf	2021-09-22 07:31:37
13	14	614adbe945ee5.pdf	2021-09-22 07:31:53
14	15	614ade767117b.pdf	2021-09-22 07:42:46
15	16	614adffaa31f2.pdf	2021-09-22 07:49:14
16	17	614ae26b6e24d.pdf	2021-09-22 07:59:39
17	18	614ae43f389e8.pdf	2021-09-22 08:07:27
18	19	614ae5bd62efb.pdf	2021-09-22 08:13:49
19	20	614ae7302e0d9.pdf	2021-09-22 08:20:00
20	21	614c729ae2a56.pdf	2021-09-23 12:27:05
21	22	614c74e31b54e.pdf	2021-09-23 12:36:51
22	23	614c76e3964a2.pdf	2021-09-23 12:45:23
23	24	614c7b2f5a6ae.pdf	2021-09-23 13:03:43
24	25	614c7e738f7fb.pdf	2021-09-23 13:17:39
25	26	614c7fe417ec8.pdf	2021-09-23 13:23:48
26	27	6151aca07543e.pdf	2021-09-27 11:36:00
27	28	6151ae8a29528.pdf	2021-09-27 11:44:10
28	29	6151afe9e973a.pdf	2021-09-27 11:50:01
29	30	6151b0fa0e8ec.pdf	2021-09-27 11:54:34
30	31	6151b2dfa2e4c.pdf	2021-09-27 12:02:39
31	32	6151b46951d20.pdf	2021-09-27 12:09:13
32	33	6151b5a468543.pdf	2021-09-27 12:14:28
33	34	6151b8db4206f.pdf	2021-09-27 12:28:11
34	35	6151bd80a6c1a.pdf	2021-09-27 12:48:00
35	36	615221f243ade.pdf	2021-09-27 19:56:34
36	37	615223a82035d.pdf	2021-09-27 20:03:52
37	38	61556f23b10b4.pdf	2021-09-30 08:02:42
38	39	615571df6cea3.pdf	2021-09-30 08:14:23
39	40	615574651848f.pdf	2021-09-30 08:25:09
40	41	6155778588497.pdf	2021-09-30 08:38:29
41	42	61557a92da7df.pdf	2021-09-30 08:51:30
42	43	61558347c63c1.pdf	2021-09-30 09:28:39
43	44	6155870324311.pdf	2021-09-30 09:44:35
44	45	6155897fc567b.pdf	2021-09-30 09:55:11
45	46	61558df32a79f.pdf	2021-09-30 10:14:11
46	47	61584916d263a.pdf	2021-10-02 11:57:10
47	48	61584aaabcd66.pdf	2021-10-02 12:03:54
48	49	61584c5f0cdb6.pdf	2021-10-02 12:11:11
49	50	61584ee9b04e6.pdf	2021-10-02 12:22:01
50	51	61585081b8e5b.pdf	2021-10-02 12:28:49
51	52	615852b152c73.pdf	2021-10-02 12:38:09
52	53	6167e6606758a.pdf	2021-10-14 08:12:16
53	54	6167e7ca23685.pdf	2021-10-14 08:18:18
54	55	6167e9798b23c.pdf	2021-10-14 08:25:29
55	56	6167ebd9eddc9.pdf	2021-10-14 08:35:37
56	57	6167ed1a9c6c7.pdf	2021-10-14 08:40:58
57	58	6167ef6204797.pdf	2021-10-14 08:50:42
58	60	6167f4a70a04d.pdf	2021-10-14 09:13:11
59	61	6167f6104c2aa.pdf	2021-10-14 09:19:12
60	62	616d27a6eb653.pdf	2021-10-18 07:52:06
61	63	616d28a90d18e.pdf	2021-10-18 07:56:25
62	64	616d2b3523c10.pdf	2021-10-18 08:07:17
63	65	616d2c4b9a68a.pdf	2021-10-18 08:11:55
64	66	616d2de34ee4b.pdf	2021-10-18 08:18:43
65	67	616d2f6c14844.pdf	2021-10-18 08:25:16
66	68	616d2fdf0bbc6.pdf	2021-10-18 08:27:11
67	69	616d3110e7a90.pdf	2021-10-18 08:32:16
68	70	616d3254ab537.pdf	2021-10-18 08:37:40
69	71	616d35794f56c.pdf	2021-10-18 08:51:05
70	72	616d37695d1a7.pdf	2021-10-18 08:59:21
71	73	616d38b6ad059.pdf	2021-10-18 09:04:54
72	74	616d3a0377c85.pdf	2021-10-18 09:10:27
73	75	616d3bb53e501.pdf	2021-10-18 09:17:41
74	76	616d3d241696b.pdf	2021-10-18 09:23:48
75	77	616d3ebd39a4f.pdf	2021-10-18 09:30:37
76	78	616d405c317bb.pdf	2021-10-18 09:37:32
77	79	616d42000b68a.pdf	2021-10-18 09:44:32
78	80	616d433e0612a.pdf	2021-10-18 09:49:50
79	81	616fb9f2a7eab.pdf	2021-10-20 06:40:50
80	82	616fbba5aaf36.pdf	2021-10-20 06:48:05
81	83	616fbfa65cec8.pdf	2021-10-20 07:05:10
82	84	616fc133e0916.pdf	2021-10-20 07:11:47
83	85	616fc4c7af3aa.pdf	2021-10-20 07:27:03
84	86	6171123629f4a.pdf	2021-10-21 07:09:41
85	87	617114b33128b.pdf	2021-10-21 07:20:19
86	88	6171173bd84e4.pdf	2021-10-21 07:31:07
87	89	617119d5d623b.pdf	2021-10-21 07:42:13
88	90	61711c53d239d.pdf	2021-10-21 07:52:51
89	91	617135560b45e.pdf	2021-10-21 09:39:34
90	92	617135995ac38.pdf	2021-10-21 09:40:41
91	93	6177a6b34df8a.pdf	2021-10-26 06:56:51
92	94	6177a88213c3e.pdf	2021-10-26 07:04:34
93	95	6177ad095e9a6.pdf	2021-10-26 07:23:53
94	96	6177ae47ce150.pdf	2021-10-26 07:29:11
95	97	6177b059664e7.pdf	2021-10-26 07:38:01
96	98	6177b23deaf43.pdf	2021-10-26 07:46:05
97	99	6177b7078474d.pdf	2021-10-26 08:06:31
98	100	6177ca3333a29.pdf	2021-10-26 09:28:19
99	101	6178fe8470c4e.pdf	2021-10-27 07:23:48
100	102	617901ed9d31b.pdf	2021-10-27 07:38:21
101	103	61790796e174a.pdf	2021-10-27 08:02:30
102	104	617909314fac6.pdf	2021-10-27 08:09:21
103	105	61790af74c36a.pdf	2021-10-27 08:16:55
104	106	61790dcf60401.pdf	2021-10-27 08:29:03
105	107	6179121a55cc0.pdf	2021-10-27 08:47:22
106	108	6179145715c04.pdf	2021-10-27 08:56:55
107	109	6179156f2db50.pdf	2021-10-27 09:01:35
108	110	617917322e7af.pdf	2021-10-27 09:09:06
109	111	617917fcd5d09.pdf	2021-10-27 09:12:28
110	112	617918b5cc756.pdf	2021-10-27 09:15:33
111	113	617919c38e312.pdf	2021-10-27 09:20:03
112	114	61791b73ed5b1.pdf	2021-10-27 09:27:15
113	115	617923936d6a0.pdf	2021-10-27 10:01:55
114	116	6179250294361.pdf	2021-10-27 10:08:02
115	117	6179290378bc2.pdf	2021-10-27 10:25:07
116	118	61792a67baad3.pdf	2021-10-27 10:31:03
117	119	617932082e05f.pdf	2021-10-27 11:03:36
118	120	6179338ba5089.pdf	2021-10-27 11:10:03
119	121	617934b48e091.pdf	2021-10-27 11:15:00
120	122	617938e0ada3c.pdf	2021-10-27 11:32:48
121	123	61793ca3b6104.pdf	2021-10-27 11:48:51
122	124	61794283b1d03.pdf	2021-10-27 12:13:55
123	125	617a431625f84.pdf	2021-10-28 06:28:38
124	126	61810563df384.pdf	2021-11-02 09:31:15
125	127	618107585b05c.pdf	2021-11-02 09:39:36
126	128	618109f31513c.pdf	2021-11-02 09:50:43
127	129	61810c0be91e6.pdf	2021-11-02 09:59:39
128	130	61823097743cd.pdf	2021-11-03 06:47:51
129	131	6182320a32919.pdf	2021-11-03 06:54:02
130	132	6182334832624.pdf	2021-11-03 06:59:20
131	133	618234ba6a041.pdf	2021-11-03 07:05:30
132	134	618235ea9da3b.pdf	2021-11-03 07:10:34
133	135	61823946901d2.pdf	2021-11-03 07:24:54
134	136	61823d4f91e7f.pdf	2021-11-03 07:42:07
135	137	61823fe1460cf.pdf	2021-11-03 07:53:05
136	138	6182419d47033.pdf	2021-11-03 08:00:29
137	139	6182439b81aca.pdf	2021-11-03 08:08:59
138	140	6182489f32dd4.pdf	2021-11-03 08:30:23
139	141	618263b75ea47.pdf	2021-11-03 10:25:59
140	142	618264d51ee01.pdf	2021-11-03 10:30:45
141	143	6183881f7e489.pdf	2021-11-04 07:13:35
142	144	61838b864b605.pdf	2021-11-04 07:28:06
143	145	61838c988cee7.pdf	2021-11-04 07:32:40
144	146	6183923162d93.pdf	2021-11-04 07:56:33
145	147	618393729e7f9.pdf	2021-11-04 08:01:54
146	148	618395dc2ce3a.pdf	2021-11-04 08:12:12
147	149	618397ec9536d.pdf	2021-11-04 08:21:00
148	150	61839a008571c.pdf	2021-11-04 08:29:52
149	151	6183a02e79ff6.pdf	2021-11-04 08:56:14
150	152	6183a23c75f2a.pdf	2021-11-04 09:05:00
151	153	6183bbdcb4658.pdf	2021-11-04 10:54:20
152	154	6183bc9dd4ded.pdf	2021-11-04 10:57:33
153	155	6183be0a34acf.pdf	2021-11-04 11:03:38
154	156	6183bef308872.pdf	2021-11-04 11:07:31
\.


--
-- Data for Name: related_to; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.related_to (id, parent_id, child_id) FROM stdin;
\.


--
-- Data for Name: tache; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.tache (id, affaire_id, created_by_id, priorite, created_at, last_update, expire_at, titre, resume) FROM stdin;
\.


--
-- Data for Name: tache_utilisateur; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.tache_utilisateur (id, tache_id, utilisateur_id, statut, updated_at, remarque) FROM stdin;
\.


--
-- Data for Name: telephone; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.telephone (id, numero, fichier_cdr) FROM stdin;
1	+2694745048	\N
2	+2693225048	\N
3	2610324510652	\N
4	3447756	\N
5	2693559623	\N
6	3322030	\N
7	3361146	\N
\.


--
-- Data for Name: user_session; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.user_session (id, utilisateur_id, start_at, end_at, session_id) FROM stdin;
1	2	\N	2021-11-11 17:48:09	0tfqasff69emk977njf6lncrbd
2	2	2021-11-11 17:48:22	2021-11-11 17:49:39	njg4engoc9c4apvrr8va0d32d0
\.


--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.utilisateur (id, departement_id, nom, prenom, niveau_accreditation, numero_matricule, username, password, salt, create_at, is_active, roles, last_login_for_user, last_login, is_deleted) FROM stdin;
9	4	Sakani	Ahamada	3	BHL-DNE-1636185660-36112	sakani.ahamada	$argon2id$v=19$m=65536,t=4,p=1$mYMX3EUXkRQZRkwnIAkHuA$2E3RmpqsfvkvpxjgnrDeevPxLe4cnnrkvDrLBKQ/yPs	ipne9bc5qb4s00ok404040g808ggw88	2021-11-06 08:01:00	t	a:3:{i:1;s:9:"ROLE_USER";i:2;s:13:"USER_VIEW_DEP";i:3;s:13:"ROLE_VIEW_AFF";}	\N	\N	f
4	3	OUSSAMA	T	3	BHL-DNE-1631520672-980818	oussamat	$argon2id$v=19$m=65536,t=4,p=1$CB8bDOLSLhchfeTSX3HP+g$gVR84wC9pkJrBVuqzlSHqPxK4QlQJIvCKmMR5Hbc4iI	eo5wuejtgdw8wwwww484c0gkkww8kg0	2021-09-13 08:11:12	t	a:4:{i:0;s:9:"ROLE_USER";i:1;s:13:"USER_VIEW_DEP";i:2;s:12:"ROLE_CREATOR";i:3;s:13:"USER_VIEW_AFF";}	2021-09-21 08:37:46	2021-09-24 08:07:13	f
7	4	Issihaka	Hassani	3	BHL-DNE-1636185420-488350	issihaka.hassani	$argon2id$v=19$m=65536,t=4,p=1$FXXPmMazgLCjLr64sEe19w$R9Z/0r1l/TYTyQWMYD+WX4hk+UPbq6rWR4myLqZAaLw	sv45gexa05cwkos0800c0wco4w0wsw8	2021-11-06 07:57:00	t	a:3:{i:1;s:9:"ROLE_USER";i:3;s:13:"ROLE_VIEW_AFF";i:4;s:12:"ROLE_CREATOR";}	\N	2021-11-06 08:19:04	f
6	\N	Soilahoudine	Soidiki	5	BHL-DNE-1635877280-452213	soilahoudine.soidiki	$argon2id$v=19$m=65536,t=4,p=1$NcRo14OK3JDxyXIxBrMflw$poXJZ7FyB072e8SkWryPakRqLNxh5tPtj8m6EME5J3E	p5q00em6vk0w8ccgksccwkg84wc4cws	2021-11-02 18:21:20	t	a:1:{i:1;s:13:"ROLE_COURRIER";}	2021-11-02 18:30:08	2021-11-02 19:08:47	f
10	4	Youssouf	Ali Youssouf	3	BHL-DNE-1636187265-701467	youssouf.ali	$argon2id$v=19$m=65536,t=4,p=1$Tb//R/I2OBdaRos9j5+SDg$fDrnhXS55HGrqr8mjkXAnm1XDwg81Z986ZbEO46cJ9c	nm4om5wgf74s48cgcgow8cckgwc4000	2021-11-06 08:27:45	t	a:4:{i:1;s:9:"ROLE_USER";i:2;s:17:"ROLE_VIEW_AFFAIRE";i:3;s:13:"ROLE_VIEW_DEP";i:4;s:12:"ROLE_CREATOR";}	\N	\N	f
3	\N	Said	Mohamed	1	BHL-DNE-1631189546-487400	said.mo	$argon2id$v=19$m=65536,t=4,p=1$PlL/Ggc1PmfrYz15dFLcIg$pQVOcPULAu1PwO+jn0vtvt4oj9bF9DSb1LKbDPZLKCM	g8bn9xmnt68s888kws8cg8okoc84cc4	2021-09-09 12:12:26	t	a:1:{i:0;s:13:"ROLE_COURRIER";}	2021-11-04 09:08:52	2021-11-04 10:50:32	f
11	6	daroumi	mohamed	5	BHL-DNE-1636189440-920581	daroumi.mohamed	$argon2id$v=19$m=65536,t=4,p=1$C2yum2MojFDUvOMNwuSfJw$JS5t92/xZDPHsQiedL/644PmpSAP3cXFuvR7oMvldaA	avj5vx7dme8g48s80kw04so480808ws	2021-11-06 09:04:00	t	a:4:{i:1;s:9:"ROLE_USER";i:2;s:13:"USER_VIEW_DEP";i:3;s:13:"ROLE_VIEW_AFF";i:4;s:12:"ROLE_CREATOR";}	2021-11-10 11:04:45	2021-11-11 07:33:20	f
2	2	Admin	Systeme	4	BHL-DNE-1631189387-344465	sysadmin	$argon2id$v=19$m=65536,t=4,p=1$NXl8rNq5Ny+uduMvH9ustw$8QXewOSFjf05E5x7P7QN4sAjaA7vLLJskaSpvuKiQ6w	9fdn9szc4ls8g800wwkg84wgwows8k8	2021-09-09 12:09:47	t	a:8:{i:0;s:9:"ROLE_USER";i:1;s:13:"USER_VIEW_DEP";i:2;s:10:"ROLE_ADMIN";i:3;s:10:"ROLE_ADMIN";i:4;s:12:"ROLE_CREATOR";i:5;s:13:"USER_VIEW_AFF";i:6;s:16:"ROLE_SUPER_ADMIN";i:7;s:13:"ROLE_COURRIER";}	2021-11-09 18:13:46	2021-11-11 14:18:18	f
5	3	Admin	Systeme	3	BHL-DNE-1635178987-169257	joel.agbessi	$argon2id$v=19$m=65536,t=4,p=1$+nNyTWmRR33Xm6hd5r6hvQ$MT666sXGBOz5F4N12FNiLJzr9gjWtyTCReScL+G8UVs	idyenoyfenksck8kc4kkc0og4s0k4s8	2021-10-25 16:23:07	t	a:4:{i:1;s:9:"ROLE_USER";i:2;s:13:"USER_VIEW_DEP";i:3;s:12:"ROLE_CREATOR";i:4;s:13:"USER_VIEW_AFF";}	2021-11-02 16:46:18	2021-11-06 11:46:19	f
8	5	Zabah	Abdou-Salam	3	BHL-DNE-1636185536-569124	zabah.abdou	$argon2id$v=19$m=65536,t=4,p=1$kDfJgNH23Fweh4zpql8RZQ$qcH2RNd7xdAypzeOV6DUjZvGFlWtd1tL6Suluw23HVk	a0z0ragf0e0wwscwkcgssgw8sc0og4s	2021-11-06 07:58:56	t	a:3:{i:1;s:9:"ROLE_USER";i:2;s:13:"USER_VIEW_DEP";i:3;s:12:"ROLE_CREATOR";}	2021-11-11 10:41:29	2021-11-11 14:43:25	f
\.


--
-- Data for Name: utilisateur_consultation; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.utilisateur_consultation (id, affaire_id, utilisateur_id, created_by_id, created_at, expire_at, is_revoked, statut) FROM stdin;
\.


--
-- Name: affaire_directed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.affaire_directed_id_seq', 6, true);


--
-- Name: affaire_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.affaire_id_seq', 6, true);


--
-- Name: affaire_utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.affaire_utilisateur_id_seq', 6, true);


--
-- Name: affectation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.affectation_id_seq', 1, false);


--
-- Name: alias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.alias_id_seq', 5, true);


--
-- Name: attachements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.attachements_id_seq', 11, true);


--
-- Name: courrier_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.courrier_id_seq', 156, true);


--
-- Name: departement_director_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.departement_director_id_seq', 1, true);


--
-- Name: departement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.departement_id_seq', 6, true);


--
-- Name: entite_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.entite_id_seq', 9, true);


--
-- Name: envenement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.envenement_id_seq', 3, true);


--
-- Name: login_failure_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.login_failure_id_seq', 1, false);


--
-- Name: piece_jointe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.piece_jointe_id_seq', 154, true);


--
-- Name: related_to_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.related_to_id_seq', 1, false);


--
-- Name: tache_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.tache_id_seq', 1, false);


--
-- Name: tache_utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.tache_utilisateur_id_seq', 1, false);


--
-- Name: telephone_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.telephone_id_seq', 7, true);


--
-- Name: user_session_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.user_session_id_seq', 2, true);


--
-- Name: utilisateur_consultation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.utilisateur_consultation_id_seq', 1, false);


--
-- Name: utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.utilisateur_id_seq', 11, true);


--
-- Name: affaire_directed affaire_directed_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire_directed
    ADD CONSTRAINT affaire_directed_pkey PRIMARY KEY (id);


--
-- Name: affaire affaire_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire
    ADD CONSTRAINT affaire_pkey PRIMARY KEY (id);


--
-- Name: affaire_utilisateur affaire_utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire_utilisateur
    ADD CONSTRAINT affaire_utilisateur_pkey PRIMARY KEY (id);


--
-- Name: affectation affectation_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affectation
    ADD CONSTRAINT affectation_pkey PRIMARY KEY (id);


--
-- Name: alias alias_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.alias
    ADD CONSTRAINT alias_pkey PRIMARY KEY (id);


--
-- Name: attachements attachements_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.attachements
    ADD CONSTRAINT attachements_pkey PRIMARY KEY (id);


--
-- Name: courrier courrier_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.courrier
    ADD CONSTRAINT courrier_pkey PRIMARY KEY (id);


--
-- Name: departement_director departement_director_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.departement_director
    ADD CONSTRAINT departement_director_pkey PRIMARY KEY (id);


--
-- Name: departement departement_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.departement
    ADD CONSTRAINT departement_pkey PRIMARY KEY (id);


--
-- Name: entite entite_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.entite
    ADD CONSTRAINT entite_pkey PRIMARY KEY (id);


--
-- Name: envenement_entites envenement_entites_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.envenement_entites
    ADD CONSTRAINT envenement_entites_pkey PRIMARY KEY (envenement_id, entites_id);


--
-- Name: envenement envenement_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.envenement
    ADD CONSTRAINT envenement_pkey PRIMARY KEY (id);


--
-- Name: envenement_utilisateur envenement_utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.envenement_utilisateur
    ADD CONSTRAINT envenement_utilisateur_pkey PRIMARY KEY (envenement_id, utilisateur_id);


--
-- Name: login_failure login_failure_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.login_failure
    ADD CONSTRAINT login_failure_pkey PRIMARY KEY (id);


--
-- Name: personne_telephone personne_telephone_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.personne_telephone
    ADD CONSTRAINT personne_telephone_pkey PRIMARY KEY (personne_id, telephone_id);


--
-- Name: piece_jointe piece_jointe_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.piece_jointe
    ADD CONSTRAINT piece_jointe_pkey PRIMARY KEY (id);


--
-- Name: related_to related_to_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.related_to
    ADD CONSTRAINT related_to_pkey PRIMARY KEY (id);


--
-- Name: tache tache_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.tache
    ADD CONSTRAINT tache_pkey PRIMARY KEY (id);


--
-- Name: tache_utilisateur tache_utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.tache_utilisateur
    ADD CONSTRAINT tache_utilisateur_pkey PRIMARY KEY (id);


--
-- Name: telephone telephone_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.telephone
    ADD CONSTRAINT telephone_pkey PRIMARY KEY (id);


--
-- Name: user_session user_session_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.user_session
    ADD CONSTRAINT user_session_pkey PRIMARY KEY (id);


--
-- Name: utilisateur_consultation utilisateur_consultation_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.utilisateur_consultation
    ADD CONSTRAINT utilisateur_consultation_pkey PRIMARY KEY (id);


--
-- Name: utilisateur utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT utilisateur_pkey PRIMARY KEY (id);


--
-- Name: idx_1a291827f082e755; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_1a291827f082e755 ON public.entite USING btree (affaire_id);


--
-- Name: idx_1d1c63b3ccf9e01e; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_1d1c63b3ccf9e01e ON public.utilisateur USING btree (departement_id);


--
-- Name: idx_212b82dc193f62bd; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_212b82dc193f62bd ON public.attachements USING btree (envenement_id);


--
-- Name: idx_212b82dc9bea957a; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_212b82dc9bea957a ON public.attachements USING btree (entite_id);


--
-- Name: idx_29dc7595727aca70; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_29dc7595727aca70 ON public.related_to USING btree (parent_id);


--
-- Name: idx_29dc7595dd62c21b; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_29dc7595dd62c21b ON public.related_to USING btree (child_id);


--
-- Name: idx_3210cca2193f62bd; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_3210cca2193f62bd ON public.envenement_utilisateur USING btree (envenement_id);


--
-- Name: idx_3210cca2fb88e14f; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_3210cca2fb88e14f ON public.envenement_utilisateur USING btree (utilisateur_id);


--
-- Name: idx_4035ac6cf082e755; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_4035ac6cf082e755 ON public.affaire_directed USING btree (affaire_id);


--
-- Name: idx_4035ac6cfb88e14f; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_4035ac6cfb88e14f ON public.affaire_directed USING btree (utilisateur_id);


--
-- Name: idx_437a970ea21bd112; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_437a970ea21bd112 ON public.personne_telephone USING btree (personne_id);


--
-- Name: idx_437a970efe649a29; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_437a970efe649a29 ON public.personne_telephone USING btree (telephone_id);


--
-- Name: idx_8849cbdefb88e14f; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_8849cbdefb88e14f ON public.user_session USING btree (utilisateur_id);


--
-- Name: idx_8e15c4fdd2235d39; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_8e15c4fdd2235d39 ON public.tache_utilisateur USING btree (tache_id);


--
-- Name: idx_8e15c4fdfb88e14f; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_8e15c4fdfb88e14f ON public.tache_utilisateur USING btree (utilisateur_id);


--
-- Name: idx_8feec61ccf9e01e; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_8feec61ccf9e01e ON public.departement_director USING btree (departement_id);


--
-- Name: idx_8feec61fb88e14f; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_8feec61fb88e14f ON public.departement_director USING btree (utilisateur_id);


--
-- Name: idx_93872075b03a8386; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_93872075b03a8386 ON public.tache USING btree (created_by_id);


--
-- Name: idx_93872075f082e755; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_93872075f082e755 ON public.tache USING btree (affaire_id);


--
-- Name: idx_9c3f18efb03a8386; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_9c3f18efb03a8386 ON public.affaire USING btree (created_by_id);


--
-- Name: idx_9c3f18efccf9e01e; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_9c3f18efccf9e01e ON public.affaire USING btree (departement_id);


--
-- Name: idx_a554c7f9193f62bd; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_a554c7f9193f62bd ON public.envenement_entites USING btree (envenement_id);


--
-- Name: idx_a554c7f9573acf92; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_a554c7f9573acf92 ON public.envenement_entites USING btree (entites_id);


--
-- Name: idx_ab5111d48bf41dc7; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_ab5111d48bf41dc7 ON public.piece_jointe USING btree (courrier_id);


--
-- Name: idx_bb3e452ff082e755; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_bb3e452ff082e755 ON public.envenement USING btree (affaire_id);


--
-- Name: idx_bef47caa20439135; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_bef47caa20439135 ON public.courrier USING btree (response_to_id);


--
-- Name: idx_bef47caa6d0aba22; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_bef47caa6d0aba22 ON public.courrier USING btree (affectation_id);


--
-- Name: idx_bef47caab03a8386; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_bef47caab03a8386 ON public.courrier USING btree (created_by_id);


--
-- Name: idx_d8cc00c5f082e755; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_d8cc00c5f082e755 ON public.affaire_utilisateur USING btree (affaire_id);


--
-- Name: idx_d8cc00c5fb88e14f; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_d8cc00c5fb88e14f ON public.affaire_utilisateur USING btree (utilisateur_id);


--
-- Name: idx_e16c6b94a21bd112; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_e16c6b94a21bd112 ON public.alias USING btree (personne_id);


--
-- Name: idx_ffb4a155b03a8386; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_ffb4a155b03a8386 ON public.utilisateur_consultation USING btree (created_by_id);


--
-- Name: idx_ffb4a155f082e755; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_ffb4a155f082e755 ON public.utilisateur_consultation USING btree (affaire_id);


--
-- Name: idx_ffb4a155fb88e14f; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_ffb4a155fb88e14f ON public.utilisateur_consultation USING btree (utilisateur_id);


--
-- Name: type_idx; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX type_idx ON public.entite USING btree (type);


--
-- Name: utilisateur_consultation_unique; Type: INDEX; Schema: public; Owner: admin
--

CREATE UNIQUE INDEX utilisateur_consultation_unique ON public.utilisateur_consultation USING btree (affaire_id, utilisateur_id);


--
-- Name: entite fk_1a291827f082e755; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.entite
    ADD CONSTRAINT fk_1a291827f082e755 FOREIGN KEY (affaire_id) REFERENCES public.affaire(id);


--
-- Name: utilisateur fk_1d1c63b3ccf9e01e; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT fk_1d1c63b3ccf9e01e FOREIGN KEY (departement_id) REFERENCES public.departement(id);


--
-- Name: attachements fk_212b82dc193f62bd; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.attachements
    ADD CONSTRAINT fk_212b82dc193f62bd FOREIGN KEY (envenement_id) REFERENCES public.envenement(id);


--
-- Name: attachements fk_212b82dc9bea957a; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.attachements
    ADD CONSTRAINT fk_212b82dc9bea957a FOREIGN KEY (entite_id) REFERENCES public.entite(id);


--
-- Name: related_to fk_29dc7595727aca70; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.related_to
    ADD CONSTRAINT fk_29dc7595727aca70 FOREIGN KEY (parent_id) REFERENCES public.entite(id);


--
-- Name: related_to fk_29dc7595dd62c21b; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.related_to
    ADD CONSTRAINT fk_29dc7595dd62c21b FOREIGN KEY (child_id) REFERENCES public.entite(id);


--
-- Name: envenement_utilisateur fk_3210cca2193f62bd; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.envenement_utilisateur
    ADD CONSTRAINT fk_3210cca2193f62bd FOREIGN KEY (envenement_id) REFERENCES public.envenement(id) ON DELETE CASCADE;


--
-- Name: envenement_utilisateur fk_3210cca2fb88e14f; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.envenement_utilisateur
    ADD CONSTRAINT fk_3210cca2fb88e14f FOREIGN KEY (utilisateur_id) REFERENCES public.utilisateur(id) ON DELETE CASCADE;


--
-- Name: affaire_directed fk_4035ac6cf082e755; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire_directed
    ADD CONSTRAINT fk_4035ac6cf082e755 FOREIGN KEY (affaire_id) REFERENCES public.affaire(id);


--
-- Name: affaire_directed fk_4035ac6cfb88e14f; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire_directed
    ADD CONSTRAINT fk_4035ac6cfb88e14f FOREIGN KEY (utilisateur_id) REFERENCES public.utilisateur(id);


--
-- Name: personne_telephone fk_437a970ea21bd112; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.personne_telephone
    ADD CONSTRAINT fk_437a970ea21bd112 FOREIGN KEY (personne_id) REFERENCES public.entite(id) ON DELETE CASCADE;


--
-- Name: personne_telephone fk_437a970efe649a29; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.personne_telephone
    ADD CONSTRAINT fk_437a970efe649a29 FOREIGN KEY (telephone_id) REFERENCES public.telephone(id) ON DELETE CASCADE;


--
-- Name: user_session fk_8849cbdefb88e14f; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.user_session
    ADD CONSTRAINT fk_8849cbdefb88e14f FOREIGN KEY (utilisateur_id) REFERENCES public.utilisateur(id);


--
-- Name: tache_utilisateur fk_8e15c4fdd2235d39; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.tache_utilisateur
    ADD CONSTRAINT fk_8e15c4fdd2235d39 FOREIGN KEY (tache_id) REFERENCES public.tache(id);


--
-- Name: tache_utilisateur fk_8e15c4fdfb88e14f; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.tache_utilisateur
    ADD CONSTRAINT fk_8e15c4fdfb88e14f FOREIGN KEY (utilisateur_id) REFERENCES public.utilisateur(id);


--
-- Name: departement_director fk_8feec61ccf9e01e; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.departement_director
    ADD CONSTRAINT fk_8feec61ccf9e01e FOREIGN KEY (departement_id) REFERENCES public.departement(id);


--
-- Name: departement_director fk_8feec61fb88e14f; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.departement_director
    ADD CONSTRAINT fk_8feec61fb88e14f FOREIGN KEY (utilisateur_id) REFERENCES public.utilisateur(id);


--
-- Name: tache fk_93872075b03a8386; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.tache
    ADD CONSTRAINT fk_93872075b03a8386 FOREIGN KEY (created_by_id) REFERENCES public.utilisateur(id);


--
-- Name: tache fk_93872075f082e755; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.tache
    ADD CONSTRAINT fk_93872075f082e755 FOREIGN KEY (affaire_id) REFERENCES public.affaire(id);


--
-- Name: affaire fk_9c3f18efb03a8386; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire
    ADD CONSTRAINT fk_9c3f18efb03a8386 FOREIGN KEY (created_by_id) REFERENCES public.utilisateur(id);


--
-- Name: affaire fk_9c3f18efccf9e01e; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire
    ADD CONSTRAINT fk_9c3f18efccf9e01e FOREIGN KEY (departement_id) REFERENCES public.departement(id);


--
-- Name: envenement_entites fk_a554c7f9193f62bd; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.envenement_entites
    ADD CONSTRAINT fk_a554c7f9193f62bd FOREIGN KEY (envenement_id) REFERENCES public.envenement(id) ON DELETE CASCADE;


--
-- Name: envenement_entites fk_a554c7f9573acf92; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.envenement_entites
    ADD CONSTRAINT fk_a554c7f9573acf92 FOREIGN KEY (entites_id) REFERENCES public.entite(id) ON DELETE CASCADE;


--
-- Name: piece_jointe fk_ab5111d48bf41dc7; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.piece_jointe
    ADD CONSTRAINT fk_ab5111d48bf41dc7 FOREIGN KEY (courrier_id) REFERENCES public.courrier(id);


--
-- Name: envenement fk_bb3e452ff082e755; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.envenement
    ADD CONSTRAINT fk_bb3e452ff082e755 FOREIGN KEY (affaire_id) REFERENCES public.affaire(id);


--
-- Name: courrier fk_bef47caa20439135; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.courrier
    ADD CONSTRAINT fk_bef47caa20439135 FOREIGN KEY (response_to_id) REFERENCES public.courrier(id);


--
-- Name: courrier fk_bef47caa6d0aba22; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.courrier
    ADD CONSTRAINT fk_bef47caa6d0aba22 FOREIGN KEY (affectation_id) REFERENCES public.departement(id);


--
-- Name: courrier fk_bef47caab03a8386; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.courrier
    ADD CONSTRAINT fk_bef47caab03a8386 FOREIGN KEY (created_by_id) REFERENCES public.utilisateur(id);


--
-- Name: affaire_utilisateur fk_d8cc00c5f082e755; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire_utilisateur
    ADD CONSTRAINT fk_d8cc00c5f082e755 FOREIGN KEY (affaire_id) REFERENCES public.affaire(id);


--
-- Name: affaire_utilisateur fk_d8cc00c5fb88e14f; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.affaire_utilisateur
    ADD CONSTRAINT fk_d8cc00c5fb88e14f FOREIGN KEY (utilisateur_id) REFERENCES public.utilisateur(id);


--
-- Name: alias fk_e16c6b94a21bd112; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.alias
    ADD CONSTRAINT fk_e16c6b94a21bd112 FOREIGN KEY (personne_id) REFERENCES public.entite(id);


--
-- Name: utilisateur_consultation fk_ffb4a155b03a8386; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.utilisateur_consultation
    ADD CONSTRAINT fk_ffb4a155b03a8386 FOREIGN KEY (created_by_id) REFERENCES public.utilisateur(id);


--
-- Name: utilisateur_consultation fk_ffb4a155f082e755; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.utilisateur_consultation
    ADD CONSTRAINT fk_ffb4a155f082e755 FOREIGN KEY (affaire_id) REFERENCES public.affaire(id);


--
-- Name: utilisateur_consultation fk_ffb4a155fb88e14f; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.utilisateur_consultation
    ADD CONSTRAINT fk_ffb4a155fb88e14f FOREIGN KEY (utilisateur_id) REFERENCES public.utilisateur(id);


--
-- PostgreSQL database dump complete
--

