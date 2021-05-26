<?php
    $host='localhost';
    $user='root';
    $password='';
    $dbname='pdoposts'

    // Set DSN
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;

    // Create a PDO instance
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ));
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false)); //allows me to use LIMIT below
    # PDO QUERY

    // $stmt = $pdo->query('SELECT * FROM posts');

    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //   echo $row['title'].'<br>;
    // }

    // while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    //   echo $row->title.'<br>';
    // }


    # PREPARED STATEMENTS (prepare and execute)

    // UNSAFE
    //$sql = "SELECT * FROM posts WHERE author = '$author'";

    // FETCH MULTIPLE POSTS
    
    // User input
    $author='Dan';
    $is_published = true;
    $id = 1;

    // Positional Params
    $sql = 'SELECT * FROM posts WHERE author = ? && is_published = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$author, $is_published]);
    $posts=$stmt->fetchAll();

     // Named Params
    //  $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
    //  $stmt = $pdo->prepare($sql);
    //  $stmt->execute(['author'=>$author, 'is_published'=>$is_published]);
    //  $posts=$stmt->fetchAll();
 

    // var_dump($posts);
    // foreach($posts as $post){
    //     echo $post->title.'<br>;
    // }

    // FETCH SINGLE POST
    // $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
    // $stmt = $db->prepare($sql);
    // $stmt->execute(['id'=>$id]);
    // $post=$stmt->fetch();
    // 

    // echo $post->title;

    // GET ROW COUNT (index number not total rows)
    // $stmt = $pdo->prepare('SELECT * FROM POSTS WHERE author = ?');
    // $stmt->execute([$author]);
    // $postCount = $stmt->rowCount();

    // echo $postCount;

    // INSERT DATA
    // $title = 'Post Five';
    // $body = 'This is post five';
    // $author = 'Kevin';

    // $sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
    // echo 'Post Added';

    //UPDATE DATA
    // $id = 1;
    // $body = 'This is the updated post';

    // $sql = 'UPDATE posts SET body = :body WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['body' => $body, 'id' => $id]);
    // echo 'Post Updated';

    // DELETE DATA
    // $id = 3;

    // $sql = 'DELETE FROM posts WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $id]);
    // echo 'Post Deleted';

    // SEARCH DATA
    // $search = "%f%";//returns four and five
    // $sql = 'SELECT * FROM posts WHERE title LIKE ?';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$search]);
    // $posts = $stmt->fetchAll();

    // foreach($posts as $post){
    //     echo $post->title.'<br>';
    // }