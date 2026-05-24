-- ============================================================
--  Shares table: add destination columns + drop unique constraint
--  Run this in cPanel phpMyAdmin IF you already ran interactions.sql
--  (i.e. the shares table already exists)
-- ============================================================

-- 1. Drop the unique constraint so a user can share to multiple destinations
ALTER TABLE `shares` DROP INDEX `unique_share`;

-- 2. Add destination columns
ALTER TABLE `shares`
  ADD COLUMN `destination_type` VARCHAR(20) NOT NULL DEFAULT 'profile' AFTER `post_id`,
  ADD COLUMN `destination_id`   BIGINT UNSIGNED NULL DEFAULT NULL AFTER `destination_type`,
  ADD COLUMN `caption`          TEXT NULL AFTER `destination_id`;
