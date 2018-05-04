<?php declare(strict_types = 1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180502074954 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_C860438467B3B43D');
        $this->addSql('DROP INDEX IDX_C8604384271E85C0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_deliveries AS SELECT id, users_id, clothes_id, quantity, date_delivery FROM user_deliveries');
        $this->addSql('DROP TABLE user_deliveries');
        $this->addSql('CREATE TABLE user_deliveries (id INTEGER NOT NULL, users_id INTEGER DEFAULT NULL, clothes_id INTEGER DEFAULT NULL, quantity INTEGER NOT NULL, date_delivery VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_C860438467B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C8604384271E85C0 FOREIGN KEY (clothes_id) REFERENCES clothes (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user_deliveries (id, users_id, clothes_id, quantity, date_delivery) SELECT id, users_id, clothes_id, quantity, date_delivery FROM __temp__user_deliveries');
        $this->addSql('DROP TABLE __temp__user_deliveries');
        $this->addSql('CREATE INDEX IDX_C860438467B3B43D ON user_deliveries (users_id)');
        $this->addSql('CREATE INDEX IDX_C8604384271E85C0 ON user_deliveries (clothes_id)');
        $this->addSql('DROP INDEX IDX_545C7C31271E85C0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_sizes AS SELECT id, clothes_id, user_size, user_id FROM user_sizes');
        $this->addSql('DROP TABLE user_sizes');
        $this->addSql('CREATE TABLE user_sizes (id INTEGER NOT NULL, clothes_id INTEGER DEFAULT NULL, user_size VARCHAR(255) NOT NULL COLLATE BINARY, user_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_545C7C31271E85C0 FOREIGN KEY (clothes_id) REFERENCES clothes (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user_sizes (id, clothes_id, user_size, user_id) SELECT id, clothes_id, user_size, user_id FROM __temp__user_sizes');
        $this->addSql('DROP TABLE __temp__user_sizes');
        $this->addSql('CREATE INDEX IDX_545C7C31271E85C0 ON user_sizes (clothes_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__users AS SELECT id, name, employee_code, nif, social_security, image, days_available_holidays, days_debts_request, date_first_ctt, date_old, date_expiration_ctt, date_possible_renovation, phone_number, department_id, sub_department_id FROM users');
        $this->addSql('DROP TABLE users');
        $this->addSql('CREATE TABLE users (id INTEGER NOT NULL, department_id INTEGER DEFAULT NULL, name CLOB NOT NULL COLLATE BINARY, employee_code INTEGER NOT NULL, nif VARCHAR(255) NOT NULL COLLATE BINARY, social_security INTEGER NOT NULL, image VARCHAR(255) NOT NULL COLLATE BINARY, days_available_holidays INTEGER NOT NULL, days_debts_request INTEGER NOT NULL, date_first_ctt VARCHAR(255) NOT NULL COLLATE BINARY, date_old VARCHAR(255) NOT NULL COLLATE BINARY, date_expiration_ctt VARCHAR(255) NOT NULL COLLATE BINARY, date_possible_renovation VARCHAR(255) NOT NULL COLLATE BINARY, phone_number INTEGER DEFAULT NULL, subDepartment_id INTEGER DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_1483A5E9AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1483A5E950F79BB5 FOREIGN KEY (subDepartment_id) REFERENCES sub_departments (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO users (id, name, employee_code, nif, social_security, image, days_available_holidays, days_debts_request, date_first_ctt, date_old, date_expiration_ctt, date_possible_renovation, phone_number, department_id, subDepartment_id) SELECT id, name, employee_code, nif, social_security, image, days_available_holidays, days_debts_request, date_first_ctt, date_old, date_expiration_ctt, date_possible_renovation, phone_number, department_id, sub_department_id FROM __temp__users');
        $this->addSql('DROP TABLE __temp__users');
        $this->addSql('CREATE INDEX IDX_1483A5E9AE80F5DF ON users (department_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E950F79BB5 ON users (subDepartment_id)');
        $this->addSql('DROP INDEX IDX_F357CD4AAE80F5DF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sub_departments AS SELECT id, department_id, name FROM sub_departments');
        $this->addSql('DROP TABLE sub_departments');
        $this->addSql('CREATE TABLE sub_departments (id INTEGER NOT NULL, department_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_F357CD4AAE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO sub_departments (id, department_id, name) SELECT id, department_id, name FROM __temp__sub_departments');
        $this->addSql('DROP TABLE __temp__sub_departments');
        $this->addSql('CREATE INDEX IDX_F357CD4AAE80F5DF ON sub_departments (department_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_F357CD4AAE80F5DF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sub_departments AS SELECT id, department_id, name FROM sub_departments');
        $this->addSql('DROP TABLE sub_departments');
        $this->addSql('CREATE TABLE sub_departments (id INTEGER NOT NULL, department_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO sub_departments (id, department_id, name) SELECT id, department_id, name FROM __temp__sub_departments');
        $this->addSql('DROP TABLE __temp__sub_departments');
        $this->addSql('CREATE INDEX IDX_F357CD4AAE80F5DF ON sub_departments (department_id)');
        $this->addSql('DROP INDEX IDX_C860438467B3B43D');
        $this->addSql('DROP INDEX IDX_C8604384271E85C0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_deliveries AS SELECT id, users_id, clothes_id, date_delivery, quantity FROM user_deliveries');
        $this->addSql('DROP TABLE user_deliveries');
        $this->addSql('CREATE TABLE user_deliveries (id INTEGER NOT NULL, users_id INTEGER DEFAULT NULL, clothes_id INTEGER DEFAULT NULL, date_delivery VARCHAR(255) NOT NULL, quantity INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO user_deliveries (id, users_id, clothes_id, date_delivery, quantity) SELECT id, users_id, clothes_id, date_delivery, quantity FROM __temp__user_deliveries');
        $this->addSql('DROP TABLE __temp__user_deliveries');
        $this->addSql('CREATE INDEX IDX_C860438467B3B43D ON user_deliveries (users_id)');
        $this->addSql('CREATE INDEX IDX_C8604384271E85C0 ON user_deliveries (clothes_id)');
        $this->addSql('DROP INDEX IDX_545C7C31271E85C0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_sizes AS SELECT id, clothes_id, user_id, user_size FROM user_sizes');
        $this->addSql('DROP TABLE user_sizes');
        $this->addSql('CREATE TABLE user_sizes (id INTEGER NOT NULL, clothes_id INTEGER DEFAULT NULL, user_id INTEGER NOT NULL, user_size VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO user_sizes (id, clothes_id, user_id, user_size) SELECT id, clothes_id, user_id, user_size FROM __temp__user_sizes');
        $this->addSql('DROP TABLE __temp__user_sizes');
        $this->addSql('CREATE INDEX IDX_545C7C31271E85C0 ON user_sizes (clothes_id)');
        $this->addSql('DROP INDEX IDX_1483A5E9AE80F5DF');
        $this->addSql('DROP INDEX IDX_1483A5E950F79BB5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__users AS SELECT id, department_id, name, employee_code, nif, social_security, phone_number, image, date_first_ctt, date_old, date_expiration_ctt, date_possible_renovation, days_available_holidays, days_debts_request, subDepartment_id FROM users');
        $this->addSql('DROP TABLE users');
        $this->addSql('CREATE TABLE users (id INTEGER NOT NULL, name CLOB NOT NULL, employee_code INTEGER NOT NULL, nif VARCHAR(255) NOT NULL, social_security INTEGER NOT NULL, phone_number INTEGER DEFAULT NULL, image VARCHAR(255) NOT NULL, date_first_ctt VARCHAR(255) NOT NULL, date_old VARCHAR(255) NOT NULL, date_expiration_ctt VARCHAR(255) NOT NULL, date_possible_renovation VARCHAR(255) NOT NULL, days_available_holidays INTEGER NOT NULL, days_debts_request INTEGER NOT NULL, sub_department_id INTEGER DEFAULT NULL, department_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO users (id, department_id, name, employee_code, nif, social_security, phone_number, image, date_first_ctt, date_old, date_expiration_ctt, date_possible_renovation, days_available_holidays, days_debts_request, sub_department_id) SELECT id, department_id, name, employee_code, nif, social_security, phone_number, image, date_first_ctt, date_old, date_expiration_ctt, date_possible_renovation, days_available_holidays, days_debts_request, subDepartment_id FROM __temp__users');
        $this->addSql('DROP TABLE __temp__users');
    }
}
