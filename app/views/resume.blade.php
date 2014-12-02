@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Paul Kuzma's Resume</title>
    <link rel="stylesheet" href="/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">
               <!--- "Qualifications" Modal button -->
              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> 
                Qualifications
              </button> 
            </span>
            <span class="icon-bar">
              <!-- 'Projects I've Done' button and modal -->
              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-portfolio">
                Portfolio
              </button>
            </span>
            <span class="icon-bar">
              <!-- 'Contact Me' button and model -->
              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-contact">
                Contact Me
              </button>
            </span>
          </button>
       </div>
         <div class="collapse navbar-collapse">
        </div>
      </div>
    </div> 

    <div class="container">
        <div class="intro">
          <h1>Paul Kuzma - Web Developer</h1>
          <p class="lead">LAMP, JavaScript, HTML, CSS, Git, MySQL, Bootstrap, Laravel</p>
        </div>
       
              <!-- "Qualfications" Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2>My Qualifications</h2>
                      </div>
                      <div id="modal-qualifications">
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

            <!-- 'Projects I've Done Modal -->

              <div class="modal fade" id="modal-portfolio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h2>Projects I've Done</h2>
                    </div>
                    <div id="modal-portfolio">
                      Though I do not yet have any projects to my name to boast of now, I will have at least one by the time Codeup is over. 
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
                    <h2>Contact Me</h2>
                  </div>
                  <div class="modal-body">
                    <p class="contact-list">Phone: 317-407-5789</p>
                    <p class="contact-list">Email: kuzma.paul@gmail.com</p>
                    <p class="contact-list">Address: 5639 N. Meridian St., Indianapolis, IN 46208</p>
                    <p class="contact-list">LinkedIn: whatever linkedin address i get</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

    </div><!-- /.container -->
    



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
  </body>