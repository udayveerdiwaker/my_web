<?php
$settings = [
    'images' => 'b.jpg',  // Image filename in /image folder
    'first_name' => 'Alex Doe'     // Your name for alt text
];
?>
<img src="image/<?php echo $settings['images']; ?>" alt="<?php echo $settings['first_name']; ?>" class="img-fluid profile-image">

<style>
    .profile-image {
        /* Shape & Size */
        width: 200px;
        /* Adjust as needed */
        height: 200px;
        border-radius: 50%;
        /* Circular image */
        object-fit: cover;
        /* Ensures image fills the space without stretching */

        /* Border & Shadow */
        border: 4px solid #ffffff;
        /* White border */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        /* Soft shadow */

        /* Hover Effect */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-image:hover {
        transform: scale(1.05);
        /* Slight zoom on hover */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        /* Enhanced shadow on hover */
    }

    /* Container for alignment (optional) */
    .profile-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 2rem 0;
    }

    /* Image styling with gradient border */
    .profile-image {
        width: 220px;
        height: 220px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid transparent;
        background: linear-gradient(45deg, #ff7e5f, #feb47b) border-box;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    /* Pulse animation on hover */
    .profile-image:hover {
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    /* Mobile-friendly sizing */
    @media (max-width: 768px) {
        .profile-image {
            width: 150px;
            height: 150px;
            border-width: 3px;
        }
    }
</style>