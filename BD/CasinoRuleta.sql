create database CasinoRuleta;

use CasinoRuleta;

create table Jugadores(
	idJugador int primary key auto_increment,
    nombres varchar(50),
    apellidos varchar(50),
    fechaNacimiento date,
    usuairo varchar(15),
    contrasena varchar(200),
    foto varchar(300),
    puntaje int unsigned
);
select * from Jugadores;

UPDATE Jugadores SET puntaje = 1000 WHERE idJugador = 1;
UPDATE Jugadores SET puntaje = 1500 WHERE idJugador = 2;
UPDATE Jugadores SET puntaje = 800 WHERE idJugador = 3;
