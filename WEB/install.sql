/*
 *@author Naïm
 */

CREATE TABLE Region(
        Code_Region Int NOT NULL ,
        Libelle     Varchar (50) NOT NULL
	,CONSTRAINT Region_PK PRIMARY KEY (Code_Region)
)ENGINE=InnoDB;


CREATE TABLE agence(
        IdAgence    Int NOT NULL ,
        Nom         Varchar (50) NOT NULL ,
        Libelle     Varchar (50) NOT NULL ,
        Adresse     Varchar (50) NOT NULL ,
        Telephone   Varchar (50) NOT NULL ,
        Mail        Varchar (50) NOT NULL ,
        Telephone2  Varchar (50) NOT NULL ,
        Code_Region Int NOT NULL
	,CONSTRAINT agence_PK PRIMARY KEY (IdAgence)

	,CONSTRAINT agence_Region_FK FOREIGN KEY (Code_Region) REFERENCES Region(Code_Region)
)ENGINE=InnoDB;


CREATE TABLE Client(
        Code_Client Int NOT NULL ,
        Raison      Varchar (50) NOT NULL ,
        Siren       Varchar (50) NOT NULL ,
        Ape         Varchar (50) NOT NULL ,
        Adresse     Varchar (50) NOT NULL ,
        Num_tel     Varchar (50) NOT NULL ,
        Email       Varchar (50) NOT NULL ,
        IdAgence    Int NOT NULL
	,CONSTRAINT Client_PK PRIMARY KEY (Code_Client)

	,CONSTRAINT Client_agence_FK FOREIGN KEY (IdAgence) REFERENCES agence(IdAgence)
)ENGINE=InnoDB;



CREATE TABLE Famille_de_produit(
        code_famille Int  Auto_increment  NOT NULL ,
        libelle      Varchar (50) NOT NULL
	,CONSTRAINT Famille_de_produit_PK PRIMARY KEY (code_famille)
)ENGINE=InnoDB;



CREATE TABLE TypeMateriel(
        Ref          Int NOT NULL ,
        Libelle      Varchar (50) NOT NULL ,
        code_famille Int NOT NULL
	,CONSTRAINT TypeMateriel_PK PRIMARY KEY (Ref)

	,CONSTRAINT TypeMateriel_Famille_de_produit_FK FOREIGN KEY (code_famille) REFERENCES Famille_de_produit(code_famille)
)ENGINE=InnoDB;



CREATE TABLE employe(
        Num_Matricule Int NOT NULL ,
        Nom           Varchar (50) NOT NULL ,
        Prenom        Varchar (50) NOT NULL ,
        adresse       Varchar (50) NOT NULL ,
        dateembauche  Varchar (200) NOT NULL ,
        password      Varchar (50) NOT NULL
	,CONSTRAINT employe_PK PRIMARY KEY (Num_Matricule)
)ENGINE=InnoDB;



CREATE TABLE Technicien(
        Num_Matricule    Int NOT NULL ,
        Telephone_Mobile Varchar (50) NOT NULL ,
        Qualification    Varchar (50) NOT NULL ,
        adresse          Varchar (50) NOT NULL ,
        Nom              Varchar (50) NOT NULL ,
        Prenom           Varchar (50) NOT NULL ,
        adresse_employe  Varchar (50) NOT NULL ,
        dateembauche     Varchar (200) NOT NULL ,
        password         Varchar (50) NOT NULL ,
        IdAgence         Int NOT NULL
	,CONSTRAINT Technicien_PK PRIMARY KEY (Num_Matricule)

	,CONSTRAINT Technicien_employe_FK FOREIGN KEY (Num_Matricule) REFERENCES employe(Num_Matricule)
	,CONSTRAINT Technicien_agence0_FK FOREIGN KEY (IdAgence) REFERENCES agence(IdAgence)
)ENGINE=InnoDB;


