<?php include 'top.php'; ?>

    <main class="news">
        <section>
    <?php
        if ($_GET['id'] == '') {
            header("Location: news.php");
        }

        try {
            $sql = 'SELECT * FROM tblGadflyArticles WHERE pmkArticleId=' . (int)$_GET['id'];
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $records = $statement->fetchAll();

            echo '<h1>' . $records[0]["fldTitle"] . '</h1>';
            echo '<h2>' . $records[0]["fldSubtitle"] . '</h2>';
            echo '<p>' . $records[0]["fldAuthor"] . '</p>';
            echo '<p>' . $records[0]["fldIssue"] . $records[0]["fldDate"] . '</p>';
            echo '<p>' . $records[0]["fldText"] . '</p>';
        }
        catch (PDOException $e) {
            echo '<p>Sorry, that article doesn\'t seem to exist! Only one article is included in this demo</p>' . $e;
        }
        ?>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>