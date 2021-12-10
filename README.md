#cms-blog

Creation of a CMS with Php 8 (POO) and Mysql for a blog.

User registration.
Create and edit new articles with their images.
Publish comments for registered users.
Approval or deletion of comments.

Customization:
Logo navigation bar.
Header image.
Social icons and links.
Footer text.
Cookies page text.
Text of the privacy policy page.

Para empezar:

- Escribe tus datos de conexión en config/BaseMysql.php.
- Define tus enlaces en config/config.php


MYSQL DATABASE:

---------- COMMENTS TABLE ----------

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

---------- COOKIES PAGE TABLE ----------

CREATE TABLE `customise_cookies_text` (
  `id` int(11) NOT NULL,
  `cookies_text` varchar(5000) COLLATE utf8_spanish2_ci NOT NULL,
  `cookies_text_link` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_cookies_text`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_cookies_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

---------- FOOTER TABLE ----------

CREATE TABLE `customise_footer_text` (
  `id` int(11) NOT NULL,
  `footer_text` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_footer_text`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_footer_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

-------- HEADER IMAGE TABLE ----------

CREATE TABLE `customise_header_image` (
  `id` int(11) NOT NULL,
  `header_image` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_header_image`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_header_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

-------- LOGO TABLE ----------

CREATE TABLE `customise_logo` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_logo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

-------- PRIVACY PAGE TABLE ----------

CREATE TABLE `customise_privacy_text` (
  `id` int(11) NOT NULL,
  `privacy_text` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `privacy_text_link` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_privacy_text`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_privacy_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

---------- SOCIAL ICON 1 TABLE ----------

CREATE TABLE `customise_social_icon1` (
  `id` int(11) NOT NULL,
  `social_icon1` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `link_social_icon1` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_social_icon1`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_social_icon1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

---------- SOCIAL ICON 2 TABLE ----------

CREATE TABLE `customise_social_icon2` (
  `id` int(11) NOT NULL,
  `social_icon2` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `link_social_icon2` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_social_icon2`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_social_icon2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

---------- SOCIAL ICON 3 TABLE ----------

CREATE TABLE `customise_social_icon1` (
  `id` int(11) NOT NULL,
  `social_icon3` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `link_social_icon3` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_social_icon3`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_social_icon3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

---------- SOCIAL ICON 4 TABLE ----------

CREATE TABLE `customise_social_icon1` (
  `id` int(11) NOT NULL,
  `social_icon4` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `link_social_icon4` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_social_icon4`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_social_icon4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

---------- SOCIAL ICON 5 TABLE ----------

CREATE TABLE `customise_social_icon5` (
  `id` int(11) NOT NULL,
  `social_icon5` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `link_social_icon5` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `customise_social_icon5`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customise_social_icon5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

---------- POSTS TABLE ----------

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `text` text COLLATE utf8_spanish2_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

---------- ROLES TABLE ----------

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);
COMMIT;

---------- USERS TABLE ----------

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nick` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;






