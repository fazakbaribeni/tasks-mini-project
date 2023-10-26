CREATE DATABASE tasks_crud;

use tasks_crud;

CREATE TABLE tasks(
                     id INT(11) PRIMARY KEY AUTO_INCREMENT,
                     title VARCHAR(255) NOT NULL,
                     description TEXT default '',
                     date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESCRIBE task;



