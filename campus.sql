CREATE TABLE ad (
    id integer NOT NULL AUTO_INCREMENT,
    description text NOT NULL,
    owner integer NOT NULL,
    cheched boolean DEFAULT false NOT NULL,
    ts time NOT NULL,
    location integer,
    PRIMARY KEY (id)
);

CREATE TABLE ad_cat (
    ad integer NOT NULL,
    cat integer NOT NULL
);

CREATE TABLE address (
    city character varying(64) NOT NULL,
    street character varying(128) NOT NULL,
    house character varying(16) NOT NULL,
    id integer NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id)
);

CREATE TABLE area (
    sid integer NOT NULL,
    aid integer NOT NULL,
    start date NOT NULL,
    exp date
);

CREATE TABLE category (
    id integer NOT NULL AUTO_INCREMENT,
    description text,
    PRIMARY KEY (id)
);

CREATE TABLE comment (
    aid integer NOT NULL,
    uid integer NOT NULL,
    ts time NOT NULL,
    data text NOT NULL
);

CREATE TABLE favorite (
    aid integer NOT NULL,
    uid integer NOT NULL
);

CREATE TABLE orders (   #CHANGED THE NAME FROM RESERVED KEYWORD
    id integer NOT NULL AUTO_INCREMENT,
    owner integer NOT NULL,
    description text NOT NULL,
    serv integer NOT NULL,
    loc integer NOT NULL,
    start time,
    exp time,
    state character varying(16) DEFAULT 'waiting' NOT NULL,
    ts time NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE photo (
    id integer NOT NULL AUTO_INCREMENT,
    path character varying(256) NOT NULL,
    ad integer NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE service (
    id integer NOT NULL AUTO_INCREMENT,
    name character varying(128) NOT NULL,
    description text NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE staff (
    uid integer NOT NULL,
    sid integer NOT NULL,
    exp date,
    start date NOT NULL,
    id integer NOT NULL AUTO_INCREMENT,
    post character varying(256) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE users (     #CHANGED THE NAME FROM RESERVED KEYWORD
    id integer NOT NULL AUTO_INCREMENT,
    name character varying(64) NOT NULL,
    surname character varying(64) NOT NULL,
    patronymic character varying(64),
    login character varying(64) NOT NULL,
    passwd character varying(64) NOT NULL,
    mail character varying(64) NOT NULL,
    home integer NOT NULL,
    room integer,
    role character varying(16) DEFAULT 'user' NOT NULL,
    bdate date,
    floor integer,
    gender character(1),
    picture character varying(256),
    PRIMARY KEY (id)
);
    
ALTER TABLE area
    ADD CONSTRAINT area_pkey PRIMARY KEY (sid, aid);
    
ALTER TABLE ad_cat
    ADD CONSTRAINT a_fkey FOREIGN KEY (ad) REFERENCES ad(id);

ALTER TABLE ad
    ADD CONSTRAINT ads_location_fkey FOREIGN KEY (location) REFERENCES address(id);

ALTER TABLE area
    ADD CONSTRAINT afa_key FOREIGN KEY (aid) REFERENCES address(id);

ALTER TABLE area
    ADD CONSTRAINT afs_key FOREIGN KEY (sid) REFERENCES staff(id);

ALTER TABLE ad_cat
    ADD CONSTRAINT c_fkey FOREIGN KEY (cat) REFERENCES category(id);

ALTER TABLE photo
    ADD CONSTRAINT p_fkey FOREIGN KEY (ad) REFERENCES ad(id);

ALTER TABLE comment
    ADD CONSTRAINT comments_aid_fkey FOREIGN KEY (aid) REFERENCES ad(id);

ALTER TABLE comment
    ADD CONSTRAINT comments_uid_fkey FOREIGN KEY (uid) REFERENCES users(id);

ALTER TABLE favorite
    ADD CONSTRAINT fad_fkey FOREIGN KEY (aid) REFERENCES ad(id);

ALTER TABLE favorite
    ADD CONSTRAINT fus_fkey FOREIGN KEY (uid) REFERENCES users(id);

ALTER TABLE orders
    ADD CONSTRAINT loc_fkey FOREIGN KEY (loc) REFERENCES address(id);

ALTER TABLE orders
    ADD CONSTRAINT ord_fkey FOREIGN KEY (owner) REFERENCES users(id);

ALTER TABLE ad
    ADD CONSTRAINT owner_fkey FOREIGN KEY (owner) REFERENCES users(id);

ALTER TABLE orders
    ADD CONSTRAINT serv_fkey FOREIGN KEY (serv) REFERENCES service(id);

ALTER TABLE staff
    ADD CONSTRAINT staff_sid_fkey FOREIGN KEY (sid) REFERENCES service(id);

ALTER TABLE staff
    ADD CONSTRAINT staff_uid_fkey FOREIGN KEY (uid) REFERENCES users(id);

ALTER TABLE users
    ADD CONSTRAINT users_home_id_fkey FOREIGN KEY (home) REFERENCES address(id);