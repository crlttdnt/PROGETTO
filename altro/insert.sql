-- codice SQL per l'inserimento nelle tabelle del DataBase
INSERT INTO GiornoSettimana (nomeGiorno) VALUES 
('Lunedì'),
('Martedì'),
('Mercoledì'),
('Giovedì'),
('Venerdì'),
('Sabato'),
('Domenica');

INSERT INTO Ospedale (codice, nomeOspedale, città, via, CAP, numeroCivico) VALUES
(1, 'Ospedale Fatebenefratelli', 'Milano', 'Via Volturno', 20121, 15),
(2, 'Ospedale Niguarda', 'Milano', 'Via Emilia', 20162, 80),
(3, 'Ospedale San Gerardo', 'Monza', 'Via Pergolesi', 20900, 15),
(4, 'Ospedale San Raffaele', 'Milano', 'Via Cavour', 20121, 10);


INSERT INTO Reparto (nomeReparto, ospedale, piano, telefono, giorno, oraInizioVisita, oraFineVisita) VALUES
('Cardiologia', 1, 1, '123456789', 'Lunedì', '09:00:00.000', '12:00:00.000'),
('Ortopedia', 1, 2, '123456790','Martedì', 	'10:00:00.000', '13:00:00.000'),
('Pediatria', 1, 3, '123456791','Mercoledì', '11:00:00.000', '14:00:00.000'),
('Cardiologia', 2, 1, '223456789', 'Giovedì', '09:00:00.000', '12:00:00.000'),
('Ortopedia', 2, 2, '223456790', 'Venerdì',	'10:00:00.000', '13:00:00.000'),
('Pediatria', 2, 3, '223456791', 'Lunedì', 	'11:00:00.000', '14:00:00.000'),
('Cardiologia', 3, 1, '323456789', 'Martedì','09:00:00.000', '12:00:00.000'),
('Ortopedia', 3, 2, '323456790', 'Mercoledì', '10:00:00.000', '13:00:00.000'),
('Pediatria', 3, 3, '323456791', 'Giovedì', '11:00:00.000', '14:00:00.000'),
('Cardiologia', 4, 1, '423456789',	'Venerdì', '09:00:00.000', '12:00:00.000'),
('Ortopedia', 4, 2, '423456790',	'Lunedì', '10:00:00.000', '13:00:00.000'),
('Pediatria', 4, 3, '423456791',	'Martedì', '11:00:00.000', '14:00:00.000');


