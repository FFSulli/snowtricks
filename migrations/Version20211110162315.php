<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211110162315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE tag_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tag (id INT NOT NULL, trick_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_389B783B281BE2E ON tag (trick_id)');
        $this->addSql('CREATE TABLE trick_tag (trick_id INT NOT NULL, tag_id INT NOT NULL, PRIMARY KEY(trick_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_B4395361B281BE2E ON trick_tag (trick_id)');
        $this->addSql('CREATE INDEX IDX_B4395361BAD26311 ON trick_tag (tag_id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trick_tag ADD CONSTRAINT FK_B4395361B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trick_tag ADD CONSTRAINT FK_B4395361BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE trick_tag DROP CONSTRAINT FK_B4395361BAD26311');
        $this->addSql('DROP SEQUENCE tag_id_seq CASCADE');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE trick_tag');
    }
}
