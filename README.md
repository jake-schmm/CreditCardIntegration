# CreditCardIntegration

Shows a catalog page with products, which you can buy for $0.50. Help was gained from following a tutorial initially but this application was created out of inspiration of the tutorial. Catalog page was created using HTML, CSS, and JavaScript, and Stripe API documentation was followed (and checked by the tutorial: https://www.youtube.com/watch?v=KlcqEVAO8y4) for creating a charge.


- client.js - client-side code for Stripe API to work (creates and handles token) and for credit card details to display after clicking on "Pay" on the front page
- catalog.php - this is the front page containing all the products 
- products.php - list of products, in array-form, from which details about each product are gathered/extracted for front-page display
- stripeIPN2.php - where server-side code is written. A charge is created out of token sent by form. This file is activated when user submits the credit card details form. 