INSERT INTO Personale (codiceFiscale, anzianitaServizio, nome, cognome, dataNascita, città, via, CAP, numeroCivico, nomeReparto, ospedale) VALUES 
('RSSMRA85M01H501Z', 10, 'Mario', 'Rossi', '1985-01-01', 'Milano', 'Via Roma', 20121, 1, 'Cardiologia', 1),
('BNCLRA90E15F205W', 5, 'Laura', 'Bianchi', '1990-05-15', 'Milano', 'Via Dante', 20121, 2, 'Ortopedia', 1),
('VRDGPP92S20H501Y', 3, 'Giuseppe', 'Verdi', '1992-11-20', 'Milano', 'Via Manzoni', 20121, 3, 'Pediatria', 1),
('FRNLGI85A01L219U', 12, 'Luigi', 'Ferrari', '1985-01-01', 'Milano', 'Via della Spiga', 20162, 1, 'Cardiologia', 2),
('MRNLRA93E15C712Z', 7, 'Marco', 'Marino', '1993-05-15', 'Milano', 'Via Montenapoleone', 20162, 2, 'Ortopedia', 2),
('BNCGLR95T20F205Q', 2, 'Giulia', 'Bianchi', '1995-11-20', 'Milano', 'Via Tortona', 20162, 3, 'Pediatria', 2),
('RSSGRL87C01F205A', 9, 'Carlo', 'Rossi', '1987-03-01', 'Monza', 'Via Italia', 20900, 1, 'Cardiologia', 3),
('NCLLRA88E15F205B', 8, 'Lara', 'Neri', '1988-05-15', 'Monza', 'Via Solferino', 20900, 2, 'Ortopedia', 3),
('VRDGPP90S20H501D', 6, 'Giovanni', 'Verdi', '1990-11-20', 'Monza', 'Via Mazzini', 20900, 3, 'Pediatria', 3),
('FRNLRA89A01F205J', 10, 'Sara', 'Ferrari', '1989-01-01', 'Milano', 'Via Garibaldi', 20121, 4, 'Cardiologia', 4),
('MNLGRL91E15F205M', 4, 'Luisa', 'Manzoni', '1991-05-15', 'Milano', 'Via Larga', 20121, 5, 'Ortopedia', 4),
('BNCGLR96T20F205P', 1, 'Marta', 'Bianchi', '1996-11-20', 'Milano', 'Via San Marco', 20121, 6, 'Pediatria', 4),
('RSSMRA81M01H501L', 13, 'Andrea', 'Rossi', '1981-01-01', 'Milano', 'Via Torino', 20162, 7, 'Cardiologia', 2),
('BNCLRA82E15F205G', 11, 'Lucia', 'Bianchi', '1982-05-15', 'Milano', 'Via Garibaldi', 20162, 8, 'Ortopedia', 2),
('VRDGPP85S20H501E', 15, 'Franco', 'Verdi', '1985-11-20', 'Milano', 'Via Meda', 20162, 9, 'Pediatria', 2),
('FRNLRA87A01F205H', 12, 'Pietro', 'Ferrari', '1987-01-01', 'Monza', 'Via Montenapoleone', 20900, 10, 'Cardiologia', 3),
('MRNLRA84E15C712N', 14, 'Simone', 'Marino', '1984-05-15', 'Monza', 'Via San Siro', 20900, 11, 'Ortopedia', 3),
('BNCGLR91T20F205K', 5, 'Chiara', 'Bianchi', '1991-11-20', 'Monza', 'Via Rovani', 20900, 12, 'Pediatria', 3),
('RSSGRL80C01F205D', 15, 'Clara', 'Rossi', '1980-03-01', 'Milano', 'Via Lorenteggio', 20121, 13, 'Cardiologia', 1),
('NCLLRA86E15F205X', 6, 'Fabio', 'Neri', '1986-05-15', 'Milano', 'Via Savona', 20121, 14, 'Ortopedia', 1);


INSERT INTO PersonaleAmministrativo (codiceFiscale) VALUES 
('RSSMRA85M01H501Z'),
('BNCLRA90E15F205W'),
('VRDGPP92S20H501Y'),
('FRNLGI85A01L219U'),
('MRNLRA93E15C712Z');


INSERT INTO PersonaleSanitario (codiceFiscale) VALUES 
('BNCGLR95T20F205Q'),
('RSSGRL87C01F205A'),
('NCLLRA88E15F205B'),
('VRDGPP90S20H501D'),
('FRNLRA89A01F205J'),
('MNLGRL91E15F205M'),
('BNCGLR96T20F205P'),
('RSSMRA81M01H501L'),
('BNCLRA82E15F205G'),
('VRDGPP85S20H501E'),
('FRNLRA87A01F205H'),
('MRNLRA84E15C712N'),
('BNCGLR91T20F205K'),
('RSSGRL80C01F205D'),
('NCLLRA86E15F205X');


INSERT INTO PersonaleMedico (codiceFiscale) VALUES 
('BNCGLR95T20F205Q'),
('RSSGRL87C01F205A'),
('NCLLRA88E15F205B'),
('VRDGPP90S20H501D'),
('FRNLRA89A01F205J'),
('MNLGRL91E15F205M'),
('BNCGLR96T20F205P'),
('RSSMRA81M01H501L'),
('BNCLRA82E15F205G'),
('VRDGPP85S20H501E');


INSERT INTO Infermiere (codiceFiscale) VALUES 
('FRNLRA87A01F205H'),
('MRNLRA84E15C712N'),
('BNCGLR91T20F205K'),
('RSSGRL80C01F205D'),
('NCLLRA86E15F205X');


