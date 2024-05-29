<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irregular Verbs Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input {
            padding: 8px;
            margin-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>

    <h2>Irregular Verbs Search</h2>
    
    <label for="searchInput">Search for a verb:</label>
    <input type="text" id="searchInput" oninput="searchVerbs()" placeholder="Type a verb...">

    <table id="verbsTable">
        <thead>
            <tr>
                <th>Verb</th>
                <th>Simple Past</th>
                <th>Past Participle</th>
                <th>Translation</th>
            </tr>
        </thead>
        <tbody id="verbsBody">
            <?php
            $irregularVerbs = array(
                'be' => array('was/were', 'been', 'sein'),
                'beat' => array('beat', 'beaten', 'schlagen'),
                'become' => array('became', 'become', 'werden'),
                'begin' => array('began', 'begun', 'anfangen'),
                'bite' => array('bit', 'bitten', 'beißen'),
                'break' => array('broke', 'broken', 'brechen'),
                'bring' => array('brought', 'brought', 'bringen'),
                'build' => array('built', 'built', 'bauen'),
                'buy' => array('bought', 'bought', 'kaufen'),
                'can' => array('could', '', 'können'),
                'catch' => array('caught', 'caught', 'fangen'),
                'choose' => array('chose', 'chosen', 'wählen'),
                'come' => array('came', 'come', 'kommen'),
                'cost' => array('cost', 'cost', 'kosten'),
                'cut' => array('cut', 'cut', 'schneiden'),
                'do' => array('did', 'done', 'tun'),
                'draw' => array('drew', 'drawn', 'zeichnen'),
                'drink' => array('drank', 'drunk', 'trinken'),
                'drive' => array('drove', 'driven', 'fahren'),
                'eat' => array('ate', 'eaten', 'essen'),
                'fall' => array('fell', 'fallen', 'fallen'),
                'feel' => array('felt', 'felt', 'fühlen'),
                'fight' => array('fought', 'fought', 'kämpfen'),
                'find' => array('found', 'found', 'finden'),
                'fly' => array('flew', 'flown', 'fliegen'),
                'forbid' => array('forbade', 'forbidden', 'verbieten'),
                'forget' => array('forgot', 'forgotten', 'vergessen'),
                'freeze' => array('froze', 'frozen', 'frieren'),
                'get' => array('got', 'got', 'bekommen'),
                'give' => array('gave', 'given', 'geben'),
                'go' => array('went', 'gone', 'gehen'),
                'grow' => array('grew', 'grown', 'wachsen'),
                'hang' => array('hung', 'hung', 'hängen'),
                'have' => array('had', 'had', 'haben'),
                'hear' => array('heard', 'heard', 'hören'),
                'hide' => array('hid', 'hidden', 'verstecken'),
                'hit' => array('hit', 'hit', 'schlagen'),
                'hold' => array('held', 'held', 'halten'),
                'hurt' => array('hurt', 'hurt', 'wehtun'),
                'keep' => array('kept', 'kept', 'aufbewahren'),
                'know' => array('knew', 'known', 'wissen'),
                'lead' => array('led', 'led', 'führen'),
                'leave' => array('left', 'left', 'verlassen'),
                'lend' => array('lent', 'lent', 'verleihen'),
                'let' => array('let', 'let', 'lassen'),
                'lie' => array('lay', 'lain', 'liegen'),
                'lose' => array('lost', 'lost', 'verlieren'),
                'make' => array('made', 'made', 'machen'),
                'mean' => array('meant', 'meant', 'bedeuten'),
                'meet' => array('met', 'met', 'treffen'),
                'pay' => array('paid', 'paid', 'bezahlen'),
                'put' => array('put', 'put', 'legen'),
                'read' => array('read', 'read', 'lesen'),
                'ride' => array('rode', 'ridden', 'reiten'),
                'ring' => array('rang', 'rung', 'klingeln'),
                'rise' => array('rose', 'risen', 'steigen'),
                'run' => array('ran', 'run', 'laufen'),
                'say' => array('said', 'said', 'sagen'),
                'see' => array('saw', 'seen', 'sehen'),
                'sell' => array('sold', 'sold', 'verkaufen'),
                'send' => array('sent', 'sent', 'senden'),
                'set' => array('set', 'set', 'setzen'),
                'shoot' => array('shot', 'shot', 'schießen'),
                'show' => array('showed', 'shown', 'zeigen'),
                'shrink' => array('shrank', 'shrunk', 'schrumpfen'),
                'shut' => array('shut', 'shut', 'schließen'),
                'sing' => array('sang', 'sung', 'singen'),
                'sink' => array('sank', 'sunk', 'sinken'),
                'sit' => array('sat', 'sat', 'sitzen'),
                'sleep' => array('slept', 'slept', 'schlafen'),
                'speak' => array('spoke', 'spoken', 'sprechen'),
                'spend' => array('spent', 'spent', 'ausgeben'),
                'stand' => array('stood', 'stood', 'stehen'),
                'steal' => array('stole', 'stolen', 'stehlen'),
                'swim' => array('swam', 'swum', 'schwimmen'),
                'take' => array('took', 'taken', 'nehmen'),
                'teach' => array('taught', 'taught', 'unterrichten'),
                'tear' => array('tore', 'torn', 'zerreißen'),
                'tell' => array('told', 'told', 'sagen'),
                'think' => array('thought', 'thought', 'denken'),
                'throw' => array('threw', 'thrown', 'werfen'),
                'undercut' => array('undercut', 'undercut', 'unterbieten'),
                'understand' => array('understood', 'understood', 'verstehen'),
                'unwind' => array('unwound', 'unwound', 'sich entspannen'),
                'wake' => array('woke', 'woken', 'aufwachen'),
                'wear' => array('wore', 'worn', 'tragen'),
                'win' => array('won', 'won', 'gewinnen'),
                'write' => array('wrote', 'written', 'schreiben')
            );

            foreach ($irregularVerbs as $verb => $forms) {
                echo "<tr>";
                echo "<td>{$verb}</td>";
                echo "<td>{$forms[0]}</td>";
                echo "<td>{$forms[1]}</td>";
                echo "<td>{$forms[2]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        var irregularVerbs = <?php echo json_encode($irregularVerbs); ?>;

        function searchVerbs() {
            var input, filter, table, tbody, tr, verbCell, pastCell, participleCell, translationCell, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementById("verbsTable");
            tbody = document.getElementById("verbsBody");

            tbody.innerHTML = '';

            for (var verb in irregularVerbs) {
                var values = irregularVerbs[verb];
                var verbMatch = verb.toLowerCase().includes(filter);
                var pastMatch = values[0].toLowerCase().includes(filter);
                var participleMatch = values[1].toLowerCase().includes(filter);
                var translationMatch = values[2].toLowerCase().includes(filter);

                if (verbMatch || pastMatch || participleMatch || translationMatch) {
                    var row = tbody.insertRow();
                    verbCell = row.insertCell(0);
                    pastCell = row.insertCell(1);
                    participleCell = row.insertCell(2);
                    translationCell = row.insertCell(3);

                    verbCell.textContent = verb;
                    pastCell.textContent = values[0];
                    participleCell.textContent = values[1];
                    translationCell.textContent = values[2];

                    if (verbMatch) highlightText(verbCell, filter);
                    if (pastMatch) highlightText(pastCell, filter);
                    if (participleMatch) highlightText(participleCell, filter);
                    if (translationMatch) highlightText(translationCell, filter);
                }
            }
        }

        function highlightText(cell, filter) {
            var txtValue = cell.textContent || cell.innerText;
            var lowerCaseText = txtValue.toLowerCase();
            var startIndex = lowerCaseText.indexOf(filter);

            if (startIndex > -1) {
                var endIndex = startIndex + filter.length;
                var highlightedText = txtValue.substring(0, startIndex) +
                                      '<span class="highlight">' + txtValue.substring(startIndex, endIndex) + '</span>' +
                                      txtValue.substring(endIndex);
                cell.innerHTML = highlightedText;
            }
        }
    </script>

</body>
</html>
