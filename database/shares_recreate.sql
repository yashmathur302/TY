-- ============================================================
--  Fix shares table: drop & recreate with correct structure
--  Run this in cPanel phpMyAdmin
-- ============================================================

-- Disable FK checks so we can drop the table cleanly
SET FOREIGN_KEY_CHECKS = 0;

-- Back up any existing shares data (safety net)
CREATE TABLE IF NOT EXISTS `shares_backup` AS SELECT * FROM `shares`;

-- Drop the old table (removes unique constraint + all FK constraints)
DROP TABLE IF EXISTS `shares`;

-- Recreate with correct structure (no unique constraint, includes destination columns)
CREATE TABLE `shares` (
    `id`               BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`          BIGINT UNSIGNED NOT NULL,
    `post_id`          BIGINT UNSIGNED NOT NULL,
    `destination_type` VARCHAR(20)     NOT NULL DEFAULT 'profile',
    `destination_id`   BIGINT UNSIGNED NULL DEFAULT NULL,
    `caption`          TEXT            NULL,
    `created_at`       TIMESTAMP       NULL DEFAULT NULL,
    INDEX `shares_user_post_index` (`user_id`, `post_id`),
    CONSTRAINT `fk_shares_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_shares_post` FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Re-enable FK checks
SET FOREIGN_KEY_CHECKS = 1;
