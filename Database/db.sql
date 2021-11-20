DROP Database IF EXISTS sociopedia;
create database sociopedia;

-- users table
CREATE TABLE `sociopedia`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `full_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `profile_picture` VARCHAR(100) NOT NULL,
  `rating` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

--   posts table
CREATE TABLE `sociopedia`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `author` INT NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `images` VARCHAR(200),
  `content` TEXT NOT NULL,
  `categories` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `author_idx` (`author` ASC) VISIBLE,
  CONSTRAINT `author`
    FOREIGN KEY (`author`)
    REFERENCES `sociopedia`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    

-- Categories table
CREATE TABLE `sociopedia`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));



