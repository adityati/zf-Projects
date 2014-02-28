CREATE DATABASE zf_projects ;

CREATE TABLE guestbook (
    first_name VARCHAR NOT NULL,
    last_name VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL DEFAULT '',
    comment TEXT NOT NULL,
    created_timestamp TIMESTAMP
    guest_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT
);
