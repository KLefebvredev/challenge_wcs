USE wcs;

CREATE TABLE argonaute (
    id INT(1) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(32) NOT NULL,
) ENGINE=INNODB

INSERT INTO argonaute (nom) VALUES
('Eleftheria'),
('Gennadios'),
('Lysimachos');