<?php
$page_title = "Contact Us - VB Engineering Works";
include 'includes/config.php';
include 'includes/header.php';

$message = '';

$action = $_REQUEST['action'] ?? ''; 
if ($action == 'apply') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message_text = $_POST['message'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $message_text]);
        $message = '<div class="alert alert-success">🙏 Thank you so much for visiting our site and reaching out to us! We have received your message and will get back to you within 24 hours.</div>';
    } catch(PDOException $e) {
        $message = '<div class="alert alert-error">Thank you for visiting our site! There was an error sending your message. Please try again or call us directly.</div>';
    }
}
?>

<main>
    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-content">
                <span class="hero-badge">📞 Get In Touch</span>
                <h1>Let's Build Something <span class="highlight">Amazing</span> Together</h1>
                <p>Ready to start your next engineering project? Our experts are here to help you every step of the way.</p>
                <div class="contact-quick-actions">
                    <a href="tel:+919824742497" class="quick-action-btn">
                        <span class="action-icon">📞</span>
                        <span class="action-text">Call Now</span>
                    </a>
                    <a href="mailto:info@vbengineering.com" class="quick-action-btn">
                        <span class="action-icon">✉️</span>
                        <span class="action-text">Email Us</span>
                    </a>
                    <a href="#contact-form" class="quick-action-btn">
                        <span class="action-icon">📝</span>
                        <span class="action-text">Send Message</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <?php echo $message; ?>
            
            <!-- Contact Methods Section -->
            <div class="contact-methods">
                <div class="section-header">
                    <span class="section-badge">🌐 Multiple Ways to Connect</span>
                    <h2>Choose Your <span class="highlight">Preferred</span> Method</h2>
                </div>
                <div class="contact-options">
                    <div class="contact-option">
                        <div class="option-icon">📞</div>
                        <h3>Phone Support</h3>
                        <p>Immediate assistance for urgent queries</p>
                        <a href="tel:+919824742497" class="option-link">+91 9824742497</a>
                    </div>
                    <div class="contact-option">
                        <div class="option-icon">✉️</div>
                        <h3>Email Support</h3>
                        <p>Detailed project discussions and quotes</p>
                        <a href="mailto:info@vbengineering.com" class="option-link">info@vbengineering.com</a>
                    </div>
                    <div class="contact-option">
                        <div class="option-icon">📍</div>
                        <h3>Visit Our Office</h3>
                        <p>Face-to-face consultations available</p>
                        <span class="option-link">GIDC Vapi, Gujarat</span>
                    </div>
                </div>
            </div>

            <div class="contact-main-content" id="contact-form">
                <div class="contact-form-section">
                    <div class="form-header">
                        <h3>📝 Send Us a Message</h3>
                        <p>Fill out the form below and we'll get back to you within 24 hours</p>
                    </div>
                    <div class="modern-form-container">
                        <form method="POST">
                            <input type="hidden" name="action" value="contact">
                            
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
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" rows="5" required placeholder="Tell us about your project requirements..."></textarea>
                            </div>
                            
                            <button type="submit" class="btn">Send Message</button>
                        </form>
                    </div>
                </div>
                
                <div class="contact-info-section">
                    <div class="info-header">
                        <h3>🏢 Contact Information</h3>
                        <p>Multiple ways to reach our engineering team</p>
                    </div>
                    
                    <div class="info-card address-card">
                        <div class="info-icon">🏢</div>
                        <div class="info-content">
                            <h4>Office Address</h4>
                            <p>VB Engineering Works<br>
                            GIDC Industrial Area, Phase-II<br>
                            Vapi, Gujarat 396195<br>
                            India</p>
                            <a href="#" class="info-action">Get Directions 🗺️</a>
                        </div>
                    </div>
                    
                    <div class="info-card contact-card">
                        <div class="info-icon">📞</div>
                        <div class="info-content">
                            <h4>Phone & Email</h4>
                            <div class="contact-links">
                                <a href="tel:+919876543210" class="contact-link">📞 +91 98765 43210</a>
                                <a href="mailto:info@vbengineering.com" class="contact-link">✉️ info@vbengineering.com</a>
                                <a href="mailto:support@vbengineering.com" class="contact-link">🔧 support@vbengineering.com</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-card hours-card">
                        <div class="info-icon">🕰️</div>
                        <div class="info-content">
                            <h4>Business Hours</h4>
                            <div class="hours-list">
                                <div class="hour-item">
                                    <span class="day">Monday - Friday</span>
                                    <span class="time">9:00 AM - 6:00 PM</span>
                                </div>
                                <div class="hour-item">
                                    <span class="day">Saturday</span>
                                    <span class="time">9:00 AM - 2:00 PM</span>
                                </div>
                                <div class="hour-item closed">
                                    <span class="day">Sunday</span>
                                    <span class="time">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-card emergency-card">
                        <div class="info-icon">🆘</div>
                        <div class="info-content">
                            <h4>24/7 Emergency Support</h4>
                            <p>For urgent technical support or emergency services</p>
                            <a href="tel:+919824742497" class="emergency-number">
                                🚨 +91 9824742497
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-top: 3rem; text-align: center;">
                <h3 style="color: #1e3c72; margin-bottom: 1rem;">Why Choose VB Engineering Works?</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-top: 2rem;">
                    <div>
                        <h4 style="color: #2a5298;">Fast Response</h4>
                        <p>Quick turnaround on quotes and project inquiries</p>
                    </div>
                    <div>
                        <h4 style="color: #2a5298;">Expert Team</h4>
                        <p>Experienced engineers and technical specialists</p>
                    </div>
                    <div>
                        <h4 style="color: #2a5298;">Quality Assured</h4>
                        <p>ISO certified processes and quality standards</p>
                    </div>
                    <div>
                        <h4 style="color: #2a5298;">Competitive Pricing</h4>
                        <p>Cost-effective solutions without compromising quality</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
@media (max-width: 768px) {
    .container > div:first-child {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php include 'includes/footer.php'; ?>