INSERT INTO Primario (codiceFiscale, nomeReparto, ospedale) VALUES 
('BNCGLR95T20F205Q', 'Cardiologia', 1),
('RSSGRL87C01F205A', 'Ortopedia', 2),
('NCLLRA88E15F205B', 'Pediatria', 3),
('VRDGPP90S20H501D', 'Cardiologia', 4),
('FRNLRA89A01F205J', 'Ortopedia', 1);


INSERT INTO VicePrimario (codiceFiscale, dataPromozione, nomeReparto, ospedale) VALUES 
('MNLGRL91E15F205M', '2020-01-01', 'Pediatria', 2),
('BNCGLR96T20F205P', '2019-06-15', 'Cardiologia', 3),
('RSSMRA81M01H501L', '2021-09-10', 'Ortopedia', 4),
('BNCLRA82E15F205G', '2022-03-05', 'Pediatria', 1),
('VRDGPP85S20H501E', '2018-11-20', 'Cardiologia', 2);


INSERT INTO Specializzazione (nome) VALUES 
('Cardiologia'),
('Ortopedia'),
('Pediatria'),
('Chirurgia'),
('Neurologia');


INSERT INTO qualifica (codiceFiscale, nome) VALUES 
('BNCGLR95T20F205Q', 'Cardiologia'),
('RSSGRL87C01F205A', 'Ortopedia'),
('NCLLRA88E15F205B', 'Pediatria'),
('VRDGPP90S20H501D', 'Cardiologia'),
('FRNLRA89A01F205J', 'Ortopedia'),
('MNLGRL91E15F205M', 'Pediatria'),
('BNCGLR96T20F205P', 'Cardiologia'),
('RSSMRA81M01H501L', 'Ortopedia'),
('BNCLRA82E15F205G', 'Pediatria'),
('VRDGPP85S20H501E', 'Cardiologia');


INSERT INTO sostituisce (Primario, VicePrimario, inizioSostituzione, fineSostituzione) VALUES 
('BNCGLR95T20F205Q', 'MNLGRL91E15F205M', '2023-01-01', '2023-01-15'),
('RSSGRL87C01F205A', 'BNCGLR96T20F205P', '2023-02-01', '2023-02-15'),
('NCLLRA88E15F205B', 'RSSMRA81M01H501L', '2023-03-01', '2023-03-15'),
('VRDGPP90S20H501D', 'BNCLRA82E15F205G', '2023-04-01', '2023-04-15'),
('FRNLRA89A01F205J', 'VRDGPP85S20H501E', '2023-05-01', '2023-05-15');


