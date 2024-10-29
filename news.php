<?php include 'top.php'; ?>

    <main class="news">
        <h1>News</h1>
        <section>
            <h2>Latest news</h2>
            <p>A stream of articles we've published recently</p>
            <table>
            <?php
                $sql = 'SELECT * FROM tblGadflyArticles';
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $records = $statement->fetchAll();

                
                foreach($records as $record){
                    print'<tr>';
                    print'<td><strong>' . $record['fldTitle'] . '</strong></td>';
                    print'<td><em>' . $record['fldSubtitle'] . '</em></td>';
                    print'<td>' . $record['fldIssue'] . '</td>';
                    print'<td>' . $record['fldAuthor'] . '</td>';
                    print'<td>' . $record['fldDate'] . '</td>';
                    print'<td>' . '<a href=article.php?id=' . $record['pmkArticleId'] . '> Read More </a>' . '</td>';
                    print'</tr>' . PHP_EOL;
                }
            ?>
            </table>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
