CREATE TABLE IF NOT EXISTS BRAND(
	B_ID INT AUTO_INCREMENT,
	B_NAME VARCHAR(100),
	B_IMAGE VARCHAR(10),

	CONSTRAINT PK_B_ID PRIMARY KEY(B_ID)
);

CREATE TABLE IF NOT EXISTS PRODUCT(
	P_ID INT AUTO_INCREMENT,
	P_NAME VARCHAR(300),
	P_PRICE VARCHAR(8),
	P_STATUS BOOLEAN,
	P_BRAND INT,
	CREATED_AT VARCHAR(11),

	CONSTRAINT PK_P_ID PRIMARY KEY(P_ID),
	CONSTRAINT FK_P_BRAND FOREIGN KEY(P_BRAND) REFERENCES BRAND(B_ID)
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);

INSERT INTO users (name, email) VALUES
('Rahul Sharma', 'rahul.sharma@gmail.com'),
('Priya Patel', 'priya.patel@gmail.com'),
('Amit Verma', 'amit.verma@gmail.com'),
('Sneha Joshi', 'sneha.joshi@gmail.com'),
('Karan Mehta', 'karan.mehta@gmail.com'),
('Neha Singh', 'neha.singh@gmail.com'),
('Vikram Desai', 'vikram.desai@gmail.com'),
('Anjali Trivedi', 'anjali.trivedi@gmail.com'),
('Rohan Gupta', 'rohan.gupta@gmail.com'),
('Pooja Shah', 'pooja.shah@gmail.com');

ALTER TABLE PRODUCT ADD P_IMAGE VARCHAR(10) AFTER P_BRAND;
ALTER TABLE PRODUCT ADD P_DESC VARCHAR(100) AFTER P_BRAND;