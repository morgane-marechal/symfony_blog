# Collaborative Blog 

![Symfony](https://img.shields.io/badge/Symfony-8.0.3-black?logo=symfony)
![Docker](https://img.shields.io/badge/Docker-28.1.1-blue?logo=docker)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-blue?logo=postgresql)
![Figma](https://img.shields.io/badge/Figma-Design-purple?logo=figma)

This project is a collaborative blog where users can create content, interact, and receive notifications. 

# Features & Data

This project is a collaborative blog where users can create content, interact, and receive notifications. 

| Feature | Description | Data Stored / Possible Fields |
|---------|-------------|-------------------------------|
| Sign up / Manage account | Users can create an account and manage their profile | Name, Email, Password (hashed), Role (admin, moderator, basic user) |
| Create an article | Users can create articles with content and media | Title, Content, Image (file path), Date of creation |
| Comment on an article | Users can post comments on articles | Content, Author (User), Article, Date of creation |
| Add an article to favorites | Users can bookmark articles they like | User, Article |
| Like a comment | Users can like other users’ comments | User, Comment |
| Receive notifications | Users receive notifications for interactions (likes, favorites, replies) | Type (like, favorite, reply), Trigger (who caused it), Target (article/comment), Date |
| Choose notifications to receive | Users can customize which notifications they want to receive | Type (like, favorite, reply), Enabled (true/false) |

**Power up by [Symfony](https://symfony.com/)**