CREATE TABLE IF NOT EXISTS Teachers (
                                     ID INT AUTO_INCREMENT PRIMARY KEY,
                                     NAME VARCHAR(255) NOT NULL,
                                     SURNAME VARCHAR(255) NOT NULL,
                                     USERNAME VARCHAR(255) NOT NULL,
                                     PASSWORD VARCHAR(255) NOT NULL,
                                     EMAIL VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Students (
                                        ID INT AUTO_INCREMENT PRIMARY KEY,
                                        NAME VARCHAR(255) NOT NULL,
                                        SURNAME VARCHAR(255) NOT NULL,
                                        FATHERNAME VARCHAR(255) NOT NULL,
                                        GRADE FLOAT,
                                        MOBILENUMBER VARCHAR(255) NOT NULL,
                                        BIRTHDAY DATE NOT NULL
);
