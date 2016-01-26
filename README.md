[![Codacy Badge](https://api.codacy.com/project/badge/grade/786506b491564ea2b6d38328a38064dd)](https://www.codacy.com/app/udlei/csr-ninja)

# csr.ninja
Another CSR Generator.

### Why Another CSR Generator?
Every year my clients asked for the KEY used to generate the CSR, now with the csr.ninja they receive it by email!

### How do I install?

```sh
$ cd /opt
$ git clone https://github.com/udlei/cst.ninja.git
$ sudo yum install php56
$ sudo yum install php-pear
$ sudo pear install Mail
$ sudo pear install Net_SMTP
$ sudo vim /etc/httpd/conf.d/csr.ninja.conf

<VirtualHost *:80>
    DocumentRoot /opt/csr.ninja/public_html
    ServerName csr.ninja

    <Directory /opt/csr.ninja/public_html>
        AllowOverride None
        Require all granted
    </Directory>
</VirtualHost>

$ sudo vim /etc/smtp.conf

{
    "host": "your-smtp-host",
    "username": "your-username",
    "password": "your-password"
}

$ sudo /etc/init.d/httpd restart
```