DROP TABLE category;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO category VALUES("1","Diaria");
INSERT INTO category VALUES("2","Semanal");
INSERT INTO category VALUES("3","Mensual");
INSERT INTO category VALUES("4","Trimestral");


DROP TABLE hour;

CREATE TABLE `hour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hours` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO hour VALUES("1","1");
INSERT INTO hour VALUES("2","2");
INSERT INTO hour VALUES("3","4");
INSERT INTO hour VALUES("4","8");


DROP TABLE lapse;

CREATE TABLE `lapse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ship_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `initial` datetime NOT NULL,
  `end` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `lapse_ibfk_1` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`id`),
  CONSTRAINT `lapse_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `lapse_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO lapse VALUES("1","Semana del 21 al 28 - Marzo","1","2","2023-03-21 00:00:00","2023-03-28 00:00:00","6","2023-03-14 19:09:54","2023-03-26 22:55:56");
INSERT INTO lapse VALUES("2","Semana del 27 de Febrero al 06 de Marzo","1","2","2023-02-27 00:00:00","2023-03-06 00:00:00","6","2023-03-14 19:12:51","2023-03-15 00:58:05");
INSERT INTO lapse VALUES("3","Semana del 13 al 20 de Marzo","1","2","2023-03-13 00:00:00","2023-03-20 00:00:00","6","2023-03-14 19:12:51","2023-03-15 00:58:05");
INSERT INTO lapse VALUES("4","Semana del 28 al 04 - Marzo-Abril","1","2","2023-03-28 00:00:00","2023-04-04 00:00:00","6","2023-03-25 05:00:27","2023-03-25 06:13:52");
INSERT INTO lapse VALUES("5","Período del 05 de Abril al 05 de Mayo","1","3","2023-04-05 00:00:00","2023-05-05 00:00:00","6","2023-03-26 22:58:41","2023-03-26 22:58:41");


DROP TABLE priority;

CREATE TABLE `priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;



DROP TABLE roles;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO roles VALUES("1","admin");
INSERT INTO roles VALUES("2","supervisor");
INSERT INTO roles VALUES("3","operator");
INSERT INTO roles VALUES("4","administrative");


DROP TABLE ships;

