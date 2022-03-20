<?php 
    require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalog page</title>
    <!-- Material Design Bootstrap --> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet">
    <style type="text/css"> 

    .conntainer {
        margin-top: 50px;
        width: 100%;
        
    }
    .row {
        min-height: 450px;
    }
    .card {
        margin-top: 5%;
        width: 25%;


        margin-left: 6%;
        text-align: center;
        background: linear-gradient(360deg,#383836 10%,#4a4a4a 360%);
        color: white;
     
  
    }

    body {
        background-image: url("./imgFolder/bluebkgrd.jpg");
    
       
    }
    .title {
        position: relative;
        transform: translate(0, 25%);
        font-family: 'Playfair Display', serif;
    }

    .card-body {
        margin-top: 0;
        text-align: center;
        
    }

    ul {
        position: relative;
        transform: translate(25%, 0);
        margin-top: 10%;
        margin-bottom: 12%;
    }
    ul li {
        text-align: left;
    
    }
    ul li p {
        margin: 0;
    }

    .modal {
        color: black;
    }
    
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

    </style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- to have Elements available --> 
<script src="https://js.stripe.com/v3/"></script>

</head>
<body>
<div class="container">
        <?php 
            $col = 0;
            foreach($products as $product) {
                if($col == 0) {
                    echo '<div class="row">';
                }
                
            ?>
                <div class="card">
                    <div class="card-title-container">
                        <?php echo '<h2 class="title">' . $product['title'] . '</h2>'; ?>
                        
                        
                    </div>
                 
                    <div class="card-body">

                        <?php echo '<p>Price: $' . number_format(($product['price']/100), 2) . '</p>'; ?>
                        
                        
                        <ul>
                        <?php foreach($product['features'] as $feature) {
                            echo '<li><p>' . $feature . '</p></li>';
                        }
                        ?>
                        </ul>
                    

                      
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Pay with card
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Credit Card Details</h5>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Stripe credit card form --> 
                                <form action="stripeIPN2.php" method="post" id="payment-form">
                                <div class="form-row"> 
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element">
                                        <!-- Card Element will be inserted here -->
                                        <input type="text">Details </input>
                                        <script src="./client.js"></script>
                                       
                                    </div>
                                    <div id="card-errors" role="alert"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><?php echo 'Pay $' . number_format(($product['price']/100), 2)?></button>
                            </form>
                            </div>
                            </div>
                        </div>
                        </div>


                    </div>
                </div>


            <?php
                if($col == 2) {
                    $col = 0;
                    echo '</div>'; // close this row
                }
                else {
                    $col++;
                }
            ?>
             
            <?php
            }
            ?>
       

    
    </div>
    <?php 
        
    ?>
</div>
</body>
</html>
