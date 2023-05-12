<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512075151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD user_id INT NOT NULL, ADD salles_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B11E4946 FOREIGN KEY (salles_id) REFERENCES salle (id)');
        $this->addSql('CREATE INDEX IDX_42C84955A76ED395 ON reservation (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C84955B11E4946 ON reservation (salles_id)');
        $this->addSql('ALTER TABLE salle_ergonomie MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON salle_ergonomie');
        $this->addSql('ALTER TABLE salle_ergonomie ADD ergonomie_id INT NOT NULL, DROP id, DROP acces_pmr, DROP lumiére_jour, DROP lumiere_artificiel, CHANGE id_ergo salle_id INT NOT NULL');
        $this->addSql('ALTER TABLE salle_ergonomie ADD CONSTRAINT FK_C230D62FDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_ergonomie ADD CONSTRAINT FK_C230D62FD0A4FB17 FOREIGN KEY (ergonomie_id) REFERENCES ergonomie (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_C230D62FDC304035 ON salle_ergonomie (salle_id)');
        $this->addSql('CREATE INDEX IDX_C230D62FD0A4FB17 ON salle_ergonomie (ergonomie_id)');
        $this->addSql('ALTER TABLE salle_ergonomie ADD PRIMARY KEY (salle_id, ergonomie_id)');
        $this->addSql('ALTER TABLE salle_logiciels MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON salle_logiciels');
        $this->addSql('ALTER TABLE salle_logiciels ADD logiciels_id INT NOT NULL, DROP id, DROP nom, CHANGE id_logiciel salle_id INT NOT NULL');
        $this->addSql('ALTER TABLE salle_logiciels ADD CONSTRAINT FK_53F2C52DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_logiciels ADD CONSTRAINT FK_53F2C52F2611475 FOREIGN KEY (logiciels_id) REFERENCES logiciels (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_53F2C52DC304035 ON salle_logiciels (salle_id)');
        $this->addSql('CREATE INDEX IDX_53F2C52F2611475 ON salle_logiciels (logiciels_id)');
        $this->addSql('ALTER TABLE salle_logiciels ADD PRIMARY KEY (salle_id, logiciels_id)');
        $this->addSql('ALTER TABLE salle_materiels MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON salle_materiels');
        $this->addSql('ALTER TABLE salle_materiels ADD materiels_id INT NOT NULL, DROP id, DROP nom, CHANGE id_materiel salle_id INT NOT NULL');
        $this->addSql('ALTER TABLE salle_materiels ADD CONSTRAINT FK_7BBAD239DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_materiels ADD CONSTRAINT FK_7BBAD239A10E8B56 FOREIGN KEY (materiels_id) REFERENCES materiels (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_7BBAD239DC304035 ON salle_materiels (salle_id)');
        $this->addSql('CREATE INDEX IDX_7BBAD239A10E8B56 ON salle_materiels (materiels_id)');
        $this->addSql('ALTER TABLE salle_materiels ADD PRIMARY KEY (salle_id, materiels_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle_logiciels DROP FOREIGN KEY FK_53F2C52DC304035');
        $this->addSql('ALTER TABLE salle_logiciels DROP FOREIGN KEY FK_53F2C52F2611475');
        $this->addSql('DROP INDEX IDX_53F2C52DC304035 ON salle_logiciels');
        $this->addSql('DROP INDEX IDX_53F2C52F2611475 ON salle_logiciels');
        $this->addSql('ALTER TABLE salle_logiciels ADD id INT AUTO_INCREMENT NOT NULL, ADD id_logiciel INT NOT NULL, ADD nom VARCHAR(255) NOT NULL, DROP salle_id, DROP logiciels_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955B11E4946');
        $this->addSql('DROP INDEX IDX_42C84955A76ED395 ON reservation');
        $this->addSql('DROP INDEX UNIQ_42C84955B11E4946 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP user_id, DROP salles_id');
        $this->addSql('ALTER TABLE salle_ergonomie DROP FOREIGN KEY FK_C230D62FDC304035');
        $this->addSql('ALTER TABLE salle_ergonomie DROP FOREIGN KEY FK_C230D62FD0A4FB17');
        $this->addSql('DROP INDEX IDX_C230D62FDC304035 ON salle_ergonomie');
        $this->addSql('DROP INDEX IDX_C230D62FD0A4FB17 ON salle_ergonomie');
        $this->addSql('ALTER TABLE salle_ergonomie ADD id INT AUTO_INCREMENT NOT NULL, ADD id_ergo INT NOT NULL, ADD acces_pmr TINYINT(1) NOT NULL, ADD lumiére_jour TINYINT(1) NOT NULL, ADD lumiere_artificiel TINYINT(1) NOT NULL, DROP salle_id, DROP ergonomie_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE salle_materiels DROP FOREIGN KEY FK_7BBAD239DC304035');
        $this->addSql('ALTER TABLE salle_materiels DROP FOREIGN KEY FK_7BBAD239A10E8B56');
        $this->addSql('DROP INDEX IDX_7BBAD239DC304035 ON salle_materiels');
        $this->addSql('DROP INDEX IDX_7BBAD239A10E8B56 ON salle_materiels');
        $this->addSql('ALTER TABLE salle_materiels ADD id INT AUTO_INCREMENT NOT NULL, ADD id_materiel INT NOT NULL, ADD nom VARCHAR(255) NOT NULL, DROP salle_id, DROP materiels_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