INSERT INTO Paziente (codiceFiscale, nome, cognome, dataNascita, città, via, CAP, numeroCivico) VALUES 
('PZNT0001X01A123B', 'Giuseppe', 'Verdi', '1980-05-05', 'Milano', 'Via Roma', 20121, 1),
('PZNT0002X01A123B', 'Anna', 'Rossi', '1990-07-07', 'Milano', 'Via Dante', 20121, 2),
('PZNT0003X01A123B', 'Luca', 'Bianchi', '1985-08-08', 'Milano', 'Via Manzoni', 20121, 3),
('PZNT0004X01A123B', 'Marco', 'Ferrari', '1975-09-09', 'Milano', 'Via Montenapoleone', 20121, 4),
('PZNT0005X01A123B', 'Giulia', 'Marino', '1992-10-10', 'Milano', 'Via della Spiga', 20121, 5),
('PZNT0006X01A123B', 'Francesca', 'Russo', '1988-11-11', 'Milano', 'Via Montenapoleone', 20121, 6),
('PZNT0007X01A123B', 'Paolo', 'Galli', '1983-12-12', 'Milano', 'Via Solferino', 20121, 7),
('PZNT0008X01A123B', 'Elena', 'Neri', '1978-01-13', 'Milano', 'Via Garibaldi', 20121, 8),
('PZNT0009X01A123B', 'Marta', 'Ricci', '1995-02-14', 'Milano', 'Via Meda', 20121, 9),
('PZNT0010X01A123B', 'Alessandro', 'Conti', '1981-03-15', 'Milano', 'Via Mazzini', 20121, 10),
('PZNT0011X01A123B', 'Sara', 'Villa', '1986-04-16', 'Milano', 'Via Torino', 20121, 11),
('PZNT0012X01A123B', 'Davide', 'Giordano', '1977-05-17', 'Milano', 'Via Savona', 20121, 12),
('PZNT0013X01A123B', 'Carla', 'Lombardi', '1991-06-18', 'Milano', 'Via Lorenteggio', 20121, 13),
('PZNT0014X01A123B', 'Federico', 'Rizzo', '1984-07-19', 'Milano', 'Via San Marco', 20121, 14),
('PZNT0015X01A123B', 'Matteo', 'Greco', '1979-08-20', 'Milano', 'Via Tortona', 20121, 15),
('PZNT0016X01A123B', 'Roberta', 'Bruno', '1993-09-21', 'Milano', 'Via Solferino', 20121, 16),
('PZNT0017X01A123B', 'Giorgio', 'Moretti', '1987-10-22', 'Milano', 'Via Montenapoleone', 20121, 17),
('PZNT0018X01A123B', 'Simona', 'Gatti', '1982-11-23', 'Milano', 'Via Mazzini', 20121, 18),
('PZNT0019X01A123B', 'Cristina', 'Serra', '1976-12-24', 'Milano', 'Via Garibaldi', 20121, 19),
('PZNT0020X01A123B', 'Antonio', 'Ferraro', '1989-01-25', 'Milano', 'Via Savona', 20121, 20);


INSERT INTO PazienteVisita (codiceFiscale) VALUES 
('PZNT0001X01A123B'),
('PZNT0002X01A123B'),
('PZNT0003X01A123B'),
('PZNT0004X01A123B'),
('PZNT0005X01A123B'),
('PZNT0006X01A123B'),
('PZNT0007X01A123B'),
('PZNT0008X01A123B'),
('PZNT0009X01A123B'),
('PZNT0010X01A123B');


INSERT INTO Stanza (numeroStanza, nomeReparto, ospedale, numeroLettiOccupati, numeroLettiLiberi) VALUES 
(1, 'Cardiologia', 1, 2, 2),
(2, 'Ortopedia', 2, 1, 3),
(3, 'Pediatria', 3, 3, 1),
(4, 'Cardiologia', 4, 0, 4),
(5, 'Ortopedia', 1, 1, 3),
(6, 'Pediatria', 2, 2, 2),
(7, 'Cardiologia', 3, 1, 3),
(8, 'Ortopedia', 4, 2, 2),
(9, 'Pediatria', 1, 3, 1),
(10, 'Cardiologia', 2, 1, 3),
(11, 'Ortopedia', 1, NULL, NULL),
(12, 'Pediatria', 1, NULL, NULL),
(13, 'Cardiologia', 1, NULL, NULL);


INSERT INTO PazienteRicoverato (codiceFiscale, dataRicovero, dataDimissione, numeroStanza, nomeReparto, ospedale) VALUES 
('PZNT0011X01A123B', '2023-01-01', '2023-01-05' , 1, 'Cardiologia', 1),
('PZNT0012X01A123B', '2023-01-02', NULL, 2, 'Ortopedia', 2),
('PZNT0013X01A123B', '2023-01-03', NULL, 3, 'Pediatria', 3),
('PZNT0014X01A123B', '2023-01-04', NULL, 4, 'Cardiologia', 4),
('PZNT0015X01A123B', '2023-01-05', '2023-02-19', 5, 'Ortopedia', 1),
('PZNT0016X01A123B', '2023-01-06', NULL, 6, 'Pediatria', 2),
('PZNT0017X01A123B', '2023-01-07', NULL, 7, 'Cardiologia', 3),
('PZNT0018X01A123B', '2023-01-08', NULL, 8, 'Ortopedia', 4),
('PZNT0019X01A123B', '2023-01-09', NULL, 9, 'Pediatria', 1),
('PZNT0020X01A123B', '2023-01-10', NULL, 10, 'Cardiologia', 2);


