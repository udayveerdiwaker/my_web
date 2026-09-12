const express = require('express');
const router = express.Router();
const db = require('../config/db');
const bcrypt = require('bcryptjs');
const multer = require('multer');
const path = require('path');
const fs = require('fs');

// Set up image uploading storage configuration for settings using Multer
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    const uploadPath = path.join(__dirname, '../public/image');
    if (!fs.existsSync(uploadPath)){
      fs.mkdirSync(uploadPath, { recursive: true });
    }
    cb(null, uploadPath);
  },
  filename: function (req, file, cb) {
    // Keep original file name to match original PHP script behavior
    cb(null, Date.now() + '-' + file.originalname);
  }
});

const upload = multer({ storage: storage });

// Authentication middleware for administrative pages
function requireAdmin(req, res, next) {
  if (req.session.admin) {
    res.locals.user = req.session.admin;
    next();
  } else {
    res.redirect('/admin/signin');
  }
}

// 1. Sign In Routing
router.get('/signin', (req, res) => {
  if (req.session.admin) {
    return res.redirect('/admin/dashboard');
  }
  res.render('admin/signin', { error: null });
});

router.post('/signin', async (req, res) => {
  const { email, password } = req.body;
  try {
    const [rows] = await db.query("SELECT * FROM users WHERE email = ?", [email]);
    if (rows.length === 1) {
      const user = rows[0];
      
      // Check password (checking raw comparison for migration and bcrypt check)
      let valid = (password === user.password); // fallback plain text matching for migration safety
      
      if (!valid && user.password && (user.password.startsWith('$2y$') || user.password.startsWith('$2b$'))) {
        valid = await bcrypt.compare(password, user.password);
      }
      
      if (valid) {
        req.session.admin = {
          id: user.id,
          username: user.username,
          email: user.email
        };
        return res.redirect('/admin/dashboard');
      }
    }
    res.render('admin/signin', { error: "Invalid email or password." });
  } catch (err) {
    console.error(err);
    res.render('admin/signin', { error: "An error occurred. Please try again." });
  }
});

// 2. Sign Up Routing
router.get('/signup', (req, res) => {
  res.render('admin/signup', { error: null, success: null });
});

router.post('/signup', async (req, res) => {
  const { username, email, password } = req.body;
  try {
    const [check] = await db.query("SELECT * FROM users WHERE email = ?", [email]);
    if (check.length > 0) {
      return res.render('admin/signup', { error: "Email already exists.", success: null });
    }
    
    // Hash password
    const hashedPassword = await bcrypt.hash(password, 10);
    
    await db.query(
      "INSERT INTO users (username, email, password) VALUES (?, ?, ?)",
      [username, email, hashedPassword]
    );
    
    res.render('admin/signup', { error: null, success: "Registration successful! You can now log in." });
  } catch (err) {
    console.error(err);
    res.render('admin/signup', { error: "Error occurred during registration.", success: null });
  }
});

// 3. Logout Routing
router.get('/logout', (req, res) => {
  req.session.destroy();
  res.redirect('/admin/signin');
});

// Apply admin access verification gate on all dashboard operations below
router.use(requireAdmin);

// 4. Dashboard overview
router.get('/dashboard', async (req, res) => {
  try {
    const [[{ count: navCount }]] = await db.query("SELECT COUNT(*) as count FROM navigationbar");
    const [[{ count: categoryCount }]] = await db.query("SELECT COUNT(*) as count FROM categories");
    
    res.render('admin/dashboard', {
      activePage: 'dashboard',
      navCount,
      categoryCount,
      nodeVersion: process.version,
      port: process.env.PORT || 3000
    });
  } catch (err) {
    console.error(err);
    res.render('admin/dashboard', {
      activePage: 'dashboard',
      navCount: 0,
      categoryCount: 0,
      nodeVersion: process.version,
      port: 3000
    });
  }
});

// 5. Navigation Links CRUD
router.get('/navigation', async (req, res) => {
  try {
    const [rows] = await db.query("SELECT * FROM navigationbar ORDER BY id ASC");
    res.render('admin/navigation', { activePage: 'navigation', navigation: rows });
  } catch (err) {
    console.error(err);
    res.render('admin/navigation', { activePage: 'navigation', navigation: [] });
  }
});

