-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 06:59 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_children`
--

CREATE TABLE `emp_children` (
  `id` int(15) NOT NULL,
  `cs_id_no` text NOT NULL,
  `child_last_name` text NOT NULL,
  `child_first_name` text NOT NULL,
  `child_mid_name` text NOT NULL,
  `child_date_of_birth` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_civil_service_eligibility`
--

CREATE TABLE `emp_civil_service_eligibility` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `career_service` text NOT NULL,
  `rating` text NOT NULL,
  `date` text NOT NULL,
  `place` text NOT NULL,
  `license_number` text NOT NULL,
  `license_validity_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_educ_background`
--

CREATE TABLE `emp_educ_background` (
  `id` int(11) NOT NULL,
  `cs_id_no` int(15) NOT NULL,
  `level` text NOT NULL,
  `name_of_school` text NOT NULL,
  `basic_educ` text NOT NULL,
  `from` text NOT NULL,
  `to` text NOT NULL,
  `highest_level` text NOT NULL,
  `year_graduated` text NOT NULL,
  `scholarship` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_family_background`
--

CREATE TABLE `emp_family_background` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `spouse_surname` text,
  `spouse_first_name` text,
  `spouse_middle_name` text,
  `spouse_name_ext` text,
  `spouse_occupation` text,
  `spouse_employer_name` text,
  `spouse_business_address` text,
  `spouse_telephone_no` text,
  `father_surname` text,
  `father_first_name` text,
  `father_middle_name` text,
  `father_name_ext` text,
  `mother_maiden_name` text,
  `mother_surname` text,
  `mother_first_name` text,
  `mother_middle_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_ids`
--

CREATE TABLE `emp_ids` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `government_id` text NOT NULL,
  `id_license_passport_no` text NOT NULL,
  `date_place` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `last_name` text,
  `first_name` text,
  `mid_name` text,
  `ext_name` text,
  `date_of_birth` text,
  `place_of_birth` text,
  `sex` text,
  `civil_status` text,
  `height` text,
  `weight` text,
  `blood_type` text,
  `gsis_id_no` text,
  `pagibig_id_no` text,
  `philhealth_no` text,
  `sss_no` text,
  `tin_no` text,
  `agency_employee_no` text,
  `citizenship` text,
  `citizenship_type` text NOT NULL,
  `telephone_no` text,
  `mobile_no` text,
  `email_address` text,
  `number_a` text,
  `street_a` text,
  `sub_vill_a` text,
  `barangay_a` text,
  `municity_a` text,
  `province_a` text,
  `zip_code_a` text,
  `number_b` text,
  `street_b` text,
  `sub_vill_b` text,
  `barangay_b` text,
  `municity_b` text,
  `province_b` text,
  `zip_code_b` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_info`
--

INSERT INTO `emp_info` (`id`, `cs_id_no`, `last_name`, `first_name`, `mid_name`, `ext_name`, `date_of_birth`, `place_of_birth`, `sex`, `civil_status`, `height`, `weight`, `blood_type`, `gsis_id_no`, `pagibig_id_no`, `philhealth_no`, `sss_no`, `tin_no`, `agency_employee_no`, `citizenship`, `citizenship_type`, `telephone_no`, `mobile_no`, `email_address`, `number_a`, `street_a`, `sub_vill_a`, `barangay_a`, `municity_a`, `province_a`, `zip_code_a`, `number_b`, `street_b`, `sub_vill_b`, `barangay_b`, `municity_b`, `province_b`, `zip_code_b`) VALUES
(1, '1234', 'Nilo', 'Kyle Harley', 'Lumbang', 'Nilo', '20 August, 1996', 'Makati City', 'Male', 'Single', '5\'3', '83 Pounds', 'AB', '123123', '123123', '1231231', '123123', '123123', '123123', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '', 'Mayor', 'Denelyn', 'Morales', '', '9 April, 2018', '', 'Female', 'Single', '', '', '', '', '', '', '', '', '', 'Filipino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, '3333333', '3333333', '3333333333', '', '', '20 March, 2018', '', 'Male', 'Single', '', '', '', '', '', '', '', '', '', 'Filipino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_learning`
--

CREATE TABLE `emp_learning` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `name` text NOT NULL,
  `date_from` text NOT NULL,
  `date_to` text NOT NULL,
  `number_of_hours` text NOT NULL,
  `position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_other_cont`
--

CREATE TABLE `emp_other_cont` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `third_degree_flag` text NOT NULL,
  `fourth_degree_flag` text NOT NULL,
  `fourth_if_yes` text NOT NULL,
  `offense_flag` text NOT NULL,
  `offense_if_yes` text NOT NULL,
  `criminal_flag` text NOT NULL,
  `criminal_if_yes` text NOT NULL,
  `criminal_case_status` text NOT NULL,
  `crime_flag` text NOT NULL,
  `crime_if_yes` text NOT NULL,
  `separated_service_flag` text NOT NULL,
  `separated_service_if_yes` text NOT NULL,
  `elect_candidate_flag` text NOT NULL,
  `elect_candidate_if_yes` text NOT NULL,
  `campaign_flag` text NOT NULL,
  `campaign_if_yes` text NOT NULL,
  `other_resident_flag` text NOT NULL,
  `other_resident_if_yes` text NOT NULL,
  `indi_group_flag` text NOT NULL,
  `indi_group_if_yes` date NOT NULL,
  `disabled_flag` text NOT NULL,
  `disabled_if_yes` text NOT NULL,
  `solo_parent_flag` text NOT NULL,
  `solo_parent_if_yes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_other_skills`
--

CREATE TABLE `emp_other_skills` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `special_skill` text NOT NULL,
  `distinction` text NOT NULL,
  `member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_references`
--

CREATE TABLE `emp_references` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_vl_work`
--

CREATE TABLE `emp_vl_work` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `date_from` text NOT NULL,
  `date_to` text NOT NULL,
  `position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_work_experience`
--

CREATE TABLE `emp_work_experience` (
  `id` int(11) NOT NULL,
  `cs_id_no` text NOT NULL,
  `emp_work_experience` text NOT NULL,
  `date_from` text NOT NULL,
  `date_to` text NOT NULL,
  `position_title` text NOT NULL,
  `company` text NOT NULL,
  `monthly_salary` text NOT NULL,
  `salary_grade` text NOT NULL,
  `status` text NOT NULL,
  `gov_service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'developers', 'Alpha Testers');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_modules`
--

CREATE TABLE `sys_modules` (
  `id` int(11) NOT NULL,
  `module_title` text NOT NULL,
  `html_id` text NOT NULL,
  `path` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_modules`
--

INSERT INTO `sys_modules` (`id`, `module_title`, `html_id`, `path`, `icon`) VALUES
(1, 'Admin Employees', 'admin_employees', 'admin_employees', '<i class=\"fa fa-users\" aria-hidden=\"true\">');

-- --------------------------------------------------------

--
-- Table structure for table `sys_permissions`
--

CREATE TABLE `sys_permissions` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `module_id` text NOT NULL,
  `action_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1521647347, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'kyhrly@gmail.com', '$2y$08$yR2/5mT8..1ZQJyGaxMRQe8ZMkIqhKuIOZMUV/wJvBr3AFOHY9FUu', NULL, 'kyhrly@gmail.com', NULL, NULL, NULL, NULL, 1520413163, 1520413279, 1, 'Kyle Harley', 'Nilo', 'Developer', '09177386312');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(5, 1, 1),
(6, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_children`
--
ALTER TABLE `emp_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_civil_service_eligibility`
--
ALTER TABLE `emp_civil_service_eligibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_educ_background`
--
ALTER TABLE `emp_educ_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_family_background`
--
ALTER TABLE `emp_family_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_ids`
--
ALTER TABLE `emp_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cs_id_no` (`cs_id_no`(15));

--
-- Indexes for table `emp_learning`
--
ALTER TABLE `emp_learning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_other_skills`
--
ALTER TABLE `emp_other_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_references`
--
ALTER TABLE `emp_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_vl_work`
--
ALTER TABLE `emp_vl_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_work_experience`
--
ALTER TABLE `emp_work_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_modules`
--
ALTER TABLE `sys_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_children`
--
ALTER TABLE `emp_children`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_civil_service_eligibility`
--
ALTER TABLE `emp_civil_service_eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_educ_background`
--
ALTER TABLE `emp_educ_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_family_background`
--
ALTER TABLE `emp_family_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_ids`
--
ALTER TABLE `emp_ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `emp_learning`
--
ALTER TABLE `emp_learning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_other_skills`
--
ALTER TABLE `emp_other_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_references`
--
ALTER TABLE `emp_references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_vl_work`
--
ALTER TABLE `emp_vl_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_work_experience`
--
ALTER TABLE `emp_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_modules`
--
ALTER TABLE `sys_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
