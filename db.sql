--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airid` bigint(8) NOT NULL,
  `airname` varchar(20) NOT NULL,
  `aircity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airid`, `airname`, `aircity`) VALUES
(2, 'Kochi', 'Goa'),
(6, 'Trivandram', 'Trivandram'),
(7, 'abcd', 'Calicut');

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `allid` bigint(8) NOT NULL,
  `fliid` bigint(8) NOT NULL,
  `roid` bigint(8) NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `enddate` date NOT NULL,
  `endtime` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`allid`, `fliid`, `roid`, `startdate`, `starttime`, `enddate`, `endtime`, `status`) VALUES
(9, 5, 5, '2015-02-01', '12:02:03', '2015-02-02', '12:03:01', ''),
(10, 2, 5, '2017-04-09', '13:02:00', '2017-04-10', '16:02:00', ''),
(11, 5, 6, '2017-04-09', '01:00:00', '2017-04-10', '18:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE `bookingdetail` (
  `bdid` bigint(8) NOT NULL,
  `bookmid` bigint(8) NOT NULL,
  `cuname` varchar(20) NOT NULL,
  `cuage` int(4) NOT NULL,
  `cugender` varchar(20) NOT NULL,
  `claid` bigint(8) NOT NULL,
  `seatno` int(4) NOT NULL,
  `passportid` varchar(20) NOT NULL,
  `tamt` bigint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingdetail`
--

INSERT INTO `bookingdetail` (`bdid`, `bookmid`, `cuname`, `cuage`, `cugender`, `claid`, `seatno`, `passportid`, `tamt`) VALUES
(18, 1, '', 0, '', 1, 0, '', 1500),
(19, 10, 'ewere', 15, 'Male', 2, 2, '14', 1200),
(20, 11, 'rtrytr', 16, 'Male', 1, 3, '14', 1500),
(21, 11, '4w4', 0, '', 1, 0, '', 1500),
(22, 11, 'ght', 41, 'Male', 1, 4, '11', 1500),
(23, 14, 'dsegdtger23', 0, '', 1, 0, '', 1500),
(24, 14, 'dsegdtger23', 0, '', 1, 0, '', 1500),
(25, 14, 'rdfr12', 0, '', 1, 0, '', 1500),
(26, 14, 'rdfr122344', 0, '', 1, 0, '', 1500),
(27, 14, 'fhfghyt', 0, '', 1, 0, '', 1500),
(28, 14, 'fhfghyt', 20, 'Female', 1, 2, '11', 1500),
(29, 16, 'abcdefgh', 20, 'Male', 2, 1, '4665433', 1200),
(30, 16, 'wefwgf', 34, 'Male', 2, 2, '239847892', 1200),
(33, 0, 'hii', 50, 'Male', 3, 3, '1545948', 1400),
(34, 16, 'hii', 50, 'Male', 3, 3, '1545948', 1400);

-- --------------------------------------------------------

--
-- Table structure for table `boookingmaster`
--

CREATE TABLE `boookingmaster` (
  `bookmid` bigint(8) NOT NULL,
  `cuid` bigint(8) NOT NULL,
  `allid` bigint(8) NOT NULL,
  `cuname` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` decimal(9,0) NOT NULL,
  `totseat` int(4) NOT NULL,
  `dofj` date NOT NULL,
  `totamt` bigint(8) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tofp_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boookingmaster`
--

INSERT INTO `boookingmaster` (`bookmid`, `cuid`, `allid`, `cuname`, `address`, `phone`, `totseat`, `dofj`, `totamt`, `status`, `tofp_id`) VALUES
(1, 1, 0, 'Name', 'fset', '0', 1, '0000-00-00', 3800, '1', 1),
(2, 1, 9, 'dfdgdf', '', '0', 0, '0000-00-00', 3800, '1', 0),
(3, 4, 9, 'Name', '', '0', 0, '0000-00-00', 3800, '1', 0),
(4, 4, 9, 'Name', '122222222222', '0', 0, '0000-00-00', 3800, '1', 0),
(5, 4, 9, 'alien', 'qsdsdd12w', '0', 0, '0000-00-00', 3800, '1', 0),
(6, 4, 9, 'alien', 'tfyyiui', '568', 0, '0000-00-00', 3800, '1', 0),
(7, 4, 9, 'alien', 'ngftgft', '0', 0, '0000-00-00', 3800, '1', 0),
(8, 4, 9, 'alien', 'ngftgft', '999999999', 0, '0000-00-00', 3800, '1', 0),
(9, 4, 9, 'anas', 'mttghtr223', '0', 0, '0000-00-00', 3800, '1', 0),
(10, 4, 9, 'trghtdfegt', 'efeetrtrvdsg', '999999999', 2, '0000-00-00', 3800, '1', 1),
(11, 4, 9, 'wrwwrwr', 'wrqrew3t', '999999999', 4, '0000-00-00', 3800, '1', 1),
(12, 4, 9, 'wrwwrwr', 'wrqrew3t', '999999999', 4, '0000-00-00', 3800, '1', 0),
(13, 4, 9, 'wrwwrwr', 'wrqrew3t', '999999999', 4, '0000-00-00', 3800, '1', 0),
(14, 4, 9, 'hguiio', 'dfhgdfr', '999999999', 5, '0000-00-00', 3800, '1', 1),
(15, 4, 0, 'abc', 'qwkdnq', '999999999', 4, '0000-00-00', 3800, '1', 0),
(16, 1, 11, 'abcdefg', 'wdnwlfn', '999999999', 4, '0000-00-00', 3800, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `claid` bigint(8) NOT NULL,
  `claname` varchar(20) NOT NULL,
  `clafare` bigint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`claid`, `claname`, `clafare`) VALUES
(2, 'Executive', 1200),
(3, 'Business', 1400);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cuid` bigint(8) NOT NULL,
  `cuname` varchar(20) NOT NULL,
  `cuage` int(4) NOT NULL,
  `cugender` varchar(6) NOT NULL,
  `cuaddress` varchar(50) NOT NULL,
  `cuphone` decimal(9,0) NOT NULL,
  `cuemail` varchar(50) NOT NULL,
  `cupassportid` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cuid`, `cuname`, `cuage`, `cugender`, `cuaddress`, `cuphone`, `cuemail`, `cupassportid`, `username`, `password`) VALUES
