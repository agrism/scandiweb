<?php
namespace Database;

class Migration
{
    public static function migrate(){

        $sql ="
                    -- --------------------------------------------------------
            -- Host:                         127.0.0.1
            -- Server version:               5.5.48 - MySQL Community Server (GPL)
            -- Server OS:                    Win32
            -- HeidiSQL Version:             9.3.0.4984
            -- --------------------------------------------------------
            
            /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
            /*!40101 SET NAMES utf8mb4 */;
            /*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
            /*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
            -- Dumping data for table scandinavian_web.products: ~3 rows (approximately)
            /*!40000 ALTER TABLE `products` DISABLE KEYS */;
            INSERT INTO `products` (`id`, `name`, `price`, `type_id`, `created_at`) VALUES
                (4, 'Prod4455', 1.00, 1, '2018-08-01 22:08:56'),
                (5, 'Prod5', 10.00, 2, '2018-08-01 22:12:27'),
                (6, 'Prod6', 6.00, 3, '2018-08-01 23:50:47');
            /*!40000 ALTER TABLE `products` ENABLE KEYS */;
            
            -- Dumping data for table scandinavian_web.sizes: ~5 rows (approximately)
            /*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
            INSERT INTO `sizes` (`id`, `property`, `value`, `is_visible`) VALUES
                (1, 'Size', 'MB', 1),
                (2, 'Weight', 'Kg', 1),
                (3, 'Height', NULL, 0),
                (4, 'Width', NULL, 0),
                (5, 'Length', NULL, 0);
            /*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
            
            -- Dumping data for table scandinavian_web.types: ~3 rows (approximately)
            /*!40000 ALTER TABLE `types` DISABLE KEYS */;
            INSERT INTO `types` (`id`, `name`, `unit`) VALUES
                (1, 'Size', 'MB'),
                (2, 'Weight', 'Kg'),
                (3, 'Dimension', NULL);
            /*!40000 ALTER TABLE `types` ENABLE KEYS */;
            
            -- Dumping data for table scandinavian_web.type_sizes: ~5 rows (approximately)
            /*!40000 ALTER TABLE `type_sizes` DISABLE KEYS */;
            INSERT INTO `type_sizes` (`id`, `type_id`, `size_id`) VALUES
                (1, 1, 1),
                (2, 2, 2),
                (3, 3, 3),
                (4, 3, 4),
                (5, 4, 5);
            /*!40000 ALTER TABLE `type_sizes` ENABLE KEYS */;
            /*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
            /*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
            /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
        ";
    }
}