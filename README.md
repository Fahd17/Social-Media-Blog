<h1>Social Media Blog Web Application Readme</h1>
<p>Welcome to the documentation for the Social Media Blog web application developed between September 2022 and January 2023. This project utilized PHP, Laravel, Laravel Livewire, AJAX, MySQL, Docker, and followed the MVC architecture.</p>
<h2>Project Overview</h2>
<p>The Social Media Blog primarily focuses on backend functionality, demonstrating user interactions, content management, and notifications. The backend, powered by Laravel and other technologies, enables users to submit posts, comment on posts, manage profiles, and engage with content. A simple user interface showcases the underlying mechanics, providing insights into application functions.</p>
<h2>Implemented Features</h2>
<ul>
    <li><strong>Post Submission and Commenting:</strong> Users can interact with posts through dynamic commenting using Laravel Livewire.</li>
    <li><strong>Role-Based Authorization:</strong> Admin role and authorization system for content management.</li>
    <li><strong>Notification System:</strong> Email notifications for user engagement via Mailhog.</li>
    <li><strong>Post Analytics:</strong> View and like count for posts, enhancing user engagement.</li>
    <li><strong>User Profiles and Authentication:</strong> Secure user profiles and authentication mechanisms.</li>
    <li><strong>Content Management:</strong> Users can delete, edit their posts, comments, and captions.</li>
    <li><strong>Admin Privileges:</strong> Admins can manage all posts and comments.</li>
    <li><strong>Database Testing Data:</strong> Seeders and factories for thorough testing.</li>
</ul>
<h2>Containerization and Scalability</h2>
<p>The application was containerized using Laravel Sail and Docker, ensuring scalability and consistent environments.</p>
<h2>How to Use</h2>
<ol>
    <li>Clone the repository.</li>
    <li>Install dependencies with <code>composer install</code>.</li>
    <li>Configure <code>.env</code> variables.</li>
    <li>Set up the database with <code>php artisan migrate</code>.</li>
    <li>Launch the development environment using <code>./vendor/bin/sail up</code>.</li>
</ol>
<h2>Conclusion</h2>
<p>The Social Media Blog project is backend-focused, emphasizing core functionalities, content management, and notifications. The backend, supported by Laravel and Docker, enables user interactions, while a basic UI highlights application mechanics. With features like role-based authorization, post analytics, and admin privileges, the application enhances user engagement and showcases backend prowess. As the project evolves, backend mechanisms and user experiences remain central to its development.</p>
