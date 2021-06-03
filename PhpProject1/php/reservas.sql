/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  PAULA
 * Created: 30 may. 2021
 */


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Table structure for table `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
`tipo` varchar(20) NOT NULL,
  `telefono` varchar(50) NOT NULL,
 `hora` time(6) NOT NULL,
 `fecha` DATE NOT NULL,
  `id_usuario` int(11) NOT NULL,
`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reserva`),
FOREIGN KEY (id_usuario) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
