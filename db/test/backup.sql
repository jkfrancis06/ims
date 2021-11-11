--
-- PostgreSQL database dump
--

-- Dumped from database version 13.3
-- Dumped by pg_dump version 13.3

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
DROP INDEX public.idx_238df9e0fd02f13;
DROP INDEX public.idx_212b82dc9bea957a;
DROP INDEX public.idx_212b82dc193f62bd;
DROP INDEX public.idx_1d1c63b3ccf9e01e;
DROP INDEX public.idx_1a291827f082e755;
DROP INDEX public.assignment_unique;
ALTER TABLE ONLY public.utilisateur DROP CONSTRAINT utilisateur_pkey;
ALTER TABLE ONLY public.utilisateur_consultation DROP CONSTRAINT utilisateur_consultation_pkey;
ALTER TABLE ONLY public.user_session DROP CONSTRAINT user_session_pkey;
ALTER TABLE ONLY public.telephone DROP CONSTRAINT telephone_pkey;
ALTER TABLE ONLY public.tache_utilisateur DROP CONSTRAINT tache_utilisateur_pkey;
ALTER TABLE ONLY public.tache DROP CONSTRAINT tache_pkey;
ALTER TABLE ONLY public.related_to DROP CONSTRAINT related_to_pkey;
ALTER TABLE ONLY public.preuve DROP CONSTRAINT preuve_pkey;
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
DROP SEQUENCE public.preuve_id_seq;
DROP TABLE public.preuve;
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
    created_by_id integer NOT NULL,
    response_to_id integer,
    affectation_id integer,
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
    taille integer,
    situation_matri integer,
    adresse character varying(255) DEFAULT NULL::character varying,
    other_infos text
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
    username character varying(255),
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
-- Name: preuve; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.preuve (
    id integer NOT NULL,
    evenement_id integer,
    nom character varying(255) NOT NULL,
    description text NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    files character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.preuve OWNER TO admin;

--
-- Name: preuve_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.preuve_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.preuve_id_seq OWNER TO admin;

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
    start_at timestamp(0) without time zone,
    end_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    session_id character varying(255)
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
3	5	3	2021-00010-AFF-DNE- 1635232406-446411	DÉTENTION D'ARMES À FEU	DÉTENTION D'ARMES À FEU	3	Ouvert	\N	<p>LE DÉNOMMÉ FAFA NDAMY PATRON DU RESTAURANT &laquo; THE BEST 269 &raquo; SIS À VOLO VOLO EST UNE MENACE. IL EST DÉTENTEUR D&rsquo;ARMES À FEU COMME ON LE VOIT SUR LES VIDÉOS QU&rsquo;IL PUBLIE EN LIGNE. IL PUBLIE UN VIDÉO OÙ ON ESTIME QUE C EST LUI FAISANT MANIPULATION D&rsquo;UN PISTOLET 9MM AVEC DES MOTS PEU RASSURANTS. SUR SON COMPTE FACEBOOK ON LE RETROUVE ENCORE POSANT SUR SON ÉPAULE UN FUSIL À POMPE (CALIBRE 12).</p>\r\n\r\n<p>CEUX QUI LE CONNAISSENT DISENT QU&rsquo;IL A DÉTENU RÉELLEMENT CES ARMES</p>	2021-10-26 07:13:26	2021-10-26 07:13:26	\N	\N
4	2	2	2021-00011-AFF-DNE- 1636619247-767916	Affaire Editor	Affaire Editor	1	Ouvert	\N	<p>Affaire Editor</p>	2021-11-11 08:27:27	2021-11-11 08:27:27	\N	\N
5	2	2	2021-00011-AFF-DNE- 1636619349-869874	Affaire Toto	Affaire Editor	1	Ouvert	\N	<p>Affaire Editor</p>	2021-11-11 08:29:09	2021-11-11 08:29:09	\N	\N
\.


--
-- Data for Name: affaire_directed; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.affaire_directed (id, affaire_id, utilisateur_id, is_revoked, created_at, last_update) FROM stdin;
3	3	5	f	2021-10-26 07:13:26	2021-10-26 07:13:26
4	4	2	f	2021-11-11 08:27:27	2021-11-11 08:27:27
5	5	2	f	2021-11-11 08:29:09	2021-11-11 08:29:09
\.


--
-- Data for Name: affaire_utilisateur; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.affaire_utilisateur (id, utilisateur_id, affaire_id, created_at, is_revoked, responsability, niveau_accreditation) FROM stdin;
3	5	3	2021-10-26 07:13:26	f		3
4	2	4	2021-11-11 08:27:27	f		1
5	2	5	2021-11-11 08:29:09	f		1
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
2	3	FAFA NDAMY
3	4	toto
8	12	Msr
9	12	TOTO
10	13	cdt
11	13	mm
12	12	Basd
\.


--
-- Data for Name: attachements; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.attachements (id, entite_id, envenement_id, name, type, description, created_at, last_update) FROM stdin;
7	3	\N	6177af1f6f5dd.png	1	2dd2	\N	\N
8	3	\N	6177af1f6fd01.png	1	pngdwedwe	\N	\N
9	3	\N	6177af1f6fdb8.jpg	1	dewdwedwed	\N	\N
28	13	\N	617bd0c28d5cc.pdf	1	Test pdf	\N	\N
29	13	\N	617bdc4cd5035.qt	1	Sound	\N	\N
30	13	\N	617bdc4cd6f3b.mp3	1	Video	\N	\N
27	13	\N	617be04c6964a.mp3	1	Adipiscing bibendum est ultricies integer quis auctor	\N	\N
26	13	\N	617be1274c15e.mkv	1	Gravida rutrum quisque non tellus orci ac auctor augue mauris	\N	\N
31	14	\N	617d3fd11c1ef.xlsx	1	Dolor sit amet consectetur adipiscing elit. Quis varius quam quisque id. Curabitur vitae nunc sed velit dignissim sodales ut eu. Purus gravida quis blandit turpis cursus	\N	\N
32	14	\N	617d3fd11c997.pdf	1	Aliquet nibh praesent tristique magna sit amet purus	\N	\N
40	\N	2	618143993963c.pdf	1	<p>Arcu risus quis varius quam quisque id diam vel <span>[[14]]</span>. Dolor morbi non arcu risus quis varius</p>	2021-11-02 13:56:41	2021-11-02 13:56:41
41	\N	2	618143993a8b6.pdf	1	<p>Quam lacus suspendisse faucibus interdum posuere. Sagittis purus sit amet volutpat consequat <span>[[4]]</span>. Morbi enim nunc faucibus a pellentesque sit amet porttitor. Tortor id aliquet lectus proin nibh nisl condimentum id venenatis<span>[[14]]</span>. Elementum integer enim neque volutpat ac tincidunt vitae semper quis. Sollicitudin tempor id eu nisl nunc mi ipsum. Quisque egestas diam in arcu cursus euismod quis viverra. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae.</p>	2021-11-02 13:56:41	2021-11-02 13:56:41
\.


--
-- Data for Name: courrier; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.courrier (id, created_by_id, response_to_id, affectation_id, flux, origine, destination, datecourrier, reference_interne, sujet, contenu, type, created_at, statut, commentaire, is_response, entry) FROM stdin;
93	2	\N	3	1	AE	KM	2021-09-02	AV4516	Ceci est un test	<p>Ceci est un test</p>	1	2021-11-11 14:16:26	2	<p>Ceci est un test</p>	f	entry_618d25ba83f858.18926780
\.


--
-- Data for Name: departement; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.departement (id, nom, description, ceated_at) FROM stdin;
2	Administration	Administration des utilisateurs	2021-09-09 12:09:47
3	DEPARTEMENT SECURITE NATIONALE	DEPARTEMENT SECURITE NATIONALE	2021-09-13 08:10:52
\.


--
-- Data for Name: departement_director; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.departement_director (id, departement_id, utilisateur_id, created_at, last_update, is_revoked) FROM stdin;
\.


--
-- Data for Name: entite; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.entite (id, affaire_id, description, description2, role, cat, created_at, main_picture, resume, role_final, rapport_final, type, nom, prenom, date_naissance, sexe, num_passport, num_carte, nationalite, categorie, immatriculation, taille, situation_matri, adresse, other_infos) FROM stdin;
4	3	test	fwwf	0	\N	2021-10-26 12:41:29	icon-default.png	<p><b>Bonjour&nbsp;<span>[[3]]</span>&nbsp;ceci est un test&nbsp;<span>[[3]].</span></b></p>\r\n\r\n<p><b>wddw</b></p>	\N	\N	Per	test	fwwf	1995-05-31	i	\N	\N	\N	\N	\N	\N	\N	\N	\N
3	3	MOHAMED KASSIM	FAHARDINE	1	\N	2021-10-26 07:32:47	icon-default.png	<p><span>[[4]]</span>&nbsp; Suite à une vidéo publié sur la page Facebook du dénommé FAFA NDAMY&nbsp;<span>[[4]]</span>&nbsp; comme nom du profil, patron du restaurant &laquo;The Best 269&raquo;, on le voit asseoir sur une voiture, détenant et manipulant un pistolet automatique (PA) de 9mm de marque italien. Sur ce même compte encore, on le retrouve sur un de ses photos publiaient, posant sur son épaule un fusil à pompe de calibre 12 donc ceci a suscité à l&rsquo;ouverture&nbsp;<span>[[4]]</span> d&rsquo;une enquête de renseignement à son égard.</p>	\N	\N	Per	MOHAMED KASSIM	FAHARDINE	\N	h	\N	\N	Comores	\N	\N	\N	\N	\N	\N
12	3	sqsqs	users	1	\N	2021-10-27 15:15:10	61796cfebb02d.png	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	\N	\N	Per	sqsqs	users	1993-03-04	i	EB166565	\N	\N	\N	\N	\N	\N	\N	\N
13	3	abdou	Echo	3	\N	2021-10-28 15:56:26	617ac82a2595d.png	<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Lectus proin nibh nisl condimentum id. Arcu vitae elementum curabitur vitae nunc sed. Eget mi proin sed libero enim sed faucibus turpis in. Diam quis enim lobortis scelerisque. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Sed adipiscing diam donec adipiscing tristique risus nec. Nulla facilisi nullam vehicula ipsum a arcu cursus. Etiam non quam lacus suspendisse faucibus interdum posuere. Sed risus ultricies tristique nulla aliquet enim. At lectus urna duis convallis convallis tellus id interdum velit. Eu feugiat pretium nibh ipsum consequat nisl. Dolor sit amet consectetur adipiscing elit. Quis varius quam quisque id. Curabitur vitae nunc sed velit dignissim sodales ut eu. Purus gravida quis blandit turpis cursus. Aliquet nibh praesent tristique magna sit amet purus. Viverra orci sagittis eu volutpat odio facilisis mauris sit amet. Orci ac auctor augue mauris augue.</p>\r\n\r\n<p style="text-align:justify">Mi proin sed libero enim. A condimentum vitae sapien pellentesque habitant morbi. Gravida rutrum quisque non tellus orci ac auctor augue mauris. Turpis nunc eget lorem dolor sed viverra. Facilisis sed odio morbi quis commodo odio aenean. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Amet facilisis magna etiam tempor orci eu lobortis. Eget duis at tellus at urna condimentum mattis. Purus viverra accumsan in nisl nisi. Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. Vitae sapien pellentesque habitant morbi tristique senectus et netus. Adipiscing bibendum est ultricies integer quis auctor. Nec ultrices dui sapien eget mi proin sed. Amet cursus sit amet dictum. Aliquet nec ullamcorper sit amet risus. Viverra nibh cras pulvinar mattis nunc sed. Laoreet id donec ultrices tincidunt arcu non sodales. Nisl nisi scelerisque eu ultrices. Vitae justo eget magna fermentum.</p>\r\n\r\n<p style="text-align:justify">Lacus luctus accumsan tortor posuere ac ut. Semper feugiat nibh sed pulvinar. Eu sem integer vitae justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. Mauris a diam maecenas sed enim ut sem viverra. Laoreet sit amet cursus sit amet dictum. Fringilla urna porttitor rhoncus dolor. Sit amet aliquam id diam maecenas. Amet consectetur adipiscing elit pellentesque habitant morbi. Morbi leo urna molestie at elementum eu. Fermentum odio eu feugiat pretium nibh. Sed cras ornare arcu dui. Cras semper auctor neque vitae tempus quam pellentesque nec nam.</p>	\N	\N	Per	abdou	Echo	1993-05-13	i	EC46587845	\N	\N	\N	\N	\N	2	\N	\N
14	3	Auctor amet	ullamcorper	3	\N	2021-10-30 12:51:29	617d3fd11be99.png	<p>Mi proin sed libero enim. A condimentum vitae sapien pellentesque habitant morbi. Gravida rutrum quisque non tellus orci ac auctor augue mauris. Turpis nunc eget lorem dolor sed viverra. Facilisis sed odio morbi quis commodo odio aenean. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Amet facilisis magna etiam tempor orci eu lobortis. Eget duis at tellus at urna condimentum mattis. Purus viverra accumsan in nisl nisi.&nbsp;[[3]]&nbsp;Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. Vitae sapien pellentesque habitant morbi tristique senectus et netus. Adipiscing bibendum est ultricies integer quis auctor. Nec ultrices dui sapien eget mi proin sed. Amet cursus sit amet dictum. Aliquet nec ullamcorper sit amet risus.</p>	\N	\N	Per	Auctor amet	ullamcorper	2021-10-30	h	\N	\N	\N	\N	\N	\N	\N	Coulée	\N
\.


--
-- Data for Name: envenement; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.envenement (id, affaire_id, type_evenement, localisation, start_at, duration, resume, end_at, geo_localisation, titre) FROM stdin;
2	3	0	Centre	2021-10-28 18:20:00	\N	<p>&nbsp;Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	\N	\N	Rencontre
3	3	3	Inconnu	2021-10-28 23:38:00	\N	<p><span>[[3]]</span>&nbsp; el elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Sed adipiscing diam donec adipiscing tristique risus nec.&nbsp;&nbsp;<span>[[12]]&nbsp;At lectus urna duis convallis convallis tellus id interdum velit. Eu feugiat pretium nibh ipsum consequat nisl. Dolor sit amet consectetur adipiscing elit.<span>[[13]]</span> Quis varius quam quisque id. Curabitur vitae nunc sed velit dignissim sodales ut eu. Purus gravida quis blandit turpis cursus&nbsp;<span>[[13]]</span></span>&nbsp;</p>	\N	\N	d3d
\.


--
-- Data for Name: envenement_entites; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.envenement_entites (envenement_id, entites_id) FROM stdin;
2	4
2	3
3	12
3	13
\.


--
-- Data for Name: envenement_utilisateur; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.envenement_utilisateur (envenement_id, utilisateur_id) FROM stdin;
2	4
\.


--
-- Data for Name: login_failure; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.login_failure (id, username, created_at, client_ip) FROM stdin;
1	edw234fr3f	2021-11-10 16:03:05	::1
2	test	2021-11-10 16:03:25	::1
3	wqidoqw	2021-11-10 16:06:16	::1
4	toto	2021-11-10 16:06:27	::1
5	sysadmin	2021-11-10 16:06:32	::1
6	posdwpdop	2021-11-10 16:24:07	192.168.8.109
7	sysadmin	2021-11-11 07:51:37	::1
8	sysadmin	2021-11-11 07:51:41	::1
\.


--
-- Data for Name: personne_telephone; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.personne_telephone (personne_id, telephone_id) FROM stdin;
3	3
4	4
4	5
12	15
12	17
\.


--
-- Data for Name: piece_jointe; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.piece_jointe (id, courrier_id, filename, created_at) FROM stdin;
91	93	618d25ba83fe6.pdf	2021-11-11 14:16:26
\.


--
-- Data for Name: preuve; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.preuve (id, evenement_id, nom, description, created_at, files) FROM stdin;
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
4	616561	\N
5	0120308	\N
16	4444455	61796cfeba90c.csv
15	4444455	61796cfeb9d17.xlsx
17	616561	\N
3	120308	\N
\.


--
-- Data for Name: user_session; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.user_session (id, utilisateur_id, start_at, end_at, session_id) FROM stdin;
41	2	2021-11-09 17:05:03	2021-11-09 17:05:15	eeklk93po4d9q7kketvgo52ht9
42	5	2021-11-09 17:08:59	2021-11-09 17:18:10	935afdboki399v74e33gomet9s
43	2	2021-11-10 14:35:27	2021-11-10 14:47:24	92hskk4crsfa1090li2j6f4emg
44	2	2021-11-10 15:42:11	2021-11-10 15:42:13	d1gjvakhon55bgtfsp37r7cg1o
45	2	2021-11-10 16:42:47	\N	ba5lsad491qe1nilagqb5ho4a3
47	2	\N	2021-11-11 07:51:03	84bqtuckoekga8d0o1ialirpp7
48	2	2021-11-11 07:51:09	2021-11-11 07:51:14	0lnq7cmlc7jipeeo4uijk3dgs0
49	2	2021-11-11 07:52:27	2021-11-11 11:22:15	i5uhibgd1riq52441lsgebdvgg
50	2	2021-11-11 11:22:18	\N	sb7u8kpjs62r72r53glbh4mntn
\.


--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.utilisateur (id, departement_id, nom, prenom, niveau_accreditation, numero_matricule, username, password, salt, create_at, is_active, roles, last_login_for_user, last_login, is_deleted) FROM stdin;
2	2	Admin	Systeme	1	BHL-DNE-1631189387-344465	sysadmin	$argon2id$v=19$m=65536,t=4,p=1$NXl8rNq5Ny+uduMvH9ustw$8QXewOSFjf05E5x7P7QN4sAjaA7vLLJskaSpvuKiQ6w	9fdn9szc4ls8g800wwkg84wgwows8k8	2021-09-09 12:09:47	t	a:8:{i:0;s:9:"ROLE_USER";i:1;s:13:"USER_VIEW_DEP";i:2;s:10:"ROLE_ADMIN";i:3;s:10:"ROLE_ADMIN";i:4;s:12:"ROLE_CREATOR";i:5;s:13:"USER_VIEW_AFF";i:6;s:16:"ROLE_SUPER_ADMIN";i:7;s:13:"ROLE_COURRIER";}	2021-10-22 16:38:00	2021-10-25 16:21:15	f
3	\N	Said	Mohamed	1	BHL-DNE-1631189546-487400	said.mo	$argon2id$v=19$m=65536,t=4,p=1$PlL/Ggc1PmfrYz15dFLcIg$pQVOcPULAu1PwO+jn0vtvt4oj9bF9DSb1LKbDPZLKCM	g8bn9xmnt68s888kws8cg8okoc84cc4	2021-09-09 12:12:26	t	a:1:{i:0;s:13:"ROLE_COURRIER";}	2021-10-21 09:12:16	2021-10-26 06:24:29	f
4	3	OUSSAMA	T	3	BHL-DNE-1631520672-980818	oussamat	$argon2id$v=19$m=65536,t=4,p=1$CB8bDOLSLhchfeTSX3HP+g$gVR84wC9pkJrBVuqzlSHqPxK4QlQJIvCKmMR5Hbc4iI	eo5wuejtgdw8wwwww484c0gkkww8kg0	2021-09-13 08:11:12	t	a:4:{i:0;s:9:"ROLE_USER";i:1;s:13:"USER_VIEW_DEP";i:2;s:12:"ROLE_CREATOR";i:3;s:13:"USER_VIEW_AFF";}	2021-09-21 08:37:46	2021-09-24 08:07:13	f
5	3	Joel	Agbessi	3	BHL-DNE-1635178987-169257	joel.agbessi	$argon2id$v=19$m=65536,t=4,p=1$+nNyTWmRR33Xm6hd5r6hvQ$MT666sXGBOz5F4N12FNiLJzr9gjWtyTCReScL+G8UVs	idyenoyfenksck8kc4kkc0og4s0k4s8	2021-10-25 16:23:07	t	a:4:{i:1;s:9:"ROLE_USER";i:2;s:13:"USER_VIEW_DEP";i:3;s:12:"ROLE_CREATOR";i:4;s:13:"USER_VIEW_AFF";}	2021-11-05 10:08:03	2021-11-05 14:08:53	f
\.


--
-- Data for Name: utilisateur_consultation; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.utilisateur_consultation (id, affaire_id, utilisateur_id, created_by_id, created_at, expire_at, is_revoked, statut) FROM stdin;
\.


--
-- Name: affaire_directed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.affaire_directed_id_seq', 5, true);


--
-- Name: affaire_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.affaire_id_seq', 5, true);


--
-- Name: affaire_utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.affaire_utilisateur_id_seq', 5, true);


--
-- Name: affectation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.affectation_id_seq', 1, false);


--
-- Name: alias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.alias_id_seq', 12, true);


--
-- Name: attachements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.attachements_id_seq', 41, true);


--
-- Name: courrier_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.courrier_id_seq', 93, true);


--
-- Name: departement_director_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.departement_director_id_seq', 1, false);


--
-- Name: departement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.departement_id_seq', 3, true);


--
-- Name: entite_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.entite_id_seq', 14, true);


--
-- Name: envenement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.envenement_id_seq', 3, true);


--
-- Name: login_failure_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.login_failure_id_seq', 8, true);


--
-- Name: piece_jointe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.piece_jointe_id_seq', 91, true);


--
-- Name: preuve_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.preuve_id_seq', 1, false);


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

SELECT pg_catalog.setval('public.telephone_id_seq', 17, true);


--
-- Name: user_session_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.user_session_id_seq', 82, true);


--
-- Name: utilisateur_consultation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.utilisateur_consultation_id_seq', 1, false);


--
-- Name: utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.utilisateur_id_seq', 5, true);


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
-- Name: preuve preuve_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.preuve
    ADD CONSTRAINT preuve_pkey PRIMARY KEY (id);


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
-- Name: assignment_unique; Type: INDEX; Schema: public; Owner: admin
--

CREATE UNIQUE INDEX assignment_unique ON public.affaire_utilisateur USING btree (affaire_id, utilisateur_id);


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
-- Name: idx_238df9e0fd02f13; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX idx_238df9e0fd02f13 ON public.preuve USING btree (evenement_id);


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

