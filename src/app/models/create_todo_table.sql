CREATE TABLE `todo` (
    `id`    int(10)     unsigned NOT NULL AUTO_INCREMENT,
    `content`  varchar(70)          NOT NULL,
    `is_done` boolean NOT NULL DEFAULT 0,

    PRIMARY KEY (`id`)
);
