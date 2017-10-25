DROP DATABASE IF EXISTS carmax;
CREATE DATABASE carmax DEFAULT CHARACTER SET utf8;
USE carmax;

# Create tables
CREATE TABLE car_make(
    car_make_id         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    car_make_name       VARCHAR(120) NOT NULL
);

CREATE TABLE car_model(
    car_model_id        INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    car_model_name      VARCHAR(120) NOT NULL,
    car_model_variant   VARCHAR(120),
    car_model_price     DECIMAL(18,2) NOT NULL,
    car_model_power     INT(4) NOT NULL,
    car_model_mileage   INT(7) NOT NULL,
    car_model_fuel_type VARCHAR(20) NOT NULL,
    car_model_fuel_cons DECIMAL(3,1),
    car_model_gearbox   VARCHAR(20) NOT NULL,
    car_model_desc      TEXT,
    # FOREIGN KEY
    car_make_id         INT NOT NULL
);

CREATE TABLE car_feature(
    car_feature_id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    car_feature_name    VARCHAR(120) NOT NULL
);

CREATE TABLE model_feature(
    model_id            INT NOT NULL,
    feature_id          INT
);

CREATE TABLE user(
    user_id             INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name           VARCHAR(75) NOT NULL,
    user_email          VARCHAR(120) NOT NULL,
    user_password       CHAR(32) NOT NULL,
    user_rights         VARCHAR(15) NOT NULL DEFAULT 'Member'
);

CREATE TABLE contact_us(
    contact_us_id       INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    contact_mail        VARCHAR(120) NOT NULL,
    contact_subject     VARCHAR(120) NOT NULL,
    contact_message     TEXT NOT NULL
);

# Alter database
ALTER TABLE car_model ADD FOREIGN KEY (car_make_id) REFERENCES car_make(car_make_id);

ALTER TABLE model_feature ADD FOREIGN KEY (model_id) REFERENCES car_model(car_model_id);
ALTER TABLE model_feature ADD FOREIGN KEY (feature_id) REFERENCES car_feature(car_feature_id);

# Insert data
INSERT INTO car_make(car_make_name)
VALUES
('Seat'),
('Volkswagen'),
('Audi'),
('Mitsubishi'),
('Subaru');

INSERT INTO car_model(car_model_name, car_model_price, car_model_power, car_model_mileage,
car_model_fuel_type, car_model_fuel_cons, car_model_gearbox, car_model_desc, car_make_id)
VALUES
('Leon', 14500, 150, 12490, 'Petrol', 4.7, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1),
('Ibiza', 6480, 75, 26051, 'Diesel', 4.2, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1),
('Ateca', 26000, 150, 11851, 'Petrol', 5.4, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1),
('Exeo', 10400, 160, 104776, 'Diesel', 5.3, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1),
('Golf VII', 21000, 110, 34000, 'Petrol', 5.2, 'Automatic', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 2),
('Arteon', 63200, 239, 6482, 'Diesel', 5.9, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 2),
('Amarok', 20800, 179, 76762, 'Diesel', 7.7, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 2),
('Polo', 14200, 75, 17800, 'Petrol', 4.8, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 2),
('A3', 24500, 140, 47900, 'Petrol', 4.8, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 3),
('A5', 28300, 245, 113100, 'Diesel', 5.7, 'Automatic', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 3),
('A7', 30200, 204, 60819, 'Petrol', 8.0, 'Automatic', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 3),
('Q3', 19350, 170, 169000, 'Petrol', 7.7, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 3),
('Lancer X', 14300, 150, 48171, 'Diesel', 5.1, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 4),
('Colt', 5790, 75, 120220, 'Petrol', 5.5, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 4),
('3000GT', 7200, 224, 159000, 'Petrol', 12.0, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 4),
('Eclipse 2000', 3300, 150, 164200, 'Petrol', 9.7, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 4),
('BRZ', 18500, 200, 55000, 'Petrol', 7.8, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 5),
('Impreza', 24200, 265, 17550, 'Petrol', 7.4, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 5),
('WRX STI', 21900, 300, 59890, 'Petrol', 10.5, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 5),
('Forester', 26300, 150, 37300, 'Petrol', 6.9, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 5);


INSERT INTO user(user_name, user_email, user_password, user_rights)
VALUES
('AlenV', 'alen.varazdinac@gmail.com', md5('123'), 'Admin'),
('Test1', 'test@gmail.com', md5('123'), 'User');

INSERT INTO car_feature(car_feature_name) 
VALUES 
('ABS'), 
('Rain sensor'), 
('Cruise control'), 
('Light sensor'),
('ESP'),
('Bluetooth'),
('Central locking'),
('Sunroof'),
('Xenon headlights'),
('Navigation system'),
('Electric windows'),
('Sport seats');

INSERT INTO model_feature(model_id, feature_id) 
VALUES 
(1, 1),
(1, 2), 
(2, 2);