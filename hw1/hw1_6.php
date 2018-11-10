<?php

echo '<style>
    .table-cell {
        width: 2rem;
        text-align: center;
    }
 </style>';

echo '<table>';
for ($i = 0; $i <= 10; $i++) {
    echo '<tr>';
    for ($j = 0; $j <= 10; $j++) {
        if ($i == 0) {
            echo '<th class="table-cell">'.$j.'</th>';
        } else {
            if ($j == 0) {
                echo '<th class="table-cell">'.$i.'</th>';
            } else {
                $val = $i*$j;
                if ($i % 2 === 0 && $j % 2 === 0) {
                    $val = '('.$val.')';
                } elseif ($i % 2 != 0 && $j % 2 != 0) {
                    $val = '['.$val.']';
                }
                echo '<td class="table-cell">'.$val.'</td>';
            }
        }
    }
    echo '</tr>';
}
echo '</table>';
