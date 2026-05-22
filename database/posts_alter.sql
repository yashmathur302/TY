-- Add location column to posts table
-- Run this in cPanel phpMyAdmin if not already present
ALTER TABLE `posts` ADD COLUMN `location` VARCHAR(255) NULL AFTER `feeling`;
