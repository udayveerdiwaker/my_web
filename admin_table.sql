CREATE TABLE
  `newsletter_subscribers` (
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;