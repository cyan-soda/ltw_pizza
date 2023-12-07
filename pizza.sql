-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE pizzaCompany;
USE pizzaCompany;


CREATE TABLE Customer (
    Customer_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Sex ENUM('M', 'F', 'O') NOT NULL, -- Assuming 'M' for male, 'F' for female, 'O' for other
    UserName VARCHAR(255) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Phone VARCHAR(20) NULL,
    Province VARCHAR(255) NULL,
    District VARCHAR(255) NULL,
    Ward VARCHAR(255) NULL,
    Street VARCHAR(255) NULL
    -- Include additional attributes and constraints as necessary.
);

CREATE TABLE Branch (
    Branch_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Province VARCHAR(255) NOT NULL,
    District VARCHAR(255) NOT NULL,
    Ward VARCHAR(255) NOT NULL,
    Street VARCHAR(255) NOT NULL
);

CREATE TABLE Employee (
    Employee_ID INT AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(255) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Phone_Number VARCHAR(20) NULL,
    DoB DATE NULL,
    Sex ENUM('M', 'F', 'O') NOT NULL, -- Assuming 'M' for male, 'F' for female, 'O' for other
    Email VARCHAR(255) UNIQUE NOT NULL,
    Date_of_Lease DATE NULL,
    Salary DECIMAL(10, 2) NULL, -- Assuming salary will have two decimal places.
    Job_Type VARCHAR(255) NULL,
    Branch_ID INT NULL,
    Manager_ID INT NULL,
    FOREIGN KEY (Manager_ID) REFERENCES Employee(Employee_ID)
);

CREATE TABLE Promotion (
    Promotion_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Application_Date DATE NOT NULL,
    Expiration_Date DATE NOT NULL,
    Application_Terms TEXT NOT NULL,
    Maximum_Discount DECIMAL(5, 2) NOT NULL,
    Discount_Method ENUM('PERCENTAGE', 'AMOUNT') NOT NULL
);

CREATE TABLE `Order` (
    Order_ID INT AUTO_INCREMENT PRIMARY KEY,
    Order_Date DATETIME NOT NULL,
    Note TEXT,
    Status ENUM('PROCESSING', 'CONFIRMED', 'COMPLETED', 'CANCELLED') NOT NULL,
    Total_Price DECIMAL(10, 2) NOT NULL,
    Customer_ID INT,
    Cashier_ID INT,
    Branch_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID),
    FOREIGN KEY (Cashier_ID) REFERENCES Employee(Employee_ID),
    FOREIGN KEY (Branch_ID) REFERENCES Branch(Branch_ID)
);

