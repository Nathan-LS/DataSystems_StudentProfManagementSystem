-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2018 at 10:21 PM
-- Server version: 10.2.13-MariaDB-10.2.13+maria~xenial
-- PHP Version: 7.0.28-0ubuntu0.16.04.1


--
-- Dumping data for table `professors` creates our first root professor with an ID of 0. Use login ID 0 to login. You should delete this professor after creating more
--

INSERT INTO `professors` (`p_ssn`, `p_name`, `p_phone`, `p_sex`, `p_title`, `p_salary`) VALUES
  (0, 'Root Professor', '0', 'male', 'Full_Professor', 0000000000);

