<?php
$page_title = "Job Opportunities - VB Engineering Works";
include 'includes/config.php';
include 'includes/header.php';

$message = '';

$action = $_REQUEST['action'] ?? ''; 
if ($action == 'apply') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $experience = $_POST['experience'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO job_applications (name, email, phone, position, experience) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $position, $experience]);
        $message = '<div class="alert alert-success">🎉 Thank you so much for visiting our site and applying for a position with VB Engineering! Your application has been submitted successfully. We will review it and contact you within 48 hours.</div>';
    } catch(PDOException $e) {
        $message = '<div class="alert alert-error">Thank you for visiting our site! There was an error submitting your application. Please try again or email us your resume directly.</div>';
    }
}

$stmt = $pdo->query("SELECT * FROM job_offers WHERE is_active = 1 ORDER BY created_at DESC");
$jobs = $stmt->fetchAll();
?>

<main>
    <!-- Jobs Hero Section -->
    <section class="jobs-hero">
        <div class="container">
            <div class="jobs-hero-content">
                <span class="hero-badge">🚀 Build Your Career</span>
                <h1>Join Our <span class="highlight">Engineering</span> Team</h1>
                <p>Shape the future of engineering with innovative projects and cutting-edge technology</p>
                <div class="jobs-stats">
                    <div class="stat-item">
                        <span class="stat-number">25+</span>
                        <span class="stat-label">Team Members</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Projects</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">15+</span>
                        <span class="stat-label">Years Growth</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <?php echo $message; ?>
            
            <!-- Why Work With Us -->
            <div class="why-work-section">
                <div class="section-header">
                    <span class="section-badge">Why Choose VB Engineering</span>
                    <h2>Why Work <span class="highlight">With Us?</span></h2>
                </div>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">🏆</div>
                        <h3>Growth Opportunities</h3>
                        <p>Continuous learning and career advancement</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">💰</div>
                        <h3>Competitive Salary</h3>
                        <p>Industry-leading compensation packages</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">🎆</div>
                        <h3>Innovation Focus</h3>
                        <p>Work on cutting-edge engineering projects</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">🤝</div>
                        <h3>Team Culture</h3>
                        <p>Collaborative and supportive work environment</p>
                    </div>
                </div>
            </div>

            <div class="section-header">
                <span class="section-badge">💼 Open Positions</span>
                <h2>Current <span class="highlight">Openings</span></h2>
                <p>Find your perfect role and start your engineering journey with us</p>
            </div>
            
            <div class="jobs-grid">
                <?php foreach ($jobs as $job): ?>
                <div class="modern-job-card">
                    <div class="job-header">
                        <div class="job-title-section">
                            <h3><?php echo htmlspecialchars($job['title']); ?></h3>
                            <div class="job-badges">
                                <span class="job-badge location">📍 <?php echo htmlspecialchars($job['location']); ?></span>
                                <span class="job-badge salary">💵 <?php echo htmlspecialchars($job['salary_range']); ?></span>
                            </div>
                        </div>
                        <div class="job-type-badge">Full-time</div>
                    </div>
                    
                    <div class="job-description">
                        <h4>📝 Job Description</h4>
                        <p><?php echo htmlspecialchars($job['description']); ?></p>
                    </div>
                    
                    <?php if ($job['requirements']): ?>
                    <div class="job-requirements">
                        <h4>✅ Requirements</h4>
                        <p><?php echo htmlspecialchars($job['requirements']); ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <div class="job-actions">
                        <button class="btn btn-primary job-apply-btn" onclick="openApplicationForm('<?php echo htmlspecialchars($job['title']); ?>')">
                            🚀 Apply Now
                        </button>
                        <button class="btn btn-outline job-save-btn">
                            🔖 Save Job
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div id="applicationForm" class="application-modal" style="display: none;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>📝 Job Application Form</h3>
                        <button class="close-btn" onclick="closeApplicationForm()">&times;</button>
                    </div>
                    <div class="form-container">
                    <form method="POST">
                        <input type="hidden" name="action" value="apply">
                        
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="position">Position Applied For *</label>
                            <input type="text" id="position" name="position" required readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="experience">Years of Experience</label>
                            <input type="number" id="experience" name="experience" min="0">
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">🚀 Submit Application</button>
                            <button type="button" class="btn btn-outline" onclick="closeApplicationForm()">Cancel</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
function openApplicationForm(position) {
    document.getElementById('position').value = position;
    document.getElementById('applicationForm').style.display = 'block';
    document.getElementById('applicationForm').scrollIntoView({ behavior: 'smooth' });
}

function closeApplicationForm() {
    document.getElementById('applicationForm').style.display = 'none';
}
</script>

<?php include 'includes/footer.php'; ?>