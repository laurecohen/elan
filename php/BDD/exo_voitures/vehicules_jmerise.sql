#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: couleur
#------------------------------------------------------------

CREATE TABLE couleur(
        id_couleur  Int  Auto_increment  NOT NULL ,
        nom_couleur Varchar (50) NOT NULL
	,CONSTRAINT couleur_PK PRIMARY KEY (id_couleur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: motorisation
#------------------------------------------------------------

CREATE TABLE motorisation(
        id_motorisation  Int  Auto_increment  NOT NULL ,
        nom_motorisation Varchar (50) NOT NULL
	,CONSTRAINT motorisation_PK PRIMARY KEY (id_motorisation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: origine
#------------------------------------------------------------

CREATE TABLE origine(
        id_origine Int  Auto_increment  NOT NULL ,
        nom_pays   Varchar (50) NOT NULL
	,CONSTRAINT origine_PK PRIMARY KEY (id_origine)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: marque
#------------------------------------------------------------

CREATE TABLE marque(
        id_marque  Int  Auto_increment  NOT NULL ,
        nom_marque Varchar (50) NOT NULL ,
        id_origine Int NOT NULL
	,CONSTRAINT marque_PK PRIMARY KEY (id_marque)

	,CONSTRAINT marque_origine_FK FOREIGN KEY (id_origine) REFERENCES origine(id_origine)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: modele
#------------------------------------------------------------

CREATE TABLE modele(
        id_modele  Int  Auto_increment  NOT NULL ,
        nom_modele Varchar (50) NOT NULL ,
        id_marque  Int NOT NULL
	,CONSTRAINT modele_PK PRIMARY KEY (id_modele)

	,CONSTRAINT modele_marque_FK FOREIGN KEY (id_marque) REFERENCES marque(id_marque)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: voiture
#------------------------------------------------------------

CREATE TABLE voiture(
        id_voiture      Int  Auto_increment  NOT NULL ,
        num_immat       Varchar (50) NOT NULL ,
        nb_portes       Int ,
        id_motorisation Int NOT NULL ,
        id_modele       Int NOT NULL
	,CONSTRAINT voiture_PK PRIMARY KEY (id_voiture)

	,CONSTRAINT voiture_motorisation_FK FOREIGN KEY (id_motorisation) REFERENCES motorisation(id_motorisation)
	,CONSTRAINT voiture_modele0_FK FOREIGN KEY (id_modele) REFERENCES modele(id_modele)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: colorisation
#------------------------------------------------------------

CREATE TABLE colorisation(
        id_couleur Int NOT NULL ,
        id_voiture Int NOT NULL
	,CONSTRAINT colorisation_PK PRIMARY KEY (id_couleur,id_voiture)

	,CONSTRAINT colorisation_couleur_FK FOREIGN KEY (id_couleur) REFERENCES couleur(id_couleur)
	,CONSTRAINT colorisation_voiture0_FK FOREIGN KEY (id_voiture) REFERENCES voiture(id_voiture)
)ENGINE=InnoDB;