CREATE TABLE Assistant_Telephonique(
        Num_Matricule Int NOT NULL ,
        Nom           Varchar (50) NOT NULL ,
        Prenom        Varchar (50) NOT NULL ,
        adresse       Varchar (50) NOT NULL ,
        dateembauche  Varchar (200) NOT NULL ,
        password      Varchar (50) NOT NULL ,
        Code_Region   Int NOT NULL
	,CONSTRAINT Assistant_Telephonique_PK PRIMARY KEY (Num_Matricule)

	,CONSTRAINT Assistant_Telephonique_employe_FK FOREIGN KEY (Num_Matricule) REFERENCES employe(Num_Matricule)
	,CONSTRAINT Assistant_Telephonique_Region0_FK FOREIGN KEY (Code_Region) REFERENCES Region(Code_Region)
)ENGINE=InnoDB;



CREATE TABLE Intervention(
        Numero_Fiche  Int NOT NULL ,
        adresse       Varchar (50) NOT NULL ,
        date_visite   Date NOT NULL ,
        heure_visite  Varchar (50) NOT NULL ,
        Num_Matricule Int NOT NULL ,
        Code_Client   Int NOT NULL
	,CONSTRAINT Intervention_PK PRIMARY KEY (Numero_Fiche)

	,CONSTRAINT Intervention_Technicien_FK FOREIGN KEY (Num_Matricule) REFERENCES Technicien(Num_Matricule)
	,CONSTRAINT Intervention_Client0_FK FOREIGN KEY (Code_Client) REFERENCES Client(Code_Client)
)ENGINE=InnoDB;


CREATE TABLE TypeContrat(
        RefTypeContrat     Int  Auto_increment  NOT NULL ,
        Detailintervention Varchar (200) NOT NULL ,
        TauxApplicable     Varchar (200) NOT NULL
	,CONSTRAINT TypeContrat_PK PRIMARY KEY (RefTypeContrat)
)ENGINE=InnoDB;


CREATE TABLE Contrat_Maintenance(
        NumerodeContrat     Int NOT NULL ,
        dateSignature       Varchar (50) NOT NULL ,
        dateEcheance        Varchar (50) NOT NULL ,
        Date_Renouvellement Varchar (50) NOT NULL ,
        Code_Client         Int NOT NULL ,
        RefTypeContrat      Int NOT NULL
	,CONSTRAINT Contrat_Maintenance_PK PRIMARY KEY (NumerodeContrat)

	,CONSTRAINT Contrat_Maintenance_Client_FK FOREIGN KEY (Code_Client) REFERENCES Client(Code_Client)
	,CONSTRAINT Contrat_Maintenance_TypeContrat0_FK FOREIGN KEY (RefTypeContrat) REFERENCES TypeContrat(RefTypeContrat)
	,CONSTRAINT Contrat_Maintenance_Client_AK UNIQUE (Code_Client)
)ENGINE=InnoDB;


CREATE TABLE Materiel(
        NumSerie Int NOT NULL ,
        date_vente Varchar (50) NOT NULL ,
        date_installation Varchar (50) NOT NULL,
        prix_vente Varchar(50) NOT NULL,
        emplacement Varchar(50) NOT NULL,
        Ref Int(50) NOT NULL,
        NumerodeContrat Int(50) NOT NULL,
        Code_Client Int(50) NOT NULL
        ,CONSTRAINT Materiel_Pk PRIMARY KEY (NumSerie)

        ,CONSTRAINT Materiel_Ref_FK FOREIGN KEY (Ref) REFERENCES TypeMateriel(Ref)
        ,CONSTRAINT Materiel_NumerodeContrat_FK FOREIGN KEY (NumerodeContrat) REFERENCES Contrat_Maintenance(NumerodeContrat)
        ,CONSTRAINT Materiel_Maintenance_AK UNIQUE (Code_Client)
)ENGINE=InnoDB;

CREATE TABLE Controller(
        NumSerie Int NOT NULL ,
        Numero_Fiche Int NOT NULL,
        temps_passe Varchar(50),
        commentaire Varchar(50)
        ,CONSTRAINT Controller_NumSerie_FK FOREIGN KEY (NumSerie) REFERENCES Materiel(NumSerie)
        ,CONSTRAINT Controller_Numero_Fiche_FK FOREIGN KEY (Numero_Fiche) REFERENCES Intervention(Numero_Fiche)

)ENGINE=InnoDB;




