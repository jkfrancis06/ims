$ php bin/console ckeditor:install /var/www/html/ims/public/bundles/fosckeditor

sudo apt install php8.0-imagick

As pointed out in some comments, you need to edit the policies of ImageMagick in /etc/ImageMagick-7/policy.xml. More particularly, in ArchLinux at the time of writing (05/01/2019) the following line is uncommented:

<policy domain="coder" rights="none" pattern="{PS,PS2,PS3,EPS,PDF,XPS}" />
Just wrap it between <!-- and --> to comment it, and pdf conversion should work again.