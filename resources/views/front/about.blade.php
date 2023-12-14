@extends('front.layouts.app')

@section('content')

<div>
    <header style="background-color: #2c3e50; color: #f39c12; text-align: center; padding: 20px; position: relative;">
        <h1>About Us</h1>
        <div style="content: ''; display: block; height: 2px; width: 60px; background-color: #f39c12; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);"></div>
    </header>

    <div style="background-color: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;">
        <p>The Hobby Hub!</p>
        <p>Our goal is simple: We are committed to providing our customers quality products at competitive prices, great customer service and speedy delivery. We strive to put the customer first. So, if you want something specific that we don’t have in stock, we’re happy to order it for you!</p>

        <div>
            <p><strong>Email:</strong> info@thehobhub.com</p>
            <p><strong>Phone:</strong> (334)-375-9607</p>
        </div>

        <div>
            <p><strong>Business Hours:</strong></p>
            <p>Monday: 12PM - 6PM</p>
            <p>Tuesday: CLOSED</p>
            <p>Wednesday: 12PM - 8PM</p>
            <p>Thursday: 12PM - 8PM</p>
            <p>Friday: 12PM - 10PM</p>
            <p>Saturday: 12PM - 10PM</p>
            <p>Sunday: 12PM - 8PM</p>
        </div>

        <div>
            <p><strong>Address:</strong></p>
            <p>3201 Montgomery Highway, Suite 6</p>
            <p>Dothan, AL 36303</p>
        </div>
    </div>
</div>

@endsection
