-- -----------------------------------------------------
-- Table `USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `USERS` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(25) NOT NULL,
  `hash` VARCHAR(255) NOT NULL,
  `mail` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(12) NOT NULL,
  `status` ENUM('Member', 'Administrator', 'Author') NOT NULL,
  `score` INT NOT NULL,
  PRIMARY KEY (`idUser`));

INSERT INTO `USERS` (`pseudo`, `hash`, `mail`, `phone`, `status`, `score`) VALUES
('C4LL_M3_R00T_B1TCH', '93ee930d97e38d57a68X41b46ebec6e961a', 'super.user@telecom-paris.fr', '0123456789', 'Administrator', '9999');

-- -----------------------------------------------------
-- Table `CHALLENGES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CHALLENGES` (
  `idChall` int NOT NULL AUTO_INCREMENT,
  `type` ENUM('dev', 'web', 'reverse', 'forensics', 'crypto', 'reseau') NOT NULL,
  `title` VARCHAR(35) NOT NULL,
  `statement` LONGTEXT NOT NULL,
  `points` int NOT NULL,
  `difficulty` ENUM('Accessible', 'Intermédiaire', 'Difficile', 'Hardcore') NOT NULL,
  `flag` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idChall`));

INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'WEB', "Retrouvez le flag. C\'est facile lol" , 5, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'WEB v2', "Retrouvez le flag. C\'est moins facile lol" , 10, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'WEB v3', "Retrouvez le flag. C\'est moins facile lol" , 25, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'WEB v4', "Retrouvez le flag. C\'est moins facile lol" , 45, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'WEB v5', "Retrouvez le flag. C\'est moins facile lol" , 60, 'Difficile', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'WEB v6', "Retrouvez le flag. C\'est moins facile lol" , 75, 'Hardcore', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'WEB v7', "Retrouvez le flag. C\'est moins facile lol" , 80, 'Hardcore', 'ctpludifficil', 'https://google.fr');

INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('crypto', 'CRYPTO', "Retrouvez le flag. C\'est facile lol" , 5, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('crypto', 'CRYPTO v2', "Retrouvez le flag. C\'est moins facile lol" , 10, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('crypto', 'CRYPTO v3', "Retrouvez le flag. C\'est moins facile lol" , 25, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('crypto', 'CRYPTO v4', "Retrouvez le flag. C\'est moins facile lol" , 45, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('crypto', 'CRYPTO v5', "Retrouvez le flag. C\'est moins facile lol" , 60, 'Difficile', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('crypto', 'CRYPTO v6', "Retrouvez le flag. C\'est moins facile lol" , 75, 'Hardcore', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('crypto', 'CRYPTO v7', "Retrouvez le flag. C\'est moins facile lol" , 80, 'Hardcore', 'ctpludifficil', 'https://google.fr');

INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('forensics', 'FORENSICS', "Retrouvez le flag. C\'est facile lol" , 5, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('forensics', 'FORENSICS v2', "Retrouvez le flag. C\'est moins facile lol" , 10, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('forensics', 'FORENSICS v3', "Retrouvez le flag. C\'est moins facile lol" , 25, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('forensics', 'FORENSICS v4', "Retrouvez le flag. C\'est moins facile lol" , 45, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('forensics', 'FORENSICS v5', "Retrouvez le flag. C\'est moins facile lol" , 60, 'Difficile', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('forensics', 'FORENSICS v6', "Retrouvez le flag. C\'est moins facile lol" , 75, 'Hardcore', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('forensics', 'FORENSICS v7', "Retrouvez le flag. C\'est moins facile lol" , 80, 'Hardcore', 'ctpludifficil', 'https://google.fr');

INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('dev', 'DEV', "Retrouvez le flag. C\'est facile lol" , 5, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('dev', 'DEV v2', "Retrouvez le flag. C\'est moins facile lol" , 10, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('dev', 'DEV v3', "Retrouvez le flag. C\'est moins facile lol" , 25, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('dev', 'DEV v4', "Retrouvez le flag. C\'est moins facile lol" , 45, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('dev', 'DEV v5', "Retrouvez le flag. C\'est moins facile lol" , 60, 'Difficile', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('dev', 'DEV v6', "Retrouvez le flag. C\'est moins facile lol" , 75, 'Hardcore', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('dev', 'DEV v7', "Retrouvez le flag. C\'est moins facile lol" , 80, 'Hardcore', 'ctpludifficil', 'https://google.fr');

INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('reseau', 'RESEAU', "Retrouvez le flag. C\'est facile lol" , 5, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('reseau', 'RESEAU v2', "Retrouvez le flag. C\'est moins facile lol" , 10, 'Accessible', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('reseau', 'RESEAU v3', "Retrouvez le flag. C\'est moins facile lol" , 25, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('reseau', 'RESEAU v4', "Retrouvez le flag. C\'est moins facile lol" , 45, 'Intermédiaire', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('reseau', 'RESEAU v5', "Retrouvez le flag. C\'est moins facile lol" , 60, 'Difficile', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('reseau', 'RESEAU v6', "Retrouvez le flag. C\'est moins facile lol" , 75, 'Hardcore', 'ctpludifficil', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('reseau', 'RESEAU v7', "Retrouvez le flag. C\'est moins facile lol" , 80, 'Hardcore', 'ctpludifficil', 'https://google.fr');



-- -----------------------------------------------------
-- Table `AUTHORS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AUTHORS` (
  `idChall` int NOT NULL,
  `idUser` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idChall`, `idUser`));

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('1', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('1', '2');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('2', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('3', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('4', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('5', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('6', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('7', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('8', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('9', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('10', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('11', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('12', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('13', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('14', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('15', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('16', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('17', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('18', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('19', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('20', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('21', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('22', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('23', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('24', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('25', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('26', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('27', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('28', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('29', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('30', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('31', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('32', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('33', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('34', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('35', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('36', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('37', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('38', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('39', '1');

INSERT INTO `AUTHORS` (`idChall`,`idUser`) VALUES
('40', '1');

-- -----------------------------------------------------
-- Table `VALIDATIONS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VALIDATIONS` (
  `idUser` VARCHAR(25) NOT NULL,
  `idChall` int NOT NULL,
  `validationDate` DATETIME NOT NULL,
  PRIMARY KEY (`idUser`, `idChall`));
