<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <style>
        :root {
            --text-color: #2c3e50;
            --accent-color: #e74c3c;
            --bg-color: #f8f9fa;
            --card-bg: #ffffff;
            --box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Header with animation */
        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .profession-container {
            display: inline-flex;
            align-items: center;
            height: 70px;
            margin: 20px 0;
            background: var(--card-bg);
            padding: 0 30px;
            border-radius: 50px;
            box-shadow: var(--box-shadow);
        }

        .static-text {
            font-size: 1.8rem;
            color: var(--text-color);
            font-weight: 600;
            margin-right: 15px;
        }

        .dynamic-text {
            height: 70px;
            overflow: hidden;
            position: relative;
        }

        /* Portfolio Grid */
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .portfolio-item {
            background: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: transform 0.3s ease;
        }

        .portfolio-item:hover {
            transform: translateY(-10px);
        }

        .portfolio-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .portfolio-info {
            padding: 20px;
        }

        .portfolio-title {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .portfolio-category {
            display: inline-block;
            padding: 5px 10px;
            background-color: var(--accent-color);
            color: white;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .portfolio-desc {
            color: #666;
            margin-bottom: 15px;
        }

        /* Animation styles (same as before) */
        .profession-list {
            position: relative;
            top: 0;
            animation: slide 12s infinite;
        }

        .profession-item {
            display: block;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent-color);
            height: 70px;
            line-height: 70px;
            position: relative;
            padding-right: 5px;
        }

        .profession-item::after {
            content: "";
            position: absolute;
            left: 0;
            top: 15%;
            height: 70%;
            width: 3px;
            background-color: var(--accent-color);
            animation: blink 0.8s infinite, typing 3s steps(15) infinite;
        }

        @keyframes slide {
            0% { top: 0; }
            20% { top: 0; }
            25% { top: -70px; }
            45% { top: -70px; }
            50% { top: -140px; }
            70% { top: -140px; }
            75% { top: -210px; }
            95% { top: -210px; }
            100% { top: -280px; }
        }

        @keyframes typing {
            0% { left: 0; width: 0; }
            50% { left: 100%; width: 0; }
            100% { left: 100%; width: 0; }
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .portfolio-grid {
                grid-template-columns: 1fr;
            }
            
            .profession-container {
                height: 50px;
                padding: 0 20px;
            }
            
            .static-text, .profession-item {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>My Creative Portfolio</h1>
            <div class="profession-container">
                <span class="static-text">I'm a</span>
                <div class="dynamic-text">
                    <div class="profession-list">
                        <span class="profession-item">Web Developer</span>
                        <span class="profession-item">UI/UX Designer</span>
                        <span class="profession-item">Photographer</span>
                        <span class="profession-item">Freelancer</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="portfolio-grid">
            <!-- Portfolio Item 1 -->
            <div class="portfolio-item">
                <img src="https://source.unsplash.com/random/600x400/?webdesign" alt="Web Project" class="portfolio-img">
                <div class="portfolio-info">
                    <span class="portfolio-category">Web Development</span>
                    <h3 class="portfolio-title">E-commerce Website</h3>
                    <p class="portfolio-desc">A fully responsive online store with custom CMS and payment integration.</p>
                </div>
            </div>

            <!-- Portfolio Item 2 -->
            <div class="portfolio-item">
                <img src="https://source.unsplash.com/random/600x400/?mobileapp" alt="App Design" class="portfolio-img">
                <div class="portfolio-info">
                    <span class="portfolio-category">App Design</span>
                    <h3 class="portfolio-title">Fitness Tracker App</h3>
                    <p class="portfolio-desc">Mobile application for tracking workouts and nutrition with social features.</p>
                </div>
            </div>

            <!-- Portfolio Item 3 -->
            <div class="portfolio-item">
                <img src="https://source.unsplash.com/random/600x400/?branding" alt="Brand Design" class="portfolio-img">
                <div class="portfolio-info">
                    <span class="portfolio-category">Branding</span>
                    <h3 class="portfolio-title">Coffee Shop Identity</h3>
                    <p class="portfolio-desc">Complete visual identity for an artisanal coffee brand including packaging.</p>
                </div>
            </div>

            <!-- Portfolio Item 4 -->
            <div class="portfolio-item">
                <img src="https://source.unsplash.com/random/600x400/?photography" alt="Photography" class="portfolio-img">
                <div class="portfolio-info">
                    <span class="portfolio-category">Photography</span>
                    <h3 class="portfolio-title">Urban Landscapes</h3>
                    <p class="portfolio-desc">Collection of cityscape photography from various international locations.</p>
                </div>
            </div>

            <!-- Portfolio Item 5 -->
            <div class="portfolio-item">
                <img src="https://source.unsplash.com/random/600x400/?ui" alt="UI Design" class="portfolio-img">
                <div class="portfolio-info">
                    <span class="portfolio-category">UI/UX</span>
                    <h3 class="portfolio-title">Banking Dashboard</h3>
                    <p class="portfolio-desc">User interface redesign for a financial management web application.</p>
                </div>
            </div>

            <!-- Portfolio Item 6 -->
            <div class="portfolio-item">
                <img src="https://source.unsplash.com/random/600x400/?graphicdesign" alt="Graphic Design" class="portfolio-img">
                <div class="portfolio-info">
                    <span class="portfolio-category">Graphic Design</span>
                    <h3 class="portfolio-title">Music Festival Posters</h3>
                    <p class="portfolio-desc">Series of promotional materials for an annual music festival.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>