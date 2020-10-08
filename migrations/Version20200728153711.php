<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200728153711 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_mesure ADD test NUMERIC(10, 2) DEFAULT NULL, CHANGE poids poids NUMERIC(10, 0) NOT NULL, CHANGE masse_graisseuse masse_graisseuse NUMERIC(10, 0) NOT NULL, CHANGE masse_musculaire masse_musculaire NUMERIC(10, 0) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_mesure DROP test, CHANGE poids poids NUMERIC(11, 0) NOT NULL, CHANGE masse_graisseuse masse_graisseuse NUMERIC(11, 0) NOT NULL, CHANGE masse_musculaire masse_musculaire NUMERIC(11, 0) NOT NULL');
    }
}
