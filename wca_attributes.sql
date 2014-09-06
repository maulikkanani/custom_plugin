
--
-- Table structure for table `wp_wca_buttons`
--

CREATE TABLE IF NOT EXISTS `wp_wca_buttons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=inactive,1=active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wp_wca_buttons`
--

INSERT INTO `wp_wca_buttons` (`id`, `name`, `color`, `category_id`, `status`) VALUES
(1, 'Brown button', 'Brown', 1, '1'),
(2, 'Black button', 'Black', 1, '1'),
(3, '3', '', 1, '0'),
(4, '4', '', 1, '0'),
(7, '7', '', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_button_hilo`
--

CREATE TABLE IF NOT EXISTS `wp_wca_button_hilo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wp_wca_button_hilo`
--

INSERT INTO `wp_wca_button_hilo` (`id`, `name`, `color`, `category_id`, `status`) VALUES
(1, '1', 'yellows', 1, '1'),
(2, '2', '', 1, '1'),
(3, '3', '', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_button_ojal`
--

CREATE TABLE IF NOT EXISTS `wp_wca_button_ojal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_wca_button_ojal`
--

INSERT INTO `wp_wca_button_ojal` (`id`, `name`, `color`, `category_id`, `status`) VALUES
(1, '1', 'yellow', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_elbow_patches`
--

CREATE TABLE IF NOT EXISTS `wp_wca_elbow_patches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_wca_elbow_patches`
--

INSERT INTO `wp_wca_elbow_patches` (`id`, `name`, `color`, `category_id`, `status`) VALUES
(1, '1', 'Black', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_fabrics`
--

CREATE TABLE IF NOT EXISTS `wp_wca_fabrics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL DEFAULT '0',
  `button_id` int(12) NOT NULL,
  `zipper_id` int(12) NOT NULL,
  `lining_id` int(12) NOT NULL,
  `total_linings` varchar(255) DEFAULT NULL,
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_wca_fabrics`
--

INSERT INTO `wp_wca_fabrics` (`id`, `titel`, `color`, `reference`, `material`, `price`, `button_id`, `zipper_id`, `lining_id`, `total_linings`, `category_id`, `status`) VALUES
(1, 'Elandia', '1', '1', '52% cotton & 48% polyester', '217', 1, 1, 1, '2,4,5,7', 1, '1'),
(2, 'Newport', '2', '2', '53% cotton & 48% polyester', '218', 2, 2, 1, '2,3,6,7', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_fabric_colors`
--

CREATE TABLE IF NOT EXISTS `wp_wca_fabric_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_wca_fabric_colors`
--

INSERT INTO `wp_wca_fabric_colors` (`id`, `name`, `color`, `category_id`, `status`) VALUES
(1, 'Khaki', 'khaki', 1, '1'),
(2, 'Marron', 'Marron', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_images`
--

CREATE TABLE IF NOT EXISTS `wp_wca_images` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `master_id` int(12) NOT NULL,
  `row_id` int(12) NOT NULL,
  `type` enum('front','back') DEFAULT NULL,
  `image_extension` varchar(500) NOT NULL,
  `current_image_extension` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=431 ;

--
-- Dumping data for table `wp_wca_images`
--

INSERT INTO `wp_wca_images` (`id`, `image_name`, `master_id`, `row_id`, `type`, `image_extension`, `current_image_extension`) VALUES
(1, 'boton_belt_back_lapel_1.png', 1, 1, '', 'boton_belt_back_lapel_1.png', 'boton_belt_back_lapel_1.png'),
(2, 'boton_belt_sewing_fit0.png', 1, 1, '', 'boton_belt_sewing_fit0.png', 'boton_belt_sewing_fit0.png'),
(3, 'boton_belt_sewing_fit1.png', 1, 1, '', 'boton_belt_sewing_fit1.png', 'boton_belt_sewing_fit1.png'),
(4, 'boton_body_crossed_boton_standard.png', 1, 1, '', 'boton_body_crossed_boton_standard.png', 'boton_body_crossed_boton_standard.png'),
(5, 'boton_body_simple_boton_hide.png', 1, 1, '', 'boton_body_simple_boton_standard.png', 'boton_body_simple_boton_hide.png'),
(6, 'boton_body_simple_boton_standard.png', 1, 1, '', 'boton_body_simple_boton_hide.png', 'boton_body_simple_boton_standard.png'),
(7, 'boton_shoulder_tape.png', 1, 1, '', 'boton_shoulder_tape.png', 'boton_shoulder_tape.png'),
(8, 'boton_sleeve.png', 1, 1, '', 'boton_sleeve.png', 'boton_sleeve.png'),
(16, 'boton_belt_back_lapel_1.png', 1, 7, '', 'boton_belt_back_lapel_1.png', 'boton_belt_back_lapel_1.png'),
(17, 'boton_belt_sewing_fit0.png', 1, 7, '', 'boton_belt_sewing_fit0.png', 'boton_belt_sewing_fit0.png'),
(18, 'boton_belt_sewing_fit1.png', 1, 7, '', 'boton_belt_sewing_fit1.png', 'boton_belt_sewing_fit1.png'),
(19, 'boton_body_crossed_boton_standard.png', 1, 7, '', 'boton_body_crossed_boton_standard.png', 'boton_body_crossed_boton_standard.png'),
(20, 'boton_body_simple_boton_hide.png', 1, 7, '', 'boton_body_simple_boton_standard.png', 'boton_body_simple_boton_hide.png'),
(21, 'boton_body_simple_boton_standard.png', 1, 7, '', 'boton_body_simple_boton_hide.png', 'boton_body_simple_boton_standard.png'),
(22, 'boton_shoulder_tape.png', 1, 7, '', 'boton_shoulder_tape.png', 'boton_shoulder_tape.png'),
(27, 'crossed_zipper_standard_long.png', 2, 1, '', 'crossed_zipper_standard_long.png', 'crossed_zipper_standard_long.png'),
(28, 'crossed_zipper_standard_short.png', 2, 1, '', 'crossed_zipper_standard_short.png', 'crossed_zipper_standard_short.png'),
(29, 'simple_zipper_hide_long.png', 2, 1, '', 'simple_zipper_hide_long.png', 'simple_zipper_hide_long.png'),
(30, 'simple_zipper_hide_short.png', 2, 1, '', 'simple_zipper_hide_short.png', 'simple_zipper_hide_short.png'),
(31, 'simple_zipper_standard_long.png', 2, 1, '', 'simple_zipper_standard_long.png', 'simple_zipper_standard_long.png'),
(33, 'simple_zipper_standard_short.png', 2, 1, '', 'simple_zipper_standard_short.png', 'simple_zipper_standard_short.png'),
(35, 'boton_sleeve.png', 1, 7, '', 'boton_sleeve.png', 'boton_sleeve.png'),
(36, 'big.jpg', 1, 7, '', 'big.jpg', 'big.jpg'),
(38, 'linings.png', 5, 1, '', 'linings.png', 'linings.png'),
(39, 'thumb.jpg', 5, 1, '', 'thumb.jpg', 'thumb.jpg'),
(40, 'big.jpg', 5, 1, '', 'big.jpg', 'big.jpg'),
(41, 'big.jpg', 1, 1, '', 'big.jpg', 'big.jpg'),
(51, 'back_lapel.png', 3, 1, '', 'back_lapel.png', 'back_lapel.png'),
(61, 'belt_sewing_fit0.png', 3, 1, '', 'belt_sewing_fit0.png', 'belt_sewing_fit0.png'),
(62, 'belt_sewing_fit1.png', 3, 1, '', 'belt_sewing_fit1.png', 'belt_sewing_fit1.png'),
(63, 'body_crossed_boton_standard.png', 3, 1, '', 'body_crossed_boton_standard.png', 'body_crossed_boton_standard.png'),
(64, 'body_simple_boton_hide.png', 3, 1, '', 'body_simple_boton_standard.png', 'body_simple_boton_hide.png'),
(66, 'shoulder.png', 3, 1, '', 'shoulder.png', 'shoulder.png'),
(67, 'sleev.png', 3, 1, '', 'sleev.png', 'sleev.png'),
(72, 'body_simple_boton_standard.png', 3, 1, '', 'body_simple_boton_hide.png', 'body_simple_boton_standard.png'),
(73, 'hilo.png', 3, 1, '', 'hilo.png', 'hilo.png'),
(74, 'back_lapel.png', 3, 2, '', 'back_lapel.png', 'back_lapel.png'),
(75, 'belt_sewing_fit0.png', 3, 2, '', 'belt_sewing_fit0.png', 'belt_sewing_fit0.png'),
(76, 'belt_sewing_fit1.png', 3, 2, '', 'belt_sewing_fit1.png', 'belt_sewing_fit1.png'),
(77, 'body_crossed_boton_standard.png', 3, 2, '', 'body_crossed_boton_standard.png', 'body_crossed_boton_standard.png'),
(78, 'body_simple_boton_hide.png', 3, 2, '', 'body_simple_boton_standard.png', 'body_simple_boton_hide.png'),
(79, 'body_simple_boton_standard.png', 3, 2, '', 'body_simple_boton_hide.png', 'body_simple_boton_standard.png'),
(80, 'shoulder.png', 3, 2, '', 'shoulder.png', 'shoulder.png'),
(81, 'sleev.png', 3, 2, '', 'sleev.png', 'sleev.png'),
(82, 'hilo.png', 3, 2, '', 'hilo.png', 'hilo.png'),
(83, 'back_lapel.png', 3, 3, '', 'back_lapel.png', 'back_lapel.png'),
(84, 'belt_sewing_fit0.png', 3, 3, '', 'belt_sewing_fit1.png', 'belt_sewing_fit0.png'),
(85, 'belt_sewing_fit1.png', 3, 3, '', 'belt_sewing_fit0.png', 'belt_sewing_fit1.png'),
(86, 'body_crossed_boton_standard.png', 3, 3, '', 'body_crossed_boton_standard.png', 'body_crossed_boton_standard.png'),
(87, 'body_simple_boton_hide.png', 3, 3, '', 'body_simple_boton_standard.png', 'body_simple_boton_hide.png'),
(88, 'body_simple_boton_standard.png', 3, 3, '', 'body_simple_boton_hide.png', 'body_simple_boton_standard.png'),
(90, 'shoulder.png', 3, 3, '', 'shoulder.png', 'shoulder.png'),
(91, 'sleev.png', 3, 3, '', 'sleev.png', 'sleev.png'),
(92, 'hilo.png', 3, 3, '', 'hilo.png', 'hilo.png'),
(93, 'hilo_icon.jpg', 3, 1, '', '9.jpg', 'hilo_icon.jpg'),
(94, 'hilo_icon.jpg', 3, 2, '', '11.jpg', 'hilo_icon.jpg'),
(108, 'ojal_icon.png', 4, 1, '', '9.jpg', 'ojal_icon.png'),
(109, 'belt_sewing_fit0.png', 4, 1, '', 'belt_sewing_fit1.png', 'belt_sewing_fit0.png'),
(110, 'belt_sewing_fit1.png', 4, 1, '', 'belt_sewing_fit0.png', 'belt_sewing_fit1.png'),
(111, 'body_crossed_boton_standard.png', 4, 1, '', 'body_crossed_boton_standard.png', 'body_crossed_boton_standard.png'),
(112, 'body_simple_boton_hide.png', 4, 1, '', 'body_simple_boton_standard.png', 'body_simple_boton_hide.png'),
(113, 'body_simple_boton_standard.png', 4, 1, '', 'body_simple_boton_hide.png', 'body_simple_boton_standard.png'),
(114, 'shoulder.png', 4, 1, '', 'shoulder.png', 'shoulder.png'),
(115, 'sleev.png', 4, 1, '', 'sleev.png', 'sleev.png'),
(116, 'ojal.png', 4, 1, '', 'ojal.png', 'ojal.png'),
(117, 'neck_lining.png', 7, 1, '', '1.png', 'neck_lining.png'),
(118, 'neck_lining_icon.jpg', 7, 1, '', '1.jpg', 'neck_lining_icon.jpg'),
(120, 'elbow_patches.png', 8, 1, '', '1.png', 'elbow_patches.png'),
(121, 'linings.png', 5, 2, '', 'linings.png', 'linings.png'),
(122, 'thumb.jpg', 5, 2, '', 'thumb.jpg', 'thumb.jpg'),
(123, 'big.jpg', 5, 2, '', 'big.jpg', 'big.jpg'),
(126, 'big.jpg', 6, 1, '', 'big.jpg', 'big.jpg'),
(127, 'thumb.jpg', 6, 1, '', 'big.jpg', 'thumb.jpg'),
(128, 'big.jpg', 6, 2, '', 'big.jpg', 'big.jpg'),
(129, 'thumb.jpg', 6, 2, '', 'big.jpg', 'thumb.jpg'),
(130, 'neck_lining_icon.jpg', 7, 2, '', '2.jpg', 'neck_lining_icon.jpg'),
(131, 'neck_lining.png', 7, 2, '', '2.png', 'neck_lining.png'),
(132, 'boton_belt_back_lapel_1.png', 1, 2, '', 'boton_belt_back_lapel_1.png', 'boton_belt_back_lapel_1.png'),
(133, 'boton_belt_sewing_fit0.png', 1, 2, '', 'boton_belt_sewing_fit1.png', 'boton_belt_sewing_fit0.png'),
(134, 'boton_belt_sewing_fit1.png', 1, 2, '', 'boton_belt_sewing_fit0.png', 'boton_belt_sewing_fit1.png'),
(135, 'boton_body_crossed_boton_standard.png', 1, 2, '', 'boton_body_crossed_boton_standard.png', 'boton_body_crossed_boton_standard.png'),
(136, 'boton_body_simple_boton_hide.png', 1, 2, '', 'boton_body_simple_boton_hide.png', 'boton_body_simple_boton_hide.png'),
(137, 'boton_body_simple_boton_standard.png', 1, 2, '', 'boton_body_simple_boton_standard.png', 'boton_body_simple_boton_standard.png'),
(138, 'boton_shoulder_tape.png', 1, 2, '', 'boton_shoulder_tape.png', 'boton_shoulder_tape.png'),
(139, 'boton_sleeve.png', 1, 2, '', 'boton_sleeve.png', 'boton_sleeve.png'),
(140, 'big.jpg', 1, 2, '', 'big.jpg', 'big.jpg'),
(141, 'crossed_zipper_standard_long.png', 2, 2, '', 'crossed_zipper_standard_long.png', 'crossed_zipper_standard_long.png'),
(142, 'crossed_zipper_standard_short.png', 2, 2, '', 'crossed_zipper_standard_short.png', 'crossed_zipper_standard_short.png'),
(143, 'simple_zipper_hide_long.png', 2, 2, '', 'simple_zipper_hide_long.png', 'simple_zipper_hide_long.png'),
(144, 'simple_zipper_hide_short.png', 2, 2, '', 'simple_zipper_hide_short.png', 'simple_zipper_hide_short.png'),
(145, 'simple_zipper_standard_long.png', 2, 2, '', 'simple_zipper_standard_long.png', 'simple_zipper_standard_long.png'),
(146, 'simple_zipper_standard_short.png', 2, 2, '', 'simple_zipper_standard_short.png', 'simple_zipper_standard_short.png'),
(147, 'linings.png', 5, 3, '', 'linings.png', 'linings.png'),
(148, 'thumb.jpg', 5, 3, '', 'thumb.jpg', 'thumb.jpg'),
(149, 'big.jpg', 5, 3, '', 'big.jpg', 'big.jpg'),
(150, 'linings.png', 5, 4, '', 'linings.png', 'linings.png'),
(151, 'thumb.jpg', 5, 4, '', 'thumb.jpg', 'thumb.jpg'),
(152, 'big.jpg', 5, 4, '', 'big.jpg', 'big.jpg'),
(153, 'linings.png', 5, 5, '', 'linings.png', 'linings.png'),
(154, 'thumb.jpg', 5, 5, '', 'thumb.jpg', 'thumb.jpg'),
(155, 'big.jpg', 5, 5, '', 'big.jpg', 'big.jpg'),
(156, 'linings.png', 5, 6, '', 'linings.png', 'linings.png'),
(157, 'thumb.jpg', 5, 6, '', 'thumb.jpg', 'thumb.jpg'),
(158, 'big.jpg', 5, 6, '', 'big.jpg', 'big.jpg'),
(159, 'linings.png', 5, 7, '', 'linings.png', 'linings.png'),
(160, 'thumb.jpg', 5, 7, '', 'thumb.jpg', 'thumb.jpg'),
(161, 'big.jpg', 5, 7, '', 'big.jpg', 'big.jpg'),
(162, 'linings.png', 5, 8, '', 'linings.png', 'linings.png'),
(163, 'thumb.jpg', 5, 8, '', 'thumb.jpg', 'thumb.jpg'),
(164, 'big.jpg', 5, 8, '', 'big.jpg', 'big.jpg'),
(165, 'elbow_patches_icon.jpg', 8, 1, '', '55.jpg', 'elbow_patches_icon.jpg'),
(298, 'belt_loose_fit0.png', 9, 1, 'front', 'belt_loose_fit0.png', 'front_belt_loose_fit0.png'),
(299, 'belt_loose_fit1.png', 9, 1, 'front', 'belt_loose_fit1.png', 'front_belt_loose_fit1.png'),
(300, 'body_crossed_boton_standard_fit0_long.png', 9, 1, 'front', 'body_crossed_boton_standard_fit0_long.png', 'front_body_crossed_boton_standard_fit0_long.png'),
(301, 'body_crossed_boton_standard_fit0_short.png', 9, 1, 'front', 'body_crossed_boton_standard_fit0_short.png', 'body_crossed_boton_standard_fit0_short.png'),
(302, 'body_crossed_boton_standard_fit1_long.png', 9, 1, 'front', 'body_crossed_boton_standard_fit1_long.png', 'body_crossed_boton_standard_fit1_long.png'),
(303, 'body_crossed_boton_standard_fit1_short.png', 9, 1, 'front', 'body_crossed_boton_standard_fit1_short.png', 'body_crossed_boton_standard_fit1_short.png'),
(304, 'body_crossed_zipper_standard_fit0_long.png', 9, 1, 'front', 'body_crossed_zipper_standard_fit0_long.png', 'body_crossed_zipper_standard_fit0_long.png'),
(305, 'body_crossed_zipper_standard_fit0_short.png', 9, 1, 'front', 'body_crossed_zipper_standard_fit0_short.png', 'body_crossed_zipper_standard_fit0_short.png'),
(306, 'body_crossed_zipper_standard_fit1_long.png', 9, 1, 'front', 'body_crossed_zipper_standard_fit1_long.png', 'body_crossed_zipper_standard_fit1_long.png'),
(307, 'body_crossed_zipper_standard_fit1_short.png', 9, 1, 'front', 'body_crossed_zipper_standard_fit1_short.png', 'body_crossed_zipper_standard_fit1_short.png'),
(308, 'body_simple_boton_hide_fit0_long.png', 9, 1, 'front', 'body_simple_boton_hide_fit0_long.png', 'body_simple_boton_hide_fit0_long.png'),
(309, 'body_simple_boton_hide_fit0_short.png', 9, 1, 'front', 'body_simple_boton_hide_fit0_short.png', 'body_simple_boton_hide_fit0_short.png'),
(310, 'body_simple_boton_hide_fit1_long.png', 9, 1, 'front', 'body_simple_boton_hide_fit1_long.png', 'body_simple_boton_hide_fit1_long.png'),
(311, 'body_simple_boton_hide_fit1_short.png', 9, 1, 'front', 'body_simple_boton_hide_fit1_short.png', 'body_simple_boton_hide_fit1_short.png'),
(312, 'body_simple_boton_standard_fit0_long.png', 9, 1, 'front', 'body_simple_boton_standard_fit0_long.png', 'body_simple_boton_standard_fit0_long.png'),
(313, 'body_simple_boton_standard_fit0_short.png', 9, 1, 'front', 'body_simple_boton_standard_fit0_short.png', 'body_simple_boton_standard_fit0_short.png'),
(314, 'body_simple_boton_standard_fit1_long.png', 9, 1, 'front', 'body_simple_boton_standard_fit1_long.png', 'body_simple_boton_standard_fit1_long.png'),
(315, 'body_simple_boton_standard_fit1_short.png', 9, 1, 'front', 'body_simple_boton_standard_fit1_short.png', 'body_simple_boton_standard_fit1_short.png'),
(316, 'body_simple_zipper_hide_fit0_long.png', 9, 1, 'front', 'body_simple_zipper_hide_fit0_long.png', 'body_simple_zipper_hide_fit0_long.png'),
(317, 'body_simple_zipper_hide_fit0_short.png', 9, 1, 'front', 'body_simple_zipper_hide_fit0_short.png', 'body_simple_zipper_hide_fit0_short.png'),
(318, 'body_simple_zipper_hide_fit1_long.png', 9, 1, 'front', 'body_simple_zipper_hide_fit1_long.png', 'body_simple_zipper_hide_fit1_long.png'),
(319, 'body_simple_zipper_hide_fit1_short.png', 9, 1, 'front', 'body_simple_zipper_hide_fit1_short.png', 'body_simple_zipper_hide_fit1_short.png'),
(320, 'body_simple_zipper_standard_fit0_long.png', 9, 1, 'front', 'body_simple_zipper_standard_fit0_long.png', 'body_simple_zipper_standard_fit0_long.png'),
(321, 'body_simple_zipper_standard_fit0_short.png', 9, 1, 'front', 'body_simple_zipper_standard_fit0_short.png', 'body_simple_zipper_standard_fit0_short.png'),
(322, 'body_simple_zipper_standard_fit1_long.png', 9, 1, 'front', 'body_simple_zipper_standard_fit1_long.png', 'body_simple_zipper_standard_fit1_long.png'),
(323, 'body_simple_zipper_standard_fit1_short.png', 9, 1, 'front', 'body_simple_zipper_standard_fit1_short.png', 'body_simple_zipper_standard_fit1_short.png'),
(324, 'lupa_forro.png', 9, 1, 'front', 'lupa_forro.png', 'lupa_forro.png'),
(325, 'pockets_2_type1_fit0.png', 9, 1, 'front', 'pockets_2_type1_fit0.png', 'pockets_2_type1_fit0.png'),
(326, 'pockets_2_type1_fit1.png', 9, 1, 'front', 'pockets_2_type1_fit1.png', 'pockets_2_type1_fit1.png'),
(327, 'pockets_2_type2_fit0.png', 9, 1, 'front', 'pockets_2_type2_fit0.png', 'pockets_2_type2_fit0.png'),
(328, 'pockets_2_type2_fit1.png', 9, 1, 'front', 'pockets_2_type2_fit1.png', 'pockets_2_type2_fit1.png'),
(329, 'pockets_2_type3_fit0.png', 9, 1, 'front', 'pockets_2_type3_fit0.png', 'pockets_2_type3_fit0.png'),
(330, 'pockets_2_type3_fit1.png', 9, 1, 'front', 'pockets_2_type3_fit1.png', 'pockets_2_type3_fit1.png'),
(331, 'pockets_2_type4_fit0.png', 9, 1, 'front', 'pockets_2_type4_fit0.png', 'pockets_2_type4_fit0.png'),
(332, 'pockets_2_type4_fit1.png', 9, 1, 'front', 'pockets_2_type4_fit1.png', 'pockets_2_type4_fit1.png'),
(333, 'pockets_2_type5_fit0.png', 9, 1, 'front', 'pockets_2_type5_fit0.png', 'pockets_2_type5_fit0.png'),
(334, 'pockets_2_type5_fit1.png', 9, 1, 'front', 'pockets_2_type5_fit1.png', 'pockets_2_type5_fit1.png'),
(335, 'pockets_3_type6_fit0.png', 9, 1, 'front', 'pockets_3_type6_fit0.png', 'pockets_3_type6_fit0.png'),
(336, 'pockets_3_type6_fit1.png', 9, 1, 'front', 'pockets_3_type6_fit1.png', 'pockets_3_type6_fit1.png'),
(337, 'pockets_3_type7_fit0.png', 9, 1, 'front', 'pockets_3_type7_fit0.png', 'pockets_3_type7_fit0.png'),
(338, 'pockets_3_type7_fit1.png', 9, 1, 'front', 'pockets_3_type7_fit1.png', 'pockets_3_type7_fit1.png'),
(339, 'pockets_chest_type_patched.png', 9, 1, 'front', 'pockets_chest_type_patched.png', 'pockets_chest_type_patched.png'),
(340, 'pockets_chest_type_vertical.png', 9, 1, 'front', 'pockets_chest_type_vertical.png', 'pockets_chest_type_vertical.png'),
(341, 'pockets_chest_type_welt.png', 9, 1, 'front', 'pockets_chest_type_welt.png', 'pockets_chest_type_welt.png'),
(342, 'pockets_chest_type_zipper.png', 9, 1, 'front', 'pockets_chest_type_zipper.png', 'pockets_chest_type_zipper.png'),
(343, 'shoulder.png', 9, 1, 'front', 'shoulder.png', 'shoulder.png'),
(344, 'sleeve_button.png', 9, 1, 'front', 'sleeve_button.png', 'sleeve_button.png'),
(345, 'sleeve_tape.png', 9, 1, 'front', 'sleeve_tape.png', 'sleeve_tape.png'),
(346, '0_cortes_fit0_long.png', 9, 1, 'back', '0_cortes_fit0_long.png', '0_cortes_fit0_long.png'),
(347, '0_cortes_fit0_short.png', 9, 1, 'back', '0_cortes_fit0_short.png', '0_cortes_fit0_short.png'),
(348, '0_cortes_fit1_long.png', 9, 1, 'back', '0_cortes_fit1_long.png', '0_cortes_fit1_long.png'),
(349, '0_cortes_fit1_short.png', 9, 1, 'back', '0_cortes_fit1_short.png', '0_cortes_fit1_short.png'),
(350, '1_cortes_fit0_long.png', 9, 1, 'back', '1_cortes_fit0_long.png', '1_cortes_fit0_long.png'),
(351, '1_cortes_fit0_short.png', 9, 1, 'back', '1_cortes_fit0_short.png', '1_cortes_fit0_short.png'),
(352, '1_cortes_fit1_long.png', 9, 1, 'back', '1_cortes_fit1_long.png', '1_cortes_fit1_long.png'),
(353, '1_cortes_fit1_short.png', 9, 1, 'back', '1_cortes_fit1_short.png', '1_cortes_fit1_short.png'),
(354, '2_cortes_fit0_long.png', 9, 1, 'back', '2_cortes_fit0_long.png', '2_cortes_fit0_long.png'),
(355, '2_cortes_fit0_short.png', 9, 1, 'back', '2_cortes_fit0_short.png', '2_cortes_fit0_short.png'),
(356, '2_cortes_fit1_long.png', 9, 1, 'back', '2_cortes_fit1_long.png', '2_cortes_fit1_long.png'),
(357, '2_cortes_fit1_short.png', 9, 1, 'back', '2_cortes_fit1_short.png', '2_cortes_fit1_short.png'),
(358, 'back_lapel_1.png', 9, 1, 'back', 'back_lapel_1.png', 'back_lapel_1.png'),
(359, 'belt_loose_fit0.png', 9, 1, 'back', 'belt_loose_fit0.png', 'belt_loose_fit0.png'),
(360, 'belt_loose_fit1.png', 9, 1, 'back', 'belt_loose_fit1.png', 'belt_loose_fit1.png'),
(361, 'belt_sewing_fit0.png', 9, 1, 'back', 'belt_sewing_fit0.png', 'belt_sewing_fit0.png'),
(362, 'belt_sewing_fit1.png', 9, 1, 'back', 'belt_sewing_fit1.png', 'belt_sewing_fit1.png'),
(363, 'sleeve_tape.png', 9, 1, 'back', 'sleeve_tape.png', 'sleeve_tape.png'),
(364, 'belt_loose_fit0.png', 9, 2, 'front', 'belt_loose_fit0.png', 'front_belt_loose_fit0.png'),
(365, 'belt_loose_fit1.png', 9, 2, 'front', 'belt_loose_fit1.png', 'front_belt_loose_fit1.png'),
(366, 'body_crossed_boton_standard_fit0_long.png', 9, 2, 'front', 'body_crossed_boton_standard_fit0_long.png', 'front_body_crossed_boton_standard_fit0_long.png'),
(367, 'body_crossed_boton_standard_fit0_short.png', 9, 2, 'front', 'body_crossed_boton_standard_fit0_short.png', 'body_crossed_boton_standard_fit0_short.png'),
(368, 'body_crossed_boton_standard_fit1_long.png', 9, 2, 'front', 'body_crossed_boton_standard_fit1_long.png', 'body_crossed_boton_standard_fit1_long.png'),
(369, 'body_crossed_boton_standard_fit1_short.png', 9, 2, 'front', 'body_crossed_boton_standard_fit1_short.png', 'body_crossed_boton_standard_fit1_short.png'),
(370, 'body_crossed_zipper_standard_fit0_long.png', 9, 2, 'front', 'body_crossed_zipper_standard_fit0_long.png', 'body_crossed_zipper_standard_fit0_long.png'),
(371, 'body_crossed_zipper_standard_fit0_short.png', 9, 2, 'front', 'body_crossed_zipper_standard_fit0_short.png', 'body_crossed_zipper_standard_fit0_short.png'),
(372, 'body_crossed_zipper_standard_fit1_long.png', 9, 2, 'front', 'body_crossed_zipper_standard_fit1_long.png', 'body_crossed_zipper_standard_fit1_long.png'),
(373, 'body_crossed_zipper_standard_fit1_short.png', 9, 2, 'front', 'body_crossed_zipper_standard_fit1_short.png', 'body_crossed_zipper_standard_fit1_short.png'),
(374, 'body_simple_boton_hide_fit0_long.png', 9, 2, 'front', 'body_simple_boton_hide_fit0_long.png', 'body_simple_boton_hide_fit0_long.png'),
(375, 'body_simple_boton_hide_fit0_short.png', 9, 2, 'front', 'body_simple_boton_hide_fit0_short.png', 'body_simple_boton_hide_fit0_short.png'),
(376, 'body_simple_boton_hide_fit1_long.png', 9, 2, 'front', 'body_simple_boton_hide_fit1_long.png', 'body_simple_boton_hide_fit1_long.png'),
(377, 'body_simple_boton_hide_fit1_short.png', 9, 2, 'front', 'body_simple_boton_hide_fit1_short.png', 'body_simple_boton_hide_fit1_short.png'),
(378, 'body_simple_boton_standard_fit0_long.png', 9, 2, 'front', 'body_simple_boton_standard_fit0_long.png', 'body_simple_boton_standard_fit0_long.png'),
(379, 'body_simple_boton_standard_fit0_short.png', 9, 2, 'front', 'body_simple_boton_standard_fit0_short.png', 'body_simple_boton_standard_fit0_short.png'),
(380, 'body_simple_boton_standard_fit1_long.png', 9, 2, 'front', 'body_simple_boton_standard_fit1_long.png', 'body_simple_boton_standard_fit1_long.png'),
(381, 'body_simple_boton_standard_fit1_short.png', 9, 2, 'front', 'body_simple_boton_standard_fit1_short.png', 'body_simple_boton_standard_fit1_short.png'),
(382, 'body_simple_zipper_hide_fit0_long.png', 9, 2, 'front', 'body_simple_zipper_hide_fit0_long.png', 'body_simple_zipper_hide_fit0_long.png'),
(383, 'body_simple_zipper_hide_fit0_short.png', 9, 2, 'front', 'body_simple_zipper_hide_fit0_short.png', 'body_simple_zipper_hide_fit0_short.png'),
(384, 'body_simple_zipper_hide_fit1_long.png', 9, 2, 'front', 'body_simple_zipper_hide_fit1_long.png', 'body_simple_zipper_hide_fit1_long.png'),
(385, 'body_simple_zipper_hide_fit1_short.png', 9, 2, 'front', 'body_simple_zipper_hide_fit1_short.png', 'body_simple_zipper_hide_fit1_short.png'),
(386, 'body_simple_zipper_standard_fit0_long.png', 9, 2, 'front', 'body_simple_zipper_standard_fit0_long.png', 'body_simple_zipper_standard_fit0_long.png'),
(387, 'body_simple_zipper_standard_fit0_short.png', 9, 2, 'front', 'body_simple_zipper_standard_fit0_short.png', 'body_simple_zipper_standard_fit0_short.png'),
(388, 'body_simple_zipper_standard_fit1_long.png', 9, 2, 'front', 'body_simple_zipper_standard_fit1_long.png', 'body_simple_zipper_standard_fit1_long.png'),
(389, 'body_simple_zipper_standard_fit1_short.png', 9, 2, 'front', 'body_simple_zipper_standard_fit1_short.png', 'body_simple_zipper_standard_fit1_short.png'),
(390, 'lupa_forro.png', 9, 2, 'front', 'lupa_forro.png', 'lupa_forro.png'),
(391, 'pockets_2_type1_fit0.png', 9, 2, 'front', 'pockets_2_type1_fit0.png', 'pockets_2_type1_fit0.png'),
(392, 'pockets_2_type1_fit1.png', 9, 2, 'front', 'pockets_2_type1_fit1.png', 'pockets_2_type1_fit1.png'),
(393, 'pockets_2_type2_fit0.png', 9, 2, 'front', 'pockets_2_type2_fit0.png', 'pockets_2_type2_fit0.png'),
(394, 'pockets_2_type2_fit1.png', 9, 2, 'front', 'pockets_2_type2_fit1.png', 'pockets_2_type2_fit1.png'),
(395, 'pockets_2_type3_fit0.png', 9, 2, 'front', 'pockets_2_type3_fit0.png', 'pockets_2_type3_fit0.png'),
(396, 'pockets_2_type3_fit1.png', 9, 2, 'front', 'pockets_2_type3_fit1.png', 'pockets_2_type3_fit1.png'),
(397, 'pockets_2_type4_fit0.png', 9, 2, 'front', 'pockets_2_type4_fit0.png', 'pockets_2_type4_fit0.png'),
(398, 'pockets_2_type4_fit1.png', 9, 2, 'front', 'pockets_2_type4_fit1.png', 'pockets_2_type4_fit1.png'),
(399, 'pockets_2_type5_fit0.png', 9, 2, 'front', 'pockets_2_type5_fit0.png', 'pockets_2_type5_fit0.png'),
(400, 'pockets_2_type5_fit1.png', 9, 2, 'front', 'pockets_2_type5_fit1.png', 'pockets_2_type5_fit1.png'),
(401, 'pockets_3_type6_fit0.png', 9, 2, 'front', 'pockets_3_type6_fit0.png', 'pockets_3_type6_fit0.png'),
(402, 'pockets_3_type6_fit1.png', 9, 2, 'front', 'pockets_3_type6_fit1.png', 'pockets_3_type6_fit1.png'),
(403, 'pockets_3_type7_fit0.png', 9, 2, 'front', 'pockets_3_type7_fit0.png', 'pockets_3_type7_fit0.png'),
(404, 'pockets_3_type7_fit1.png', 9, 2, 'front', 'pockets_3_type7_fit1.png', 'pockets_3_type7_fit1.png'),
(405, 'pockets_chest_type_patched.png', 9, 2, 'front', 'pockets_chest_type_patched.png', 'pockets_chest_type_patched.png'),
(406, 'pockets_chest_type_vertical.png', 9, 2, 'front', 'pockets_chest_type_vertical.png', 'pockets_chest_type_vertical.png'),
(407, 'pockets_chest_type_welt.png', 9, 2, 'front', 'pockets_chest_type_welt.png', 'pockets_chest_type_welt.png'),
(408, 'pockets_chest_type_zipper.png', 9, 2, 'front', 'pockets_chest_type_zipper.png', 'pockets_chest_type_zipper.png'),
(409, 'shoulder.png', 9, 2, 'front', 'shoulder.png', 'shoulder.png'),
(410, 'sleeve_button.png', 9, 2, 'front', 'sleeve_button.png', 'sleeve_button.png'),
(411, 'sleeve_tape.png', 9, 2, 'front', 'sleeve_tape.png', 'sleeve_tape.png'),
(412, '0_cortes_fit0_long.png', 9, 2, 'back', '0_cortes_fit0_long.png', '0_cortes_fit0_long.png'),
(413, '0_cortes_fit0_short.png', 9, 2, 'back', '0_cortes_fit0_short.png', '0_cortes_fit0_short.png'),
(414, '0_cortes_fit1_long.png', 9, 2, 'back', '0_cortes_fit1_long.png', '0_cortes_fit1_long.png'),
(415, '0_cortes_fit1_short.png', 9, 2, 'back', '0_cortes_fit1_short.png', '0_cortes_fit1_short.png'),
(416, '1_cortes_fit0_long.png', 9, 2, 'back', '1_cortes_fit0_long.png', '1_cortes_fit0_long.png'),
(417, '1_cortes_fit0_short.png', 9, 2, 'back', '1_cortes_fit0_short.png', '1_cortes_fit0_short.png'),
(418, '1_cortes_fit1_long.png', 9, 2, 'back', '1_cortes_fit1_long.png', '1_cortes_fit1_long.png'),
(419, '1_cortes_fit1_short.png', 9, 2, 'back', '1_cortes_fit1_short.png', '1_cortes_fit1_short.png'),
(420, '2_cortes_fit0_long.png', 9, 2, 'back', '2_cortes_fit0_long.png', '2_cortes_fit0_long.png'),
(421, '2_cortes_fit0_short.png', 9, 2, 'back', '2_cortes_fit0_short.png', '2_cortes_fit0_short.png'),
(422, '2_cortes_fit1_long.png', 9, 2, 'back', '2_cortes_fit1_long.png', '2_cortes_fit1_long.png'),
(423, '2_cortes_fit1_short.png', 9, 2, 'back', '2_cortes_fit1_short.png', '2_cortes_fit1_short.png'),
(424, 'back_lapel_1.png', 9, 2, 'back', 'back_lapel_1.png', 'back_lapel_1.png'),
(425, 'belt_loose_fit0.png', 9, 2, 'back', 'belt_loose_fit0.png', 'belt_loose_fit0.png'),
(426, 'belt_loose_fit1.png', 9, 2, 'back', 'belt_loose_fit1.png', 'belt_loose_fit1.png'),
(427, 'belt_sewing_fit0.png', 9, 2, 'back', 'belt_sewing_fit0.png', 'belt_sewing_fit0.png'),
(428, 'belt_sewing_fit1.png', 9, 2, 'back', 'belt_sewing_fit1.png', 'belt_sewing_fit1.png'),
(430, 'sleeve_tape.png', 9, 2, 'back', 'sleeve_tape.png', 'sleeve_tape.png');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_linings`
--

CREATE TABLE IF NOT EXISTS `wp_wca_linings` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL DEFAULT '0',
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `wp_wca_linings`
--

INSERT INTO `wp_wca_linings` (`id`, `titel`, `color`, `pattern`, `material`, `price`, `category_id`, `status`) VALUES
(1, 'Ivory', 'cream', 'squred', '100% Cotten', '19.50', 1, '1'),
(2, 'Berck', 'Blue', 'solid', 'polyster', '18.5', 1, '1'),
(3, 'Arica', 'silver', 'solid', '100% poliester', '15.95', 1, '1'),
(4, 'Burwell', 'silver', 'striped', '100% poliester', '12.95', 1, '1'),
(5, 'White Hall', 'white', 'squared', '100% poliester', '12.80', 1, '1'),
(6, 'Sand Beige', 'Golden', 'Plain', '100% cotten', '17.50', 1, '1'),
(7, 'Lunar Silver', 'lunar Silver', 'solid', '100% cotten', '14.50', 1, '1'),
(8, 'Gala', 'Gala', 'solid', '100% poliester', '11.50', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_neck_lining`
--

CREATE TABLE IF NOT EXISTS `wp_wca_neck_lining` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_wca_neck_lining`
--

INSERT INTO `wp_wca_neck_lining` (`id`, `name`, `color`, `category_id`, `status`) VALUES
(1, '1', 'Cream', 1, '1'),
(2, 'Red ', 'Red', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wca_zippers`
--

CREATE TABLE IF NOT EXISTS `wp_wca_zippers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `category_id` int(12) NOT NULL,
  `status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wp_wca_zippers`
--

INSERT INTO `wp_wca_zippers` (`id`, `name`, `color`, `category_id`, `status`) VALUES
(1, 'Brown zipper', 'Brown ', 1, '1'),
(2, 'Black zipper', 'Black ', 1, '1'),
(3, '3', '', 1, '0'),
(4, '4', '', 1, '0'),
(5, '5', '', 1, '0');

-- --------------------------------------------------------
