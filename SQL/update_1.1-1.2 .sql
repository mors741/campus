ALTER TABLE `users` ADD `contacts` VARCHAR(64) NULL COMMENT 'Телефонный номер (номера) пользователя' ;
ALTER TABLE `orders` DROP FOREIGN KEY `loc_fkey`;
ALTER TABLE `orders` DROP `loc`;
--
TRUNCATE TABLE `address`;
INSERT INTO `address` (`city`, `street`, `house`, `id`) VALUES
('г. Москва', 'Каширское шоссе', 'д.31', 0),
('г. Москва', 'ул. Москворечье', 'д.2, к.1', 1),
('г. Москва', 'ул. Москворечье', 'д.2, к.2', 2),
('г. Москва', 'ул. Москворечье', 'д.19, к.3', 3),
('г. Москва', 'ул. Москворечье', 'д.19, к.4', 4),
('г. Москва', 'ул. Кошкина', 'д.11, к.1', 5),
('г. Москва', 'ул. Шкулева', 'д.27, ст.2', 6),
('г. Москва', 'ул. Пролетарский проспект', 'д.8, к.2', 7);
--
TRUNCATE TABLE `area`;
INSERT INTO `area` (`staff_id`, `address_id`, `start`, `exp`) VALUES
(1, 1, '2015-11-10', NULL),
(1, 2, '2015-11-10', NULL),
(2, 2, '2015-11-10', NULL),
(3, 2, '2015-11-10', NULL);
--
TRUNCATE TABLE `orders`;
INSERT INTO `orders` (`id`, `owner`, `description`, `serv`, `ordate`, `timeint`, `state`, `ts`) VALUES
(1, 2, 'Потек унитаз', 1, '2015-11-11', 1, 'waiting', '16:05:26');
--
TRUNCATE TABLE `service`;
INSERT INTO `service` (`id`, `name`, `description`) VALUES
(1, 'Сантехник', ''),
(2, 'Электрик', ''),
(3, 'Плотник', '');
--
TRUNCATE TABLE `staff`;
INSERT INTO `staff` (`uid`, `sid`, `exp`, `start`, `id`, `post`) VALUES
(5, 1, NULL, '2015-11-10', 1, 'Пост'),
(8, 1, NULL, '2015-11-10', 2, 'Пост'),
(9, 1, NULL, '2015-11-10', 3, 'Пост');
--
TRUNCATE TABLE `users`;
INSERT INTO `users` (`id`, `name`, `surname`, `patronymic`, `login`, `passwd`, `mail`, `home`, `room`, `role`, `bdate`, `floor`, `gender`, `picture`, `contacts`) VALUES
(1, 'Админ', 'Админов', 'Админович', 'admin@campus.mephi.ru', '21232f297a57a5a743894a0e4a801fc3', 'admin@campus.mephi.ru', 1, 1, 'admin', NULL, NULL, 'М', NULL, NULL),
(2, 'Олежка', 'Судаков', NULL, 'campus@campus.mephi.ru', '162832ab572046b2dd00c343cf5096c7', 'campus@campus.mephi.ru', 2, 2, 'campus', NULL, NULL, NULL, NULL, NULL),
(3, 'Иван', 'Макеев', 'Станиславович', 'local@campus.mephi.ru', 'f5ddaf0ca7929578b408c909429f68f2', 'local@campus.mephi.ru', 0, 0, 'local', '1995-02-24', NULL, 'М', NULL, NULL),
(4, 'Настя', 'Косткина', 'Дмитриевна', 'moder@campus.mephi.ru', '9ab97e0958c6c98c44319b8d06b29c94', 'moder@campus.mephi.ru', 4, 4, 'moder', NULL, NULL, 'Ж', NULL, NULL),
(5, 'Илью-сантехник', 'Романов', NULL, 'staff@campus.mephi.ru', '1253208465b1efa876f982d8a9e73eef', 'staff@campus.mephi.ru', 0, 0, 'staff', NULL, NULL, 'М', NULL, NULL),
(6, 'Женька', 'Харитонов', 'Александрович', 'manage@campus.mephi.ru', '70682896e24287b0476eff2a14c148f0', 'manage@campus.mephi.ru', 4, 7, 'manage', NULL, NULL, 'М', NULL, NULL),
(7, 'Саня', 'Нестеров', NULL, 'campus1@campus.mephi.com', '162832ab572046b2dd00c343cf5096c7', 'campus1@campus.mephi.com', 3, 33, 'campus', NULL, NULL, 'М', NULL, NULL),
(8, 'Диман', 'Коротких', NULL, 'staff1@campus.mephi.ru', '1253208465b1efa876f982d8a9e73eef', 'staff1@campus.mephi.ru', 1, 10, 'staff', NULL, NULL, NULL, NULL, NULL),
(9, 'Саня', 'Савельев', NULL, 'staff2@campus.mephi.ru', '1253208465b1efa876f982d8a9e73eef', 'staff2@campus.mephi.ru', 6, 6, 'staff', NULL, NULL, NULL, NULL, NULL);