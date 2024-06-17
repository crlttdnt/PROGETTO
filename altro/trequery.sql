Interrogazioni:
a. Determinare i vice primari che hanno sostituito esattamente una volta il proprio 
primario 

    SELECT vp.codiceFiscale AS VicePrimario, p.nome, p.cognome
    FROM sostituisce s
        JOIN VicePrimario vp ON s.VicePrimario = vp.codiceFiscale
        JOIN PersonaleMedico pm ON s.VicePrimario = pm.codiceFiscale
        JOIN Personale p ON pm.codiceFiscale = p.codiceFiscale
    GROUP BY vp.codiceFiscale, p.nome, p.cognome
    HAVING COUNT(*) = 1


b. Determinare i vice primari che hanno sostituito almeno due volte il proprio primario 
    SELECT vp.codiceFiscale AS VicePrimario, p.nome, p.cognome
    FROM sostituisce s                   
        JOIN VicePrimario vp ON s.VicePrimario = vp.codiceFiscale
        JOIN PersonaleMedico pm ON s.VicePrimario = pm.codiceFiscale
        JOIN Personale p ON pm.codiceFiscale = p.codiceFiscale
    GROUP BY vp.codiceFiscale, p.nome, p.cognome
    HAVING COUNT(*) >= 2


c. Determinare i vice primari che non hanno mai sostituito il proprio primario
    SELECT vp.codiceFiscale AS VicePrimario, p.nome, p.cognome
    FROM VicePrimario vp
        JOIN PersonaleMedico pm ON vp.codiceFiscale = pm.codiceFiscale
        JOIN Personale p ON pm.codiceFiscale = p.codiceFiscale
    EXCEPT 
    SELECT s.VicePrimario, p.nome, p.cognome
    FROM sostituisce s
        JOIN PersonaleMedico pm ON s.VicePrimario = pm.codiceFiscale
        JOIN Personale p ON pm.codiceFiscale = p.codiceFiscale




Nuove Query:
a. Volontari con maggior numero di Presenze (????)

    SELECT Volontario, COUNT(*) AS NumeroPresenze
    FROM PresenzaVol
    GROUP BY Volontario
    ORDER BY NumeroPresenze DESC;

OPPURE (no):
    SELECT Volontario
    FROM PresenzaVol
    GROUP BY Volontario
    HAVING COUNT(*) > 1

b. Medici che hanno seguito nel tempo almeno 5 volontari differenti
    SELECT MedicoSupervisore
    FROM PresenzaVol
    GROUP BY MedicoSupervisore
    HAVING COUNT(DISTINCT Volontario) >= 5;


c. CF dei Volontari che non hanno mai svolto attività con codice 123
    SELECT CF
    FROM Volontario
    EXCEPT (
        SELECT p.Volontario
        FROM PresenzaVol p JOIN Volontario v ON p.Volontario=v.CF
        WHERE p.IDAttività = 123
);

d. CF dei Volontari che non hanno mai svolto attività con selezione
    SELECT CF
    FROM Volontario
    WHERE CF NOT IN (
        SELECT p.volontario
        FROM PresenzaVol p
        WHERE p.idattività = $idattivita
    );




