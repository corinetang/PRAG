-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 15 Juin 2015 à 15:15
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `siphif`
--
CREATE DATABASE IF NOT EXISTS `siphif` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siphif`;

-- --------------------------------------------------------


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        id_Groupe int (11) Auto_increment  NOT NULL ,
        libelle   Varchar (25) ,
        PRIMARY KEY (id_Groupe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evaluation
#------------------------------------------------------------

CREATE TABLE Evaluation(
        id_Evaluation int (11) Auto_increment  NOT NULL ,
        Valide        Bool ,
        id_Stages     Int ,
        PRIMARY KEY (id_Evaluation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id_user           int (11) Auto_increment  NOT NULL ,
        Identifiant       Varchar (25) ,
        nom               Varchar (25) ,
        prenom            Varchar (25) ,
        mdp               Varchar (25) ,
        NbSemestre        Int ,
        moyenneClassement Int ,
        dateDeNaissance   Date ,
        RangClassement    Int ,
        id_Groupe         Int ,
        id_Choix          Int ,
        id_Filiere        Int ,
        PRIMARY KEY (id_user )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Stages
#------------------------------------------------------------

CREATE TABLE Stages(
        id_Stages   int (11) Auto_increment  NOT NULL ,
        NbPoste     Int ,
        maitreStage Varchar (25) ,
        dateDebut   Date ,
        dateFin     Date ,
        id_Filiere  Int ,
        id_Service  Int ,
        PRIMARY KEY (id_Stages )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Choix
#------------------------------------------------------------

CREATE TABLE Choix(
        id_Choix   int (11) Auto_increment  NOT NULL ,
        estAccepte Bool ,
        rang       Int ,
        PRIMARY KEY (id_Choix )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Service
#------------------------------------------------------------

CREATE TABLE Service(
        id_Service       int (11) Auto_increment  NOT NULL ,
        NomService       Varchar (25) ,
        id_Etablissement Int ,
        PRIMARY KEY (id_Service )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Etablissement
#------------------------------------------------------------

CREATE TABLE Etablissement(
        id_Etablissement int (11) Auto_increment  NOT NULL ,
        NomEtablissement Varchar (25) ,
        PRIMARY KEY (id_Etablissement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Filiere
#------------------------------------------------------------

CREATE TABLE Filiere(
        id_Filiere int (11) Auto_increment  NOT NULL ,
        NomFiliere Varchar (25) ,
        PRIMARY KEY (id_Filiere )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Questions
#------------------------------------------------------------

CREATE TABLE Questions(
        id_Question int (11) Auto_increment  NOT NULL ,
        Libelle     Char (25) ,
        PRIMARY KEY (id_Question )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reponse
#------------------------------------------------------------

CREATE TABLE Reponse(
        id_reponse          int (11) Auto_increment  NOT NULL ,
        commentaire_Reponse Varchar (25) ,
        PRIMARY KEY (id_reponse )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User_Evaluation
#------------------------------------------------------------

CREATE TABLE User_Evaluation(
        id_Evaluation Int NOT NULL ,
        id_user       Int NOT NULL ,
        PRIMARY KEY (id_Evaluation ,id_user )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contient
#------------------------------------------------------------

CREATE TABLE contient(
        id_Evaluation Int NOT NULL ,
        id_Question   Int NOT NULL ,
        id_reponse    Int NOT NULL ,
        PRIMARY KEY (id_Evaluation ,id_Question ,id_reponse )
)ENGINE=InnoDB;

ALTER TABLE Evaluation ADD CONSTRAINT FK_Evaluation_id_Stages FOREIGN KEY (id_Stages) REFERENCES Stages(id_Stages);
ALTER TABLE User ADD CONSTRAINT FK_User_id_Groupe FOREIGN KEY (id_Groupe) REFERENCES Groupe(id_Groupe);
ALTER TABLE User ADD CONSTRAINT FK_User_id_Choix FOREIGN KEY (id_Choix) REFERENCES Choix(id_Choix);
ALTER TABLE User ADD CONSTRAINT FK_User_id_Filiere FOREIGN KEY (id_Filiere) REFERENCES Filiere(id_Filiere);
ALTER TABLE Stages ADD CONSTRAINT FK_Stages_id_Filiere FOREIGN KEY (id_Filiere) REFERENCES Filiere(id_Filiere);
ALTER TABLE Stages ADD CONSTRAINT FK_Stages_id_Service FOREIGN KEY (id_Service) REFERENCES Service(id_Service);
ALTER TABLE Service ADD CONSTRAINT FK_Service_id_Etablissement FOREIGN KEY (id_Etablissement) REFERENCES Etablissement(id_Etablissement);
ALTER TABLE User_Evaluation ADD CONSTRAINT FK_User_Evaluation_id_Evaluation FOREIGN KEY (id_Evaluation) REFERENCES Evaluation(id_Evaluation);
ALTER TABLE User_Evaluation ADD CONSTRAINT FK_User_Evaluation_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);
ALTER TABLE contient ADD CONSTRAINT FK_contient_id_Evaluation FOREIGN KEY (id_Evaluation) REFERENCES Evaluation(id_Evaluation);
ALTER TABLE contient ADD CONSTRAINT FK_contient_id_Question FOREIGN KEY (id_Question) REFERENCES Questions(id_Question);
ALTER TABLE contient ADD CONSTRAINT FK_contient_id_reponse FOREIGN KEY (id_reponse) REFERENCES Reponse(id_reponse);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
