# woocommerce-checkout-email-checker
A simple function to read a list of blacklisted email domains and check the billing email against it. To prevent fraudsters from using disposable email addresses

## DISCLAIMER

**The code is supplied as is and it I don't offer any support**.

I'm not a professional developer and just cobbled this together to solve a specific usecase. It works from the testing I've done. But I can't guarantee that it is fail safe or exhaustive or won't break your site. Only use the code if you know what you're doing or are prepared to take a risk.

## ABOUT THE CODE

I wanted to find a function that was lightweight and checked locally the billing email address domain against a blacklist of temporary or throwaway emails. There didn't seem to be one and the paid for plugins seemed bloated, expensive and relied on connecting to a thrid party website. I wasn't comfortable with potentially sending customer data from checkout to be checked against an external list – **this is probably isn't how these plugins work!**

This code was possible because of the work of two other developers, who had written two pieces of functionality for different purposes.

Firstly [Tristan Kappel's](https://tristankappel.com/) code to check woocommerce registration emails against a blacklist gave me half of the functionality I needed
https://tristankappel.com/how-to-make-a-woocommerce-registration-email-blacklist/

Secondly the work of [Wigster](https://profiles.wordpress.org/wigster/) with his simple plugin to check a specific spam domain gave me the woocommerce checkout specific code required
https://wordpress.org/plugins/block-specific-spam-woo-orders/

The other bits like opening the blacklist file from github are pretty standard php code.

## Areas for improvement:
- Creating a fallback in case the connection to github can't be made
- Bumping up the email error message in woocommerce error message output. Currently, the error message is placed at the bottom of the list of errors. This is counter-intuitive if the email field appears at the top of your billing form.

## HOW TO USE

Use the plugin Code Snippets (https://wordpress.org/plugins/code-snippets/) and copy the code between the two php tags into it. Or if you know a bit more about what you're doing add to the bottom of your theme's functions file.





