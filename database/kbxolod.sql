-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 22 2024 г., 10:36
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kbxolod`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID` int NOT NULL,
  `PARENT` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `TEXT` text NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID`, `PARENT`, `NAME`, `TEXT`, `SRC`) VALUES
(1, 0, 'Каталог профессионального холодильного оборудования', 'Компания КБхолод поставляет холодильное промышленное оборудование для небольших магазинов и супермаркетов, а также установки генерации низких температур для крупных предприятий. У нас есть все то, что обеспечит сохранность продукции и представит ее покупателям с самой лучшей стороны. Наши горки, витрины, шкафы послужат наилучшим обрамлением товаров в вашем магазине, предоставляя свободный доступ к ним.\r\n\r\nВсе изделия созданы в полном соответствии требованиям Госстандарта. Они удобны и надежны в использовании, отличаются современным внешним видом и конструкцией с передовыми технологиями и материалами.\r\n\r\nВаш заказ будет выполнен в максимально короткие сроки, так как наличие запасов холодильного оборудования на складе позволяет нам оперативно работать на взаимовыгодных условиях. Менеджеры компании КБхолод помогут Вам узнать все подробности о моделях агрегатов, условиях продажи и ценах.', ''),
(2, 1, 'Холодильные шкафы', 'Предлагаем купить холодильные шкафы для заведений общепита и магазинов. В каталоге оборудование разделено по функциональному назначению. Мы гарантируем надежность и высокое качество предлагаемой продукции. Наши менеджеры готовы помочь вам в выборе продукции и ответят на все интересующие вас вопросы.', 'img/category/65fc90c032205.jpg'),
(3, 2, 'Шкафы холодильные (0... +15)', 'Профессиональные холодильные шкафы — усиленные конструкции, которые, по сравнению с бытовой техникой, служат намного дольше. Для увеличения эксплуатационного периода они требуют регулярного обслуживания. Чтобы купить холодильный шкаф, определитесь с видом и техническими характеристиками.', 'img/category/65fc91be9cc76.jpg'),
(4, 1, 'Витрины', 'В нашем каталоге представлены холодильные витрины для магазинов, кафе и прочее оборудование, которое выгодно покажет Ваш товар покупателю и сохранит его свежим на долгое время. Всегда в ассортименте устройства различного назначения – для овощей и фруктов, молочных продуктов и деликатесов, кондитерских товаров и десертов. Есть возможность подобрать технику холода по размерам, мощности и холодопроизводительности.', 'img/category/65fc91ea8ff0b.jpg'),
(5, 1, 'Лари морозильные', 'Предлагаем купить морозильные лари с горизонтальной компоновкой по выгодным ценам в Санкт-Петербурге. Их используют для хранения продуктов при низких температурах, а так же в качестве торгового оборудования с прозрачными крышками для демонстрации содержимого или на предприятиях пищевого производства.\r\n\r\nПредставленные морозильные камеры разных размеров, поэтому воспользуйтесь фильтром в каталоге. Выбор осуществляется по параметрам: ширина, высота, глубина, тип крышки и объему.', 'img/category/65fc921f54eaf.jpg'),
(6, 2, 'Шкафы универсальные (-6...+6)', 'Каталог универсальных холодильных шкафов от ведущих производителей для магазинов, ресторанов, баров и других предприятий общепита. Их называют так за температурный диапазон, он регулируется от -5 до +5 градусов Цельсия. Продажа в Санкт-Петербурге и в других регионах. У вас есть возможность выбрать и заказать холодильное оборудование прямо на сайте интернет магазина.', 'img/category/65fc9254cfbe5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category-index`
--

