#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: genre
#------------------------------------------------------------

CREATE TABLE genre(
        id_genre  Int  Auto_increment  NOT NULL ,
        nom_genre Varchar (32) NOT NULL
	,CONSTRAINT genre_PK PRIMARY KEY (id_genre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: realisateur
#------------------------------------------------------------

CREATE TABLE realisateur(
        id_realisateur     Int  Auto_increment  NOT NULL ,
        nom_realisateur    Varchar (50) NOT NULL ,
        prenom_realisateur Varchar (50) NOT NULL ,
        date_realisateur   Date ,
        sexe               Varchar (10) NOT NULL
	,CONSTRAINT realisateur_PK PRIMARY KEY (id_realisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: film
#------------------------------------------------------------

CREATE TABLE film(
        id_film        Int  Auto_increment  NOT NULL ,
        titre          Varchar (50) NOT NULL ,
        annee_sortie   Date NOT NULL ,
        duree          Int NOT NULL ,
        synopsis       Text ,
        affiche        Varchar (255) ,
        note           TinyINT ,
        id_realisateur Int NOT NULL
	,CONSTRAINT film_PK PRIMARY KEY (id_film)

	,CONSTRAINT film_realisateur_FK FOREIGN KEY (id_realisateur) REFERENCES realisateur(id_realisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: acteur
#------------------------------------------------------------

CREATE TABLE acteur(
        id_acteur      Int  Auto_increment  NOT NULL ,
        nom_acteur     Varchar (50) NOT NULL ,
        prenom_acteur  Varchar (50) NOT NULL ,
        date_naissance Date ,
        sexe           Varchar (10) NOT NULL
	,CONSTRAINT acteur_PK PRIMARY KEY (id_acteur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id_role  Int  Auto_increment  NOT NULL ,
        nom_role Varchar (100) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: style_film
#------------------------------------------------------------

CREATE TABLE style_film(
        id_genre Int NOT NULL ,
        id_film  Int NOT NULL
	,CONSTRAINT style_film_PK PRIMARY KEY (id_genre,id_film)

	,CONSTRAINT style_film_genre_FK FOREIGN KEY (id_genre) REFERENCES genre(id_genre)
	,CONSTRAINT style_film_film0_FK FOREIGN KEY (id_film) REFERENCES film(id_film)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: casting
#------------------------------------------------------------

CREATE TABLE casting(
        id_film   Int NOT NULL ,
        id_acteur Int NOT NULL ,
        id_role   Int NOT NULL
	,CONSTRAINT casting_PK PRIMARY KEY (id_film,id_acteur,id_role)

	,CONSTRAINT casting_film_FK FOREIGN KEY (id_film) REFERENCES film(id_film)
	,CONSTRAINT casting_acteur0_FK FOREIGN KEY (id_acteur) REFERENCES acteur(id_acteur)
	,CONSTRAINT casting_role1_FK FOREIGN KEY (id_role) REFERENCES role(id_role)
)ENGINE=InnoDB;

