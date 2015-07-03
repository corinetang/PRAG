/* Insertion filiere --------------------------------- */
INSERT INTO filiere (nom_filiere) VALUES ('Biologie médicale');
INSERT INTO filiere (nom_filiere) VALUES ('Innovation Pharmaceutique et Recherche');
INSERT INTO filiere (nom_filiere) VALUES ('Pharmacie hospitalière');


/* Insertion groupe --------------------------------- */
INSERT INTO groupe (libelle_groupe) VALUES ('Interne');
INSERT INTO groupe (libelle_groupe) VALUES ('Adhérent');
INSERT INTO groupe (libelle_groupe) VALUES ('Admin');


/* Insertion user --------------------------------- */
INSERT INTO `user` (`id_user`, `identifiant_user`, `nom_user`, `prenom_user`, `mdp_user`, `NbSemestre_user`, `moyenneClassement_user`, `dateDeNaissance_user`, `RangClassement_user`, `mail_user`, `numtel_user`, `id_Groupe`, `id_Filiere`) VALUES
(1, 'partout.passe', 'partout', 'passe', '12dea96fec20593566ab75692c9949596833adc9', 6, NULL, '2015-05-14', 1, '', 2147483647, 1, 1),
(2, 'pouce.tom','Tom' ,'Pouce', '12dea96fec20593566ab75692c9949596833adc9', 6, 12, '1994-08-17', 3, NULL, NULL, 2, 1),
(3, 'daniels.jack', 'Daniels', 'Jack', '12dea96fec20593566ab75692c9949596833adc9', 6, 13, '1995-12-17', 17, NULL, NULL, 2, 1),
(4, 'skywalker.luke', 'Skywalker', 'Luke', '12dea96fec20593566ab75692c9949596833adc9', 5, 12, NULL, 12, NULL, NULL, 2, 1),
(5, 'diesel.kevin', 'Diesel', 'Kevin', '12dea96fec20593566ab75692c9949596833adc9', 5, 12, NULL, 2, NULL, NULL, 1, 1),
(6, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 5, NULL, '1994-10-17', NULL, '', 2147483647, 3, 1);


/* Insertion des --------------------------------- */
INSERT INTO `des` (`id_DES`, `libelle_DES`) VALUES
(1, 'BACTERIOLOGIE');


/* Insertion etablissement --------------------------------- */
INSERT INTO `etablissement` (`id_Etablissement`, `nom_etablissement`) VALUES
(1, 'Hopital Necker'),
(3, 'Hopital Avicenne)'),
(4, 'Hopital IV'),
(5, 'CHU'),
(6, 'CHU Paris'),
(7, 'Clinique');


/* Insertion des_etablissement --------------------------------- */
INSERT INTO `des_etablissement` (`id_DES`, `id_Etablissement`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7);


/* Insertion service --------------------------------- */
INSERT INTO `service` (`id_Service`, `nom_service`, `id_Etablissement`) VALUES
(1, 'Radiologie', 1),
(2, 'Anesthesie', 1),
(3, 'Traumatologie', 3),
(4, 'Esthetique', 4),
(5, 'Jadielle', 5),
(6, 'Internat', 6),
(7, 'Geriatrie', 7);


/* Insertion stage --------------------------------- */
INSERT INTO `stage` (`id_Stage`, `NbPoste_stage`, `dateDebut_stage`, `dateFin_stage`, `maitre_stage`, `id_Filiere`, `id_Service`) VALUES
(1, 1, NULL, NULL, '', 1, 1),
(2, 2, NULL, NULL, '', 1, 2),
(3, 2, NULL, NULL, '', 1, 3),
(4, 1, NULL, NULL, '', 1, 4),
(5, 1, NULL, NULL, '', 1, 5),
(6, 1, NULL, NULL, '', 1, 6);


/* Insertion choix --------------------------------- */
INSERT INTO `choix` (`id_Choix`, `estAccepte_choix`, `rang_choix`, `id_user`, `id_Stage`) VALUES
(1, 0, 1, 1, 1),
(2, 0, 2, 1, 2),
(3, 0, 3, 1, 4),
(4, 0, 1, 2, 1),
(5, 0, 2, 2, 2),
(6, 0, 3, 2, 3),
(7, 0, 4, 3, 1),
(8, 0, 3, 3, 4),
(9, 0, 4, 3, 5),
(10, 0, 1, 4, 2),
(11, 0, 2, 4, 6),
(12, 0, 3, 4, 5),
(13, 0, 1, 5, 3),
(14, 0, 2, 5, 6),
(15, 0, 3, 5, 4);

INSERT INTO `Evaluation` (`id_Evaluation`, `Valide_evaluation`, `id_Stage`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 0, NULL),
(4, 0, NULL),
(5, 0, NULL);

/* Insertion questions --------------------------------- */
INSERT INTO `questions` (`id_Question`, `Libelle_question`) VALUES
(1, 'Lieu de stage'),
(2, 'Activité de l’interne Hors garde - Hors astreinte'),
(3, 'Activité de l’interne en garde'),
(4, 'Activité de l’interne en astreinte'),
(5, 'Encadrement et formation'),
(6, 'Respect du statut de l’interne'),
(7, 'Organisation du service d’affectation'),
(8, 'Appréciation globale du stage Points forts du stage'),
(9, 'Points faibles du stage - Remarques éventuelles');

INSERT INTO `reponse` (`id_reponse`, `commentaire_reponse`) VALUES
(1, 'hopital'),
(2, 'Activité avec les employés de hopital'),
(3, 'Apprentissage avec des internes'),
(4, 'La même chose que en garde'),
(5, 'Le tuteur est très pédagogue'),
(6, 'Oui, beaucoup de responsabilité'),
(7, 'Organisation qui se fait au fur et à mesure'),
(8, 'Très bien. Beaucoup de responsabilité'),
(9, 'Difficile accès en transport en commun'),
(10, 'Sur le terrain'),
(11, 'Rien'),
(12, 'Surchargé'),
(13, 'Pas astreinte'),
(14, 'Présence quotidienne du tuteur'),
(15, 'Respect'),
(16, 'Très bonne organisation'),
(17, 'Très bon stage'),
(18, 'Pas de points faibles');

INSERT INTO `Question_Reponse` (`id_Evaluation`, `id_Question`, `id_reponse`) VALUES
(1, 1, 1),
(2, 1, 10),
(1, 2, 2),
(2, 2, 11),
(1, 3, 3),
(2, 3, 12),
(1, 4, 4),
(2, 4, 13),
(1, 5, 5),
(2, 5, 14),
(1, 6, 6),
(2, 6, 15),
(1, 7, 7),
(2, 7, 16),
(1, 8, 8),
(2, 8, 17),
(1, 9, 9),
(2, 9, 18);

INSERT INTO `User_Evaluation` (`id_Evaluation`, `id_user`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2);
