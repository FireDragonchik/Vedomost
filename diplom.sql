-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 13 2022 г., 16:56
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attestations`
--

CREATE TABLE `attestations`
(
    `id`         bigint UNSIGNED NOT NULL,
    `report_id`  bigint UNSIGNED NOT NULL,
    `student_id` bigint UNSIGNED NOT NULL,
    `date`       date            NOT NULL,
    `mark`       int             NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attestations`
--

INSERT INTO `attestations` (`id`, `report_id`, `student_id`, `date`, `mark`)
VALUES (16, 1, 1, '2021-05-04', 8),
       (18, 1, 3, '2021-05-04', 8),
       (19, 1, 4, '2021-05-04', 7),
       (20, 1, 5, '2021-05-04', 9),
       (21, 1, 1, '2021-05-11', 7),
       (22, 1, 2, '2021-05-11', 9),
       (23, 1, 3, '2021-05-11', 9),
       (24, 1, 4, '2021-05-11', 7),
       (25, 1, 5, '2021-05-11', 8),
       (31, 1, 1, '2021-05-19', 9),
       (33, 1, 3, '2021-05-19', 7),
       (34, 1, 4, '2021-05-19', 8),
       (35, 1, 5, '2021-05-19', 6),
       (36, 1, 1, '2021-05-25', 9),
       (37, 1, 2, '2021-05-25', 8),
       (38, 1, 3, '2021-05-25', 9),
       (39, 1, 4, '2021-05-25', 9),
       (40, 1, 5, '2021-05-25', 9),
       (41, 1, 1, '2021-06-02', 7),
       (42, 1, 2, '2021-06-02', 7),
       (43, 1, 3, '2021-06-02', 7),
       (44, 1, 4, '2021-06-02', 9),
       (45, 1, 5, '2021-06-02', 8),
       (46, 1, 1, '2022-05-04', 5),
       (48, 1, 9, '2021-05-04', 8),
       (49, 1, 10, '2021-05-04', 7),
       (50, 1, 11, '2021-05-04', 8),
       (51, 1, 9, '2021-05-11', 7),
       (52, 1, 10, '2021-05-11', 8),
       (53, 1, 11, '2021-05-11', 7),
       (54, 1, 9, '2021-05-19', 9),
       (55, 1, 10, '2021-05-19', 8),
       (56, 1, 11, '2021-05-19', 9),
       (57, 1, 9, '2021-05-25', 7),
       (58, 1, 10, '2021-05-25', 7),
       (59, 1, 11, '2021-05-25', 6),
       (60, 1, 9, '2021-06-02', 7),
       (61, 1, 10, '2021-06-02', 8),
       (62, 1, 11, '2021-06-02', 9),
       (63, 1, 9, '2022-05-04', 7),
       (64, 1, 10, '2022-05-04', 8),
       (65, 1, 11, '2022-05-04', 9),
       (66, 1, 2, '2022-05-04', 10),
       (67, 1, 3, '2022-05-04', 10),
       (68, 1, 4, '2022-05-04', 6),
       (69, 1, 5, '2022-05-04', 5),
       (70, 7, 7, '2022-06-24', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses`
(
    `id`     bigint UNSIGNED                         NOT NULL,
    `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `course`)
