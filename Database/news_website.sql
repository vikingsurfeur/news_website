DROP DATABASE IF EXISTS news_website;
CREATE DATABASE news_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE article (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    content TEXT(20000) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE comment (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    content TEXT(20000) NOT NULL,
    article_id INT(10) NOT NULL,
    FOREIGN KEY (article_id)
        REFERENCES article(id)
        ON DELETE CASCADE
)ENGINE=InnoDB;

ALTER TABLE article ADD date DATETIME NOT NULL DEFAULT NOW();
ALTER TABLE article MODIFY date DATE NOT NULL DEFAULT NOW();

ALTER TABLE article ADD priority TINYINT;
ALTER TABLE article MODIFY priority TINYINT NOT NULL DEFAULT 0;

ALTER TABLE comment ADD date DATE NOT NULL DEFAULT NOW();

INSERT INTO article (id, title, content)
VALUES (1, 'Comment faire du pain avec ses pieds ?', 'Avec les mains, mais avec tendresse');

INSERT INTO article (id, title, content)
VALUES (2, 'Comment faire des pates avec sa tête ?', 'Avec ses yeux, mais avec des lunettes');