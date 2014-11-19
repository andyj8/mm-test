CREATE TABLE `articles` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `published_at` datetime NOT NULL,
  `remote_id` varchar(50) NOT NULL,
  `provider_id` INTEGER NOT NULL,
  `slug` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL
);

CREATE TABLE `article_feeds` (
  `article_id` INTEGER NOT NULL,
  `feed_id` INTEGER unsigned NOT NULL,
  PRIMARY KEY (`article_id`,`feed_id`)
);

CREATE TABLE `article_images` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `article_id` INTEGER unsigned NOT NULL,
  `summary` text NOT NULL,
  `in_url` text NOT NULL,
  `out_url` text NOT NULL,
  `inline` INTEGER unsigned NOT NULL
);

CREATE TABLE  `article_tags` (
  `article_id` INTEGER unsigned NOT NULL,
  `tag_id` INTEGER unsigned NOT NULL,
  PRIMARY KEY (`article_id`,`tag_id`)
);

CREATE TABLE `feeds` (
  `id` INTEGER  NOT NULL  PRIMARY KEY AUTOINCREMENT,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
);

CREATE TABLE `providers` (
  `id` INTEGER NOT NULL PRIMARY KEY  AUTOINCREMENT,
  `name` varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS `remote_article_synced` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `article_id` INTEGER unsigned NOT NULL,
  `synced_at` datetime NOT NULL,
  `data` text
);

CREATE TABLE  `remote_batch_fetches` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `provider_id` INTEGER unsigned NOT NULL,
  `occurred_at` datetime NOT NULL,
  `fetched_from` datetime NOT NULL,
  `fetched_to` datetime NOT NULL
);

CREATE TABLE `remote_feeds` (
  `provider_id` INTEGER unsigned NOT NULL,
  `remote_feed` varchar(100) NOT NULL,
  `feed_id` INTEGER unsigned NOT NULL
);

CREATE TABLE `tags` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `slug` varchar(50) NOT NULL DEFAULT '0',
  `tag` varchar(50) NOT NULL
);
