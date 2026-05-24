-- Extend shares table for multi-destination sharing
-- Run this in cPanel phpMyAdmin
ALTER TABLE `shares`
  ADD COLUMN `destination_type` VARCHAR(20) NOT NULL DEFAULT 'profile' AFTER `post_id`,
  ADD COLUMN `destination_id`   BIGINT UNSIGNED NULL DEFAULT NULL AFTER `destination_type`,
  ADD COLUMN `caption`          TEXT NULL AFTER `destination_id`;
