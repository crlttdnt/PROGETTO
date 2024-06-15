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





