-- Create the my_guitar_shop1 database
DROP DATABASE IF EXISTS my_review_app;
CREATE DATABASE my_review_app;
USE my_review_app;  -- MySQL command

-- create the tables
CREATE TABLE user_account (
  userID        	INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)    NOT NULL,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,  
  PRIMARY KEY (userID),
  UNIQUE INDEX emailAddress (emailAddress)
);


CREATE TABLE restaurants (
  restID        INT        NOT NULL   AUTO_INCREMENT,
  restName      VARCHAR(255)   NOT NULL,
  restAddress   VARCHAR(255)  	NOT NULL,
  restPhone     VARCHAR(255)    NOT NULL,
  PRIMARY KEY (restID)
);

CREATE TABLE menu (
  foodID        INT        NOT NULL   AUTO_INCREMENT,
  foodName      VARCHAR(255)   NOT NULL,
  price         DECIMAL(10,2)  NOT NULL,
  restID		INT			   NOT Null,
  PRIMARY KEY (foodID),
  FOREIGN KEY (restID) REFERENCES restaurants(restID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Reviews (
  reviewID      INT        NOT NULL   AUTO_INCREMENT,
  score			VARCHAR(60)    NOT NULL,
  comments      VARCHAR(255)   NOT NULL,
  dateAdded     DATE       	   NOT NULL,
  restID		INT			   NOT Null,
  userID		INT			   NOT Null,
  PRIMARY KEY (reviewID),
  INDEX(restID),
  INDEX(userID),
  FOREIGN KEY (restID) REFERENCES restaurants(restID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (userID) REFERENCES user_account(userID)  ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE images (
  imgID        INT            NOT NULL   AUTO_INCREMENT,
  imgName      VARCHAR(255)   NOT NULL,
  imgFile      LONGBLOB       NOT NULL,
  reviewID     INT			NOT NULL,
  PRIMARY KEY (imgID),
  INDEX(reviewID),
  FOREIGN KEY (reviewID) REFERENCES Reviews (reviewID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- insert data into the database
INSERT INTO user_account (userID, emailAddress, password, firstName, lastName) VALUES
(1, 'Chris.Donovan@yahoo.com', '$2y$10$a.O56eNGvt1Dfgr5TB31Ce381LhhnrfMziihKn6IvxOioNaiSmtQ2', 'Chris', 'Donovan'),
(2, 'Gabriel@gmail.com', '$2y$10$QTNZqNoh9Lq3PHrkIEQQZOfhjamebySxfFcZ8C5BopqhxWU9TIOfK', 'Gabriel', 'Smith'),
(3, 'christineb@hotmail.com', '$2y$10$cGS6i0hxQ7S2T6z9Nw/qQ.5OfpoHnw/Q8rpNtKH9nc5yjP2QePGAC', 'Christine', 'Brown');

INSERT INTO restaurants (restID, restName, restAddress, restPhone) VALUES
(1, 'Blue Water Café','1095 Hamilton St Vancouver BC','868-456-4488'),
(2, 'Miku Vancouver','200 Granville St #70 Vancouver BC','798-467-4932'),
(3, 'Krissie Grill','2991 Lougheed Hwy Unit 130, Coquitlam, BC','604-464-4250');


-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON my_review_app.*
TO monther@localhost
IDENTIFIED BY 'info3135';

