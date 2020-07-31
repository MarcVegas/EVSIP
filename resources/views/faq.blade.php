<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EVSIP') }}</title>
    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css')}}" rel="stylesheet">
    <link rel="icon" href="/storage/interface/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        h1,h2,h3,h4,h5,h6 {
            font-family: 'Poppins', sans-serif !important;
        }
        .title {
            
            font-size: 1.3em !important;
            font-family: 'Poppins', sans-serif !important;
        }
        p {
            font-weight: bolder;
        }
    </style>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head> 
<body>
<div class="ui basic inverted blue padded segment">
    <a class="ui secondary button" href="/home"><i class="angle left icon"></i> Go back</a>
</div>
<div class="ui basic segment" style="margin-left:400px; width: 600px">
    <div class="ui left rail">
        <br><br><br>
      <h3>Categories</h3>
      <div class="ui bulleted link big list">
          <a class="item" href="#"><strong>Account</strong></a>
          <a class="item" href="#"><strong>Course</strong></a>
          <a class="item" href="#"><strong>Registration</strong></a>
          <a class="item" href="#"><strong>Subscription</strong></a>
          <a class="item" href="#"><strong>Advertising</strong></a>
          <a class="item" href="#"><strong>Submit Question</strong></a>
      </div>
    </div>
    <div class="ui right rail">
      
    </div>
    <h1>Frequently Asked Questions</h1>
    <br>
    <h3 style="opacity: 60%" id="account">Account</h3>
    <div class="ui raised green segment">
        <div class="ui accordion">
            <div class="title">
                <i class="dropdown icon"></i>
                Why is my school account inactive?
            </div>
            <div class="content">
                <p class="transition hidden">School accounts have to be verified first before they can be used to 
                    make sure the account is actually created by the school and not an individual posing as the school. This is made for your
                    own security. The documents you submitted during the registration will be used during the verification process. Only after the account is verified
                    will the account be set to active and accessible to you.
                </p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                How long does verification for school accounts take?
            </div>
            <div class="content">
                <p class="transition hidden">
                    We will verify your account within 24 hours. After which, a notification will be sent to your
                    email address to inform you if your application has been approved.
                </p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                Its been 24 hours but I haven't received my confirmation email. What now?
            </div>
            <div class="content">
                <p class="transition hidden">
                    Sometimes our email gets sent to your spam box, so try checking your spam mail for the confirmation
                    email from us. If it's also not there then you can contact us support@evsip.com and send us your
                    school name and date of application or call us at xxxx-xxx-xxxx.
                </p>
            </div>
        </div>
    </div>
    <h3 style="opacity: 60%">Course</h3>
    <h3 style="opacity: 60%">Registration</h3>
    <h3 style="opacity: 60%">Subscription</h3>
    <div class="ui raised green segment">
        <div class="ui accordion">
            <div class="title">
                <i class="dropdown icon"></i>
                Why go premium?
            </div>
            <div class="content">
                <p class="transition hidden">A free account will only give you basic functionalities. Going premium
                    allows you to use more features such as advertising, premium web page themes, homepage recommendation,
                    and dedicated customer support.
                </p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                How do I get a premium account?
            </div>
            <div class="content">
                <p class="transition hidden">Getting premium is easy. Visit your dashboard and click the Go Premium button 
                    located next to your profile avatar. Click on See Plans and choose from the selection of premium plans 
                    displayed. Once you select your desired plan you will be redirected to another page to review and finalize payment.
                    Depending on your payment method your account will either be upgraded automatically or after the transaction has been 
                    verified.
                </p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                Why do I need to send a picture of my bank transfer receipt to EVSIP?
            </div>
            <div class="content">
                <p class="transition hidden"> We can't automatically detect when you manualy deposit your subscription 
                    payment. So we need a photo of the receipt to verify your payment. We highly recommend using either 
                    credit card, debit card, or paypal to avoid the hassle of manually paying for your subscription.
                    <br><br>
                    TIP: If you have a banking app installed. You can set a schedule to automatically perform a bank transfer/deposit 
                    to our business account.
                </p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                Is paying through credit card secure?
            </div>
            <div class="content">
                <p class="transition hidden">We value security for our customers. EVSIP redirects you to a secure 
                    payment site to process your credit card information. EVSIP also doesn't store any of your credit card 
                    information that you input on the secure site so even we can't see it.
                </p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                I am unable to pay you through your preferred payment methods. Is there any other option?
            </div>
            <div class="content">
                <p class="transition hidden">We do our best to accomodate our customers needs. You can contact us at 
                    support@evsip.com for assistance in your desired payment method.
                </p>
            </div>
        </div>
    </div>
    <h3 style="opacity: 60%">Advertising</h3>
    <div class="ui raised green segment">
        <div class="ui accordion">
            <div class="title">
                <i class="dropdown icon"></i>
                Why advertise on EVSIP?
            </div>
            <div class="content">
                <p class="transition hidden"> Online advertising is an incredibly powerful tool in today's society. EVSIP 
                    allows schools to be featured in our homepage and get recommended to students. Interested students can immediately register 
                    to your school's courses using EVSIP's integrated school registration system. A feature that is absent in 
                    both traditional and social media advertising.
                </p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                How do I advertise in EVSIP?
            </div>
            <div class="content">
                <p class="transition hidden">You can start advertising by creating a free or premium school account. After which,
                    you can click on the Ad Management tab and click on New Campaign.
                    <br><br>
                    Note: Advertisements made through a free account will be billed individually
                </p>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                Can companies or organizations advertise on EVSIP?
            </div>
            <div class="content">
                <p class="transition hidden">We are always open for negotiations! You can send us an email at business@evsip.com or 
                    contact us at xxxx-xxx-xxxx
                </p>
            </div>
        </div>
    </div>
    <h3 style="opacity: 60%">Submit Question</h3>
    <p>Can't find the answer to your questions? Submit your questions to us using the form below. We will send 
        a response as soon as we can.
    </p>
    <div class="ui raised green segment">
        <form class="ui form" action="">
            <div class="field">
                <label>Question Title</label>
                <input type="text" name="title">
            </div>
            <div class="field">
                <label>Short explanation (optional)</label>
                <textarea name="body" id="body" rows="3"></textarea>
            </div>
            <div class="actions">
                <button class="ui blue button">Submit Question</button>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/master-semantic.min.js') }}"></script>
</body>
</html>