VALUES (1, '1 курс'),
       (2, '2 курс'),
       (3, '3 курс'),
       (4, '4 курс'),
       (6, '5 курс');

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments`
(
    `id`         bigint UNSIGNED                         NOT NULL,
    `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id`, `department`)
VALUES (1, 'ПОСТ'),
       (2, 'ТКС'),
       (3, 'ТКС');

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines`
(
    `id`                    bigint UNSIGNED                         NOT NULL,
    `shortNameOfDiscipline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `fullNameOfDiscipline`  varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `teacher_id`            bigint UNSIGNED                         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`id`, `shortNameOfDiscipline`, `fullNameOfDiscipline`, `teacher_id`)
VALUES (1, 'КПиЯП', 'Конструирование программ и языки программирования', 1),
       (2, 'ОТЭ', 'Основы теории экономики', 2),
       (3, 'ТЭС', 'Теория электросвязи', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `education_forms`
--

CREATE TABLE `education_forms`
(
    `id`            bigint UNSIGNED                         NOT NULL,
    `educationForm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `education_forms`
--

INSERT INTO `education_forms` (`id`, `educationForm`)
VALUES (1, 'Очная'),
       (3, 'Заочная');

-- --------------------------------------------------------

--
-- Структура таблицы `faculties`
--

CREATE TABLE `faculties`
(
    `id`                 bigint UNSIGNED                         NOT NULL,
    `shortNameOfFaculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `fullNameOfFaculty`  varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `fioDean`            varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `faculties`
--

INSERT INTO `faculties` (`id`, `shortNameOfFaculty`, `fullNameOfFaculty`, `fioDean`)
VALUES (1, 'ФЭС', 'Факультет электросвязи', 'Лапцевич Александр Анатольевич'),
       (2, 'ФИТС', 'Факультет инжиниринга и технологий свзяи', 'Будник Артур Владимирович'),
       (3, 'ФЗДО', 'Факультет заочного и дистанционного образования', 'Боженков Владимир Владимирович'),
       (4, 'ФИТС', 'Факультет инжиниринга и технологий связи', 'Будник Артур Владимирович');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs`
(
    `id`         bigint UNSIGNED                         NOT NULL,
    `uuid`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `queue`      text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `payload`    longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `exception`  longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `failed_at`  timestamp                               NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `graduate_degrees`
--

CREATE TABLE `graduate_degrees`
(
    `id`                  bigint UNSIGNED                         NOT NULL,
    `graduateDegreeShort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `graduateDegreeFull`  varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `graduate_degrees`
--

INSERT INTO `graduate_degrees` (`id`, `graduateDegreeShort`, `graduateDegreeFull`)
VALUES (1, 'ВО', 'Высшее образование'),
       (3, 'ССО', 'Среднее специальное образование'),
       (4, 'ВО', 'Высшее образование');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups`
(
    `id`                 bigint UNSIGNED                         NOT NULL,
    `groupCode`          varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `course_id`          bigint UNSIGNED                         NOT NULL,
    `education_form_id`  bigint UNSIGNED                         NOT NULL,
    `graduate_degree_id` bigint UNSIGNED                         NOT NULL,
    `specialty_id`       bigint UNSIGNED                         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `groupCode`, `course_id`, `education_form_id`, `graduate_degree_id`, `specialty_id`)
VALUES (1, 'СО941', 4, 1, 1, 1),
       (2, 'СО942', 4, 1, 1, 1),
       (3, 'СО041', 1, 1, 1, 1),
       (4, 'СО042', 1, 1, 1, 1),
       (5, 'ИТ9441', 4, 1, 1, 2),
       (6, 'ИТ942', 4, 1, 1, 2),
       (7, 'ИТ042', 4, 1, 1, 2),
       (8, 'РО542', 2, 1, 1, 2),
       (9, 'РО742', 3, 1, 1, 2),
       (10, 'ТЭ941', 3, 1, 1, 2),
       (11, 'ПО842', 2, 1, 1, 1),
       (12, 'СО612', 4, 1, 1, 1),
       (13, 'РО711', 2, 1, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations`
(
    `id`        int UNSIGNED                            NOT NULL,
    `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch`     int                                     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '2014_10_12_000000_create_users_table', 1),
       (2, '2014_10_12_100000_create_password_resets_table', 1),
       (3, '2019_08_19_000000_create_failed_jobs_table', 1),
       (4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
       (5, '2022_04_19_1_create_courses_table', 1),
       (6, '2022_04_19_1_create_departments_table', 1),
       (7, '2022_04_19_1_create_education_form_table', 1),
       (8, '2022_04_19_1_create_faculties_table', 1),
       (9, '2022_04_19_1_create_graduate_degrees_table', 1),
       (10, '2022_04_19_1_create_semesters_table', 1),
       (11, '2022_04_19_1_create_teachers_table', 1),
       (12, '2022_04_19_1_create_years_table', 1),
       (13, '2022_04_19_2_create_disciplines_table', 1),
       (14, '2022_04_19_2_create_specialties_table', 1),
       (15, '2022_04_19_3_create_groups_table', 1),
       (16, '2022_04_19_4_create_students_table', 1),
       (17, '2022_04_19_5_create_reports_table', 1),
       (18, '2022_04_19_6_create_attestations_table', 1),
       (19, '2022_05_02_173729_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions`
(
    `permission_id` bigint UNSIGNED                         NOT NULL,
    `model_type`    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id`      bigint UNSIGNED                         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles`
(
    `role_id`    bigint UNSIGNED                         NOT NULL,
    `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id`   bigint UNSIGNED                         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES (2, 'App\\Models\\User', 1),
       (1, 'App\\Models\\User', 2),
       (4, 'App\\Models\\User', 3),
       (4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets`
(
    `email`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`)
VALUES ('o.petrovna@bgas.by', '$2y$10$.5.bGmOLuNsv/ppHu0GrTubT6PL7Nz1pgvfGHMRYQE4bWihfLkjRi', '2022-05-11 09:55:46'),
       ('dan.lutsevich@gmail.com', '$2y$10$e382WKUyD0L7nqsPrbugj.BI..1ykoXn4S5CLOcFbtovTadIu7SZe',
        '2022-05-11 09:57:04');

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions`
(
    `id`         bigint UNSIGNED                         NOT NULL,
    `name`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens`
(
    `id`             bigint UNSIGNED                         NOT NULL,
    `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tokenable_id`   bigint UNSIGNED                         NOT NULL,
    `name`           varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`          varchar(64) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `abilities`      text COLLATE utf8mb4_unicode_ci,
    `last_used_at`   timestamp                               NULL DEFAULT NULL,
    `created_at`     timestamp                               NULL DEFAULT NULL,
    `updated_at`     timestamp                               NULL DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reports`
--

CREATE TABLE `reports`
(
    `id`            bigint UNSIGNED NOT NULL,
    `year_id`       bigint UNSIGNED NOT NULL,
    `semester_id`   bigint UNSIGNED NOT NULL,
    `group_id`      bigint UNSIGNED NOT NULL,
    `discipline_id` bigint UNSIGNED NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reports`
--

INSERT INTO `reports` (`id`, `year_id`, `semester_id`, `group_id`, `discipline_id`)
VALUES (1, 1, 1, 1, 1),
       (3, 3, 2, 4, 2),
       (4, 3, 2, 3, 3),
       (5, 1, 1, 5, 1),
       (6, 5, 2, 3, 2),
       (7, 3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles`
(
    `id`         bigint UNSIGNED                         NOT NULL,
    `name`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES (1, 'User', 'web', '2022-05-04 12:00:42', '2022-05-04 12:00:42'),
       (2, 'Admin', 'web', '2022-05-04 12:00:47', '2022-05-04 12:00:47'),
       (4, 'Guest', 'web', '2022-05-16 11:39:40', '2022-05-16 11:39:40');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions`
(
    `permission_id` bigint UNSIGNED NOT NULL,
    `role_id`       bigint UNSIGNED NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `semesters`
--

CREATE TABLE `semesters`
(
    `id`       bigint UNSIGNED                         NOT NULL,
    `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `semesters`
--

INSERT INTO `semesters` (`id`, `semester`)
VALUES (1, 'Осенний'),
       (2, 'Весенний');

-- --------------------------------------------------------

--
-- Структура таблицы `specialties`
--

CREATE TABLE `specialties`
(
    `id`                   bigint UNSIGNED                         NOT NULL,
    `shortNameOfSpecialty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `fullNameOfSpecialty`  varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `faculty_id`           bigint UNSIGNED                         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specialties`
--

INSERT INTO `specialties` (`id`, `shortNameOfSpecialty`, `fullNameOfSpecialty`, `faculty_id`)
VALUES (1, 'СПО', 'Сопровождение ПО', 1),
       (2, 'ИТ', 'Информационные технологии', 2),
       (3, 'СТ', 'Сети телекоммуникаций', 3),
       (4, 'СПО', 'Сопровождение программного обеспечения', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students`
(
    `id`         bigint UNSIGNED                         NOT NULL,
    `fioStudent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `studentId`  int                                     NOT NULL,
    `group_id`   bigint UNSIGNED                         NOT NULL,
    `subGroup`   int                                     NOT NULL DEFAULT '1'
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `fioStudent`, `studentId`, `group_id`, `subGroup`)
VALUES (1, 'Васечек Андрей Александрович', 2, 1, 1),
       (2, 'Бетеня Яна Леонидовна', 1, 1, 1),
       (3, 'Вашкевич Вероника Александровна', 3, 1, 1),
       (4, 'Венско Виктория Вячеславовна', 4, 1, 1),
       (5, 'Казак Ангелина Михайловна', 5, 1, 1),
       (7, 'Малец Мария Александровна', 1, 2, 1),
       (9, 'Лабода Вадим Александрович', 6, 1, 1),
       (10, 'Лиходиевский Никита Викторович', 7, 1, 1),
       (11, 'Луцевич Данила Александрович', 8, 1, 1),
       (12, 'Предеина Ульяна Витальевна', 9, 1, 1),
       (13, 'Советникова Кристина Николаевна', 10, 1, 1),
       (14, 'Стадник Алина Александровна', 11, 1, 1),
       (15, 'Стрелкова Анастасия Игоревна', 12, 1, 1),
       (16, 'Суботко Екатерина Валерьевна', 13, 1, 1),
       (17, 'Хотиловский Даниил Витальевич', 14, 1, 1),
       (18, 'Шедько Егор Александрович', 15, 1, 1),
       (19, 'Шепилевич Алексей Александрович', 16, 1, 1),
       (20, 'Шимонович Анастасия Николаевна', 17, 1, 1),
       (21, 'Яковлева Дарья Витальевна', 18, 1, 1),
       (22, 'Бригор Артур Михайлович', 3, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers`
(
    `id`            bigint UNSIGNED                         NOT NULL,
    `fioTeacher`    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `position`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `department_id` bigint UNSIGNED                         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `fioTeacher`, `position`, `department_id`)
VALUES (1, 'Рябычина Ольга Петровна', 'доцент кафедры ПОСТ', 1),
       (2, 'Кравченко Юлия Романовна', 'Старший преподаватель', 2),
       (3, 'Лапцевич Александр Анатольевич', 'Декан факультета электросвязи', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users`
(
    `id`                bigint UNSIGNED                         NOT NULL,
    `name`              varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`             varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` timestamp                               NULL DEFAULT NULL,
    `password`          varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token`    varchar(100) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `created_at`        timestamp                               NULL DEFAULT NULL,
    `updated_at`        timestamp                               NULL DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`,
                     `updated_at`)
VALUES (1, 'admin', 'admin@admin.com', NULL, '$2y$10$EfBMwnFOGrjx1hen1XXZ6uASQci5USZD0TX2ZnmOafwpgkRuRDhsC',
        'R9paKXIwEU9TNFMyvJK71Hn4ahgO4mMWGBLO7RSNpaHW7eGXXfPPXNFD5ef3', NULL, NULL),
       (2, 'Рябычина Ольга Петровна', 'o.petrovna@bgas.by', NULL,
        '$2y$10$Gk3WCWMkZQ734Y5i0.IerOUQvXHjA4qjc9ZFJZLuedShtNcm8QwcG',
        'bVPAwq47ojiVb4GkRz2DRWNSiZFvjL6r17ou9gOZKgwuhA60y9fGu1o8NkYS', NULL, NULL),
       (3, 'Данила', 'dan.lutsevich@gmail.com', NULL, '$2y$10$iOyjpKryJWflIFfQAj6FqOxPb1DZ2TACgsICfRT6/Np7p3BrbcrGa',
        NULL, NULL, NULL),
       (4, 'admin#', 'adm!#in@admin.com', NULL, '$2y$10$kB/piWZwy1KCZbcxx6vh5ubg2mbbC/cSAKmq85po/PXeMPxO1S1te', NULL,
        NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `years`
--

CREATE TABLE `years`
(
    `id`   bigint UNSIGNED                         NOT NULL,
    `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `years`
--

INSERT INTO `years` (`id`, `year`)
VALUES (1, '2021/2022'),
       (3, '2020/2021'),
       (5, '2019/2020');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attestations`
--
ALTER TABLE `attestations`
    ADD PRIMARY KEY (`id`),
    ADD KEY `attestations_report_id_foreign` (`report_id`),
    ADD KEY `attestations_student_id_foreign` (`student_id`);

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
    ADD PRIMARY KEY (`id`),
    ADD KEY `disciplines_teacher_id_foreign` (`teacher_id`);

--
-- Индексы таблицы `education_forms`
--
ALTER TABLE `education_forms`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faculties`
--
ALTER TABLE `faculties`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `graduate_degrees`
--
ALTER TABLE `graduate_degrees`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
    ADD PRIMARY KEY (`id`),
    ADD KEY `groups_course_id_foreign` (`course_id`),
    ADD KEY `groups_education_form_id_foreign` (`education_form_id`),
    ADD KEY `groups_graduate_degree_id_foreign` (`graduate_degree_id`),
    ADD KEY `groups_specialty_id_foreign` (`specialty_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
    ADD PRIMARY KEY (`permission_id`, `model_id`, `model_type`),
    ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`, `model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
    ADD PRIMARY KEY (`role_id`, `model_id`, `model_type`),
    ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`, `model_type`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
    ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`, `guard_name`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
    ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`);

--
-- Индексы таблицы `reports`
--
ALTER TABLE `reports`
    ADD PRIMARY KEY (`id`),
    ADD KEY `reports_year_id_foreign` (`year_id`),
    ADD KEY `reports_semester_id_foreign` (`semester_id`),
    ADD KEY `reports_group_id_foreign` (`group_id`),
    ADD KEY `reports_discipline_id_foreign` (`discipline_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`, `guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
    ADD PRIMARY KEY (`permission_id`, `role_id`),
    ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `semesters`
--
ALTER TABLE `semesters`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specialties`
--
ALTER TABLE `specialties`
    ADD PRIMARY KEY (`id`),
    ADD KEY `specialties_faculty_id_foreign` (`faculty_id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
    ADD PRIMARY KEY (`id`),
    ADD KEY `students_group_id_foreign` (`group_id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
    ADD PRIMARY KEY (`id`),
    ADD KEY `teachers_department_id_foreign` (`department_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `years`
--
ALTER TABLE `years`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attestations`
--
ALTER TABLE `attestations`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 71;

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT для таблицы `education_forms`
--
ALTER TABLE `education_forms`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT для таблицы `faculties`
--
ALTER TABLE `faculties`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `graduate_degrees`
--
ALTER TABLE `graduate_degrees`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 14;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 20;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reports`
--
ALTER TABLE `reports`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `semesters`
--
ALTER TABLE `semesters`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `specialties`
--
ALTER TABLE `specialties`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 23;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT для таблицы `years`
--
ALTER TABLE `years`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attestations`
--
ALTER TABLE `attestations`
    ADD CONSTRAINT `attestations_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`),
    ADD CONSTRAINT `attestations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `disciplines`
--
ALTER TABLE `disciplines`
    ADD CONSTRAINT `disciplines_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
    ADD CONSTRAINT `groups_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
    ADD CONSTRAINT `groups_education_form_id_foreign` FOREIGN KEY (`education_form_id`) REFERENCES `education_forms` (`id`),
    ADD CONSTRAINT `groups_graduate_degree_id_foreign` FOREIGN KEY (`graduate_degree_id`) REFERENCES `graduate_degrees` (`id`),
    ADD CONSTRAINT `groups_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`);

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
    ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
    ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reports`
--
ALTER TABLE `reports`
    ADD CONSTRAINT `reports_discipline_id_foreign` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`),
    ADD CONSTRAINT `reports_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
    ADD CONSTRAINT `reports_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
    ADD CONSTRAINT `reports_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
    ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
    ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `specialties`
--
ALTER TABLE `specialties`
    ADD CONSTRAINT `specialties_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
    ADD CONSTRAINT `students_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
    ADD CONSTRAINT `teachers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
