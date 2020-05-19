Create database name : bvmtalks ( ref. database.php )

Create table inside "bvmtalks" using query:

CREATE TABLE userdetails (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

For admin panel::::
Register youself in "register.php" with
email : admin@bvm.com
password : Admin1234

For Ticket Book Table create table inside "bvmtalks" using query:

CREATE TABLE bookticket (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    contact VARCHAR(10),
    age VARCHAR(2),
    profession VARCHAR(10),
    payment TINYINT(1),
    book_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)