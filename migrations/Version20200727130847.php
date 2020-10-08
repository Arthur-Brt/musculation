<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200727130847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE array_data (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, poids LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', masse_graisseuse LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', masse_musculaire LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_DA9715BB79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mesure (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, poids INT NOT NULL, masse_graisseuse INT NOT NULL, masse_musculaire INT NOT NULL, INDEX IDX_5F1B6E7079F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, taille INT NOT NULL, sexe VARCHAR(255) NOT NULL, poids LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', masse_graisseuse LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', masse_musculaire LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', date_mesure LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_mesure (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, poids INT NOT NULL, masse_graisseuse INT NOT NULL, masse_musculaire INT NOT NULL, INDEX IDX_3A49754DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE array_data ADD CONSTRAINT FK_DA9715BB79F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE mesure ADD CONSTRAINT FK_5F1B6E7079F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE user_mesure ADD CONSTRAINT FK_3A49754DA76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE array_data');
        $this->addSql('DROP TABLE mesure');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_mesure');
    }
}
