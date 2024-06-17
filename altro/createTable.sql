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
    ospedale INT REFERENCES Ospedale (codice) ON UPDATE CASCADE,
    piano INT NOT NULL,
    telefono VARCHAR(20) UNIQUE NOT NULL,
    giorno VARCHAR(16) NOT NULL REFERENCES GiornoSettimana (nomeGiorno) ON UPDATE CASCADE,
    oraInizioVisita TIME(3) NOT NULL,
    oraFineVisita TIME(3) NOT NULL,
    CHECK (oraFineVisita > oraInizioVisita),
    PRIMARY KEY (nomeReparto, ospedale)
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
    nomeReparto VARCHAR(20),
    ospedale INT,
    FOREIGN KEY (ospedale, nomeReparto) REFERENCES Reparto (ospedale, nomeReparto) ON UPDATE CASCADE
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
    ospedale INT NOT NULL,
    FOREIGN KEY (ospedale, nomeReparto) REFERENCES Reparto (ospedale, nomeReparto) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE VicePrimario (
    codiceFiscale CHAR(17) REFERENCES PersonaleMedico (codiceFiscale) ON UPDATE CASCADE,
    dataPromozione DATE NOT NULL,
    nomeReparto VARCHAR(30) NOT NULL,
    ospedale INT NOT NULL,
    FOREIGN KEY (ospedale, nomeReparto) REFERENCES Reparto (ospedale, nomeReparto) ON UPDATE CASCADE,
    PRIMARY KEY (codiceFiscale)
);

CREATE TABLE Specializzazione (nome VARCHAR(20) PRIMARY KEY);

CREATE TABLE qualifica (
    primario CHAR(17) REFERENCES Primario (codiceFiscale) ON UPDATE CASCADE,
    nome VARCHAR(20) REFERENCES Specializzazione (nome) ON UPDATE CASCADE,
    PRIMARY KEY (nome, primario)
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
    ospedale INT,
    numeroLettiOccupati INT,
    numeroLettiLiberi INT,
    FOREIGN KEY (ospedale , nomeReparto) REFERENCES Reparto (ospedale, nomeReparto) ON UPDATE CASCADE,
    PRIMARY KEY (numeroStanza, nomeReparto, ospedale)
);

CREATE TABLE PazienteRicoverato (
    codiceFiscale CHAR(17),
    dataRicovero DATE,
    dataDimissione DATE,
    CHECK (
        dataDimissione IS NULL
        OR dataDimissione >= dataRicovero),
    numeroStanza INT NOT NULL,
    nomeReparto VARCHAR(30) NOT NULL,
    ospedale INT NOT NULL,
    FOREIGN KEY (numeroStanza, nomeReparto, ospedale) REFERENCES Stanza (numeroStanza, nomeReparto, ospedale) ON UPDATE CASCADE,
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
    ospedale INT,
    FOREIGN KEY (ospedale, nomeReparto) REFERENCES Reparto (ospedale, nomeReparto) ON UPDATE CASCADE,
    PRIMARY KEY (numeroSalaOperatoria, nomeReparto, ospedale)
);

CREATE TABLE LaboratorioInterno (
    ospedale  INT,
    numeroStanza INT,
    nomeReparto VARCHAR(30),
    PRIMARY KEY (ospedale , nomeReparto, numeroStanza),
    FOREIGN KEY (numeroStanza, nomeReparto, ospedale ) REFERENCES Stanza (numeroStanza, nomeReparto, ospedale) ON UPDATE CASCADE
);

CREATE TABLE LaboratorioEsterno (
    codiceLabEsterno INT PRIMARY KEY,
    città VARCHAR(40) NOT NULL,
    via VARCHAR(40) NOT NULL,
    CAP INT NOT NULL,
    numeroCivico INT NOT NULL,
    telefono VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE orarioApertura (
    nomeGiorno VARCHAR(10) REFERENCES GiornoSettimana (nomeGiorno) ON UPDATE CASCADE,
    codiceLabEsterno INT REFERENCES LaboratorioEsterno (codiceLabEsterno) ON UPDATE CASCADE,
    oraApertura TIME(3) NOT NULL,
    oraChiusura TIME(3) NOT NULL,
    CHECK (oraChiusura > oraApertura),
    PRIMARY KEY (nomeGiorno, codiceLabEsterno)
);

CREATE TABLE Esame (
    codiceEsame INT PRIMARY KEY,
    descrizione VARCHAR(80) NOT NULL,
    costoAssistenza INT NOT NULL,
    costoPrivato INT NOT NULL
  );

CREATE TABLE EsameSpecialistico (
    codiceEsame INT REFERENCES Esame(codiceEsame) ON UPDATE CASCADE,
    avvertenze VARCHAR(100),
    PRIMARY KEY (codiceEsame)
);

CREATE TABLE Prenotazione (
codiceEsame INT REFERENCES Esame(codiceEsame),
dataOraEsame TIMESTAMP(3),
pazienteVisita VARCHAR(17),
dataPrenotazione TIMESTAMP(3) NOT NULL,
    	CHECK (dataPrenotazione <= dataOraEsame),
urgenza FasciaUrgenza NOT NULL, 
numeroStanza INT, 
nomeReparto VARCHAR(30), 
ospedale INT, 
codiceLabEsterno INT REFERENCES LaboratorioEsterno(codiceLabEsterno) ,
regimePrivato BOOLEAN NOT NULL,
-- RegimePrivato TRUE = costoPrivato, FALSE = costoAssistenza
MedicoPrescrittore VARCHAR(17) REFERENCES PersonaleMedico (codiceFiscale),
PRIMARY KEY(codiceEsame, dataOraEsame, pazientevisita),
FOREIGN KEY (numeroStanza, nomeReparto, ospedale) REFERENCES Stanza(numeroStanza, nomeReparto, ospedale) ON UPDATE CASCADE
);

CREATE TABLE collabora (
    ospedale INT REFERENCES Ospedale (codice) ON UPDATE CASCADE,
    codiceLabEsterno INT REFERENCES LaboratorioEsterno (codiceLabEsterno) ON UPDATE CASCADE,
    PRIMARY KEY (ospedale, codiceLabEsterno)
);

CREATE TABLE ProntoSoccorso (
    PS INT REFERENCES Ospedale (codice) ON UPDATE CASCADE,
    PRIMARY KEY (PS)
);

CREATE TABLE TurnoPS (
    personaleSanitario CHAR(17) REFERENCES PersonaleSanitario (codiceFiscale) ON UPDATE CASCADE,
    ospedale INT REFERENCES Ospedale (codice) ON UPDATE CASCADE,
    inizioTurno TIMESTAMP(3) NOT NULL,
    fineTurno TIMESTAMP(3),
    CHECK (
        fineTurno IS NULL
        OR fineTurno > inizioTurno
    ),
    PRIMARY KEY (personaleSanitario, ospedale, inizioTurno)
);
