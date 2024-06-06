-- Create Database
CREATE DATABASE IF NOT EXISTS InfoSec;
USE InfoSec;

-- Create Users Table
CREATE TABLE IF NOT EXISTS users (
    idusers INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Create Jokes Table
CREATE TABLE IF NOT EXISTS Jokes_table (
    JokeID INT AUTO_INCREMENT PRIMARY KEY,
    Joke_questions TEXT NOT NULL,
    Joke_answer TEXT NOT NULL,
    users_idusers INT,
    FOREIGN KEY (users_idusers) REFERENCES users(idusers)
);
