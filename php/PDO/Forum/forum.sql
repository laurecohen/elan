#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_user       Int  Auto_increment  NOT NULL ,
        username      Varchar (32) NOT NULL ,
        password      Varchar (100) NOT NULL ,
        role          Varchar (50) NOT NULL ,
        date_creation Date NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sujet
#------------------------------------------------------------

CREATE TABLE sujet(
        id_sujet       Int  Auto_increment  NOT NULL ,
        titre_sujet    Varchar (50) NOT NULL ,
        date_creation  Date NOT NULL ,
        est_verrouille Bool NOT NULL ,
        est_resolu     Bool NOT NULL ,
        id_user        Int NOT NULL
	,CONSTRAINT sujet_PK PRIMARY KEY (id_sujet)

	,CONSTRAINT sujet_user_FK FOREIGN KEY (id_user) REFERENCES user(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        id_message    Int  Auto_increment  NOT NULL ,
        texte         Text NOT NULL ,
        date_creation Date NOT NULL ,
        id_sujet      Int NOT NULL ,
        id_user       Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (id_message)

	,CONSTRAINT message_sujet_FK FOREIGN KEY (id_sujet) REFERENCES sujet(id_sujet)
	,CONSTRAINT message_user0_FK FOREIGN KEY (id_user) REFERENCES user(id_user)
)ENGINE=InnoDB;

