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
    Street VARCHAR(255) NULL,
    Logged BOOLEAN NOT NULL DEFAULT FALSE
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
    Short_Description TEXT,
    Image VARCHAR(255),
    Photo_Square VARCHAR(255),
    Application_Date DATE NOT NULL,
    Expiration_Date DATE NOT NULL,
    Application_Terms TEXT NOT NULL,
    Maximum_Discount INT NOT NULL,
    Discount_Method ENUM('PERCENTAGE', 'AMOUNT') NOT NULL,
    TypePromotion ENUM('KM', 'Unbox') NOT NULL
);

CREATE TABLE `Order` (
    Order_ID INT AUTO_INCREMENT PRIMARY KEY,
    Order_Date DATETIME NOT NULL,
    Note TEXT,
    Status ENUM('PROCESSING', 'CONFIRMED', 'COMPLETED', 'CANCELLED') NOT NULL,
    Total_Price INT NOT NULL,
    Customer_ID INT,
    Cashier_ID INT,
    Branch_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID),
    FOREIGN KEY (Cashier_ID) REFERENCES Employee(Employee_ID),
    FOREIGN KEY (Branch_ID) REFERENCES Branch(Branch_ID)
);

CREATE TABLE Order_Line (
    Order_ID INT,
    Product_ID INT,
    Quantity INT NOT NULL,
    Total_Price INT NOT NULL,
    PRIMARY KEY (Order_ID, Product_ID),
    FOREIGN KEY (Order_ID) REFERENCES `Order`(Order_ID),
    FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID)
);

