const express = require('express');
const NewsController = require('../controllers/newsController');

const router = express.Router();
const newsController = new NewsController();

function setRoutes(app) {
    router.get('/news', newsController.getNews.bind(newsController));
    router.get('/news/:id', newsController.getNewsById.bind(newsController));
    router.post('/news', newsController.createNews.bind(newsController));

    app.use('/api', router);
}

module.exports = setRoutes;