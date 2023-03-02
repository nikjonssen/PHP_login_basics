CREATE TABLE users(
	users_id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    users_name varchar(128) NOT NULL,
    users_email varchar(128) NOT NULL,
    users_uid varchar(128) NOT NULL,
    users_pwd varchar(128) NOT NULL
);

INSERT INTO users (users_name, users_email, users_uid, users_pwd)
VALUES ("name", "email", "username", "password")