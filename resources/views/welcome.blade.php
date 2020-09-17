@extends('layouts.header')
    <body class="body-home">
        <section class="home">
            <section class="logo">
                <img src="{{ asset('assets/logo.png') }}" />
            </section>
            <h1 class="font-weight-bold text-white text-center mb-5">Welcome To Word Scramble</h1>
            <h4 class="font-weight-bold text-white text-center mb-5">Click Start to Play</h4>
            <section class="start mt-3">
                <button class="primary" onclick="window.location='{{ url("/home") }}'">Start</button>
            </seection>
        </section>
    </body>
@extends('layouts.footer')

