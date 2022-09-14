-- To Create DataBase
CREATE DATABASE PLACE;

USE PLACE;

-- To Create the Table Customer
CREATE TABLE USER(id INT PRIMARY KEY AUTO_INCREMENT,
						name VARCHAR(20) NOT NULL,
                        email VARCHAR(30) NOT NULL UNIQUE,
                        password VARCHAR(20) NOT NULL,
                        image LONGBLOB DEFAULT NULL,
                        ph_number INT NOT NULL
					);
                    
CREATE TABLE GUIDE(guide_id INT REFERENCES USER(id),
					guide_place VARCHAR(20) NOT NULL,
					PRIMARY KEY(guide_id)
					);

CREATE TABLE VISITOR(visitor_id INT REFERENCES USER(id),
					visit_place VARCHAR(20) NOT NULL,
					visit_date DATE NOT NULL,
					PRIMARY KEY(visitor_id)
					);

CREATE TABLE TRAVEL(guide_id INT REFERENCES USER(id),
					visitor_id INT REFERENCES USER(id),
					PRIMARY KEY(guide_id, visitor_id)
					);