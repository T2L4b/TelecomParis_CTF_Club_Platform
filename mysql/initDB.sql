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
  `type` ENUM('dev', 'web', 'reverse', 'forensics', 'crypto', 'networking') NOT NULL,
  `title` VARCHAR(35) NOT NULL,
  `statement` LONGTEXT NOT NULL,
  `points` int NOT NULL,
  `difficulty` ENUM('Accessible', 'Intermédiaire', 'Difficile', 'Hardcore') NOT NULL,
  `flag` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idChall`));

INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'Code source', "Retrouvez le flag. C\'est facile lol" , 5, 'Accessible', 'ctvrementfacillol', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'Code source v2', "Retrouvez le flag. C\'est moins facile lol" , 50, 'Difficile', 'ctpludifficil', 'https://google.fr');



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

-- -----------------------------------------------------
-- Table `VALIDATIONS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VALIDATIONS` (
  `idUser` VARCHAR(25) NOT NULL,
  `idChall` int NOT NULL,
  `validationDate` DATETIME NOT NULL,
  PRIMARY KEY (`idUser`, `idChall`));
