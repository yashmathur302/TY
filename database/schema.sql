-- ============================================================
--  EduConnect Social Platform – MySQL Database Schema
--  Import this file via cPanel > phpMyAdmin > Import
-- ============================================================

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';

-- ------------------------------------------------------------
-- 1. USERS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
    `id`                  BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name`                VARCHAR(255)    NOT NULL,
    `username`            VARCHAR(50)     NOT NULL UNIQUE,
    `email`               VARCHAR(255)    NOT NULL UNIQUE,
    `email_verified_at`   TIMESTAMP       NULL DEFAULT NULL,
    `password`            VARCHAR(255)    NOT NULL,
    `bio`                 TEXT            NULL,
    `gender`              ENUM('male','female','other') NULL,
    `relationship_status` ENUM('none','single','in_relationship','married','engaged') DEFAULT 'none',
    `profile_photo`       VARCHAR(255)    NULL,
    `cover_photo`         VARCHAR(255)    NULL,
    `location`            VARCHAR(255)    NULL,
    `work`                VARCHAR(255)    NULL,
    `education`           VARCHAR(255)    NULL,
    `website`             VARCHAR(255)    NULL,
    `facebook_url`        VARCHAR(255)    NULL,
    `instagram_url`       VARCHAR(255)    NULL,
    `twitter_url`         VARCHAR(255)    NULL,
    `youtube_url`         VARCHAR(255)    NULL,
    `github_url`          VARCHAR(255)    NULL,
    `followers_count`     INT UNSIGNED    NOT NULL DEFAULT 0,
    `following_count`     INT UNSIGNED    NOT NULL DEFAULT 0,
    `posts_count`         INT UNSIGNED    NOT NULL DEFAULT 0,
    `role`                ENUM('user','admin') NOT NULL DEFAULT 'user',
    `is_active`           TINYINT(1)      NOT NULL DEFAULT 1,
    `last_seen_at`        TIMESTAMP       NULL DEFAULT NULL,
    `remember_token`      VARCHAR(100)    NULL,
    `created_at`          TIMESTAMP       NULL DEFAULT NULL,
    `updated_at`          TIMESTAMP       NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 2. PASSWORD RESET TOKENS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
    `email`       VARCHAR(255) NOT NULL PRIMARY KEY,
    `token`       VARCHAR(255) NOT NULL,
    `created_at`  TIMESTAMP    NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 3. SESSIONS (Laravel database sessions)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sessions` (
    `id`            VARCHAR(255)    NOT NULL PRIMARY KEY,
    `user_id`       BIGINT UNSIGNED NULL,
    `ip_address`    VARCHAR(45)     NULL,
    `user_agent`    TEXT            NULL,
    `payload`       LONGTEXT        NOT NULL,
    `last_activity` INT             NOT NULL,
    INDEX `sessions_user_id_index`       (`user_id`),
    INDEX `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 4. POSTS (Feed)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `posts` (
    `id`             BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`        BIGINT UNSIGNED NOT NULL,
    `content`        TEXT            NULL,
    `image`          VARCHAR(255)    NULL,
    `video`          VARCHAR(255)    NULL,
    `feeling`        VARCHAR(100)    NULL,
    `privacy`        ENUM('public','friends','private') NOT NULL DEFAULT 'public',
    `likes_count`    INT UNSIGNED    NOT NULL DEFAULT 0,
    `comments_count` INT UNSIGNED    NOT NULL DEFAULT 0,
    `shares_count`   INT UNSIGNED    NOT NULL DEFAULT 0,
    `created_at`     TIMESTAMP       NULL DEFAULT NULL,
    `updated_at`     TIMESTAMP       NULL DEFAULT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 5. COMMENTS (on Posts)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `comments` (
    `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `post_id`    BIGINT UNSIGNED NOT NULL,
    `user_id`    BIGINT UNSIGNED NOT NULL,
    `content`    TEXT            NOT NULL,
    `created_at` TIMESTAMP       NULL DEFAULT NULL,
    `updated_at` TIMESTAMP       NULL DEFAULT NULL,
    FOREIGN KEY (`post_id`)  REFERENCES `posts`(`id`)  ON DELETE CASCADE,
    FOREIGN KEY (`user_id`)  REFERENCES `users`(`id`)  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 6. LIKES (on Posts)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `likes` (
    `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`    BIGINT UNSIGNED NOT NULL,
    `post_id`    BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP       NULL DEFAULT NULL,
    UNIQUE KEY `unique_like` (`user_id`, `post_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 7. FOLLOWS (User → User)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `follows` (
    `id`           BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `follower_id`  BIGINT UNSIGNED NOT NULL,
    `following_id` BIGINT UNSIGNED NOT NULL,
    `created_at`   TIMESTAMP       NULL DEFAULT NULL,
    UNIQUE KEY `unique_follow` (`follower_id`, `following_id`),
    FOREIGN KEY (`follower_id`)  REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`following_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 8. STORIES
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `stories` (
    `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`    BIGINT UNSIGNED NOT NULL,
    `media`      VARCHAR(255)    NOT NULL,
    `type`       ENUM('image','video') NOT NULL DEFAULT 'image',
    `expires_at` TIMESTAMP       NOT NULL,
    `created_at` TIMESTAMP       NULL DEFAULT NULL,
    `updated_at` TIMESTAMP       NULL DEFAULT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 9. GROUPS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `groups` (
    `id`            BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name`          VARCHAR(255)    NOT NULL,
    `description`   TEXT            NULL,
    `cover_photo`   VARCHAR(255)    NULL,
    `privacy`       ENUM('public','private') NOT NULL DEFAULT 'public',
    `created_by`    BIGINT UNSIGNED NOT NULL,
    `members_count` INT UNSIGNED    NOT NULL DEFAULT 0,
    `created_at`    TIMESTAMP       NULL DEFAULT NULL,
    `updated_at`    TIMESTAMP       NULL DEFAULT NULL,
    FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 10. GROUP MEMBERS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `group_members` (
    `id`        BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `group_id`  BIGINT UNSIGNED NOT NULL,
    `user_id`   BIGINT UNSIGNED NOT NULL,
    `role`      ENUM('admin','member') NOT NULL DEFAULT 'member',
    `joined_at` TIMESTAMP       NULL DEFAULT NULL,
    UNIQUE KEY `unique_group_member` (`group_id`, `user_id`),
    FOREIGN KEY (`group_id`) REFERENCES `groups`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`)  REFERENCES `users`(`id`)  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 11. PAGES
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `pages` (
    `id`              BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name`            VARCHAR(255)    NOT NULL,
    `description`     TEXT            NULL,
    `cover_photo`     VARCHAR(255)    NULL,
    `category`        VARCHAR(100)    NULL,
    `followers_count` INT UNSIGNED    NOT NULL DEFAULT 0,
    `created_by`      BIGINT UNSIGNED NOT NULL,
    `created_at`      TIMESTAMP       NULL DEFAULT NULL,
    `updated_at`      TIMESTAMP       NULL DEFAULT NULL,
    FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 12. PAGE FOLLOWERS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `page_followers` (
    `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `page_id`    BIGINT UNSIGNED NOT NULL,
    `user_id`    BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP       NULL DEFAULT NULL,
    UNIQUE KEY `unique_page_follow` (`page_id`, `user_id`),
    FOREIGN KEY (`page_id`)  REFERENCES `pages`(`id`)  ON DELETE CASCADE,
    FOREIGN KEY (`user_id`)  REFERENCES `users`(`id`)  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 13. EVENTS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `events` (
    `id`               BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title`            VARCHAR(255)    NOT NULL,
    `description`      TEXT            NULL,
    `cover_photo`      VARCHAR(255)    NULL,
    `location`         VARCHAR(255)    NULL,
    `start_date`       DATETIME        NOT NULL,
    `end_date`         DATETIME        NULL,
    `created_by`       BIGINT UNSIGNED NOT NULL,
    `going_count`      INT UNSIGNED    NOT NULL DEFAULT 0,
    `interested_count` INT UNSIGNED    NOT NULL DEFAULT 0,
    `created_at`       TIMESTAMP       NULL DEFAULT NULL,
    `updated_at`       TIMESTAMP       NULL DEFAULT NULL,
    FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 14. EVENT ATTENDEES
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `event_attendees` (
    `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `event_id`   BIGINT UNSIGNED NOT NULL,
    `user_id`    BIGINT UNSIGNED NOT NULL,
    `status`     ENUM('going','interested') NOT NULL,
    `created_at` TIMESTAMP       NULL DEFAULT NULL,
    UNIQUE KEY `unique_attendee` (`event_id`, `user_id`),
    FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`)  REFERENCES `users`(`id`)  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 15. BLOG POSTS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_posts` (
    `id`              BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`         BIGINT UNSIGNED NOT NULL,
    `title`           VARCHAR(255)    NOT NULL,
    `content`         LONGTEXT        NOT NULL,
    `cover_image`     VARCHAR(255)    NULL,
    `category`        VARCHAR(100)    NULL,
    `likes_count`     INT UNSIGNED    NOT NULL DEFAULT 0,
    `comments_count`  INT UNSIGNED    NOT NULL DEFAULT 0,
    `views_count`     INT UNSIGNED    NOT NULL DEFAULT 0,
    `published_at`    TIMESTAMP       NULL DEFAULT NULL,
    `created_at`      TIMESTAMP       NULL DEFAULT NULL,
    `updated_at`      TIMESTAMP       NULL DEFAULT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 16. BLOG COMMENTS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_comments` (
    `id`           BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `blog_post_id` BIGINT UNSIGNED NOT NULL,
    `user_id`      BIGINT UNSIGNED NOT NULL,
    `content`      TEXT            NOT NULL,
    `created_at`   TIMESTAMP       NULL DEFAULT NULL,
    `updated_at`   TIMESTAMP       NULL DEFAULT NULL,
    FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`)      REFERENCES `users`(`id`)      ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 17. MESSAGES (Direct Messages)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `messages` (
    `id`          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `sender_id`   BIGINT UNSIGNED NOT NULL,
    `receiver_id` BIGINT UNSIGNED NOT NULL,
    `content`     TEXT            NOT NULL,
    `read_at`     TIMESTAMP       NULL DEFAULT NULL,
    `created_at`  TIMESTAMP       NULL DEFAULT NULL,
    `updated_at`  TIMESTAMP       NULL DEFAULT NULL,
    INDEX `messages_sender_index`   (`sender_id`),
    INDEX `messages_receiver_index` (`receiver_id`),
    FOREIGN KEY (`sender_id`)   REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`receiver_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 18. NOTIFICATIONS
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `notifications` (
    `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`    BIGINT UNSIGNED NOT NULL,
    `type`       VARCHAR(100)    NOT NULL,
    `data`       JSON            NULL,
    `read_at`    TIMESTAMP       NULL DEFAULT NULL,
    `created_at` TIMESTAMP       NULL DEFAULT NULL,
    INDEX `notifications_user_id_index` (`user_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 19. CACHE (Laravel cache table driver)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `cache` (
    `key`        VARCHAR(255) NOT NULL PRIMARY KEY,
    `value`      MEDIUMTEXT   NOT NULL,
    `expiration` INT          NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `cache_locks` (
    `key`        VARCHAR(255) NOT NULL PRIMARY KEY,
    `owner`      VARCHAR(255) NOT NULL,
    `expiration` INT          NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 20. JOBS (Laravel queue)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobs` (
    `id`           BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `queue`        VARCHAR(255)    NOT NULL,
    `payload`      LONGTEXT        NOT NULL,
    `attempts`     TINYINT UNSIGNED NOT NULL,
    `reserved_at`  INT UNSIGNED    NULL,
    `available_at` INT UNSIGNED    NOT NULL,
    `created_at`   INT UNSIGNED    NOT NULL,
    INDEX `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
--  End of Schema
-- ============================================================
