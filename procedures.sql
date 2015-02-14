--PROC Estado Lampada
DELIMITER $$
CREATE PROCEDURE `estado_lampada` (IN num_lampada INT)
   BEGIN
       SELECT *
       FROM  `ligarLuzViaArduino` 
       WHERE id_lampada = num_lampada;
   END $$

--PROC liga Lampada
DELIMITER $$
CREATE PROCEDURE `liga_lampada` (IN num_lampada INT)
   BEGIN
        UPDATE `ligarLuzViaArduino` 
        SET `ligada`= 1 
        WHERE id_lampada = num_lampada;
   END $$

--PROC Estado Lampada
DELIMITER $$
CREATE PROCEDURE `desliga_lampada` (IN num_lampada INT)
   BEGIN
        UPDATE `ligarLuzViaArduino` 
        SET `ligada`= 0
        WHERE id_lampada = num_lampada;
   END $$

call estado_lampada(1)
call liga_lampada(1)
call desliga_lampada(1)