INSERT INTO Patologia (descrizione) VALUES 
('Trauma cranico'),
('Frattura ossea'),
('Appendicite'),
('Infarto miocardico'),
('Polmonite'),
('Insufficienza renale'),
('Emorragia cerebrale'),
('Ulcera gastrica'),
('Diabete mellito'),
('Ipertensione arteriosa');


INSERT INTO Diagnosi (codiceFiscale, dataRicovero, descrizione) VALUES 
('PZNT0011X01A123B', '2023-01-01', 'Trauma cranico'),
('PZNT0012X01A123B', '2023-01-02', 'Frattura ossea'),
('PZNT0013X01A123B', '2023-01-03', 'Appendicite'),
('PZNT0014X01A123B', '2023-01-04', 'Infarto miocardico'),
('PZNT0015X01A123B', '2023-01-05', 'Polmonite'),
('PZNT0016X01A123B', '2023-01-06', 'Insufficienza renale'),
('PZNT0017X01A123B', '2023-01-07', 'Emorragia cerebrale'),
('PZNT0018X01A123B', '2023-01-08', 'Ulcera gastrica'),
('PZNT0019X01A123B', '2023-01-09', 'Diabete mellito'),
('PZNT0020X01A123B', '2023-01-10', 'Ipertensione arteriosa');


INSERT INTO SalaOperatoria (numeroSalaOperatoria, nomeReparto, ospedale) VALUES 
(1, 'Cardiologia', 1),
(2, 'Ortopedia', 1),
(3, 'Pediatria', 1),
(1, 'Cardiologia', 2),
(2, 'Ortopedia', 2),
(3, 'Pediatria', 2),
(1, 'Cardiologia', 3),
(2, 'Ortopedia', 3),
(3, 'Pediatria', 3),
(1, 'Cardiologia', 4),
(2, 'Ortopedia', 4),
(3, 'Pediatria', 4);


INSERT INTO LaboratorioInterno (ospedale, numeroStanza, nomeReparto) VALUES 
(1, 13, 'Cardiologia'),
(1, 11, 'Ortopedia'),
(1, 12, 'Pediatria');


INSERT INTO LaboratorioEsterno (codiceLabEsterno, città, via, CAP, numeroCivico, telefono) VALUES
(1, 'Bergamo', 'Via Bonomelli', 24121, 1, '987654342'),
(2, 'Brescia', 'Via dei Mille', 25122, 2, '987765436'),
(3, 'Como', 'Via Milano', 22100, 3, '958765432'),
(4, 'Lecco', 'Via Amendola', 23900, 4, '998765430'),
(5, 'Varese', 'Via Magenta', 21100, 5, '908765432'),
(6, 'Cremona', 'Via Mantova', 26100, 6, '398765436'),
(7, 'Pavia', 'Via XX Settembre', 27100, 7, '948765431'),
(8, 'Sondrio', 'Via Roma', 23100, 8, '998764327'),
(9, 'Lodi', 'Via San Francesco', 26900, 9, '698765438'),
(10, 'Mantova', 'Via Brescia', 46100, 10, '598754329');


INSERT INTO orarioApertura (nomeGiorno, codiceLabEsterno, oraApertura, oraChiusura) VALUES 
('Lunedì', 1, '08:00:00.000', '18:00:00.000'), 
('Martedì', 1, '10:00:00.000', '18:00:00.000'),
('Mercoledì', 1, '08:00:00.000', '18:00:00.000'), 
('Giovedì', 1, '08:00:00.000', '18:00:00.000'),
('Venerdì', 1, '08:00:00.000', '20:00:00.000'),
('Sabato', 1, '07:00:00.000', '23:00:00.000'),
('Domenica', 1, '07:00:00.000', '20:00:00.000'),
('Lunedì', 2, '08:00:00.000', '18:00:00.000'), 
('Martedì', 2, '10:00:00.000', '18:00:00.000'),
('Mercoledì', 2, '08:00:00.000', '18:00:00.000'), 
('Giovedì', 2, '10:00:00.000', '18:00:00.000'),
('Venerdì', 2, '08:00:00.000', '20:00:00.000'),
('Sabato', 2, '07:00:00.000', '23:00:00.000'),
('Domenica', 2, '07:00:00.000', '23:00:00.000'),
('Lunedì', 3, '08:00:00.000', '18:00:00.000'), 
('Martedì', 3, '10:00:00.000', '18:00:00.000'),
('Mercoledì', 3, '08:00:00.000', '18:00:00.000'), 
('Giovedì', 3, '08:00:00.000', '19:00:00.000'),
('Venerdì', 3, '08:00:00.000', '20:00:00.000'),
('Sabato', 3, '07:00:00.000', '23:00:00.000'),
('Domenica', 3, '07:00:00.000', '20:00:00.000');