(1, 'alien', 20, 'radiob', 'maliakkal', '999999999', 'alienpaulmaliakkal@gmail.com', '13', 'alienu', 'alienu'),
(2, '', 0, '', '', '0', '', '', '', ''),
(3, '', 0, '', '', '0', '', '', '', ''),
(4, 'werfew', 0, 'radiob', '', '0', '', '', '1234', '1234'),
(5, 'sdfgsd dfgdfg', 44, 'radiob', 'sdfgsd', '23423', 'ssdfsd@gmail.com', 'sgdfg', '1234', '1234'),
(6, 'alien paul', 20, 'radiob', 'maliakkal', '999999999', 'alienpaulmaliakkal@gmail.com', '11', '1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `fliid` bigint(8) NOT NULL,
  `fliname` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `lstseat` int(4) NOT NULL,
  `totseat` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`fliid`, `fliname`, `status`, `lstseat`, `totseat`) VALUES
(2, 'GoAir', 'Yes', 0, 12),
(5, 'AirIndia', 'Yes', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('alien', 'alien'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` bigint(8) NOT NULL,
  `cuid` bigint(8) NOT NULL,
  `bookmid` bigint(8) NOT NULL,
  `paydate` date NOT NULL,
  `Amount` bigint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `cuid`, `bookmid`, `paydate`, `Amount`) VALUES
(1, 1, 1, '2015-02-25', 1500),
(2, 4, 10, '2015-02-28', 1200),
(3, 4, 10, '2015-02-28', 1200),
(4, 4, 11, '2015-02-28', 1500),
(5, 4, 11, '2015-02-28', 1500),
(6, 4, 11, '2015-02-28', 4500),
(7, 4, 11, '2015-02-28', 4500),
(8, 4, 14, '2015-02-28', 9000),
(9, 1, 16, '2017-04-09', 3800);

-- --------------------------------------------------------

--
-- Table structure for table `planetype`
--

CREATE TABLE `planetype` (
  `tyid` bigint(8) NOT NULL,
  `fliid` bigint(8) NOT NULL,
  `fiseat` int(4) NOT NULL,
  `exseat` int(4) NOT NULL,
  `ecseat` int(4) NOT NULL,
  `buseat` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planetype`
--

INSERT INTO `planetype` (`tyid`, `fliid`, `fiseat`, `exseat`, `ecseat`, `buseat`) VALUES
(1, 7, 2, 4, 3, 5),
(2, 6, 5, 2, 1, 2),
(3, 2, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rateid` bigint(8) NOT NULL,
  `fliid` bigint(8) NOT NULL,
  `age` int(4) NOT NULL,
  `disco` bigint(8) NOT NULL,
  `pdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rateid`, `fliid`, `age`, `disco`, `pdate`) VALUES
(1, 8, 20, 2, '2015-02-01'),
(2, 5, 20, 0, '2017-04-09'),
(3, 2, 50, 5, '2017-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `roid` bigint(8) NOT NULL,
  `roname` varchar(20) NOT NULL,
  `sid` bigint(8) NOT NULL,
  `did` bigint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`roid`, `roname`, `sid`, `did`) VALUES
(5, 'kg', 6, 2),
(6, 'qwerty', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tofp`
--

CREATE TABLE `tofp` (
  `tofp_id` int(4) NOT NULL,
  `tofp_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tofp`
--

INSERT INTO `tofp` (`tofp_id`, `tofp_name`) VALUES
(1, 'Debit Card'),
(2, 'Cash');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airid`);

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`allid`);

--
-- Indexes for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD PRIMARY KEY (`bdid`);

--
-- Indexes for table `boookingmaster`
--
ALTER TABLE `boookingmaster`
  ADD PRIMARY KEY (`bookmid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`claid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cuid`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`fliid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `planetype`
--
ALTER TABLE `planetype`
  ADD PRIMARY KEY (`tyid`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rateid`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`roid`);

--
-- Indexes for table `tofp`
--
ALTER TABLE `tofp`
  ADD PRIMARY KEY (`tofp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `airid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `allid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `bdid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `boookingmaster`
--
ALTER TABLE `boookingmaster`
  MODIFY `bookmid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `claid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cuid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `fliid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `planetype`
--
ALTER TABLE `planetype`
  MODIFY `tyid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rateid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `roid` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tofp`
--
ALTER TABLE `tofp`
  MODIFY `tofp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
