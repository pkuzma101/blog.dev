@extends('layouts.master')
<title>Paul Kuzma's Resume</title>
@section('content')



<!-- Intro and Pitch -->
<div class="container-fluid" id="resume-page">
    <div class="intro">
        <h1>Paul Kuzma - Web Developer</h1>
            <p class="lead"></p>
        <div id="pitch" class="container">
            <p>
                I am a Full Stack Web Developer, trained and experienced in the full LAMP Stack as well as JavaScript, jQuery, HTML5, and CSS3.  I love the process of building web pages and software, and am eager to bring my skills and passion, as well as the strong interpersonal skills developed through seven years as a professional educator, to an organization that requires a web developer who can learn new technologies quickly.
            </p>
        </div>
        <div id="pic">
            <img src="css/images/codeup_portrait.jpg" id="selfie" class="img-circle"> 
        </div>
    </div>
    <br>
    <div class="button-row">
        <div class="row-fluid">
            <div class="col-md-4">
                <button class="btn btn-danger btn-lg center-block" data-toggle="modal" data-target="#myModal" id="qual-button"> 
                    Qualifications
                </button> 
            </div>
            <div class="col-md-4">
                <button class="btn btn-danger btn-lg center-block" data-toggle="modal" data-target="#modal-portfolio" id="portfolio-button">
                    Experience
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-danger btn-lg center-block" data-toggle="modal" data-target="#modal-contact" id="contact-button">
                    Contact Me
                </button>
            </div>
        </div>
    </div>
    <br>
    <div id="paper-resume">
        <p class="see-resume-text">
            <p>See my paper resume here:</p>
            <p id="resume-icon">
                <a href="/paul_kuzma_developer_resume.pdf"><i class="fa fa-file-pdf-o" id="resumeIcon"></i></a>
            </p>
        </p>
    </div>

 @include('partials.qualifications-modal')
 @include('partials.experience-modal')
 @include('partials.contact-modal')

@stop
 