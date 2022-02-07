<?php
return [

    'THANKYOU_URL' => env('APP_URL') . 'pay-with-card-online/thank-you.php',

    'CANCEL_URL' => env('APP_URL') . 'pay-with-card-online/',

    'STRIPE_PUBLISHABLE_KEY' => 'pk_test_51J7cAgDAWsjxeaA44cjM6Qs88gEWPeHECm9RFsrmdBl1CCd1FKLXuNvLxRedNjFOWUEc345DVNRhzhVDmNa2PU3J00axtzYNYg',

    'STRIPE_SECRET_KEY' => 'sk_test_51J7cAgDAWsjxeaA4RAyVMZUix0qxs2CpSrhZlailNgdvmhz7e68aEuOpbIiKWhQLPohMuc9KXNL48RvMCejlTk2q00DrwUyatB',

    'STRIPE_CREATE_ORDER_URL' => env('APP_URL') . 'pay-with-card-online/endpoint/ajax/create-stripe-order.php',

    'STRIPE_WEBHOOK_ENDPOINT_URL' => env('APP_URL') . 'pay-with-card-online/endpoint/webhook/capture-stripe-response.php',

    'ORDER_EMAIL_SUBJECT' => 'Order Confirmation',

    'PAYMENT_CONFIRMATION_EMAIL_SUBJECT' => 'Payment Confirmation',

    'PAYMENT_FAILURE_SUBJECT' => 'Payment Failure',

    'CURRENCY' => 'USD',

    'SHIPMENT_RATES' => 'shr_1JFfQIDAWsjxeaA4MhCHr8xg',

    'CURRENCY_SYMBOL' => '$',

    /* Sender and Recipient
    ==================================== */
    'SENDER_NAME' => 'FoodBoard',

    'SENDER_EMAIL' => 'noreply@foodboard.com',

    // You can add one or more emails separated by a comma (,)
    // To whom the contact form should send the email, generally the Admin of the site
    'RECIPIENT_EMAIL' => 'websolutions.ultimate@gmail.com',

    // If you want to send the same email message as a copy (CC), then enter the email(s) in below option
    'CC_EMAIL' => '',

    // If you want to send the same email message as a blind copy (BCC), then enter the email(s) in below option
    'BCC_EMAIL' => '',

    /* Mechanism to use, to send email
    ==================================== */
    // Options: smtp, sendmail, phpmail. Default is smtp but FoodBoard implemented to use only the phpmail option
    // phpmail uses your web server's default email server setup to send email
    'MAILER' => 'phpmail',
];
