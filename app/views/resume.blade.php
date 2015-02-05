@extends('layouts.master')
<title>Paul Kuzma's Resume</title>
@section('content') 
 
    <!-- Intro and Pitch -->

    <div class="container">
        <div class="intro">
          <h1>Paul Kuzma - Web Developer</h1>
             <p class="lead"></p>
          <div id="pitch" class="container">
             <p>
              I am a Full Stack Web Developer, trained in the full LAMP Stack as well as JavaScript, jQuery, HTML5, and CSS3.  I love the process of building web pages and software, and am eager to bring my skills and passion, as well as the strong interpersonal skills developed through seven years as a professional educator, to an organization that requires a junior web developer who can learn new technologies quickly.
             </p>
          </div>
          <div id="pic">
             <img src="css/images/codeup_portrait.jpg" id="selfie" class="img-circle"> 
          </div>
        </div>
        <br>
        <div class="container" id="modal-bar">
          <span class="icon-bar">
            <!--- "Qualifications" Modal button -->
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="qual-button"> 
              Qualifications
            </button> 
          </span>
          <span class="icon-bar">
            <!-- 'Projects I've Done' button and modal -->
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-portfolio" id="portfolio-button">
              Experience
            </button>
          </span>
          <span class="icon-bar">
            <!-- 'Contact Me' button and model -->
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-contact" id="contact-button">
              Contact Me
            </button> 
        </div>
        <br>
        <div id="paper-resume" class="container">
          <p>
            See my paper resume here:
            <p id="resume-icon">
              <a href="/paul_kuzma_developer_resume.pdf"><i class="fa fa-file-pdf-o" id="resumeIcon"></i></a>
            </p>
          </p>
        </div>
         <!-- "Qualfications" Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="contact-list">My Qualifications</h2>
              </div>
              <div id="modal-qualifications" class="container">
                  <ul>
                    <li>Tranined in PHP, JavaScript, and HTML and CSS</li>
                    <li>Can also utilize Git, MySQL, Laravel, and Bootstrap</li>
                    <li>Experience in designing, coding, and debugging projects</li>
                    <li>Possess strong work ethic and burning desire to improve</li>
                    <li>Strong customer service and interaction skills</li> 
                  </ul>
                <h3> Education</h3>
                  <ul>
                    <li>Bachelor's in Elementary Education from Taylor University</li>
                    <li>Graduated from Codeup Coding Bootcamp</li>
                  </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <br>
        <br>

    <!-- 'Experience Modal -->

      <div class="modal fade" id="modal-portfolio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h2 class="contact-list">Experience</h2>
            </div>
            <div id="modal-portfolio" class="container">
              <p class="exp-heading">Web Developer - 2014 to present</p>
              <p class="exp-body">
                I am a graduate of <em>CodeUp</em>, a programming boot camp in San Antonio, Texas, where I was taught the full LAMP stack, as well as JavaScript, jQuery, HTML, and CSS.  Over a 12-week period, I completed over a hundred coding exercises, homework assignments, and challenges.  I also helped to develop worldmentr.org, an interactive website that allows men and women to give or receive mentoring on any subject across the web.
              </p>
              <p class="exp-heading">Professional Educator - 2007 to 2014</p>
              <p class="exp-body">
                I taught all grades 2-9 at four different schools over a period of seven years.  At two of my schools, the student body was over 95% African American, and at another school I taught exclusively special needs children.  I tailored my instruction to fit the needs of my studets, developed strong relations with students and their families, and kept detailed and organized records of student progress.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
        <!-- "Contact Me" Modal -->

        <div class="modal fade" id="modal-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="contact-list">Contact Me</h2>
              </div>
              <div class="modal-body">
                <p class="contact-list"><em>Phone</em></p>
                <p class="contact-list">317-407-5789</p>
                <p class="contact-list"><em>Email</em></p>
                <p class="contact-list">{{ HTML::mailto('kuzma.paul@gmail.com', 'kuzma.paul@gmail.com') }}</p>
                <p class="contact-list"><em>Address</em></p>
                <p class="contact-list">5639 N. Meridian St., Indianapolis, IN 46208</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
@stop
 