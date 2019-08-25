-- -----------------------------------------------------
-- Table `USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `USERS` (
  `pseudo` VARCHAR(25) NOT NULL,
  `hash` VARCHAR(255) NOT NULL,
  `mail` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(12) NOT NULL,
  `status` ENUM('Member', 'Administrator', 'Author') NOT NULL,
  `score` INT NOT NULL,
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
  `author` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idChall`));

INSERT INTO `CHALLENGES` (`type`,`title`,`statement`,`points`,`difficulty`, `flag`, `author`) VALUES
('web', 'Code source', 'La première chose à faire' , '5', 'Difficile', 'ctvrementfacillol', 'JackPepper');
