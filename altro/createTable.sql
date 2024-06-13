-- codice SQL per la creazione delle tabelle del DataBase

CREATE TYPE FasciaUrgenza AS ENUM ('rosso', 'giallo', 'verde');


CREATE TABLE Ospedale (
    codice INT PRIMARY KEY,
    nomeOspedale VARCHAR(40) NOT NULL,
    città VARCHAR(40) NOT NULL,
    via VARCHAR(40) NOT NULL,
    CAP INT NOT NULL,
    numeroCivico INT NOT NULL
);

CREATE TABLE GiornoSettimana (nomeGiorno VARCHAR(16) PRIMARY KEY);

CREATE TABLE Reparto (
    nomeReparto VARCHAR(30),
    codice INT REFERENCES Ospedale (codice) ON UPDATE CASCADE,
    piano INT NOT NULL,
    telefono VARCHAR(20) UNIQUE NOT NULL,
    giorno VARCHAR(16) NOT NULL REFERENCES GiornoSettimana (nomeGiorno) ON UPDATE CASCADE,
    oraInizioVisita TIME(3) NOT NULL,
    oraFineVisita TIME(3) NOT NULL,
    CHECK (oraFineVisita > oraInizioVisita),
    PRIMARY KEY (nomeReparto, codice)
);

CREATE TABLE Personale (
    codiceFiscale CHAR(16) PRIMARY KEY,
    anzianitaServizio INT NOT NULL,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    dataNascita DATE NOT NULL,
    città VARCHAR(40) NOT NULL,
    via VARCHAR(40) NOT NULL,
    CAP INT NOT NULL,
    numeroCivico INT NOT NULL,
    nomeReparto VARCHAR(20) NOT NULL,
    codice INT NOT NULL,
    FOREIGN KEY (codice, nomeReparto) REFERENCES Reparto (codice, nomeReparto) ON UPDATE CASCADE
);

