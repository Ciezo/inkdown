-- Create and establish entities

CREATE TABLE IF NOT EXISTS ADMIN(
    admin_id        INT             NOT NULL auto_increment, 
    username        VARCHAR(100)    NOT NULL, 
    password        VARCHAR(100)    NOT NULL, 

    PRIMARY KEY (admin_id)
);

CREATE TABLE IF NOT EXISTS USERS(
    user_id         INT             NOT NULL auto_increment,
    first_name      VARCHAR(255)    NOT NULL,
    last_name       VARCHAR(255)    NOT NULL,
    birthday        VARCHAR(150)    NOT NULL,
    username        VARCHAR(100)    NOT NULL,
    password        VARCHAR(100)    NOT NULL,

    PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS NOTES(
    note_id     INT                 NOT NULL auto_increment,
    user_id     INT                 NOT NULL,
    author      VARCHAR(255)        NOT NULL,
    title       VARCHAR(255)        NOT NULL,
    body        LONGTEXT            NOT NULL,
    date_posted VARCHAR(100)        NOT NULL,

    PRIMARY KEY (note_id),
    FOREIGN KEY (user_id) REFERENCES USERS(user_id)
);

CREATE TABLE IF NOT EXISTS TRASH(
    trash_id    INT                 NOT NULL auto_increment,
    note_id     INT                 NOT NULL, 
    user_id     INT                 NOT NULL, 
    author      VARCHAR(255)        NOT NULL,
    title       VARCHAR(255)        NOT NULL,
    body        LONGTEXT            NOT NULL,
    date_posted VARCHAR(100)        NOT NULL,

    PRIMARY KEY (trash_id),
    FOREIGN KEY (user_id) REFERENCES USERS(user_id)
);