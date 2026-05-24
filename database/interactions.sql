-- Run this in cPanel phpMyAdmin
-- 1. Add parent_id to comments for nested replies
ALTER TABLE `comments` ADD COLUMN `parent_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `user_id`;
ALTER TABLE `comments` ADD CONSTRAINT `fk_comment_parent` FOREIGN KEY (`parent_id`) REFERENCES `comments`(`id`) ON DELETE CASCADE;

-- 2. Create shares table
CREATE TABLE IF NOT EXISTS `shares` (
    `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`    BIGINT UNSIGNED NOT NULL,
    `post_id`    BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY `unique_share` (`user_id`, `post_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
