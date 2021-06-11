DROP DATABASE IF EXISTS news_website;
CREATE DATABASE news_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE article (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL
);

CREATE TABLE comment (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    article_id INT(10) NOT NULL,
    FOREIGN KEY (article_id)
        REFERENCES article(id)
        ON DELETE CASCADE
);