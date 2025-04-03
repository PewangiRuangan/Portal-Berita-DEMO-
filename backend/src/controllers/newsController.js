class NewsController {
    constructor(newsService) {
        this.newsService = newsService;
    }

    async getNews(req, res) {
        try {
            const news = await this.newsService.fetchAllNews();
            res.status(200).json(news);
        } catch (error) {
            res.status(500).json({ message: 'Error fetching news', error });
        }
    }

    async getNewsById(req, res) {
        const { id } = req.params;
        try {
            const newsItem = await this.newsService.fetchNewsById(id);
            if (newsItem) {
                res.status(200).json(newsItem);
            } else {
                res.status(404).json({ message: 'News not found' });
            }
        } catch (error) {
            res.status(500).json({ message: 'Error fetching news', error });
        }
    }

    async createNews(req, res) {
        const newsData = req.body;
        try {
            const newNews = await this.newsService.addNews(newsData);
            res.status(201).json(newNews);
        } catch (error) {
            res.status(500).json({ message: 'Error creating news', error });
        }
    }
}

export default NewsController;