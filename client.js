// Set publishable key
document.addEventListener('DOMContentLoaded', async() => {
    var stripe = Stripe('pk_live_51KViQsEVq1GoSZb8AkbB6tzL2BVh4D8XPw1FB7ktSkt5gwa6HKsPrvSnekx9xMA8yFoMJJ5T2W4zWaxyRgx38Jbq00tTBmXYoZ');
    var elements = stripe.elements(); 

    var style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
        },
    };

    // Create instance of card Element 
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the 'card-element' <div>
    card.mount('#card-element');


        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();
    
        stripe.createToken(card).then(function(result) {
            if (result.error) {
            // Inform the customer that there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
            } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
            }
        });
        }); // end of addEventListener 'submit'
        
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
        
            // Submit the form
            form.submit();
        }
    
});




