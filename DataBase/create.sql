-- To Create DataBase
CREATE DATABASE SACRED_PLACES;

USE SACRED_PLACES;

-- To Create the Table Customer
CREATE TABLE CUSTOMER(c_id INT PRIMARY KEY AUTO_INCREMENT,
						c_name VARCHAR(20),
                        c_email VARCHAR(30) NOT NULL UNIQUE,
                        c_password VARCHAR(20) NOT NULL
					);
                    
INSERT INTO CUSTOMER VALUES(1, "anil@gmail.com", "Anil123");
SELECT * FROM CUSTOMER;