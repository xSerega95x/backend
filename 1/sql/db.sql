CREATE DATABASE IF NOT EXISTS BooksOnline;

-- CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
-- GRANT ALL ON `$db`.* TO '$user'@'localhost';
-- FLUSH PRIVILEGES;

USE BooksOnline;

CREATE TABLE IF NOT EXISTS Users(   -- БД Пользователи
    user_id INT AUTO_INCREMENT,     -- Id
    name VARCHAR(20),               -- Имя
    surname VARCHAR(20),            -- Фамилия
    address VARCHAR(50),            -- Адрес
    phone VARCHAR(30),              -- Телефон
    login VARCHAR(30),              -- Имя аккаунта
    password VARCHAR(15),           -- Пароль
    salt INT,                       -- Соль
    PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS Genres(  -- БД Жанры
    genre_id INT AUTO_INCREMENT,    -- Id
    name VARCHAR(30),               -- Название жанра
    PRIMARY KEY (genre_id)
);

CREATE TABLE IF NOT EXISTS Books(   -- БД Товары
    book_id INT AUTO_INCREMENT,     -- Id
    author VARCHAR(120),            -- Автор
    name VARCHAR(30),               -- Название
    short_descr VARCHAR(200),       -- Краткое описание
    full_descr VARCHAR(350),        -- Полное описание
    quantity INT,                   -- Кол-во товара
    price INT,                      -- Цена
    discount INT,                   -- Скидка
    genre INT,                      -- Жанр
    imglnkp VARCHAR(70),            -- Ссылка на preview изображение
    imglnkf VARCHAR(70),            -- Ссылка на full изображение
    PRIMARY KEY (book_id),
    FOREIGN KEY (genre) REFERENCES Genres(genre_id)
);

CREATE TABLE IF NOT EXISTS Bestsellers(   -- БД Бестселлеры
    bs_id INT AUTO_INCREMENT,             -- Id
    book_id INT,                          -- Id книги
    PRIMARY KEY (bs_id),
    FOREIGN KEY (book_id) REFERENCES Books(book_id)
);

CREATE TABLE IF NOT EXISTS NewArrivals(   -- БД Новые поступления
    na_id INT AUTO_INCREMENT,             -- Id
    book_id INT,                          -- Id книги
    PRIMARY KEY (na_id),
    FOREIGN KEY (book_id) REFERENCES Books(book_id)
);

CREATE TABLE IF NOT EXISTS UsedBooks(     -- БД Б/У книги
    ub_id INT AUTO_INCREMENT,             -- Id
    book_id INT,                          -- Id книги
    PRIMARY KEY (ub_id),
    FOREIGN KEY (book_id) REFERENCES Books(book_id)
);

CREATE TABLE IF NOT EXISTS SpecialOffers(   -- БД Специальные предложения
    so_id INT AUTO_INCREMENT,               -- Id
    book_id INT,                            -- Id книги
    PRIMARY KEY (so_id),
    FOREIGN KEY (book_id) REFERENCES Books(book_id)
);

CREATE TABLE IF NOT EXISTS Orders(        -- БД Заказы
    order_id INT AUTO_INCREMENT,          -- Id заказа
    book_id INT,                          -- Id книги
    user_id INT,                          -- Клиент
    order_status VARCHAR(40),             -- Статус заказа
    PRIMARY KEY (order_id),
    FOREIGN KEY (book_id) REFERENCES Books(book_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE IF NOT EXISTS Wish(        -- БД Пожелания
    wish_id INT AUTO_INCREMENT,         -- Id wishlist
    book_id INT,                        -- Id товара
    user_id INT,                        -- Клиент
    PRIMARY KEY (wish_id),
    FOREIGN KEY (book_id) REFERENCES Books(book_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE IF NOT EXISTS Products(    -- БД Описание продукта и другие детали о товаре
    product_id INT AUTO_INCREMENT,      -- Id продукта
    book_id INT,                        -- Id книги
    info VARCHAR(200),                  -- Информация о продукте
    detail VARCHAR(100),                -- Другие особенности
    PRIMARY KEY (product_id),
    FOREIGN KEY(book_id) REFERENCES Books(book_id)
);

CREATE TABLE IF NOT EXISTS Comments(    -- БД Коментарии к товарам
    comment_id INT AUTO_INCREMENT,      -- Id комментария
    book_id INT,                        -- Id книги
    name VARCHAR(25),                   -- Имя пользователя
    email VARCHAR(30),                  -- Почта пользователя
    message VARCHAR(100),               -- Комментарий
    PRIMARY KEY(comment_id),
    FOREIGN KEY(book_id) REFERENCES Books(book_id)
);