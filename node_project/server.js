const express = require('express');
const session = require('express-session');
const path = require('path');
require('dotenv').config();

const app = express();
const PORT = process.env.PORT || 3000;

// Set EJS as templating engine
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// Middleware for body parsing
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Serve static files from public directory
app.use(express.static(path.join(__dirname, 'public')));

// Configure Express Session
app.use(session({
  secret: process.env.SESSION_SECRET || 'fallbackCmsSecretKey777',
  resave: false,
  saveUninitialized: false,
  cookie: {
    maxAge: 1000 * 60 * 60 * 24 // 1 day
  }
}));

// Load Routes
const indexRoutes = require('./routes/index');
const adminRoutes = require('./routes/admin');

// Map Route domains
app.use('/admin', adminRoutes);
app.use('/', indexRoutes);

// Handling Page Not Found (404 Error handler)
app.use((req, res) => {
  res.status(404).send('<h2>404 - Page Not Found</h2><p>The requested URL is not available in the migrated Node.js CMS.</p><a href="/home.php">Back to Home</a>');
});

// Start Express Listener
app.listen(PORT, () => {
  console.log(`\n========================================`);
  console.log(`🚀 Portfolio CMS Server successfully launched!`);
  console.log(`🔗 Local URL: http://localhost:${PORT}`);
  console.log(`========================================\n`);
});
