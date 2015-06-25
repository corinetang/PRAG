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
CREATE DATABASE IF NOT EXISTS `siphif` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `siphif`;

-- --------------------------------------------------------


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        id_Groupe      int (11) Auto_increment  NOT NULL ,
        libelle_groupe Varchar (25) ,
        PRIMARY KEY (id_Groupe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evaluation
#------------------------------------------------------------

CREATE TABLE Evaluation(
        id_Evaluation     int (11) Auto_increment  NOT NULL ,
        Valide_evaluation Bool ,
        id_Stage          Int ,
        PRIMARY KEY (id_Evaluation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id_user                int (11) Auto_increment  NOT NULL ,
        identifiant_user       Varchar (25) ,
        nom_user               Varchar (25) ,
        prenom_user            Varchar (25) ,
        mdp_user               Varchar (25) ,
        NbSemestre_user        Int ,
        moyenneClassement_user Int ,
        dateDeNaissance_user   Varchar (11) ,
        RangClassement_user    Int ,
        mail_user              Varchar (25) ,
        numtel_user            Int ,
        id_Groupe              Int ,
        id_Filiere             Int ,
        PRIMARY KEY (id_user )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Stage
#------------------------------------------------------------

CREATE TABLE Stage(
        id_Stage        int (11) Auto_increment  NOT NULL ,
        NbPoste_stage   Int ,
        dateDebut_stage Date ,
        dateFin_stage   Date ,
        id_Filiere      Int ,
        id_Service      Int ,
        PRIMARY KEY (id_Stage )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Choix
#------------------------------------------------------------

CREATE TABLE Choix(
        id_Choix         int (11) Auto_increment  NOT NULL ,
        estAccepte_choix Bool ,
        rang_choix       Int ,
        id_user          Int ,
        id_Stage         Int ,
        PRIMARY KEY (id_Choix )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Service
#------------------------------------------------------------

CREATE TABLE Service(
        id_Service       int (11) Auto_increment  NOT NULL ,
        nom_service      Varchar (25) ,
        id_Etablissement Int ,
        PRIMARY KEY (id_Service )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Etablissement
#------------------------------------------------------------

CREATE TABLE Etablissement(
        id_Etablissement  int (11) Auto_increment  NOT NULL ,
        nom_etablissement Varchar (25) ,
        PRIMARY KEY (id_Etablissement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Filiere
#------------------------------------------------------------

CREATE TABLE Filiere(
        id_Filiere  int (11) Auto_increment  NOT NULL ,
        nom_filiere Varchar (25) ,
        PRIMARY KEY (id_Filiere )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Questions
#------------------------------------------------------------

CREATE TABLE Questions(
        id_Question      int (11) Auto_increment  NOT NULL ,
        Libelle_question Char (25) ,
        PRIMARY KEY (id_Question )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reponse
#------------------------------------------------------------

CREATE TABLE Reponse(
        id_reponse          int (11) Auto_increment  NOT NULL ,
        commentaire_reponse Varchar (25) ,
        PRIMARY KEY (id_reponse )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DES
#------------------------------------------------------------

CREATE TABLE DES(
        id_DES      int (11) Auto_increment  NOT NULL ,
        libelle_DES Varchar (25) ,
        PRIMARY KEY (id_DES )
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
# Table: Question_Reponse
#------------------------------------------------------------

CREATE TABLE Question_Reponse(
        id_Evaluation Int NOT NULL ,
        id_Question   Int NOT NULL ,
        id_reponse    Int NOT NULL ,
        PRIMARY KEY (id_Evaluation ,id_Question ,id_reponse )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DES_Etablissement
#------------------------------------------------------------

CREATE TABLE DES_Etablissement(
        id_DES           Int NOT NULL ,
        id_Etablissement Int NOT NULL ,
        PRIMARY KEY (id_DES ,id_Etablissement )
)ENGINE=InnoDB;

ALTER TABLE Evaluation ADD CONSTRAINT FK_Evaluation_id_Stage FOREIGN KEY (id_Stage) REFERENCES Stage(id_Stage);
ALTER TABLE User ADD CONSTRAINT FK_User_id_Groupe FOREIGN KEY (id_Groupe) REFERENCES Groupe(id_Groupe);
ALTER TABLE User ADD CONSTRAINT FK_User_id_Filiere FOREIGN KEY (id_Filiere) REFERENCES Filiere(id_Filiere);
ALTER TABLE Stage ADD CONSTRAINT FK_Stage_id_Filiere FOREIGN KEY (id_Filiere) REFERENCES Filiere(id_Filiere);
ALTER TABLE Stage ADD CONSTRAINT FK_Stage_id_Service FOREIGN KEY (id_Service) REFERENCES Service(id_Service);
ALTER TABLE Choix ADD CONSTRAINT FK_Choix_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);
ALTER TABLE Choix ADD CONSTRAINT FK_Choix_id_Stage FOREIGN KEY (id_Stage) REFERENCES Stage(id_Stage);
ALTER TABLE Service ADD CONSTRAINT FK_Service_id_Etablissement FOREIGN KEY (id_Etablissement) REFERENCES Etablissement(id_Etablissement);
ALTER TABLE User_Evaluation ADD CONSTRAINT FK_User_Evaluation_id_Evaluation FOREIGN KEY (id_Evaluation) REFERENCES Evaluation(id_Evaluation);
ALTER TABLE User_Evaluation ADD CONSTRAINT FK_User_Evaluation_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);
ALTER TABLE Question_Reponse ADD CONSTRAINT FK_Question_Reponse_id_Evaluation FOREIGN KEY (id_Evaluation) REFERENCES Evaluation(id_Evaluation);
ALTER TABLE Question_Reponse ADD CONSTRAINT FK_Question_Reponse_id_Question FOREIGN KEY (id_Question) REFERENCES Questions(id_Question);
ALTER TABLE Question_Reponse ADD CONSTRAINT FK_Question_Reponse_id_reponse FOREIGN KEY (id_reponse) REFERENCES Reponse(id_reponse);
ALTER TABLE DES_Etablissement ADD CONSTRAINT FK_DES_Etablissement_id_DES FOREIGN KEY (id_DES) REFERENCES DES(id_DES);
ALTER TABLE DES_Etablissement ADD CONSTRAINT FK_DES_Etablissement_id_Etablissement FOREIGN KEY (id_Etablissement) REFERENCES Etablissement(id_Etablissement);

INSERT INTO Filiere (nom_filiere) VALUES ('Biologie médicale');
INSERT INTO Filiere (nom_filiere) VALUES ('Innovation Pharmaceutique et Recherche');
INSERT INTO Filiere (nom_filiere) VALUES ('Pharmacie hospitalière');

INSERT INTO Groupe (libelle_groupe) VALUES ('Interne');
INSERT INTO Groupe (libelle_groupe) VALUES ('Adhérent');
INSERT INTO Groupe (libelle_groupe) VALUES ('Admin');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