INSERT INTO Esame (codiceEsame, descrizione, costoPrivato, costoAssistenza) VALUES
(1, 'Visita Ginecologica', 150, 100),
(2, 'Esame del Sangue', 100, 70),
(3, 'Risonanza Magnetica', 200, 150),
(4, 'Ecografia', 120, 90),
(5, 'Visita Cardiologica', 160, 110);

INSERT INTO EsameSpecialistico (codiceEsame, avvertenze) VALUES
(1,  'Presentarsi a digiuno'),
(2,  'Bere molta acqua'),
(3,  'Non bere caffè'),
(4, 'Evitare cibi grassi'),
(5, 'Non fumare');


INSERT INTO Prenotazione(codiceEsame, DataOraEsame, Pazientevisita, dataPrenotazione, urgenza, numeroStanza, nomereparto, ospedale, codiceLabEsterno, RegimePrivato, MedicoPrescrittore) VALUES
(1, '2024-06-01', 'PZNT0001X01A123B', '2024-05-20', 'verde', 13, 'Cardiologia', 1, NULL, TRUE, 'BNCGLR95T20F205Q'),
(2, '2024-06-02', 'PZNT0002X01A123B', '2024-05-21', 'giallo', 11, 'Ortopedia', 1, NULL, FALSE, NULL),
(3, '2024-06-03', 'PZNT0003X01A123B', '2024-05-22', 'rosso', 12, 'Pediatria', 1, NULL, TRUE, 'RSSGRL87C01F205A'),
(4, '2024-06-04', 'PZNT0004X01A123B', '2024-05-23', 'verde', 13, 'Cardiologia', 1, NULL, FALSE, NULL),
(5, '2024-06-05', 'PZNT0005X01A123B', '2024-05-24', 'giallo', NULL , NULL, NULL , 1, TRUE, 'NCLLRA88E15F205B');

INSERT INTO collabora (ospedale, codiceLabEsterno) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6);


INSERT INTO ProntoSoccorso (PS) VALUES
(1),
(3);


INSERT INTO TurnoPS (personaleSanitario, ospedale, inizioTurno, fineTurno) VALUES
('BNCGLR95T20F205Q', 1, '2024-06-01 08:00:00', '2024-06-01 14:00:00'),
('RSSGRL87C01F205A', 1, '2024-06-01 14:00:00', '2024-06-01 20:00:00'),
('NCLLRA88E15F205B', 2, '2024-06-01 08:00:00', '2024-06-01 14:00:00'),
('VRDGPP90S20H501D', 2, '2024-06-01 14:00:00', '2024-06-01 20:00:00'),
('FRNLRA89A01F205J', 3, '2024-06-01 08:00:00', '2024-06-01 14:00:00'),
('MNLGRL91E15F205M', 3, '2024-06-01 14:00:00', '2024-06-01 20:00:00'),
('BNCGLR96T20F205P', 4, '2024-06-01 08:00:00', '2024-06-01 14:00:00'),
('RSSMRA81M01H501L', 4, '2024-06-01 14:00:00', '2024-06-01 20:00:00'),
('BNCLRA82E15F205G', 1, '2024-06-02 08:00:00', '2024-06-02 14:00:00'),
('VRDGPP85S20H501E', 1, '2024-06-02 14:00:00', '2024-06-02 20:00:00');
