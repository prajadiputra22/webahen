<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #f59e0b;
            border-bottom: 2px solid #f59e0b;
            padding-bottom: 10px;
        }
        .info-block {
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .message {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #f59e0b;
        }
    </style>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    
    <div class="info-block">
        <div class="label">Name:</div>
        <div>{{ $formData['name'] }}</div>
    </div>
    
    <div class="info-block">
        <div class="label">Email:</div>
        <div>{{ $formData['email'] }}</div>
    </div>
    
    @if(isset($formData['phone']) && $formData['phone'])
    <div class="info-block">
        <div class="label">Phone:</div>
        <div>{{ $formData['phone'] }}</div>
    </div>
    @endif
    
    @if(isset($formData['subject']) && $formData['subject'])
    <div class="info-block">
        <div class="label">Subject:</div>
        <div>{{ $formData['subject'] }}</div>
    </div>
    @endif
    
    <div class="info-block">
        <div class="label">Product Interest:</div>
        <div>{{ $formData['product'] }}</div>
    </div>
    
    <div class="info-block">
        <div class="label">Message:</div>
        <div class="message">{{ $formData['message'] }}</div>
    </div>
    
    <p>This message was sent from the Sugar Ahen contact form.</p>
</body>
</html>