CREATE TABLE `category-index` (
  `ID` int NOT NULL,
  `CATID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category-index`
--

INSERT INTO `category-index` (`ID`, `CATID`) VALUES
(10, 2),
(12, 6),
(13, 4),
(14, 5),
(16, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int NOT NULL,
  `USERID` int NOT NULL,
  `AMOUNT` int NOT NULL,
  `INFO` text NOT NULL,
  `FILE` varchar(255) NOT NULL,
  `STATUS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID`, `USERID`, `AMOUNT`, `INFO`, `FILE`, `STATUS`) VALUES
(5, 1, 15631, 'ФИО: Иванов Иван\nОрганизация: ГУМРФ\nТелефон: 8-999-999-99-99\nEmail address: ivan@gumrf.ru\nКомментарий к заказу: ', '', 2),
(6, 1, 36376, 'ФИО: Иванов Иван\nОрганизация: ГУМРФ\nТелефон: 8-999-999-99-99\nEmail address: ivan@gumrf.ru\nКомментарий к заказу: Доставка в организацию', 'database/files/65fd17a568652.txt', 1),
(8, 1, 88383, 'ФИО: Иванов Иван\r\nОрганизация: ГУМРФ\r\nТелефон: 8-999-999-99-99\r\nEmail address: ivan@gumrf.ru\r\nКомментарий к заказу: ', 'database/files/65fd29debdbbd.txt', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE `order_item` (
  `ID` int NOT NULL,
  `IDORDER` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `VALUE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`ID`, `IDORDER`, `NAME`, `VALUE`) VALUES
(5, 5, 'Холодильник EQTA BRD49 барный', 1),
(6, 6, 'Холодильный шкаф GASTRORAG BC-42B', 1),
(9, 8, 'Холодильник EQTA BRD49 барный', 3),
(10, 8, 'Холодильный шкаф GASTRORAG BC-42B', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `CATID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PRICE` int NOT NULL,
  `BRAND` varchar(255) NOT NULL,
  `XSIZE` int NOT NULL,
  `YSIZE` int NOT NULL,
  `ZSIZE` int NOT NULL,
  `MINTEMP` varchar(255) NOT NULL,
  `MAXTEMP` varchar(255) NOT NULL,
  `VOLUME` int NOT NULL,
  `POWER` varchar(255) NOT NULL,
  `VOLTAGE` varchar(255) NOT NULL,
  `WEIGHT` int NOT NULL,
  `COLOR` varchar(255) NOT NULL,
  `TEXT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `CATID`, `NAME`, `PRICE`, `BRAND`, `XSIZE`, `YSIZE`, `ZSIZE`, `MINTEMP`, `MAXTEMP`, `VOLUME`, `POWER`, `VOLTAGE`, `WEIGHT`, `COLOR`, `TEXT`) VALUES
(1, 3, 'Холодильник EQTA BRD49 барный', 15631, 'EQTA', 440, 500, 525, '0', '10', 49, '0.85', '220', 16, 'Белый', 'Барный холодильник EQTA BRD49 предназначен для охлаждения и длительного хранения продуктов и напитков. \r\nХолодильник идеально подходит для зоны бара, а также может быть установлен в качестве минибара в гостиницах, отелях, хостелах.\r\nМодель оснащена регулируемым термостатом, одной полкой и двумя отделениями на двери для хранения бутылок. \r\nУдобное механическое управление.\r\nМеталлический корпус белого цвета.\r\nГлухая дверь без замка. \r\nУровень шума составляет 42 dB.'),
(17, 3, 'Холодильный шкаф GASTRORAG BC-42B', 20745, 'Gastrorag', 420, 420, 500, '5', '15', 42, '0.07', '220', 20, 'Белый', 'Холодильный шкаф, термоэлектрический (без компрессора), вентилируемый, no frost, 1 двусторонняя дверца, 2 полки-решетки, подсветка, цвет белый, эмалированная .сталь/пластмасса'),
(18, 3, 'Холодильный шкаф витринного типа GASTRORAG BC98-MS', 51098, 'Gastrorag', 480, 475, 850, '0', '10', 98, '0.092', '220', 40, 'черный', '0...+10°C, 98 л, 1 распашная стеклянная дверца, подсветка, 2 полки-решетки, цвет черный'),
(19, 3, 'Холодильный шкаф Turbo Air FRS-145R', 61903, 'Turbo Air', 589, 486, 879, '0', '8', 133, '0.075', '220', 35, 'Серый', 'Корпус: гальванизированная сталь\r\nИсполнение: стеклянные двери\r\nКоличество дверей: 1\r\nКоличество полок: 4\r\nРасположение компрессора: нижнее\r\nТип охлаждения: статический\r\nТип хладагента: R-134A / R-404A\r\nУправление: аналоговое\r\nКлиматический класс: Т(5) +45 °C\r\nВес: 35 кг\r\nСтрана производства: Южная Корея\r\nГарантия: 2 года'),
(20, 3, 'Шкаф холодильный KAYMAN K500-БСВ', 80437, 'KAYMAN', 660, 695, 2110, '0', '7', 580, '0.39', '220', 115, 'Серый', 'Шкаф холодильный KAYMAN K500-БСВ со стеклянной дверью предназначен для кратковременного хранения, демонстрации и продажи, предварительно охлажденных до температуры охлаждаемого объема, пищевых продуктов и напитков. Шкаф с нижним расположением агрегата.\r\n\r\nДополнительные характеристики:\r\n\r\nКомпрессор Secop / Embraco / Tecumseh\r\nКонтроллер Carel / Danfoss\r\nРазмораживание автоматическое\r\nПолезный объём: 560 л\r\nВнутренний объем: 580 л\r\nМаксимальная загрузка: бутылки 0,5 л. / банок 0,33 л (шт) 328 / 752\r\nХладагент: R290\r\nУровень шума: 48 дБА'),
(21, 3, 'Холодильный шкаф Turbo Air FRS-401RNP', 135445, 'Turbo Air', 594, 600, 1870, '0', '8', 366, '0.185', '220', 76, 'Серый', 'Количество дверей: 1\r\nКоличество полок: 4\r\nРасположение компрессора: нижнее\r\nТип охлаждения: динамический\r\nТип хладагента: R-134A / R-404A\r\nУправление: аналоговое\r\nКлиматический класс: Т(5) +45 °C\r\nВес: 76 кг\r\nСтрана производства: Южная Корея\r\nГарантия: 2 года'),
(22, 3, 'Шкаф холодильный Turbo Air TB9-2G-SL-900', 312296, 'Turbo Air', 550, 900, 900, '0', '8', 165, '0.185', '220', 70, 'Серебро', 'Корпус: нержавеющая сталь\r\nКоличество дверей: 2\r\nКоличество полок: 2\r\nРасположение компрессора: заднее\r\nТип охлаждения: динамический\r\nВнутреннее освещение: светодиодное\r\nЗамок: опция\r\nТип хладагента: R-134A / R-404A\r\nКлиматический класс: Т(5) +45 °C'),
(23, 3, 'Холодильный шкаф Briskly 1 Bar', 500000, 'Briskly', 424, 519, 800, '2', '8', 90, '1.5', '220', 40, 'черный', 'Барный холодильный шкаф Briskly 1 Bar подойдет для демонстрации, хранения и продажи продуктов питания и напитков. Данный холодильный шкаф может быть установлен в магазинах, кафе, ресторанах.\r\n\r\nОсобенности модели:\r\nВнешняя температура эксплуатации: от 10 до 35 ?C\r\nРасход электроэнергии: 1,5 кВт / сутки\r\nЗанимаемая площадь: 0,22 м2\r\nТермоконтроллер\r\nИспаритель ламелевый\r\nНаружный стальной конденсатор\r\nУвеличенный испаритель\r\nВнутреннее освещение: светодиодная лампа\r\nДинамическое охлаждение\r\nАвтооттайка\r\nХладагент: R134a\r\nСтепень защиты: IP20'),
(24, 3, 'Холодильник EQTA барный BRG93', 34982, 'EQTA', 470, 486, 843, '5', '18', 93, '85', '220', 29, 'Черный', 'Барный холодильник EQTA BRG93 предназначен для охлаждения и длительного хранения продуктов и напитков. Холодильник идеально подходит для зоны бара, а также может быть установлен в качестве минибара в гостиницах, отелях, хостелах. Температурный режим от +5...+18° С. Оснащён удобным электронным управлением. 470х486х843 мм, 93 л, 4 полки-решетки. Компрессор с прямым охлаждением. Металлический корпус черного цвета. Стеклянная дверь без замка, дверная рама из нержавеющей стали. Уровень шума составляет 42 dB.'),
(25, 6, 'Шкаф холодильный Abat ШХ-0,5-01, нержавеющая сталь', 120670, 'Abat', 700, 690, 2050, '-5', '5', 490, '4.0', '0.166', 100, 'сталь', 'Тип охлаждения: динамическое.\r\nСистема управления: электронная.\r\nМощность: 0.166 кВт.\r\nГерметичный цельнозаливной (пенополиуретаном) корпус из нержавеющей стали.\r\nТолщина стенок камеры 50 мм.\r\nЭксплуатация допускается при температуре окружающего воздуха до +43 С, относительной влажности от 40 до 70%.\r\nХладагент фреон R404а.\r\nЧетыре полки-решетки размером 545 на 488 мм. Каждая выдерживает нагрузку в 40 кг.\r\nТЭН оттайки (автоматическая оттайка).\r\nГерметичный компрессор Tecumseh.\r\nДинамическая система охлаждения обеспечивает равномерное охлаждение продуктов на всех полках.\r\nВерхнее расположение агрегата улучшает теплообменные свойства и облегчает доступ для обслуживания.\r\nДверки шкафа оснащены доводчиком и открываются на 180 градусов.\r\nЛампа подсветки внутреннего пространства.\r\nКонцевой микропереключатель, отключающий вентилятор воздухоохладителя при открывании двери.\r\nРучка на верхней части задней стенки для удобства транспортировки шкафа.\r\nНожки регулируются по высоте.');

-- --------------------------------------------------------

--
-- Структура таблицы `products_img`
--

CREATE TABLE `products_img` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_img`
--

INSERT INTO `products_img` (`ID`, `PRODID`, `SRC`) VALUES
(2, 1, 'img/products/65fcd7da4a177.jpg'),
(5, 1, 'img/products/65fcf48c5bb41.jpg'),
(6, 1, 'img/products/65fcf4c418c82.jpg'),
(11, 17, 'img/products/65fd167c12e9b.jpg'),
(12, 17, 'img/products/65fd16a714ffc.webp'),
(13, 17, 'img/products/65fd16ac27ac7.jpg'),
(14, 17, 'img/products/65fd16c8070c1.jpeg'),
(15, 17, 'img/products/65fd16e854c61.jpg'),
(16, 18, 'img/products/65fd30b18f136.jpg'),
(17, 19, 'img/products/65fd3122eaf28.jpg'),
(18, 20, 'img/products/65fd3194dcc0c.jpg'),
(19, 21, 'img/products/65fd3205b9319.jpg'),
(20, 22, 'img/products/65fd32933dae9.jpg'),
(21, 23, 'img/products/65fd32f1d67fc.jpg'),
(22, 24, 'img/products/65fd336096cbe.jpg'),
(23, 25, 'img/products/65fd34d378bdc.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products_sale`
--

CREATE TABLE `products_sale` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_sale`
--

INSERT INTO `products_sale` (`ID`, `PRODID`) VALUES
(3, 1),
(6, 17),
(7, 19),
(8, 18),
(9, 20),
(10, 21),
(11, 22),
(12, 23),
(13, 24),
(14, 25);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL,
  `USER` varchar(255) NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `COMM` text NOT NULL,
  `STATUS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ORGANIZATION` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `NAME`, `ORGANIZATION`, `NUMBER`, `EMAIL`) VALUES
(1, 'ivan', 'i', 'Иванов Иван', 'ГУМРФ', '8-999-999-99-99', 'ivan@gumrf.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `category-index`
--
ALTER TABLE `category-index`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_img`
--
ALTER TABLE `products_img`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_sale`
--
ALTER TABLE `products_sale`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `category-index`
--
ALTER TABLE `category-index`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `order_item`
--
ALTER TABLE `order_item`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `products_img`
--
ALTER TABLE `products_img`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products_sale`
--
ALTER TABLE `products_sale`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
