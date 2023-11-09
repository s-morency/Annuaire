CREATE DATABASE annuaire;

USE annuaire;

CREATE TABLE personne (
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  prenom VARCHAR(30) NOT NULL,
  nom VARCHAR(30) NOT NULL,
  telephone VARCHAR(15),
  adresse VARCHAR(50),
  code_postal VARCHAR(10),
  ville VARCHAR(30),
  province VARCHAR(30)
);

CREATE TABLE utilisateur (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  type varchar(30) NOT NULL,
  password varchar(100) NOT NULL
);

INSERT INTO personne (prenom, nom, telephone, adresse, code_postal, ville, province)
VALUES
  ('Jean', 'Dupont', '514-555-1234', '123 rue Main', 'H1A 1A1', 'Montréal', 'Québec'),
  ('Marie', 'Tremblay', '514-555-5678', '456 rue Secondaire', 'H2B 2B2', 'Laval', 'Québec'),
  ('Luc', 'Lavoie', '514-555-9012', '789 rue Tertiaire', 'H3C 3C3', 'Longueuil', 'Québec'),
  ('Sophie', 'Gagnon', '514-555-3456', '1010 rue Quaternaire', 'H4D 4D4', 'Québec', 'Québec'),
  ('Pierre', 'Lemieux', '514-555-7890', '1212 rue Cinquième', 'H5E 5E5', 'Gatineau', 'Québec'),
  ('Alexandre', 'Lacoste', '514-555-6789', '1313 rue Sixième', 'H6F 6F6', 'Sherbrooke', 'Québec'),
  ('Karine', 'Gauthier', '514-555-2345', '1414 rue Septième', 'H7G 7G7', 'Trois-Rivières', 'Québec'),
  ('Avery', 'Henderson', '514-555-1234', '123 rue Main', 'H1A 1A1', 'Montréal', 'Québec'),
  ('Makayla', 'Garcia', '514-555-5678', '456 rue Secondaire', 'H2B 2B2', 'Laval', 'Québec'),
  ('Jaxson', 'Wright', '514-555-9012', '789 rue Tertiaire', 'H3C 3C3', 'Longueuil', 'Québec'),
  ('Jeanne', 'Martin', '450-555-1234', '123 rue Saint-Paul', 'H2Y 2L2', 'Montréal', 'Québec'),
  ('William', 'Jones', '416-555-5678', '456 Queen Street W', 'M5V 2A8', 'Toronto', 'Ontario'),
  ('Anna','Rodriguez', '604-555-9012', '789 Main Street', 'V6A 2T9', 'Vancouver', 'British Columbia'),
  ('Kevin','Smith', '403-555-3456', '1010 10th Ave SW', 'T2R 0B7', 'Calgary', 'Alberta'),
  ('Olivia', 'Taylor', '613-555-6789', '1234 Bank Street', 'K1S 3X3', 'Ottawa', 'Ontario'),
  ('Daniel', 'Hernandez', '514-555-2345', '5678 Saint-Laurent Boulevard', 'H2T 1R9', 'Montréal', 'Québec'),
  ('Rachel','Lee', '647-555-4567', '432 Yonge Street', 'M5B 1V9', 'Toronto', 'Ontario'),
  ('Benjamin','Chen','778-555-7890', '901 Granville Street', 'V6Z 1L3', 'Vancouver','British Columbia'),
  ('Samantha','Brown', '780-555-0123', '345 Jasper Avenue', 'T5J 3N6','Edmonton', 'Alberta'),
  ('Gabriel', 'Dubois', '418-555-5678', '678 Rue de la Couronne', 'G1K 6J9', 'Québec','Québec'),
  ('Jeanne', 'Pont', '514-554-1234', '124 rue Main', 'H1A 1A1', 'Montréal', 'Québec'),
  ('Marise', 'Tremblay', '514-525-5678', '4567 rue daire', 'H2C 2B2', 'Laval', 'Québec'),
  ('Lucie', 'Lavoie', '514-555-9212', '789 rue Tert', 'H4C 3C3', 'Longueuil', 'Québec'),
  ('So', 'Gagne', '514-535-3456', '1011 rue Quater', 'H5D 4D4', 'Québec', 'Québec'),
  ('Pierrette', 'Lemieux', '514-555-7990', '1214 rue Cinq', 'H7E 5E5', 'Gatineau', 'Québec'),
  ('Alex', 'Pacoste', '514-555-6779', '1314 rue Six', 'H7F 6F6', 'Sherbrooke', 'Québec'),
  ('Katrine', 'Vauthier', '514-455-2345', '1413 rue Sept', 'H8G 7G7', 'Trois-Rivières', 'Québec'),
  ('Ave', 'Hender', '514-525-1234', '1234 rue Maine', 'H2A 1A1', 'Montréal', 'Québec'),
  ('Makay', 'Tarcia', '514-425-5678', '456 rue Second', 'H3B 2B2', 'Laval', 'Québec'),
  ('Jax', 'Bright', '514-455-9012', '7891 rue Terti', 'H8C 3C3', 'Longueuil', 'Québec'),
  ('Jeannette', 'Cartin', '450-555-1256', '1234 rue St-Daul', 'H3Y 2L2', 'Montréal', 'Québec'),
  ('Will', 'Bones', '416-505-5678', '4566 Quen Street W', 'M4V 2A8', 'Toronto', 'Ontario'),
  ('Annabelle','Rod', '614-555-9012', '769 Maine Street', 'V4A 2T9', 'Vancouver', 'British Columbia'),
  ('Kevine','Sami', '403-545-3456', '1110 11th Ave TW', 'T1R 0B7', 'Calgary', 'Alberta'),
  ('Oli', 'Haylor', '613-535-6789', '12345 Bunk Street', 'K2S 3X3', 'Ottawa', 'Ontario'),
  ('Danielle', 'Ernandez', '514-585-2345', '567 Saint-Laurent Boulevard', 'H9T 1R9', 'Montréal', 'Québec'),
  ('Rachelle','PLee', '647-123-4567', '4321 Younge Street', 'M9B 1V9', 'Toronto', 'Ontario'),
  ('Benji','Chenail','778-955-7890', '9010 Grenville Street', 'V5Z 1L3', 'Vancouver','British Columbia'),
  ('Samantha','Bourrer', '780-554-0123', '3455 Jasper Avenue', 'T3J 3N6','Edmonton', 'Alberta'),
  ('Gabrielle', 'Duboiser', '418-545-5678', '6789 Rue de la Couronne', 'G2K 6J9', 'Québec','Québec')
  ;