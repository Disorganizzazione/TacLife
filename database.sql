

create table utenti(
    id  integer primary KEY,
    utente VARCHAR(100) not null,
    passw VARCHAR(100) not null,
    dataN DATE not NULL,
    privilegi boolean not null default false
) ;

create table cicli(
    id  integer primary key,
    nome VARCHAR(100) not null,
    descr VARCHAR(1000)
);

create table esercizi(
    id  integer primary key,
    nome VARCHAR(100) not null,
    obiettivo VARCHAR(100) not NULL
);

create table sequenza(
    ciclo integer references cicli on delete cascade,
    esercizio integer references esercizi on delete cascade,
    primary key (ciclo, esercizio)
);