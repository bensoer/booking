CREATE TABLE `apikeys` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `apikey` varchar(256) COMMENT 'stored as sha256 hash',
  `user` int,
  `expires` datetime COMMENT 'set to NULL to mean forever. This will mean no expiry'
);

CREATE TABLE `sessions` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `token` varchar(256) COMMENT 'stored as sha256 hash',
  `expires` datetime,
  `user` int
);

CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `firstname` text,
  `lastname` text,
  `email` text,
  `password` char(256) COMMENT 'sha256 hash password',
  `about` text,
  `phone` varchar(10)
);

CREATE TABLE `roles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `name` varchar(50),
  `description` text
);

CREATE TABLE `userroles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `user` int,
  `role` int
);

CREATE TABLE `bookingusers` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `booking` int,
  `user` int
);

CREATE TABLE `bookings` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `bookingdate` datetime,
  `type` int
);

CREATE TABLE `bookingtype` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `name` varchar(50),
  `description` text
);

CREATE TABLE `bookingpackage` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `booking` int,
  `package` int
);

CREATE TABLE `packages` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guid` guid,
  `name` varchar(50),
  `description` text,
  `price` long
);

ALTER TABLE `apikeys` ADD FOREIGN KEY (`user`) REFERENCES `users` (`id`);

ALTER TABLE `sessions` ADD FOREIGN KEY (`user`) REFERENCES `users` (`id`);

ALTER TABLE `userroles` ADD FOREIGN KEY (`user`) REFERENCES `users` (`id`);

ALTER TABLE `userroles` ADD FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

ALTER TABLE `bookingusers` ADD FOREIGN KEY (`booking`) REFERENCES `bookings` (`id`);

ALTER TABLE `bookingusers` ADD FOREIGN KEY (`user`) REFERENCES `users` (`id`);

ALTER TABLE `bookings` ADD FOREIGN KEY (`type`) REFERENCES `bookingtype` (`id`);

ALTER TABLE `bookingpackage` ADD FOREIGN KEY (`booking`) REFERENCES `bookings` (`id`);

ALTER TABLE `bookingpackage` ADD FOREIGN KEY (`package`) REFERENCES `packages` (`id`);
