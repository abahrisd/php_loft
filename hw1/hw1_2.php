<?php
const TOTAL_PICTURES = 80;
const FELT_PEN_PICTURES = 23;
const PENCIL_PICTURES = 40;
$paintPictures = TOTAL_PICTURES - FELT_PEN_PICTURES - PENCIL_PICTURES;
echo 'На школьной выставке '.TOTAL_PICTURES
    .' рисунков. '.FELT_PEN_PICTURES.' из них выполнены фломастерами, '
    .PENCIL_PICTURES.' карандашами, а остальные - красками.';
echo "<br>";
echo "Красками выполнено ".$paintPictures." рисунков";
