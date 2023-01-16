# PostCard Theme Challenge

Authored by Justin Ritchie

DEMO URL: https://maniatheme.justinritchie.me/
	
	https://maniatheme.justinritchie.me/wp-admin/

	Use Demo Login Creds:
	demouser / hjKdj!oHWxrBgpsMwUgHZm88

## Included Assets

- Tachyons CSS - https://tachyons.io/
- Bootstrap 5
- Font Awesome 6 (Regular, Solid, & Brand variants)

## Nav/Pages 

- Home 
- About
- Services
- FAQ
- Contact Us

## Home Layout

You can find homepage template in 

	/templates/template-front-page.php

- Hero/Welcome
- Testimonials
- About Feature
- Featured Properties
- Process
- Testimonial Feature
- Quick Contact


## Installation

1. Ensure TwentyTwenty theme is installed ( this is the Parent theme )
2. Install Required Plugins
3. Upload Content Exports ( see addtional notes )
4. Some elements are managed from Wordpress Customizer ( If I spent a bit more time I'd have all theme options controlled from customizer, I'd do this for a base theme that I'd create for use across most projects ).


## Required Plugins 

- Timber - https://wordpress.org/plugins/timber-library/
- Advanced Custom Fields - https://wordpress.org/plugins/advanced-custom-fields/
- Fontawesome ( normally I use 4.7 CDN in CSS or in inqueue function but for sake of quickness I employed their plugin ) [ https://wordpress.org/plugins/font-awesome/ ]
- Ninja Forms

## Recommended Plugins

- WP SMTP - Keep WP Email notifications from getting marked by spam
- Yoast SEO - SEO Meta
- Wordfence - Security


## Additional Notes

No DB dump + search/replace required. This theme is designed so that you can use wordpress import/export XML tool.


**DB Dump.SQL**, **ACF Fields Export** and **WP Importer Export** included in **DATA** folder.	


- If you don't use SQL dump files...
- Upload approperties.WordPress.2023-01-16.xml via wordpress importer
- Then Upload acf-export-2023-01-16.json via Custom Fields Importer ( ACF Plugin must be activated )

