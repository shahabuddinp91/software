-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2016 at 12:47 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `upashamh_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_drug_store`
--

CREATE TABLE IF NOT EXISTS `add_drug_store` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `drug_units` varchar(255) NOT NULL,
  `buy_price` varchar(255) NOT NULL,
  `sell_price` varchar(255) NOT NULL,
  `current_month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `add_drug_store`
--

INSERT INTO `add_drug_store` (`id`, `date`, `drug_name`, `quantity`, `drug_units`, `buy_price`, `sell_price`, `current_month`, `year`) VALUES
(1, '09/21/2016', 'napa', '110', '5mg', '10', '15', 'September', 2016),
(2, '09/21/2016', 'civit', '141', '10mg', '5', '10', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `add_person`
--

CREATE TABLE IF NOT EXISTS `add_person` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `add_person`
--

INSERT INTO `add_person` (`id`, `name`, `f_name`, `mobile`, `address`, `gender`, `date`, `month`, `year`) VALUES
(2, 'Rashedul Raju', 'a', 1, 'b', 'Female', '09/26/2016', 'September', 2016),
(4, 'Rashedul Raju', 'a', 56767, '', 'Male', '', 'September', 2016),
(5, 'Rashedul Raju', 'a', 2, 'sss', 'Male', '09/13/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `add_test_info`
--

CREATE TABLE IF NOT EXISTS `add_test_info` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `test_category` varchar(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `add_test_info`
--

INSERT INTO `add_test_info` (`id`, `test_category`, `test_name`, `price`) VALUES
(1, 'ACC', 'ABB', '3000'),
(2, 'ACC', 'ABC', '2500'),
(3, 'CCC', 'DVF', '1200'),
(4, 'CCC', 'QWE', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `admission_detail_bill`
--

CREATE TABLE IF NOT EXISTS `admission_detail_bill` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `reg_id` int(15) NOT NULL,
  `room_category` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total_day` varchar(255) NOT NULL,
  `room_bill` varchar(222) NOT NULL,
  `nursing_bill` varchar(225) NOT NULL,
  `others_bill` varchar(255) NOT NULL,
  `total_bill` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `daily_payment`
--

CREATE TABLE IF NOT EXISTS `daily_payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rec_total` int(10) NOT NULL,
  `rec_pay` int(10) NOT NULL,
  `rec_due` int(10) NOT NULL,
  `dia_total` int(10) NOT NULL,
  `dia_pay` int(10) NOT NULL,
  `dia_due` int(10) NOT NULL,
  `phar_total` int(10) NOT NULL,
  `phar_pay` int(10) NOT NULL,
  `phar_due` int(10) NOT NULL,
  `acc_total` int(10) NOT NULL,
  `acc_pay` int(10) NOT NULL,
  `acc_due` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `total_pay` int(10) NOT NULL,
  `total_due` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `daily_payment`
--

