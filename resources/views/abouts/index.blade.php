@extends('layouts.student')
@section('content')
<style>
    body {
    color: #797979;
    background: #f1f2f7;
    font-family: 'Oswald', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 16px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    }
    h2, h5, label {
        font-family: 'Oswald', sans-serif;
        color: #2E7D32;
    }
    .profile-card {
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 2rem;
        background-color: #ffffff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
    }
    .profile-card p {
        font-size: 1.05rem;
        margin-bottom: 0.6rem;
        color: #333;
    }
    .form-label {
        color: #2E7D32;
        font-weight: 600;
    }
    .btn-primary {
        background-color: #2E7D32;
        border-color: #2E7D32;
    }
    .btn-primary:hover {
        background-color: #27642A;
        border-color: #27642A;
    }
    .rounded-profile {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #FBC02D;
    }
    .card-title {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
    #particles-js {
            pointer-events: none;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 0;
            top: 0;
            left: 0;
        }

        h2, h5, label {
        font-family: 'Oswald', sans-serif;
        color: #2E7D32;
    }

    .feed-scroll {
        height: 100vh;
        overflow-y: auto;
        padding-right: 15px;
    }
    .sticky-sidebar {
        position: sticky;
        top: 80px; /* distance from top */
        height: fit-content;
    }
    .card {
    transition: all 0.3s ease;
    border-radius: 12px;
}

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        border: 1px solid #2E7D32;
    }
</style>
<div id="particles-js"></div>
<div class="container mt-3">
    <div class="row mb-2">
        <div class="col">
            <h3>About Us</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Welcome to our blog website, a vibrant platform where creativity meets community! Our mission is to provide a space for writers of all backgrounds to share their stories, ideas, and insights with the world. Whether you're a seasoned author or just starting your writing journey, our blog is the perfect place to connect, inspire, and be inspired.</p>

            <p>At our core, we believe in the power of storytelling to foster understanding and empathy. We are committed to creating a supportive environment where diverse voices can thrive and where readers can discover new perspectives. Our team is passionate about curating high-quality content that resonates with our audience and encourages meaningful conversations.</p>

            <p>Thank you for being a part of our community. We look forward to sharing this journey with you and can't wait to see the incredible stories that will unfold on our platform!</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3 p-3">
                <div class="card-body">
                    <h4>What the platform is?</h4>
                    <p>Our blog website is a dynamic online platform designed to connect writers and readers in a vibrant community. It serves as a space for individuals to share their stories, ideas, and insights through engaging blog posts. Whether you're an aspiring writer looking to showcase your work or a reader seeking inspiration and diverse perspectives, our platform offers a welcoming environment for everyone.</p>
                    <p>With a user-friendly interface and a wide range of topics, our blog website encourages creativity, fosters meaningful discussions, and celebrates the power of storytelling. Join us on this exciting journey as we explore the world of words together!</p>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3 p-3">
                <div class="card-body">
                    <h4>Purpose of the website</h4>
                    <p>The purpose of our blog website is to create a vibrant and inclusive community where writers can share their stories, ideas, and insights with a wider audience. We aim to provide a platform that fosters creativity, encourages meaningful discussions, and celebrates the power of storytelling. Our website serves as a space for individuals to connect, inspire, and be inspired through the written word.</p>
                    <p>Whether you're an aspiring writer looking to showcase your work or a reader seeking inspiration
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3 p-3">
                <div class="card-body">
                    <h4>For whom it is made (Students)</h4>
                    <p>This blog website is especially designed for students who are passionate about writing and sharing their thoughts. It provides a supportive environment where students can develop their writing skills, express their ideas, and connect with peers who share similar interests. Whether you're a high school student working on assignments or a college student exploring academic topics, our platform offers the tools and community you need to grow as a writer.</p>
                    <p>By joining our blog website, students can gain confidence in their writing abilities, receive feedback from a diverse audience, and find inspiration from the stories and perspectives of others. We believe that every student has a unique voice worth sharing, and our platform is here to help you amplify that voice and make your mark in the world of writing.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3 p-3">
                <div class="card-body">
                    <h4></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
particlesJS("particles-js", {
  "particles": {
    "number": { "value": 70 },
    "size": { "value": 3 },
    "color": { "value": "#a855f7" },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#c084fc",
      "opacity": 0.4
    },
    "move": { "speed": 2 }
  }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
</script>
@endsection