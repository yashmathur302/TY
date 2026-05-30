-- ============================================================
--  Friend Requests table
--  Run this ONCE in cPanel phpMyAdmin
-- ============================================================

CREATE TABLE IF NOT EXISTS `friend_requests` (
    `id`          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `sender_id`   BIGINT UNSIGNED NOT NULL,
    `receiver_id` BIGINT UNSIGNED NOT NULL,
    `status`      ENUM('pending','accepted','declined') NOT NULL DEFAULT 'pending',
    `created_at`  TIMESTAMP NULL DEFAULT NULL,
    `updated_at`  TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY `unique_friend_request` (`sender_id`, `receiver_id`),
    FOREIGN KEY (`sender_id`)   REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`receiver_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