CREATE TABLE `ships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO ships VALUES("1","La Restinga");
INSERT INTO ships VALUES("2","La Caranta");


DROP TABLE status;

CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO status VALUES("1","Por hacer");
INSERT INTO status VALUES("2","En curso");
INSERT INTO status VALUES("3","Finalizada");
INSERT INTO status VALUES("4","Aprobada");


DROP TABLE tasks;

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ship_id` int(11) NOT NULL,
  `lapse_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hour_id` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`id`),
  CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`lapse_id`) REFERENCES `lapse` (`id`),
  CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `tasks_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `tasks_ibfk_6` FOREIGN KEY (`hour_id`) REFERENCES `hour` (`id`),
  CONSTRAINT `tasks_ibfk_7` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO tasks VALUES("1","Cambiar aceites","Se deben cambiar el aceite de los motores","1","1","2","3","7","2","6","2023-03-14 19:16:18","2023-03-25 12:34:04");
INSERT INTO tasks VALUES("2","Medir aceite de máquinas","Se debe medir el nivel de aceite de la maquinaria","1","1","1","3","7","1","6","2023-03-14 19:16:18","2023-03-25 12:20:06");
INSERT INTO tasks VALUES("3","Solicitar los suministros para la tripulación","Se debe realizar la solicitud de nuevos suministros de necesidad básica para el uso de la tripulación.","1","1","2","1","6","2","6","2023-03-21 04:59:22","2023-03-26 23:02:36");
INSERT INTO tasks VALUES("4","Comprobar que se haya realizado el mantenimiento de los aceiteros","Se debe comprobar que se haya ejecutado correctamente la actividad de mantenimiento realizada por los aceiteros.","1","1","1","4","6","2","6","2023-03-21 05:02:18","2023-03-26 23:02:46");
INSERT INTO tasks VALUES("5","Ajustar la cantidad de horas en uso del motor","Realizar el cálculo y comprobación necesarios para ajustar las horas que lleva activo el motor de la embarcación.","1","1","3","2","7","3","6","2023-03-21 05:05:48","2023-03-25 12:21:51");
INSERT INTO tasks VALUES("6","Titulo de tarea","Descripción...","1","1","1","4","6","2","6","2023-03-21 12:09:40","2023-03-26 23:02:45");
INSERT INTO tasks VALUES("7","Inspección del motor de los botes salvavidas","Encendido, verificación de nivel de aceite, lubricante y refrigerante, limpieza de la sentina.","1","1","2","1","7","2","6","2023-03-23 18:54:00","2023-03-24 01:20:19");
INSERT INTO tasks VALUES("8","Realizar trabajos de mantenimiento","Se deben realizar diversos trabajos de mantenimiento","1","4","1","3","7","2","6","2023-03-25 06:14:59","2023-03-26 22:56:49");
INSERT INTO tasks VALUES("9","Trabajos de limpieza de maquinaria","Se deben realizar diferentes trabajos de limpieza de maquinarias","1","4","1","1","7","1","6","2023-03-25 06:15:44","2023-03-27 22:58:39");
INSERT INTO tasks VALUES("10","Trabajos de supervisión","Se debe realizar la correspondiente supervisión de ciertas tareas","1","4","2","2","6","3","6","2023-03-25 06:16:26","2023-03-26 23:03:02");
INSERT INTO tasks VALUES("11","Revisión de motores de la embarcación","Se deben revisar los motores de la embarcación","1","4","1","1","7","2","6","2023-03-25 12:27:33","2023-03-27 22:58:38");


DROP TABLE users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `username` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `position` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO users VALUES("1","1","1","admin","$2y$10$1dv51grlW.I6ZjBEb/x04eu0Ar7FdNd/iZC6jcV3kZ/HKCUonaJsS","admin@yopmail.com","Marcelo","Millán","Administrador","04241234567");
INSERT INTO users VALUES("6","2","1","amillan","$2y$10$aIjIgDySRDqjtaGfj6m7ZuO9hIrDbiLjJ7ES9xwRgER7bma3X03nO","amillan@yopmail.com","Ángel","Millán","Jefe de Máquinas","04241234567");
INSERT INTO users VALUES("7","3","1","nleon","$2y$10$BLpOOrapQbIvzyLYL3gOpuhcJhcMxktoFCi1D7.2gxfaxXTDblF9K","nleon@yopmail.com","Noel","León","1er Oficial","04261234567");
INSERT INTO users VALUES("8","4","1","emillan","$2y$10$tThnXQoXmY9buvQTTTS4S..4MUdOBzd5i9ZahvAY3Kgqnz9WdHEcG","emillan@yopmail.com","Eddi","Millán","Administrativo","04121234567");
INSERT INTO users VALUES("9","3","0","jvalerio","$2y$10$x5/rLwG4nDXHjOIiP4czJus.I7HFGA.MNaTyMKOTx68Shrt3pZUne","jvalerio@yopmail.com","Juan","Valerio","2do Oficial","04163216547");
INSERT INTO users VALUES("10","2","1","jlopez","$2y$10$40s84d6vOyU3O1b/LmrONuAuUJ5HZK6UfOCtb8kG3q4OCst1fWUrO","jlopez@yopmail.com","Jesús","López","Jefe de Máquinas","04121234567");
INSERT INTO users VALUES("11","4","0","avelasquez","$2y$10$NY9HGZjoyluyTOyxo825N.cbZjzo/dhZS0mA4NtsxDGUG7dHhNUqe","avelasquez@yopmail.com","Álvaro","Velásquez","Empleado de Oficina","04241234567");


