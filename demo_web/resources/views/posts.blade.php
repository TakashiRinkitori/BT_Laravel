<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Posts</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='bootstrap.css'>
    <script src='bootstrap.js'></script>
</head>
<body>
    <div class="card-body table-responsive p-0">
        <h2>Bài Viết</h2>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Content</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post )
                    <tr>
                        <td>{{ $post->post_id }}</td>
                        <td>{{ $post->post_title }}</td>
                        <td>{{ $post->post_slug }}</td>
                        <td>{{ $post->post_desc }}</td>
                        <td>{{ $post->post_content }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
</body>
</html>
