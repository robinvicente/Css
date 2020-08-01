
CREATE DATABASE users;
show databases ;
use users;
CREATE TABLE `users` (
    `user` varchar(30) NOT NULL,
    `pass` varchar(50) NOT NULL
);

INSERT INTO `users` (`user`, `pass`) VALUES
('ivan', 'e10adc3949ba59abbe56e057f20f883e'),
('carlos', 'e10adc3949ba59abbe56e057f20f883e'),
('carlos', 'e10adc3949ba59abbe56e057f20f883e');
