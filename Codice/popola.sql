SET storage_engine = InnoDB;
SET FOREIGN_KEY_CHECKS = 1;
use danza;
/* Inserimento dati */
/* Tabella Sala */
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS01","Rossa","100","12");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS02","Verde","200","24");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS03","Gialla","300","36");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS04","Blu","400","48");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS05","Grande","400","48");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS06","Media","200","24");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS07","Piccola","100","12");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS08","Prove","100","12");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS09","Esibizioni","200","24");
INSERT INTO Sala (CodSala,NomeSala,MetriQuadri,MaxPersone)
VALUES("CS10","Competizioni","400","48");
/* Tabella Lezione */
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL01","Slow Waltz");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL02","Tango");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL03","Viennese Waltz");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL04","Slow Foxtrot");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL05","Quick Step");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL06","Rumba");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL07","Jive");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL08","Cha Cha Cha");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL09","Samba");
INSERT INTO Lezione (CodLezione,BalloTrattato)
VALUES ("CL10","Paso Doble");