CREATE TABLE Bill (
    Bill_ID INT AUTO_INCREMENT PRIMARY KEY,
    Feedback TEXT,
    Customer_ID INT,
    Order_ID INT NOT NULL,
    Bill_Date DATE NOT NULL,
    Delivery_Fee DECIMAL(10, 2) NOT NULL,
    Total_Price DECIMAL(10, 2) NOT NULL,
    Method ENUM('CASH', 'MOMO', 'BANKING') NOT NULL,
    Delivery ENUM('SeftTake', 'Ship') NOT NULL,
    Promotion_ID INT,
    Discount_Price DECIMAL(10, 2),
    Discount_Percent DECIMAL(5, 2),
    FOREIGN KEY (Promotion_ID) REFERENCES Promotion(Promotion_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);

CREATE TABLE Product (
    Product_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Photo VARCHAR(255),
    Description VARCHAR(100),
    Type ENUM('Pizza', 'Fried Chicken', 'Spagetti', 'Salad', 'Beverage') NOT NULL
);

-- #####################Relationship#######################
INSERT INTO Customer (Name, Email, Sex, UserName, Password, Phone, Province, District, Ward, Street)
VALUES
('Nguyen Van A', 'nguyenvana@example.com', 'M', 'nguyenvan_a', 'password123', '0123456789', 'Ho Chi Minh', 'District 1', 'Ward 1', 'Street 1'),
('Tran Thi B', 'tranthib@example.com', 'F', 'tranthi_b', 'password123', '0234567891', 'Ho Chi Minh', 'District 2', 'Ward 2', 'Street 2'),
('Le Van C', 'levanc@example.com', 'M', 'levan_c', 'password123', '0345678912', 'Ho Chi Minh', 'District 3', 'Ward 3', 'Street 3'),
('Pham Thi D', 'phamthid@example.com', 'F', 'phamthi_d', 'password123', '0456789123', 'Ho Chi Minh', 'District 4', 'Ward 4', 'Street 4'),
('Hoang Van E', 'hoangvane@example.com', 'M', 'hoangvan_e', 'password123', '0567891234', 'Ho Chi Minh', 'District 5', 'Ward 5', 'Street 5'),
('Nguyen Thi F', 'nguyenthif@example.com', 'F', 'nguyenthi_f', 'password123', '0678912345', 'Ho Chi Minh', 'District 6', 'Ward 6', 'Street 6'),
('Tran Van G', 'tranvang@example.com', 'M', 'tranvan_g', 'password123', '0789123456', 'Ho Chi Minh', 'District 7', 'Ward 7', 'Street 7'),
('Le Thi H', 'lethih@example.com', 'F', 'lethi_h', 'password123', '0891234567', 'Ho Chi Minh', 'District 8', 'Ward 8', 'Street 8'),
('Pham Van I', 'phamvani@example.com', 'M', 'phamvan_i', 'password123', '0912345678', 'Ho Chi Minh', 'District 9', 'Ward 9', 'Street 9'),
('Hoang Thi J', 'hoangthij@example.com', 'F', 'hoangthi_j', 'password123', '0123456780', 'Ho Chi Minh', 'District 10', 'Ward 10', 'Street 10'),
('Nguyen Van K', 'nguyenvank@example.com', 'M', 'nguyenvan_k', 'password123', '0213456789', 'Ho Chi Minh', 'District 11', 'Ward 11', 'Street 11'),
('Tran Thi L', 'tranthil@example.com', 'F', 'tranthi_l', 'password123', '0324567891', 'Ho Chi Minh', 'District 12', 'Ward 12', 'Street 12'),
('Le Van M', 'levanm@example.com', 'M', 'levan_m', 'password123', '0435678912', 'Ho Chi Minh', 'Go Vap', 'Ward 13', 'Street 13'),
('Pham Thi N', 'phamthin@example.com', 'F', 'phamthi_n', 'password123', '0546789123', 'Ho Chi Minh', 'Tan Binh', 'Ward 14', 'Street 14'),
('Hoang Van O', 'hoangvano@example.com', 'M', 'hoangvan_o', 'password123', '0657891234', 'Ho Chi Minh', 'Tan Phu', 'Ward 15', 'Street 15'),
('Nguyen Thi P', 'nguyenthip@example.com', 'F', 'nguyenthi_p', 'password123', '0768912345', 'Ho Chi Minh', 'Binh Thanh', 'Ward 16', 'Street 16'),
('Tran Van Q', 'tranvanq@example.com', 'M', 'tranvan_q', 'password123', '0879123456', 'Ho Chi Minh', 'Phu Nhuan', 'Ward 17', 'Street 17'),
('Le Thi R', 'lethir@example.com', 'F', 'lethi_r', 'password123', '0981234567', 'Ho Chi Minh', 'District 3', 'Ward 18', 'Street 18'),
('Pham Van S', 'phamvans@example.com', 'M', 'phamvan_s', 'password123', '0923456789', 'Ho Chi Minh', 'District 1', 'Ward 19', 'Street 19'),
('Hoang Thi T', 'hoangthit@example.com', 'F', 'hoangthi_t', 'password123', '0123456790', 'Ho Chi Minh', 'District 2', 'Ward 20', 'Street 20'),
('Nguyen Van U', 'nguyenvanu@example.com', 'M', 'nguyenvan_u', 'password123', '0213456798', 'Ho Chi Minh', 'District 4', 'Ward 21', 'Street 21'),
('Tran Thi V', 'tranthiv@example.com', 'F', 'tranthi_v', 'password123', '0324567892', 'Ho Chi Minh', 'District 5', 'Ward 22', 'Street 22'),
('Le Van W', 'levanw@example.com', 'M', 'levan_w', 'password123', '0435678913', 'Ho Chi Minh', 'District 7', 'Ward 23', 'Street 23'),
('Pham Thi X', 'phamthix@example.com', 'F', 'phamthi_x', 'password123', '0546789124', 'Ho Chi Minh', 'District 8', 'Ward 24', 'Street 24'),
('Hoang Van Y', 'hoangvany@example.com', 'M', 'hoangvan_y', 'password123', '0657891235', 'Ho Chi Minh', 'District 9', 'Ward 25', 'Street 25'),
('Nguyen Thi Z', 'nguyenthiz@example.com', 'F', 'nguyenthi_z', 'password123', '0768912346', 'Ho Chi Minh', 'District 10', 'Ward 26', 'Street 26'),
('Tran Van AA', 'tranvanaa@example.com', 'M', 'tranvan_aa', 'password123', '0879123457', 'Ho Chi Minh', 'District 11', 'Ward 27', 'Street 27'),
('Le Thi BB', 'lethibb@example.com', 'F', 'lethi_bb', 'password123', '0981234568', 'Ho Chi Minh', 'District 12', 'Ward 28', 'Street 28'),
('Pham Van CC', 'phamvancc@example.com', 'M', 'phamvan_cc', 'password123', '0923456780', 'Ho Chi Minh', 'Go Vap', 'Ward 29', 'Street 29'),
('Hoang Thi DD', 'hoangthidd@example.com', 'F', 'hoangthi_dd', 'password123', '0123456709', 'Ho Chi Minh', 'Tan Binh', 'Ward 30', 'Street 30');


INSERT INTO Branch (Name, Province, District, Ward, Street)
VALUES
('Chi Nhánh 1', 'Ho Chi Minh', 'District 1', 'Ward 1', 'Street 1'),
('Chi Nhánh 2', 'Ho Chi Minh', 'District 2', 'Ward 2', 'Street 2'),
('Chi Nhánh 3', 'Ho Chi Minh', 'District 3', 'Ward 3', 'Street 3'),
('Chi Nhánh 4', 'Ho Chi Minh', 'District 4', 'Ward 4', 'Street 4'),
('Chi Nhánh 5', 'Ho Chi Minh', 'District 5', 'Ward 5', 'Street 5');

INSERT INTO Employee (UserName, Password, Name, Phone_Number, DoB, Sex, Email, Date_of_Lease, Salary, Job_Type, Branch_ID, Manager_ID)
VALUES
('user_1', 'pass123', 'Nguyen Van A', '0123456789', '1981-06-15', 'M', 'nguyenvana@example.com', '2023-09-03', 3000000, 'Chef', 1, NULL),
('user_2', 'pass123', 'Tran Thi B', '0123456788', '1982-07-20', 'F', 'tranthib@example.com', '2023-09-04', 5000000, 'Cashier', 1, NULL),
('user_3', 'pass123', 'Le Van C', '0123456787', '1983-08-25', 'M', 'levanc@example.com', '2023-09-05', 7000000, 'Chef', 2, NULL),
('user_4', 'pass123', 'Pham Thi D', '0123456786', '1984-09-30', 'F', 'phamthid@example.com', '2023-09-06', 3000000, 'Cashier', 2, NULL),
('user_5', 'pass123', 'Hoang Van E', '0123456785', '1985-11-05', 'M', 'hoangvane@example.com', '2023-09-07', 5000000, 'Chef', 3, NULL),
('user_6', 'pass123', 'Nguyen Thi F', '0123456784', '1980-12-10', 'F', 'nguyenthif@example.com', '2023-09-08', 7000000, 'Cashier', 3, NULL),
('user_7', 'pass123', 'Tran Van G', '0123456783', '1981-01-15', 'M', 'tranvang@example.com', '2023-09-09', 3000000, 'Chef', 4, NULL),
('user_8', 'pass123', 'Le Thi H', '0123456782', '1982-02-20', 'F', 'lethih@example.com', '2023-09-10', 5000000, 'Cashier', 4, NULL),
('user_9', 'pass123', 'Pham Van I', '0123456781', '1983-03-27', 'M', 'phamvani@example.com', '2023-09-11', 7000000, 'Chef', 5, NULL),
('user_10', 'pass123', 'Hoang Thi J', '0123456780', '1984-04-02', 'F', 'hoangthij@example.com', '2023-09-12', 3000000, 'Cashier', 5, NULL);

INSERT INTO Promotion (Name, Application_Date, Expiration_Date, Application_Terms, Maximum_Discount, Discount_Method)
VALUES
('Khuyến mãi', '2023-06-01', '2023-08-31', 'Áp dụng cho tất cả khách hàng', 10.00, 'PERCENTAGE'),
('Giảm giá', '2023-09-01', '2023-09-30', 'Áp dụng cho đơn hàng trên 500,000 VND', 50.00, 'AMOUNT'),
('Lần đầu', '2023-10-01', '2023-10-31', 'Chỉ áp dụng cho khách hàng mua lần đầu', 15.00, 'PERCENTAGE'),
('Ưu đãi', '2023-12-01', '2023-12-25', 'Áp dụng cho mọi đơn hàng', 100.00, 'AMOUNT');