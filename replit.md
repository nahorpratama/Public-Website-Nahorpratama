# Energi Niaga Pratama Website

## Overview
This is a static HTML website for Energi Niaga Pratama, an engineering and construction company. The site was originally created using Webflow and includes multiple pages showcasing the company's projects, team, equipment, and experience.

## Project Structure
- **Static HTML Pages**: index.html, about.html, contact.html, equipment.html, experience.html, projects.html, team.html
- **Assets**:
  - `/css/` - Stylesheets including Webflow CSS and custom styles
  - `/js/` - JavaScript files (webflow.js)
  - `/images/` - Project images organized by location (Aceh, Jambi, Langgam), equipment photos, logos, and certificates

## Technology Stack
- **Frontend**: Static HTML5, CSS3, JavaScript (Webflow template)
- **Server**: Node.js with Express (for serving static files)
- **Port**: 5000 (frontend)

## Development Setup
- Server runs on port 5000 and binds to 0.0.0.0 for Replit compatibility
- Cache control headers are disabled for development to ensure changes are immediately visible
- Static file serving configured through Express

## Recent Changes
- 2025-11-02: Initial Replit setup with Express server for static file serving
- Added server.js to serve the static HTML/CSS/JS files
- Configured for Replit environment with proper port and host settings

## Project Type
Static website with no backend logic - purely presentation/informational site for a construction/engineering company.
