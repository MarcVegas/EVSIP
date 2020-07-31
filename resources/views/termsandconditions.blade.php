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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head> 
<body>
<div class="ui basic inverted blue padded segment">
    <a class="ui secondary button" href="/login"><i class="angle left icon"></i> Go back</a>
</div>
<div class="ui grid">
    <div class="three wide column"></div>
    <div class="ten wide column">
        <div class="ui basic very padded segment">
            <h1>EVSIP Terms and Conditions</h1>
        
        <h3>1. Introduction</h3>
        These Website Standard Terms And Conditions (these “Terms” or these “Website Standard Terms And Conditions”) contained herein on this webpage, shall govern your use of this website, including all pages within this website (collectively referred to herein below as this “Website”). These Terms apply in full force and effect to your use of this Website and by using this Website, you expressly accept all terms and conditions contained herein in full. You must not use this Website, if you have any objection to any of these Website Standard Terms And Conditions.
        
        This Website is not for use by any minors (defined as those who are not at least 18 years of age), and you must not use this Website if you a minor.
        
        <h3>2. Intellectual Property Rights</h3>
        Other than content you own, which you may have opted to include on this Website, under these Terms, [Sender.Company] and/or its licensors own all rights to the intellectual property and material contained in this Website, and all such rights are reserved. You are granted a limited license only, subject to the restrictions provided in these Terms, for purposes of viewing the material contained on this Website.
        
        <h3>2. Intellectual Property Rights</h3>
        You are expressly and emphatically restricted from all of the following:
        
        <ul class="ui bulleted list">
            <li class="item">publishing any Website material in any media;</li>
            <li class="item">publicly performing and/or showing any Website material;</li>
            <li class="item">using this Website in any way that is, or may be, damaging to this Website;</li>
            <li class="item">using this Website in any way that impacts user access to this Website;</li>
            <li class="item">using this Website contrary to applicable laws and regulations, or in a way that causes, or may cause, harm to the Website, or to any person or business entity;</li>
            <li class="item">engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website, or while using this Website;</li>
            <li class="item">using this Website to engage in any advertising or marketing;</li>
            <li class="item">Certain areas of this Website are restricted from access by you and [Sender.Company] may further restrict access by you to any areas of this Website, at any time, in its sole and absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality of such information.</li>
        </ul>
        
        <h3>4. Your Content</h3>
        In these Website Standard Terms And Conditions, “Your Content” shall mean any audio, video, text, images or other material you choose to display on this Website. With respect to Your Content, by displaying it, you grant [Sender.Company] a non-exclusive, worldwide, irrevocable, royalty-free, sublicensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
        
        Your Content must be your own and must not be infringing on any third party’s rights. [Sender.Company] reserves the right to remove any of Your Content from this Website at any time, and for any reason, without notice.
        
        <h3>5. No warranties</h3>
        This Website is provided “as is,” with all faults, and [Sender.Company] makes no express or implied representations or warranties, of any kind related to this Website or the materials contained on this Website. Additionally, nothing contained on this Website shall be construed as providing consult or advice to you.
        
        <h3>6. Limitation of liability</h3>
        In no event shall [Sender.Company] , nor any of its officers, directors and employees, be liable to you for anything arising out of or in any way connected with your use of this Website, whether such liability is under contract, tort or otherwise, and [Sender.Company] , including its officers, directors and employees shall not be liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.
        
        <h3>7. Indemnification</h3>
        You hereby indemnify to the fullest extent [Sender.Company] from and against any and all liabilities, costs, demands, causes of action, damages and expenses (including reasonable attorney’s fees) arising out of or in any way related to your breach of any of the provisions of these Terms.
        
        <h3>8. Severability</h3>
        If any provision of these Terms is found to be unenforceable or invalid under any applicable law, such unenforceability or invalidity shall not render these Terms unenforceable or invalid as a whole, and such provisions shall be deleted without affecting the remaining provisions herein.
        
        <h3>9. Variation of Terms</h3>
        [Sender.Company] is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review such Terms on a regular basis to ensure you understand all terms and conditions governing use of this Website.
        
        <h3>9. Variation of Terms</h3>
        [Sender.Company] shall be permitted to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification or consent required. However, .you shall not be permitted to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.
        
        <h3>11. Entire Agreement</h3>
        These Terms, including any legal notices and disclaimers contained on this Website, constitute the entire agreement between [Sender.Company] and you in relation to your use of this Website, and supersede all prior agreements and understandings with respect to the same.
        
        <h3>12. Governing Law & Jurisdiction</h3>
        These Terms will be governed by and construed in accordance with the laws of the State of [State], and you submit to the non-exclusive jurisdiction of the state and federal courts located in [State] for the resolution of any disputes.
        </div>
    </div>
    <div class="three wide column"></div>
</div>
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/master-semantic.min.js') }}"></script>
<script>
    $('.register.modal').modal('attach events', '.register.button', 'show');
</script>
</body>
</html>

