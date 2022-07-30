#
# Table structure for table 'pages'
#
CREATE TABLE pages
(
    tx_webaimwave_apikey varchar(256) DEFAULT NULL
);

#
# Table structure for table 'tx_webaimwave_domain_model_report'
#
CREATE TABLE tx_webaimwave_domain_model_report
(
    page int(11) DEFAULT '0' NOT NULL,
    report_type tinyint(1) DEFAULT '1' NOT NULL,
    result text
);