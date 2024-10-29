<?php include 'top.php'; ?>
        <main>
            <p>Create Form SQL</p>
            <pre>
                CREATE TABLE tblGadflySubmissions(
                    pmkResponseId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    fldName VARCHAR(50) DEFAULT NULL,
                    fldEmail VARCHAR(50) DEFAULT NULL,
                    fldSubmission VARCHAR(50) DEFAULT NULL,
                    fldInstructions VARCHAR(50) DEFAULT NULL,
                    fldDiscoveryInstagram TINYINT(1) DEFAULT 0,
                    fldDiscoveryPrint TINYINT(1) DEFAULT 0,
                    fldDiscoveryFriend TINYINT(1) DEFAULT 0,
                    fldDiscoveryOther TINYINT(1) DEFAULT 0,
                    fldSubmissionType VARCHAR(15) DEFAULT NULL
                )
            </pre>
            <p>Create Articles SQL</p>
            <pre>
                CREATE TABLE tblGadflyArticles(
                    pmkArticleId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    fldTitle VARCHAR(100) DEFAULT NULL,
                    fldSubtitle VARCHAR(100) DEFAULT NULL,
                    fldIssue VARCHAR(50) DEFAULT NULL,
                    fldAuthor VARCHAR(50) DEFAULT NULL,
                    fldDate VARCHAR(50) DEFAULT NULL,
                    fldText MEDIUMTEXT DEFAULT NULL
                )

                INSERT INTO tblGadflyArticles (fldTitle, fldSubtitle, fldIssue, fldAuthor, fldDate) VALUES ('Interview with an ASL Professor', 'Interview with Dr. John Pirone', 'Vol. 2 Iss. 2', 'Yubin', 'Aug 29, 2023');
            
                INSERT INTO tblGadflyArticles (fldTitle, fldSubtitle, fldIssue, fldAuthor, fldDate, fldText) VALUES ('Antidepressants Can\'t Cure Poverty', 'Full disclaimer, I love Prozac.', 'Vol. 2 Iss. 1', 'Katie', 'Aug 29, 2023', "Full disclaimer, I love Prozac. Shes the daughter I dont have, the sister I always wanted, the

butter to my bread, the cheese to my macaroni. Id be dead without my fluoxetine - probably literally. My PRN Elavil, whose function in regulating my emotional state is still a bit unknown, but seems to be

positive, is an extra security blanket. 

Antidepressants have been a revolutionary turning point in managing mental health, and none of this is to suggest some mass anti-medication movement. When we look at depression, though, we often fail to see the factors causing it for many; financial strain, economic instability, the fact that a person working 50 hours a week on minimum wage still wouldnt be able to afford a one-bed apartment in Burlington. 

A free trial on BetterHelp isnt going to magically ensure you can feed your kids. You cant therapy your way out of constant anxiety over paying the bills. You can take medication to help the chemical imbalance, and unpick all the childhood issues that form the way you perceive the world, but until we start radically addressing the reasons people end up in poverty, were never going to truly be able to treat the huge rises in depressive and anxiety-based conditions. 

Translation: "Record Economic Development: The Rich Get Richer, the Poor Get Poorer!"
-Artist Unknown, Photo by Katie


Theres no college counselor in the world who can teach you to mindfulness your way out of a paycheck that barely covers the rent. Looking at glitter settling in a water bottle isnt going to pay the electric bill.

Numerous studies have shown that suicide rates are highest in areas with higher poverty rates -

shockingly, in the UK, the British Medical Journal found in 2017 that children of people on state welfare benefits are twice as likely to commit suicide than their peers. 

We can talk all we like about the dangers of putting young people on medication, but until we take actual, radical steps towards ensuring everybody has food, accommodation, and utilities, how can we expect anything else? 

When we create and uphold a system in which the poor are left to fend for themselves - or die trying - why do we act so surprised when people struggle to deal with the unbearable feelings and thoughts that come with a cycle of unending poverty? How do we expect people to be okay when we arent meeting their most basic needs - and blaming them for the consequences?");

                INSERT INTO tblGadflyArticles (fldTitle, fldSubtitle, fldIssue, fldAuthor, fldDate) VALUES ('How to Talk to That One Person Who Sits Next to You in Class', 'The time after class is perilous. Do you dare linger?', 'Vol. 1 Iss. 2', 'Nayantara', 'Aug 9, 2023');

                INSERT INTO tblGadflyArticles (fldTitle, fldSubtitle, fldIssue, fldAuthor, fldDate) VALUES ('Cop City: The Construction of Control', '¡Viva Viva Tortuguita!', 'Vol. 1 Iss. 2', 'L.G.', 'Jun 4, 2023');

                INSERT INTO tblGadflyArticles (fldTitle, fldSubtitle, fldIssue, fldAuthor, fldDate) VALUES ('How to Build a Good Playground', 'For a child, the playground is the farthest they will be from grown-up influence...', 'Vol. 1 Iss. 2', 'Lunchbox', 'Apr 25, 2023');
            
                SELECT fldTitle, fldSubtitle, fldIssue, fldAuthor, fldDate FROM tblGadflyArticles
            </pre>


        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>
