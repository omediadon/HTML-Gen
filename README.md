<div id="top"></div>

<!-- PROJECT SHIELDS -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links-->
<div align="center">

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

</div>

<!-- PROJECT LOGO -->
<br />
<!-- UPDATE -->
<div align="center">
  <a href="https://github.com/omediadon/HTML-Gen">
    <img width="140" alt="image" src="https://www.svgrepo.com/show/530444/availability.svg">
  </a>

<h3 align="center">HTML GEN</h3>

  <p align="center">
  <!-- UPDATE -->
    <i>Generate your HTML securely, with ease!</i>
    <br />
    <a href="https://github.com/omediadon/HTML-Gen"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/omediadon/HTML-Gen/issues">Report Bug</a>
    ·
    <a href="https://github.com/omediadon/HTML-Gen/issues">Request Feature</a>
  </p>
</div>


<!-- TABLE OF CONTENTS -->
<details>
<summary>Table of Contents</summary>

- [About The Project](#about-the-project)
    - [Supports](#supports)
- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
- [Usage](#usage)
- [Contact](#contact)
- [Additional documentation](#additional-documentation)

</details>


<!-- ABOUT THE PROJECT -->
## About The Project
<!-- UPDATE -->


_This is a library that does just that; generates HTML markdown using fluent PHP classes. This library can be used anywhere where you can have PHP and HTML  coexist. Worth noting, this library was made ***just for fun***._

<p align="right">(<a href="#top">back to top</a>)</p>

<div id="supports"></div>

### Supports:
1. HTML Elements
    * `Divs`
    * `Paragraphs`
    * `Images`
    * `Links`
    * `Inputs (text, mail, phone, passwoord, date, file, select...)`
    * `Tables (row, columns, header...)`
    * `Forms`
    * `Headings`
    * `Lists (ordered and unordered)`
2. CSS Framework
    * `Bootstrap 5`

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

To set up a local instance of the application, follow the steps below.

### Prerequisites
<!-- UPDATE -->
The following dependencies are required to be installed for the project to function properly:
* PHP 8+
* Composer

<p align="right">(<a href="#top">back to top</a>)</p>

### Installation

_Now that the environment has been set up and configured to properly compile and run the project, the next step is to install and configure the project locally on your system._
<!-- UPDATE -->
1. Install the library
  ```sh
  composer require xana/gen-html
  ```
2. Have fun!

<p align="right">(<a href="#top">back to top</a>)</p>


<!-- USAGE EXAMPLES -->
## Usage
<!-- UPDATE -->
Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space.


  ```php
    
use Xana\GenHtml\Elements\Button;  
use Xana\GenHtml\Elements\Email;  
use Xana\GenHtml\Elements\Form;  
use Xana\GenHtml\Elements\Password;  
use Xana\GenHtml\Elements\TextArea;  
  
require 'vendor/autoload.php';
  
$defaultAttrs = [  
    "required" => true,  
    'placeholder' => 'Enter your message here',  
];
$form = $form->addElement(new Email("email", ["placeholder" => "Email Address"]))  
             ->addElement(new Password("password", ["placeholder" => "Password"]))  
             ->addElement(new TextArea('the-text', $defaultAttrs))  
             ->addElement(new Button("Login"));
               
 echo $form->render();
  ```    

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- CONTACT -->
## Contact

<p>
📫 Omar SAKHRAOUI ( aka Xana ) 

- <a href="https://xanaserver.cloud">
  <img align="center" alt="View my website " width="36px" src="https://www.svgrepo.com/show/345376/website-site-health-medical-drug-pharmacy-web.svg" /> View my website
</a>

- <a href="mailto:webmaster@xanaserver.cloud">
  <img align="center" alt="Send an EMail" width="36px" src="https://raw.githubusercontent.com/edent/SuperTinyIcons/master/images/svg/mail.svg" /> Send an EMail
</a>

- <a href="https://www.linkedin.com/in/omar-sakhraoui/">
  <img align="center" alt="My LinkedIn" width="36px" src="https://raw.githubusercontent.com/edent/SuperTinyIcons/master/images/svg/linkedin.svg" /> Hire me on LinkedIn
</a>

</p>

<p align="right">(<a href="#top">back to top</a>)</p>


## Additional documentation

- [Changelogs](/CHANGELOG.md)
- [License](/LICENSE)

<p align="right">(<a href="#top">back to top</a>)</p>

## Made with 💕

<!-- MARKDOWN LINKS & IMAGES -->

[contributors-shield]: https://img.shields.io/github/contributors/omediadon/HTML-Gen.svg?style=for-the-badge
[contributors-url]: https://github.com/omediadon/HTML-Gen/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/omediadon/HTML-Gen.svg?style=for-the-badge
[forks-url]: https://github.com/omediadon/HTML-Gen/network/members
[stars-shield]: https://img.shields.io/github/stars/omediadon/HTML-Gen.svg?style=for-the-badge
[stars-url]: https://github.com/omediadon/HTML-Gen/stargazers
[issues-shield]: https://img.shields.io/github/issues/omediadon/HTML-Gen.svg?style=for-the-badge
[issues-url]: https://github.com/omediadon/HTML-Gen/issues
[license-shield]: https://img.shields.io/github/license/omediadon/HTML-Gen.svg?style=for-the-badge
[license-url]: https://github.com/omediadon/HTML-Gen/blob/master/LICENSE
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/omar-sakhraoui
