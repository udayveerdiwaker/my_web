const express = require('express');
const router = express.Router();
const db = require('../config/db');
const bcrypt = require('bcryptjs');

// Global middleware to fetch settings and navigation for footer and headers
async function loadGlobalData(req, res, next) {
  try {
    const [settingsRows] = await db.query("SELECT * FROM basic_setting LIMIT 1");
    const [navRows] = await db.query("SELECT * FROM navigationbar ORDER BY id ASC");
    
    res.locals.settings = settingsRows[0] || {
      first_name: 'Shiva',
      email: 'shivadiwaker@gmail.com',
      number: '0000000000',
      images: 'b.jpg',
      logo: 'b.jpg'
    };
    res.locals.navigation = navRows;
    next();
  } catch (err) {
    console.error("Error loading global website data: ", err);
    res.locals.settings = {};
    res.locals.navigation = [];
    next();
  }
}

router.use(loadGlobalData);

// 1. Root / Entrance Page
router.get('/', (req, res) => {
  res.render('index');
});

// 2. Home page (supporting home.php and /home)
router.get(['/home.php', '/home'], async (req, res) => {
  try {
    const [categories] = await db.query("SELECT * FROM categories ORDER BY id DESC");
    res.render('home', { categories });
  } catch (err) {
    console.error(err);
    res.render('home', { categories: [] });
  }
});

// 3. About page (supporting about.php and /about)
router.get(['/about.php', '/about'], (req, res) => {
  // Read query parameter about
  const aboutQuery = req.query.about || 'About';
  res.render('about', { title: aboutQuery });
});

// 4. Skills page (supporting skills.php and /skills)
router.get(['/skills.php', '/skills'], (req, res) => {
  const skillsQuery = req.query.skills || 'Skills';
  res.render('skills', { title: skillsQuery });
});

// 5. Contact page (supporting contact.php and /contact)
router.get(['/contact.php', '/contact'], (req, res) => {
  const contactQuery = req.query.contact || 'Contact';
  res.render('contact', { title: contactQuery, form_submitted: req.session.form_submitted });
  // Clear flash session parameter
  req.session.form_submitted = false;
});

// Post action for contact message submission
router.post('/contact', async (req, res) => {
  const { name, email, contact, subject, message } = req.body;
  try {
    // Save contact to SQL
    await db.query(
      "INSERT INTO `contact_data` (`name`, `email`, `contact`, `subject`, `message`) VALUES (?, ?, ?, ?, ?)",
      [name, email, contact, subject, message]
    );
    
    // Note: To configure SMTP mailing, you can install nodemailer and trigger sends here.
    console.log(`New contact inquiry saved: ${name} <${email}>`);
    
    req.session.form_submitted = true;
    res.redirect('/contact.php?contact=Contact&submitted=true');
  } catch (err) {
    console.error("Failed to insert contact data: ", err);
    res.status(500).send("Database Insertion Error");
  }
});

// 6. Resume page (supporting resume.php and /resume)
router.get(['/resume.php', '/resume'], (req, res) => {
  const resumeQuery = req.query.resume || 'Resume';
  res.render('resume', { title: resumeQuery });
});

// 7. AJAX client-checking check_email equivalent
router.post('/check-email', async (req, res) => {
  const { email } = req.body;
  try {
    const [rows] = await db.query("SELECT * FROM users_register WHERE email = ?", [email]);
    if (rows.length > 0) {
      res.json({ status: 'exists' });
    } else {
      res.json({ status: 'not_exists' });
    }
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'DB Error' });
  }
});

// 8. AJAX login-client equivalent
router.post('/login-client', async (req, res) => {
  const { email, password } = req.body;
  try {
    // Find client
    const [rows] = await db.query("SELECT * FROM users_register WHERE email = ?", [email]);
    if (rows.length === 1) {
      const user = rows[0];
      // Compare password
      // Since existing passwords in DB might be plain text, check plain-text first then fallback to bcrypt verify.
      let valid = (password === user.password); // fallback plain text matching for migration safety
      
      if (!valid && user.password && user.password.startsWith('$2y$') || user.password.startsWith('$2b$')) {
        // Node bcrypt matches PHP password_hash (blowfish) patterns
        valid = await bcrypt.compare(password, user.password);
      }
      
      if (valid) {
        req.session.client = user.username;
        req.session.client_id = user.id;
        return res.json({ status: 'login_success' });
      } else {
        return res.json({ status: 'invalid_password' });
      }
    } else {
      return res.json({ status: 'email_not_found' });
    }
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Server Error' });
  }
});

// 9. AJAX register-client equivalent
router.post('/register-client', async (req, res) => {
  const { username, email, password } = req.body;
  try {
    const [check] = await db.query("SELECT * FROM users_register WHERE email = ?", [email]);
    if (check.length > 0) {
      return res.json({ status: 'email_exists' });
    }
    
    // Hash password
    const hashedPassword = await bcrypt.hash(password, 10);
    
    // Insert new user
    const [result] = await db.query(
      "INSERT INTO users_register (username, email, password) VALUES (?, ?, ?)",
      [username, email, hashedPassword]
    );
    
    req.session.client = username;
    req.session.client_id = result.insertId;
    res.json({ status: 'register_success' });
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Registration failed' });
  }
});

// 10. Newsletter Subscribe
router.post('/newsletter-subscribe', async (req, res) => {
  const email = req.body.newsletter_email;
  try {
    // Check if email already subscribed in subscribers table
    const [rows] = await db.query("SELECT * FROM subscribers WHERE subscriber = ?", [email]);
    if (rows.length === 0) {
      await db.query("INSERT INTO subscribers (subscriber) VALUES (?)", [email]);
      req.session.newsletter_subscribed = true;
    } else {
      req.session.newsletter_error = "This email is already subscribed.";
    }
    res.redirect('/home.php');
  } catch (err) {
    console.error("Newsletter subscription error: ", err);
    req.session.newsletter_error = "Subscription failed. Please try again.";
    res.redirect('/home.php');
  }
});

module.exports = router;
