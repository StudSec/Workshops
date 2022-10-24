# Introduction to web
This workshop is meant to introduce people into the basics of web hacking. It includes a brief overview
of how the internet works and then goes over three challenges.


## Theory
This workshop goes into the theory behind sql injection and php file upload rce. It also briefly explains how 
current security issue can be traced back to the start of the internet.

## Challenge
This challenge has three parts, first an attacker must bypass frontend validation. Which allows them to make login
attempts. This login flow is vulnerable to sql injection, which they may use to bypass authentication. From here
an attacker may upload arbitrary files, allowing for code execution.

#### Frontend validation
The first step in the challenge is a login portal, the user is hard coded and it asks you to input your password.
Any password will result in a failed login, as the precoded user, dave, has been banned.

To get around this the attacker must either intercept and modify the request in something like burp, make their own
request, or remove the html attribute.

#### SQL injection
Having achieved a login flow, you can now use an sql injection to bypass the login flow

This can be done for example by setting the password to

```sql
' or 1=1 -- 
```

#### RCE
Upon logging in you are redirected to a file upload, there are no checks so uploading a file named `shell.php` with
the contents
```php
<?php
    system("ls");
    ?>
```

Will execute ls on the server, allow you to achieve rce.