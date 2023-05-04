-- ลบก้อน database
DROP DATABASE my_db;
-- สร้างก้อน database
CREATE DATABASE my_db;

-- ลบตารางก่อน เดียวสร้างใหม่
DROP TABLE Customers, Stocks, Supplys, Employees;
-- สร้าง ตาราง
CREATE TABLE Customers
    (IDCust     VARCHAR(4) UNIQUE NOT NULL,
    CustName    VARCHAR(20),
    Sex     VARCHAR(1),
    Address VARCHAR(80),
    Tel     VARCHAR(10)
    );

CREATE TABLE Stocks
    (IDProduct      VARCHAR(4) UNIQUE NOT NULL,
    ProductName     VARCHAR(20),
    PricePerUnit    FLOAT(8,2),
    StockQty        INTEGER
    );

CREATE TABLE Supplys
    (IDCust     VARCHAR(4),
    IDProduct   VARCHAR(4),
    Qty     INTEGER,
    CONSTRAINT  PK_Supply   PRIMARY KEY(IDCust, IDProduct)
    );

CREATE TABLE Employees
    (EmployeeID int NOT NULL AUTO_INCREMENT,
    fname VARCHAR(255),
    lname VARCHAR(255),
    PRIMARY KEY (EmployeeID)
 );

-- แทรก ข้อมูล ลง ตาราง 
INSERT INTO Employees
VALUES (63050159,"Usukami", "Naruto");
INSERT INTO Employees
VALUES (null,"Monkey", "Luffy");
INSERT INTO Employees
VALUES (null,"Nutsu", "Dragunel");

-- เลือกข้อมูลจากตาราง
SELECT * FROM Employees;

-- insert to customers
INSERT INTO Customers 
VALUES ("C001","Aom","M","Bangkok","089-xxx");
INSERT INTO Customers 
VALUES ("C002","Pear","F","Nonthaburi","081-xxx");
INSERT INTO Customers 
VALUES ("C003","Man","M","Kanchanaburi","082-xxx");
INSERT INTO Customers 
VALUES ("C004","น.ส. ทุ่มเท","F","พิษณุโลก","084-xxx");
INSERT INTO Customers 
VALUES ("C005","น.ส. น่ารัก","F","Bangkok","085-xxx");
INSERT INTO Customers 
VALUES ("C006","นาย ช่วยชาติ","M","Bangkok","086-xxx");

-- insert to supply
INSERT INTO Supplys
VALUES ("C002","P001",1);
INSERT INTO Supplys
VALUES ("C003","P001",5);
INSERT INTO Supplys
VALUES ("C001","P002",10);
INSERT INTO Supplys
VALUES ("C004","P002",4);
INSERT INTO Supplys
VALUES ("C005","P003",20);
INSERT INTO Supplys
VALUES ("C003","P004",3);
INSERT INTO Supplys
VALUES ("C001","P005",2);
INSERT INTO Supplys
VALUES ("C003","P005",50);

-- insert into stock
INSERT INTO Stocks
VALUES ("P001","หนังสือ PHP",200,100);
INSERT INTO Stocks
VALUES ("P002","หนังสือ Perl",250,100);
INSERT INTO Stocks
VALUES ("P003","หนังสือ XML",5,500);
INSERT INTO Stocks
VALUES ("P004","หนังสือ Java",10,450);
INSERT INTO Stocks
VALUES ("P005","หนังสือ C#",35,320);


-- ex40:query
SELECT * FROM Customers WHERE IDCust between 'c002' and 'c005' order by IDCust;