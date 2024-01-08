-- Active: 1704309211331@@127.0.0.1@3306@wikizone
CREATE DATABASE wikizone;

CREATE TABLE roles (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);


CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    userName VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    profile VARCHAR(255),
    role_id int ,
    Foreign Key (role_id) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE
); 

CREATE TABLE categories (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);

CREATE TABLE tags (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);

CREATE TABLE wikis (
    id int PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    content VARCHAR(5000),
    date date  DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50),
    photo VARCHAR(255),
    writer int ,
    Foreign Key (writer) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    category_id int,
    Foreign Key (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE wiki_tags (
    wiki_id int,
    tag_id int,
    PRIMARY KEY (wiki_id, tag_id),
    Foreign Key (wiki_id) REFERENCES wikis(id) ON DELETE CASCADE ON UPDATE CASCADE,
    Foreign Key (tag_id) REFERENCES tags(id) ON DELETE CASCADE ON UPDATE CASCADE
);