router.post('/navigation/add', async (req, res) => {
  const { navbar_links, href } = req.body;
  try {
    await db.query("INSERT INTO navigationbar (navbar_links, href) VALUES (?, ?)", [navbar_links, href]);
    res.redirect('/admin/navigation');
  } catch (err) {
    console.error(err);
    res.status(500).send("Database Error");
  }
});

router.post('/navigation/edit', async (req, res) => {
  const { id, navbar_links, href } = req.body;
  try {
    await db.query("UPDATE navigationbar SET navbar_links = ?, href = ? WHERE id = ?", [navbar_links, href, id]);
    res.redirect('/admin/navigation');
  } catch (err) {
    console.error(err);
    res.status(500).send("Database Error");
  }
});

router.get('/navigation/delete/:id', async (req, res) => {
  const { id } = req.params;
  try {
    await db.query("DELETE FROM navigationbar WHERE id = ?", [id]);
    res.redirect('/admin/navigation');
  } catch (err) {
    console.error(err);
    res.status(500).send("Database Error");
  }
});

// 6. Professions Categories CRUD
router.get('/professions', async (req, res) => {
  try {
    const [rows] = await db.query("SELECT * FROM categories ORDER BY id DESC");
    res.render('admin/professions', { activePage: 'professions', categories: rows });
  } catch (err) {
    console.error(err);
    res.render('admin/professions', { activePage: 'professions', categories: [] });
  }
});

router.post('/professions/add', async (req, res) => {
  const { name } = req.body;
  try {
    await db.query("INSERT INTO categories (name) VALUES (?)", [name]);
    res.redirect('/admin/professions');
  } catch (err) {
    console.error(err);
    res.status(500).send("Database Error");
  }
});

router.post('/professions/edit', async (req, res) => {
  const { id, name } = req.body;
  try {
    await db.query("UPDATE categories SET name = ? WHERE id = ?", [name, id]);
    res.redirect('/admin/professions');
  } catch (err) {
    console.error(err);
    res.status(500).send("Database Error");
  }
});

router.get('/professions/delete/:id', async (req, res) => {
  const { id } = req.params;
  try {
    await db.query("DELETE FROM categories WHERE id = ?", [id]);
    res.redirect('/admin/professions');
  } catch (err) {
    console.error(err);
    res.status(500).send("Database Error");
  }
});

// 7. Settings Editing Panel
router.get('/settings', async (req, res) => {
  try {
    const [rows] = await db.query("SELECT * FROM basic_setting LIMIT 1");
    res.render('admin/settings', {
      activePage: 'settings',
      settings: rows[0] || {},
      success: req.session.success_msg || null,
      error: req.session.error_msg || null
    });
    // Clear notifications
    req.session.success_msg = null;
    req.session.error_msg = null;
  } catch (err) {
    console.error(err);
    res.status(500).send("Database Error");
  }
});

router.post('/settings/update', upload.fields([{ name: 'images', maxCount: 1 }, { name: 'logo', maxCount: 1 }]), async (req, res) => {
  const { id, first_name, email, number } = req.body;
  try {
    // Get existing settings to keep existing files if no new ones uploaded
    const [rows] = await db.query("SELECT * FROM basic_setting WHERE id = ?", [id]);
    const settings = rows[0] || {};
    
    let uploadImage = settings.images;
    let uploadLogo = settings.logo;
    
    if (req.files['images'] && req.files['images'].length > 0) {
      uploadImage = req.files['images'][0].filename;
    }
    if (req.files['logo'] && req.files['logo'].length > 0) {
      uploadLogo = req.files['logo'][0].filename;
    }
    
    await db.query(
      "UPDATE basic_setting SET first_name = ?, email = ?, number = ?, images = ?, logo = ? WHERE id = ?",
      [first_name, email, number, uploadImage, uploadLogo, id]
    );
    
    req.session.success_msg = "Website settings updated successfully!";
    res.redirect('/admin/settings');
  } catch (err) {
    console.error("Settings update error: ", err);
    req.session.error_msg = "An error occurred while updating settings.";
    res.redirect('/admin/settings');
  }
});

module.exports = router;
