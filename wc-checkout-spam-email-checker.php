<?php
add_action( 'woocommerce_after_checkout_validation', 'action_woocommerce_validate_spam_checkout', 10, 2 );
	
	    // Check if email domain is a specific string, if it is we'll decline the order:
	    function action_woocommerce_validate_spam_checkout( $fields , $errors) {

			//Create an empty array for the blacklisted domains
			$blacklist=array();
			
			//Open/read the banned email domain blacklist
			$fp=fopen('https://raw.githubusercontent.com/martenson/disposable-email-domains/master/disposable_email_blocklist.conf', 'r');
			
			//Step through each line of the file adding each to the array
			while (!feof($fp))
			{
				$line=fgets($fp);
				//trim any additional/white space
				$line=trim($line);
				//add to array
				$blacklist[]=$line;
			}
			fclose($fp);

			//check the domain (everything after the @) and compare to the entries in the array
            if(in_array (substr($fields[ 'billing_email' ], strrpos($fields[ 'billing_email' ], '@') + 1), $blacklist))
                {
				//write the error to woocommerce's error output
	            $errors->add( 'validation', '<strong>Email Address</strong> Temporary email addresses are not allowed' );
	        }
	    }
?>
