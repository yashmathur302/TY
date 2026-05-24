-- ============================================================
--  EduConnect – Interaction tables migration
--  Run this ONCE in cPanel phpMyAdmin on a fresh install
--  (after schema.sql has been imported)
-- ============================================================

-- 1. Add parent_id to comments for nested replies
ALTER TABLE `comments`
  ADD COLUMN `parent_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `user_id`;

ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_parent`
  FOREIGN KEY (`parent_id`) REFERENCES `comments`(`id`) ON DELETE CASCADE;

-- 2. Add location column to posts
ALTER TABLE `posts`
  ADD COLUMN `location` VARCHAR(255) NULL AFTER `feeling`;

-- 3. Create shares table (with multi-destination support, no unique constraint)
CREATE TABLE IF NOT EXISTS `shares` (
    `id`               BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`          BIGINT UNSIGNED NOT NULL,
    `post_id`          BIGINT UNSIGNED NOT NULL,
    `destination_type` VARCHAR(20)     NOT NULL DEFAULT 'profile',
    `destination_id`   BIGINT UNSIGNED NULL DEFAULT NULL,
    `caption`          TEXT            NULL,
    `created_at`       TIMESTAMP       NULL DEFAULT NULL,
    INDEX `shares_user_post_index` (`user_id`, `post_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
