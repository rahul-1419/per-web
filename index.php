<?php
$year = date('Y');
$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        $errorMessage = 'Please fill in all contact form fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Please provide a valid email address.';
    } else {
        $successMessage = "Thanks, {$name}! Your message has been received.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern dark-themed portfolio website">
    <title>Alex Carter | Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>

    <header class="site-header">
        <div class="container nav-wrap">
            <a href="#home" class="brand">AC</a>
            <button class="menu-toggle" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="main-nav" id="main-nav">
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <main id="home">
        <section class="hero section">
            <div class="container hero-grid">
                <div>
                    <p class="eyebrow">Web Developer • UI Enthusiast</p>
                    <h1>Designing <span>modern digital</span> experiences that feel alive.</h1>
                    <p class="hero-copy">
                        I build responsive websites and web apps with a strong focus on performance,
                        clean interactions, and elegant visuals.
                    </p>
                    <div class="hero-actions">
                        <a class="btn btn-primary" href="#projects">View Projects</a>
                        <a class="btn btn-outline" href="#contact">Let's Talk</a>
                    </div>
                </div>
                <aside class="hero-card">
                    <h2>Now Building</h2>
                    <p>Interactive, brand-focused websites with smooth animations and conversion-driven layouts.</p>
                    <ul>
                        <li>Frontend Architecture</li>
                        <li>Motion UI</li>
                        <li>Performance Optimization</li>
                    </ul>
                </aside>
            </div>
        </section>

        <section id="about" class="section">
            <div class="container split-grid">
                <h2>About Me</h2>
                <p>
                    I'm Alex, a developer who combines product thinking and visual storytelling.
                    My goal is to transform ideas into polished web experiences that are both functional
                    and memorable.
                </p>
            </div>
        </section>

        <section id="skills" class="section">
            <div class="container">
                <h2>Core Skills</h2>
                <div class="tag-grid">
                    <span>HTML5</span>
                    <span>CSS3 / SCSS</span>
                    <span>JavaScript (ES6+)</span>
                    <span>PHP</span>
                    <span>Responsive Design</span>
                    <span>Accessibility</span>
                    <span>REST APIs</span>
                    <span>Git & GitHub</span>
                </div>
            </div>
        </section>

        <section id="projects" class="section">
            <div class="container">
                <h2>Featured Projects</h2>
                <div class="project-grid">
                    <article class="project-card">
                        <h3>Pulse Commerce</h3>
                        <p>A high-converting ecommerce landing page with dynamic product highlights and smooth transitions.</p>
                        <a href="#" aria-label="Read more about Pulse Commerce">Case Study ↗</a>
                    </article>
                    <article class="project-card">
                        <h3>Nova Dashboard</h3>
                        <p>Dark-mode analytics dashboard focusing on data hierarchy and intuitive visual components.</p>
                        <a href="#" aria-label="Read more about Nova Dashboard">Case Study ↗</a>
                    </article>
                    <article class="project-card">
                        <h3>Studio One</h3>
                        <p>Portfolio website for a creative studio, emphasizing typography, storytelling, and performance.</p>
                        <a href="#" aria-label="Read more about Studio One">Case Study ↗</a>
                    </article>
                </div>
            </div>
        </section>

        <section id="contact" class="section">
            <div class="container contact-wrap">
                <div>
                    <h2>Let's Build Something Great</h2>
                    <p>Share your project idea and I’ll reply with a tailored plan.</p>
                </div>
                <form method="post" class="contact-form" novalidate>
                    <?php if ($successMessage !== ''): ?>
                        <p class="status success"><?= htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endif; ?>
                    <?php if ($errorMessage !== ''): ?>
                        <p class="status error"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endif; ?>
                    <label>
                        Name
                        <input type="text" name="name" placeholder="Your name" required>
                    </label>
                    <label>
                        Email
                        <input type="email" name="email" placeholder="you@example.com" required>
                    </label>
                    <label>
                        Message
                        <textarea name="message" rows="4" placeholder="Tell me about your project" required></textarea>
                    </label>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>© <?= htmlspecialchars($year, ENT_QUOTES, 'UTF-8') ?> Alex Carter. Crafted with care.</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
