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

# Alter database
ALTER TABLE car_model ADD FOREIGN KEY (car_make_id) REFERENCES car_make(car_make_id);

ALTER TABLE model_feature ADD FOREIGN KEY (model_id) REFERENCES car_model(car_model_id);
ALTER TABLE model_feature ADD FOREIGN KEY (feature_id) REFERENCES car_feature(car_feature_id);

# Insert data
INSERT INTO car_make(car_make_name)
VALUES
('Seat');

INSERT INTO car_model(car_model_name, car_model_price, car_model_power, car_model_mileage,
car_model_fuel_type, car_model_fuel_cons, car_model_gearbox, car_model_desc, car_make_id)
VALUES
('Leon', 14500, 150, 12490, 'Petrol', 5.2, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1),
('Ibiza', 6480, 75, 26051, 'Diesel', 4.2, 'Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1);

INSERT INTO user(user_name, user_email, user_password, user_rights)
VALUES
('AlenV', 'alen.varazdinac@gmail.com', md5('123'), 'Admin'),
('Test1', 'test@gmail.com', md5('123'), 'User');

INSERT INTO car_feature(car_feature_name) 
VALUES 
('ABS'), 
('Rain sensor'), 
('Cruise control'), 
('Light sensor');

INSERT INTO model_feature(model_id, feature_id) 
VALUES 
(1, 1),
(1, 2), 
(2, 2);