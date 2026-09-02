
CREATE TABLE copies_examens (
    id SERIAL PRIMARY KEY,
    date_creation TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    note_brute DECIMAL(10,2) NOT NULL,
    note_finale DECIMAL(10,2) NOT NULL,
    penalite_appliquee BOOLEAN NOT NULL,
    date_limite TIMESTAMP NOT NULL,

    CONSTRAINT note_brute_valide CHECK (note_brute >= 0 AND note_brute <= 20),
    CONSTRAINT note_finale_valide CHECK (note_finale >= 0 AND note_finale <= 20)
);

INSERT INTO copies_examens (
    note_brute,
    note_finale,
    penalite_appliquee,
    date_limite
)
VALUES (
    15.00,
    15.00,
    FALSE,
    '2026-09-10 18:00:00'
);

SELECT * FROM copies_examens;