CREATE DATABASE vb_engineering;
USE vb_engineering;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE job_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    position VARCHAR(100) NOT NULL,
    experience INT,
    resume_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE job_offers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    requirements TEXT,
    location VARCHAR(100),
    salary_range VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT TRUE
);

INSERT INTO job_offers (title, description, requirements, location, salary_range) VALUES
('Mechanical Engineer', 'Design and develop mechanical systems for industrial applications', 'Bachelor in Mechanical Engineering, 2+ years experience', 'Vapi', '₹2.5 LPA'),
('Project Manager', 'Manage engineering projects from conception to completion', 'Engineering degree, 5+ years experience, PMP preferred', 'Vapi', '₹2.5 LPA'),
('CAD Designer', 'Create technical drawings and 3D models using AutoCAD and SolidWorks', 'Diploma/Degree in Engineering, CAD software proficiency', 'Vapi', '₹2.5 LPA');