CREATE TABLE PersonaleAmministrativo (
    codiceFiscale CHAR(17) REFERENCES Personale (codiceFiscale) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE PersonaleSanitario (
    codiceFiscale CHAR(17) REFERENCES Personale (codiceFiscale) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE PersonaleMedico (
    codiceFiscale CHAR(17) REFERENCES PersonaleSanitario (codiceFiscale) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE Infermiere (
    codiceFiscale CHAR(17) REFERENCES PersonaleSanitario (codiceFiscale) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE Primario (
    codiceFiscale CHAR(17) REFERENCES PersonaleMedico (codiceFiscale) ON UPDATE CASCADE,
    nomeReparto VARCHAR(30) NOT NULL,
    codice INT NOT NULL,
    FOREIGN KEY (codice, nomeReparto) REFERENCES Reparto (codice, nomeReparto) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE VicePrimario (
    codiceFiscale CHAR(17) REFERENCES PersonaleMedico (codiceFiscale) ON UPDATE CASCADE,
    dataPromozione DATE NOT NULL,
    nomeReparto VARCHAR(30) NOT NULL,
    codice INT NOT NULL,
    FOREIGN KEY (codice, nomeReparto) REFERENCES Reparto (codice, nomeReparto) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE Specializzazione (nome VARCHAR(20) PRIMARY KEY);

CREATE TABLE qualifica (
    codiceFiscale CHAR(17) REFERENCES PersonaleMedico (codiceFiscale) ON UPDATE CASCADE,
    nome VARCHAR(20) REFERENCES Specializzazione (nome) ON UPDATE CASCADE,
    PRIMARY KEY (nome, codiceFiscale)
);

CREATE TABLE sostituisce (
    Primario CHAR(17) REFERENCES Primario (codiceFiscale) ON UPDATE CASCADE,
    VicePrimario CHAR(17) REFERENCES VicePrimario (codiceFiscale) ON UPDATE CASCADE,
    inizioSostituzione DATE NOT NULL,
    fineSostituzione DATE,
    CHECK (fineSostituzione > inizioSostituzione),
    PRIMARY KEY (Primario, VicePrimario, inizioSostituzione)
);

CREATE TABLE Paziente (
    codiceFiscale CHAR(17) PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    dataNascita DATE NOT NULL,
    città VARCHAR(40) NOT NULL,
    via VARCHAR(40) NOT NULL,
    CAP INT NOT NULL,
    numeroCivico INT NOT NULL
);

CREATE TABLE PazienteVisita (
    codiceFiscale CHAR(17) REFERENCES Paziente (codiceFiscale) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE Stanza (
    numeroStanza INT,
    nomeReparto VARCHAR(30),
    codice INT,
    numeroLettiOccupati INT,
    numeroLettiLiberi INT,
    FOREIGN KEY (codice, nomeReparto) REFERENCES Reparto (codice, nomeReparto) ON UPDATE CASCADE,
    PRIMARY KEY (numeroStanza, nomeReparto, codice)
);

CREATE TABLE PazienteRicoverato (
    codiceFiscale CHAR(17),
    dataRicovero DATE,
    dataDimissione DATE,
    CHECK (
        dataDimissione IS NULL
        OR dataDimissione >= dataRicovero
    ),
    numeroStanza INT NOT NULL,
    nomeReparto VARCHAR(30) NOT NULL,
    codice INT NOT NULL,
    FOREIGN KEY (codice, nomeReparto) REFERENCES Reparto (codice, nomeReparto) ON UPDATE CASCADE,
    FOREIGN KEY (numeroStanza, nomeReparto, codice) REFERENCES Stanza (numeroStanza, nomeReparto, codice) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale, dataRicovero)
);

CREATE TABLE Patologia (descrizione VARCHAR(50) PRIMARY KEY);

CREATE TABLE Diagnosi (
    codiceFiscale CHAR(17),
    dataRicovero DATE,
    descrizione VARCHAR(50),
    FOREIGN KEY (codiceFiscale, dataRicovero) REFERENCES PazienteRicoverato (codiceFiscale, dataRicovero) ON UPDATE CASCADE,
    FOREIGN KEY (descrizione) REFERENCES Patologia (descrizione) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale, dataRicovero, descrizione)
);

CREATE TABLE SalaOperatoria (
    numeroSalaOperatoria INT,
    nomeReparto VARCHAR(30),
    codice INT,
    FOREIGN KEY (codice, nomeReparto) REFERENCES Reparto (codice, nomeReparto) ON UPDATE CASCADE,
    PRIMARY KEY (numeroSalaOperatoria, nomeReparto, codice)
);

CREATE TABLE LaboratorioInterno (
    codiceOspedale INT,
    numeroStanza INT,
    nomeReparto VARCHAR(30),
    PRIMARY KEY (codiceOspedale, nomeReparto, numeroStanza),
    FOREIGN KEY (numeroStanza, nomeReparto, codiceOspedale) REFERENCES Stanza (numeroStanza, nomeReparto, codice) ON UPDATE CASCADE,
    FOREIGN KEY (codiceOspedale, nomeReparto) REFERENCES Reparto (codice, nomeReparto) ON UPDATE CASCADE
);

CREATE TABLE LaboratorioEsterno (
    codice INT PRIMARY KEY,
    città VARCHAR(40) NOT NULL,
    via VARCHAR(40) NOT NULL,
    CAP INT NOT NULL,
    numeroCivico INT NOT NULL,
    telefono VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE orarioApertura (
    nomeGiorno VARCHAR(10) REFERENCES GiornoSettimana (nomeGiorno) ON UPDATE CASCADE,
    codiceLabEsterno INT REFERENCES LaboratorioEsterno (codice) ON UPDATE CASCADE,
    oraApertura TIME(3) NOT NULL,
    oraChiusura TIME(3) NOT NULL,
    CHECK (oraChiusura > oraApertura),
    PRIMARY KEY (nomeGiorno, codiceLabEsterno)
);

CREATE TABLE Esame (
    codice INT,
    dataEsame DATE,
    pazienteVisita CHAR(17) REFERENCES PazienteVisita (codiceFiscale) ON UPDATE CASCADE,
    dataPrenotazione DATE NOT NULL,
    CHECK (dataPrenotazione <= dataEsame),
    urgenza FasciaUrgenza NOT NULL,
    descrizione VARCHAR(80) NOT NULL,
    oraEsame TIME(3) NOT NULL,
    codiceOspedale INT,
    nomeReparto VARCHAR(30),
    numeroStanza INT,
    codiceLabEsterno INT REFERENCES LaboratorioEsterno (codice) ON UPDATE CASCADE,
    PRIMARY KEY (codice, dataEsame, pazienteVisita),
    FOREIGN KEY (codiceOspedale, nomeReparto, numeroStanza) REFERENCES LaboratorioInterno (codiceOspedale, nomeReparto, numeroStanza) ON UPDATE CASCADE
);

CREATE TABLE EsameSpecialistico (
    codice INT,
    dataEsame DATE,
    pazienteVisita CHAR(17),
    avvertenze VARCHAR(100),
    costoPrivato INT NOT NULL,
    personaleMedico CHAR(17) REFERENCES PersonaleMedico (codiceFiscale) ON UPDATE CASCADE,
    FOREIGN KEY (codice, dataEsame, pazienteVisita) REFERENCES Esame (codice, dataEsame, pazienteVisita) ON UPDATE CASCADE,
    PRIMARY KEY (codice, dataEsame, pazienteVisita)
);

CREATE TABLE EsameNonSpecialistico (
    codice INT,
    dataEsame DATE,
    pazienteVisita CHAR(17),
    costoAssistenza INT NOT NULL,
    FOREIGN KEY (codice, dataEsame, pazienteVisita) REFERENCES Esame (codice, dataEsame, pazienteVisita) ON UPDATE CASCADE,
    PRIMARY KEY (codice, dataEsame, pazienteVisita)
);

CREATE TABLE collaborazione (
    codice INT REFERENCES Ospedale (codice) ON UPDATE CASCADE,
    codiceLabEsterno INT REFERENCES LaboratorioEsterno (codice) ON UPDATE CASCADE,
    PRIMARY KEY (codice, codiceLabEsterno)
);

CREATE TABLE ProntoSoccorso (
    codice INT REFERENCES Ospedale (codice) ON UPDATE CASCADE,
    PRIMARY KEY (codice)
);

CREATE TABLE TurnoPS (
    personaleSanitario CHAR(17) REFERENCES PersonaleSanitario (codiceFiscale) ON UPDATE CASCADE,
    codice INT REFERENCES Ospedale (codice) ON UPDATE CASCADE,
    inizioTurno TIMESTAMP(3) NOT NULL,
    fineTurno TIMESTAMP(3),
    CHECK (
        fineTurno IS NULL
        OR fineTurno > inizioTurno
    ),
    PRIMARY KEY (personaleSanitario, codice, inizioTurno)
);