CREATE TABLE Bill (
    Bill_ID INT AUTO_INCREMENT PRIMARY KEY,
    Customer_ID INT,
    Order_ID INT NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Phone VARCHAR(255) NOT NULL,
    Province VARCHAR(255) NOT NULL,
    District VARCHAR(255) NOT NULL,
    DetailAddr VARCHAR(255) NOT NULL,
    Note TEXT,
    Delivery_Fee INT NOT NULL,
    Total_Price INT NOT NULL,
    Method ENUM('CASH', 'MOMO', 'ZaloPay') NOT NULL,
    Promotion_ID INT,
    FOREIGN KEY (Order_ID) REFERENCES `Order`(Order_ID),
    FOREIGN KEY (Promotion_ID) REFERENCES Promotion(Promotion_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);

CREATE TABLE Product (
    Product_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Price INT NOT NULL,
    Photo VARCHAR(255),
    Description TEXT,
    Type ENUM('Pizza', 'Fried Chicken', 'Spagetti', 'Salad', 'Beverage') NOT NULL
);

CREATE TABLE Order_Line (
    Order_ID INT,
    Product_ID INT,
    Quantity INT NOT NULL,
    Total_Price INT NOT NULL,
    PRIMARY KEY (Order_ID, Product_ID),
    FOREIGN KEY (Order_ID) REFERENCES `Order`(Order_ID),
    FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID)
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

INSERT INTO Promotion (Name, Short_Description, Image, Photo_Square, Application_Date, Expiration_Date, Application_Terms, Maximum_Discount, Discount_Method, TypePromotion)
VALUES
('ĐẠI TIỆC GRILL, CHILL NGON LÀANH', 'Một buổi tụ tập ấm cúng với đồ nướng sẽ là dịp để mọi người quây quần bên nhau, cùng thưởng thức những món ăn ngon và trò chuyện vui vẻ:
Khay Nướng BBQ Tổng Hợp: Thịt được tẩm ướp đậm đà, nướng chín vàng đều, thơm lừng.', 'https://thepizzacompany.vn/images/thumbs/000/0003918_grill-and-chill_500.jpeg', 'https://thepizzacompany.vn/images/thumbs/000/0003885_WebsiteBanner_TPC_KVFestivel_1200x480px.jpeg', '2023-06-01', '2023-08-31', 'Áp dụng cho tất cả khách hàng', 10.00, 'PERCENTAGE', 'KM'),
('MUA 1 TẶNG 1 VÀO THỨ 3 THỨ 4', 'Mua 1 Pizza size M/L, tặng 1 Pizza (Đế Dày/Mỏng) dòng Classic cùng cỡ.', 'https://thepizzacompany.vn/images/uploaded/BOGO_WebBanner_(W1200xH480)px%20(1).jpg', 'https://thepizzacompany.vn/images/thumbs/000/0003880_bogo_500.jpeg', '2023-09-01', '2023-09-30', 'Áp dụng cho đơn hàng trên 100,000 VND', 50000, 'AMOUNT', 'KM'),
('TIẾT KIỆM 50% CHO PIZZA THỨ 2','Mua 1 Pizza từ size M và 1 thức uống bất kỳ được giảm ngay 50% khi mua Pizza thứ 2, cùng cỡ. Bánh Pizza thứ 2 có giá trị bằng hoặc thấp hơn so với Pizza thứ nhất.','https://thepizzacompany.vn/50-off-second-pizza%20','https://thepizzacompany.vn/images/thumbs/000/0003873_50-off-second-pizza_500.jpeg', '2023-10-01', '2023-10-31', 'Chỉ áp dụng cho khách hàng mua lần đầu', 15.00, 'PERCENTAGE', 'KM'),
('#UNBOX - TẶNG BỘ LY KHI MUA CÙNG PEPSI', 'Combo ưu đãi với mức giá tiết kiệm đến 50% và được lựa chọn món đa dạng trong Combo. Chỉ áp dụng cho đơn hàng đặt trên Website: thepizzacompany.vn và Hotline 19006066 hoặc mua mang về trực tiếp tại nhà hàng.', 'https://thepizzacompany.vn/images/uploaded/Unboxtangly_WebBanner_(W1200xH480)px.jpg', 'https://thepizzacompany.vn/images/thumbs/000/0003879_unbox_500.jpeg', '2023-12-01', '2023-12-25', 'Áp dụng cho mọi đơn hàng', 0, 'AMOUNT', 'Unbox');


INSERT INTO Product (Name, Price, Photo, Description, Type) 
    VALUES
    ('Pizza Hải Sản Đào', 169000, 'https://thepizzacompany.vn/images/thumbs/000/0003102_seafood-peach_500.png', 'Tôm, Đào hoà quyện bùng nổ cùng sốt Thousand Island', 'Pizza'),
    ('Pizza Hải Sản Pesto Xanh', 169000, 'https://thepizzacompany.vn/images/thumbs/000/0002624_seafood-pesto_500.png','Tôm, thanh cua, mực và bông cải xanh tươi ngon trên nền sốt Pesto Xanh', 'Pizza'),
    ('Pizza Hải Sản Cocktail', 149000, 'https://thepizzacompany.vn/images/thumbs/000/0002212_sf-cocktail_500.png', 'Tôm, cua, giăm bông,... với sốt Thousand Island', 'Pizza'),
    ('Pizza Aloha', 139000, 'https://thepizzacompany.vn/images/thumbs/000/0003536_aloha_500.png', 'Thịt nguội, xúc xích tiêu cay và dứa hòa quyện với sốt Thousand Island', 'Pizza'),
    ('Pizza Gà Nướng Dứa', 119000, 'https://thepizzacompany.vn/images/thumbs/000/0002228_ck-caldo_500.png', 'Thịt gà mang vị ngọt của dứa kết hợp với vị cay nóng của ớt', 'Pizza'),
    ('Pizza Phô Mai', 119000, 'https://thepizzacompany.vn/images/thumbs/000/0002226_double-cheese_500.png', 'Bánh Pizza với vô vàn phô mai để bạn tha hồ tận hưởng.', 'Pizza'),
    ('Pizza Thịt Nguội Kiểu Canada', 139000, 'https://thepizzacompany.vn/images/thumbs/000/0002222_ca-bacon_500.png', 'Sự kết hợp giữa thịt nguội và bắp ngọt', 'Pizza'),
    ('Pizza Gà Nướng 3 Vị', 149000, 'https://thepizzacompany.vn/images/thumbs/000/0002223_ck-trio_500.png', 'Gà nướng, gà bơ tỏi và gà ướp sốt nấm', 'Pizza'),
    ('Cánh gà nướng BBQ (6 miếng)', 139000, 'https://thepizzacompany.vn/images/thumbs/000/0002233_bbq-chicken-wings-6-pcs_500.jpeg', 'Cánh gà nướng thấm vị với lớp da mỏng giòn', 'Fried Chicken'),
    ('Cánh Gà Tẩm Bột Chiên Giòn (6 miếng)', 139000, 'https://thepizzacompany.vn/images/thumbs/000/0002238_korean-style-chicken-wings-6pcs_500.jpeg', 'Phủ bởi lớp bột đặc biệt tạo nên lớp vỏ giòn dai hấp dẫn.', 'Fried Chicken'),
    ('Mực Chiên Giòn', 119000, 'https://thepizzacompany.vn/images/thumbs/000/0002242_squid-rings_500.jpeg', 'Mực tẩm bột chiên giòn dùng kèm sốt ngò tây', 'Fried Chicken'),
    ('Giỏ Khoai Tây Chiên', 89000, 'https://thepizzacompany.vn/images/thumbs/000/0003794_potato-basket_500.jpeg', 'Sự kết hợp của nhiều kiểu chế biến khoai tây', 'Fried Chicken'),
    ('Bánh Mì Bơ Tỏi Phủ Phô Mai', 69000, 'https://thepizzacompany.vn/images/thumbs/000/0002244_cheese-garlic-breads_500.jpeg', 'CLát bánh mì nướng được quết 1 lớp bơ tỏi và phô mai thơm béo', 'Fried Chicken'),
    ('Khoai Tây Chiên', 79000, 'https://thepizzacompany.vn/images/thumbs/000/0003619_french-fries_500.png', 'Khoai tây sợi được chiên và tẩm một lớp muối thấm vị', 'Fried Chicken'),
    ('Gà Giòn Không Xương', 99000, 'https://thepizzacompany.vn/images/thumbs/000/0003795_chicken-strip_500.jpeg', 'Gà giòn tan với sốt Cocktail thơm ngậy', 'Fried Chicken'),
    ('Bánh Kẹp Nướng Mexico', 119000, 'https://thepizzacompany.vn/images/thumbs/000/0003792_quesadilla_500.jpeg', 'Phô mai, sốt cà chua, nhân gà nướng bơ tỏi, ớt sừng dùng kèm sốt cocktail', 'Fried Chicken'),
    ('Mỳ Ý Tôm Sốt Kem Cà Chua', 139000, 'https://thepizzacompany.vn/images/thumbs/000/0002257_spaghetti-shrimp-rose_500.png', 'Sự tươi ngon của tôm kết hợp với sốt kem cà chua', 'Spagetti'),
    ('Mỳ Ý Cay Xúc Xích', 119000, 'https://thepizzacompany.vn/images/thumbs/000/0002254_spicy-sausage-spaghetti_500.png', 'Mỳ Ý rán với xúc xích cay, thảo mộc, ngò gai và húng quế Ý', 'Spagetti'),
    ('Mỳ Ý thịt bò bằm', 149000, 'https://thepizzacompany.vn/images/thumbs/000/0002258_spaghetti-bolognese_500.png', 'Sốt thịt bò bằm đặc trưng kết hợp cùng mỳ Ý', 'Spagetti'),
    ('Mỳ Ý Cay Hải Sản', 119000, 'https://thepizzacompany.vn/images/thumbs/000/0002253_spaghetti-spicy-seafood_500.png', 'Mỳ Ý rán với các loại hải sản tươi ngon cùng ớt và tỏi', 'Spagetti'),
    ('Mỳ Ý Chay Sốt Marinara', 99000, 'https://thepizzacompany.vn/images/thumbs/000/0003135_spaghetti-vegetarian-w-marinara-sauce_500.png', 'Mỳ Ý áp chảo với sốt Marinara, nấm và cà chua đỏ', 'Spagetti'),
    ('Mỳ Ý Chay Sốt Kem Tươi', 99000, 'https://thepizzacompany.vn/images/thumbs/000/0002260_spaghetti-veggi-mushroom-cream-sauce_500.png', 'Mỳ Ý chay thơm ngon với sốt kem và nấm', 'Spagetti'),
    ('Mỳ Ý Truffle', 149000, 'https://thepizzacompany.vn/images/thumbs/000/0003667_ham-mushroom-w-cream-truffle-sause_500.png', 'Nấm Truffle đen với hương thơm ngất ngây, phủ trên lớp sốt kem nấm beo béo đậm đà cùng thịt giăm bông mềm mại.', 'Spagetti'),
    ('Mì Ý Pesto', 139000, 'https://thepizzacompany.vn/images/thumbs/000/0003669_pasta-seafood-w-pesto-sauce_500.png', 'Các loại nguyên liệu hải sản hảo hạng: Tôm, mực hoà quyện trên nền sốt Pesto xanh đậm vị, thơm hương đặc trưng từ lá húng tây, mang đậm nét truyền thống ẩm thực Ý.', 'Spagetti'),
    ('Salad Trái Cây Sốt Đào', 89000, 'https://thepizzacompany.vn/images/thumbs/000/0003668_fruitsaladbaconpeachsauce_500.png', 'Các loại trái cây thanh mát: đào, thanh long, táo, dưa hấu, cà chua bi hoà quyện cùng xốt Đào chua ngọt đặc trưng dùng kèm thịt xông khói.', 'Salad'),
    ('Salad Trộn Dầu Giấm', 79000, 'https://thepizzacompany.vn/images/thumbs/000/0002252_garden-salad_500.png', 'Rau với sốt dầu giấm', 'Salad'),
    ('Salad Nui', 79000, 'https://thepizzacompany.vn/images/thumbs/000/0003784_macaronisalad_500.png', '', 'Salad'),
    ('Salad Đặc Sắc', 89000, 'https://thepizzacompany.vn/images/thumbs/000/0002250_signature-salad_500.png', 'Salad rau và trái cây tươi dùng kèm xốt kem đặc biệt của The Pizza Company.', 'Salad'),
    ('Salad Gà Giòn Không Xương', 89000, 'https://thepizzacompany.vn/images/thumbs/000/0002600_chicken-strip-salad_500.png', 'Các loại trái cây thanh mát: đào, thanh long, táo, dưa hấu, cà chua bi hoà quyện cùng xốt Đào chua ngọt đặc trưng dùng kèm thịt xông khói.', 'Salad'),
    ('Salad Da Cá Hồi Giòn', 89000, 'https://thepizzacompany.vn/images/thumbs/000/0002601_crispy-salmon-skin-salad_500.png', 'Salad với da cá hồi giòn với bắp cải đỏ, cà chua bi, ngô với sốt Yuzu.', 'Salad'),
    ('Salad Trộn Sốt Caesar', 89000, 'https://thepizzacompany.vn/images/thumbs/000/0002251_caesars-salad_500.png', 'Rau tươi trộn với sốt Caesar.', 'Salad'),
    ('Salad Bắp Cải', 39000, 'https://thepizzacompany.vn/images/thumbs/000/0003275_cabbage-salad_500.png', '', 'Salad'),
    ('Mirinda Soda Kem Lon', 29000, 'https://thepizzacompany.vn/images/thumbs/000/0002702_mirinda-soda-kem-can_500.png', '', 'Beverage'),
    ('Pepsi Black Lime Lon', 29000, 'https://thepizzacompany.vn/images/thumbs/000/0002573_pepsi-lime-can_500.png', '', 'Beverage'),
    ('7Up Soda Chanh', 29000, 'https://thepizzacompany.vn/images/thumbs/000/0002363_7-up-can_500.jpeg', '', 'Beverage'),
    ('Pepsi Black Lon', 29000, 'https://thepizzacompany.vn/images/thumbs/000/0002420_pepsi-black-can_500.jpeg', '', 'Beverage');



INSERT INTO `Order` (Order_Date, Note,Total_Price,Status, Customer_ID, Cashier_ID, Branch_ID)
VALUES
('2023-11-21', 'Ghi chú mẫu 1',120000,'PROCESSING', 1, 2, 1),
('2023-11-23', 'Ghi chú mẫu 2',160000,'COMPLETED', 2, 4, 2),
('2023-11-25', 'Ghi chú mẫu 3',80000,'CANCELLED', 3, 6, 3),
('2023-11-27', 'Ghi chú mẫu 4',30000,'COMPLETED', 4, 8, 4),
('2023-11-29', 'Ghi chú mẫu 5',40000,'PROCESSING', 5, 10, 5);

INSERT INTO Order_Line (Order_ID, Product_ID, Quantity, Total_Price)
VALUES
(1, 4, 2, 80000),
(1, 8, 1, 40000),
(2, 12, 1, 50000),
(2, 5, 1, 30000),
(2, 3, 2, 60000),
(4, 9, 1, 30000),
(5, 14, 1, 40000);

INSERT INTO Bill (Customer_ID, Order_ID, Name, Phone, Province, District, DetailAddr, Note, Delivery_Fee, Total_Price, Method, Promotion_ID)
VALUES
(1, 1, 120000, 'Le Phan Thuy Tien', '0123456789' 'Thanh pho HCM', 'Thanh pho Thu Duc', '123 ACB', 'it ngot', 20000, 100000, 'ZaloPay', 1),
(5, 3, 120000, 'Sugar cua Ha', '0123456789' 'Thanh pho HCM', 'Thanh pho Thu Duc', '123 ACB', 'it ngot', 20000, 300000, 'MOMO', 2),
(30, 4, 120000, 'DHT', '0123456789' 'Thanh pho HCM', 'Thanh pho Thu Duc', '123 ACB', 'it ngot', 20000, 70000, 'ZaloPay', 4),
(11, 2, 120000, 'Lap trinh Web', '0123456789' 'Thanh pho HCM', 'Thanh pho Thu Duc', '123 ACB', 'it ngot', 20000, 100000, 'ZaloPay', 1);


