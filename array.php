<?php 
include "top.php";
$liveShowsSeen = array(
    array('Haley Heynderickx', '3/16/24', 'Northampton, MA'),
    array('Mike Marshall and Darol Anger', '2/2/24', 'Burlington, VT'),
    array('Odie Leigh', '12/6/23', 'Burlington, VT'),
    array('Humbird', '11/11/22', 'Burlington, VT'),
    array('Cricket Blue', '11/11/22', 'Burlington, VT')
);
?>

    <main>
        <h1>Live Folk Music</h1>

        <section id="concerts">
            <h2>Concerts</h2>
            <p>Concerts are a great way to experience live folk music. Live folk music has an undeniably different
                character than recordings. Arists can use live space to enhance their previous work with improvised aspects
                or totally different arrangements. Improvisation allows artists to really show off their skill.
                My favorite concerts I've been to have been intimate and have felt like the arists are very much 
                enjoying themselves.
                Audiences can participate in songs, which works especially well for folk music
                as many folk music songs are very good when sung by multiple voices. 
                I love singing along at concerts, and it's always great to be led by a truly talented musician.
            </p>
        </section>

        <section id="festivals">
            <h2>Festivals</h2>
            <p>Festivals are like a bunch of concerts all together, but also with additional events. 
                Some folk music festivals have jam sessions where you can play or sing with other people.
                In these, songs will often be taught by word of mouth or simply picked up by those playing. 
                Other workshops may be held, including songwriting, dancing, and more. 
                Some festivals have food trucks where you can get something to eat while you listen to music,
                and others have craft fairs with handmade items being sold by vendors. Sometimes these items will be
                related to music, and sometimes they will not. Festivals can be overwhelming, 
                but they can also be wonderful experiences.</p>
        </section>

        <section id="live-array">
            <h2><?php print sizeof($liveShowsSeen);?> Recent Concerts I've Attended</h2>
            <table>
                <tr>
                    <th>Artist</th>
                    <th>Date</th>
                    <th>Location</th>
                </tr>
                <?php 
                    foreach ($liveShowsSeen as $liveShow) {
                        print '<tr>';
                        foreach ($liveShow as $showAttribute) {
                            print '<td>';
                            print $showAttribute;
                            print '</td>';
                        }
                        print '</tr>';
                    }
                ?>
                <tr>
                    <td colspan="3"><cite>Source: Aurelia Kornheiser</cite></td>
                </tr>
            </table>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>
