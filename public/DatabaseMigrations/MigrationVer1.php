<?php

namespace DatabaseMigrations;

class MigrationVer1
{
    public static function command() {
        return [
            'CREATE TABLE IF NOT EXISTS discipline_test (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,name VARCHAR(255),first_answer BOOLEAN,second_answer BOOLEAN,third_answer BOOLEAN);',
            'CREATE TABLE IF NOT EXISTS blog (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, theme TEXT, message TEXT, image TEXT, created_at DATE);'
        ];
    }
}
