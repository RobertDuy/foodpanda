CREATE TABLE IF NOT EXISTS `product_dn` (
  `product_dn_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `number_dn` int(11) NOT NULL default '0',
  `max_dn` int(11) NOT NULL default '50',
  PRIMARY KEY (`product_dn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `product` ADD (
   `product_name` varchar(255),
   `promotion_image` varchar(255),
   `num_sold` int(11),
   `stock` int(11),
   `thumb_image` varchar(255),
   `description` text,
   `profile` varchar(255),
   `rating` int(5),
   `comment_id` int(11),
   `discount` int(128)
);