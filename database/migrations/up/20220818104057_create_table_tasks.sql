CREATE TABLE IF NOT EXISTS tasks ( 
    id INT NOT NULL AUTO_INCREMENT, 
    title VARCHAR(120) NOT NULL, 
    status ENUM('done','pending') NOT NULL DEFAULT 'pending' , 
    PRIMARY KEY (id)
) ENGINE = InnoDB; 