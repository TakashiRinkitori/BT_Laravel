<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dân Trí - Tin Tức Nhanh Chóng</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        line-height: 1.6;
        }

        header {
            background: #29901f;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            display: flex;
            padding: 20px;
        }

        section {
            flex: 3;
            margin-right: 20px;
        }

        aside {
            flex: 1;
            background: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
        }

        h2 {
            color: #0072c6;
        }

        article {
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        article h3 {
            margin: 0;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background: #0072c6;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        #comments {
            margin-top: 20px;
        }

        #comments form {
            background: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
        }

        #comments label {
            display: block;
            margin: 10px 0 5px;
        }

        #comments input,
        #comments textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

    </style>
</head>
<body>
    <header>
        <h1>Dân Trí</h1>
        <nav>
            <ul>
                <li><a href="#home">Trang Chủ</a></li>
                <li><a href="#news">Tin Tức</a></li>
                <li><a href="#sports">Thể Thao</a></li>
                <li><a href="#entertainment">Giải Trí</a></li>
                <li><a href="#contact">Liên Hệ</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="featured">
            <h2>Tin Nổi Bật</h2>
            <article>
                <h3>Tin 1: Tiêu đề nổi bật</h3>
                <p>Đoạn mô tả ngắn về tin tức nổi bật.</p>
                <a href="#">Đọc thêm</a>
            </article>
            <article>
                <h3>Tin 2: Tiêu đề nổi bật</h3>
                <p>Đoạn mô tả ngắn về tin tức nổi bật.</p>
                <a href="#">Đọc thêm</a>
            </article>
        </section>

        <section id="latest">
            <h2>Tin Mới Nhất</h2>
            <article>
                <h3>Tin 1: Tiêu đề tin mới</h3>
                <p>Đoạn mô tả về tin mới nhất.</p>
                <a href="#">Đọc thêm</a>
            </article>
            <article>
                <h3>Tin 2: Tiêu đề tin mới</h3>
                <p>Đoạn mô tả về tin mới nhất.</p>
                <a href="#">Đọc thêm</a>
            </article>
        </section>

        <aside>
            <h2>Bài Viết Nổi Bật</h2>
            <ul>
                <li><a href="#">Bài viết 1</a></li>
                <li><a href="#">Bài viết 2</a></li>
                <li><a href="#">Bài viết 3</a></li>
            </ul>
        </aside>

        <section id="comments">
            <h2>Bình Luận</h2>
            <form action="submit-comment.php" method="POST">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" required>

                <label for="comment">Bình luận:</label>
                <textarea id="comment" name="comment" required></textarea>

                <button type="submit">Gửi</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Dân Trí. Tất cả các quyền được bảo lưu.</p>
    </footer>
</body>
</html>