INSERT INTO `daily_payment` (`id`, `rec_total`, `rec_pay`, `rec_due`, `dia_total`, `dia_pay`, `dia_due`, `phar_total`, `phar_pay`, `phar_due`, `acc_total`, `acc_pay`, `acc_due`, `total`, `total_pay`, `total_due`, `date`, `month`, `year`) VALUES
(1, 7997, 1497, 6500, 3551, 3051, 500, 196, 196, 0, 2370, 970, 1400, 14114, 5714, 8400, '09/21/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE IF NOT EXISTS `debit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Promo` int(10) NOT NULL,
  `House` int(10) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `O2` int(10) NOT NULL,
  `Other_repair_fee` int(10) NOT NULL,
  `Machine` int(10) NOT NULL,
  `Invitation` int(10) NOT NULL,
  `Variant` int(10) NOT NULL,
  `Buy_Surgery_material` int(10) NOT NULL,
  `ray_flim` int(10) NOT NULL,
  `Electrical_Bill` int(10) NOT NULL,
  `Govt_tax` int(10) NOT NULL,
  `Paper` int(10) NOT NULL,
  `Fuel` int(10) NOT NULL,
  `Salary` int(10) NOT NULL,
  `Subscription` int(10) NOT NULL,
  `Consultant` int(10) NOT NULL,
  `Buy_Electric_material` int(10) NOT NULL,
  `Buy_Electronics_material` int(10) NOT NULL,
  `Transport` int(10) NOT NULL,
  `Hardware` int(10) NOT NULL,
  `Buy_Machine_material` int(10) NOT NULL,
  `RF` int(10) NOT NULL,
  `Outside` int(10) NOT NULL,
  `Total` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `debit`
--

INSERT INTO `debit` (`id`, `Promo`, `House`, `Mobile`, `O2`, `Other_repair_fee`, `Machine`, `Invitation`, `Variant`, `Buy_Surgery_material`, `ray_flim`, `Electrical_Bill`, `Govt_tax`, `Paper`, `Fuel`, `Salary`, `Subscription`, `Consultant`, `Buy_Electric_material`, `Buy_Electronics_material`, `Transport`, `Hardware`, `Buy_Machine_material`, `RF`, `Outside`, `Total`, `date`, `month`, `year`) VALUES
(2, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 300, '09/22/2016', 'September', 2016),
(4, 56, 56, 0, 0, 0, 0, 0, 454, 0, 0, 32, 0, 0, 2, 0, 0, 0, 55, 0, 0, 0, 0, 0, 0, 655, '09/24/2016', 'September', 2016),
(5, 1, 2, 3, 4, 5, 6, 7, 8, 9, 9, 7, 5, 4, 6, 7, 6, 5, 4, 5, 0, 5, 5, 5, 5, 123, '09/24/2016', 'September', 2016),
(6, 4, 9, 6, 9, 8, 76, 68, 76, 87, 77, 88, 88, 978, 89, 98, 889, 88, 98, 9, 1, 99, 99, 99, 99, 3242, '09/24/2016', 'September', 2016),
(7, 3, 4, 5, 2, 1, 1, 50, 2, 3, 10, 20, 8, 8, 1, 11, 5, 9, 10, 2, 5, 9, 4, 6, 1, 180, '09/26/2016', 'September', 2016),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '09/26/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `diagonostic_patient_bill`
--

CREATE TABLE IF NOT EXISTS `diagonostic_patient_bill` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `regi_id` int(15) NOT NULL,
  `bill` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total_bill` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `diagonostic_patient_bill`
--

INSERT INTO `diagonostic_patient_bill` (`id`, `regi_id`, `bill`, `discount`, `total_bill`, `payment`, `due`, `date`, `month`, `year`) VALUES
(1, 78, '4200', '3', '4074', '3074', '1000', '09/21/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `discount` int(10) NOT NULL,
  `last_update` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `name`, `discount`, `last_update`) VALUES
(1, 'indoor pharmacy', 1, '06/30/2016'),
(2, 'outdoor pharmacy', 2, '06/30/2016'),
(3, 'indoor pathology', 3, '06/30/2016'),
(4, 'outdoor pathology', 4, '06/30/2016'),
(5, 'account', 5, '06/30/2016');

-- --------------------------------------------------------

--
-- Table structure for table `dreasing_bill`
--

CREATE TABLE IF NOT EXISTS `dreasing_bill` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `dr_name` varchar(255) NOT NULL,
  `g_name` varchar(255) NOT NULL,
  `visit_amount` int(10) NOT NULL,
  `Obsarvation` int(255) NOT NULL,
  `Dressing` int(10) NOT NULL,
  `otcharge` int(10) NOT NULL,
  `Nabulizer` int(10) NOT NULL,
  `blood` int(10) NOT NULL,
  `o2` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payment` int(10) NOT NULL,
  `due` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dreasing_bill`
--

INSERT INTO `dreasing_bill` (`id`, `patient_id`, `dr_name`, `g_name`, `visit_amount`, `Obsarvation`, `Dressing`, `otcharge`, `Nabulizer`, `blood`, `o2`, `total`, `payment`, `due`, `date`, `month`, `year`) VALUES
(5, 69, 'Abdul', 'Arifur Rahman', 1, 2, 3, 4, 5, 6, 7, 28, 20, 8, '08/24/2016', 'August', 2016),
(6, 70, 'Nannu', 'Abdul karim', 5, 6, 9, 5, 7, 8, 4, 44, 40, 4, '08/24/2016', 'August', 2016),
(7, 71, 'Dr. Raju Ahmed', 'Tmr Baba', 400, 100, 50, 40, 10, 250, 70, 920, 70, 850, '08/24/2016', 'August', 2016),
(8, 72, 'Dr. Raju Ahmed', 'Limar bap', 20, 19, 18, 17, 16, 15, 14, 119, 19, 100, '08/25/2016', 'August', 2016),
(9, 79, 'rrr', 'rrrr', 12, 12, 44, 44, 55, 67, 66, 300, 250, 50, '09/21/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `drug_sell_system`
--

CREATE TABLE IF NOT EXISTS `drug_sell_system` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `reg_id` int(15) NOT NULL,
  `sell_date` varchar(255) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `drug_sell_system`
--

INSERT INTO `drug_sell_system` (`id`, `reg_id`, `sell_date`, `drug_name`, `unit`, `quantity`, `price`) VALUES
(1, 78, '09/21/2016', 'napa', '5mg', '5', '75'),
(2, 78, '09/21/2016', 'civit', '10mg', '2', '20');

-- --------------------------------------------------------

--
-- Table structure for table `indoor_path_message`
--

CREATE TABLE IF NOT EXISTS `indoor_path_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(10) NOT NULL,
  `test_catagory` varchar(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `in_reference`
--

CREATE TABLE IF NOT EXISTS `in_reference` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payment` int(10) NOT NULL,
  `due` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `in_reference`
--

INSERT INTO `in_reference` (`id`, `name`, `mobile`, `total`, `payment`, `due`, `date`, `month`, `year`) VALUES
(2, 'vv', 555, 567, 67, 500, '5/5/5', 'September', 2016),
(3, 'sadfas', 333, 160, 100, 60, '40', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `outdoor_path_message`
--

CREATE TABLE IF NOT EXISTS `outdoor_path_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outdoor_pharmacy_p_register`
--

CREATE TABLE IF NOT EXISTS `outdoor_pharmacy_p_register` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `dr_name` varchar(255) NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `ref_mobile` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `outdoor_pharmacy_p_register`
--

INSERT INTO `outdoor_pharmacy_p_register` (`id`, `patient_name`, `mobile`, `age`, `dr_name`, `ref_name`, `ref_mobile`, `date`, `month`, `year`) VALUES
(1, 'fg', '555', '44', 'gt', '', '', '09/20/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `outdoor_test`
--

CREATE TABLE IF NOT EXISTS `outdoor_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `out_p_id` int(15) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_mobile` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `ref_mobile` int(10) NOT NULL,
  `ref_amount` int(10) NOT NULL,
  `test_category` varchar(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `test_price` varchar(255) NOT NULL,
  `current_manth` varchar(255) NOT NULL,
  `dr_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `outdoor_test`
--

INSERT INTO `outdoor_test` (`id`, `out_p_id`, `patient_name`, `patient_mobile`, `age`, `ref_name`, `ref_mobile`, `ref_amount`, `test_category`, `test_name`, `test_price`, `current_manth`, `dr_name`, `date`, `year`) VALUES
(1, 1, 'sa', '4444', 33, 'rrr', 44444, 40, 'CCC', 'QWE', '1000', 'September', 'rrr', '09/21/2016', '2016'),
(2, 1, 'sa', '4444', 33, 'rrr', 44444, 60, 'ACC', 'ABB', '3000', 'September', 'rrr', '09/21/2016', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `outdoor_test_bill`
--

CREATE TABLE IF NOT EXISTS `outdoor_test_bill` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `bill_out_dis` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `bill_after_diss` int(10) NOT NULL,
  `payment` int(10) NOT NULL,
  `due` int(10) NOT NULL,
  `curunt_month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `outdoor_test_bill`
--

INSERT INTO `outdoor_test_bill` (`id`, `patient_id`, `bill_out_dis`, `discount`, `bill_after_diss`, `payment`, `due`, `curunt_month`, `year`, `date`) VALUES
(1, 1, 4000, 2, 3920, 2920, 1000, 'September', 2016, '09/21/2016');

-- --------------------------------------------------------

--
-- Table structure for table `outdoor_test_register`
--

CREATE TABLE IF NOT EXISTS `outdoor_test_register` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(255) NOT NULL,
  `patient_mobile` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `dr_name` varchar(255) NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `ref_mobile` varchar(255) NOT NULL,
  `current_month` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `outdoor_test_register`
--

INSERT INTO `outdoor_test_register` (`id`, `patient_name`, `patient_mobile`, `age`, `dr_name`, `ref_name`, `ref_mobile`, `current_month`, `date`, `year`) VALUES
(1, 'sa', '4444', '33', 'rrr', 'rrr', '44444', 'September', '09/21/2016', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `out_drug_sell_list`
--

CREATE TABLE IF NOT EXISTS `out_drug_sell_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `drug_unit` varchar(255) NOT NULL,
  `quentity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `out_drug_sell_list`
--

INSERT INTO `out_drug_sell_list` (`id`, `patient_id`, `drug_name`, `drug_unit`, `quentity`, `price`, `date`, `month`) VALUES
(1, 1, 'napa', '5mg', 5, 75, '09/21/2016', 'September'),
(2, 1, 'civit', '10mg', 7, 70, '09/21/2016', 'September');

-- --------------------------------------------------------

--
-- Table structure for table `out_pharmacy_bill`
--

CREATE TABLE IF NOT EXISTS `out_pharmacy_bill` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `bill` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `total_bill` int(10) NOT NULL,
  `payment` int(10) NOT NULL,
  `due` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `out_pharmacy_bill`
--

INSERT INTO `out_pharmacy_bill` (`id`, `patient_id`, `bill`, `discount`, `total_bill`, `payment`, `due`, `date`, `month`, `year`) VALUES
(1, 1, 145, 2, 142, 12, 130, '09/21/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `out_reference`
--

CREATE TABLE IF NOT EXISTS `out_reference` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payment` int(10) NOT NULL,
  `due` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `out_reference`
--

INSERT INTO `out_reference` (`id`, `name`, `mobile`, `total`, `payment`, `due`, `date`, `month`, `year`) VALUES
(1, 'rrr', 44444, 100, 50, 50, '09/26/2016', 'September', '2016'),
(3, 'bn', 555, 55, 5, 50, '244', 'September', '2016'),
(4, 'dfsfg', 0, 555, 5, 500, '44', 'September', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `patient_admission_system`
--

CREATE TABLE IF NOT EXISTS `patient_admission_system` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reg_id` int(10) NOT NULL,
  `gardian_name` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `word` varchar(255) NOT NULL,
  `post_of` varchar(255) NOT NULL,
  `thana` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `related_parson` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `dr_unit_name` varchar(255) NOT NULL,
  `madical_problem` varchar(255) NOT NULL,
  `admission_fee` int(10) NOT NULL,
  `admission_payment` int(10) NOT NULL,
  `admission_due` int(10) NOT NULL,
  `cabin_no` varchar(255) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `admission_time` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sel` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `patient_admission_system`
--

INSERT INTO `patient_admission_system` (`id`, `reg_id`, `gardian_name`, `village`, `word`, `post_of`, `thana`, `district`, `related_parson`, `doctor_name`, `dr_unit_name`, `madical_problem`, `admission_fee`, `admission_payment`, `admission_due`, `cabin_no`, `admission_date`, `admission_time`, `month`, `year`, `status`, `sel`) VALUES
(8, 77, '', '', '', '', '', '', '', '', '', '', 300, 122, 178, '505-B', '09/21/2016', '01:45:16 AM', 'September', 2016, 'Release', 2),
(9, 78, '', '', '', '', '', '', '', '', '', '', 300, 55, 245, '505-A', '09/21/2016', '01:45:45 AM', 'September', 2016, 'Release', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_entry_form`
--

CREATE TABLE IF NOT EXISTS `patient_entry_form` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `reg_date` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `dr_room_no` varchar(255) NOT NULL,
  `visited_amount` varchar(15) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `ref_mobile` varchar(255) NOT NULL,
  `current_month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `patient_entry_form`
--

INSERT INTO `patient_entry_form` (`id`, `reg_date`, `patient_name`, `age`, `mobile`, `gender`, `address`, `doctor_name`, `dr_room_no`, `visited_amount`, `payment`, `due`, `reference`, `ref_mobile`, `current_month`, `year`, `status`) VALUES
(69, '08/16/2016', 'raju', '23', '01729762344', 'Male', 'dhaka', '', '', '', '', '', 'ranju', '01721209661', 'August', 2016, 1),
(70, '08/24/2016', 'Rakib', '9', '768', 'Male', 'bogra', '', '', '', '', '', 'ranju', '01721209661', 'August', 2016, 1),
(71, '08/24/2016', 'Mamun', '22', '019872893', 'Male', 'Gazipur', '', '', '', '', '', 'Raju', '0172976234', 'August', 2016, 1),
(72, '08/24/2016', 'lima khan', '34', '3456', 'Female', '3333', '', '', '', '', '', 'Riton', '01721209661', 'August', 2016, 1),
(73, '09/21/2016', 'a', '2', '2222', 'Male', 'ee', 'sww', '222', '300', '200', '', '', '', 'September', 2016, 2),
(74, '09/21/2016', 'ccc', 'cc', 'cccc', 'Male', 'ccc', '', '', '', '', '', '', '', 'September', 2016, 1),
(75, '09/21/2016', 'xx', 'xxx', 'xxxx', 'Female', 'xxx', '', '', '', '', '', 'xxx', 'dddd', 'September', 2016, 1),
(76, '09/21/2016', 'v', 'vv', 'v', 'Female', 'vv', '', '', '', '', '', '', '', 'September', 2016, 1),
(77, '09/21/2016', 'dd', 'dd', 'dd', 'Male', 'ddd', 'dd', '44', '444', '444', '', '', '', 'September', 2016, 2),
(78, '09/21/2016', 'ddcc', 'cv', '44444444', 'Female', 'rrrr', '', '', '', '', '', '', '', 'September', 2016, 1),
(79, '09/21/2016', 'ew', 'w3', '33333', 'Male', '333', '333', '3333', '3333', '3333', '', '', '', 'September', 2016, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient_release_form`
--

CREATE TABLE IF NOT EXISTS `patient_release_form` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `reg_id` int(15) NOT NULL,
  `total_bill` varchar(255) NOT NULL,
  `payment_bill` varchar(255) NOT NULL,
  `admission_date` date NOT NULL,
  `release_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_test_info`
--

CREATE TABLE IF NOT EXISTS `patient_test_info` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `reg_id` int(15) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `p_mobile` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `dr_name` varchar(255) NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `ref_mobile` varchar(255) NOT NULL,
  `ref_amount` varchar(255) NOT NULL,
  `test_category` varchar(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `patient_test_info`
--

INSERT INTO `patient_test_info` (`id`, `reg_id`, `patient_name`, `p_mobile`, `age`, `dr_name`, `ref_name`, `ref_mobile`, `ref_amount`, `test_category`, `test_name`, `price`, `date`, `month`, `year`) VALUES
(1, 78, 'ddcc', '44444444', 'cv', '', '', '', '', 'ACC', 'ABB', '3000', '09/21/2016', 'September', 2016),
(2, 78, 'ddcc', '44444444', 'cv', '', '', '', '', 'CCC', 'DVF', '1200', '09/21/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_patient_bill`
--

CREATE TABLE IF NOT EXISTS `pharmacy_patient_bill` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `regi_id` int(255) NOT NULL,
  `bill` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total_bill` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pharmacy_patient_bill`
--

INSERT INTO `pharmacy_patient_bill` (`id`, `regi_id`, `bill`, `discount`, `total_bill`, `payment`, `due`, `date`, `month`, `year`) VALUES
(1, 78, '95', '1', '94.05', '54', '40.05', '09/21/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE IF NOT EXISTS `room_info` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `cabin_no` varchar(10) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`room_id`, `cabin_no`, `room_type`, `status`, `price`) VALUES
(116, '505-A', 'non-ac', 1, 850),
(117, '505-B', 'ac', 1, 10000),
(118, '505-C', 'word', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `e_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `basic` int(10) NOT NULL,
  `bonus` int(10) NOT NULL,
  `overtime` int(10) NOT NULL,
  `honoree` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payment` int(10) NOT NULL,
  `due` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `e_id`, `name`, `mobile`, `basic`, `bonus`, `overtime`, `honoree`, `total`, `payment`, `due`, `date`, `month`, `year`) VALUES
(2, 2, 'Rashedul Raju', 1, 2, 4, 6, 8, 20, 5, 15, '09/27/2016', 'September', 2016),
(4, 0, 'Rashedul Raju', 1, 0, 0, 0, 0, 0, 0, 0, '09/27/2016', 'September', 2016),
(5, 0, 'Rashedul Raju', 1, 2, 3, 4, 5, 14, 4, 10, '09/27/2016', 'September', 2016),
(6, 5, 'Rashedul Raju', 2, 4, 5, 6, 6, 21, 11, 10, '09/27/2016', 'September', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `storeallbill`
--

CREATE TABLE IF NOT EXISTS `storeallbill` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `cabin_bill` int(10) NOT NULL,
  `cabin_payment` int(10) NOT NULL,
  `iv_item` varchar(255) NOT NULL,
  `iv_quentity` int(10) NOT NULL,
  `iv_price` int(10) NOT NULL,
  `photo_hour` varchar(255) NOT NULL,
  `photo_price` int(10) NOT NULL,
  `ryl_quentity` int(10) NOT NULL,
  `ryl_price` int(10) NOT NULL,
  `suc_quentity` int(10) NOT NULL,
  `suc_price` int(10) NOT NULL,
  `ot_price` int(10) NOT NULL,
  `ana_price` int(10) NOT NULL,
  `gas_item` varchar(255) NOT NULL,
  `gas_hour` varchar(255) NOT NULL,
  `gas_price` int(10) NOT NULL,
  `end_price` int(10) NOT NULL,
  `post_price` int(10) NOT NULL,
  `baby_price` int(10) NOT NULL,
  `dre_price` int(10) NOT NULL,
  `dre_quertity` int(10) NOT NULL,
  `o2_quentity` int(10) NOT NULL,
  `o2_price` int(10) NOT NULL,
  `con_price` int(10) NOT NULL,
  `ene_price` int(10) NOT NULL,
  `other_price` int(10) NOT NULL,
  `con_a_price` int(10) NOT NULL,
  `con_b_price` int(10) NOT NULL,
  `con_c_price` int(10) NOT NULL,
  `sur_price` int(10) NOT NULL,
  `imp_price` int(10) NOT NULL,
  `dres_quentity` int(10) NOT NULL,
  `dres_price` int(10) NOT NULL,
  `anes_item` varchar(255) NOT NULL,
  `anes_price` int(10) NOT NULL,
  `an_other_price` int(10) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payment` int(10) NOT NULL,
  `due` int(10) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  `a_p_d_total` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `storeallbill`
--

INSERT INTO `storeallbill` (`id`, `patient_id`, `cabin_bill`, `cabin_payment`, `iv_item`, `iv_quentity`, `iv_price`, `photo_hour`, `photo_price`, `ryl_quentity`, `ryl_price`, `suc_quentity`, `suc_price`, `ot_price`, `ana_price`, `gas_item`, `gas_hour`, `gas_price`, `end_price`, `post_price`, `baby_price`, `dre_price`, `dre_quertity`, `o2_quentity`, `o2_price`, `con_price`, `ene_price`, `other_price`, `con_a_price`, `con_b_price`, `con_c_price`, `sur_price`, `imp_price`, `dres_quentity`, `dres_price`, `anes_item`, `anes_price`, `an_other_price`, `sub_total`, `discount`, `total`, `payment`, `due`, `release_date`, `month`, `year`, `a_p_d_total`) VALUES
(1, 78, 850, 850, 'I.V canula/Catheter/Nabulizer', 1, 2, '3', 4, 5, 6, 7, 8, 9, 10, 'No2', '11', 12, 13, 14, 15, 17, 16, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 'GA', 30, 31, 5725, 3, 5553, 5053, 500, '09/21/2016', 'September', 2016, 3183),
(2, 77, 60000, 60000, 'I.V canula/Catheter/Nabulizer', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 'No2/CO2/O2', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'GA/LA/BLOCK', 0, 0, 60300, 3, 58491, 961, 57530, '09/26/2016', 'September', 2016, 122);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE IF NOT EXISTS `user_information` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_level_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Section` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `user_level_id`, `user_name`, `password`, `Section`) VALUES
(1, 1, 'admin', 'admin', 'Main Admin'),
(3, 2, 'd', 'd', 'Diagnostic'),
(5, 3, 'r', 'r', 'Reception'),
(6, 4, 'p', 'p', 'Pharmacy'),
(7, 5, 'a', 'a', 'Account'),
(8, 6, 'pa', 'pa', 'Pathology');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
