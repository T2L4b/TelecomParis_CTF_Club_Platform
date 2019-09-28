-- -----------------------------------------------------
-- Table `USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `USERS` (
  `pseudo` VARCHAR(25) NOT NULL,
  `hash` VARCHAR(255) NOT NULL,
  `mail` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(12) NOT NULL,
  `status` ENUM('Member', 'Administrator', 'Author') NOT NULL,
  PRIMARY KEY (`pseudo`));

INSERT INTO `USERS` (`pseudo`, `hash`, `mail`, `phone`, `status`, `score`) VALUES
('C4LL_M3_R00T_B1TCH', '93ee930d97e38d57a68X41b46ebec6e961a', 'titouan.veauvy@telecom-paristech.fr', '0123456789', 'Administrator', '9999');

-- -----------------------------------------------------
-- Table `CHALLENGES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CHALLENGES` (
  `idChall` int NOT NULL AUTO_INCREMENT,
  `type` ENUM('web', 'crypto') NOT NULL,
  `title` VARCHAR(35) NOT NULL,
  `statement` LONGTEXT NOT NULL,
  `points` int NOT NULL,
  `difficulty` ENUM('Accessible', 'Intermédiaire', 'Difficile', 'Hardcore') NOT NULL,
  `flag` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idChall`));

INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'Code source', 'Retrouvez le flag. C\'est facile lol' , '5', 'Accessible', 'ctvrementfacillol', 'https://google.fr');
INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `url`) VALUES
('web', 'Code source v2', 'Retrouvez le flag. C\'est moins facile lol' , '50', 'Difficile', 'ctpludifficil', 'https://google.fr');



-- -----------------------------------------------------
-- Table `AUTHORS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AUTHORS` (
  `idChall` int NOT NULL,
  `pseudo` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idChall`, `pseudo`));

INSERT INTO `AUTHORS` (`idChall`,`pseudo`) VALUES
('1', 'JackPepper');

INSERT INTO `AUTHORS` (`idChall`,`pseudo`) VALUES
('1', 'T2lab');

INSERT INTO `AUTHORS` (`idChall`,`pseudo`) VALUES
('2', 'hey hey');

-- -----------------------------------------------------
-- Table `VALIDATIONS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VALIDATIONS` (
  `pseudo` VARCHAR(25) NOT NULL,
  `idChall` int NOT NULL,
  PRIMARY KEY (`pseudo`, `idChall`));
