CREATE TABLE IF NOT EXISTS `product_dn` (
  `product_dn_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `number_dn` int(11) NOT NULL default '0',
  `max_dn` int(11) NOT NULL default '50',
  PRIMARY KEY (`product_dn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `product` ADD (
   `num_sold` int(11),
   `stock` int(11),
   `description` text,
   `rating` float(2),
   `discount1` int(128)
);

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `date_comment` date ,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `customer_dn` (
  `customer_dn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`customer_dn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `product_dn_to_customer` (
  `product_dn_to_customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_dn_id` int(11) NOT NULL,
  `customer_dn_id` int(11) NOT NULL,
  `soluong` int(100) NOT NULL default '0',
  PRIMARY KEY (`product_dn_to_customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
