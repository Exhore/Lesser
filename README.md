<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://www.nelsonrivera.es/">
    <img src="https://i.imgur.com/vqq17xp.png" alt="Logo">
  </a>
  <h3 align="center">Lesser. Your youtube video summarizer.</h3>

  <p align="center">
    <a href="https://www.nelsonrivera.es/">View Demo</a>
    ·
    <a href="https://github.com/Exhore/Lesser/issues/new?labels=bug&template=bug-report---.md">Report Bug</a>
    ·
    <a href="https://github.com/Exhore/Lesser/issues/new?labels=enhancement&template=feature-request---.md">Request Feature</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

Lesser is a web application focused on <b>summarize youtube content</b> in a matter of seconds. The idea is simple: You want to know about the main ideas of a video, or what the video is about. Or you simply want a summary of the information the speaker is trying to convey without ads and without interruptions, <b>powered by AI</b>.

This application is a SPA. It runs on InertiaJS technology, which is a 'glue' between the front-end and back-end (vue + laravel). This makes the program feel responsive and fast.

-   📱 Web is <b>responsive</b> with all kind of devices.
-   🏃 <b>Faster</b> than light 💡 - being a SPA, the app runs smoothly!
-   🔒 Secure storage - Users can be registered with <b>2FA</b> for secure their accounts and sessions.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

![Vue.js](https://img.shields.io/badge/vuejs-%2335495e.svg?style=for-the-badge&logo=vuedotjs&logoColor=%234FC08D)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
<img src="https://avatars.githubusercontent.com/u/47703742?s=280&v=4" alt="inertia" width=32px height=32px>
InertiaJS
![ChatGPT](https://img.shields.io/badge/chatGPT-74aa9c?style=for-the-badge&logo=openai&logoColor=white)
![YouTube](https://img.shields.io/badge/YouTube-%23FF0000.svg?style=for-the-badge&logo=YouTube&logoColor=white)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

### USE CASE DIAGRAM

<img src="https://i.imgur.com/fClc6QN.png" alt="use cases">

## Getting Started

If you don't want to use the App in my website, you can also run it in local. There are few steps to do that.

### Prerequisites

List of prerequisites you need to use the software and how to install them.

-   php 8.0+, composer, laravel
-   All dependencies in package.json that will be installed with npm later.
-   Mysql database
-   Nodejs, npm

### Installation

_Below there is the requirements dependencies to install the program and run it in local._

1. Contact me to get the OpenAI API key. Without API KEY, you CANNOT run the program.
2. Clone the repo
    ```sh
    git clone https://github.com/Exhor/Lesser.git
    ```
3. Install NPM packages
    ```sh
    npm install
    ```
4. Install Composer dependencies

   ``` composer install ```


6. Put the '.env' file in root folder

7. Do the migrations

   ```
    php artisan migrate
   ```

9. Create symbolic link for public and storage
   ```
   php artisan storage:link
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Usage

Here's how:

-   You choose a URL of a youtube video and paste it in the input box of the website.
-   A connection is established with the OpenAI API and Youtube to collect the subtitles of the videos, process them to summarize them and deliver them to you.
-   In less than 5 seconds, you have your summary ready :smile:

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- LICENSE -->

## License

![MIT](https://img.shields.io/badge/license-MIT-blue)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

Nelson Rivera - contacto@nelsonrivera.es

Project Link: [https://github.com/Exhor/Lesser](https://github.com/Exhor/Lesser)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://www.nelsonrivera.es//issues
