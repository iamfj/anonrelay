# Anonrelay

Anonrelay is a free software that provides you with a platform to disguise 
e-mail traffic.

## The problem with privacy

We always use the same email addresses online. This makes it easy for online 
services to identify and connect to us across platforms. Whether this is 
really common practice is impossible to prove.

With an email relay, like apple has already introduced with Hide-My-Email, 
you can avoid this problem. You simply register on your online service with 
a random email address and all emails to you will be forwarded through it. 
The online service doesn't know which email address is behind the randomly 
generated one and therefore can't connect it with your person (unless you 
provide other personal information there).

The problem with Apple's solution is that you have no control over what Apple 
does with your data. How long is it really stored on the servers. What do the 
spam analytics do with the data. Do traces remain on the servers, or can even 
people read?

These are all questions that have kept me very busy. That's why I decided to 
develop my own e-mail relay and make it available to everyone for free. 
Through open source it is guaranteed that data protection is respected when 
processing the e-mails. 

## Technology and idea

You need a webserver, a domain, a catch all mailbox and a cronjob. Now you 
host anonrelay on your webserver and configure it with the catch all mailbox. 
Now you can register new users and create e-mail addresses. Anonrelay, 
watches with the cronjob every few seconds if new e-mails have arrived, these 
e-mails are then forwarded to the appropriate user and deleted. E-mails that 
cannot be assigned to a user are deleted directly. 
