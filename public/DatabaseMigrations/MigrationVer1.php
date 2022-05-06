<?php

namespace DatabaseMigrations;

class MigrationVer1
{
    public static function command() {
        return [
            'CREATE TABLE IF NOT EXISTS discipline_test (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,name VARCHAR(255),first_answer BOOLEAN,second_answer BOOLEAN,third_answer BOOLEAN);',
            'CREATE TABLE IF NOT EXISTS blog (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, theme TEXT, message TEXT, image TEXT, created_at DATE);',
            'CREATE TABLE IF NOT EXISTS user_data (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, visit_date TIMESTAMP, ip_address VARCHAR(200), host_name VARCHAR(200),browser_name VARCHAR(200),webpage_address VARCHAR(200));',
            'CREATE TABLE IF NOT EXISTS user (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, login VARCHAR(200) UNIQUE, password VARCHAR(200))'
        ];
    }
}
