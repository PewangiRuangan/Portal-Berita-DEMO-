const express = require('express');
const cors = require('cors');
const dotenv = require('dotenv');
const { connectDB } = require('./models/db');
const newsRoutes = require('./routes/newsRoutes');
const authMiddleware = require('./middlewares/authMiddleware');

dotenv.config();

const app = express();
const PORT = process.env.PORT || 5000;

// Middleware
app.use(cors());
app.use(express.json());
app.use(authMiddleware.checkAuth);

// Database connection
connectDB();

// Routes
app.use('/api/news', newsRoutes);

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});