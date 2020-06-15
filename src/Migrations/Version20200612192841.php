<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612192841 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, stock_initial INT NOT NULL, quantite_deposee INT NOT NULL, en_stock INT NOT NULL, quantite_vendue INT NOT NULL, quantite_restantee INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_47948BBCF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, total_vente BIGINT NOT NULL, date_vente DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_888A2A4C19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente_produit (id INT AUTO_INCREMENT NOT NULL, vente_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quantite_vendue INT NOT NULL, prix_vente_total BIGINT NOT NULL, prix_net_payer BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_76AF70C77DC7170A (vente_id), INDEX IDX_76AF70C7F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, prenom VARCHAR(50) NOT NULL, prix INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, is_activated TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, structure VARCHAR(30) NOT NULL, nom_gerant VARCHAR(70) NOT NULL, tel VARCHAR(15) NOT NULL, email VARCHAR(50) DEFAULT NULL, adresse VARCHAR(100) NOT NULL, commission DOUBLE PRECISION DEFAULT NULL, frais_exposition BIGINT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBCF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE vente_produit ADD CONSTRAINT FK_76AF70C77DC7170A FOREIGN KEY (vente_id) REFERENCES vente (id)');
        $this->addSql('ALTER TABLE vente_produit ADD CONSTRAINT FK_76AF70C7F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD categorie_id INT NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, DROP stock, DROP qte_vendue, DROP qte_restante, DROP stock_initial, CHANGE prix_vente prix_vente INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vente_produit DROP FOREIGN KEY FK_76AF70C77DC7170A');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4C19EB6921');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27670C757F');
        $this->addSql('DROP TABLE depot');
        $this->addSql('DROP TABLE vente');
        $this->addSql('DROP TABLE vente_produit');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('DROP INDEX IDX_29A5EC27BCF5E72D ON produit');
        $this->addSql('ALTER TABLE produit ADD qte_vendue INT DEFAULT NULL, ADD qte_restante INT DEFAULT NULL, ADD stock_initial INT NOT NULL, DROP created_at, DROP updated_at, CHANGE prix_vente prix_vente BIGINT NOT NULL, CHANGE categorie_id stock INT NOT NULL');
    }
}
